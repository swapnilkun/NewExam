<?php
include('include/configure.php');
include('include/meta_tag.php');
//include('include/main-header.php');
$url_explode_head= explode("?",basename(curPageURL()));
if($url_explode_head[0]=='mainpaper.php')
{
	include('include/main-header-hide.php');
	
}
else
{
	include('include/main-header.php');
	
}


if($_GET['exam_id']!="")
{
	$query_exam_term=mysqli_fetch_array(mysqli_query($con,"select * from exam where e_id='".decrypt_string($_GET['exam_id'])."'"));
	$exam_duration=$query_exam_term['exam_duration'];
	$time_reduction=$query_exam_term['time_reduction'];
}

$date = date("H:i:s");
list($cur_hor, $cur_min, $cur_sec) = explode(':', $date);
 $current_time=$cur_hor.':'.$cur_min; 

$_Student=mysqli_fetch_array(mysqli_query($con,"select * from student where student_id='".$_SESSION['student_id']."'"));
$_batch_id=$_Student['b_id'];

$_batch=mysqli_fetch_array(mysqli_query($con,"select * from batch where b_id='".$_batch_id."'"));
$batch_time=$_batch['batch_time'];

if($time_reduction==1)
{
	$selectedTime = $batch_time;
	$Starttime_plus_duration = strtotime($selectedTime) + $exam_duration*60;
	$endTimeduration= date('H:i', $Starttime_plus_duration);
	$durationexam=(strtotime($endTimeduration)-strtotime($current_time))/60;
}
else
{
	$login_time=$_SESSION['Current_time_exam'];
	$Starttime_plus_duration = strtotime($login_time) + $exam_duration*60;
	$endTimeduration= date('H:i', $Starttime_plus_duration);	
	$durationexam=(strtotime($endTimeduration)-strtotime($current_time))/60;	
}



$url_explode= explode("?",basename(curPageURL()));
if($url_explode[0]=='mainpaper.php')
{

	include('include/left-menu-hide.php');
}
else
{
	
	include('include/left-menu.php');
}



//include('include/left-menu.php');

if($_GET['exam_id']!="")
{
	$e_id=decrypt_string($_GET['exam_id']);
	$query_p_exam=mysqli_fetch_array(mysqli_query($con,"select * from exam where e_id='".$e_id."'"));
	 $category_id=$query_p_exam['category_id'];
	 $subcategory_id=$query_p_exam['subcategory_id'];
	 $subject_id=$query_p_exam['subject_id'];
	$exam_name=$query_p_exam['exam_name'];
	$exam_duration=$query_p_exam['exam_duration'];
	$neg_mark_status=$query_p_exam['neg_mark_status'];
	$negative_marks=$query_p_exam['negative_marks'];
	
	$show_question=$query_p_exam['show_question'];
	$show_question_limit=explode(",",$show_question);
	$subject_id_explode=explode(",",$subject_id);
	 $count=count($subject_id);
 

	for($p=0;$p<$count;$p++)
	{		
		 
	 $query_question .=" SELECT o.q_id, q.s_id, q.c_id, q.s_c_id,  q.question_status, q.marks, q.question_type, o.question, o.typeofquestion, o.option_a, o.option_b, o.option_c, o.option_d, o.correct_ans, o.o_q_id FROM questions_table q, objective_table o WHERE question_status =1 AND q.c_id = '".$category_id."' AND q.s_c_id = '".$subcategory_id."' AND q.s_id = '".$subject_id_explode[$p]."' and q.q_id= o.q_id ";
	   
	 
		
		if($p <$count-1)
		{
			$query_question.= "UNION";
		}		
	}
	// $query_question;
	 $query_pag_data = mysqli_query($con,$query_question);	
	
}
?>
<script type="text/javascript"
  src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
