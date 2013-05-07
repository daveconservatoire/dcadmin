	<?php
/* This is where you would inject your sql into the database 
   but we're just going to format it and send it back
*/
include ('sql.php');
foreach ($_GET['listItem'] as $position => $item) :
    $position=$position+1;
    mysql_query("UPDATE `Lesson` SET `lessonno` = $position WHERE `id` = $item");
	$sql[] = "UPDATE `Lesson` SET `lessonno` = $position WHERE `id` = $item";
endforeach;

print_r ($sql);
?>