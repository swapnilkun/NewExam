
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
              <?php include("message.php");?>
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
					    <!--<th><div><?php //echo constant('TI_TABLE_CATEGORY_NAME') ?></div></th>--> 
                        <th><div>Sr No.</div></th>
							<th><div>Student Id</div></th>
							<th><div><?php echo constant('TI_TABLE_STUDENT_NAME') ?></div></th>
							<th><div><?php echo constant('TI_TABLE_COURSE_NAME') ?></div></th>
							<th><div>Enq Date</div></th>
							<th><div>Admission Date</div></th>
							<th><div>Advance</div></th>
							<th><div>Balance</div></th>
							<th><div>Total Fee</div></th>
							<th><div>Mobile No</div></th>
							<th><div>Remark</div></th>
							<!--<th><div><?php //echo constant('TI_TABLE_BATCH_NAME_TIME') ?></div></th>-->
							<th><div><?php echo constant('TI_TABLE_STATUS') ?></div></th> 
                    		<th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
						</tr>
					</thead>
                    <tbody>
							<?php 
								$query=mysqli_query($con,"SELECT DISTINCT(s.student_id),s.student_fname,s.student_mname,s.student_lname,s.student_phone,i.remark,s.course_interest,s.enquiry_date,s.addmission_date,i.course_fee,sum(i.fee_received)as received from student s join installment i on i.student_id=s.student_id WHERE s.type='enquiry' or s.type='register' ");
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
								<td><?php echo $i;?></td>								
									<td><?php echo $row['student_id'];?></td>	
								<td><?php echo ucfirst($row['student_fname']);?> <?php echo ucfirst($row['student_mname']);?> <?php echo ucfirst($row['student_lname']);?></td>
								<td><?php echo ucfirst($row['course_interest']);?> </td>
								<td><?php echo ucfirst($row['enquiry_date']);?> </td>
								<td><?php echo ucfirst($row['addmission_date']);?> </td>
								<td><?php echo ucfirst($row['received']);?> </td>
								<td><?php echo ucfirst($row['course_fee']-$row['received']);?> </td>
								<td><?php echo ucfirst($row['course_fee']);?> </td>
								<td><?php echo ucfirst($row['student_phone']);?> </td>
								<td><?php echo ucfirst($row['remark']);?> </td>
								
							<!--	<td><?php echo ucfirst($query_batch_name['batch_name'])."(".$query_batch_name['batch_time'].")";?> </td>-->
								
								<td>
									<?php
									if($row['student_status']==1)
									{?>														

									<!--<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('student_status.php?s_id=<?php echo $row['student_id'];?>')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> <?php echo constant('TI_DEACTIVATE_BUTTON');?></a>-->
									<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('student_status.php?s_id=<?php echo $row['student_id'];?>')" class="btn btn-red btn-small"><i class="icon-eye-close"></i></a>
									<?php }
									else
									{?>														

									<!--<a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('student_status.php?s_id=<?php echo $row['student_id'];?>')" class="btn btn-green btn-small"><i class="icon-eye-open"></i> <?php echo constant('TI_ACTIVATE_BUTTON');?></a>-->
									<a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('student_status.php?s_id=<?php echo $row['student_id'];?>')" class="btn btn-green btn-small"><i class="icon-eye-open"></i></a>
								
									<?php }?>	
									
								 </td>

								<td align="center">
							<!--	<a data-toggle="modal" href="student_edit.php?student_id=<?php echo $row['student_id'];?>" class="btn btn-gray btn-small"><i class="icon-wrench"></i> <?php echo constant('TI_EDIT');?></a>

								<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('studentdelete.php?student_id=<?php echo $row['student_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON');?> </a>

								<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_student_profile('View_Student',<?php echo $row['student_id'];?>)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i> <?php echo constant('TI_EXAM_VIEW_BUTTON');?></a>-->
	                        
	                        	<a data-toggle="modal" href="student_edit1.php?student_id=<?php echo $row['student_id'];?>" class="btn btn-gray btn-small"><i class="icon-pencil"></i></a>

								<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('studentdelete.php?student_id=<?php echo $row['student_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> </a>

								<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_student_profile('View_Student',<?php echo $row['student_id'];?>)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i></a>

							
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
	  
	    	</div>
		</div>
	</div>
</div>            </div>       
    <?php include("copyright.php");?>        
	</div>
	</div>

</body>
