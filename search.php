<?php

include_once("include/header.php");
include_once("include/mysql.php");
include_once("include/functions.php");
include_once("include/notifications.php");


if (!isset($_POST['sstring']) || empty($_POST['sstring'])) die("Eroare");
$sstring = &$_POST['sstring'];

echo '
<input type="button" name="Back" value="Back" onClick="location.href = \'index.php\'">
<table>  
  <tbody>
    <tralign="center" valign="center">
      <td>Client Name</td><td>Client Mac</td><td>Client Ip</td><td>CIR</td><td>MIR</td><td>Edit Client</td><td>Delete Client</td>
    </tr>';
search_client($sstring);
//list_clients();
echo '
  </tbody>
</table>
';
