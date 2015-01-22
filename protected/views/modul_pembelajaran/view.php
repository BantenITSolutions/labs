<?php
/* @var $this Modul_pembelajaranController */
/* @var $model ModulPembelajaran */

$this->breadcrumbs=array(
	'Modul Pembelajaran'=>array('index'),
	$model->id_modul_pembelajaran,
);

$this->menu=array(
	array('label'=>'Data ModulPembelajaran', 'url'=>array('index')),
	array('label'=>'Tambah ModulPembelajaran', 'url'=>array('create')),
	array('label'=>'Edit ModulPembelajaran', 'url'=>array('update', 'id'=>$model->id_modul_pembelajaran)),
	array('label'=>'Hapus ModulPembelajaran', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_modul_pembelajaran),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h3>View ModulPembelajaran #<?php echo $model->id_modul_pembelajaran; ?></h3>

<div class="portlet">
<div class="portlet-decoration">
<div class="portlet-title">
</div>
</div>
<div class="portlet-content">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_modul_pembelajaran',
		'Users.nama',
		'nama_modul',
		'nama_file',
		'created_at',
		'updated_at',
	),
)); ?>

</div>
</div>
