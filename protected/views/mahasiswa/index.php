<?php
/* @var $this MahasiswaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mahasiswa',
);

$this->menu=array(
	array('label'=>'<i class="icon icon-adjust"></i> Create Mahasiswa', 'url'=>array('create')),
	array('label'=>'<i class="icon icon-list"></i> Manage Mahasiswa', 'url'=>array('admin')),
);
?>

<h1>Mahasiswa</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
