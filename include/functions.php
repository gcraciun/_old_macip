<?php

function valid_mac($mac)
/*
        Check if the introduced mac is correct and possible
        We see the mac as a format ((letter*2) followed by 2 dots)*5 followed by (letter*2)
        (letter*2 = 2 letters, ex: ae)
*/
  {
    if (!preg_match("/([A-Fa-f0-9]{2}\:){5}[A-Fa-f0-9]{2}/",$mac))
      {
        return (false);
      }
    else
      {
        return (true);
      }
  }


function update_client($id, $name, $mac, $ip, $cir, $mir)
/*
    Updates the fields of a client in the database
*/
  {
    $q = select_client($id);
    $line = mysql_fetch_array($q, MYSQL_ASSOC);
    if ($line['name'] !=  $name)
      if (!valid_name($name)) die ('The name exists already int the database. Error:906');
    if (!valid_mac($mac)) die ('The MAC introduced is incorrect');
    $query_update = "update mac2ip set name='$name', mac='$mac', cir='$cir', mir='$mir' where id='$id'";
    $result_update = mysql_query($query_update) or die ('Could not update. Error:901');
    return true;
  }



function deactivate_client($id, $status)
/*
    Deactivate a client in the database
*/
  {
    if (!valid_name_id($id, 1)) die ('The name exists already in the database. Edit first the client. Error:907');
    $query_deactiv = "update mac2ip set active='$status' where id='$id'";
    $result_deactiv = mysql_query($query_deactiv) or die ('Could not delete. Error:902');
    return true;
  }

function list_clients()
/*
  Select all clients and print them in html
*/
  {
    $query = "select id, name, mac, ip, active from mac2ip where admin_act ='1'";
    $result = mysql_query($query) or die ('Could not select. Error:903');
    $i = 1;
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
      {
        if ($line['active'] == 1)
          echo "<tr><td>".$i++."</td><td>$line[name]</td><td>$line[mac]</td><td>$line[ip]</td><td>Active</td><td><a href=\"edit.php?id=$line[id]\">Edit</td><td><a href=\"deactivate.php?id=$line[id]&status=0\">Deactivate</td><tr>";
        else
          echo "<tr class=\"orange\"><td>".$i++."</td><td>$line[name]</td><td>$line[mac]</td><td>$line[ip]</td><td>Inactive</td><td><a href=\"edit.php?id=$line[id]\">Edit</td><td><a href=\"deactivate.php?id=$line[id]&status=1\">Activate</td><tr>";
      }
    return true;
  }

function select_client($id)
/*
  Select all fields of client $id
*/
  {
    $query_select = "select name, mac, ip, cir, mir from mac2ip where id='$id'";
    $result_select = mysql_query($query_select) or die ('Could not select the client. Error:904');

    return($result_select);
  }


function valid_name($name)
/*
  Search if client name already exists in the database
*/
  {
    if (!isset($name) || empty($name)) die("Error:700");
    $query = "select count(*) from mac2ip where name='$name'";
    $result = mysql_query($query) or die ('Could not search client. Error:905');
    $row = mysql_fetch_row($result);
      print "Row = $row[0]\n";
        if ($row[0] != 0) return false;
    return true;
  }

function valid_name_id($id, $nr)
/*
  Search if client name already exists in the databases, having the id of the client.
*/
  {
    if (!isset($id) || empty($id)) die("Error:701");
    $query = "select count(*) from mac2ip a left join mac2ip b on a.name=b.name where a.id='$id'";
    $result = mysql_query($query) or die ('Could not search client. Error:908');
    $row = mysql_fetch_row($result);
        if ($row[0] != $nr) return false;
    return true;
  }

/*
function valid_ip($ip)
/*
        Check if the introduced ip is correct and possible
*/
/*
  {
    if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4))
      {
        return (false);
      }
    else
      {
        return (true);
      }
  }
*/
