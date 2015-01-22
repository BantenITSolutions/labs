<?php

class Profile_mahasiswaController extends Controller
{
	public function init()
	{
		if (Yii::app()->user->isGuest) 
		{
			$this->redirect(array("site/index"));
		}
		if (Yii::app()->user->status !== 'mahasiswa') 
		{
			$this->redirect(array("dashboard/"));
		}
	}
	
	public $layout='main_mahasiswa';

	public function actionIndex()
	{
		$model=$this->loadModel(Yii::app()->user->id);

		if(isset($_POST['Mahasiswa']))
		{
			$model->attributes=$_POST['Mahasiswa'];

			if(!empty($_POST['Mahasiswa']['password']))
			{
				$acak=$model->generateSalt();
				$model->password=$model->hashPassword($_POST['Mahasiswa']['password'],$acak);
			}

			if($model->save()){
				Yii::app()->user->setState('nama_lengkap', $_POST['Mahasiswa']['nama']);
				$this->redirect(array('index'));
			}
		}

		$this->render('index',array(
			'model'=>$model,
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

	public function loadModel($id)
	{
		$model=Mahasiswa::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}