<?php

include_once("include/mysql.php");
include_once("include/functions.php");

$name = &$_POST['name'];
$mac = &$_POST['mac'];
$ip = &$_POST['ip'];

if ( ! insert_client($name, $mac, $ip)) die ("Could not insert client");

echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
