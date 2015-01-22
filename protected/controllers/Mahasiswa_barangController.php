<?php

class Mahasiswa_barangController extends Controller
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
		$model=new Barang('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Barang']))
			$model->attributes=$_GET['Barang'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
}