<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['center_id']))
{
	$center_id=$_GET['center_id'];
	$select=mysqli_query($con,"select * from teacher where center_id='$center_id'");
	while($row=mysqli_fetch_object($select))
	{
		$status_var=$row->teacher_status;
		if($status_var=='0')
		{
			$status_state=1;
		}
		else
		{
			$status_state=0;
		}
		$update=mysqli_query($con,"update teacher set teacher_status='$status_state' where center_id='$center_id' ");
		if($update)
		{
			header("Location:center.php");
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
?>