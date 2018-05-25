<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['p_q_id']))
{
	$p_q_id=$_GET['p_q_id'];
	$update=mysqli_query($con,"DELETE FROM practice_question where p_q_id='$p_q_id'");
	if($update)
	{
		header("Location:viewquestion.php?&p_e_id=".$_GET['p_e_id']);
	}
	else
	{
		echo mysql_error($con);
	}
}
?>