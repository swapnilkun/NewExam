<?Php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
 $batch_time=$_GET['batch_time'];
 $endTimeduration=$_GET['endTimeduration'];
$date = date("H:i:s");
list($cur_hor, $cur_min, $cur_sec) = explode(':', $date);
 $current_time=$cur_hor.':'.$cur_min;
 ?>

<body>

  <?php if($current_time>$endTimeduration){?>
	<div class="tab-pane box active" id="edit" style="padding: 5px">
	<div class="box-content">
	<p style="font-size:17px;"><?php echo constant('TI_POPUP_TAKE_EXAM_AFTER_EXAM_TIME_DURATION');?><strong></p>
	</div>
	</div>
	<?php } else{?>

	<div class="tab-pane box active" id="edit" style="padding: 5px">
	<div class="box-content">
	<p style="font-size:17px;"><?php echo constant('TI_POPUP_TAKE_EXAM_AFTER_DURATION');?><strong><?php echo $batch_time;?></strong><?php echo constant('TI_EXAM_ERROR_HOURS');?></p>
	</div>
	</div>
	<?php }?>

</body></html>