</script>
<div class="main-content">  
<br>
<div class="container-fluid padded">
<div class="container-fluid padded">
		
       
		<div class="row-fluid">
            <div class="span8">
				<div class="box">
					<div class="box-header">
						<span class="title"><i class="icon-reorder"></i>&nbsp;Questions</span>
					</div>
					<div class="box-content scrollable" style="max-height: 500px; overflow-y: auto">
						<div class="box-section news with-icons">
							<form method='post' id='quiz_form' action="main_result.php">
										<table style="width:100%;vertical-align:top"  class="table table-normal">
											<tr>
												<td style="vertical-align:top">						
													<?php
													 $total_querstion= @mysqli_num_rows($query_pag_data);
													$timeduration=60000*$query_exam_Name['duration'];
													$i=1;
													$m_e_id=1;
													while($result= @mysqli_fetch_array($query_pag_data)){
													
													 $question_id_get.=$result['q_id'].',';// get total question an question id
													
													?>
													<!--<input type="hidden" name="question_id_get" value="<?php echo $question_id_get;?>"> -->
											<div <?php if($i==1){}
											else
											{echo 'style="display: none;"';}?> id="<?php echo $m_e_id;?>_<?php echo $i;?>" class="display_question">
													<div class="bradcome-menu qu-pa">
													<div class="col-md-6"> <span class="question"> Question No. <?php echo $i;?></span></div>
													</div>
													<h4 class="quction"><p><?php echo $result['question'];?></p></h4>

													<?php if($result['typeofquestion']=='Single'){ ?>
													<table class="answeers" border="0" width="100%">					
													<tbody>
													<tr>
													<td style="width:10px"><input name="radio_<?php echo $result['q_id'];?>" value="A" id="" type="radio"></td>
													<td><?php echo $result['option_a'];?>                       </td>
													</tr>
													<tr>
													<td>
													<input name="radio_<?php echo $result['q_id'];?>" value="B" id="" type="radio"></td><td>
													<?php echo $result['option_b'];?>                        </td>
													</tr>
													<tr>
													<td>
													<input name="radio_<?php echo $result['q_id'];?>" value="C" id="" type="radio"></td><td>
													<?php echo $result['option_c'];?>                        </td>
													</tr>
													<tr>
													<td>
													<input name="radio_<?php echo $result['q_id'];?>" value="D" id="" type="radio"></td><td>
													<?php echo $result['option_d'];?>                        </td>
													</tr>
													</tbody>
													</table>
													<?php }
													if($result['typeofquestion']=='Multiple'){?>
													<table class="answeers" border="0" width="100%">
													<tbody><tr>
													<td style="width:10px">
													<input name="checkbox_A_<?php echo $result['q_id'];?>" value="A" id="" type="checkbox"></td><td>
													<?php echo $result['option_a'];?>                        </td>
													</tr>
													<tr>
													<td>
													<input name="checkbox_B_<?php echo $result['q_id'];?>" value="B" id="" type="checkbox"></td><td>
													<?php echo $result['option_b'];?>                       </td>
													</tr>
													<tr>
													<td>
													<input name="checkbox_C_<?php echo $result['q_id'];?>" value="C" id="" type="checkbox"></td><td>
													<?php echo $result['option_c'];?>                      </td>
													</tr>
													<tr>
													<td>
													<input name="checkbox_D_<?php echo $result['q_id'];?>" value="D" id="" type="checkbox"></td><td>
													<?php echo $result['option_d'];?>                       </td>
													</tr>
													</tbody>
													</table>
													<?php } ?>
													
													
													
											</div>	
											
													
													<?php
													$i++;
													}
													?>
												
							</div>
												</td>
											</tr>
											<tr>
												<td>
													<table>
													<tr>
													<td><div id="prev" class="btn btn-gray "><?php echo constant('TI_PREVIOUS_BUTTON');?></div></td>
													<td><div id="mnext" class="btn btn-gray"><?php echo constant('TI_MARK_FOR_REVIEW_BUTTON');?></div></td>
													<td><div id="next" class="btn btn-gray"><?php echo constant('TI_NEXT_BUTTON');?></div></td>
													<td><div id="clearAnswer" class="btn btn-gray"><?php echo constant('TI_CLEAR_ANSWER_BUTTON');?></div></td>
													<td><div style="float:right"><input id="finish" class="btn btn-green" value="Finish" name="Finish" onclick="return confirm('<?php echo constant('TI_SUBMITALERT_MESSAGE')?>')" type="submit"></div></td>
													</tr>
													</table>
													
												</td>
											</tr>
										</table>
										<input type="hidden" name="question_id_get" value="<?php echo $question_id_get;?>">
										<input type="hidden" name="exam_id" value="<?php echo $_GET['exam_id'];?>">	
						</form>
						</div>
					</div>
				</div>
			</div>
            <!---CALENDAR ENDS-->
            
			<!---TO DO LIST STARTS-->
			<div class="span4">
				<div class="box">
					<div class="box-header">
						<span class="title"><i class="icon-question-sign"></i>&nbsp;<?php echo $exam_name;?></span>
					</div>
					<div class="box-content scrollable" style="max-height: 500px; overflow-y: auto">
						<div class="box-section news with-icons">
							<table align="center" width="100%" border="0" valign="top" style="vertical-align:top">
										<tr>
											<td colspan="2" class="news-title" valign="top"> <?php echo constant('TI_LABEL_QUESTION_EXAM');?> <?php echo $exam_name;?></td>
										</tr>
										<tr>
											<td class="news-title"><?php echo constant('TI_LABEL_QUESTION_DURATION');?></td>
											<td class="news-title"><?php echo $exam_duration;?> <?php echo constant('TI_LABEL_QUESTION_MIN');?></td>
										</tr>
										<tr>
											<td class="news-title"><?php echo constant('TI_LABEL_QUESTION_TIME_LEFT');?></td>
											<td class="news-title"><span id="mins"></span>:<span id="seconds"></span></td>
										</tr>
										<tr>
											<td class="news-title"><?php echo constant("TI_LABEL_QUESTION_NEGATIVE_MARK");?></td><td><?php if($neg_mark_status==1){?><div style="float:left"><i class="icon-ok-sign icon-2x"></i></div><div class="news-title">&nbsp;&nbsp; <?php  echo $negative_marks;?></div><?php } else {?><i class="icon-remove-sign icon-2x"></i><?php }?></td>
										</tr>
									</table>
							<div>&nbsp;</div>
							<div class="g-awareness">
								<div class="awareness-view"><h4 class="awareness-view-hed"><small><?php echo constant('TI_LABEL_QUESTION_PALETTE');?></small></h4>
									<div class="col-md-12">
										<div class="number-plate">
											<?php
											
											$j=1;
											for($r=0;$r<$count;$r++)
											{		
												$query_question1 .="( SELECT * FROM questions_table WHERE question_status =1 AND c_id = '".$category_id."' AND s_c_id = '".$subcategory_id."' AND s_id = '".$subject_id_explode[$r]."' )" ;
												if($r <$count-1)
												{
												$query_question1.= "UNION";
												}		
											}
											$query_pag_data1 = mysqli_query($con,$query_question1);
											while($result_buttom=mysqli_fetch_array($query_pag_data1)){

											?>
												<li id="number-<?php echo $m_e_id;?>_<?php echo $j;?>" onclick="showQuestion('#<?php echo $m_e_id;?>_<?php echo $j;?>');" class="btn bg-primary numbers z-answered"><?php echo $j;?>  </li>
											<?php $j++;}?>
										</div>
									</div>
								</div>
							</div>
							<div>&nbsp;</div>
						</div>
					</div>
				</div>
			</div>
			<!---TO DO LIST ENDS-->
       </div>
   </div>

     </div>
   </div>		   
 
	   
		   
	   
	<script>
