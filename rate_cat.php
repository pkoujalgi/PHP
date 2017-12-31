<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
</head>
<body>
<?php
session_start();
$Rating=$_SESSION['myssession'];

mysql_connect('ecs.fullerton.edu', 'cs431s12', 'ouzaechi');
mysql_select_db('cs431s12');
$rating= mysql_query('insert into categories(Rating) values ("'.$Rating.'")');
$sql = "SELECT * FROM categories WHERE Rating='$Rating'";
        $Rating = mysql_query ($sql) or die (mysql_error ());
        while ($row = mysql_fetch_array ($Rating)){

        ?>

        <form action="index.php" method="post">
            Name
            
            <input type="text" name="Rating" value="<?php echo $row ['Rating']; ?>" size=17>
            <input type="submit" name="submit" value="Update">
        </form>
        <?php
        }
        ?>
        </p>
    </body>
</html>