<?php

class ProfileController extends Controller
{
	public function init()
	{
		if (Yii::app()->user->isGuest) 
		{
			$this->redirect(array("site/index"));
		}
		if (Yii::app()->user->status === 'mahasiswa') 
		{
			$this->redirect(array("dashboard/mahasiswa"));
		}
	}
	
	public $layout='main';

	public function actionIndex()
	{
		$model=$this->loadModel(Yii::app()->user->id);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];

			if(!empty($_POST['Users']['password']))
			{
				$acak=$model->generateSalt();
				$model->password=$model->hashPassword($_POST['Users']['password'],$acak);
			}

			if($model->save()){
				Yii::app()->user->setState('nama_lengkap', $_POST['Users']['nama']);
				Yii::app()->user->setState('email', $_POST['Users']['email']);
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

		$folder='media/profile/';// folder for uploaded files
		$allowedExtensions = array("jpg","png");//array("jpg","jpeg","gif","exe","mov" and etc...
		$sizeLimit = 1 * 1024 * 1024;// maximum file size in bytes
		$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		$result = $uploader->handleUpload($folder);
		$result['url'] = Yii::app()->baseUrl.'/media/profile/'.$result['filename'];
		$return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

		$fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		$fileName=$result['filename'];//GETTING FILE NAME

		echo $return;// it's array
	}

	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}