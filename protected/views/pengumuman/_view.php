<?php
/* @var $this PengumumanController */
/* @var $data Pengumuman */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pengumuman')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pengumuman), array('view', 'id'=>$data->id_pengumuman)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user_cms')); ?>:</b>
	<?php echo CHtml::encode($data->id_user_cms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('judul')); ?>:</b>
	<?php echo CHtml::encode($data->judul); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />


</div>