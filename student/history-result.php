<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');



if($_GET['exam_id']!="")
{
	//$p_e_id=decrypt_string($_GET['exam_id']);
	 $e_id=decrypt_string($_GET['exam_id']);	

	$exam_dy = $_GET["exam_dy"];
	$given_exam_date = decrypt_string($exam_dy);

	$query_check_center=mysqli_query($con,"select * from exam where  e_id='".$p_e_id."' and exam_status=1");
	$row_check_center=mysqli_fetch_array($query_check_center);
	$center_id_explode=explode(",",$row_check_center['center_id']);
	if(in_array($_SESSION['center_id'],$center_id_explode))
	{
		$center_id=$_SESSION['center_id'];
	}
}

$query=mysqli_query($con,"select * from exam where  center_id='".$row_check_center['center_id']."' and e_id='".$e_id."' and exam_status=1");
$row=mysqli_fetch_array($query);

if($row['re_exam_day']==0)
{
$message_success .= constant('TI_POPUP_TAKE_EXAM');
}
else
{
	 $query1 = " SELECT max(exam_date) FROM practice_exam_status WHERE exam_id ='".$e_id."' AND center_id ='".$_SESSION['center_id']."' AND student_id ='".$_SESSION['student_id']."'";

		$result1 = mysqli_query($con,$query1) or die ("Error in query: $query. " .mysqli_error($con));
		$row1 = mysqli_fetch_row($result1);
		$date2= $row1[0];
		$date1 = date('Y-m-d');
		$days = floor(abs((strtotime($date1) - strtotime($date2))) / (60 * 60 * 24));		
		$re_exam_day=$row['re_exam_day'];		
		$Diff_day_sow_your_exam=$row['re_exam_day']-$days;
		if($days >= $re_exam_day)
		{
			$message_success .= constant('TI_EXAM_TAKE_NOW');
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
							<a href="#list" data-toggle="tab"><i class="icon-info-sign"></i> 
								<?php echo constant('TI_TAB_INFORMATION');?>   	</a></li>
						
					</ul>
				</div>
				<div class="box-content padded">
					<div class="tab-content">
						<div class="tab-pane box active" id="list" valign="top">
							


<?php	
$exam_name=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM exam WHERE e_id ='".$e_id."'"));// Pic record in exam table

$query_student_father=mysqli_fetch_array(mysqli_query($con,"select * from student where student_id='".$_SESSION['student_id']."'"));// father name

$query_exam_take_status=mysqli_fetch_array(mysqli_query($con,"select * from practice_exam_status where exam_id='".$e_id."' and category_id='".$exam_name['category_id']."' and subcategory_id='".$exam_name['subcategory_id']."' and subject_id='".$exam_name['subject_id']."' and center_id='".$center_id."' and student_id='".$_SESSION['student_id']."' and exam_date='".$given_exam_date."'"));




$query_answer=mysqli_query($con,"select * from practice_answer where student_id='".$_SESSION['student_id']."' and exam_id='".$e_id."' and center_id='".$center_id."' and category_id='".$exam_name['category_id']."' and subcategory_id='".$exam_name['subcategory_id']."' and 	subject_id='".$exam_name['subject_id']."' and examdate='".$given_exam_date."' and practice_exam_status_id='".$query_exam_take_status['id']."'");

$count_queestion=mysqli_num_rows($query_answer);
while($result_ques_marks=mysqli_fetch_array($query_answer))
{
	$marks_array[]=$result_ques_marks['marks'];//total score
}

$percentage=$exam_name['passing_percentage'];// EXAM PERCENTAGE COUNT
$totalmarksq= array_sum($marks_array);// COUNT TOTAL MARKS TO ALL QUESTION
$negative_marks_status=$exam_name['neg_mark_status'];



$query_status_count=mysqli_query($con,"select * from practice_answer where student_id='".$_SESSION['student_id']."' and exam_id='".$e_id."' and center_id='".$center_id."' and category_id='".$exam_name['category_id']."' and subcategory_id='".$exam_name['subcategory_id']."' and 	subject_id='".$exam_name['subject_id']."' and examdate='".$given_exam_date."' and practice_exam_status_id='".$query_exam_take_status['id']."'");
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
			$passscore=(($totalmarksq*$percentage)/100);

			if($total_marks_score >=$passscore)
			{
				$passstatus=constant('TI_LABEL_PASS');
				$query_pass_fail=mysqli_query($con,"update practice_exam_status set pass_or_fail='Pass' where id='".$last_insert_id."'");

					
			}
			else
			{
				$passstatus=constant('TI_LABEL_FAIL');
				$query_pass_fail=mysqli_query($con,"update practice_exam_status set pass_or_fail='Fail' where id='".$last_insert_id."'");
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
				$query_pass_fail=mysqli_query($con,"update practice_exam_status set pass_or_fail='Pass' where id='".$last_insert_id."'");
			}
			else
			{
				$passstatus=constant('TI_LABEL_FAIL');
				$query_pass_fail=mysqli_query($con,"update practice_exam_status set pass_or_fail='Fail' where id='".$last_insert_id."'");
				
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
				$query_pass_fail=mysqli_query($con,"update practice_exam_status set pass_or_fail='Pass' where id='".$last_insert_id."'");
			}
			else
			{
				$passstatus=constant('TI_LABEL_FAIL');
				$query_pass_fail=mysqli_query($con,"update practice_exam_status set pass_or_fail='Fail' where id='".$last_insert_id."'");
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
				$query_pass_fail=mysqli_query($con,"update practice_exam_status set pass_or_fail='Pass' where id='".$last_insert_id."'");

			}
			else
			{
				$passstatus=constant('TI_LABEL_FAIL');
				$query_pass_fail=mysqli_query($con,"update practice_exam_status set pass_or_fail='Fail' where id='".$last_insert_id."'");
			}
		}
}

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
	/* $message.="<tr>";
	$message.="<td class='news-title'>Center Name:</td>";
	$message.="<td class='news-title'>".$query_center_name['centername']."</td>";
	$message.="</tr>"; */
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
	$message.="<td style='line-height:30px;font-size:16px;padding-left:5px'>Date:</td>";
	$message.="<td style='border-left:1px solid #ccc;line-height:30px;font-size:16px;padding-left:5px'>".$query_exam_take_status['exam_date']."</td>";
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

$query_answer_table=mysqli_query($con,"select * from practice_answer where student_id='".$_SESSION['student_id']."' and exam_id='".$e_id."' and center_id='".$center_id."' and category_id='".$exam_name['category_id']."' and subcategory_id='".$exam_name['subcategory_id']."' and 	subject_id='".$exam_name['subject_id']."' and examdate='".$given_exam_date."' and practice_exam_status_id='".$query_exam_take_status['id']."'");
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
			$message.="<td valign='top' class='news-title'>".$symbol."</td>";

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