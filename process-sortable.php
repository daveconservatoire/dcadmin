include ('sql.php');
foreach ($_GET['listItem'] as $position => $item) :
    $position=$position+1;
    mysql_query("UPDATE `Lesson` SET `lessonno` = $position WHERE `id` = $item");
endforeach;