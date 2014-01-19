<?php
/* @var $this LessonController */
/* @var $model Lesson */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lesson-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'filetype'); ?>
	    <?php echo $form->dropDownList($model, 'filetype', array('l'=>'Lesson', 'e'=>'Exercise', 'p'=>'Playlist'));?>
		<?php echo $form->error($model,'filetype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seriesno'); ?>
		<?php echo $form->dropDownList($model,'seriesno', CHtml::listData(Course::model()->findAll(array('order' => 'id DESC')),'id','title'));?>
		<?php echo $form->error($model,'seriesno'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'topicno'); ?>
	    <?php echo $form->dropDownList($model,'topicno', CHtml::listData(Topic::model()->findAll(array('order' => 'title DESC')),'id','title'));?>
		<?php echo $form->error($model,'topicno'); ?>
	</div>




	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('style'=>'width: 400px; height: 150px')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'urltitle'); ?>
		<?php echo $form->textField($model,'urltitle',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'urltitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'youtubeid'); ?>
		<?php echo $form->textField($model,'youtubeid',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'youtubeid'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->