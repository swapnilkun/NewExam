<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['u_id']))
{
	$u_id=$_GET['u_id'];
	$update=mysqli_query($con,"DELETE FROM user where u_id='$u_id'");
	if($update)
	{
		header("Location:user.php");
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>