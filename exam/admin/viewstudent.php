<?Php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
if($_GET['s_id']!="")
{
	$s_id=$_GET['s_id'];	
	$query2=mysqli_query($con,"select * from student where student_id='{$s_id}'");
	$res=mysqli_fetch_array($query2);
}

$query_batch_name=mysqli_fetch_array(mysqli_query($con,"select * from batch where b_id='".$res['b_id']."'"));
?>

<body>
  
<div class="tab-pane box active" id="edit" style="padding: 5px">
	<div class="box-content">
		<form action="<?php $PHP_SELF ?>" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top" enctype="multipart/form-data">
								
						
                         <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_PHOTO');?></label>
                                <div class="controls">
									<img id="blah" src="../images/student/<?php echo $res['photo'];?>" alt="your Logo" height="100" />
                                </div>
                            </div>
                        </div>
                       
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_NAME');?></label>
                                <div class="controls">
                                    <?php echo $res['student_fname'];?> <?php echo $res['student_mname'];?> <?php echo $res['student_lname'];?>
                                </div>
                            </div>
                        </div>

						
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_DOB');?></label>
                                <div class="controls">
                                    <?php echo $res['student_dob'];?>
                                </div> 
                            </div>
                        </div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_ADDRESS');?></label>
                                <div class="controls">
									<?php echo $res['student_address'];?>
                                </div>
                            </div>
                        </div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_PHONE');?></label>
                                <div class="controls">
                                    <?php echo $res['student_phone'];?>
                                </div>
                            </div>
                        </div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_EMAIL');?></label>
                                <div class="controls">
                                    <?php echo $res['student_email'];?>
                                </div>
                            </div>
                        </div>

						
						<!--<div class="padded">  
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_PASSWORD');?></label>
                                <div class="controls">
                                    <?php echo $res['password'];?>
                                </div>
                            </div>
						 </div>-=->

						 <div class="padded">  
						<div class="control-group">
							<label class="control-label"><?php echo constant('TI_LABEL_STUDENT_STATUS');?></label>
							<div class="controls">
							<?php if($res['student_status']==1)
							{ 
								echo constant('TI_ACTIVATE_STATUS_BUTTON');
							}
							if($res['student_status']==0)
							{
								echo constant('TI_INACTIVE_STATUS_BUTTON');
							}?>
								
							
							</div>
						</div>
						</div>
					
		</form>
	</div>
</div>

</body></html>