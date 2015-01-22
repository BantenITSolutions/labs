<?php
/* @var $this MahasiswaController */
/* @var $model Mahasiswa */

$this->breadcrumbs=array(
	'Mahasiswa'=>array('index'),
	$model->id_mahasiswa=>array('view','id'=>$model->id_mahasiswa),
	'Update',
);

$this->menu=array(
	array('label'=>'Data Mahasiswa', 'url'=>array('index')),
	array('label'=>'Tambah Mahasiswa', 'url'=>array('create')),
	array('label'=>'Detail Mahasiswa', 'url'=>array('view', 'id'=>$model->id_mahasiswa)),
);
?>

<h3>Update Mahasiswa <?php echo $model->id_mahasiswa; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>