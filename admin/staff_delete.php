<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['staff_id']))
{
	$staff_id=$_GET['staff_id'];
	$update=mysqli_query($con,"DELETE FROM staff where staff_id='$staff_id'");
	if($update)
	{
		header("Location:staff.php");
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>