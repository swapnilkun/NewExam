<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');

if (isset($_POST['enquiry'])) 
{ 
	//$category_id= mysql_prep($_POST['category_id']);
	//$subcategory_id= mysql_prep($_POST['s_c_id']);
	$subject_id= mysql_prep($_POST['subject_id']);
	//$center_id= mysql_prep($_POST['c_id']);
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
	
	//$password_md5= mysql_prep(encrypt($_POST['password']));
    //$password= $_POST['password'];
    //$b_id= $_POST['b_id'];
    $date=date('Y-m-d');
	

    $query_select_student=mysqli_query($con,"SELECT * FROM student where student_email='".$student_email."'");
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

		 $query_insert_student = "INSERT INTO student (student_fname,student_mname,student_lname,course_interest,subject_id,student_phone,student_phone1,student_email,student_dob,student_gender,
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
}

?>

<div class="main-content">
                    <div class="container-fluid" >
            <div class="row-fluid">
                <div class="area-top clearfix">
                    <div class="pull-left header">
                        <h3 class="title">
                        <i class="icon-edit"></i>
                         Manage Payment</h3>
                    </div>

                </div>
            </div>
        </div>
 
             
             <div class="container-fluid padded">
                <div class="box">
              				<div class="box-header">
				<ul class="nav nav-tabs nav-tabs-left">
				<li class="active">
				<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
				Payment List
				</a></li>
				<!--<li>
				<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
				New Student Enquiry           
				</a></li>-->
				</ul>
				</div>
			    
			    
	<div class="box-content padded">
		<div class="tab-content">
           
                  <div class="tab-pane box active" id="list">
            
                <table class="dTable responsive">
                	<thead>
                		<tr>
					    <!--<th><div></div></th>--> 
                        <th><div>Sr No.</div></th>
							<th><div>Student Id</div></th>
							<th><div>Student Name</div></th>
							<th><div>Course Name</div></th>
							<th><div>Enq Date</div></th>
							<th><div>Admission Date</div></th>
							<th><div>Advance</div></th>
							<th><div>Balance</div></th>
							<th><div>Total Fee</div></th>
							<th><div>Mobile No</div></th>
							<th><div>Remark</div></th>
							<!--<th><div></div></th>-->
							<th><div>Status</div></th> 
                    		<th><div>Options</div></th>
						</tr>
					</thead>
                    <tbody>
															<tr class="text-center">								
								<td>1</td>								
									<td>53</td>	
								<td>Vijay Raj Shinde</td>
								<td>Array </td>
								<td>0000-00-00 </td>
								<td>0000-00-00 </td>
								<td>3700 </td>
								<td>1900 </td>
								<td>5600 </td>
								<td>8455661122 </td>
								<td>Pendding </td>
								
							<!--	<td>() </td>-->
								
								<td>
																							

									<!--<a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('student_status.php?s_id=53')" class="btn btn-green btn-small"><i class="icon-eye-open"></i> Activate</a>-->
									<a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('student_status.php?s_id=53')" class="btn btn-green btn-small"><i class="icon-eye-open"></i></a>
								
										
									
								 </td>

								<td align="center">
							<!--	<a data-toggle="modal" href="student_edit.php?student_id=53" class="btn btn-gray btn-small"><i class="icon-wrench"></i> Edit</a>

								<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('studentdelete.php?student_id=53')" class="btn btn-red btn-small"><i class="icon-trash"></i> Delete </a>

								<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_student_profile('View_Student',53)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i> View</a>-->
	                        
	                        	<a data-toggle="modal" href="student_edit1.php?student_id=53" class="btn btn-gray btn-small"><i class="icon-pencil"></i></a>

								<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('studentdelete.php?student_id=53')" class="btn btn-red btn-small"><i class="icon-trash"></i> </a>

								<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_student_profile('View_Student',53)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i></a>

							
								</td>
								</tr>
						                                
							</tbody>
                </table>
               		
						       <tr>	   
						       <td>
						       <form action="/exam/admin/payment.php" method="post">	
							   <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Export to Excel</button>
							   </form>
							  </td>
							 </tr>
	  
	    	</div>
		</div>
	</div>
</div>            </div>       
    <div style="clear:both;color:#aaa; padding:20px;">
<center>
&copy; 2018  <a href="#" target="_blank">Online Examination System</a>
</center>
<center>
</center>
</div>          
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