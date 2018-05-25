<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['n_id']))
{
	$n_id=$_GET['n_id'];
	$select=mysqli_query($con,"select * from notice where n_id='$n_id'");
	while($row=mysqli_fetch_object($select))
	{
		$status_var=$row->status;
		if($status_var=='0')
		{
			$status_state=1;
		}
		else
		{
			$status_state=0;
		}
		$update=mysqli_query($con,"update notice set status='$status_state' where n_id='$n_id' ");
		if($update)
		{
			header("Location:notice.php");
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
?>