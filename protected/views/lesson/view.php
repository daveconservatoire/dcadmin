<?php
/* @var $this LessonController */
/* @var $model Lesson */

$this->breadcrumbs=array(
	'Lessons'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Lesson', 'url'=>array('index')),
	array('label'=>'Create Lesson', 'url'=>array('create')),
	array('label'=>'Update Lesson', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Lesson', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lesson', 'url'=>array('admin')),
);
?>

<h1>View Lesson #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'filetype',
		'id',
		'seriesno',
		'lessonno',
		'title',
		'urltitle',
		'youtubeid',
		'timestamp',
	),
)); ?>
