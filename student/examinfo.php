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
		<p style="font-size:17px;">All ready, You attamp this exam.</p>
		</div>
		</div>
	 <?php 
 }
 else
	 {?> 
  
<div class="tab-pane box active" id="edit" style="padding: 5px">
<div class="box-content">
<p style="font-size:17px;">You will be able to take up this exam after <strong><?php echo $s_id;?></strong> day/s.</p>
</div>
</div>
<?php }?>



</body></html>