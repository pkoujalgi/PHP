<?php
//This page let create a new category
include('config.php');
function GetImageExtension($imagetype){
  if(empty($imagetype)) return false;
    switch($imagetype)
    {
      case 'image/bmp': return '.bmp';
      case 'image/gif': return '.gif';
      case 'image/jpeg': return '.jpg';
      case 'image/png': return '.png';
      default: return false;
    }
}
if(isset($_POST['name'], $_POST['description']) and $_POST['name']!='')
{
	$name = $_POST['name'];
	$description = $_POST['description'];
	if(get_magic_quotes_gpc())
	{
		$name = stripslashes($name);
		$description = stripslashes($description);
	}
	$name = mysql_real_escape_string($name);
	$description = mysql_real_escape_string($description);
  $image = file_get_contents(addslashes($_FILES['uploadedimage']['tmp_name']));
  $file_name=$_FILES["uploadedimage"]["name"];
  $imgtype=$_FILES["uploadedimage"]["type"];
  $ext= GetImageExtension($imgtype);
  $imagename=date("d-m-Y")."-".time().$ext;
  $target_path = "images/".$imagename;
  $images = mysql_real_escape_string($image);
  $sql= 'insert into categories (id, name, description,images_path, image, mime, position) select ifnull(max(id), 0)+1, "'.$name.'", "'.$description.'", "'.$target_path.'", "'.$images.'", "'.$ext.'", count(id)+1 from categories';
	if(mysql_query($sql) or die("error in $sql == ----> ".mysql_error()))
	{
	?>
	<div class="message">The category have successfully been created.<br />
  
 Click Here To View Category <a href="<?php echo $url_home; ?>">Go to the forum index</a></div>
<?php
	}
	else
	{
		echo 'An error occured while creating the category.';
	}
}
?>
