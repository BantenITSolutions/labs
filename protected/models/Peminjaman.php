<?php

/**
 * This is the model class for table "tbl_peminjaman".
 *
 * The followings are the available columns in table 'tbl_peminjaman':
 * @property integer $id_peminjaman
 * @property integer $id_user_mahasiswa
 * @property integer $id_barang
 * @property integer $id_user_cms
 * @property integer $jumlah_pinjaman
 * @property string $tgl_peminjaman
 * @property string $tgl_pengembalian
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Peminjaman extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_peminjaman';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user_mahasiswa, id_barang, id_user_cms, jumlah_pinjaman, tgl_peminjaman, tgl_pengembalian, status_peminjaman, status_persetujuan, created_at, updated_at', 'required'),
			array('id_user_mahasiswa, id_barang, id_user_cms, jumlah_pinjaman', 'numerical', 'integerOnly'=>true),
			array('tgl_peminjaman, tgl_pengembalian, status_peminjaman, status_persetujuan, created_at, updated_at', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_peminjaman, id_user_mahasiswa, id_barang, id_user_cms, jumlah_pinjaman, tgl_peminjaman, tgl_pengembalian, status_peminjaman, status_persetujuan, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'Users'=>array(self::BELONGS_TO,'Users','id_user_cms'),
			'Barang'=>array(self::BELONGS_TO,'Barang','id_barang'),
			'Mahasiswa'=>array(self::BELONGS_TO,'Mahasiswa','id_user_mahasiswa'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_peminjaman' => 'Id Peminjaman',
			'id_user_mahasiswa' => 'Mahasiswa',
			'id_barang' => ' Barang',
			'id_user_cms' => 'Id User Cms',
			'jumlah_pinjaman' => 'Jumlah Pinjaman',
			'tgl_peminjaman' => 'Tgl Peminjaman',
			'tgl_pengembalian' => 'Tgl Pengembalian',
			'status_peminjaman' => 'Status Peminjaman',
			'status_persetujuan' => 'Status Persetujuan',
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
	public function search_peminjaman()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_peminjaman',$this->id_peminjaman);
		$criteria->compare('id_user_mahasiswa',$this->id_user_mahasiswa);
		$criteria->compare('id_barang',$this->id_barang);
		$criteria->compare('id_user_cms',$this->id_user_cms);
		$criteria->compare('jumlah_pinjaman',$this->jumlah_pinjaman);
		$criteria->compare('tgl_peminjaman',$this->tgl_peminjaman,true);
		$criteria->compare('tgl_pengembalian',$this->tgl_pengembalian,true);
		$criteria->condition = 'status_peminjaman = "belum dikembalikan"';
		$criteria->compare('status_persetujuan',$this->status_persetujuan,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search_pengembalian()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_peminjaman',$this->id_peminjaman);
		$criteria->compare('id_user_mahasiswa',$this->id_user_mahasiswa);
		$criteria->compare('id_barang',$this->id_barang);
		$criteria->compare('id_user_cms',$this->id_user_cms);
		$criteria->compare('jumlah_pinjaman',$this->jumlah_pinjaman);
		$criteria->compare('tgl_peminjaman',$this->tgl_peminjaman,true);
		$criteria->compare('tgl_pengembalian',$this->tgl_pengembalian,true);
		$criteria->condition = 'status_peminjaman = "sudah dikembalikan"';
		$criteria->compare('status_persetujuan',$this->status_persetujuan,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search_peminjaman_mahasiswa()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition = 'id_user_cms = "'.Yii::app()->user->id.'"';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Peminjaman the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
