<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');

/*if (isset($_POST['enquiry'])) 
{ 

	$subject_id= mysql_prep($_POST['subject_id']);

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
	$student_email= $_POST['student_email'];*/
	

   // $date=date('Y-m-d');
	

  /*  $query_select_student=mysqli_query($con,"SELECT * FROM student where student_email='".$student_email."'");
	if(mysqli_num_rows($query_select_student)>0)
		{
			$error .=constant('TI_STUDENT_ERROR_ALLREADY_EXIT');
		}
	else
	 {
		
		$student_dob = mysql_prep($_POST['student_dob']);
		$dob = date("Y-m-d",strtotime($student_dob));
		/*if($student_dob!="")
		{
		$dobexplode=explode("/",$student_dob);
		$dob_day=$dobexplode[1];
		$dob_month=$dobexplode[0];
		$dob_year=$dobexplode[2];
		$student_dob_from=$dob_day.'-'.$dob_month.'-'.$dob_year;
		}*/

		/* $query_insert_student = "INSERT INTO student (student_fname,student_mname,student_lname,course_interest,subject_id,student_phone,student_phone1,student_email,student_dob,student_gender,
		                          student_occupation,student_state,student_city,student_postcode,student_address,type,date) VALUES
		                          ('{$fname}','{$mname}','{$lname}','{$course}','{$subject_id}','{$student_phone}','{$student_phone1}','{$student_email}','{$dob}',
		                          '{$student_gender}','{$student_occupation}','{$student_state}','{$student_city}','{$student_postcode}','{$student_address}','enquiry','{$date}')";
		                          
		$result_student=mysqli_query($con,$query_insert_student);
		if($result_student)
		{
			//$message_success .= $student_name." ".constant('TI_STUDENT_ADD_MESSAGE');
		  
		  echo "<script> alert('add new enquiry student...!!!'); </script>";
		  echo "<script> window.location.assign('enquiry.php'); </script>";
		}
		else
		{
			$error .= constant('TI_STUDENT_MYSQL_ERROR');
		}
	}
}*/

?>

