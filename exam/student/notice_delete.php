<?php
include('include/configure.php');

if(isset($_GET['n_id']))
{
	$id=$_GET['n_id'];
	$query=mysqli_query($con,"delete from noticestudent where student_id='".$_SESSION['student_id']."' AND notice_id='".$notice_id."'");
	if($query)
	{
		 header("location:notice.php");
	}
	else
	{
		mysqli_error($con);
	}
}
?>