<?php
/* @var $this PeminjamanController */
/* @var $model Peminjaman */

$this->breadcrumbs=array(
	'Peminjamen'=>array('index'),
	$model->id_peminjaman,
);
?>

<h3>View Peminjaman #<?php echo $model->id_peminjaman; ?></h3>

<div class="portlet">
<div class="portlet-decoration">
<div class="portlet-title">
</div>
</div>
<div class="portlet-content">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_peminjaman',
		'Mahasiswa.nama',
		'Barang.kode_barang',
		'Barang.nama_barang',
		'jumlah_pinjaman',
		'tgl_peminjaman',
		'tgl_pengembalian',
		'status_peminjaman',
		'status_persetujuan',
		'created_at',
		'updated_at',
	),
)); ?>

</div>
</div>
