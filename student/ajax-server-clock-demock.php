<?Php
include('include/configure.php');

$date = date("H:i:s");
list($cur_hor, $cur_min, $cur_sec) = explode(':', $date);


$_Student=mysqli_fetch_array(mysqli_query($con,"select * from student where student_id='".$_SESSION['student_id']."'"));
$_batch_id=$_Student['b_id'];
$_batch=mysqli_fetch_array(mysqli_query($con,"select * from batch where b_id='".$_batch_id."'"));
$batch_time=$_batch['batch_time'];

$current_time=$cur_hor.':'.$cur_min;



if($_GET["main_exam_id"]!="")
{
	$query_exam_term=mysqli_fetch_array(mysqli_query($con,"select * from exam where e_id='".$_GET["main_exam_id"]."'"));
	$exam_duration=$query_exam_term['exam_duration'];
}

$selectedTime = $batch_time;
$Starttime_plus_duration = strtotime($selectedTime) + $exam_duration*60;
$endTimeduration= date('H:i', $Starttime_plus_duration);

//echo $current_time.">=".$batch_time;


					if($current_time>=$batch_time AND $current_time<=$endTimeduration)
					{?>

						<a style="cursor:pointer;" onclick="isChecked('<?php echo date("H:i:s");?>'); return false;">
                        <div class="btn btn-gray btn-small "><i class="icon-play-circle icon-1x"></i>&nbsp; <?php echo constant('TI_STAET_EXAM_BUTTON');?></div>
						</a>
					<?php }
						else
						{?>


					<a data-toggle="modal" href="#take_exam-modal-form" onclick="modal_view_take_exam('<i class=icon-time icon-2x></i> Time_Remaining','<?php echo $batch_time;?>','<?php echo $endTimeduration;?>')" class="btn btn-red btn-small"><?php echo constant('TI_STAET_EXAM_BUTTON_PLEASEWAIT');?></a>	

						<?php }
					?>