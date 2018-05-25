<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$update=mysqli_query($con,"DELETE FROM expenses where id='$id'");
	if($update)
	{
		header("Location:expenses.php");
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>