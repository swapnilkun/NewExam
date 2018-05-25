<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');

if(isset($_POST['submit']) && $_POST['student_id']!="")
{	
	//$category_id= mysql_prep($_POST['category_id']);
//	$subject_id= mysql_prep($_POST['s_id']);
	//$center_id= mysql_prep($_POST['c_id']);
	$fname= mysql_prep($_POST['student_fname']);
	$mname= mysql_prep($_POST['student_mname']);
	$lname= mysql_prep($_POST['student_lname']);
	$student_address= mysql_prep($_POST['student_address']);
	$student_phone= $_POST['student_phone'];
	//$password_md5= mysql_prep(encrypt($_POST['password']));
	//$password= $_POST['password'];
//$b_id= $_POST['b_id'];
	
		 $query_update_mysql_student=mysqli_query($con,"update student set student_fname='{$fname}', student_mname='{$mname}', student_lname='{$lname}',student_address='{$student_address}',student_phone='{$student_phone}' where student_id='".$_POST['student_id']."'");
		
		
		if($query_update_mysql_student)
		{
			
			$message_success .=ucfirst($student_name)." ". constant('TI_STUDENT_EDIT_MESSAGE');

		}
		else
		{
			$error .=  constant('TI_SUBJECT_MYSQL_ERROR');
		}
	
	
}
if($_GET['student_id']!="")
{
$student_id=$_GET['student_id'];
$query=mysqli_query($con,"select * from student where student_id='".$student_id."'");
$result=mysqli_fetch_array($query);
if($result['student_dob']!="")
	{
		$exam_date_explode=explode("-",$result['student_dob']);		
		$exam_date=$exam_date_explode[1]."/".$exam_date_explode[0]."/".$exam_date_explode[2];
	}
}
?>

<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i><?php echo constant('TI_MANAGE_STUDENT');?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-wrench"></i><?php echo constant('TI_STUDENT_EDIT_BUTTON');?></a>
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
                                <label class="control-label"><?php echo constant('TI_LABEL_CATEGORY_NAME');?></label>
                                <div class="controls">
									<select name="category_id" class="chzn-select" onChange="getState(this.value)">
									<option><?php echo constant('TI_SELECT_CATEGORY');?></option>  
										<?php $query_category=mysqli_query($con,"select * from category where category_status=1");
										while($result_category=mysqli_fetch_array($query_category))
										{
										?>
										<option value="<?php echo $result_category['c_id'];?>" <?php if($result_category['c_id']==$result['category_id']){echo 'selected="selected"';}?>><?php echo ucfirst($result_category['category_name']);?></option>
										
										<?php }?>
                                                
                                    </select>
                                </div>
                            </div>
						</div>
					

						
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_BATCH_NAME_TIME');?></label>
                                <div class="controls">
                                   <select name="b_id" class="chzn-select">
								   <option value=""><?php echo constant('TI_DROPDOWN_BATCH_SELECT');?></option>
								   <?php 
								   $query_batch=mysqli_query($con,"select * from batch order by b_id");
								   while($result_batch=mysqli_fetch_array($query_batch))
								   {?>
									<option value="<?php echo $result_batch['b_id'];?>" <?php if($result_batch['b_id']==$result['b_id']){echo 'selected="selected"';}?>><?php echo $result_batch['batch_name']."(".$result_batch['batch_time'].")";?></option>

								   <?php }
								   ?>
								   </select>
                                </div>
                            </div>
                        </div>-->

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
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_DOB');?></label>
                                <div class="controls">
                                    <input type="text" name="exam_date"  class="validate[required] datepicker" value="<?php echo $exam_date;?>"/>
                                </div>
                            </div>
                        </div>


						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_ADDRESS');?></label>
                                <div class="controls">
                                   
									<div class="box closable-chat-box">									
									<div class="chat-message-box">
									<textarea name="student_address" class="validate[required]" id="text_for_signature" rows="5" placeholder="Add Address"><?php echo  $result['student_address'];?></textarea>
									</div>
									</div>
                                </div>
                            </div>
                        </div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_PHONE');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required,custom[integer]]" name="student_phone" value="<?php echo $result['student_phone']; ?>" />
                                </div>
                            </div>
                        </div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_EMAIL');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required,custom[email]]" readonly name="student_email" value="<?php echo $result['student_email']; ?>" />
                                </div>
                            </div>
                        </div>
					<!--<div class="padded">  
						<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_USER_NAME');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="username" value="<?php echo $result['user_name']; ?>" />
                                </div>
                            </div>
						 </div>
						<div class="padded">  
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_PASSWORD');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="password" value="<?php echo $result['password']; ?>"/>
                                </div>
                            </div>
						 </div>-->

                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo constant('TI_STUDENT_EDIT_BUTTON');?> </button>
							<input type="hidden" value="Update_setting" name="submit">
							<input type="hidden" value="<?php echo $result['student_id'];?>" name="student_id">
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