<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Dave Conservatoire - Learn about music for free!</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="/dcadmin/js/jquery.js"></script>
	<script src="/dcadmin/js/jqueryui.js"></script>

<link rel='stylesheet' href='styles.css' type='text/css' media='all' />
<script type="text/javascript">
  // When the document is ready set up our sortable with it's inherant function(s)
  $(document).ready(function() {
    $("#test-list").sortable({
      
      update : function () {
		  var order = $('#test-list').sortable('serialize');
		  $("#info").load("process-sortable.php?"+order);
      }
    });
});
</script>
   <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link rel="stylesheet" href="http://www.daveconservatoire.org/style/css/bootstrap.css">
    <style type="text/css">
      body {
        padding-top: 60px;
      }
      
      .span16 {
      background-color: whiteSmoke;
     
      }
      
      .row {
      padding-bottom: 20px;
      
      }
    </style>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>


  <body>



    <div class="container">
  <!--[if lt IE 7]>  <div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>    <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'><a href='#' onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-cornerx.jpg' style='border: none;' alt='Close this notice'/></a></div>    <div style='width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'>      <div style='width: 75px; float: left;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-warning.jpg' alt='Warning!'/></div>      <div style='width: 275px; float: left; font-family: Arial, sans-serif;'>        <div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>You are using an outdated browser</div>        <div style='font-size: 12px; margin-top: 6px; line-height: 12px;'>For a better experience using this site, please upgrade to a modern web browser.</div>      </div>      <div style='width: 75px; float: left;'><a href='http://www.firefox.com' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox 3.5'/></a></div>      <div style='width: 75px; float: left;'><a href='http://www.browserforthebetter.com/download.html' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8'/></a></div>      <div style='width: 73px; float: left;'><a href='http://www.apple.com/safari/download/' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a></div>      <div style='float: left;'><a href='http://www.google.com/chrome' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a></div>    </div>  </div>  <![endif]-->
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
      <p>Test!</p>
        <h1><?= $herotext?></h1>
        <p><?= $herosubtext?></p> 
        <p><a class="btn large" href="http://daverees4.webfactional.com/dcadmin/">Homepage &raquo;</a></p>
        <p><a class="btn large" href="http://daverees4.webfactional.com/dcadmin/newlesson.php">Add Lesson &raquo;</a></p>
        <p><a class="btn large" href="/addseries.php">Add Series &raquo;</a></p>
       
        <div id="info"></div>
      </div>

      <!-- Example row of columns -->