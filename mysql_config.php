<?php
/**********MYSQL Settings****************/
$host="ecs.fullerton.edu";
$databasename="cs431s12";
$user="cs431s12";
$pass="ouzaechi";
/**********MYSQL Settings****************/


$conn=mysql_connect($host,$user,$pass);

if($conn)
{
$db_selected = mysql_select_db($databasename, $conn);
if (!$db_selected) {
   die ('Can\'t use foo : ' . mysql_error());
}
}
else
{
   die('Not connected : ' . mysql_error());
}
?>
