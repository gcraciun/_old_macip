<?php

include_once("include/header.php");
include_once("include/mysql.php");
include_once("include/functions.php");
include_once("include/notifications.php");


echo '
<table>
  <tbody>
    <tralign="center" valign="center">
      <th>No.</th><th>Client Name</th><th>Client MAC</th><th>Client Ip</th><th>State</th><th>Edit Client</th><th>Activate/Deactivate Client</th>
    </tr>';
list_clients();
echo '
  </tbody>
</table>
</FORM>
';


