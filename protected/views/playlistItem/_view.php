<?php
/* @var $this PlaylistItemController */
/* @var $data PlaylistItem */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relid')); ?>:</b>
	<?php echo CHtml::encode($data->relid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('youtubeid')); ?>:</b>
	<?php echo CHtml::encode($data->youtubeid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit')); ?>:</b>
	<?php echo CHtml::encode($data->credit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort')); ?>:</b>
	<?php echo CHtml::encode($data->sort); ?>
	<br />


</div>