<?
Yii::app()->clientScript->registerCoreScript('jquery');

$items = PlaylistItem::model()->findAll('1');
$column = array();
$titles = array();
foreach($items as $item){
    $column[] = $item->youtubeid;
    $titles[] = $item->title;
};
?>
	



	
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








	<h3>Dave Conservatoire - Playlist tests - <a href="#" id="start">click to start</a></h3>
	<hr />
	<table style='width: 100%;' id='rows'>
	<tr >
		<td>Title</td><td>YoutubeID</td><td>Status</td>	
	</tr>
	</table>