<?php
/******************************************************
------------------Required Configuration---------------
Please edit the following variables so the forum can
work correctly.
******************************************************/

//We log to the DataBase
mysql_connect('ecs.fullerton.edu', 'cs431s12', 'ouzaechi');
mysql_select_db('cs431s12');

//Username of the Administrator
$admins = query("select id, username from users");
$array= $admins->fetch_assoc()
function is_admin($username, $array) {
  foreach($array as $name) {
    if($name == $username) {
      return true;
    }
  }
  return false;
}

/******************************************************
-----------------Optional Configuration----------------
******************************************************/

//Forum Home Page
$url_home = 'index.php';

//Design Name
$design = 'default';


/******************************************************
----------------------Initialization-------------------
******************************************************/
include('init.php');
?>