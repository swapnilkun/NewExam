<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
unset($_SESSION['Current_time_exam']);


if($_POST['exam_id']!="")
{
	$e_id=decrypt_string($_POST['exam_id']);
	$given_exam_date =date('Y-m-d');
	$query_check_center=mysqli_query($con,"select * from exam where  e_id='".$e_id."' and exam_status=1");// Fatch center Id in Exam table
	$row_check_center=mysqli_fetch_array($query_check_center);
	$center_id_explode=explode(",",$row_check_center['center_id']);
	if(in_array($_SESSION['center_id'],$center_id_explode))
	{
		 $center_id=$_SESSION['center_id'];// Find center Id
	}
}
//Print_R($_POST);
$question_id_get=substr($_POST['question_id_get'],0,-1);
$question_id_get_explode=explode(',',$question_id_get);
//print_r($question_id_get_explode);
$count_total_question_get=count($question_id_get_explode);
//echo $question_id_get;
$query=mysqli_query($con,"select * from exam where  e_id='".$e_id."' and exam_status=1");
$row=mysqli_fetch_array($query);

//print_r($row);

if($row['re_exam_day']==0)
{
	$query1 = "select * from main_exam_status where subject_id='".$row['subject_id']."' and exam_id='".$e_id."' and student_id='".$_SESSION['student_id']."'";
	$check_exam_query1=mysqli_num_rows(mysqli_query($con,$query1));
	if($check_exam_query1 >=1)
	{	
		$error .='&nbsp; This exam has already been taken! ';
	}
	else
	{
	
		$query1 = "select max(exam_date) from main_exam_status where exam_id='".$e_id."' and student_id='".$_SESSION['student_id']."'";
		$result1 = mysqli_query($con,$query1) or die ("Error in query: $query. " .mysqli_error($con));
		$row1 = mysqli_fetch_row($result1);
		$date2= $row1[0];
		$date1 = date('Y-m-d');
		$days = floor(abs((strtotime($date1) - strtotime($date2))) / (60 * 60 * 24));
		$re_exam_day=$row['re_exam_day'];
		$Diff_day_sow_your_exam=$row['re_exam_day']-$days;

		$query_noofattemps = "select max(noofattemps) from main_exam_status where exam_id='".$e_id."' and student_id='".$_SESSION['student_id']."'";
		$result_noofattemps = mysqli_query($con,$query_noofattemps) or die ("Error in query: $query. " .mysqli_error($con));
		$row_noofattemps = mysqli_fetch_row($result_noofattemps);
		$noofattemps= $row_noofattemps[0]+1;


		if($days >= $re_exam_day)
		{
			$query_p_exam=mysqli_fetch_array(mysqli_query($con,"select * from exam where e_id='".$e_id."'"));
			$category_id=$query_p_exam['category_id'];
			$subcategory_id=$query_p_exam['subcategory_id'];
			$subject_id=$query_p_exam['subject_id'];
			$exam_name=$query_p_exam['exam_name'];
			$exam_duration=$query_p_exam['exam_duration'];
			$neg_mark_status=$query_p_exam['neg_mark_status'];
			$negative_marks=$query_p_exam['negative_marks'];

			for($q=0;$q<$count_total_question_get;$q++)
			{
			$query1=" select o.q_id, q.s_id, q.c_id,q.q_id, q.s_c_id, q.question_status, q.marks, q.question_type, o.question, o.typeofquestion, o.option_a, o.option_b, o.option_c, o.option_d, o.correct_ans, o.o_q_id from questions_table q, objective_table o where q.q_id='".$question_id_get_explode[$q]."' and q.question_status=1 and q.q_id=o.q_id ";
									
			$query_question=mysqli_query($con,$query1); 
			$result_question_q_id=mysqli_fetch_array($query_question);

			$q_id[]=$result_question_q_id['q_id'];
			$correct_ans[]=$result_question_q_id['correct_ans'];
			$marks[]=$result_question_q_id['marks'];
			}

	

			$query=mysqli_query($con,"insert into main_exam_status (category_id,subcategory_id,subject_id,exam_id,exam_date,status,student_id,noofattemps) values('".$category_id."','".$subcategory_id."','".$subject_id."','".$e_id."',now(),1,'".$_SESSION['student_id']."','".$noofattemps."')");
			$last_insert_id=mysqli_insert_id($con);


			$count=count($q_id);
			for($i=0;$i<$count; $i++)
			{
				if($q_id[$i]!="")
				{
					$qid=$q_id[$i];
					echo $query_q=" select o.q_id, q.s_id, q.c_id,q.q_id, q.s_c_id, q.question_status, q.marks, q.question_type, o.question, o.typeofquestion, o.option_a, o.option_b, o.option_c, o.option_d, o.correct_ans, o.o_q_id from questions_table q, objective_table o where q.q_id='".$q_id[$i]."' and q.question_status=1 and q.q_id=o.q_id ";
			
		
					$query_question_typeofquestion=mysqli_fetch_array(mysqli_query($con,$query_q)); 
					$question=mysqli_real_escape_string($con,$query_question_typeofquestion['question']);
					$option_a=mysqli_real_escape_string($con,$query_question_typeofquestion['option_a']);
					$option_b=mysqli_real_escape_string($con,$query_question_typeofquestion['option_b']);
					$option_c=mysqli_real_escape_string($con,$query_question_typeofquestion['option_c']);
					$option_d=mysqli_real_escape_string($con,$query_question_typeofquestion['option_d']);

					
					//print_r($query_question_typeofquestion);
					if($query_question_typeofquestion['typeofquestion']=='Single')
					{
						$radio="radio_".$qid;
						if($_POST[$radio]!="")
						{
							
							$query_s=mysqli_query($con,"INSERT INTO main_answer (category_id,subcategory_id,subject_id,exam_id,question_id,question,option_a,option_b,option_c,option_d,ans,marks,	examdate,correct_ans,typeofquestion,student_id,main_exam_status_id) VALUES ('".$category_id."','".$subcategory_id."','".$subject_id."','".$e_id."','".$qid."','".$question."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','".$_POST[$radio]."','".$marks[$i]."',now(),'".$correct_ans[$i]."','Single','".$_SESSION['student_id']."','".$last_insert_id."')");

						}
						else
						{
					
							$query_s=mysqli_query($con,"INSERT INTO main_answer (category_id,subcategory_id,subject_id,exam_id,question_id,question,option_a,option_b,option_c,option_d,ans,marks,	examdate,correct_ans,typeofquestion,student_id,main_exam_status_id) VALUES ('".$category_id."','".$subcategory_id."','".$subject_id."','".$e_id."','".$qid."','".$question."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','Not Answer','".$marks[$i]."',now(),'".$correct_ans[$i]."','Single','".$_SESSION['student_id']."','".$last_insert_id."')");
						}
					}
					if($query_question_typeofquestion['typeofquestion']=='Multiple')
					{			

						$checkbox_A="checkbox_A_".$qid;
						$checkbox_B="checkbox_B_".$qid;
						$checkbox_C="checkbox_C_".$qid;
						$checkbox_D="checkbox_D_".$qid;
						
						if($_POST[$checkbox_A]!="" || $_POST[$checkbox_B]!="" || $_POST[$checkbox_C]!="" || $_POST[$checkbox_D]!="")
						{
							if($_POST[$checkbox_A]!="")
							{
								$checkbox_ans_a="A";
							}
							else
							{
								$checkbox_ans_a="";
							}
						
							if($_POST[$checkbox_B]!="")
							{
							$checkbox_ans_b="B";
							}
							else
							{
								$checkbox_ans_b="";
							}
						
							if($_POST[$checkbox_C]!="")
							{
								$checkbox_ans_c="C";
							}
							else
							{
								$checkbox_ans_c="";
							}
							if($_POST[$checkbox_D]!="")
							{
							$checkbox_ans_d="D";
							}
							else
	
						{
								$checkbox_ans_d="";
							}
							
							$checkbox=$checkbox_ans_a."-".$checkbox_ans_b."-".$checkbox_ans_c."-".$checkbox_ans_d;
							$query_m=mysqli_query($con,"INSERT INTO main_answer (category_id,subcategory_id,subject_id,exam_id,question_id,question,option_a,option_b,option_c,option_d,ans,marks,	examdate,correct_ans,typeofquestion,student_id,main_exam_status_id) VALUES ('".$category_id."','".$subcategory_id."','".$subject_id."','".$e_id."','".$qid."','".$question."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','".$checkbox."','".$marks[$i]."',now(),'".$correct_ans[$i]."','Multiple','".$_SESSION['student_id']."','".$last_insert_id."')");
						}
						else
						{								
							$query_m=mysqli_query($con,"INSERT INTO main_answer (category_id,subcategory_id,subject_id,exam_id,question_id,question,option_a,option_b,option_c,option_d,ans,marks,	examdate,correct_ans,typeofquestion,student_id,main_exam_status_id) VALUES ('".$category_id."','".$subcategory_id."','".$subject_id."','".$e_id."','".$qid."','".$question."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','Not Answer','".$marks[$i]."',now(),'".$correct_ans[$i]."','Multiple','".$_SESSION['student_id']."','".$last_insert_id."')");
						}
					}
					
				}
			}

			$message_success .= $student_name." ".constant('TI_ANSWER_SUBMIT_SUCCESS_MESSAGE');
		}
		else
		{
			$error .= constant('TI_ANSWER_ERROR_AFTER_DAYS').'&nbsp; <strong>'.$Diff_day_sow_your_exam.'</strong>&nbsp;'.constant('TI_EXAM_ERROR_DAY');
		} 
	}
}
else
{
	$query1 = "select max(exam_date) from main_exam_status where exam_id='".$e_id."' and student_id='".$_SESSION['student_id']."'";
$result1 = mysqli_query($con,$query1) or die ("Error in query: $query. " .mysqli_error($con));
$row1 = mysqli_fetch_row($result1);
$date2= $row1[0];
$date1 = date('Y-m-d');
$days = floor(abs((strtotime($date1) - strtotime($date2))) / (60 * 60 * 24));
$re_exam_day=$row['re_exam_day'];
$Diff_day_sow_your_exam=$row['re_exam_day']-$days;

$query_noofattemps = "select max(noofattemps) from main_exam_status where exam_id='".$e_id."' and student_id='".$_SESSION['student_id']."'";
$result_noofattemps = mysqli_query($con,$query_noofattemps) or die ("Error in query: $query. " .mysqli_error($con));
$row_noofattemps = mysqli_fetch_row($result_noofattemps);
$noofattemps= $row_noofattemps[0]+1;

//print_R($_POST);exit;
if($days >= $re_exam_day)
{
	$query="select * from exam where e_id='".$e_id."' ";
	$query_p_exam=mysqli_fetch_array(mysqli_query($con,$query));
	$category_id=$query_p_exam['category_id'];
	$subcategory_id=$query_p_exam['subcategory_id'];

	$subject_id=$query_p_exam['subject_id'];


	$exam_name=$query_p_exam['exam_name'];
	$exam_duration=$query_p_exam['exam_duration'];
	$neg_mark_status=$query_p_exam['neg_mark_status'];
	$negative_marks=$query_p_exam['negative_marks'];

	for($q=0;$q<$count_total_question_get;$q++)
	{
		 $query1=" select o.q_id, q.s_id, q.c_id,q.s_c_id, q.question_status, q.marks, q.question_type, o.question, o.typeofquestion, o.option_a, o.option_b, o.option_c, o.option_d, o.correct_ans, o.o_q_id from questions_table q, objective_table o where o.q_id='".$question_id_get_explode[$q]."' and q.question_status=1 and q.q_id=o.q_id "; 
		
		$query_question=mysqli_query($con,$query1); 
		$result_question_q_id=mysqli_fetch_array($query_question);
		$q_id[]=$result_question_q_id['q_id'];
		$correct_ans[]=$result_question_q_id['correct_ans'];
		$marks[]=$result_question_q_id['marks'];
	}

	
	$query=mysqli_query($con,"insert into main_exam_status (category_id,subcategory_id,subject_id,exam_id,exam_date,status,student_id,noofattemps) values('".$category_id."','".$subcategory_id."','".$subject_id."','".$e_id."',now(),1,'".$_SESSION['student_id']."','".$noofattemps."')");

	$last_insert_id=mysqli_insert_id($con);
	//print_r($last_insert_id);


	$count=count($q_id);
	for($i=0;$i<$count; $i++)
	{
		if($q_id[$i]!="")
		{
			$qid=$q_id[$i];
			$query_q=" select o.q_id, q.s_id, q.c_id,q.q_id, q.s_c_id, q.question_status, q.marks, q.question_type, o.question, o.typeofquestion, o.option_a, o.option_b, o.option_c, o.option_d, o.correct_ans, o.o_q_id from questions_table q, objective_table o where q.q_id='".$q_id[$i]."' and q.question_status=1 and q.q_id=o.q_id ";
			
			$query_question_typeofquestion=mysqli_fetch_array(mysqli_query($con,$query_q)); 
			$question=mysqli_real_escape_string($con,$query_question_typeofquestion['question']);
			$option_a=mysqli_real_escape_string($con,$query_question_typeofquestion['option_a']);
			$option_b=mysqli_real_escape_string($con,$query_question_typeofquestion['option_b']);
			$option_c=mysqli_real_escape_string($con,$query_question_typeofquestion['option_c']);
			$option_d=mysqli_real_escape_string($con,$query_question_typeofquestion['option_d']);
			
			
			if($query_question_typeofquestion['typeofquestion']=='Single')
			{
				$radio="radio_".$qid;
				
				if($_POST[$radio]!="")
				{

					$query_s=mysqli_query($con,"INSERT INTO main_answer (category_id,subcategory_id,subject_id,exam_id,question_id,question,option_a,option_b,option_c,option_d,ans,marks,	examdate,correct_ans,typeofquestion,student_id,main_exam_status_id) VALUES ('".$category_id."','".$subcategory_id."','".$subject_id."','".$e_id."','".$qid."','".$question."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','".$_POST[$radio]."','".$marks[$i]."',now(),'".$correct_ans[$i]."','Single','".$_SESSION['student_id']."','".$last_insert_id."')");

				}
				else
				{
			
					$query_s=mysqli_query($con,"INSERT INTO main_answer (category_id,subcategory_id,subject_id,exam_id,question_id,question,option_a,option_b,option_c,option_d,ans,marks,	examdate,correct_ans,typeofquestion,student_id,main_exam_status_id) VALUES ('".$category_id."','".$subcategory_id."','".$subject_id."','".$e_id."','".$qid."','".$question."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','Not Answer','".$marks[$i]."',now(),'".$correct_ans[$i]."','Single','".$_SESSION['student_id']."','".$last_insert_id."')");
				}
			}
			if($query_question_typeofquestion['typeofquestion']=='Multiple')
			{			
				

				$checkbox_A="checkbox_A_".$qid;
				$checkbox_B="checkbox_B_".$qid;
				$checkbox_C="checkbox_C_".$qid;
				$checkbox_D="checkbox_D_".$qid;
				
				if($_POST[$checkbox_A]!="" || $_POST[$checkbox_B]!="" || $_POST[$checkbox_C]!="" || $_POST[$checkbox_D]!="")
				{
					if($_POST[$checkbox_A]!="")
					{
						$checkbox_ans_a="A";
					}
					else
					{
						$checkbox_ans_a="";
					}
				
					if($_POST[$checkbox_B]!="")
					{
					$checkbox_ans_b="B";
					}
					else
					{
						$checkbox_ans_b="";
					}
				
					if($_POST[$checkbox_C]!="")
					{
						$checkbox_ans_c="C";
					}
					else
					{
						$checkbox_ans_c="";
					}
					if($_POST[$checkbox_D]!="")
					{
					$checkbox_ans_d="D";
					}
					else
					{
						$checkbox_ans_d="";
					}			
					$checkbox=$checkbox_ans_a."-".$checkbox_ans_b."-".$checkbox_ans_c."-".$checkbox_ans_d;
					$query_m=mysqli_query($con,"INSERT INTO main_answer (category_id,subcategory_id,subject_id,exam_id,question_id,question,option_a,option_b,option_c,option_d,ans,marks,	examdate,correct_ans,typeofquestion,student_id,main_exam_status_id) VALUES ('".$category_id."','".$subcategory_id."','".$subject_id."','".$e_id."','".$qid."','".$question."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','".$checkbox."','".$marks[$i]."',now(),'".$correct_ans[$i]."','Multiple','".$_SESSION['student_id']."','".$last_insert_id."')");
				}
				else
				{								
					$query_m=mysqli_query($con,"INSERT INTO main_answer (category_id,subcategory_id,subject_id,exam_id,question_id,question,option_a,option_b,option_c,option_d,ans,marks,	examdate,correct_ans,typeofquestion,student_id,main_exam_status_id) VALUES ('".$category_id."','".$subcategory_id."','".$subject_id."','".$e_id."','".$qid."','".$question."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','Not Answer','".$marks[$i]."',now(),'".$correct_ans[$i]."','Multiple','".$_SESSION['student_id']."','".$last_insert_id."')");
				}
			}
			
		}
	}

	$message_success .= $student_name." ".constant('TI_ANSWER_SUBMIT_SUCCESS_MESSAGE');

}else{

	$error .= constant('TI_ANSWER_ERROR_AFTER_DAYS').'&nbsp; <strong>'.$Diff_day_sow_your_exam.'</strong>&nbsp;'.constant('TI_EXAM_ERROR_DAY');
 } 
}







