<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['b_id']))
{
	$path=$_GET['b_id'];
	$update=unlink("export/".$path);
	if($update)
	{
		header("Location:export_table.php");
	}
	else
	{
		echo mysql_error($con);
	}
}
?>