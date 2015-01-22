<?php
/* @var $this PeminjamanController */
/* @var $model Peminjaman */

$this->breadcrumbs=array(
	'Peminjaman'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#peminjaman-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Data Peminjaman</h3>

<div class="portlet">
<div class="portlet-decoration">
<div class="portlet-content">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'peminjaman-grid',
	'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
	'dataProvider'=>$model->search_peminjaman_mahasiswa(),
   'template'=>'{items}{pager}<br>{summary}',
	'columns'=>array(
	     array(
	      'header'=>'No',
	      'type'=>'raw',
	      'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1'
	      ),
		'Mahasiswa.nama',
		'Barang.nama_barang',
		'jumlah_pinjaman',
		'tgl_peminjaman',
		'tgl_pengembalian',
		'status_peminjaman',
		'status_persetujuan',
		array(
			'class' => 'CButtonColumn',
			'template' => '{Cetak}',
			  'buttons'=>array
			    (
			        'Cetak' => array
			        (
			            'url'=>'Yii::app()->createUrl("mahasiswa_peminjaman_barang/cetak/", array("id"=>$data["id_peminjaman"]))',
			        ),
			    ),		
		),
	),
)); ?>

</div></div>
