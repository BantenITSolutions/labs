<?php

/**
 * This is the model class for table "tbl_modul_pembelajaran".
 *
 * The followings are the available columns in table 'tbl_modul_pembelajaran':
 * @property integer $id_modul_pembelajaran
 * @property integer $id_user_cms
 * @property string $nama_modul
 * @property string $nama_file
 * @property string $created_at
 * @property string $updated_at
 */
class ModulPembelajaran extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_modul_pembelajaran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user_cms, nama_modul, nama_file, created_at, updated_at', 'required'),
			array('id_user_cms', 'numerical', 'integerOnly'=>true),
			array('nama_modul', 'length', 'max'=>150),
			array('nama_file', 'length', 'max'=>100),
			array('created_at, updated_at', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_modul_pembelajaran, id_user_cms, nama_modul, nama_file, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'Users'=>array(self::BELONGS_TO,'Users','id_user_cms'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_modul_pembelajaran' => 'Id Modul Pembelajaran',
			'id_user_cms' => 'Id User Cms',
			'nama_modul' => 'Nama Modul',
			'nama_file' => 'Nama File',
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

		$criteria->compare('id_modul_pembelajaran',$this->id_modul_pembelajaran);
		$criteria->compare('id_user_cms',$this->id_user_cms);
		$criteria->compare('nama_modul',$this->nama_modul,true);
		$criteria->compare('nama_file',$this->nama_file,true);
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
	 * @return ModulPembelajaran the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
