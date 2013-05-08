<?php
/* @var $this PlaylistItemController */
/* @var $model PlaylistItem */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'playlist-item-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('style'=>'width:500px; height: 200px','maxlength'=>5000)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->hiddenField($model,'relid'); ?>
		<?php echo $form->error($model,'relid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'youtubeid'); ?>
		<?php echo $form->textField($model,'youtubeid',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'youtubeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit'); ?>
		<?php echo $form->textField($model,'credit',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'credit'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->