<?php
/* @var $this BarangController */
/* @var $model Barang */

$this->breadcrumbs=array(
	'Barang'=>array('index'),
	$model->id_barang,
);

$this->menu=array(
	array('label'=>'Data Barang', 'url'=>array('index')),
	array('label'=>'Tambah Barang', 'url'=>array('create')),
	array('label'=>'Edit Barang', 'url'=>array('update', 'id'=>$model->id_barang)),
	array('label'=>'Hapus Barang', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_barang),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h3>View Barang #<?php echo $model->id_barang; ?></h3>

<div class="portlet">
<div class="portlet-decoration">
<div class="portlet-title">
</div>
</div>
<div class="portlet-content">

<?php
	$gambar = !empty($model->gambar) ? Yii::app()->baseUrl.'/media/barang/'.$model->gambar : '';
?>
		<img id="uploadedImage" src="<?php echo $gambar; ?>">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'kode_barang',
		'nama_barang',
		'merk',
		'tahun',
		'jumlah',
		'keadaan',
		'lokasi_barang',
		'keterangan',
	),
)); ?>

</div>
</div>
