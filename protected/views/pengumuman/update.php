<?php
/* @var $this PengumumanController */
/* @var $model Pengumuman */

$this->breadcrumbs=array(
	'Pengumuman'=>array('index'),
	$model->id_pengumuman=>array('view','id'=>$model->id_pengumuman),
	'Update',
);

$this->menu=array(
	array('label'=>'Data Pengumuman', 'url'=>array('index')),
	array('label'=>'Tambah Pengumuman', 'url'=>array('create')),
	array('label'=>'Detail Pengumuman', 'url'=>array('view', 'id'=>$model->id_pengumuman)),
);
?>

<h3>Update Pengumuman <?php echo $model->id_pengumuman; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>