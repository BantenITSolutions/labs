<?php class MahasiswaIdentity extends CUserIdentity{	
	private $_id;
	public function authenticate()	{		
		$user=Mahasiswa::model()->find('LOWER(username)=? and status="aktif"',array(strtolower($this->username)));		
		if($user===null)			
			$this->errorCode=self::ERROR_USERNAME_INVALID;		
		else if(!$user->validatePassword($this->password))			
			$this->errorCode='self::ERROR_PASSWORD_INVALID';		
		else		{			
			$this->_id=$user->id_mahasiswa;			
			$this->username=$user->username;			
			$this->setState('nama_lengkap', $user->nama);			
			$this->setState('username', $user->username);					
			$this->setState('status', 'mahasiswa');		
			$this->errorCode=self::ERROR_NONE;
		}		
		return $this->errorCode==self::ERROR_NONE;	
	}	

	public function getId()	{		
		return $this->_id;	
	}
}