<?php
/* @var $this TopicController */
/* @var $model Topic */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'topic-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'colour'); ?>
		<?php echo $form->textField($model,'colour',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'colour'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'courseId'); ?>
	    <?php echo $form->dropDownList($model,'courseId', CHtml::listData(Course::model()->findAll(array('order' => 'id DESC')),'id','title'));?>
		<?php echo $form->error($model,'courseId'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->