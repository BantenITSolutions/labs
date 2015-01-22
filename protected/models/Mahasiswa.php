<?php

/**
 * This is the model class for table "tbl_user_mahasiswa".
 *
 * The followings are the available columns in table 'tbl_user_mahasiswa':
 * @property integer $id_mahasiswa
 * @property string $nama
 * @property string $angkatan
 * @property string $alamat
 * @property string $username
 * @property string $password
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Mahasiswa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user_mahasiswa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, angkatan, alamat, username, status, gambar, created_at, updated_at', 'required'),
			array('nama', 'length', 'max'=>150),
			array('angkatan', 'length', 'max'=>10),
			array('status', 'length', 'max'=>20),
			array('username, created_at, updated_at', 'length', 'max'=>50),
			array('password', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_mahasiswa, nama, angkatan, alamat, username, password, gambar, status, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_mahasiswa' => 'Id Mahasiswa',
			'nama' => 'Nama Mahasiswa',
			'angkatan' => 'Angkatan',
			'alamat' => 'Alamat',
			'username' => 'Username',
			'password' => 'Password',
			'gambar' => 'Gambar',
			'status' => 'Status',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_mahasiswa',$this->id_mahasiswa);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('angkatan',$this->angkatan,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Mahasiswa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function validatePassword($password)
	{
		return crypt($password,$this->password)===$this->password;
	}

	public function hashPassword($password)
	{
		return crypt($password, $this->generateSalt());
	}

	public function generateSalt($cost=10)
	{
		if(!is_numeric($cost)||$cost<4||$cost>31){
			throw new CException(Yii::t('Cost parameter must be between 4 and 31.'));
		}
		// Get some pseudo-random data from mt_rand().
		$rand='';
		for($i=0;$i<8;++$i)
			$rand.=pack('S',mt_rand(0,0xffff));
		// Add the microtime for a little more entropy.
		$rand.=microtime();
		// Mix the bits cryptographically.
		$rand=sha1($rand,true);
		// Form the prefix that specifies hash algorithm type and cost parameter.
		$salt='$2a$'.str_pad((int)$cost,2,'0',STR_PAD_RIGHT).'$';
		// Append the random salt string in the required base64 format.
		$salt.=strtr(substr(base64_encode($rand),0,22),array('+'=>'.'));
		return $salt;
	}
}
