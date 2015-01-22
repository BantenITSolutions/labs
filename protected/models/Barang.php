<?php

/**
 * This is the model class for table "tbl_barang".
 *
 * The followings are the available columns in table 'tbl_barang':
 * @property string $id_barang
 * @property string $nama_barang
 * @property string $merk
 * @property integer $tahun
 * @property integer $jumlah
 * @property string $keadaan
 * @property string $gambar
 * @property string $lokasi_barang
 * @property string $keterangan
 */
class Barang extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_barang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_barang, merk, tahun, jumlah, keadaan, gambar, lokasi_barang, keterangan', 'required'),
			array('tahun, jumlah', 'numerical', 'integerOnly'=>true),
			array('id_barang, gambar, lokasi_barang', 'length', 'max'=>50),
			array('nama_barang', 'length', 'max'=>150),
			array('merk', 'length', 'max'=>75),
			array('keadaan', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_barang, nama_barang, merk, tahun, jumlah, keadaan, gambar, lokasi_barang, keterangan', 'safe', 'on'=>'search'),
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
			'id_barang' => 'Kode Barang',
			'nama_barang' => 'Nama Barang',
			'merk' => 'Merk',
			'tahun' => 'Tahun',
			'jumlah' => 'Jumlah',
			'keadaan' => 'Keadaan',
			'gambar' => 'Gambar',
			'lokasi_barang' => 'Lokasi Barang',
			'keterangan' => 'Keterangan',
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

		$criteria->compare('id_barang',$this->id_barang,true);
		$criteria->compare('nama_barang',$this->nama_barang,true);
		$criteria->compare('merk',$this->merk,true);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('keadaan',$this->keadaan,true);
		$criteria->compare('gambar',$this->gambar,true);
		$criteria->compare('lokasi_barang',$this->lokasi_barang,true);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Barang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
