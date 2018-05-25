<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');



 if(isset($_POST['submit']) && $_POST['s_id']!="")
{	
//	$subcategory_id= mysql_prep($_POST['s_c_id']);
	$subject_name= mysql_prep($_POST['subject_name']);
	
	//$course_fee= mysql_prep($_POST['course_fee']);
    //$exam_fee= mysql_prep($_POST['exam_fee']);
	//$certify= mysql_prep($_POST['certify']);
	$duration= mysql_prep($_POST['duration']);
	//$category_id= mysql_prep($_POST['category_id']);
	//$center_id= mysql_prep($_POST['center_id']);


		
		$query_update_mysql_subject=mysqli_query($con,"update subject set subject_name='{$subject_name}', duration='{$duration}' where s_id='".$_POST['s_id']."'");
		if($query_update_mysql_subject)
		{
			
			$message_success .=ucfirst($subject_name)." ". constant('TI_COURSE_EDIT_MESSAGE');

		}
		else
		{
			$error .=  constant('TI_COURSE_MYSQL_ERROR');
		}
	}
	

if($_GET['s_id']!="")
{
$s_id=$_GET['s_id'];
$query=mysqli_query($con,"select * from subject where s_id='".$s_id."'");
$result=mysqli_fetch_array($query);
}
?>

<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i><?php echo constant('TI_MANAGE_COURSE');?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-wrench"></i><?php echo constant('TI_COURSE_EDIT');?></a>
					</li>
				</ul>	
			</div>
	<div class="box-content padded">
		<div class="tab-content">        
			<?php include("message.php");?>
			<div class="tab-pane active" id="add" style="padding: 5px">
				<form method="post" action="" class="form-horizontal validatable" enctype="multipart/form-data">
                 
						<!--<div class="padded">       
							<div class="control-group">
								<label class="control-label"><?php echo "Center Id";?></label>
									<div class="controls">
										<input type="text" class="validate[required]" name="center_id" value="<?php echo $result['center_id']; ?>" />

									</div>
							</div>
						</div>-->
						
						<!--<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_COURSE_NAME');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="subject_name" value="<?php echo $result['subject_name']; ?>" />
                                </div>
                            </div>
                        </div>-->
                        
                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_COURSE_NAME');?></label>
                                <div class="controls">
                                   <select class="form-control subject_name" id="subject_name" name="subject_name">
                                    <option value="">Select Course</option>
                                     <?php 
								   $query_batch=mysqli_query($con,"select * from subject");
								   while($result_batch=mysqli_fetch_array($query_batch))
								   {?>
				              	 <option value="<?php echo $result_batch['subject_name']; ?>" <?php if($result_batch['subject_name'] == $result['subject_name']) { echo "selected=selected"; }?>> <?php echo $result_batch['subject_name']; ?></option>
								<?php }											   
							       ?>
                                  </select>
                                </div>
                            </div>
                        </div>
                        
                          <!--<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"> Certifying Authority</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="certify" value="<?php echo $result['certify']; ?>" />
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Exam Fee</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="exam_fee" value="<?php echo $result['exam_fee']; ?>" />
                                </div>
                            </div>
                        </div>
                        
                    	<div class="padded">                   
                         <div class="control-group">
                                <label class="control-label">Course Fee</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="course_fee" value="<?php echo $result['course_fee']; ?>" />
                                </div>
                            </div>
                        </div>-->
                        
                         <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Course Duration <br/>(Ex-2 Months)</label>
                                <div class="controls">
                                   <input type="text" class="validate[required]" name="course_fee" value="<?php echo $result['duration']; ?>" />
                                </div>
                            </div>
                        </div>
                        
                         

                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo constant('TI_COURSE_EDIT_BUTTON');?> </button>
							<input type="hidden" value="Update_setting" name="submit">
							<input type="hidden" value="<?php echo $result['s_id'];?>" name="s_id">
                        </div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>
</div>       
           <?php include("copyright.php");?>
		   </div>
	</div>
</body>
</html>