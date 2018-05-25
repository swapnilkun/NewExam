<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');


if(isset($_POST['submit']) && $_POST['student_id']!="")
{	
	
	$subject_id= mysql_prep($_POST['student_id']);
	//$center_id= mysql_prep($_POST['c_id']);
	$fname= mysql_prep($_POST['fname']);
	$lname= mysql_prep($_POST['lname']);
	$mname= mysql_prep($_POST['mname']);

	$student_phone= mysql_prep($_POST['student_phone']);
	$student_phone1= mysql_prep($_POST['student_phone1']);
	$student_dob= mysql_prep($_POST['student_dob']);
    $student_state= mysql_prep($_POST['student_state']);
	$student_city= mysql_prep($_POST['student_city']);
	$student_postcode= mysql_prep($_POST['student_postcode']);
    $student_occupation= mysql_prep($_POST['student_occupation']);
	$student_gender= mysql_prep($_POST['student_gender']);
	$student_addhar= mysql_prep($_POST['student_addhar']);
	$student_qualification= mysql_prep($_POST['student_qualification']);
	
	$student_address= mysql_prep($_POST['student_address']);
	$student_email= mysql_prep($_POST['student_email']);
	
	
	$photo_id_category= mysql_prep($_POST['photo_id_category']);
	$photo_id_other= mysql_prep($_POST['photo_id_category_other']);
//	$student_photo_id= mysql_prep($_POST['student_photo_id']);
	$student_photo_id_desc= mysql_prep($_POST['student_photo_id_desc']);
	
	foreach ($_POST['course'] as $row=>$interested_course) {
	    
	$interested_course1 = count(mysql_prep($_POST['course']));
	$interested_course = mysql_prep($_POST['course'][$row]);
	//$interested_course= mysql_prep($_POST['course']); 
	
	$coursefee= mysql_prep($_POST['coursefees'][$row]);	
	$discrate= mysql_prep($_POST['discrate'][$row]);
	$discamt= mysql_prep($_POST['discamt'][$row]);
	$totalcoursefee= mysql_prep($_POST['totalcoursefee'][$row]);
	$amtreceived= mysql_prep($_POST['amtreceived'][$row]);
	
	$amtbalance= mysql_prep($_POST['amtbalance'][$row]);
	$payremarks= mysql_prep($_POST['payremarks'][$row]);
	}
		$recievedpayment= mysql_prep($_POST['recievedpayment']);
	//$password_md5= mysql_prep(encrypt($_POST['password']));
	//$password= $_POST['password'];

	
   $sql ="update student set student_fname='{$fname}', student_mname='{$mname}',student_lname='{$lname}',
		                              student_address='{$student_address}',student_phone='{$student_phone}',student_phone1='{$student_phone1}',student_gender='{$student_gender}',student_addhar='{$student_addhar}', 
		                              student_dob='{$student_dob}',student_state='{$student_state}',student_city='{$student_city}',student_postcode='{$student_postcode}',student_occupation='{$student_occupation}',
		                              student_qualification='{$student_qualification}',photo_id_type='{$photo_id_category}',photo_type_other='{$photo_id_other}',photo_id_no='{$student_photo_id_desc}',
		                              course_fee='{$coursefee}',discount_rate='{$discrate}',discount_amount='{$discamt}',total_fee='{$totalcoursefee}',fee_received='{$amtreceived}',
		                              balance='{$amtbalance}',remark='{$payremarks}', recievedpayment='{$recievedpayment}',type='register' where student_id='{$subject_id}'";
		
			$query_update_mysql_student=mysqli_query($con,$sql);
			
			if($query_update_mysql_student)
		{
			
			$message_success .=ucfirst($student_name)." ". constant('TI_STUDENT_EDIT_MESSAGE');

		}
		else
		{
			$error .=  constant('TI_SUBJECT_MYSQL_ERROR');
		}
		
		
			if($_FILES['student_photo']['name']!="")
	{
		
		$img_dir="../images/student/";	
		list($width, $height, $type, $attr) = getimagesize($_FILES["student_photo"]['tmp_name']);		
		if($width<='200' && $height<='200')
		{
			$img = explode('.', $_FILES['student_photo']['name']);	
			$img_type=$img[1];//image type(like jpg.png,gif,bmp)
			$extension_type = strtolower($img_type);

			if(in_array($extension_type , array('jpg','jpeg', 'gif', 'png', 'bmp')))
			{
				if($extension_type=='jpg' || $extension_type=='jpeg' || $extension_type=='gif' || $extension_type=='png' || $extension_type=='bmp')
				{
					$originalImage=$img_dir.$_FILES['student_photo']['name'];
					$fileupload=move_uploaded_file ($_FILES['student_photo']['tmp_name'],$originalImage);
					if($fileupload)
					{
						$query_update_mysql_student=mysqli_query($con,"update student set photo='".$_FILES['student_photo']['name']."' where student_id='{$subject_id}'");
					}
				}
			}
		}
	}

	
	if($_FILES['stud_photo_id']['name']!="")
	{
		
		$img_dir="../images/student/";	
		list($width, $height, $type, $attr) = getimagesize($_FILES["stud_photo_id"]['tmp_name']);		
		if($width<='200' && $height<='200')
		{
			$img = explode('.', $_FILES['stud_photo_id']['name']);	
			$img_type=$img[1];//image type(like jpg.png,gif,bmp)
			$extension_type = strtolower($img_type);

			if(in_array($extension_type , array('jpg','jpeg', 'gif', 'png', 'bmp')))
			{
				if($extension_type=='jpg' || $extension_type=='jpeg' || $extension_type=='gif' || $extension_type=='png' || $extension_type=='bmp')
				{
					$originalImage=$img_dir.$_FILES['stud_photo_id']['name'];
					$fileupload=move_uploaded_file ($_FILES['stud_photo_id']['tmp_name'],$originalImage);
					if($fileupload)
					{
						$query_update_mysql_student=mysqli_query($con,"update student set photo_id_proof='".$_FILES['stud_photo_id']['name']."' where student_id='{$subject_id}'");
					}
				}
			}
		}
	}
	
echo "<script> window.location.assign('student.php'); </script>";
	
}
if($_GET['student_id']!="")
{
$student_id=$_GET['student_id'];
$query=mysqli_query($con,"select * from student where student_id='$student_id'");
$result=mysqli_fetch_array($query);

}
?>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
{
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}




