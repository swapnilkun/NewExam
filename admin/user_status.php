<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['u_id']))
{
	$u_id=$_GET['u_id'];
	$select=mysqli_query($con,"select * from user where u_id='$u_id'");
	while($row=mysqli_fetch_object($select))
	{
		$status_var=$row->user_status;
		if($status_var=='0')
		{
			$status_state=1;
		}
		else
		{
			$status_state=0;
		}
		$update=mysqli_query($con,"update user set user_status='$status_state' where u_id='$u_id' ");
		if($update)
		{
			header("Location:user.php");
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
?>