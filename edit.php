<?php

include_once("include/header.php");
include_once("include/mysql.php");
include_once("include/functions.php");

$id = &$_GET['id'];

$q = select_client($id);

while ($line = mysql_fetch_array($q, MYSQL_ASSOC))
  {

echo '
<FORM action="update.php" method="POST">
<input type="hidden" name="id" value="'.$id.'">
<table>
  <tbody>
    <tr>
      <td>Name</td>
      <td><INPUT type="text" name="name" size="18" value="'.$line['name'].'"></td>
    </tr>
    <tr>
      <td>Mac</td>
      <td><INPUT type="text" name="mac" size="14" value="'.$line['mac'].'"></td>
    </tr>
    <tr>
      <td>IP</td>
      <td><INPUT type="text" name="ip" size="14" value="'.$line['ip'].'"></td>
    </tr>
    <tr>
      <td>CIR</td>
      <td><INPUT type="text" name="cir" size="14" value="'.$line['cir'].'"></td>
    </tr>
    <tr>
      <td>MIR</td>
      <td><INPUT type="text" name="mir" size="14" value="'.$line['mir'].'"></td>
    </tr>    
    <tr>
      <td>Update</td>
      <td><INPUT type="submit" value="Update"></td>
    </tr>
  </tbody>
</table>  
</FORM>';


  }

