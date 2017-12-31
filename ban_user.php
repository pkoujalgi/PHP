<?php
//This page let an user edit his profile
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>Edit your profile</title>
    </head>
    <body>
    	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="Espace Membre" /></a>
	    </div>
		<div class="content">
<?php
if(isset($_SESSION['username']))
{
$nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
$nb_new_pm = $nb_new_pm['nb_new_pm'];
?>
<div class="box">
	<div class="box_left">
    	<a href="<?php echo $url_home; ?>">Forum Index</a> &gt; Edit your profile
    </div>
	<div class="box_right">
    	<a href="list_pm.php">Your messages(<?php echo $nb_new_pm; ?>)</a> - <a href="profile.php?id=<?php echo $_SESSION['userid']; ?>"><?php echo htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></a> (<a href="login.php">Logout</a>)
    </div>
    <div class="clean"></div>
</div>
<?php
	if(isset($_POST['username']))
	{
			     $_POST['username'] = stripslashes($_POST['username']);
					 $username = mysql_real_escape_string($_POST['username']);
          if(mysql_query('update users set dlt = 1 where username="'.$username.'"'))
						{
							$form = false;
							//unset($_SESSION['username'], $_SESSION['userid']);
?>
<div class="message">You have banned user.<br />
<a href="index.php">Login</a></div>
<?php
						}
						else
						{
							$form = true;
							$message = 'An error occured.';
						}
	}
?>
    <form action="ban_user.php" method="post">
        <div class="center"> <b> Select Users whom you want to Ban:</b><br /><br />
            <label for="username">Username</label>

<?php echo '<tr>';
        $query_RsUsers= mysql_query('Select username from users where admin != 1 order by username desc');
        //$RsCourse = mysql_query($query_RsCourse, $conn) or die(mysql_error());
        $totalRows_RsUsers = mysql_num_rows($query_RsUsers);
        if($totalRows_RsUsers)
        {
        echo '<select name="username"><option value="" SELECTED>Selected Users</option>';
            $count=0;

            while ($row = mysql_fetch_array($query_RsUsers, MYSQL_ASSOC))
            {

            $count++;
            echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';
            }
            echo '</select>';
        }
        else
        {
        echo 'No Users to show yet.'; // no rows in tbl_course
        }
        echo '
            </tr>';
?>
             <br /><br /><br />
            <input type="submit" value="Submit" />
        </div>
    </form>

<?php
}
else
{
?>
<h2>You must be logged to access this page:</h2>
<div class="box_login">
	<form action="login.php" method="post">
		<label for="username">Username</label><input type="text" name="username" id="username" /><br />
		<label for="password">Password</label><input type="password" name="password" id="password" /><br />
        <label for="memorize">Remember</label><input type="checkbox" name="memorize" id="memorize" value="yes" />
        <div class="center">
	        <input type="submit" value="Login" /> <input type="button" onclick="javascript:document.location='signup.php';" value="Sign Up" />
        </div>
    </form>
</div>
<?php
}
?>
		</div>
		<div class="foot"><a href="index.php">Simple PHP Forum Script</a> - <a href="index.php">homepage</a></div>
	</body>
</html>
