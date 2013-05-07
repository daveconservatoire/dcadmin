<?
include('sql.php');
if(isset($_POST['lessontitle']) && isset($_POST['lessonyoutube'])){

$titlequery = "SELECT * FROM Lesson WHERE seriesno ='".$_POST['series']."'";
$result = mysql_query($titlequery) or die(mysql_error());
$lessonno=0;
while($row2 = mysql_fetch_array( $result )) {
$lessonno++;
}
$lessonno++;
mysql_query("INSERT INTO Lesson (filetype, seriesno, lessonno, title, urltitle, youtubeid) VALUES ('l','".$_POST['series']."', '".$lessonno."','".$_POST['lessontitle']."', '".$_POST['lessonurl']."','".$_POST['lessonyoutube']."')");

if(isset($_POST['tweet'])){
include('twitter.class.php');
include('twitter.secrets.php');




$twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

$twitter->send('New Lesson: '.$_POST['lessontitle'].' (daveconservatoire.org/lesson/'.$_POST['lessonurl'].')');
}



header('Location: editseriesnew.php?seriesid='.$_POST['series']);
}


$herotext="Add new lesson";
$herosubtext="Congrats for making one!";
include('header.php');
?>

<div class="row">
<div class="span16">
      <form method="post" action="newlesson.php">
        <fieldset>
       
          <div class="clearfix">
            <label for="xlInput">Lesson Title</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="lessontitle" size="130" type="text" />
            </div>
          </div><!-- /clearfix -->
          <div class="clearfix">
            <label for="series">Series</label>
            <div class="input">
              <select name="series" id="series">
              <?
$titlequery = "SELECT * FROM Course";
$result = mysql_query($titlequery) or die(mysql_error());
while($row2 = mysql_fetch_array( $result )) {
?>
<option value='<?=$row2['id']?>'><?=$row2['title']?></option>
<?
}
?>
           
              </select>
            </div>
          </div><!-- /clearfix -->
                    <div class="clearfix">
            <label for="xlInput">YouTube ID</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="lessonyoutube" size="130" type="text" />
            </div>
          </div><!-- /clearfix -->
                      <label for="xlInput">URL Title</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="lessonurl" size="130" type="text" />
            </div>
                      <label for="xlInput">Promote on Twitter?</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="tweet" size="130" type="checkbox" />
            </div>
       <br />
       
   
          <div class="actions">
            <input type="submit" class="btn primary" value="Save changes">&nbsp;<button type="reset" class="btn">Cancel</button>
          </div>
        </fieldset>
      </form>
</div>
</div>
</body>
</html>