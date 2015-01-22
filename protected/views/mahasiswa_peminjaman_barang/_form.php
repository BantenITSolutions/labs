<?php
/* @var $this PeminjamanController */
/* @var $model Peminjaman */
/* @var $form CActiveForm */
?>

<div class="portlet">
<div class="portlet-decoration">
<div class="portlet-title">
</div>
</div>
<div class="portlet-content">

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'peminjaman-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user_mahasiswa'); ?>
		<?php
			$this->widget('ext.chosen.Chosen',array(
			   'name' => 'Peminjaman[id_user_mahasiswa]', // input name
			   'value' => $model->id_user_mahasiswa, // selection
			   'data' => array(''=>'Semua') + CHtml::listData(Mahasiswa::model()->findAll(),'id_mahasiswa','nama'),
			   'htmlOptions' => array('disabled' => 'disabled')
			));
		?>
		<?php echo $form->error($model,'id_user_mahasiswa'); ?>
	</div>

	<br>

	<div class="row">
		<?php echo $form->labelEx($model,'id_barang'); ?>
		<?php
			$this->widget('ext.chosen.Chosen',array(
			   'name' => 'Peminjaman[id_barang]', // input name
			   'value' => $model->id_barang, // selection
			   'data' => array(''=>'Semua') + CHtml::listData(Barang::model()->findAll(),'id_barang','nama_barang'),
			   'htmlOptions' => array('disabled' => 'disabled')
			));
		?>
		<?php echo $form->error($model,'id_barang'); ?>
	</div>

	<br>

	<div class="row">
		<?php echo $form->labelEx($model,'jumlah_pinjaman'); ?>
		<?php echo $form->textField($model,'jumlah_pinjaman', array('class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'jumlah_pinjaman'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_peminjaman'); ?>
		<?php echo $form->dateField($model,'tgl_peminjaman',array('size'=>50,'maxlength'=>50, 'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'tgl_peminjaman'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_pengembalian'); ?>
		<?php echo $form->dateField($model,'tgl_pengembalian',array('size'=>50,'maxlength'=>50, 'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'tgl_pengembalian'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-sm btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div>
</div>