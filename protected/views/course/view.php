<?php
/* @var $this CourseController */
/* @var $model Course */

$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Course', 'url'=>array('index')),
	array('label'=>'Create Course', 'url'=>array('create')),

);

Yii::app()->clientScript->registerCoreScript('jquery');
?>

<h1><?php echo $model->title; ?> - Topics</h1>
<? if(Yii::app()->user->hasFlash('ytupdate')){
	
	echo "<h3>".Yii::app()->user->getFlash('ytupdate')."</h3>";
}
?>
<div id="info"></div>
<ul id="sort-list">  
<? $topics=Topic::model()->findAll("courseId=".$model->id ." ORDER BY sortorder");



foreach ($topics as $topic) {
?>
	<li id='listItem_<? echo $topic->id; ?>' style="border: 1px solid; padding: 5px; margin: 5px">
	
		<?php echo CHtml::link('View Topic', array('topic/view', 'id'=>$topic->id) , array('style'=>'float: right; margin-top:5px')); ?>
		<h4><?=$topic->title;?></h4>

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
		  $("#info").load("<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/processtopics/?"+order);
      }
    });
});
</script>