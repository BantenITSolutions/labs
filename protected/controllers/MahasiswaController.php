<?php

class MahasiswaController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','add_gambar'),
				'users'=>array('*'),
			)
		);
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

	public function actionAdd_Gambar()
	{
		Yii::import("ext.EAjaxUpload.qqFileUploader");

		$folder='media/mahasiswa/';// folder for uploaded files
		$allowedExtensions = array("jpg","png");//array("jpg","jpeg","gif","exe","mov" and etc...
		$sizeLimit = 1 * 1024 * 1024;// maximum file size in bytes
		$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		$result = $uploader->handleUpload($folder);
		$result['url'] = Yii::app()->baseUrl.'/media/mahasiswa/'.$result['filename'];
		$return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

		$fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		$fileName=$result['filename'];//GETTING FILE NAME

		echo $return;// it's array
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Mahasiswa;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Mahasiswa']))
		{
			$model->attributes=$_POST['Mahasiswa'];
			$model->created_at = date('Y-m-d H:i:s');
			$model->updated_at = date('Y-m-d H:i:s');

			$acak=$model->generateSalt();
			$model->password=$model->hashPassword($_POST['Mahasiswa']['password'],$acak);

			if($model->save())
				$this->redirect(array('view','id'=>$model->id_mahasiswa));
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

		$password = $model->password;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Mahasiswa']))
		{
			$model->attributes=$_POST['Mahasiswa'];
			$model->updated_at = date('Y-m-d H:i:s');

			if(!empty($_POST['Mahasiswa']['password']))
			{
				$acak=$model->generateSalt();
				$model->password=$model->hashPassword($_POST['Mahasiswa']['password'],$acak);
			}
			else
			{
				$model->password=$password;
			}

			if($model->save())
				$this->redirect(array('view','id'=>$model->id_mahasiswa));
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
		$model=new Mahasiswa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Mahasiswa']))
			$model->attributes=$_GET['Mahasiswa'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Mahasiswa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Mahasiswa']))
			$model->attributes=$_GET['Mahasiswa'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Mahasiswa the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Mahasiswa::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Mahasiswa $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='mahasiswa-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
