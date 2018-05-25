<?php
include('include/configure.php');
if(isset($_GET['s_c_id']))
{
	$s_c_id=$_GET['s_c_id'];
	$update=mysqli_query($con,"DELETE FROM subcategory where s_c_id='$s_c_id'");
	if($update)
	{
		header("Location:sub_category.php");
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>