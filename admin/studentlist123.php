
<?php

if (isset($_POST['enquiry'])) 
{ 
	//$category_id= mysql_prep($_POST['category_id']);
	//$subcategory_id= mysql_prep($_POST['s_c_id']);
	//$subject_id= mysql_prep($_POST['s_id']);
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

		 $query_insert_student = "INSERT INTO student (student_fname,student_mname,student_lname,course_interest,student_phone,student_phone1,student_email,student_dob,student_gender,
		                          student_occupation,student_state,student_city,student_postcode,student_address,type,date) VALUES
		                          ('{$fname}','{$mname}','{$lname}','{$course}','{$student_phone}','{$student_phone1}','{$student_email}','{$dob}',
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
} elseif (isset($_POST['register'])) {
    
    	//$category_id= mysql_prep($_POST['category_id']);
	//$subcategory_id= mysql_prep($_POST['s_c_id']);
	$subject_id= mysql_prep($_POST['s_id']);
	//$center_id= mysql_prep($_POST['c_id']);
	$fname= mysql_prep($_POST['fname']);
	$lname= mysql_prep($_POST['lname']);
	$mname= mysql_prep($_POST['mname']);
	$interested_course= mysql_prep($_POST['interested_course']);
	$student_phone= mysql_prep($_POST['student_phone']);
	$student_phone1= mysql_prep($_POST['student_phone1']);
	
    $student_state= mysql_prep($_POST['student_state']);
	$student_city= mysql_prep($_POST['student_city']);
	$student_postcode= mysql_prep($_POST['student_postcode']);
    $student_occupation= mysql_prep($_POST['studentt_occupation']);
	$student_gender= mysql_prep($_POST['student_gender']);
	
	$student_address= mysql_prep($_POST['student_address']);
	$student_email= $_POST['student_email'];
	//$password_md5= mysql_prep(encrypt($_POST['password']));
//	$password= $_POST['password'];
//$b_id= $_POST['b_id'];

	

  $query_select_student=mysqli_query($con,"SELECT * FROM student where student_email='".$student_email."'");
	if(mysqli_num_rows($query_select_student)>0)
		{
			$error .=constant('TI_STUDENT_ERROR_ALLREADY_EXIT');
		}
	else
	 {
		
		$student_dob = mysql_prep($_POST['student_dob']);
		$dob = date("Y-m-d",strtotime($student_dob));
	/*	if($student_dob!="")
		{
		$dobexplode=explode("/",$student_dob);
		$dob_day=$dobexplode[1];
		$dob_month=$dobexplode[0];
		$dob_year=$dobexplode[2];
		$student_dob_from=$dob_day.'-'.$dob_month.'-'.$dob_year;
		}*/

	  		 $query_insert_student = "INSERT INTO student (student_fname,student_mname,student_lname,course_interest,student_phone,student_phone1,student_email,student_dob,student_gender,
		                          student_occupation,student_state,student_city,student_postcode,student_address,type,date) VALUES
		                          ('{$fname}','{$mname}','{$lname}','{$course}','{$student_phone}','{$student_phone1}','{$student_email}','{$dob}',
		                          '{$student_gender}','{$student_occupation}','{$student_state}','{$student_city}','{$student_postcode}','{$student_address}','register','{$date}')";
	
		                          
		$result_student=mysqli_query($con,$query_insert_student);
		if($result_student)
		{
			$message_success .= $student_name." ".constant('TI_STUDENT_ADD_MESSAGE');
			
			echo "<script> window.location.assign('register.php'); </script>";
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
                        <?php echo constant('TI_MANAGE_STUDENT');?> </h3>
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
				<?php echo constant('TI_STUDENT_LIST');?>                	</a></li>
				<li>
				<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
				<?php echo constant('TI_STUDENT_ADD');?>              	</a></li>
				</ul>
				</div>
	<div class="box-content padded">
		<div class="tab-content">

            <div class="tab-pane box active" id="list">
            
                <table class="dTable responsive">
                	<thead>
                		<tr>
							
							<!--<th><div><?php //echo constant('TI_TABLE_CATEGORY_NAME') ?></div></th>--> 

							<th><div><?php echo constant('TI_TABLE_STUDENT_NAME') ?></div></th>
							<th><div><?php echo constant('TI_TABLE_COURSE_NAME') ?></div></th>
							<th><div>Admission Date</div></th>
							<th><div>Advance</div></th>
							<th><div>Balance</div></th>
							<th><div>Total Fee</div></th>
							<th><div>Mobile No</div></th>
							<!--<th><div><?php //echo constant('TI_TABLE_BATCH_NAME_TIME') ?></div></th>-->
							<th><div><?php echo constant('TI_TABLE_STATUS') ?></div></th> 
                    		<th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
						</tr>
					</thead>
                    <tbody>
							<?php 
								$query=mysqli_query($con,"select * from student WHERE type='register' or type='enquiry' ");
								$i=0;
								while($row=mysqli_fetch_array($query))
								{ 
								//	$query_category_name=mysqli_fetch_array(mysqli_query($con,"select * from category where c_id='".$row['category_id']."'"));
								//	$query_subcategory_name=mysqli_fetch_array(mysqli_query($con,"select * from subcategory where s_c_id='".$row['subcategory_id']."'"));
									//$query_center_name=mysqli_fetch_array(mysqli_query($con,"select * from center where c_id='".$row['center_id']."'"));
									$query_batch_name=mysqli_fetch_array(mysqli_query($con,"select * from batch where b_id='".$row['b_id']."'"));

									$i++;
										
							?>
								<tr class="text-center">								
								<!--<td><?php //echo $query_category_name['category_name'];?></td>-->								
								
								<td><?php echo ucfirst($row['student_fname']);?> <?php echo ucfirst($row['student_mname']);?> <?php echo ucfirst($row['student_lname']);?></td>
								<td><?php echo ucfirst($row['course_interest']);?> </td>
								<td><?php echo ucfirst($row['date']);?> </td>
								<td><?php echo ucfirst($row['fee_received']);?> </td>
								<td><?php echo ucfirst($row['balance']);?> </td>
								<td><?php echo ucfirst($row['total_fee']);?> </td>
								<td><?php echo ucfirst($row['student_phone']);?> </td>
								
							<!--	<td><?php echo ucfirst($query_batch_name['batch_name'])."(".$query_batch_name['batch_time'].")";?> </td>-->
								
								<td>
									<?php
									if($row['student_status']==1)
									{?>														

									<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('student_status.php?s_id=<?php echo $row['student_id'];?>')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> <?php echo constant('TI_DEACTIVATE_BUTTON');?></a>
									<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('student_status.php?s_id=<?php echo $row['student_id'];?>')" class="btn btn-red btn-small"><i class="icon-eye-close"></i></a>
									<?php }
									else
									{?>														

									<a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('student_status.php?s_id=<?php echo $row['student_id'];?>')" class="btn btn-green btn-small"><i class="icon-eye-open"></i> <?php echo constant('TI_ACTIVATE_BUTTON');?></a>
									<a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('student_status.php?s_id=<?php echo $row['student_id'];?>')" class="btn btn-green btn-small"><i class="icon-eye-open"></i></a>
								
									<?php }?>	
									
								 </td>

								<td align="center">
							<!--<a data-toggle="modal" href="student_edit.php?student_id=<?php echo $row['student_id'];?>" class="btn btn-gray btn-small"><i class="icon-wrench"></i> <?php echo constant('TI_EDIT');?></a>

								<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('studentdelete.php?student_id=<?php echo $row['student_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON');?> </a>

								<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_student_profile('View_Student',<?php echo $row['student_id'];?>)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i> <?php echo constant('TI_EXAM_VIEW_BUTTON');?></a>
	                        
	                        	<a data-toggle="modal" href="student_edit.php?student_id=<?php echo $row['student_id'];?>" class="btn btn-gray btn-small"><i class="icon-wrench"></i></a>

								<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('studentdelete.php?student_id=<?php echo $row['student_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> </a>

								<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_student_profile('View_Student',<?php echo $row['student_id'];?>)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i></a>--->

							
								</td>
								</tr>
						<?php } ?>
                                
							</tbody>
                </table>
               		
						       <tr>	   
						       <td>
						       <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">	
							   <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Export to Excel</button>
							   </form>
							  </td>
							 </tr>
