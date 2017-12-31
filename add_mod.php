<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
</head>
<body>
<?php

mysql_connect('ecs.fullerton.edu', 'cs431s12', 'ouzaechi');
mysql_select_db('cs431s12');

    $username=$_POST['id'];
	echo $username;
    if(mysql_query('insert into moderator(username) values ("'.$username.'")'))
	{
?>
<div class="message">You have successfully added the Moderator.<br />
<a href="index.php">Index Page</a></div>
<?php
	}
	else
	{
?>
<div class="message">Error while adding the Moderator.<br />
<a href="select_user.php">Try again</a></div>
<?php
	}
?>
</body>
</html>