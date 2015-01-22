<?php
/* @var $this MahasiswaController */
/* @var $model Mahasiswa */

$this->breadcrumbs=array(
	'Mahasiswa'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Data Mahasiswa', 'url'=>array('index')),
);
?>

<h3>Create Mahasiswa</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>