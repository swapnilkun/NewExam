<?php
ini_set ( 'memory_limit', '64M' );
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');

error_reporting(E_ALL ^ E_NOTICE);


require_once 'excel_reader2.php';

$filename=$_GET['import'];
$directory="import/".$filename;
$data = new Spreadsheet_Excel_Reader($directory);


############ QUESTION ############
$question = $data->rowcount(0);
for ($i=1; $i<=$question; $i++)
{
	
	$q_id = $data->val($i, 1, 0);
	$s_id = $data->val($i, 2, 0);
	$c_id = $data->val($i, 3, 0);
	$s_c_id = $data->val($i, 4, 0);
	$question_status = $data->val($i, 5, 0);
	$marks = $data->val($i, 6, 0);
	$question_type = $data->val($i, 7, 0);
	
		$query = "INSERT INTO questions_table (s_id, c_id, s_c_id, question_status, marks, question_type) 
		
		VALUES ('$s_id','$c_id','$s_c_id','$question_status','$marks','$question_type')";
		mysqli_query($con,$query);
	
}


############ OBJECTIVE QUESTION ############
$question1 = $data->rowcount(1);
//$q_id=$_GET['q_id'];
for ($i=1; $i<=$question1; $i++)
{
	
	$q_id = $data->val($i, 1, 1);
	$o_q_id = $data->val($i, 2, 1);
	$question = $data->val($i, 3, 1);
	$typeofquestion = $data->val($i, 4, 1);
	$option_a = $data->val($i, 5, 1);
	$option_b = $data->val($i, 6, 1);
	$option_c = $data->val($i, 7, 1);
	$option_d = $data->val($i, 8, 1);
	$correct_ans = $data->val($i, 9, 1);
	
	 $query="(SELECT q.q_id FROM questions_table q, objective_table o WHERE q.q_id=o.q_id)";

	
		$query1= "INSERT INTO objective_table (q_id,question,typeofquestion,option_a,option_b,option_c,option_d,correct_ans) 
		
		VALUES ('$o_q_id','$question','$typeofquestion', '$option_a', '$option_b','$option_c','$option_d', '$correct_ans')";
		mysqli_query($con,$query1);
	
}





header("Location:import_table.php");

?>