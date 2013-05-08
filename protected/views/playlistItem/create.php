<?php
/* @var $this PlaylistItemController */
/* @var $model PlaylistItem */

$this->breadcrumbs=array(
	'Playlist Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PlaylistItem', 'url'=>array('index')),
	array('label'=>'Manage PlaylistItem', 'url'=>array('admin')),
);
?>

<h1>Create PlaylistItem</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>