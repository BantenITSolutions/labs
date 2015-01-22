<?php

class Mahasiswa_modul_pembelajaranController extends Controller
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
		$model=new ModulPembelajaran('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ModulPembelajaran']))
			$model->attributes=$_GET['ModulPembelajaran'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
}