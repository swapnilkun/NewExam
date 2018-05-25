<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['branch_id']))
{
	$branch_id=$_GET['branch_id'];
	$update=mysqli_query($con,"DELETE FROM branch where branch_id='$branch_id'");
	if($update)
	{
		header("Location:branch.php");
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>