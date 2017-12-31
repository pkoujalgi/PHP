<?php

mysql_connect('ecs.fullerton.edu', 'cs431s12', 'ouzaechi');
mysql_select_db('cs431s12');

    $rate=$_POST['rate'];
    $parent=$_POST['parent'];
    $username=$_POST['username'];
    $newURL=$_POST['redirect'];
    if(mysql_query('INSERT INTO rating (username,parent,rating) VALUES("'.$username.'",'.$parent.','.$rate.') ON DUPLICATE KEY UPDATE rating='.$rate.''))
	
	{
	echo '<script type="text/javascript">
           window.location = "'.$newURL.'"
      </script>';
	}
else {
	echo "Error!";
}
?>
