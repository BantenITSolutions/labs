<?php
/* @var $this BarangController */
/* @var $model Barang */
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
	'id'=>'barang-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_barang'); ?>
		<?php echo $form->textField($model,'nama_barang',array('size'=>60,'maxlength'=>150, 'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'nama_barang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'merk'); ?>
		<?php echo $form->textField($model,'merk',array('size'=>60,'maxlength'=>75, 'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'merk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun'); ?>
		<?php echo $form->textField($model,'tahun', array('class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'tahun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jumlah'); ?>
		<?php echo $form->textField($model,'jumlah', array('class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'jumlah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keadaan'); ?>
		<?php echo $form->textField($model,'keadaan',array('size'=>20,'maxlength'=>20, 'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'keadaan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gambar'); ?>
			<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
			array(
			    'id'=>'uploadFile',
			    'config'=>array(
			           'action'=>Yii::app()->createUrl('barang/add_gambar'),
			           'allowedExtensions'=>array("jpg","png"),
			           'sizeLimit'=>5*1024*1024,// maximum file size in bytes
			           'onComplete'=>"js:function(id, fileName, responseJSON){ 
			           		$('#Barang_gambar').val(responseJSON['filename']); 
			           		$('#uploadedImage').attr('src', responseJSON['url']);
			           }",
			           'messages'=>array(
													'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
													'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
													'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
													'emptyError'=>"{file} is empty, please select files again without it.",
													'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
			                            ),
			           'showMessage'=>"js:function(message){ alert(message); }"
			          )
			)); ?>
			<?php echo $form->textField($model,'gambar', array('readonly' => true, 'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'gambar'); ?>
	</div>
	<div class="row">
		<?php
			$gambar = !empty($model->gambar) ? Yii::app()->baseUrl.'/media/barang/'.$model->gambar : '';
		?>
		<img id="uploadedImage" src="<?php echo $gambar; ?>">
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lokasi_barang'); ?>
		<?php echo $form->textField($model,'lokasi_barang',array('size'=>50,'maxlength'=>50, 'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'lokasi_barang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keterangan'); ?>
		<?php echo $form->textArea($model,'keterangan',array('rows'=>6, 'cols'=>50, 'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'keterangan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-sm btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div>
</div>