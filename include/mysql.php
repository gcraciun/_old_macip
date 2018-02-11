<?php
$dbhost = "localhost";
$dbuser = "unuser";
$dbpass = "unpass";
$dbase = "dhcpgen";
$link = mysql_pconnect($dbhost, $dbuser, $dbpass) or die('Could not connect'.mysql_error());
mysql_select_db($dbase) or die('Could not select database');
?>