$(document).ready(function(){
 
	
	document.onkeydown = function (e) {
        return (e.which || e.keyCode) != 116;
    };
	
	$(document).bind('contextmenu',function(e){
        e.preventDefault();
      });
		
   updateSummary();
    $(".display_question").each(function(e) {
           if (e != 0)
               $(this).hide();
       });
   	
       $("#next").click(function(){
   		$("#prev").show();
   		var  numberPlateId ="#"+"number-"+$(".display_question:visible").attr('id');

   		if(($(".display_question:visible table input:radio:checked").length == 0)&&($(".display_question:visible table input:checkbox:checked").length == 0))
   		$(numberPlateId).removeClass('q-answered m-answered n-answered z-answered').addClass('n-answered');
   		else
   		$(numberPlateId).removeClass('q-answered m-answered n-answered z-answered').addClass('q-answered');
           if ($(".display_question:visible").next().length != 0)
               $(".display_question:visible").next().fadeIn(1000).prev().hide();
           else {
               
   			$(this).hide();
           }
   		updateSummary();
           return false;
       });
   	
   	$("#mnext").click(function(){
   		$("#prev").show();
   		
   		var  numberPlateId ="#"+"number-"+$(".display_question:visible").attr('id');
		
   
		 if(($(".display_question:visible table input:radio:checked").length == 0)&&($(".display_question:visible table input:checkbox:checked").length == 0))
		{			
			
   		$(numberPlateId).removeClass('q-answered m-answered n-answered z-answered').addClass('n-answered');
		}
		else
		{
			
   		$(numberPlateId).removeClass('q-answered m-answered n-answered z-answered').addClass('m-answered');
   		}


           if ($(".display_question:visible").next().length != 0)
               $(".display_question:visible").next().fadeIn(1000).prev().hide();
           else {
              $(this).hide();
           }
   		updateSummary();
           return false;
       });
   
       $("#prev").click(function(){
   		$("#next").show();
           if ($(".display_question:visible").prev().length != 0)
               $(".display_question:visible").prev().fadeIn(1000).next().hide();
           else {
              
   			$(this).hide();
           }
   		updateSummary();
           return false;
       });
   	
   	  $("#clearAnswer").click(function(){
   		//$("#next").show();
   		var  numberPlateId ="#"+"number-"+$(".display_question:visible").attr('id');
		
   		if($(".display_question:visible table input:radio:checked").length != 0)
   		{
   		$(".display_question:visible table input:radio:checked").removeAttr("checked");
   			$(numberPlateId).removeClass('q-answered m-answered n-answered z-answered').addClass('z-answered');
   		}
		else if ($(".display_question:visible table input:checkbox:checked").length != 0)
		{
			$(".display_question:visible table input:checkbox:checked").removeAttr("checked");
   			$(numberPlateId).removeClass('q-answered m-answered n-answered z-answered').addClass('z-answered');
		}
		
   		else
		  {
   		alert('No Answer Selected');
		  }
           
   		updateSummary();
           return false;
       });
   
    var mins=60;
   		 var sec = 60;
   		
   			intilizetimer();
   
   });
   
   function showSubjectQuestions(id){
   $('.display_question').hide();
   $('#'+id+'_1').fadeIn(1000);
   }
   
   function showQuestion(id){
   
   $('.display_question').hide();
   $(id).fadeIn(1000);
   }
   
   function updateSummary()
   {
   	$(".am-answered").text($(".number-plate .m-answered").length);
   	$(".az-answered").text($(".number-plate .z-answered").length);
   	$(".an-answered").text($(".number-plate .n-answered").length);
   	$(".aq-answered").text($(".number-plate .q-answered").length);
   }
   
   
   	function intilizetimer()
   		 {
   		 	 //totaltime = $("#totaltime").text().split(":");
   			 //mins = <?php echo $exam_duration;?>//totaltime[0];		
			 
			 mins = <?php echo $durationexam;?>//totaltime[0];
   			 sec = '0';//totaltime[1];
   			 startInterval();
   		 }
   		 
   		 function tictac(){
   			sec--;
   			if(sec<=0)
   			{
   				mins--;
   				$("#mins").text(mins);
   				if(mins<1)
   				{
   					$("#timerdiv").css("color", "red");
   				}
   				if(mins<0)
   				{
   					stopInterval();
   					$("#mins").text('0');
   					alert('You have reached the time limit to finish the exam.');
   					$('#finish').removeAttr('onclick');
   					$('#finish').click();
   					$('form').submit();
   					
   				}
   				
   					
   				sec=60;
   			}
   			if(mins>=0)
   			$("#seconds").text(sec);
   			else
   			$("#seconds").text('00');
   		}
   		function startInterval()
   		{
   		timer= setInterval("tictac()", 1000);
   		}
   		function stopInterval()
   		{
   			clearInterval(timer);
   		}
</script>	   

    <?php include("copyright.php");?>         
	</div>

</body>




 <link href="css/question.css" media="screen" rel="stylesheet" type="text/css" />
</html>