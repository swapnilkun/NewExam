<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['s_id']))
{
	 $s_id=$_GET['s_id'];
	$update=mysqli_query($con,"DELETE FROM subject where s_id='$s_id'");
	if($update)
	{
		header("Location:subject.php");
	}
	else
	{
		echo mysql_error($con);
	}
}
?>