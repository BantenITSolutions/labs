<?php

/**
 * This is the model class for table "tbl_pengumuman".
 *
 * The followings are the available columns in table 'tbl_pengumuman':
 * @property integer $id_pengumuman
 * @property integer $id_user_cms
 * @property string $judul
 * @property string $keterangan
 * @property string $created_at
 * @property string $updated_at
 */
class Pengumuman extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_pengumuman';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user_cms, judul, keterangan', 'required'),
			array('id_user_cms', 'numerical', 'integerOnly'=>true),
			array('judul', 'length', 'max'=>150),
			array('created_at, updated_at', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pengumuman, id_user_cms, judul, keterangan, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'id_pengumuman' => 'Id Pengumuman',
			'id_user_cms' => 'Id User Cms',
			'judul' => 'Judul',
			'keterangan' => 'Keterangan',
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

		$criteria->compare('id_pengumuman',$this->id_pengumuman);
		$criteria->compare('id_user_cms',$this->id_user_cms);
		$criteria->compare('judul',$this->judul,true);
		$criteria->compare('keterangan',$this->keterangan,true);
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
	 * @return Pengumuman the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
