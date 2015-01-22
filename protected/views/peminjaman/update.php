<?php
/* @var $this PeminjamanController */
/* @var $model Peminjaman */

$this->breadcrumbs=array(
	'Peminjamen'=>array('index'),
	$model->id_peminjaman=>array('view','id'=>$model->id_peminjaman),
	'Update',
);

$this->menu=array(
	array('label'=>'Data Peminjaman', 'url'=>array('index')),
	array('label'=>'Tambah Peminjaman', 'url'=>array('create')),
	array('label'=>'Detail Peminjaman', 'url'=>array('view', 'id'=>$model->id_peminjaman)),
);
?>

<h3>Update Peminjaman <?php echo $model->id_peminjaman; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>