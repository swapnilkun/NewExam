<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['center_id']))
{
	$c_id=$_GET['center_id'];
	$update=mysqli_query($con,"DELETE FROM teacher where center_id='$c_id'");
	if($update)
	{
		header("Location:center.php");
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>