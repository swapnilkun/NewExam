<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['s_id']))
{
	$s_id=$_GET['s_id'];
	$select=mysqli_query($con,"select * from student where student_id='$s_id'");
	while($row=mysqli_fetch_object($select))
	{
		$status_var=$row->student_status;
		if($status_var=='0')
		{
			$status_state=1;
		}
		else
		{
			$status_state=0;
		}
		$update=mysqli_query($con,"update student set student_status='$status_state' where student_id='$s_id' ");
		if($update)
		{
			header("Location:student.php");
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
?>