?>		

<script type="text/javascript"
  src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
</script>

<div class="main-content">
                    <div class="container-fluid" >
            <div class="row-fluid">
                <div class="area-top clearfix">
                    <div class="pull-left header">
                        <h3 class="title">
                        <i class="icon-edit"></i>
                       <?php echo constant('TI_MANAGE_RESULT');?>
						</h3>
                    </div>

                </div>
            </div>
        </div>
        
     
        
		<div class="container-fluid padded">
			<div class="box">
			<?php include("message.php");?>
				<div class="box-header">    
					<ul class="nav nav-tabs nav-tabs-left">
						<li class="active">
							<a href="#list" data-toggle="tab"><i class="icon-info-sign"></i><?php echo constant('TI_TAB_INFORMATION');?></a></li>
						
					</ul>
				</div>
				<div class="box-content padded">
					<div class="tab-content">
						<div class="tab-pane box active" id="list" valign="top">
							


<?php	
$exam_name=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM exam WHERE e_id ='".$e_id."'"));// Pic record in exam table

$query_student_father=mysqli_fetch_array(mysqli_query($con,"select * from student where student_id='".$_SESSION['student_id']."'"));// father name

$query_exam_take_status=mysqli_fetch_array(mysqli_query($con,"select * from main_exam_status where exam_id='".$e_id."' and category_id='".$exam_name['category_id']."' and subcategory_id='".$exam_name['subcategory_id']."' and subject_id='".$exam_name['subject_id']."' and student_id='".$_SESSION['student_id']."' and exam_date='".$given_exam_date."'"));

