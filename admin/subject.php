<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');


if (isset($_POST['submit'])) 
{ 
	
	$subject_name= mysql_prep($_POST['subject_name']);
	//	$course_fee= mysql_prep($_POST['course_fee']);
	//$exam_fee= mysql_prep($_POST['exam_fee']);
	//	$certify= mysql_prep($_POST['certify']);
	$duration= mysql_prep($_POST['duration']);



	
	$query_select_subject=mysqli_query($con,"SELECT * FROM subject WHERE subject_name='".$subject_name."'");
	if(mysqli_num_rows($query_select_subject)>0)
	{
		$error .= ucfirst($subject_name)." ".constant('TI_SUBJECT_ERROR_EXITS');
	}
	else
	{
	 $query_insert_subject = "INSERT INTO subject (subject_name,course_fee,duration) 
	VALUES('{$subject_name}','{$duration}')";
	
		$result_subject=mysqli_query($con,$query_insert_subject);
		if($result_subject)
		{
			$message_success .= ucfirst($subject_name)." ".constant('TI_SUBJECT_SUCCESS_MESSAGE');
		}
		else
		{
			$error .=  constant('TI_SUBJECT_MYSQL_ERROR');
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
                        <?php echo constant('TI_MANAGE_COURSE');?> </h3>
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
								<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i><?php echo constant('TI_COURSE_LIST');?></a>
							</li>
							<li>
								<a href="#add" data-toggle="tab"><i class="icon-plus"></i><?php echo constant('TI_COURSE_ADD');?></a>
							</li>
						</ul>  
					</div>
					<div class="box-content padded">
						<div class="tab-content">        
							<div class="tab-pane box active" id="list">
								<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
									<thead>
										<tr>
										
											<th><div>Course Name</div></th>
											<!--<th><div>Certifying Auth</div></th>
											<th><div>Exam Fee</div></th>
											<th><div>Course Fee</div></th>-->
										    <th><div>Course Duration</div></th>
											<th><div><?php echo constant('TI_TABLE_STATUS');?></div></th>
											<th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$query=mysqli_query($con,"SELECT * FROM subject ORDER BY subject_name");
											$i=0;
											while($row=mysqli_fetch_array($query))
											{ 
											//	$query_category_name=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM category where c_id='".$row['category_id']."'"));

											//	$query_subcategory_name=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM subcategory where s_c_id='".$row['subcategory_id']."'"));
												$i++;										
											?>
											<tr class="text-center">
												<!-- <td><?php //echo $i;?></td> -->
												<!-- <td><?php //echo ucfirst($query_subcategory_name['subcategory_name']);?></td>
												<td><?php //echo ucfirst($query_category_name['category_name']);?></td>-->
												
												<td><?php echo ucfirst($row['subject_name']);?></td>
												<!--<td><?php //echo ucfirst($row['certify']);?></td>
												<td><?php //echo ucfirst($row['exam_fee']);?></td>
												<td><?php //echo ucfirst($row['course_fee']);?></td>-->
												<td><?php echo ucfirst($row['duration']);?></td>
												
												<td  align="center">								
													<?php
														if($row['subject_status']==1)
														{?>														

														<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('subject_status.php?s_id=<?php echo $row['s_id'];?>')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> <?php echo constant('TI_DEACTIVATE_BUTTON');?></a>
													<?php }
														else
														{?>														
															
															<a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('subject_status.php?s_id=<?php echo $row['s_id'];?>')" class="btn btn-green btn-small"><i class="icon-eye-open"></i> <?php echo constant('TI_ACTIVATE_BUTTON');?></a>
													<?php }?>								
												</td>
												<td align="center">
													<a data-toggle="modal" href="subject_edit.php?s_id=<?php echo $row['s_id']; ?>" class="btn btn-gray btn-small"><i class="icon-pencil"></i> <?php echo constant('TI_EDIT_BUTTON');?></a>

													<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('subject_delete.php?s_id=<?php echo $row['s_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON');?></a>

													<a data-toggle="modal" href="question.php?s_id=<?php echo $row['s_id'];?>"  class="btn btn-green btn-small"><i class="icon-plus-sign"></i> <?php echo constant('TI_BUTTON_QUESTION');?> </a>

													<a data-toggle="modal" href="viewquestion.php?s_id=<?php echo $row['s_id'];?>"  class="btn btn-blue btn-small"><i class="icon-zoom-in"></i> <?php echo constant('TI_EXAM_VIEW_QUESTION_BUTTON');?> </a>
												</td>
											</tr>
											<?php } ?>                                
										</tbody>
									</table>
								</div>
         
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<form action="<?php $PHP_SELF ?>" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top">	
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
                                    	<option value="<?php echo $result_category['c_id'];?>"><?php echo ucfirst($result_category['category_name']);?></option>
										
										<?php }?>
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
                        </div>-->
					
						<!--<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php //echo constant('TI_LABEL_COURSE_NAME');?></label>
                                <div class="controls">
                                   
                                
                                <select class="form-control chzn-select" name="subject_name" class="validate[required]">
                                    <option>Select Course</option>
					       <?php 
								   //$query_batch=mysqli_query($con,"select * from subject");
								   //while($result_batch=mysqli_fetch_array($query_batch))
								   //{?>
									<option value="<?php// echo $result_batch['subject_name'];?>"><?php //echo $result_batch['subject_name']; ?></option>

							<?php //}
						    ?>
					        </select>
                                </div>
                            </div>
                        </div>-->
                        
                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_COURSE_NAME');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="subject_name">
                                </div>
                            </div>
                        </div>
                        
                        <!--<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Certifying Authority</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="certify">
                                </div>
                            </div>
                        </div>
                        
                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Exam Fee</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="exam_fee">
                                </div>
                            </div>
                        </div>
                        
                    	<div class="padded">                   
                         <div class="control-group">
                                <label class="control-label">Course Fee</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="course_fee">
                                </div>
                            </div>
                        </div>-->
                        
                         <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Course Duration <br>(Ex-2 Months)</label>
                                <div class="controls">
                                  <input type="text" class="validate[required]" name="duration">
						
                                </div>
                            </div>
                        </div>
                        
                       <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo constant('TI_COURSE_ADD_BUTTON');?></button>
							<input type="hidden" value="Add new Category" name="submit">
                        </div>
                    </form>                
                </div>                
			</div>
			<!-- CREATION FORM ENDS -->
            
		</div>
	</div>
</div>            
</div>       
<?php include("copyright.php");?>
</div>
</div>




</body>

<!-----------HIDDEN MODAL FORM - COMMON IN ALL PAGES ------>
<div id="modal-form" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div id="modal-tablesLabel" style="color:#fff; font-size:16px;">&nbsp; </div>
	</div>
    <div class="modal-body" id="modal-body"><?php echo constant('TI_LOADING_DATA');?></div>
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
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_POPUP_COURSE_DELETE');?></div>
    <div class="modal-footer">
    	<a href="subject_delete.php?s_id=<?php echo $row['s_id'];?>" id="delete_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL_BUTTON');?></button>
    </div>
</div>


<!-----------HIDDEN MODAL ACTIVE STATUS CONFIRMATION - COMMON IN ALL PAGES ------>

<div id="modal-status-active" class="modal hide fade" style="height:140px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i>&nbsp; <?php echo constant('TI_DELETE_CONFIRMATION');?></h6>
	</div>
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_STATUS_DATA_ACTIVE');?></div>
    <div class="modal-footer">
    	<a href="subject_status.php?s_id=<?php echo $row['s_id'];?>" id="active_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
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
    	<a href="subject_status.php?s_id=<?php echo $row['s_id'];?>" id="deactive_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL_BUTTON');?></button>
    </div>
</div>






<script>
function modal(param1 ,param2 ,param3)
{
	document.getElementById('modal-body').innerHTML = 
		'<iframe id="frame1" src="category-edit.php?c_id='+param2+'" width="100%" height="100%" frameborder="0"></iframe>';
	document.getElementById('modal-tablesLabel').innerHTML = param1.replace("_"," ");
}

function modal_delete(param1)
{
	document.getElementById('delete_link').href = param1;
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

</html>