<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['s_id']))
{
	 $s_id=$_GET['s_id'];

	$select=mysqli_query($con,"select * from subject where s_id='$s_id'");
	while($row=mysqli_fetch_object($select))
	{
		$status_var=$row->subject_status;
		if($status_var=='0')
		{
			$status_state=1;
		}
		else
		{
			$status_state=0;
		}
		$update=mysqli_query($con,"update subject set subject_status='$status_state' where s_id='$s_id' ");
		if($update)
		{
			header("Location:subject.php");
		}
		else
		{
			echo mysql_error($con);
		}
	}
}
?>