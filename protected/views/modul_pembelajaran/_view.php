<?php
/* @var $this Modul_pembelajaranController */
/* @var $data ModulPembelajaran */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_modul_pembelajaran')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_modul_pembelajaran), array('view', 'id'=>$data->id_modul_pembelajaran)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user_cms')); ?>:</b>
	<?php echo CHtml::encode($data->id_user_cms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_modul')); ?>:</b>
	<?php echo CHtml::encode($data->nama_modul); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_file')); ?>:</b>
	<?php echo CHtml::encode($data->nama_file); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />


</div>