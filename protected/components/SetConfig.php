<?php

class SetConfig extends CWidget {

    public function run() {

    	if(session_status() === PHP_SESSION_NONE){
    		session_start();
    	}
        $dt = Pengaturan::model()->findAll();

        foreach($dt as $d){
        	$_SESSION[$d['type']] = $d['content'];
        }

        $list= Yii::app()->db->createCommand('select count(*) as jum from tbl_user_mahasiswa where status!="aktif"')->queryAll();

		$_SESSION['jumlah_mahasiswa_baru'] = $list[0]['jum'];
    }
}