<div class="main-content">
                    <div class="container-fluid" >
            <div class="row-fluid">
                <div class="area-top clearfix">
                    <div class="pull-left header">
                        <h3 class="title">
                        <i class="icon-edit"></i>
                         Manage Enquiry</h3>
                    </div>

                </div>
            </div>
        </div>
 
             
             <div class="container-fluid padded">
                <div class="box">
              <?php include("message.php");?>
				<div class="box-header">
				<ul class="nav nav-tabs nav-tabs-left">
				<li class="active">
				<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
				Enquiry List
				</a></li>
			    </ul>
				</div>
			    
			    
	<div class="box-content padded">
		<div class="tab-content">
           
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
							<th><div><?php echo constant('TI_TABLE_STUDENT_NAME') ?></div></th>
							<th><div>Course Name</div></th>
							<th><div>Mobile </div></th>
							<th><div>Enquiry Date</div></th>
                    		<th><div>Action</div></th>
						</tr>
					</thead>
                    <tbody>
							<?php 
								$query=mysqli_query($con,"select * from student where type='enquiry'");
								$i=0;
								while($row=mysqli_fetch_array($query))
								{ 
							
							?>
								<tr class="text-center">								
						     
						     	<td><?php echo ucfirst($row['student_fname']) ;?> <?php echo ucfirst($row['student_mname']) ;?> <?php echo ucfirst($row['student_lname']) ;?> </td>
								<td><?php echo ucfirst($row['course_interest']);?> </td>
							    <td><?php echo ucfirst($row['student_phone']);?> </td>
							    <td><?php echo ucfirst($row['enquiry_date']);?> </td>
                            	<td align="center">
							 
							 	<a data-toggle="modal" href="enquiry_edit.php?student_id=<?php echo $row['student_id'];?>" class="btn btn-gray btn-small"><i class="icon-pencil"></i> <?php echo constant('TI_EDIT');?></a>

								<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('enquiry_delete.php?student_id=<?php echo $row['student_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON');?> </a>
                                <a href="register.php?student_id=<?php echo $row['student_id'];?>" onclick="return confirm(&quot;Are you sure?&quot;)" class="btn btn-sm btn-warning">Register Now</a>
							<!--<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_student_profile('View_Student',<?php //echo $row['student_id'];?>)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i> <?php //echo constant('TI_EXAM_VIEW_BUTTON');?></a>-->

								</td>
								</tr>
						<?php } ?>
                                
							</tbody>
                </table>
			</div>
			
			<!--	<div class="tab-pane box" id="add" style="padding: 5px">
               <div class="box-content">
                  <form action="<?php $PHP_SELF ?>" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top" enctype="multipart/form-data">
						<div class="padded">       
							<div class="control-group">
                                <label class="control-label"><?php //echo constant('TI_LABEL_CATEGORY_NAME');?></label>
                                <div class="controls">
									<select name="category_id" class="chzn-select" onChange="getState(this.value)">
									<option><?php //echo constant('TI_SELECT_CATEGORY');?></option>  
										<?php //$query_category=mysqli_query($con,"select * from category where category_status=1");
									//	while($result_category=mysqli_fetch_array($query_category))
										//{
										?>
                                    	<option value="<?php //echo $result_category['c_id'];?>"><?php //echo ucfirst($result_category['category_name']);?></option>
										
										<?php //}?>
                                                
                                    </select>
                                </div>
                            </div>
						</div>
					
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php //echo constant('TI_LABEL_SUB_CATEGORY_NAME');?></label>
                                 <div class="controls" id="subcategorydiv">
									<select name="subcategory_id" class="chzn-select">										
                                    	<option><?php //echo constant('TI_SELECT_CATEGORY_FIRST');?></option>
										
                                    </select>
                                </div>
                            </div>
                        </div>
						
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php //echo constant('TI_LABEL_BATCH_NAME_TIME');?></label>
                                <div class="controls">
                                   <select name="b_id" class="chzn-select">
								   <option value=""><?php //echo constant('TI_DROPDOWN_BATCH_SELECT');?></option>
								   <?php 
								   //$query_batch=mysqli_query($con,"select * from batch order by b_id");
								   //while($result_batch=mysqli_fetch_array($query_batch))
								  // {?>
									<option value="<?php //echo $result_batch['b_id'];?>"><?php //echo $result_batch['batch_name']."(".$result_batch['batch_time'].")";?></option>

								   <?php //}
								   ?>
								   </select>
                                </div>
                            </div>
                        </div>-->
         <!--               <br/>
                   
                    <table>
                    <tr> 
                    <td>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b>First Name</b></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="fname" placeholder="Enter first name" />
                                </div>
                            </div>
                        </div>
                         </td>
                        
                        <td>
                    	<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b>Middle Name</b></label>
                                <div class="controls">
                                    <input type="text"  name="mname" placeholder="Enter middle name" />
                                </div>
                            </div>
                        </div>

                     </td>
                     </tr>
                    </table>
                    
                    <table>
                    <tr> 
                    <td>
                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b>Last Name</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="lname" placeholder="Enter last name" />
                                </div>
                            </div>
                        </div>
                        </td>
                        
                        <td>
					    <div class="padded"> 
					     <div class="control-group">
                          <label class="control-label"><b>Course of interest :</b></label>
                          <div class="controls">
                         	<select class="form-control chzn-select course" name="interested_course[]" multiple="multiple" data-placeholder="Select a Course" class="validate[required]" id="course">
					      
					         <?php 
								   $query_batch=mysqli_query($con,"select * from subject");
								   while($result_batch=mysqli_fetch_array($query_batch))
								   {?>
									<option value="<?php echo $result_batch['subject_name'];?>"><?php echo $result_batch['subject_name']; ?></option>

							<?php }
						    ?>
					        </select>
					         <input type="hidden" class="" id="subject_id" name="subject_id"/>
				         <span class="help-block"></span>
                        </div>
                       </div>
                      </div>
                     
                     </td>
                     </tr>
                </table>
                    
                <table>
                    <tr> 
                    <td>
                    
                    	<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b>Student Mobile</b></label>
                                <div class="controls">
                                    <input type="text" class="validate[required,custom[integer]]" name="student_phone" placeholder="Student Mobile" />
                                </div>
                            </div>
                        </div>
                        </td>
                        
                        <td>
                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b> Alternative Mobile</b></label></label>
                                <div class="controls">
                                    <input type="text"  name="student_phone1" placeholder="Alternate Mobile" />
                                </div>
                            </div>
                        </div>
                  
                   </td>
                     </tr>
                    </table>
                    
                  <table>
                    <tr> 
                    <td>
                          
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b><?php echo constant('TI_LABEL_STUDENT_EMAIL');?></b></label>
                                <div class="controls">
                                    <input type="text"  name="student_email"/>
                                </div>
                            </div>
                        </div>
						</td>
                        
                        <td>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b><?php echo constant('TI_LABEL_STUDENT_DOB');?></label>
                                <div class="controls">
                                    <input type="text" name="student_dob"  class="validate[required,custom[dateFormat]] datepicker"/>
                                </div> 
                            </div>
                        </div>
                     
                     </td>
                     </tr>
                </table>
                    
                 <table>
                    <tr> 
                    <td>
                    
                           
                        <div class="padded">
                        <div class="control-group">
                          <label class="control-label"><b>Gender</b></label>
                          <div class="controls">
				           <select name="student_gender" id="student_gender" class="validate[required]">
                            <option selected="selected" value="">--select--</option>
                            <option value="Male" >Male</option>
                            <option value="Female" >Female</option>
                        </select>
                        </div>
                        </div>
				        <span class="help-block"></span>
                        </div>	
                       </td>
                        
                        <td>
                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b>Occupation</b></label>
                                <div class="controls">
                                    <input type="text" name="student_occupation" value="student" />
                                </div>
                            </div>
                        </div>
                
                      </td>
                     </tr>
                   </table>
                   
                 <table>
                    <tr> 
                    <td>
                    
                           
                         <div class="padded">
                        <div class="control-group">
                          <label class="control-label"><b>State</b></label>
                          <div class="controls">
				           <select name="student_state" id="student_state">
                            <option selected="selected" value="">--select--</option>
                            <?php 
								   $query_batch=mysqli_query($con,"select * from states order by id");
								   while($result_batch=mysqli_fetch_array($query_batch))
								   {?>
									<option value="<?php echo $result_batch['id'];?>"><?php echo $result_batch['name']; ?></option>

							<?php }
						    ?>
                        </select>
                        </div>
                        </div>
				        <span class="help-block"></span>
                        </div>
                        </td>
                        
                        <td>
                         <div class="padded">
                        <div class="control-group">
                          <label class="control-label"><b>City</b></label>
                          <div class="controls">
				           <select name="student_city" id="student_city">
                            <option selected="selected" value="">--select--</option>
                            
                        </select>
                        </div>
                        </div>
				        <span class="help-block"></span>
                        </div>
           
                     </td>
                     </tr>
                    </table>
                              
                         <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b>Postcode</b></label>
                                <div class="controls">
                                    <input type="text" name="student_postcode" placeholder="Enter Postcode" />
                                </div>
                            </div>
                        </div>
                        
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b>Permanent Address</b></label>
                                <div class="controls">
                                 	<div class="box closable-chat-box">									
									<div class="chat-message-box">
									<textarea name="student_address" class="validate[required]" id="text_for_signature" rows="3" placeholder="Permanent Address"></textarea>
									</div>
								</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <!--<button type="submit" class="btn btn-gray"><?php //echo constant('TI_STUDENT_ADD_BUTTON');?></button>-->
                        
                            <!--<div class="text-left">	
            				<input type="hidden" class="btn btn-gray" name="action" value="Add Enquiry" />		 
            				<input type="submit" class="btn btn-gray" name="enquiry" value="Add Student Enquiry" />	 &nbsp;&nbsp;&nbsp;	  
            			
            				<a href="enquiry.php" class="btn btn-danger" title="Cancel">Cancel</a>
            				&nbsp;&nbsp;&nbsp;	
            			  </div>
            			  
							<input type="hidden" value="Add new student" name="submit">
                        </div>
                    </form>                           
                </div>              
			</div>-->  
			
       	
		</div>
	</div>
</div>            </div>       
    <?php include("copyright.php");?>        
	</div>
	</div>

</body>

<!-----------HIDDEN QUESTION MODAL FORM - COMMON IN ALL PAGES ------>
<div id="question-modal-form" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div id="modal-tablesLabel_question" style="color:#fff; font-size:16px;">&nbsp; </div>
	</div>
    <div class="modal-body" id="modal-body-question"><?php echo constant('TI_LOADING_DATA');?></div>
    <div class="modal-footer">
        <!-- <button class="btn btn-gray" onclick="custom_print('frame1')"><?php echo constant('TI_PRINT');?></button> -->
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CLOSE');?></button>
    </div>
</div>

<!-----------HIDDEN MODAL DELETE CONFIRMATION - COMMON IN ALL PAGES ------>
<div id="modal-delete" class="modal hide fade" style="height:140px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i>&nbsp; <?php echo constant('TI_DELETE_CONFIRMATION');?></h6>
	</div>
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_POPUP_STUDENT_DELETE');?></div>
    <div class="modal-footer">
    	<a href="" id="delete_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL_BUTTON');?></button>
    </div>
</div>


<div id="modal-status-active" class="modal hide fade" style="height:140px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i>&nbsp; <?php echo constant('TI_DELETE_CONFIRMATION');?></h6>
	</div>
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_STATUS_DATA_ACTIVE');?></div>
    <div class="modal-footer">
    	<a href="category_status.php?c_id=<?php echo $row['c_id'];?>" id="active_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL_BUTTON');?></button>
    </div>
</div>


<div id="modal-status-deactive" class="modal hide fade" style="height:140px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i>&nbsp; <?php echo constant('TI_DELETE_CONFIRMATION');?></h6>
	</div>
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_STATUS_DATA_DEACTIVE');?></div>
    <div class="modal-footer">
    	<a href="category_status.php?c_id=<?php echo $row['c_id'];?>" id="deactive_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL_BUTTON');?></button>
    </div>
</div>
<script>
function modal_delete(param1)
{
	document.getElementById('delete_link').href = param1;
}

function modal_view_student_profile(param1 ,param2 ,param3)
{
	document.getElementById('modal-body-question').innerHTML = 
		'<iframe id="frame1" src="viewstudent.php?s_id='+param2+'" width="100%" height="400" frameborder="0"></iframe>';
	document.getElementById('modal-tablesLabel_question').innerHTML = param1.replace("_"," ");
}


function modal_status_active(param1)
{
	document.getElementById('active_link').href = param1;
}

function modal_status_deactive(param1)
{
	document.getElementById('deactive_link').href = param1;
}
</script>

<script>      
    $('#student_state').on('change', function(){
    var state = this.value;
	//alert(car);
    $.ajax({
	type: "POST",
	url: "get_city.php",
	data:'state='+state,
	success: function(result){
		$("#student_city").html(result);
		
		//alert(result);
		 //alert('please select another role' );
	}
	});
});

      
    $('#course').on('change', function(){
    var course = this.value;
	//alert(course);
    $.ajax({
	type: "POST",
	url: "get_subId.php",
	data:'course='+course,
	success: function(result){
		$("#subject_id").val(result);
		
		//alert(result);
		 //alert('please select another role' );
	}
	});
});
</script>  

</html>