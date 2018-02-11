<?php

include_once("include/mysql.php");
include_once("include/functions.php");

$id = &$_POST['id'];
$name = &$_POST['name'];
$mac = &$_POST['mac'];
$ip = &$_POST['ip'];
$cir = &$_POST['cir'];
$mir = &$_POST['mir'];

if (! update_client($id, $name, $mac, $ip, $cir, $mir)) die ("Could not update client");

echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
