<?php
/* @var $this PlaylistItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Playlist Items',
);

$this->menu=array(
	array('label'=>'Create PlaylistItem', 'url'=>array('create')),
	array('label'=>'Manage PlaylistItem', 'url'=>array('admin')),
);
?>

<h1>Playlist Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
