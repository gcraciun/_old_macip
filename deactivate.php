<?php

include_once("include/mysql.php");
include_once("include/functions.php");

$id = &$_GET['id'];
$status =&$_GET['status'];

if ( ! deactivate_client($id, $status)) die ("Nu am putut modifica");

echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';