$query_answer=mysqli_query($con,"select * from main_answer where student_id='".$_SESSION['student_id']."' and exam_id='".$e_id."' and category_id='".$exam_name['category_id']."' and subcategory_id='".$exam_name['subcategory_id']."' and subject_id='".$exam_name['subject_id']."' and examdate='".$given_exam_date."' and main_exam_status_id='".$query_exam_take_status['id']."'");

$count_queestion=mysqli_num_rows($query_answer);
while($result_ques_marks=mysqli_fetch_array($query_answer))
{
	$marks_array[]=$result_ques_marks['marks'];//total score
}

$percentage=$exam_name['passing_percentage'];// EXAM PERCENTAGE COUNT


if(!empty($marks_array))
{
$totalmarksq= array_sum($marks_array);// COUNT TOTAL MARKS TO ALL QUESTION
}
else
{
	$totalmarksq="";
}
$negative_marks_status=$exam_name['neg_mark_status'];



$query_status_count=mysqli_query($con,"select * from main_answer where student_id='".$_SESSION['student_id']."' and exam_id='".$e_id."' and category_id='".$exam_name['category_id']."' and subcategory_id='".$exam_name['subcategory_id']."' and subject_id='".$exam_name['subject_id']."' and examdate='".$given_exam_date."' and main_exam_status_id='".$query_exam_take_status['id']."'");
while($result_count=mysqli_fetch_array($query_status_count))
{
	if($result_count['ans']==$result_count['correct_ans'])
	{
		$marks_get_array[]=$result_count['marks'];//correct_marks
	}
	else
	{

		if($result_count['ans']=="Not Answer")
		{
			$marks_get_Not_Answer[]=1;//correct_marks
		}
		else
		{
			$wrong_ans[]=1;
		}
	}
}

