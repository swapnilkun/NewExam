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

$category = $data->rowcount(0);

for ($i=1; $i<=$category; $i++)
{	
	$c_id = $data->val($i, 1, 0);	
	$category_name = $data->val($i, 2, 0);
	$category_status = $data->val($i, 3, 0);

		$query = "INSERT INTO category (category_name,category_status) VALUES ('$category_name', '$category_status')";
		mysqli_query($con,$query);
	
}



$subcategory = $data->rowcount(1);

for ($i=1; $i<=$subcategory; $i++)
{
	
	$s_c_id = $data->val($i, 1, 1);	
	$category_id = $data->val($i, 2, 1);
	$subcategory_name = $data->val($i, 3, 1);	
	$subcategory_status = $data->val($i, 4, 1);


	
		$query = "INSERT INTO subcategory (category_id,subcategory_name,subcategory_status) VALUES ('$category_id', '$subcategory_name', '$subcategory_status')";
		mysqli_query($con,$query);
	
	
}


$subject = $data->rowcount(2);
for ($i=1; $i<=$subject; $i++)
{
	
	$s_id = $data->val($i, 1, 2);
	$category_id = $data->val($i, 2, 2);
	$subcategory_id = $data->val($i, 3, 2);
	$subject_name = $data->val($i, 4, 2);
	$subject_status = $data->val($i, 5, 2);

	
		$query = "INSERT INTO subject (category_id,subcategory_id,subject_name,subject_status) VALUES ('$category_id', '$subcategory_id', '$subject_name','$subject_status')";
		mysqli_query($con,$query);
	
}

############ QUESTION ############
$question = $data->rowcount(3);
for ($i=1; $i<=$question; $i++)
{
	
	$q_id = $data->val($i, 1, 3);
	$s_id = $data->val($i, 2, 3);
	$c_id = $data->val($i, 3, 3);
	$s_c_id = $data->val($i, 4, 3);
	$question_status = $data->val($i, 5, 3);
	$marks = $data->val($i, 6, 3);
	$question_type = $data->val($i, 7, 3);
	
		$query = "INSERT INTO questions_table (s_id, c_id, s_c_id, question_status, marks, question_type) 
		
		VALUES ('$s_id','$c_id','$s_c_id','$question_status','$marks','$question_type')";
		mysqli_query($con,$query);
	
}


############ OBJECTIVE QUESTION ############
$question1 = $data->rowcount(4);
//$q_id=$_GET['q_id'];
for ($i=1; $i<=$question1; $i++)
{
	
	$q_id = $data->val($i, 1, 4);
	$o_q_id = $data->val($i, 2, 4);
	$question = $data->val($i, 3, 4);
	$typeofquestion = $data->val($i, 4, 4);
	$option_a = $data->val($i, 5, 4);
	$option_b = $data->val($i, 6, 4);
	$option_c = $data->val($i, 7, 4);
	$option_d = $data->val($i, 8, 4);
	$correct_ans = $data->val($i, 9, 4);
	
	 $query="(SELECT q.q_id FROM questions_table q, objective_table o WHERE q.q_id=o.q_id)";

	
		$query1= "INSERT INTO objective_table (q_id,question,typeofquestion,option_a,option_b,option_c,option_d,correct_ans) 
		
		VALUES ('$o_q_id','$question','$typeofquestion', '$option_a', '$option_b','$option_c','$option_d', '$correct_ans')";
		mysqli_query($con,$query1);
	
}




///////////////student//////////////
echo $student = $data->rowcount(5);
for ($i=1; $i<=$student; $i++)
{
	$student_id = $data->val($i, 1, 5);
	$category_id = $data->val($i, 2, 5);
	$subcategory_id = $data->val($i, 3, 5);
	$subject_id = $data->val($i, 4, 5);
	$b_id = $data->val($i, 5, 5);
	$student_name = $data->val($i, 6, 5);
	$student_father = $data->val($i, 7, 5);
	$student_mother = $data->val($i, 8, 5);
	$student_dob = $data->val($i, 9, 5);
	$student_address = $data->val($i, 10, 5);
	$student_phone = $data->val($i, 11,5);
	$student_email = $data->val($i, 12,5);
	$user_name = $data->val($i, 13,5);
	$password = $data->val($i, 14,5);
	$password_md5 = $data->val($i, 15,5);
	$student_status = $data->val($i, 16, 5);
	$studentlogo = $data->val($i, 17, 5);
	
				$query = "INSERT INTO student (category_id,subcategory_id,subject_id,b_id,student_name,student_father,student_mother,student_dob,student_address,student_phone,student_email,user_name,password,password_md5,student_status,studentlogo) VALUES ('$category_id','$subcategory_id','$subject_id','$b_id','$student_name','$student_father','$student_mother','$student_dob','$student_address','$student_phone','$student_email','$user_name','$password','$password_md5','$student_status','$student_logo')";

		mysqli_query($con,$query);
	
	
}    

header("Location:import_table.php");

?>