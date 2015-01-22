<?php

class DashboardController extends Controller
{
	public $layout='main';

	public function init()
	{
		if (Yii::app()->user->isGuest) 
		{
			$this->redirect(array("site/login"));
		}
		$this->widget('SetConfig');
	}

	public function actionIndex()
	{
		if (Yii::app()->user->status === 'mahasiswa') 
		{
			$this->redirect(array("dashboard/mahasiswa"));
		}
		$this->render('index');
	}

	public function actionMahasiswa()
	{
		$this->layout = 'main_mahasiswa';
		$this->render('index_mahasiswa');
	}
}