<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');

if(isset($_POST['submit']) && $_POST['student_id']!="")
{	

	$fname= mysql_prep($_POST['fname']);
	$lname= mysql_prep($_POST['lname']);
	$mname= mysql_prep($_POST['mname']);
	$interested_course= mysql_prep($_POST['interested_course']);
	
	$course = implode(', ', $interested_course);
	
	$student_phone= mysql_prep($_POST['student_phone']);
	$student_phone1= mysql_prep($_POST['student_phone1']);
	
    $student_state= mysql_prep($_POST['student_state']);
	$student_city= mysql_prep($_POST['student_city']);
	$student_postcode= mysql_prep($_POST['student_postcode']);
    $student_occupation= mysql_prep($_POST['student_occupation']);
	$student_gender= mysql_prep($_POST['student_gender']);
	
	$student_address= mysql_prep($_POST['student_address']);
	$student_email= $_POST['student_email'];

    //$date=date('Y-m-d');
    
    
//$b_id= $_POST['b_id'];
	
   $sql="update student set student_fname='{$fname}', student_mname='{$mname}', student_lname='{$lname}',course_interest='{$course}',
		 student_phone='{$student_phone}',student_phone1='{$student_phone1}',student_address='{$student_address}',student_email='{$student_email}',student_gender='{$student_gender}',
		 student_state='{$student_state}',student_city='{$student_city}',student_postcode='{$student_postcode}',student_occupation='{$student_occupation}',student_gender='{$student_gender}'
		 where student_id='".$_POST['student_id']."'";
		
	
		 $query_update_mysql_student=mysqli_query($con,$sql);	
		if($query_update_mysql_student)
		{
			
			$message_success .=ucfirst($student_name)." ". constant('TI_ENQUIRY_EDIT_MESSAGE');

		}
		else
		{
			$error .=  constant('TI_SUBJECT_MYSQL_ERROR');
		}
	
	echo "<script> window.location.assign('register.php'); </script>";
}
if($_GET['student_id']!="")
{
$student_id=$_GET['student_id'];
$query=mysqli_query($con,"select * from student where student_id='".$student_id."'");
$result=mysqli_fetch_array($query);
/*if($result['student_dob']!="")
	{
		$exam_date_explode=explode("-",$result['student_dob']);		
		$exam_date=$exam_date_explode[1]."/".$exam_date_explode[0]."/".$exam_date_explode[2];
	}*/
}
?>