$marks_get_count=count($marks_get_Not_Answer);
if($marks_get_count > 0)
{
	 $not_given_answer=array_sum($marks_get_Not_Answer);
}
else
{
	$not_given_answer=0;
}


$wrong_ans_count=count($wrong_ans);
if($wrong_ans_count > 0)
{
	$wrong_ans_answer=array_sum($wrong_ans);
}
else
{
	$wrong_ans_answer=0;
}


if($count_queestion==$not_given_answer)
{

		if($negative_marks_status==1)
		{
			$correct_marks=0;
			$count_negative_marks=0;
			 $total_marks_score=$correct_marks-$count_negative_marks;
			 //print_r($total_marks_score);
			$passscore=(($totalmarksq*$percentage)/100);

			if($total_marks_score >=$passscore)
			{
				$passstatus=constant('TI_LABEL_PASS');
				$query_pass_fail=mysqli_query($con,"update main_exam_status set pass_or_fail='Pass' where id='".$last_insert_id."'");

					
			}
			else
			{
				$passstatus=constant('TI_LABEL_FAIL');
				$query_pass_fail=mysqli_query($con,"update main_exam_status set pass_or_fail='Fail' where id='".$last_insert_id."'");
			}
		}
		else
		{
			$correct_marks=0;	
			$total_marks_score=$correct_marks;
			$passscore=(($totalmarksq*$percentage)/100);


			if($total_marks_score >=$passscore)
			{
				$passstatus=constant('TI_LABEL_PASS');
				$query_pass_fail=mysqli_query($con,"update main_exam_status set pass_or_fail='Pass' where id='".$last_insert_id."'");
			}
			else
			{
				$passstatus=constant('TI_LABEL_FAIL');
				$query_pass_fail=mysqli_query($con,"update main_exam_status set pass_or_fail='Fail' where id='".$last_insert_id."'");
				
			}
		}
}
else
{
	if($negative_marks_status==1)
		{
			if(!empty($marks_get_array))
			{
				$correct_marks=array_sum($marks_get_array);
			}
			else
			{
				$correct_marks='';
			}		


			$count_negative_marks=$wrong_ans_answer*$exam_name['negative_marks'];
			$total_marks_score=$correct_marks-$count_negative_marks;
			$passscore=(($totalmarksq*$percentage)/100);

			if($total_marks_score >=$passscore)
			{
				$passstatus=constant('TI_LABEL_PASS');
				$query_pass_fail=mysqli_query($con,"update main_exam_status set pass_or_fail='Pass' where id='".$last_insert_id."'");
			}
			else
			{
				$passstatus=constant('TI_LABEL_FAIL');
				$query_pass_fail=mysqli_query($con,"update main_exam_status set pass_or_fail='Fail' where id='".$last_insert_id."'");
			}
		}
		else
		{
			if(!empty($marks_get_array))
			{
				$correct_marks=array_sum($marks_get_array);	
			}
			else
			{
				$correct_marks='';
			}		

			
			$total_marks_score=$correct_marks;
			$passscore=(($totalmarksq*$percentage)/100);


			if($total_marks_score >=$passscore)
			{
				$passstatus=constant('TI_LABEL_PASS');
				$query_pass_fail=mysqli_query($con,"update main_exam_status set pass_or_fail='Pass' where id='".$last_insert_id."'");

			}
			else
			{
				$passstatus=constant('TI_LABEL_FAIL');
				$query_pass_fail=mysqli_query($con,"update main_exam_status set pass_or_fail='Fail' where id='".$last_insert_id."'");
			}
		}
}

