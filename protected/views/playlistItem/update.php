<?php
/* @var $this PlaylistItemController */
/* @var $model PlaylistItem */

$this->breadcrumbs=array(
	'Playlist Items'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PlaylistItem', 'url'=>array('index')),
	array('label'=>'Create PlaylistItem', 'url'=>array('create')),
	array('label'=>'View PlaylistItem', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PlaylistItem', 'url'=>array('admin')),
);
?>

<h1>Update PlaylistItem <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>