input {
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
/*input.invalid {
  background-color: #ffdddd;
}*/
textarea.form-control {
    height: auto;
}

.fa {
    font: normal normal normal 14px/1 FontAwesome;
        font-family: FontAwesome;
    
    font-size: inherit;
    text-rendering: auto;
}
.btn:focus {
    outline: none;
}
.btn-danger.focus {
    color: #fff;
    background-color: #c9302c;
    border-color: #761c19;
}
.fa-minus-circle::before {
    content: "\f056";
    box-sizing: border-box;
}


.fa-plus-circle::before {
    content: "\f055";
    box-sizing: border-box;
}

.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 2px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    
    background-image: none;
    border: 1px solid #ccc;
}

input[type=text],
input[type=email],
input[type=number],
textarea,
fieldset
 {
  -webkit-appearance: none;
}

input:focus:invalid {
  box-shadow: 0 0 5px 1px red;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 2px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step{
 
   list-style: none;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}


</style>
<div class="main-content">
     <form role="form" action="" method="post" enctype="multipart/form-data" id="add_student">
	 
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i>Add New Student</h3>
				</div>
	 	</div>
		</div>
		
	</div>
	
	
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
						<!--<a href="#add" data-toggle="tab"><i class="icon-wrench"></i></a>-->
		          <li><a href="" data-toggle="tab">Step 1 <br> Basic Details</a></li>
				  <li><a href="" data-toggle="tab">Step 2 <br>Photos / Documents</a></li>
				  <li><a href="" data-toggle="tab">Step 3 <br>Payment</a></li>
				
				</ul>	
			</div>
			
	<div class="box-content padded">
	 
		<div class="tab-content"> 
		    
			<form method="post" id="regForm" action="" class="form-horizontal validatable" enctype="multipart/form-data">
                  
           <div class="tab" id="tab_1">	
			<?php include("message.php");?>
			<div class="tab-pane active" id="add" style="padding: 5px">
			 

					   <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">First Name</label>
                                <div class="controls">
                                    <input type="text" name="fname" value="<?php echo $result['student_fname']; ?>">
                                </div>
                            </div>
                        </div>
                        
                    	<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Middle Name</label>
                                <div class="controls">
                                    <input type="text" name="mname" value="<?php echo $result['student_mname']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Last Name</label>
                                <div class="controls">
                                    <input type="text" name="lname" value="<?php echo $result['student_lname']; ?>">
                                </div>
                            </div>
                        </div>

                      
                    	<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Student Mobile</label>
                                <div class="controls">
                                    <input type="text"  name="student_phone" value="<?php echo $result['student_phone']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"> Alternative Mobile</label></label>
                                <div class="controls">
                                    <input type="text" name="student_phone1" value="<?php echo $result['student_phone1']; ?>">
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
                          <label class="control-label">Gender</label>
                          <div class="controls">
				           <select name="student_gender" id="student_gender" oninput="this.className = ''">
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
                          <label class="control-label">Addhar Card Number</label>
                          <div class="controls">
				          <input type="text" name="student_addhar" value="<?php echo $result['student_addhar']; ?>" > 
                          </div>
                        </div>
				        <span class="help-block"></span>
                        </div>
                        
                         <div class="padded">
                        <div class="control-group">
                          <label class="control-label">Student Qualification</label>
                          <div class="controls">
				          <input type="text" name="student_qualification" value="<?php echo $result['student_qualification']; ?>"> 
                          </div>
                        </div>
				        <span class="help-block"></span>
                        </div>
                        
                       
                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Occupation</label>
                                <div class="controls">
                                    <input type="text" name="student_occupation" value="<?php echo $result['student_occupation']; ?>">
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
                          <label class="control-label">District</label></label>
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
									<textarea name="student_address" id="text_for_signature" rows="3"><?php echo $result['student_address']; ?></textarea>
									</div>
								</div>
                                </div>
                            </div>
                        </div>

                                     
                </div>                
			</div>
			
			  <!-- /.tab-pane -->
				  <div class="tab" id="tab_2">
						<div class="padded">
						<div class="form-group">
						  <label for="photo">Photo</label> <span>(Max file size 250 KB)</span>
						  <div class="controls">
						  <input type="file" name="student_photo" id="student_photo">							
						  <p class="help-block"></p>
						</div>
						</div>
						</div>
						
	                    <div class="col-sm-12">
						<div class="form-group ">
						
					<table class="table table-bordered">
					  
							<tr>   
								<th><label for="photo">Photo ID Type</label></th>
								<th><label for="photo">Photo ID Number</label></th>
								<th><label for="photo">Photo ID Proof</label></th>							
							<tr>
						
						
							<tr class="detail">
								<td class="">
														
								<select class="form-control" name="photo_id_category" onchange="if(this.value=='Other') document.getElementById('photo_other').style.visibility='visible'; else document.getElementById('photo_other').style.visibility='hidden'; ">
									<option value="">--select--</option>
									<option value="Driving License" >DRIVING LICENSE</option>
									<option value="Aadhar Card" >AADHAR CARD</option>
									<option value="Voter ID" >VOTER ID</option>
									<option value="College ID" >COLLEGE ID</option>
									<option value="Other" >OTHER</option>									
								</select>
								
								<input  type="text" class="form-control" name="photo_id_category_other" id="photo_other" style="visibility:hidden;" value="" />
								 
								 <span class="help-block"></span>
							
								</td>
								<td class="">
								<input class="form-control" type="text" name="student_photo_id_desc" id="student_photo_id_desc" value="" >
								
								 <span class="help-block"></span>
								</td>
								<td class="">
								<input type="file" name="stud_photo_id" id="student_photo_id" />
								<span class="help-block"></span>
								</td>
								
							</tr>
						</table>
						</div>
						</div>
						
						<div class="clearfix"></div>
				  </div>
				  <!-- /.tab-pane -->
				  <div class="tab" id="tab_3">		
				
						<div class="form-group ">
						
					<table class="table table-bordered">
								<thead>
									<tr class="text-center">
										<!-- <th>#</th> -->
										<th><label>Course<label></th>
										<th><label>Course Fees<label></th>
										<th><label>Discount Rate<label></th>										
										<th><label>Discount Amt<label></th>
										<th><label>Total Fees<label></th>
										<th><label>Fees Recieved<label></th>
										<th><label>Balance<label></th>
										<th><label>Remarks<label></th>										
										<th></th>
									</tr>
								</thead>
								<tbody id="courses-rows">
									
									<tr id="courserow-0">
											<!-- <td>0</td -->
											
							        	
								            
								            
								            
								             <td>
								        	<select class="form-control course" name="course[]" id="course0" onchange="getInstCourseFees(this.value, this.id)" >
				     
										     <?php 
                        								   $query_batch=mysqli_query($con,"select subject_name,course_fee from subject");
                        								    while($result_batch=mysqli_fetch_array($query_batch))
                        								   {?>
                        								 <option value="<?php echo $result_batch['subject_name'];?>" <?php if($result_batch['subject_name']== $result['course_interest']) { echo "selected=selected"; }?>> <?php echo $result_batch['subject_name']; ?></option>
											    	<?php }
                        						    ?>
                        					        </select>	
                                                
											</td>
											
											<td>
											    <?php
											    /*$student_id=$_GET['student_id'];
                                                    $query1=mysqli_query($con,"select b.course_fee from student s join subject b on s.course_interest=b.subject_name where s.student_id='$student_id'");
                                                    $result1=mysqli_fetch_array($query1);*/
                                                
                                                    ?>
                                                    
											   	<input type="text" class="form-control coursefees" name="coursefees[]" id="coursefees0"  />
												
												
												</td>
											<td>
													<select class="form-control" name="discrate[]" id="discrate0" onchange="calDiscountedAmt(0)" >
												<option value="" >Select---</option>
													<option value="amtminus" >Amount - </option>
													<option value="amtplus" >Amount + </option>
													<option value="perminus" >% - </option>
													<option value="perplus" >% + </option>
												</select>
											</td>

											<td>	
																						
											<input type="text" class="form-control" name="discamt[]" id="discamt0" onchange="calDiscountedAmt(0)" onkeyup="calDiscountedAmt(0)" value="0" />
											</td>
											<td>
												
											<input type="text" class="form-control" name="totalcoursefee[]" id="totalcoursefee0" readonly value=""/></td>
											<td>	
																							
											<input type="text" class="form-control" name="amtrecieved[]" id="amtrecieved0" onchange="calTotalPerCourse(0)" onkeyup="calTotalPerCourse(0)" value="0" />
											<span style="color:#f00" id="amtrecieved_err0"></span>
											</td>
											<td>	
																						
											<input type="text" class="form-control" name="amtbalance[]" id="amtbalance0" readonly value="" /></td>
											<td>
												
											<textarea class="form-control" name="payremarks[]" id="payremarks0" ></textarea></td>
											
											<td><a href="javascript:void(0)" onclick="deleteCourseRow(0)" class="btn btn-xs btn-danger"><i class="fa fa-minus-circle"></i></a></td>
										</tr>
										
								</tbody>
								<tfoot>
									<tr>
										<!--  <td>Total</td>
										<td><input class="form-control" readonly type="text" value="1500" name="total" /></td> -->
										<td colspan="8">
										<input type="hidden" name="countcourses" id="countcourses"  value="1" />
										</td>
										<td><a href="javascript:void(0)" class="btn btn-primary" onclick="addCourseRow()" style="padding: 8px;"><i class="fa fa-plus-circle"></i></a></td>
									</tr>
								</tfoot>
							</table>
							<input type="checkbox" name="recievedpayment"  value="1" <?php if($result['recievedpayment']==1){echo 'checked="checked"';}?>/>&nbsp; &nbsp; I have recieved the payment.
							
						</div>
			    </div>
	
			<!----CREATION FORM ENDS--->
             <div class="form-actions">
                            <!--<button type="submit" class="btn btn-gray"><?php //echo constant('TI_STUDENT_ADD_BUTTON');?></button>-->
                            
                            <!--<div class="text-center">	
            				 
            			    <a href="student.php" class="btn btn-warning" title="Cancel">Cancel</a>	 &nbsp;&nbsp;&nbsp;	 
            			    
            			    <button type="submit" class="btn btn-gray">Register Student </button>
            				<input type="hidden" class="btn btn-primary" name="submit" value="Register Student" />		 
            				
            			  </div>
            			  <input type="hidden" name="student_id" value="<?php echo $result['student_id'];?>">-->

                  <div style="overflow:auto;">
                    <div style="float:right;">
                      <button type="button" id="prevBtn" class="btn btn-gray" onclick="nextPrev(-1)">Previous</button>
                      <button type="button" id="nextBtn" class="btn btn-gray" onclick="nextPrev(1)">Next</button>
                    </div>
                  </div>
                  <!-- Circles which indicates the steps of the form: -->
                  <div style="text-align:center; visibility:hidden;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                 
                  </div>
             </div>
		</div>
		</form>
	</div>
</div>
</div>       
           <?php include("copyright.php");?>
		   </div>
	</div>
</body>

<script>
    function addCourseRow()
{
	var lastRowIndex = parseInt($("#countcourses").val())+1;
	$.post('add_course.php',
   	{
	    action:'add_new_course_row',lastrowindex:lastRowIndex}, 
	    
	function(data){ //console.log(data);
	
	$("#countcourses").val(parseInt(lastRowIndex));
	$("#courses-rows").append(data);
	});	
}
function deleteCourseRow(rowIndex)
{
	$("#courserow-"+rowIndex).remove();
	var lastRowIndex = $("#countcourses").val();
	$("#countcourses").val(lastRowIndex-1)
}
/*$('.course').on('change', function(){
    var project = this.value;
	//alert(project);

    $.ajax({
	type: "POST",
	url: "get_fee.php",
	data:'instCourseIds='+project,
	success: function(result){
		$(".coursefees").val(result);
		 alert(result);
	}
	});
});*/
function getInstCourseFees(instCourseId,elementid)
{
	var eleid = elementid.substr(6);
	var instCourseIds = $(".course").val();
    //alert(instCourseIds);
    
	$.post('get_fee.php',
	{action:'get_inst_course_fees',instCourseIds:instCourseIds},
	function(data){ //console.log(data);
	var a=$("#coursefees"+eleid).html(data);
	//alert(a);
	calDiscountedAmt(eleid);
	});	
}

function calDiscountedAmt(elementId)
{
	var totalFees = 0;
	var discAmt 	= $("#discamt"+elementId).val();
	var discRate 	= $("#discrate"+elementId).val();
	var courseFee 	= $("#coursefees"+elementId).val();
	var amtrecieved	= $("#amtrecieved"+elementId).val(0);
	
	if(discAmt=='NaN' || discAmt==0 || discAmt=='')
		totalFees = parseFloat(courseFee).toFixed(2);
	else{
		discAmt = parseFloat(discAmt);
		switch(discRate)
		{
			case('amtminus'):
				totalFees = parseFloat(courseFee) - parseFloat(discAmt);
				break;
			case('amtplus'):
				totalFees = parseFloat(courseFee) + parseFloat(discAmt);
				break;	
			case('perminus'):
				totalFees = parseFloat(courseFee) - ((parseFloat(courseFee) *  parseFloat(discAmt)) / 100);
				break;
			case('perplus'):
				totalFees = parseFloat(courseFee) + ((parseFloat(courseFee) *  parseFloat(discAmt)) / 100);
				break;
		}
	}
	
totalFees = parseFloat(totalFees).toFixed(2);
	$("#totalcoursefee"+elementId).val(totalFees);
	if(amtrecieved!='' && !isNaN(amtrecieved))
		totalFees = parseFloat(totalFees) - parseFloat(amtrecieved);
	$("#amtbalance"+elementId).val(parseFloat(totalFees).toFixed(2));

	//console.log("Total Fees: "+totalFees);
}
function calDiscountedAmtUpd(elementId)
{
	var totalFees = 0;
	var totalPaid 	= $("#total_paid").val();
	if(totalPaid=='NaN' || totalPaid=='' || isNaN(totalPaid))
		totalPaid = 0;
	var discAmt 	= $("#discamt"+elementId).val();
	var discRate 	= $("#discrate"+elementId).val();
	var courseFee 	= $("#coursefees"+elementId).val();
	var amtrecieved	= $("#amtrecieved"+elementId).val();
	/*console.log("Element ID: "+elementId);	
	console.log("Course Fees: "+courseFee);			
	console.log("Discount Amt: "+discAmt);
	console.log("Discount Rate: "+discRate);	*/
	console.log("Total Paid:"+totalPaid);
	if(totalPaid!=0)
		amtrecieved = parseFloat(amtrecieved) + parseFloat(totalPaid);
	if(discAmt=='NaN' || discAmt==0 || discAmt=='')
		totalFees = parseFloat(courseFee).toFixed(2);
	else{
		discAmt = parseFloat(discAmt);
		switch(discRate)
		{
			case('amtminus'):
				totalFees = parseFloat(courseFee) - parseFloat(discAmt);
				break;
			case('amtplus'):
				totalFees = parseFloat(courseFee) + parseFloat(discAmt);
				break;	
			case('perminus'):
				totalFees = parseFloat(courseFee) - ((parseFloat(courseFee) *  parseFloat(discAmt)) / 100);
				break;
			case('perplus'):
				totalFees = parseFloat(courseFee) + ((parseFloat(courseFee) *  parseFloat(discAmt)) / 100);
				break;
		}
	}
	
totalFees = parseFloat(totalFees).toFixed(2);
	$("#totalcoursefee"+elementId).val(totalFees);
	if(amtrecieved!='' && !isNaN(amtrecieved))
		totalFees = parseFloat(totalFees) - parseFloat(amtrecieved);
	$("#amtbalance"+elementId).val(parseFloat(totalFees).toFixed(2));

	//console.log("Total Fees: "+totalFees);
}
function getInstCourseFeesUpd(instCourseId,elementid)
{
	var eleid = elementid.substr(6);
//alert(eleid);
	$.post('include/classes/ajax.php',{action:'get_inst_course_fees',inst_course_id:instCourseId}, function(data){ //console.log(data);
	$("#coursefees"+eleid).val(data);
	calDiscountedAmtUpd(eleid);
	});	
}
function calTotalPerCourseUpd(elementId)
{
	var totalFees = 0;
	var totalPaid 	= $("#total_paid").val();
	var total_paid1 	= $("#total_paid1").val();
	if(totalPaid=='NaN' || totalPaid=='' || isNaN(totalPaid))
		totalPaid = 0;
	//$("#amtrecieved_err"+elementId).html('');
	var totalcoursefee 	= $("#totalcoursefee"+elementId).val();
	var amtrecieved		= $("#amtrecieved"+elementId).val();
	var totalbal = 0;
	if(amtrecieved=='' || amtrecieved=='NaN' || amtrecieved=='undefined')
	{
		//amtrecieved = parseFloat(amtrecieved) + parseFloat(totalcoursefee);
		amtrecieved=0;
	}
	if(totalPaid!=0)
		amtrecieved = parseFloat(amtrecieved) + parseFloat(totalPaid);
	if(parseFloat(amtrecieved)<=parseFloat(totalcoursefee))
	{
		totalbal = parseFloat(totalcoursefee) - parseFloat(amtrecieved);
		
	}else{

		$("#amtrecieved"+elementId).val(totalcoursefee);
		//$("#amtrecieved_err"+elementId).html('');
	}
		
	$("#amtbalance"+elementId).val(parseFloat(totalbal).toFixed(2));
	console.log(totalbal);
	$("#total_paid1").val(amtrecieved);
}
function calTotalPerCourse(elementId)
{
	
	//$("#amtrecieved_err"+elementId).html('');
	var totalcoursefee 	= $("#totalcoursefee"+elementId).val();
	var amtrecieved		= $("#amtrecieved"+elementId).val();
	var totalbal = 0;
	if(amtrecieved=='' || amtrecieved=='NaN' || amtrecieved=='undefined')
		amtrecieved = parseFloat(totalcoursefee);
	if(parseFloat(amtrecieved)<=parseFloat(totalcoursefee))
	{
		totalbal = parseFloat(totalcoursefee) - parseFloat(amtrecieved);
		
	}else{

		$("#amtrecieved"+elementId).val(totalcoursefee);
		//$("#amtrecieved_err"+elementId).html('');
	}
		
	$("#amtbalance"+elementId).val(parseFloat(totalbal).toFixed(2));
	console.log(totalbal);
}

// Institute--->Student--->Add payment
//get student payment info by stud id or course id
function getStudPaymentInfo(){ var courseId = $("#course").val();  var studId = $("#student_id").val(); $.post('include/classes/ajax.php',{action:'get_stud_payment_info', course_id:courseId, stud_id:studId}, function(data){$("#payment_info").html(data);});}




function getBalAmtCourse(){
	var courseId = $("#course").val();  
	var studId = $("#student_id").val();
	var fees_balance='';
	var total_course_fees='';
		
		$.post('include/classes/ajax.php',{action:'get_stud_course_fee_bal', course_id:courseId, stud_id:studId}, function(data){
		console.log(data);
		//var output = JSON.stringify(data);
		var data 		= JSON.parse(data); 
		//console.log(data);
		 total_course_fees 	= data.total_course_fees;
		 fees_balance 	= data.fees_balance;
		console.log("total_course_fees: "+ total_course_fees);
		console.log("fees_balance: "+ fees_balance);
		$("#amountbalance").val(fees_balance);
		$("#totalbal").val(fees_balance);
		$("#coursefees").val(total_course_fees);
		
		});
}
function calBalAmt()
{
	var amountpaid = $("#amountpaid").val();
	var amountbalance = $("#amountbalance").val();
	var totalBal = 0;
	if(!isNaN(amountpaid) && amountbalance!='' && amountbalance!=0)
	{
		totalBal = parseFloat(amountbalance) - parseFloat(amountpaid); 
		console.log("Amt Bal: "+amountbalance);
		console.log("Amt Paid: "+amountpaid);
		console.log("Total Bal: "+totalBal);
	}
	if((amountpaid>totalBal) || (totalBal<=0) || isNaN(amountbalance)){
		getBalAmtCourse();
	}
	$("#amountbalance").val(parseFloat(totalBal).toFixed(2));
}
function addPayShowBal()
{
	var amountpaid = $("#amountpaid").val();
	var amountbalance = $("#totalbal").val();
	if(amountpaid=='' && isNaN(amountpaid))
	{
		amountpaid = 0;
		
	}
	else{
		if(parseFloat(amountpaid) > parseFloat(amountbalance))
		{
			$("#amountpaid").val(amountbalance);
			amountpaid = parseFloat(amountbalance);
		}	//;
		amountbalance = parseFloat(amountbalance) - parseFloat(amountpaid);
		
	}
	if(isNaN(amountbalance)) amountbalance = $("#totalbal").val();
	$("#amountbalance").val(amountbalance);
	
}
function calTotalBalAmt()
{
	var totalexamfees = $("#totalexamfees").val();
	var totalamtrecieved = $("#totalamtrecieved").val();
	var totalamtbalance = $("#totalamtbalance").val();
	var totalBal = 0;
	
	if(!isNaN(totalamtrecieved) && totalamtrecieved!='' && totalamtrecieved!=0)
	{
		totalBal = parseFloat(totalamtbalance) - parseFloat(totalamtrecieved); 
		
	}
	
	$("#totalamtbalance").val(parseFloat(totalBal).toFixed(2));
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
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Student Registration";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
</html>


  
