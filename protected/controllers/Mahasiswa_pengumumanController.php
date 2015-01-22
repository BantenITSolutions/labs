<?php

class Mahasiswa_pengumumanController extends Controller
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
		$model=new Pengumuman('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pengumuman']))
			$model->attributes=$_GET['Pengumuman'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
}