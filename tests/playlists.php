<?
include('../sql.php');
$query = "SELECT * FROM PlaylistItem";
$items = mysql_query($query) or die(mysql_error());
$column = array();
$titles = array();
while($row = mysql_fetch_array($items)){
    $column[] = $row['youtubeid'];
    $titles[] = $row['title'];
};
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>
			title
		</title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" charset="utf-8">
		 $(document).ready(function() {
			$('#start').click(function() {
			
			<?
 $js_array = json_encode($column);
  $js_titles = json_encode($titles);
echo "var ytarray = ". $js_array . ";\n";
echo "var yttitles = ". $js_titles . ";\n";
?>

    urlExists = function(url){
        return $.ajax({
            type: 'HEAD',
            url: url
        });
    },
    output = function(state, i) {
        var tr  = $('<tr />'),
            td1 = $('<td />', {text: yttitles[i]}),
            td2 = $('<td />', {text: ytarray[i]}),
            td3 = $('<td />', {text: state ? 'Found' : 'Not found', 
                               style: state ? 'color: green' : 'color:red'});

        $('#rows').append( tr.append(td1, td2, td3) );
    },
    _length = ytarray.length;

for (var i = 0; i < _length; i++) {
    (function(k) {
        urlExists('http://gdata.youtube.com/feeds/api/videos/' + ytarray[k])
           .done(function() {
                output(true, k);
                })
           .fail(function() {
                output(false, k);
        });
    })(i);
}

});
});
		</script>
	</head>
	<body>
	<h3>Dave Conservatoire - Playlist tests - <a href="#" id="start">click to start</a></h3>
	<hr />
	<table border="1" style='width: 100%;' id='rows'>
	<tr >
		<td>Title</td><td>YoutubeID</td><td>Status</td>	
	</tr>
	</table>
	
	
	
	</body>
</html>