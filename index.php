<?
$herotext="DCon Admin";
$herosubtext="Add series and videos";
include('header.php');
include('sql.php');

$query="SELECT * FROM Course";
$result = mysql_query($query) or die(mysql_error());  
while($row = mysql_fetch_array( $result )) {
?>
<div class='row'>
	<div id='listItem_<?=$row['id']?>'>
		<a href='editseriesnew.php?seriesid=<?=$row['id']?>' class='btn' style='float: right; margin-top:5px'>Edit</a>
		<h3><?=$row['title']?></h3>
	</div>
</div>
<?
}
include('footer.php');
?>
      
      
      

		 