<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i>Update Student Enquiry</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-wrench"></i>Update Student Enquiry</a>
					</li>
				</ul>	
			</div>
			
			
	<div class="box-content padded">
		<div class="tab-content">        
			<?php include("message.php");?>
			<div class="tab-pane active" id="add" style="padding: 5px">
				<form method="post" action="" class="form-horizontal validatable" enctype="multipart/form-data">
                     
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">First Name</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="fname" value="<?php echo $result['student_fname']; ?>">
                                </div>
                            </div>
                        </div>
                        
                    	<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Middle Name</label>
                                <div class="controls">
                                    <input type="text"  name="mname" value="<?php echo $result['student_mname']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Last Name</label>
                                <div class="controls">
                                    <input type="text" name="lname" placeholder="Enter last name" value="<?php echo $result['student_lname']; ?>">
                                </div>
                            </div>
                        </div>

					    <div class="padded"> 
					     <div class="control-group">
                          <label class="control-label">Course of interest :</label>
                          <div class="controls">
                         	<select class="form-control chzn-select" name="interested_course[]" multiple="multiple" data-placeholder="Select a Course">
					      	
				     
										     <?php 
                        								   $query_batch=mysqli_query($con,"select subject_name from subject");
                        								    while($result_batch=mysqli_fetch_array($query_batch))
                        								   {?>
                        								 <option value="<?php echo $result_batch['subject_name'];?>" <?php if($result_batch['subject_name']== $result['course_interest']) { echo "selected=selected"; }?>> <?php echo $result_batch['subject_name']; ?></option>
											    	<?php }
                        						    ?>
                        			
					        </select>
				         <span class="help-block"></span>
                        </div>
                       </div>
                      </div>
                      
                    	<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Student Mobile</label>
                                <div class="controls">
                                    <input type="text" name="student_phone" value="<?php echo $result['student_phone']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"> Alternative Mobile</label></label>
                                <div class="controls">
                                    <input type="text"  name="student_phone1"  value="<?php echo $result['student_phone1']; ?>">
                                </div>
                            </div>
                        </div>
                        
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_EMAIL');?></label>
                                <div class="controls">
                                    <input type="text"  name="student_email"value="<?php echo $result['student_email']; ?>">
                                </div>
                            </div>
                        </div>
						
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_DOB');?></label>
                                <div class="controls">
                                    <input type="date" name="student_dob" value="<?php echo $result['student_dob']; ?>">
                                </div> 
                            </div>
                        </div>
                        
                        <div class="padded">
                        <div class="control-group">
                          <label class="control-label">Gender</label></label>
                          <div class="controls">
				           <select name="student_gender" id="student_gender">
                            <option selected="selected" value="">--select--</option>
                                    <option value="Male" <?php if($result['student_gender'] == 'Male'){ echo "selected=selected"; } ?>>Male</option>
                                    <option value="Female" <?php if($result['student_gender'] == 'Female'){ echo "selected=selected"; } ?>>Female</option>
                           </select>
                        </div>
                        </div>
				        <span class="help-block"></span>
                        </div>	
                       
                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Occupation</label>
                                <div class="controls">
                                    <input type="text" name="student_occupation" value="student" value="<?php echo $result['student_occupation']; ?>">
                                </div>
                            </div>
                        </div>
                        
                         <div class="padded">
                        <div class="control-group">
                          <label class="control-label">State</label></label>
                          <div class="controls">
				            <select name="student_state" id="student_state">
                            <option selected="selected" value="">--select--</option>
                            <?php 
								   $query_batch=mysqli_query($con,"select * from states");
								   while($result_batch=mysqli_fetch_array($query_batch))
								   {?>
								 <option value="<?php echo $result_batch['id']; ?>" <?php if($result_batch['id'] == $result['student_state']) { echo "selected=selected"; }?>> <?php echo $result_batch['name']; ?></option>
									

							<?php }
						    ?>
                        </select>
                        </div>
                        </div>
				        <span class="help-block"></span>
                        </div>
                        
                         <div class="padded">
                        <div class="control-group">
                          <label class="control-label">City</label></label>
                          <div class="controls">
				            <select name="student_city" id="student_city">
                            <option value="">--select--</option>
                            <?php 
								   $query_batch=mysqli_query($con,"select * from district");
								   while($result_batch=mysqli_fetch_array($query_batch))
								   {?>
								 <option value="<?php echo $result_batch['id']; ?>" <?php if($result_batch['id'] == $result['student_city']) { echo "selected=selected"; }?>> <?php echo $result_batch['district_name']; ?></option>
									

							<?php }
						    ?>
                        </select>
                        </div>
                        </div>
				        <span class="help-block"></span>
                        </div>
                        
                         <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Postcode</label>
                                <div class="controls">
                                    <input type="text" name="student_postcode"  value="<?php echo $result['student_postcode']; ?>">
                                </div>
                            </div>
                        </div>
                        
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Permanent Address</label>
                                <div class="controls">
                                 	<div class="box closable-chat-box">									
									<div class="chat-message-box">
									<textarea name="student_address" id="text_for_signature" rows="3" ><?php echo $result['student_address']; ?></textarea>
									</div>
								</div>
                                </div>
                            </div>
                        </div>
                   
                        <div class="form-actions">
                            <!--<button type="submit" class="btn btn-gray">save & register </button>-->
							<input type="hidden" value="Update_setting" name="submit">
							<input type="hidden" value="<?php echo $result['student_id'];?>" name="student_id">
							<a href="register.php?student_id=<?php echo $result['student_id'];?>" onclick="return confirm(&quot;Are you sure?&quot;)" class="btn btn-sm btn-warning">Save & Register</a>
						
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