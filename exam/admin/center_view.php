<?Php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
if($_GET['center_id']!="")
{
	$center_id=$_GET['center_id'];	
	$query2=mysqli_query($con,"select * from teacher where center_id='{$center_id}'");
	$res=mysqli_fetch_array($query2);
}

?>

<body>
  
<div class="tab-pane box active" id="edit" style="padding: 5px">
	<div class="box-content">
		<form action="<?php $PHP_SELF ?>" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top" enctype="multipart/form-data">
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo "Branch Manager ID";?></label>
                                <div class="controls">
                                    <?php echo $res['teacher_id'];?>
                                </div>
                            </div>
                        </div>			
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo "Branch Manager Name";?></label>
                                <div class="controls">							
								   
									<?php echo $res['teacher_name'];?>
								  
                                </div>
                            </div>
                        </div>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo "About Branch Manager";?></label>
                                <div class="controls">							
								   
									<?php echo $res['about_teacher'];?>
								  
                                </div>
                            </div>
                        </div>


						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo "Branch Manager Address";?></label>
                                <div class="controls">                                  
								  <?php echo $res['teacher_addr'];?>
                                </div>
                            </div>
                        </div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_PHONE_CENTER');?></label>
                                <div class="controls">                                  
								  <?php echo $res['phone_no'];?>
                                </div>
                            </div>
                        </div>

						<?php if($res['teacher_logo']!=""){?>
						<div class="padded">  
                            <div class="control-group">
                                <label class="control-label"><?php echo "Branch Manage Logo";?></label>
                                <div class="controls" style="width:210px;">
                                    <img id="blah" src="../images/logo/centerlogo/<?php echo $res['teacher_logo'];?>" alt="your Logo" height="100" />
                                </div>
                            </div>
							 </div>
							<?php } ?>	


									
						


						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_CENTER_EMAIL');?></label>
                                <div class="controls">
                                    <?php 
								   $query_center=mysqli_fetch_array(mysqli_query($con,"select * from teacher where center_id='".$res['center_id']."'"));
								    echo $query_center['email'];							 
								   ?>
                                </div>
                            </div>
                        </div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_CENTER_USER_NAME');?></label>
                                <div class="controls">
								<?php echo $res['username'];?>
                                    
                                </div>
                            </div>
                        </div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_CENTER_PASSWORD');?></label>
                                <div class="controls">
									<?php echo $res['password'];?>                                   
                                </div>
                            </div>
                        </div>

						
					
		</form>
	</div>
</div>
</body>
</html>