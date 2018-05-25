<?Php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
$s_id=$_GET['s_id'];	
 ?>

<body>
 <?php if($s_id==0)
 {
	 ?> 
		<div class="tab-pane box active" id="edit" style="padding: 5px">
		<div class="box-content">
		<p style="font-size:17px;"><?php echo constant('TI_POPUP_TAKE_EXAM');?></p>
		</div>
		</div>
	 <?php 
 }
 else
	 {?> 
  
<div class="tab-pane box active" id="edit" style="padding: 5px">
<div class="box-content">
<p style="font-size:17px;"><?php echo constant('TI_POPUP_TAKE_EXAM_AFTER_DAYS');?><strong><?php echo $s_id;?></strong><?php echo constant('TI_EXAM_ERROR_DAY');?></p>
</div>
</div>
<?php }?>



</body></html>