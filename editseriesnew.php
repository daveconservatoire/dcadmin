<?
include('sql.php');
$series=$_GET['seriesid'];
$herotext="Edit Series";
$herosubtext="Drag and drop to reorder";
include('header.php');
?>


<?
$titlequery = "SELECT * FROM Course WHERE id ='".$series."'";
$result = mysql_query($titlequery) or die(mysql_error());
while($row2 = mysql_fetch_array( $result )) {
?>
<div class="page-header">
	<h3><?=$row2['title']?></h3>
</div>
<?
}
$query="SELECT * FROM Lesson WHERE seriesno='".$series."' ORDER BY lessonno ASC";
$result = mysql_query($query) or die(mysql_error());
?>
<ul id="test-list">  
<?
while($row = mysql_fetch_array( $result )) {
?>

	<li id='listItem_<?=$row['id']?>'>
		<a href='edit' class='btn' style='float: right; margin-top:5px'>Edit</a>
		<h3><?=$row['title']?></h3>
		<div style="clear:both"></div>
	</li>

<?
}
?>
</ul>

</body>
</html>