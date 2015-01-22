<?php

class PeminjamanController extends Controller
{
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
				'actions'=>array('index','view','create','update','admin','delete', 'kembali'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Peminjaman;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Peminjaman']))
		{
			$model->attributes=$_POST['Peminjaman'];
			$model->created_at = date('Y-m-d H:i:s');
			$model->updated_at = date('Y-m-d H:i:s');
			$model->id_user_cms = Yii::app()->user->id;

			if($model->save()){
				$model_barang = $this->loadModelBarang($_POST['Peminjaman']['id_barang']);
				$barang_dipinjam = $model_barang->jumlah_dipinjam;

				$model_barang->jumlah_dipinjam = $barang_dipinjam+$_POST['Peminjaman']['jumlah_pinjaman'];

				if($model_barang->save()){
					$this->redirect(array('view','id'=>$model->id_peminjaman));
				}
			}
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

		if(isset($_POST['Peminjaman']))
		{
			$model->attributes=$_POST['Peminjaman'];
			$model->id_user_cms = Yii::app()->user->id;

			if($model->save()){
				if($_POST['Peminjaman']['status_peminjaman'] === 'sudah dikembalikan'){

					$model_barang = $this->loadModelBarang($_POST['Peminjaman']['id_barang']);
					$barang_dipinjam = $model_barang->jumlah_dipinjam;

					$model_barang->jumlah_dipinjam = $barang_dipinjam-$_POST['Peminjaman']['jumlah_pinjaman'];

					if($model_barang->save()){
						$this->redirect(array('view','id'=>$model->id_peminjaman));
					}
				}
				else{

					$model_barang = $this->loadModelBarang($_POST['Peminjaman']['id_barang']);
					$barang_dipinjam = $model_barang->jumlah_dipinjam;

					$model_barang->jumlah_dipinjam = $barang_dipinjam+$_POST['Peminjaman']['jumlah_pinjaman'];

					if($model_barang->save()){
						$this->redirect(array('view','id'=>$model->id_peminjaman));
					}
				}
			}
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
		$model=new Peminjaman('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Peminjaman']))
			$model->attributes=$_GET['Peminjaman'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionKembali()
	{
		$model=new Peminjaman('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Peminjaman']))
			$model->attributes=$_GET['Peminjaman'];

		$this->render('admin_pengembalian',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Peminjaman('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Peminjaman']))
			$model->attributes=$_GET['Peminjaman'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Peminjaman the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Peminjaman::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelBarang($id)
	{
		$model=Barang::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Peminjaman $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='peminjaman-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
