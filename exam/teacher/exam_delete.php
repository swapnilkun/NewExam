<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['e_id']))
{
	$e_id=$_GET['e_id'];
	$query=mysqli_query($con,"delete from exam where e_id='$e_id'");
	if($query)
	{
		header("location:exam.php");
    }
	else
	{
		mysql_error($con);
	}
}
?>