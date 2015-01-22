<?php

class BarangController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	public function init()
	{
		if (Yii::app()->user->isGuest) 
		{
			$this->redirect(array("site/login"));
		}
		if (Yii::app()->user->status === 'mahasiswa') 
		{
			$this->redirect(array("dashboard/mahasiswa"));
		}
		$this->widget('SetConfig');
	}

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update','admin','delete','add_gambar', 'cetak', 'export'),
				'users'=>array('*'),
			)
		);
	}

	public function actionAdd_Gambar()
	{
		Yii::import("ext.EAjaxUpload.qqFileUploader");

		$folder='media/barang/';// folder for uploaded files
		$allowedExtensions = array("jpg","png");//array("jpg","jpeg","gif","exe","mov" and etc...
		$sizeLimit = 1 * 1024 * 1024;// maximum file size in bytes
		$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		$result = $uploader->handleUpload($folder);
		$result['url'] = Yii::app()->baseUrl.'/media/barang/'.$result['filename'];
		$return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

		$fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		$fileName=$result['filename'];//GETTING FILE NAME

		echo $return;// it's array
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Barang;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Barang']))
		{
			$model->attributes=$_POST['Barang'];
			$nama = substr($_POST['Barang']['nama_barang'], 0,2);
			$tahun = $_POST['Barang']['tahun'];
			$merk = substr($_POST['Barang']['merk'], 0,2);

			$model->kode_barang = strtoupper($nama.$tahun.$merk);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_barang));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Barang']))
		{
			$model->attributes=$_POST['Barang'];
			$nama = substr($_POST['Barang']['nama_barang'], 0,2);
			$tahun = $_POST['Barang']['tahun'];
			$merk = substr($_POST['Barang']['merk'], 0,2);

			$model->kode_barang = strtoupper($nama.$tahun.$merk);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_barang));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Barang('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Barang']))
			$model->attributes=$_GET['Barang'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionCetak()
	{
		$this->layout = 'none';
		$model=Barang::model()->findAll();

		$this->render('cetak',array(
			'model'=>$model,
		));
	}
	
	public function actionExport()
	{
		$this->layout = 'none';
		$model=Barang::model()->findAll();

		$this->render('export',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Barang('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Barang']))
			$model->attributes=$_GET['Barang'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Barang the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Barang::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Barang $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='barang-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}