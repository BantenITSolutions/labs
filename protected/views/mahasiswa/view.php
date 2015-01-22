<?php
/* @var $this MahasiswaController */
/* @var $model Mahasiswa */

$this->breadcrumbs=array(
	'Mahasiswa'=>array('index'),
	$model->id_mahasiswa,
);

$this->menu=array(
	array('label'=>'Data Mahasiswa', 'url'=>array('index')),
	array('label'=>'Tambah Mahasiswa', 'url'=>array('create')),
	array('label'=>'Edit Mahasiswa', 'url'=>array('update', 'id'=>$model->id_mahasiswa)),
	array('label'=>'Hapus Mahasiswa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_mahasiswa),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h3>View Mahasiswa #<?php echo $model->id_mahasiswa; ?></h3>

<div class="portlet">
<div class="portlet-decoration">
<div class="portlet-title">
</div>
</div>
<div class="portlet-content">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_mahasiswa',
		'nama',
		'angkatan',
		'alamat',
		'username',
		'password',
		'status',
		'created_at',
		'updated_at',
	),
)); ?>

</div>
</div>
