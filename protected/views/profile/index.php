
<h1>User Profile</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-cms-model-form',
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128, 'readonly'=>true)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php $model->password = ""; ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gambar'); ?>
			<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
			array(
			    'id'=>'uploadFile',
			    'config'=>array(
			           'action'=>Yii::app()->createUrl('profile/add_gambar'),
			           'allowedExtensions'=>array("jpg","png"),
			           'sizeLimit'=>5*1024*1024,// maximum file size in bytes
			           'onComplete'=>"js:function(id, fileName, responseJSON){ 
			           		$('#Users_gambar').val(responseJSON['filename']); 
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
			$gambar = !empty($model->gambar) ? Yii::app()->baseUrl.'/media/profile/'.$model->gambar : '';
		?>
		<img id="uploadedImage" src="<?php echo $gambar; ?>" width="250">
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'status',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->