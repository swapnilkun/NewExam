<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['p_q_id']))
{
	$p_q_id=$_GET['p_q_id'];
	$select=mysqli_query($con,"select * from practice_question where p_q_id='$p_q_id'");
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
		$update=mysqli_query($con,"update practice_question set question_status='$status_state' where p_q_id='$p_q_id'");
		if($update)
		{
			header("Location:viewquestion.php?p_e_id=".$_GET['p_e_id']);
		}
		else
		{
			echo mysql_error($con);
		}
	}
}
?>