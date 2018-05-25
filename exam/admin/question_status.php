<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['q_id']))
{
	$q_id=$_GET['q_id'];
	$select=mysqli_query($con,"select * from questions_table where q_id='$q_id'");
	while($row=mysqli_fetch_object($select))
	{
		$status_var=$row->question_status;
		if($status_var=='0')
		{
			$status_state=1;
		}
		else
		{
			$status_state=0;
		}
		$update=mysqli_query($con,"update questions_table set question_status='$status_state' where q_id='$q_id'");
		if($update)
		{
			header("Location:viewquestion.php?&s_id=".$_GET['s_id']);
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
?>