<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');


if(isset($_POST['submit']))
{	

	$batch_name= mysql_prep($_POST['batch_name']);
	$batch_time= mysql_prep($_POST['batch_time']);	
    $course_name= mysql_prep($_POST['course_name']);	

	$query_update_mysql_subcategory=mysqli_query($con,"update batch set course_name='{$course_name}',batch_name='{$batch_name}',batch_time='{$batch_time}' where b_id='".$_POST['b_id']."'");

	if($query_update_mysql_subcategory)
	{
		$message_success .=$batch_name." ". constant('TI_BATCH_EDIT_MESSAGE');			
	}
	else
	{
		$error .=  constant('TI_BATCH_MYSQL_ERROR');
	}
	
}
if($_GET['b_id']!="")
{
	$b_id=$_GET['b_id'];
	$query=mysqli_query($con,"select * from batch where b_id='".$b_id."'");
	$result=mysqli_fetch_array($query);
}

?>
<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i><?php echo constant('TI_MANAGE_BATCH');?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-wrench"></i><?php echo constant('TI_BATCH_EDIT_BUTTON');?></a>
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
                                 <label class="control-label">Course Name</label>
                                <div class="controls">
								 <select class="form-control subject_name" id="course_name" name="course_name">
                                    <option value="">Select Course</option>
                                     <?php 
								   $query_batch=mysqli_query($con,"select * from subject");
								   while($result_batch=mysqli_fetch_array($query_batch))
								   {?>
				              	 <option value="<?php echo $result_batch['s_id']; ?>" <?php if($result_batch['s_id'] == $result['course_name']) { echo "selected=selected"; }?>> <?php echo $result_batch['subject_name']; ?></option>
								<?php }											   
							       ?>
                                  </select>
                                </div>
                            </div>
						</div>
						
						 <div class="padded">       
							<div class="control-group">
                                 <label class="control-label"><?php echo constant('TI_LABEL_BATCH_NAME');?></label>
                                <div class="controls">
									<input type="text" class="validate[required]" name="batch_name" value="<?php echo $result['batch_name']; ?>"/>
                                </div>
                            </div>
						</div>
						
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_BATCH_TIME');?></label>
                                <div class="controls">                                   
									<input type="text" name="batch_time" id="pr_departuretime_airlines" class="validate[required]" value="<?php echo $result['batch_time']; ?>"/>
									<script type="text/javascript">
									$(document).ready(function(){
									$('#pr_departuretime_airlines').timepicker({
									//hourGrid: 5,
									//minuteGrid: 10
									});
									});
									</script>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo constant('TI_BATCH_EDIT_BUTTON');?> </button>
							<input type="hidden" value="Update_setting" name="submit">
							<input type="hidden" value="<?php echo $result['b_id'];?>" name="b_id">
                        </div>
                    </form>                
                </div>                
			</div>
		
            
		</div>
	</div>
</div>
</div>
    <?php include("copyright.php");?>
	</div>
	</div>
</body> 
</html>