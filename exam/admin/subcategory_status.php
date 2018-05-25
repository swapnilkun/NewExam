<?php
include('include/configure.php');
if(isset($_GET['s_c_id']))
{
	$s_c_id=$_GET['s_c_id'];
	$select=mysqli_query($con,"select * from subcategory where s_c_id='$s_c_id'");
	while($row=mysqli_fetch_object($select))
	{
		$status_var=$row->subcategory_status;
		if($status_var=='0')
		{
			$status_state=1;
		}
		else
		{
			$status_state=0;
		}
		$update=mysqli_query($con,"update subcategory set subcategory_status='$status_state' where s_c_id='$s_c_id'");
		if($update)
		{
			header("Location:sub_category.php");
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
?>