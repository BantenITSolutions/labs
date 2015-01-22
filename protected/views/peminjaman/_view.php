<?php
/* @var $this PeminjamanController */
/* @var $data Peminjaman */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_peminjaman')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_peminjaman), array('view', 'id'=>$data->id_peminjaman)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user_mahasiswa')); ?>:</b>
	<?php echo CHtml::encode($data->id_user_mahasiswa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_barang')); ?>:</b>
	<?php echo CHtml::encode($data->id_barang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user_cms')); ?>:</b>
	<?php echo CHtml::encode($data->id_user_cms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_pinjaman')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_pinjaman); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_peminjaman')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_peminjaman); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_pengembalian')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_pengembalian); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	*/ ?>

</div>