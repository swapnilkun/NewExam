<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['b_id']))
{
	$path=$_GET['b_id'];
	$update=unlink("import/".$path);
	if($update)
	{
		header("Location:import_table.php");
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>