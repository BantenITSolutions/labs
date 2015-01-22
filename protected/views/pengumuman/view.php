<?php
/* @var $this PengumumanController */
/* @var $model Pengumuman */

$this->breadcrumbs=array(
	'Pengumuman'=>array('index'),
	$model->id_pengumuman,
);

$this->menu=array(
	array('label'=>'Data Pengumuman', 'url'=>array('index')),
	array('label'=>'Tambah Pengumuman', 'url'=>array('create')),
	array('label'=>'Edit Pengumuman', 'url'=>array('update', 'id'=>$model->id_pengumuman)),
	array('label'=>'Hapus Pengumuman', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pengumuman),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h3>View Pengumuman #<?php echo $model->id_pengumuman; ?></h3>

<div class="portlet">
<div class="portlet-decoration">
<div class="portlet-title">
</div>
</div>
<div class="portlet-content">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pengumuman',
		'Users.nama',
		'judul',
		'keterangan',
		'created_at',
		'updated_at',
	),
)); ?>

</div>
</div>
