<?php
/* @var $this MahasiswaController */
/* @var $model Mahasiswa */
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
	'id'=>'mahasiswa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>150, 'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'angkatan'); ?>
		<?php echo $form->textField($model,'angkatan',array('size'=>10,'maxlength'=>10, 'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'angkatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat'); ?>
		<?php echo $form->textArea($model,'alamat',array('rows'=>6, 'cols'=>50, 'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'alamat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50, 'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php $model->password = ""; ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100, 'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gambar'); ?>
			<? $this->widget('ext.EAjaxUpload.EAjaxUpload',
			array(
			    'id'=>'uploadFile',
			    'config'=>array(
			           'action'=>Yii::app()->createUrl('mahasiswa/add_gambar'),
			           'allowedExtensions'=>array("jpg","png"),
			           'sizeLimit'=>5*1024*1024,// maximum file size in bytes
			           'onComplete'=>"js:function(id, fileName, responseJSON){ 
			           		$('#Mahasiswa_gambar').val(responseJSON['filename']); 
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
			$gambar = !empty($model->gambar) ? Yii::app()->baseUrl.'/media/mahasiswa/'.$model->gambar : '';
		?>
		<img id="uploadedImage" src="<?php echo $gambar; ?>">
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status',array("aktif"=>"aktif","tidak aktif"=>"tidak aktif"), array("class" => "input-block-level")); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-sm btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div>
</div>