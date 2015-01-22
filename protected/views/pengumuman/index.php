<?php
/* @var $this PengumumanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pengumuman',
);

$this->menu=array(
	array('label'=>'<i class="icon icon-adjust"></i> Create Pengumuman', 'url'=>array('create')),
	array('label'=>'<i class="icon icon-list"></i> Manage Pengumuman', 'url'=>array('admin')),
);
?>

<h1>Pengumuman</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
