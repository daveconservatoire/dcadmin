<?php
/* @var $this LessonController */
/* @var $data Lesson */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('filetype')); ?>:</b>
	<?php echo CHtml::encode($data->filetype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seriesno')); ?>:</b>
	<?php echo CHtml::encode($data->seriesno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lessonno')); ?>:</b>
	<?php echo CHtml::encode($data->lessonno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('urltitle')); ?>:</b>
	<?php echo CHtml::encode($data->urltitle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('youtubeid')); ?>:</b>
	<?php echo CHtml::encode($data->youtubeid); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('timestamp')); ?>:</b>
	<?php echo CHtml::encode($data->timestamp); ?>
	<br />

	*/ ?>

</div>