if($negative_marks_status==1){
$negative_mark=$exam_name['negative_marks'];
}
else {
$negative_mark='';
}

$query_pass_fail=mysqli_query($con,"update main_exam_status set user_score='".$total_marks_score."', passing_score='".$passscore."', total_score='".array_sum($marks_array)."', total_question='".$count_queestion."', negative_mark='".$negative_mark."' where id='".$last_insert_id."'");





	$message.="<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
	$message.="<tr><td style='line-height:30px; font-size:20px;color:#7087A3'>&nbsp;</td></tr>";
	$message.="<tr>";
	$message.="<td>";

	$message.="<table border='0' cellpadding='0' cellspacing='0' width='100%' class='table table-normal'>";
	$message.="<tr>";
	$message.="<td class='news-title'>Student Name:</td>";
	$message.="<td class='news-title'>".ucfirst($_SESSION['student_name'])."</td>";
	$message.="</tr>";
	$message.="<tr>";
	$message.="<td class='news-title'>Father Name:</td>";
	$message.="<td class='news-title'>".ucfirst($query_student_father['student_father'])."</td>";
	$message.="</tr>";
	$message.="<tr>";
	$message.="<td class='news-title'>Exam Name:</td>";
	$message.="<td class='news-title'>".$exam_name['exam_name']."</td>";
	$message.="</tr>";
	if($negative_marks_status==1){
			$icon='<div style="float:left"><i class="icon-ok-sign icon-2x"></i>&nbsp;&nbsp;'.$exam_name['negative_marks'].'</div>';
		 }
		else {
			$icon='<i class="icon-remove-sign icon-2x"></i>';
		}
	$message.="<tr>";
	$message.="<td class='news-title'>Negative marks:</td>";
	$message.="<td class='news-title'>".$icon."</td>";
	$message.="</tr>";
	$message.="<tr>";
	$message.="<td class='news-title'>Total question:</td>";
	$message.="<td class='news-title'>".$count_queestion."</td>";
	$message.="</tr>";
	$message.="<tr>";
	$message.="<td class='news-title'>Full Score:</td>";
	$message.="<td class='news-title'>".array_sum($marks_array)."</td>";
	$message.="</tr>";
	$message.="<tr>";
	$message.="<td class='news-title'>User Score:</td>";
	$message.="<td class='news-title'>".$total_marks_score."</td>";
	$message.="</tr>";
	$message.="<tr>";
	$message.="<td class='news-title'>Passing Score:</td>";
	$message.="<td class='news-title'>".$passscore."</td>";
	$message.="</tr>";
	$message.="<tr>";
	$message.="<td class='news-title'>Passing Status:</td>";
	$message.="<td class='news-title'>".$passstatus."</td>";
	$message.="</tr>";
	$message.="<tr>";
	$message.="<td class='news-title'>Date:</td>";
	$message.="<td class='news-title'>".$query_exam_take_status['exam_date']."</td>";
	$message.="</tr>";	
	$message.="</table>";
$message.="</td>";
$message.="</tr>";


$message.="<tr><td style='line-height:30px; color:#7087A3;font-size:20px;padding-left:5px'>Detail Information</td></tr>";
$message.="<tr>";
$message.="<td>";




$message.="<table border='0' cellpadding='0' cellspacing='0' width='100%' class='table table-normal'>";
		$message.="<tr>";
			$message.="<th class='news-title'>SNo.</th>";
			$message.="<th class='news-title'>Question</th>";
			$message.="<th class='news-title'>Points</th>";
			$message.="<th class='news-title'>User's Response(s)</th>";
			$message.="<th class='news-title'>Correct Answer</th>";
			$message.="<th class='news-title'>Result</th>";
		$message.="</tr>";

	
