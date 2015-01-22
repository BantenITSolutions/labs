<?php
/* @var $this BarangController */
/* @var $model Barang */

$this->breadcrumbs=array(
	'Barang'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Data Barang', 'url'=>array('index')),
	array('label'=>'Tambah Barang', 'url'=>array('create')),
	array('label'=>'Cetak', 'url'=>array('cetak')),
	array('label'=>'Export Excel', 'url'=>array('export')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#barang-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Data Barang</h3>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<div class="portlet">
<div class="portlet-decoration">
<div class="portlet-title">
<?php echo CHtml::link('<i class=\'icon icon-white icon-search\'></i> Advanced Search','#',array('class'=>'search-button btn btn-sm btn-primary')); ?></div>
</div>
<div class="portlet-content">

<?php 
if(Yii::app()->user->status === 'kalab'){

	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'barang-grid',
		'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
		'dataProvider'=>$model->search(),
	   'template'=>'{items}{pager}<br>{summary}',
		'columns'=>array(
		     array(
		      'header'=>'No',
		      'type'=>'raw',
		      'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1'
		      ),
			'kode_barang',
			'nama_barang',
			'merk',
			'tahun',
			'jumlah',
			'keadaan',
			'lokasi_barang',
			array(
				'class' => 'CButtonColumn',
				'template' => '{Detail}',
				  'buttons'=>array
				    (
				        'Detail' => array
				        (
				            'url'=>'Yii::app()->createUrl("barang/view/", array("id"=>$data["id_barang"]))',
				        ),
				    ),		
			),
		),
	)); 
}
else{

	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'barang-grid',
		'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
		'dataProvider'=>$model->search(),
	   'template'=>'{items}{pager}<br>{summary}',
		'columns'=>array(
		     array(
		      'header'=>'No',
		      'type'=>'raw',
		      'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1'
		      ),
			'kode_barang',
			'nama_barang',
			'merk',
			'tahun',
			'jumlah',
			'keadaan',
			'lokasi_barang',
			/*
			'keterangan',
			*/
			array(
				'class'=>'CButtonColumn',
			),
		),
	)); 
}

?>

</div></div>
