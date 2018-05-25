<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['c_id']))
{
	$c_id=$_GET['c_id'];
	$update=mysqli_query($con,"DELETE FROM category where c_id='$c_id'");
	if($update)
	{
		header("Location:category.php");
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>