<?php
/* @var $this PeminjamanController */
/* @var $model Peminjaman */

$this->breadcrumbs=array(
	'Peminjamen'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Data Peminjaman', 'url'=>array('index')),
);
?>

<h3>Create Peminjaman</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>