<?php
/* @var $this PengumumanController */
/* @var $model Pengumuman */

$this->breadcrumbs=array(
	'Pengumuman'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Data Pengumuman', 'url'=>array('index')),
);
?>

<h3>Create Pengumuman</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>