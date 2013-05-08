<?php
/* @var $this LessonController */
/* @var $model Lesson */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'filetype'); ?>
		<?php echo $form->textField($model,'filetype',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'seriesno'); ?>
		<?php echo $form->textField($model,'seriesno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lessonno'); ?>
		<?php echo $form->textField($model,'lessonno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'urltitle'); ?>
		<?php echo $form->textField($model,'urltitle',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'youtubeid'); ?>
		<?php echo $form->textField($model,'youtubeid',array('size'=>60,'maxlength'=>70)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timestamp'); ?>
		<?php echo $form->textField($model,'timestamp'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->