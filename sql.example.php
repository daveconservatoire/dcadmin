//Details for a MySQL db connection which can be used for all connections

<?
mysql_connect("localhost", "dbname", "dbpass") or die(mysql_error());
mysql_select_db("dbuser") or die(mysql_error());
?>