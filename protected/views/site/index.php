<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Here are some things you might like to do!</p>

<p><?php echo CHtml::link('Create a New Lesson',array('lesson/create')); ?></p>
<p><?php echo CHtml::link('Create a New Course',array('course/create')); ?></p>
<p><?php echo CHtml::link('Edit an Existing Course',array('course/index')); ?></p>