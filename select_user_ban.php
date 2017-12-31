<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
<body>
<form action="ban_user.php" method="post">
<select name='id'>
<?php

$conn = new mysqli('ecs.fullerton.edu', 'cs431s12', 'ouzaechi', 'cs431s12') 
or die ('Cannot connect to db');

    $result = $conn->query("select id, username from users");
    
  
    while ($row = $result->fetch_assoc()) {

                  unset($id, $username);
                  $id = $row['id'];
                  $username = $row['username']; 
                  echo '<option value="'.$username.'">'.$username.'</option>';
}
?>
</select>
<input type="submit" value="ban user" />
</form>
</body>
</html>