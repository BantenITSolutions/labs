<?php

class Mahasiswa_peminjaman_barangController extends Controller
{
	public $layout='//layouts/main_mahasiswa';

	public function init()
	{
		if (Yii::app()->user->isGuest) 
		{
			$this->redirect(array("site/login"));
		}
		if (Yii::app()->user->status !== 'mahasiswa') 
		{
			$this->redirect(array("dashboard"));
		}
		$this->widget('SetConfig');
	}
	
	public function actionIndex()
	{
		$model=new Peminjaman('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Peminjaman']))
			$model->attributes=$_GET['Peminjaman'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCetak($id)
	{
		$this->render('cetak',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate($id)
	{
		$model=new Peminjaman;

		$model_barang = $this->loadModelBarang($id);
		$barang_dipinjam = $model_barang->jumlah_dipinjam;

		$model->id_barang = $id;
		$model->id_user_mahasiswa = Yii::app()->user->id;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Peminjaman']))
		{
			$model->attributes=$_POST['Peminjaman'];
			$model->created_at = date('Y-m-d H:i:s');
			$model->updated_at = date('Y-m-d H:i:s');
			$model->id_user_cms = 0;
			$model->status_peminjaman = 'belum dikembalikan';
			$model->status_persetujuan = 'belum disetujui';

			if($model->save()){
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
}