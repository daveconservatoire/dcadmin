<?php
/* @var $this LessonController */
/* @var $model Lesson */

$this->breadcrumbs=array(
	'Lessons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Lesson', 'url'=>array('index')),
	array('label'=>'Manage Lesson', 'url'=>array('admin')),
);
?>

<h1>Create Lesson</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>