<div class="login-wrap">
		<h4><?php echo $_SESSION['site_name']; ?></h4>
		<div class="login">
			
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableAjaxValidation'=>false,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
				'htmlOptions' => array("class"=>"form-horizontal"),
			)); ?>

			<?php echo $form->errorSummary($model); ?>
			<?php echo Yii::app()->user->getFlash('login'); ?>

			<div class="pw">
				<?php echo $form->textField($model,'nama', array("class" => "input-block-level", "placeholder" => "Nama")); ?>
				<?php echo $form->error($model,'nama'); ?>
			</div>

			<div class="pw">
				<?php echo $form->textField($model,'angkatan', array("class" => "input-block-level", "placeholder" => "Angkatan")); ?>
				<?php echo $form->error($model,'angkatan'); ?>
			</div>

			<div class="emails">
				<?php echo $form->textarea($model,'alamat', array("class" => "input-block-level", "placeholder" => "Alamat")); ?>
				<?php echo $form->error($model,'alamat'); ?>
			</div>

			<div class="pw">
				<?php echo $form->textField($model,'username', array("class" => "input-block-level", "placeholder" => "Username")); ?>
				<?php echo $form->error($model,'username'); ?>
			</div>

			<div class="pw">
				<?php echo $form->passwordField($model,'password', array("class" => "input-block-level", "placeholder" => "Password")); ?>
				<?php echo $form->error($model,'password'); ?>
			</div>

			<button type="submit" value="Sign Up" class='button button-basic-darkblue btn-block'>Sign Up</button>
			<a href="<?php echo Yii::app()->baseUrl; ?>/site/login" class='button button-basic-darkblue btn-block'>Sign In</a>
			
			<?php $this->endWidget(); ?>
		</div>
		<h6>© <?php echo date('Y'); ?> - <?php echo $_SESSION['site_name']; ?>. <a href="http://gedelumbung.com" target="_blank">DLMBG</a>.</h6>
	</div>