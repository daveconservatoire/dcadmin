<?php
/* @var $this LessonController */
/* @var $model Lesson */

Yii::app()->clientScript->registerCoreScript('jquery');

$this->breadcrumbs=array(
	'Lessons'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(

	array('label'=>'Delete Lesson', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this lesson?')),

);
?>



<h1>Update Lesson - <?php echo $model->title; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<? if ($model->filetype=="l"):?>

<iframe width="560" height="315" src="http://www.youtube.com/embed/<?=$model->youtubeid;?>" frameborder="0" allowfullscreen></iframe>

<? elseif($model->filetype="p"):?>

<hr />

<h3>Playlist Contents</h3>
<div id="info"></div>
<ul id="sort-list">  
<?
$playlistitems=PlaylistItem::model()->findAll("relid=".$model->id." ORDER BY sort");
foreach($playlistitems as $playlistitem){

?>
	<li id='listItem_<? echo $playlistitem->id; ?>' style="border: 1px solid; padding: 5px; margin: 5px">
		<?php echo CHtml::link('Edit', array('playlistitem/update', 'id'=>$playlistitem->id) , array('style'=>'float: right; margin-top:5px')); ?>
		<h4><?=$playlistitem->title;?></h4>
		<div style="clear:both"></div>
	</li>
	<?
}

?>
</ul>

	<script type="text/javascript">
  // When the document is ready set up our sortable with it's inherant function(s)
  $(document).ready(function() {
    $("#sort-list").sortable({
      
      update : function () {
		  var order = $('#sort-list').sortable('serialize');
		  $("#info").load("<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/processplaylist/?"+order);
      }
    });
});
</script>

<? endif;?>