<?
//Details for a MySQL db connection which can be used for all connections
mysql_connect("localhost", "USERNAME", "PASSWORD") or die(mysql_error());
mysql_select_db("DBNAME") or die(mysql_error());
?>