
<br>
<br>
<h3>View Pengumuman #<?php echo $model->id_pengumuman; ?></h3>

<div class="portlet">
<div class="portlet-decoration">
<div class="portlet-title">
</div>
</div>
<div class="portlet-content">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'judul',
		'keterangan',
	),
)); ?>

</div>
</div>
