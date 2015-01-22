<?php
/* @var $this PeminjamanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Peminjamen',
);

$this->menu=array(
	array('label'=>'<i class="icon icon-adjust"></i> Create Peminjaman', 'url'=>array('create')),
	array('label'=>'<i class="icon icon-list"></i> Manage Peminjaman', 'url'=>array('admin')),
);
?>

<h1>Peminjamen</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
