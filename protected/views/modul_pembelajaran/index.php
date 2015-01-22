<?php
/* @var $this Modul_pembelajaranController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Modul Pembelajaran',
);

$this->menu=array(
	array('label'=>'<i class="icon icon-adjust"></i> Create ModulPembelajaran', 'url'=>array('create')),
	array('label'=>'<i class="icon icon-list"></i> Manage ModulPembelajaran', 'url'=>array('admin')),
);
?>

<h1>Modul Pembelajaran</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
