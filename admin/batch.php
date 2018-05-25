<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');

if (isset($_POST['submit'])) 
{ 
	$batch_name= mysql_prep($_POST['batch_name']);
	$course_name= mysql_prep($_POST['course_name']);
	$batch_time= mysql_prep($_POST['batch_time']);

	$query_insert_category = "INSERT INTO batch (batch_name,course_name,batch_time) VALUES('{$batch_name}','{$course_name}','{$batch_time}')";
	$result_category=mysqli_query($con,$query_insert_category);
	if($result_category)
	{
	$message_success .=$subcategory_name." ".constant('TI_BATCH_ADD_MESSAGE');
	}
	else
	{
		$error .=  constant('TI_BATCH_MYSQL_ERROR');
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
                        <?php echo constant('TI_MANAGE_BATCH');?> </h3>
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
								<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i><?php echo constant('TI_BATCH_LIST');?></a>
							</li>
							<li>
								<a href="#add" data-toggle="tab"><i class="icon-plus"></i><?php echo constant('TI_BATCH_ADD');?></a>
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
											<th><div><?php echo constant('TI_TABLE_BATCH_NAME');?></div></th>  
											<th><div><?php echo constant('TI_TABLE_BATCH_TIME');?></div></th>  
											<th><div><?php echo constant('TI_TABLE_STATUS');?></div></th> 
											<th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$query=mysqli_query($con,"SELECT b_id,s.subject_name,b.batch_name,b.batch_time from batch b join subject s on s.s_id=b.course_name order by b.b_id");
											$i=0;
											while($row=mysqli_fetch_array($query))
											{ 
												$i++;										
												
											?>
											<tr class="text-center">
												<td><?php echo ucfirst($row['subject_name']);?></td>
												<td><?php echo ucfirst($row['batch_name']);?></td>
												<td><?php echo ucfirst($row['batch_time']);?></td>
												<td  align="center">								
													<?php
														if($row['batch_status']==1)
														{?>														

														<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('batch_status.php?b_id=<?php echo $row['b_id'];?>')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> <?php echo constant('TI_DEACTIVATE_BUTTON');?></a>
													<?php }
														else
														{?>														
															
															<a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('batch_status.php?b_id=<?php echo $row['b_id'];?>')" class="btn btn-green btn-small"><i class="icon-eye-open"></i> <?php echo constant('TI_ACTIVATE_BUTTON');?></a>
													<?php }?>								
												</td>
												<td align="center">
													<a data-toggle="modal" href="batch_edit.php?b_id=<?php echo $row['b_id']; ?>" class="btn btn-gray btn-small"><i class="icon-pencil"></i> <?php echo constant('TI_EDIT_BUTTON');?></a>

													<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('batch_delete.php?b_id=<?php echo $row['b_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON');?></a>
												</td>
											</tr>
											<?php } ?>                                
										</tbody>
									</table>
								</div>
        
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<form action="<?php $PHP_SELF ?>" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top">
                	    
                	   <div class="padded">       
						<div class="control-group">
                                <label class="control-label">Course Name</label>
                                <div class="controls">
								<select class="form-control chzn-select" name="course_name" class="validate[required]">
                                    <option>Select Course</option>
					             <?php 
								   $query_batch=mysqli_query($con,"select * from subject");
								   while($result_batch=mysqli_fetch_array($query_batch))
								   {?>
									<option value="<?php echo $result_batch['s_id'];?>"><?php echo $result_batch['subject_name']; ?></option>

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
									<input type="text" class="validate[required]" name="batch_name"/>
                                </div>
                            </div>
						</div>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_BATCH_TIME');?></label>
                                <div class="controls">                                   
									<input type="text" name="batch_time" id="pr_departuretime_airlines" class="validate[required]"/>
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
                            <button type="submit" class="btn btn-gray"><?php echo constant('TI_BATCH_ADD_BUTTON');?></button>
							<input type="hidden" value="Add Batch" name="submit">
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
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_POPUP_DELETE_BATCH');?></div>
    <div class="modal-footer">
    	<a href="subcategory_delete.php?s_c_id=<?php echo $row['s_c_id'];?>" id="delete_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
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
    	<a href="$query_category.php?s_c_id=<?php echo $row['s_c_id'];?>" id="active_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
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
    	<a href="$query_category.php?s_c_id=<?php echo $row['s_c_id'];?>" id="deactive_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
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