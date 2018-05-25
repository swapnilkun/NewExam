<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['q_id']))
{
	$q_id=$_GET['q_id'];
	$o_q_id=$_GET['o_q_id'];
	$s_q_id=$_GET['s_q_id'];
	$question_type=$_GET['question_type'];
	 $query="(SELECT q.question_type FROM questions_table q WHERE q.q_id=q_id)";
	if($question_type ='subjective')
	 {
		 $update=mysqli_query($con,"DELETE questions_table, subjective_table FROM questions_table INNER JOIN subjective_table ON questions_table.q_id= subjective_table.q_id where subjective_table.q_id='".$q_id."' AND subjective_table.s_q_id='".$s_q_id."' ");
	
	 }
	 if($question_type ='objective') {
		 
		 $update=mysqli_query($con,"DELETE questions_table, objective_table FROM questions_table INNER JOIN objective_table ON questions_table.q_id= objective_table.q_id where objective_table.q_id='".$q_id."' AND objective_table.o_q_id='".$o_q_id."' ");
	
	 }
	
	if($update)
	{
		header("Location:question.php");
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>