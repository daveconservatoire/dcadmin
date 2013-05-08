<?php
/* @var $this PlaylistItemController */
/* @var $model PlaylistItem */

$this->breadcrumbs=array(
	'Playlist Items'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List PlaylistItem', 'url'=>array('index')),
	array('label'=>'Create PlaylistItem', 'url'=>array('create')),
	array('label'=>'Update PlaylistItem', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PlaylistItem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlaylistItem', 'url'=>array('admin')),
);
?>

<h1>View PlaylistItem #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'text',
		'relid',
		'youtubeid',
		'credit',
		'sort',
	),
)); ?>
