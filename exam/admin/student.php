<?php
session_start();
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
require_once 'export_student.php';
//ini_set ( 'memory_limit', '64M' );
?>
<style>
#export_data{
width: 120px;
height: 30px;
float:right;
margin-top:10px;
margin-right:50px;
margin-bottom:10px;
position:relative;

}
</style>



<div class="main-content">
                    <div class="container-fluid" >
            <div class="row-fluid">
                <div class="area-top clearfix">
                    <div class="pull-left header">
                        <h3 class="title">
                        <i class="icon-edit"></i>
                        Manage Student </h3>
                    </div>

                </div>
            </div>
        </div>
 
        <div class="container-fluid padded">
             <div class="box">
              				<div class="box-header">
				<ul class="nav nav-tabs nav-tabs-left">
				<li class="active">
			   <a href="#add" data-toggle="tab"><i class="icon-plus"></i>
			           Add Student Enquiry </a></li>
                <li>
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
				Student List                	</a></li>
				</ul>
				</div>
	<div class="box-content padded">
		<div class="tab-content">

            <div class="tab-pane box" id="list">
            
                <table class="dTable responsive">
                	<thead>
                		<tr>
					    <!--<th><div></div></th>--> 
                        <th><div>Sr No.</div></th>
							<th><div>Student Id</div></th>
							<th><div>Student Name</div></th>
							<th><div>Course Name</div></th>
						    <th><div>Admission Date</div></th>
							<th><div>Advance</div></th>
							<th><div>Balance</div></th>
							<th><div>Total Fee</div></th>
							<th><div>Mobile No</div></th>
							<th><div>Remark</div></th>
							<th><div>Type</div></th>
							<!--<th><div></div></th>-->
							<th><div>Status</div></th> 
                    		<th><div>Options</div></th>
						</tr>
					</thead>
                   
															
                 
                   <tbody>
                   	  <thead>
					<tr class="text-center">								
								<td>1</td>								
								<td>59</td>	
								<td>Sagar Sachin Kate</td>
								<td>Adavance Tally</td>
								<td>0000-00-00 </td>
								<td>1600 </td>
								<td>4000 </td>
								<td>5600 </td>
								<td>8455952525 </td>
								<td>Pendding </td>
								<td>Enquiry </td>
							<!--	<td>() </td>-->
								
								 	<td>
									<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('student_status.php?s_id=59')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
									
								 </td>

								<td align="center">
							
	                        	<a data-toggle="modal" href="student_edit1.php?student_id=59" class="btn btn-gray btn-small"><i class="icon-pencil"></i></a>

								<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('studentdelete.php?student_id=59')" class="btn btn-red btn-small"><i class="icon-trash"></i> </a>

								<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_student_profile('View_Student',59)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i></a>

							
								</td>
								</tr>
														<tr class="text-center">								
								<td>2</td>								
								<td>70</td>	
								<td>Bhojling Bhimrao Metkari</td>
								<td>Adavance Tally </td>
								<td>2018-05-04 </td>
								<td>0 </td>
								<td>4000 </td>
								<td>4000 </td>
								<td>8208217781 </td>
								<td>Addmission will in n </td>
								<td>Register </td>
							<!--	<td>() </td>-->
								
								 	<td>										
									<a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('student_status.php?s_id=70')" class="btn btn-green btn-small"><i class="icon-eye-open"></i> </a>
									
								 </td>

								<td align="center">
							
	                        	<a data-toggle="modal" href="student_edit1.php?student_id=70" class="btn btn-gray btn-small"><i class="icon-pencil"></i></a>

								<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('studentdelete.php?student_id=70')" class="btn btn-red btn-small"><i class="icon-trash"></i> </a>

								<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_student_profile('View_Student',70)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i></a>

							
								</td>
								</tr>
								</thead>
						                                
							</tbody>
                </table>
               		<div class="row">
						       <tr>	   
						       <td>
						       <form action="/exam/admin/student.php" method="post">	
							   <button type="submit" id="export_data" name='export_data' value="Export to Excel" class="btn btn-info">Export to Excel</button>
							   </form>
							  </td>
							 </tr>
					</div>





	  
	    	</div>   
			<div class="tab-pane box active" id="add" style="padding: 5px">
               <div class="box-content"><br>
                  <form action="<?php $PHP_SELF ?>" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top" enctype="multipart/form-data">
						<!--<div class="padded">       
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
                    <!-- <table>
	                   <tr>
	                   	<td>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">First Name</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="fname" placeholder="Enter first name" />
                                </div>
                            </div>
                        </div>
                       </td>
                       <td> 
                    	<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Middle Name</label>
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
                                <label class="control-label">Last Name</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="lname" placeholder="Enter last name" />
                                </div>
                            </div>
                        </div>
						</td>
						<td>
					    <div class="padded"> 
					     <div class="control-group">
                          <label class="control-label">Course of interest :</label>
                          <div class="controls">
                         	<select class="form-control chzn-select" name="interested_course[]" multiple="multiple" data-placeholder="Select a Course" class="validate[required]">
					      
					         <?php 
								   $query_batch=mysqli_query($con,"select * from subject");
								   while($result_batch=mysqli_fetch_array($query_batch))
								   {?>
									<option value="<?php echo $result_batch['subject_name'];?>"><?php echo $result_batch['subject_name']; ?></option>

							<?php }
						    ?>
					        </select>
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
                                <label class="control-label">Student Mobile</label>
                                <div class="controls">
                                    <input type="text" class="validate[required,custom[integer]]" name="student_phone" placeholder="Student Mobile" />
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>

                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"> Alternative Mobile</label></label>
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
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_EMAIL');?></label>
                                <div class="controls">
                                    <input type="text"  name="student_email"/>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
						
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_DOB');?></label>
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
                          <label class="control-label">Gender</label></label>
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
                                <label class="control-label">Occupation</label>
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
                          <label class="control-label">State</label></label>
                          <div class="controls">
				           <select name="student_state" id="student_state">
                            <option selected="selected" value="">--select--</option>
                            <?php 
								   $query_batch=mysqli_query($con,"select * from states order by id");
								   while($result_batch=mysqli_fetch_array($query_batch))
								   {?>
									<option value="<?php echo $result_batch['id'];?>"><?php echo $result_batch['states_name']; ?></option>

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
                          <label class="control-label">City</label></label>
                          <div class="controls">
				           <select name="student_city" id="student_city">
                            <option selected="selected" value="">--select--</option>

                            <?php 
								   $query_batch=mysqli_query($con,"select * from city order by id");
								   while($result_batch=mysqli_fetch_array($query_batch))
								   {?>
									<option value="<?php echo $result_batch['id'];?>"><?php echo $result_batch['student_city']; ?></option>

							<?php }
						    ?>
                            
                        </select>
                        </div>
                        </div>
				        <span class="help-block"></span>
                        </div>
                    </td>
                </tr>
            </table>
                        <table>
                        	<tr>
                        		<td>
                        			
                         <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Postcode</label>
                                <div class="controls">
                                    <input type="text" name="student_postcode" placeholder="Enter Postcode" />
                                </div>
                            </div>
                        </div>
                        </td>
                        </tr>
                        </table>

 -->


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
                       </td>
                     </tr>
                    </table>
                    
                      
                    <table>
                     <tr>
                      <td>
                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b>Last Name</b></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="lname" placeholder="Enter last name" />
                                </div>
                            </div>
                        </div>
                        </td>
                        
                         <td>
                    	<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b>Mother Name</b></label>
                                <div class="controls">
                                    <input type="text"  name="mother_name" placeholder="Enter mother name" />
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
                          <label class="control-label"><b>Course of interest :</b></label>
                          <div class="controls">
                         	<select class="form-control chzn-select" name="interested_course[]" multiple="multiple" data-placeholder="Select a Course" class="validate[required]">
					      
					         									<option value="DCCO">DCCO</option>

																<option value="Adavance Tally">Adavance Tally</option>

																<option value="MS-Office">MS-Office</option>

												        </select>
				         <span class="help-block"></span>
                        </div>
                       </div>
                      </div>
                       </td>
                    
                    
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
                        </tr>
                    </table> 
                      
                       
                    <table>
                     <tr> 
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
                    
                   
                    <td>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b>Email</b></label>
                                <div class="controls">
                                    <input type="text"  name="student_email"/>
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
                                <label class="control-label"><b>Date of Birth</b></label>
                                <div class="controls">
                                    <input type="text" class="validate[required,custom[dateFormat]] datepicker" name="student_dob"  />
                                </div>
                            </div>
                            <span class="help-block"></span>
                        </div>
                       </td>
                    
                    <td>
                    <div class="padded">
                        <div class="control-group">
                                <label class="control-label"><b>User Name</b></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="username"/>
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
                                <label class="control-label"><b>Password</b></label>
                                <div class="controls">
                                    <input type="password" class="validate[required]" name="password"/>
                                </div>
                            </div>
                            </div>
                         </td>
                   
                        <td>
                        <div class="padded">
                        <div class="control-group">
                          <label class="control-label"><b>Gender</b></label>
                          <div class="controls">
				           <select name="student_gender" id="student_gender" class="validate[required]">
                            <option value="">--select--</option>
                            <option value="Male" >Male</option>
                            <option value="Female" >Female</option>
                        </select>
                        </div>
                        </div>
				        <span class="help-block"></span>
                        </div>	
                        </td>
                          </tr>    
                    </table>
                    
                    
                    <table>
                     <tr> 
						<td>
                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b>Occupation</b></label>
                                <div class="controls">
                                    <input type="text" name="student_occupation" value="student" />
                                </div>
                            </div>
                            <span class="help-block"></span>
                        </div>
                       
                        </td>
                     
                        <td>

                        <!-- <div class="padded">
                        <div class="control-group">
                          <label class="control-label">State</label></label>
                          <div class="controls">
				           <select name="student_state" id="student_state">
                            <option selected="selected" value="">--select--</option>
                            <?php 
								   $query_batch=mysqli_query($con,"select * from states order by id");
								   while($result_batch=mysqli_fetch_array($query_batch))
								   {?>
									<option value="<?php echo $result_batch['id'];?>"><?php echo $result_batch['states_name']; ?></option>

							<?php }
						    ?>
                        </select>
                        </div>
                        </div>
				        <span class="help-block"></span>
                        </div> -->

                        <div class="padded">
                        <div class="control-group">
                          <label class="control-label"><b>State</b></label>
                          <div class="controls">
				           <select name="student_state" id="student_state">
                            <option value="">--select--</option>
                            									<option value="1">Andhra Pradesh </option>

																<option value="2">Arunachal Pradesh</option>

																<option value="3">Assam</option>

																<option value="4">Bihar</option>

																<option value="5">Goa</option>

																<option value="6">Gujarat</option>

																<option value="7">Haryana</option>

																<option value="8">Himachal Pradesh</option>

																<option value="9">Jammu & Kashmir</option>

																<option value="10">Karnataka</option>

																<option value="12">Kerala</option>

																<option value="13">Madhya Pradesh</option>

																<option value="14">Maharashtra</option>

																<option value="15">Manipur</option>

																<option value="16">Meghalaya</option>

																<option value="17">Mizoram</option>

																<option value="18">Nagaland</option>

																<option value="19">Orissa</option>

																<option value="20">Punjab</option>

																<option value="21">Rajasthan</option>

																<option value="22">Sikkim</option>

																<option value="23">Tamil Nadu</option>

																<option value="24">Tripura</option>

																<option value="25">Uttar Pradesh</option>

																<option value="26">West Bengal</option>

																<option value="27">Chhattisgarh</option>

																<option value="28">Uttarakhand</option>

																<option value="29">Jharkhand </option>

																<option value="30">Telangana</option>

							                        </select>
                        </div>
                        </div>
				        <span class="help-block"></span>
                        </div>
                         </td>
                    </tr>
                    </table> 
                    
                    <table>
                     <tr> 
						<td>
                        <div class="padded">
                        <div class="control-group">
                          <label class="control-label">City</label></label>
                          <div class="controls">
				           <select name="student_city" id="student_city">
                            <option selected="selected" value="">--select--</option>

                            <?php 
								   $query_batch=mysqli_query($con,"select * from city order by id");
								   while($result_batch=mysqli_fetch_array($query_batch))
								   {?>
									<option value="<?php echo $result_batch['id'];?>"><?php echo $result_batch['student_city']; ?></option>

							<?php }
						    ?>
                            
                        </select>
                        </div>
                        </div>
				        <span class="help-block"></span>
                        </div>

                        <!-- <div class="padded">
                        <div class="control-group">
                          <label class="control-label"><b>City</b></label>
                          <div class="controls">
				           <select name="student_city" id="student_city">
                            <option selected="selected" value="">--select--</option>
                           </select>
                          </div>
                        </div>
				        <span class="help-block"></span>
                        </div> -->
                        
                      </td>
                      
                      <td>  
                         <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b>Postcode</b></label>
                                <div class="controls">
                                    <input type="text" name="student_postcode" placeholder="Enter Postcode" class="validate[required]" />
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
                                <label class="control-label"><b>Reffered By</b></label>
                                <div class="controls">
                                    <input type="text" name="refer" placeholder="Reffered By" class="validate[required]" />
                                </div>
                            </div>
                        </div>
                        
                      </td>
                      
                      <td>  
                         <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b>Remark</b></label>
                                <div class="controls">
                                	<textarea rows="4" cols="50" type="text" class="validate[required]" name="remark" placeholder="Enter Remark and followup">
                                </textarea>
                                 <!-- <input type="text" name="remark" placeholder=""  class="validate[required]"/> -->

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
                                <label class="control-label"><b>Course Fee:</b></label>
                                <div class="controls">
                                    <input type="text" name="course_fee" id="course_fee" placeholder="Course Fee" class="validate[required]" />
                                </div>
                            </div>
                        </div>
                        
                      </td>
                      
                      <td>  
                         <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b>Discount Amount</b></label>
                                <div class="controls">
                                    <input type="text" name="discamt" id="discamt" placeholder="Discount Amount"/>
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
                                <label class="control-label"><b>Balance :</b></label>
                                <div class="controls">
                                    <input type="text" name="balance" id="balance" placeholder="Balance"  />
                                </div>
                            </div>
                        </div>
                        
                      </td>
                      <td>
                      	<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><b>Reminder Date</b></label>
                                <div class="controls">
                                    <input type="date" name="Reminder_date"  class=""/>
                                </div>
                            </div>
                        </div>
                    </td>
                     
                      </tr>
                    </table>
                    


                        
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


                        <table>
                        	
                        	<tr>
                        		<td>

<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$file_name)));
      
      $expensions= array("jpeg","jpg","png");
      
      if(!in_array($file_ext,$expensions)){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
        // move_uploaded_file($file_tmp,"images/".$file_name);
         move_uploaded_file($_FILES['file']['tmp_name'], SITE_ROOT.'/static/images/slides/1/1.jpg');

         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
     
      <form action="" method="POST" enctype="multipart/form-data">
      	 <div class="padded">                   
               <div class="control-group">
                    <label class="control-label"><b>Upload Photo</b></label>
                          <div class="controls">
                             <input type="file" name="image" value="Upload" /><br>
                              
                          </div>
                      </div>
                  </div>
                  </form>
              </td>
              <td>
       
        <form enctype="multipart/form-data" action="upload.php" method="POST">
    <div class="padded">                   
               <div class="control-group">
                    <label class="control-label"><b>Upload Document</b></label>
                       <div class="controls">
                       <input type="file" name="uploaded_file" value="Upload" /><br>
                   </div>
               </div>
           </div>
    
  </form>                      

 

<?PHP
  if(!empty($_FILES['uploaded_file']))
  {
    $path = "uploads/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>


                        		</td>
                        	</tr>
                        </table>
                        
                        <div class="form-actions">
                            <!--<button type="submit" class="btn btn-gray"><?php //echo constant('TI_STUDENT_ADD_BUTTON');?></button>-->
                            
                            <div class="text-center">	
            				<input type="hidden" class="btn btn-gray" name="action" value="Add Enquiry" />		 
            				<input type="submit" class="btn btn-gray" name="enquiry" value="Save & Exit" />	 &nbsp;&nbsp;&nbsp;	  
            				<input type="submit" class="btn btn-gray" name="register" value="Save & Register Admission" />		 
            				&nbsp;&nbsp;&nbsp;
            				<input type="reset" class="btn btn-warning" name="reset" value="Reset" />				
            				&nbsp;&nbsp;&nbsp;	
            				<a href="enquiry.php" class="btn btn-danger" title="Cancel">Cancel</a>
            				&nbsp;&nbsp;&nbsp;	
            			  </div>
            			  
							<input type="hidden" value="Add new student" name="submit">
                        </div>
                    </form>                           
                </div>                
			</div>
			
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
        <button class="btn btn-warning" data-dismiss="modal"><?php echo constant('TI_CLOSE');?></button>
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
	//alert(state);
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
</script>

</html>