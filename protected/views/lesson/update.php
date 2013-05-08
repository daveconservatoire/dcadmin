<?php
/* @var $this LessonController */
/* @var $model Lesson */

$this->breadcrumbs=array(
	'Lessons'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Lesson', 'url'=>array('index')),
	array('label'=>'Create Lesson', 'url'=>array('create')),
	array('label'=>'View Lesson', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Lesson', 'url'=>array('admin')),
);
?>

<h1>Update Lesson <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>