$query_answer_table=mysqli_query($con,"select * from main_answer where student_id='".$_SESSION['student_id']."' and exam_id='".$e_id."' and category_id='".$exam_name['category_id']."' and subcategory_id='".$exam_name['subcategory_id']."' and subject_id='".$exam_name['subject_id']."' and examdate='".$given_exam_date."' and main_exam_status_id='".$query_exam_take_status['id']."'");
	$i=1;
	while($questin_result=mysqli_fetch_array($query_answer_table))
	{
			
			
		if($questin_result['typeofquestion']=='Single')
		{				
			if($questin_result['ans']=='A')
			{
				$user_ans_single=$questin_result['option_a'];
			}
			if($questin_result['ans']=='B')
			{
				$user_ans_single=$questin_result['option_b'];
			}
			if($questin_result['ans']=='C')
			{
				$user_ans_single=$questin_result['option_c'];
			}
			if($questin_result['ans']=='D')
			{
				$user_ans_single=$questin_result['option_d'];
			}
			if($questin_result['ans']=='Not Answer')
			{
				$user_ans_single='Not Answer';
			}
		}
		else
		{
			
			$Ans_multi=$questin_result['ans'];
			$explode=explode("-",$Ans_multi);			
			$user_ans_a="";
			$user_ans_b="";
			$user_ans_c="";
			$user_ans_d="";
			if($explode[0]=='A' and $explode[0]!="")
			{
				$user_ans_a=$questin_result['option_a']."<br>";
			}
			if($explode[1]=='B' and $explode[1]!="")
			{
				$user_ans_b=$questin_result['option_b']."<br>";
			}
			if($explode[2]=='C' and $explode[2]!="")
			{
				$user_ans_c=$questin_result['option_c']."<br>";
			}
			if($explode[3]=='D' and $explode[3]!="")
			{
				$user_ans_d=$questin_result['option_d'];
			}
			if($explode[0]=='Not Answer' and $explode[0]!="")
			{
				$user_ans_not_ans='Not Answer'."<br>";
			}
			  $user_ans_multi=$user_ans_a." ".$user_ans_b." ".$user_ans_c." ".$user_ans_d." ".$user_ans_not_ans;
		}
		
		
			
		if($questin_result['typeofquestion']=='Single')
		{				
			if($questin_result['correct_ans']=='A')
			{
				$correct_ans_single=$questin_result['option_a'];
			}
			if($questin_result['correct_ans']=='B')
			{
				$correct_ans_single=$questin_result['option_b'];
			}
			if($questin_result['correct_ans']=='C')
			{
				$correct_ans_single=$questin_result['option_c'];
			}
			if($questin_result['correct_ans']=='D')
			{
				$correct_ans_single=$questin_result['option_d'];
			}
		}
		else
		{			
			$correct_ans_multi=$questin_result['correct_ans'];
			$explode_correct_ans_multi=explode("-",$correct_ans_multi);				
			$correct_ans_a="";
			$correct_ans_b="";
			$correct_ans_c="";
			$correct_ans_d="";
			if($explode_correct_ans_multi[0]=='A' and $explode_correct_ans_multi[0]!="")
			{
				$correct_ans_a=$questin_result['option_a']."<br>";
			}
			if($explode_correct_ans_multi[1]=='B' and $explode_correct_ans_multi[1]!="")
			{
				$correct_ans_b=$questin_result['option_b']."<br>";
			}
			
			if($explode_correct_ans_multi[2]=='C' and $explode_correct_ans_multi[2]!="")
			{
				$correct_ans_c=$questin_result['option_c']."<br>";
			
			}
			if($explode_correct_ans_multi[3]=='D' and $explode_correct_ans_multi[3]!="")
			{
				$correct_ans_d=$questin_result['option_d'];
			}
			  $correct_ans_multi=$correct_ans_a." ".$correct_ans_b." ".$correct_ans_c." ".$correct_ans_d;
		}
				
			
			
			$message.="<tr>";
			$message.="<td valign='top' class='news-title'>".$i."</td>";

			$message.="<td valign='top' class='news-title'>".nl2br($questin_result['question'])."</td>";

			$message.="<td valign='top' class='news-title'>".$questin_result['marks']."</td>";

			if($questin_result['typeofquestion']=='Single')
			{

			$message.="<td valign='top'  class='news-title'>".$user_ans_single."</td>";
			}
			else
			{
				$message.="<td valign='top'  class='news-title'>".$user_ans_multi."</td>";
			}
			

			if($questin_result['typeofquestion']=='Single')
			{

				$message.="<td valign='top' class='news-title'>".$correct_ans_single."</td>";
			}
			else
			{
				$message.="<td valign='top' class='news-title'>".$correct_ans_multi."</td>";
			}
			
			
			if($questin_result['ans']== $questin_result['correct_ans'])
			{
				$symbol= '<i class="icon-ok-sign icon-2x"></i>';
			}
			else
			{
				$symbol= '<i class="icon-remove-sign icon-2x"></i>';
			}
			$message.="<td class='news-title'>".$symbol."</td>";

			$message.="</tr>";
			$i++;
			$user_ans_single="";
			$correct_ans_single="";	
	}

	$message.="</table>";
$message.="</td>";
$message.="</tr>";
$message.="<tr>";
$message.="<td></td>";
$message.="</tr>";


$message.="</table>";


echo $message;



