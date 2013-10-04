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

<h1><?php echo $model->title; ?></h1>
<? if(Yii::app()->user->hasFlash('ytupdate')){
	
	echo "<h3>".Yii::app()->user->getFlash('ytupdate')."</h3>";
}
?>
<div id="info"></div>
<ul id="sort-list">  
<? $lessons=Lesson::model()->findAll("topicno=".$model->id." AND seriesno =4 ORDER BY lessonno");



foreach ($lessons as $lesson) {
?>
	<li id='listItem_<? echo $lesson->id; ?>' style="border: 1px solid; padding: 5px; margin: 5px
	<? if ($lesson->description==""){ echo "; color: red;";}?>">
		<?php echo CHtml::link('Edit', array('lesson/update', 'id'=>$lesson->id) , array('style'=>'float: right; margin-top:5px')); ?>
		<h4><?=$lesson->title;?></h4>
		<p><? echo $lesson->description;?></p>
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
		  $("#info").load("<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/process/?"+order);
      }
    });
});
</script>