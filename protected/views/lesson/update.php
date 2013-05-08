<?php
/* @var $this LessonController */
/* @var $model Lesson */

$this->breadcrumbs=array(
	'Lessons'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update Lesson - <?php echo $model->title; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<iframe width="560" height="315" src="http://www.youtube.com/embed/<?=$model->youtubeid;?>" frameborder="0" allowfullscreen></iframe>