if($exam_name['result_show_on_mail']==1)
{
	$center_query=mysqli_fetch_array(mysqli_query($con,"select * from center where c_id='".$_SESSION['center_id']."'"));
	
	$student_email=$_SESSION['student_email'];
	$center_email=$center_query['email'];
	$general_setting_query=mysqli_fetch_array(mysqli_query($con,"select * from general_setting where g_id=1 and id=1"));
	$admin_email=$general_setting_query['g_email'];

	



$email.="<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
	$email.="<tr><td style='line-height:30px; font-size:20px;color:#7087A3'>&nbsp;</td></tr>";
	$email.="<tr>";
	$email.="<td>";

	$email.="<table border='0' cellpadding='0' cellspacing='0' width='100%' style='border:1px solid #ccc;'>";
	$email.="<tr>";
	$email.="<td style='border-bottom:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>Student Name:</td>";
	$email.="<td style='border-bottom:1px solid #ccc;border-left:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>".ucfirst($_SESSION['student_name'])."</td>";
	$email.="</tr>";
	$email.="<tr>";
	$email.="<td style='border-bottom:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>Father Name:</td>";
	$email.="<td style='border-bottom:1px solid #ccc;border-left:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>".ucfirst($query_student_father['student_father'])."</td>";
	$email.="</tr>";
	
	$email.="<tr>";
	$email.="<td style='border-bottom:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>Exam Name:</td>";
	$email.="<td style='border-bottom:1px solid #ccc;border-left:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>".$exam_name['exam_name']."</td>";
	$email.="</tr>";
	if($negative_marks_status==1){
			$icon='<div style="float:left">&#10004;&nbsp;&nbsp;'.$exam_name['negative_marks'].'</div>';
		 }
		else {
			$icon='&#10006;';
		}
	$email.="<tr>";
	$email.="<td style='border-bottom:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>Negative marks:</td>";
	$email.="<td style='border-bottom:1px solid #ccc;border-left:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>".$icon."</td>";
	$email.="</tr>";
	$email.="<tr>";
	$email.="<td style='border-bottom:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>Total question:</td>";
	$email.="<td style='border-bottom:1px solid #ccc;border-left:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>".$count_queestion."</td>";
	$email.="</tr>";
	$email.="<tr>";
	$email.="<td style='border-bottom:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>Full Score:</td>";
	$email.="<td style='border-bottom:1px solid #ccc;border-left:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>".array_sum($marks_array)."</td>";
	$email.="</tr>";
	$email.="<tr>";
	$email.="<td style='border-bottom:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>User Score:</td>";
	$email.="<td style='border-bottom:1px solid #ccc;border-left:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>".$total_marks_score."</td>";
	$email.="</tr>";
	$email.="<tr>";
	$email.="<td style='border-bottom:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>Passing Score:</td>";
	$email.="<td style='border-bottom:1px solid #ccc;border-left:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>".$passscore."</td>";
	$email.="</tr>";
	$email.="<tr>";
	$email.="<td style='border-bottom:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>Passing Status:</td>";
	$email.="<td style='border-bottom:1px solid #ccc;border-left:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>".$passstatus."</td>";
	$email.="</tr>";
	$email.="<tr>";
	$email.="<td style='line-height:30px;font-size:16px;padding-left:5px'>Date:</td>";
	$email.="<td style='border-left:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>".$query_exam_take_status['exam_date']."</td>";
	$email.="</tr>";	
	$email.="</table>";
$email.="</td>";
$email.="</tr>";


$email.="<tr><td style='line-height:30px; color:#7087A3;font-size:20px;padding-left:5px'>Detail Information</td></tr>";
$email.="<tr>";
$email.="<td>";




$email.="<table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-left:1px solid #ccc;border-right:1px solid #ccc;border-top:1px solid #ccc;'>";
		$email.="<tr>";
			$email.="<td style='border-bottom:1px solid #ccc;border-right:1px solid #ccc;line-height:30px;font-weight:bold;font-size:14px;padding-left:5px'>SNo.</td>";
			$email.="<td style='border-bottom:1px solid #ccc;border-right:1px solid #ccc;line-height:30px;font-weight:bold;font-size:14px;padding-left:5px'>Question</td>";
			$email.="<td style='border-bottom:1px solid #ccc;border-right:1px solid #ccc;line-height:30px;font-weight:bold;font-size:14px;padding-left:5px'>Points</td>";
			$email.="<td style='border-bottom:1px solid #ccc;border-right:1px solid #ccc;line-height:30px;font-weight:bold;font-size:14px;padding-left:5px'>User's Response(s)</td>";
			$email.="<td style='border-bottom:1px solid #ccc;border-right:1px solid #ccc;line-height:30px;font-weight:bold;font-size:14px;padding-left:5px'>Correct Answer</td>";
			$email.="<td style='border-bottom:1px solid #ccc;line-height:30px;font-weight:bold;border-right:1px solid #ccc;font-size:14px;padding-left:5px'>Result</td>";
		$email.="</tr>";

	
$query_answer_table=mysqli_query($con,"select * from main_answer where student_id='".$_SESSION['student_id']."' and exam_id='".$e_id."' and category_id='".$exam_name['category_id']."' and subcategory_id='".$exam_name['subcategory_id']."' and 	subject_id='".$exam_name['subject_id']."' and examdate='".$given_exam_date."' and main_exam_status_id='".$query_exam_take_status['id']."'");
	$i=1;
	while($questin_result=mysql_fetch_array($query_answer_table))
	{	
			
			
		if($questin_result['typeofquestion']=='Single')
		{				
			if($questin_result['ans']=='A')
			{
				$user_ans_single=$questin_result['option_a'];
			}
			if($questin_result['ans']=='B')
			{
				$user_ans_single=$questin_result['option_b'];
			}
			if($questin_result['ans']=='C')
			{
				$user_ans_single=$questin_result['option_c'];
			}
			if($questin_result['ans']=='D')
			{
				$user_ans_single=$questin_result['option_d'];
			}
			if($questin_result['ans']=='Not Answer')
			{
				$user_ans_single='Not Answer';
			}
		}
		else
		{
			
			$Ans_multi=$questin_result['ans'];
			$explode=explode("-",$Ans_multi);			
			$user_ans_a="";
			$user_ans_b="";
			$user_ans_c="";
			$user_ans_d="";
			if($explode[0]=='A' and $explode[0]!="")
			{
				$user_ans_a=$questin_result['option_a']."<br>";
			}
			if($explode[1]=='B' and $explode[1]!="")
			{
				$user_ans_b=$questin_result['option_b']."<br>";
			}
			if($explode[2]=='C' and $explode[2]!="")
			{
				$user_ans_c=$questin_result['option_c']."<br>";
			}
			if($explode[3]=='D' and $explode[3]!="")
			{
				$user_ans_d=$questin_result['option_d'];
			}
			if($explode[0]=='Not Answer' and $explode[0]!="")
			{
				$user_ans_not_ans='Not Answer'."<br>";
			}
			  $user_ans_multi=$user_ans_a." ".$user_ans_b." ".$user_ans_c." ".$user_ans_d." ".$user_ans_not_ans;
		}
			
			
		if($questin_result['typeofquestion']=='Single')
		{				
			if($questin_result['correct_ans']=='A')
			{
				$correct_ans_single=$questin_result['option_a'];
			}
			if($questin_result['correct_ans']=='B')
			{
				$correct_ans_single=$questin_result['option_b'];
			}
			if($questin_result['correct_ans']=='C')
			{
				$correct_ans_single=$questin_result['option_c'];
			}
			if($questin_result['correct_ans']=='D')
			{
				$correct_ans_single=$questin_result['option_d'];
			}
		}
		else
		{			
			$correct_ans_multi=$questin_result['correct_ans'];
			$explode_correct_ans_multi=explode("-",$correct_ans_multi);				
			$correct_ans_a="";
			$correct_ans_b="";
			$correct_ans_c="";
			$correct_ans_d="";
			if($explode_correct_ans_multi[0]=='A' and $explode_correct_ans_multi[0]!="")
			{
				$correct_ans_a=$questin_result['option_a']."<br>";
			}
			if($explode_correct_ans_multi[1]=='B' and $explode_correct_ans_multi[1]!="")
			{
				$correct_ans_b=$questin_result['option_b']."<br>";
			}
			
			if($explode_correct_ans_multi[2]=='C' and $explode_correct_ans_multi[2]!="")
			{
				$correct_ans_c=$questin_result['option_c']."<br>";
			
			}
			if($explode_correct_ans_multi[3]=='D' and $explode_correct_ans_multi[3]!="")
			{
				$correct_ans_d=$questin_result['option_d'];
			}
			  $correct_ans_multi=$correct_ans_a." ".$correct_ans_b." ".$correct_ans_c." ".$correct_ans_d;
		}
			
			
			
			
			$email.="<tr>";
			$email.="<td valign='top' style='border-bottom:1px solid #ccc;border-right:1px solid #ccc;line-height:30px;font-size:14px;padding-left:5px'>".$i."</td>";

			$email.="<td valign='top' style='border-bottom:1px solid #ccc;border-right:1px solid #ccc;line-height:30px;font-size:14px;padding-left:5px'>".nl2br($questin_result['question'])."</td>";

			$email.="<td valign='top' style='border-bottom:1px solid #ccc;border-right:1px solid #ccc;line-height:30px;font-size:14px;padding-left:5px'>".$questin_result['marks']."</td>";

			if($questin_result['typeofquestion']=='Single')
			{

			$email.="<td valign='top'  style='border-bottom:1px solid #ccc;border-right:1px solid #ccc;line-height:30px;font-size:14px;padding-left:5px'>".$user_ans_single."</td>";
			}
			else
			{
				$email.="<td valign='top'  style='border-bottom:1px solid #ccc;border-right:1px solid #ccc;line-height:30px;font-size:14px;padding-left:5px'>".$user_ans_multi."</td>";
			}



			if($questin_result['typeofquestion']=='Single')
			{

				$email.="<td valign='top' style='border-bottom:1px solid #ccc;border-right:1px solid #ccc;line-height:30px;font-size:14px;padding-left:5px'>".$correct_ans_single."</td>";
			}
			else
			{
				$email.="<td valign='top' style='border-bottom:1px solid #ccc;border-right:1px solid #ccc;line-height:30px;font-size:14px;padding-left:5px'>".$correct_ans_multi."</td>";
			}




			if($questin_result['ans']== $questin_result['correct_ans'])
			{
				$symbol= '&#10004;';
			}
			else
			{
				$symbol= '&#10006;';
			}
			$email.="<td valign='top'  style='border-bottom:1px solid #ccc;line-height:30px;border-right:1px solid #ccc;font-size:16px;padding-left:5px'>".$symbol."</td>";

			$email.="</tr>";
			$i++;
			$user_ans_single="";
			$correct_ans_single="";	
	}

	$email.="</table>";
$email.="</td>";
$email.="</tr>";
$email.="<tr>";
$email.="<td></td>";
$email.="</tr>";


$email.="</table>";


















	if($student_email!="")
	{
		$to=$student_email;
		$subject=$exam_name['exam_name']." result(".$_SESSION['student_name'].")";
		$result=mail($to,$subject,$email,	"From: ".$admin_email." <".$admin_email.">\n" . "MIME-Version: 1.0\n" . "Content-type: text/html; charset=iso-8859-1");
	}
	if($center_email!="")
	{
		$toc=$center_email;
		$subjectc=$exam_name['exam_name']." result(".$_SESSION['student_name'].")";
		$result=mail($toc,$subjectc,$email,	"From: ".$admin_email." <".$admin_email.">\n" . "MIME-Version: 1.0\n" . "Content-type: text/html; charset=iso-8859-1");
	}

	if($admin_email!="")
	{
		$toa=$admin_email;
		$subjecat=$exam_name['exam_name']." result(".$_SESSION['student_name'].")";
		$result=mail($toa,$subjecta,$email,	"From: ".$admin_email." <".$admin_email.">\n" . "MIME-Version: 1.0\n" . "Content-type: text/html; charset=iso-8859-1");
	}
}
?>


						</div>
						
					</div>
				</div>
			</div>           
		</div>       
		 <?php include("copyright.php");?>     
	</div>
</div>
</body> 
</html>