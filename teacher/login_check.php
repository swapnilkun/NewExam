<?php
if($_SESSION['center_id']=="" and $_SESSION['email']=="" and $_SESSION['username']=="" and $_SESSION['name']=="" and $_SESSION['category_id']=="" )
{
	redirect_to('index.php');
}
?>