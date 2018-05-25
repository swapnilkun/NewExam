<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['b_id']))
{
	$b_id=$_GET['b_id'];
	$update=mysqli_query($con,"DELETE FROM batch where b_id='$b_id'");
	if($update)
	{
		header("Location:batch.php");
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>