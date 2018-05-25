<?php
if($_SESSION['user_id']=="" and $_SESSION['useremail']=="" and $_SESSION['admin_username']=="" and $_SESSION['area_permistion']=="")
{
	redirect_to('index.php');
}
?>