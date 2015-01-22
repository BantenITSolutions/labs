<?php
/* @var $this Modul_pembelajaranController */
/* @var $model ModulPembelajaran */

$this->breadcrumbs=array(
	'Modul Pembelajaran'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Data ModulPembelajaran', 'url'=>array('index')),
);
?>

<h3>Create ModulPembelajaran</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>