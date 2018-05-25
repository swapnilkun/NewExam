<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
?>
 
<?php
if (isset($_POST['submit'])) 
{ 
    $branch=mysql_prep($_POST['branch_name']);
	
   $sql = "SELECT branch_name FROM branch WHERE branch_name='$branch'";
	$result = mysqli_query($con,$sql);

	if(mysqli_num_rows($result) > 0)
	{
	   $message_success .=constant('branch name allready exists') ;
	}
	else
	{	

		$branch=mysql_prep($_POST['branch_name']);
		$address=mysql_prep($_POST['branch_address']);
	

       $query = "insert into branch (branch_name,branch_address,branch_status) values('".$branch."','".$address."','1')";


       $query_add_branch=mysqli_query($con,$query);

		if($query_add_branch)
		{
			$message_success .=constant('TI_BRANCH_ADD_MESSAGE');
		}
		else
		{
		$error .= constant('TI_BRANCH_MYSQL_ERROR');
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
                          Manage Branch </h3>
                    </div>
                </div>
            </div>
        </div>       
		<div class="container-fluid padded">
			<div class="box">
									<div class="box-header">    
						<ul class="nav nav-tabs nav-tabs-left">
							<li class="active">
								<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>Branch List</a>
							</li>
							<li>
								<a href="#add" data-toggle="tab"><i class="icon-plus"></i>Add Branch</a>
							</li>
						</ul>  
					</div>
					<div class="box-content padded">
						<div class="tab-content">        
							<div class="tab-pane box active" id="list">
								<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
									<thead>
										<tr>
											<th><div>Sr No.</div></th>
											<th><div>Branch ID</div></th>
											<th><div>Branch Name</div></th>
											<th><div>BM Name</div></th>
											<th><div>BM Number</div></th>
											<th><div>Address</div></th>
										    <th><div>Options</div></th>
										</tr>
									</thead>
									
									<tbody>
																					<tr class="text-center">
											    <td>1</td> 
											    <td>1</td>
												<td>Pune</td>
												<td><a data-toggle="modal" target="_new" href="center.php?branch_id=1" >machindra lendave</a></td>
												<td>8778785454</td>
												<td></td>
										
												<td align="center">
												
													<a data-toggle="modal" href="branch_edit.php?branch_id=1"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>
                                          	        <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('branch_delete.php?branch_id=1')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>
													<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_branch_profile('View_Branch',1)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i> </a>

												</td>
												
											</tr>
																						<tr class="text-center">
											    <td>2</td> 
											    <td>2</td>
												<td>Satara</td>
												<td><a data-toggle="modal" target="_new" href="center.php?branch_id=2" >S. B. Patil</a></td>
												<td>88888888888</td>
												<td></td>
										
												<td align="center">
												
													<a data-toggle="modal" href="branch_edit.php?branch_id=2"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>
                                          	        <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('branch_delete.php?branch_id=2')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>
													<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_branch_profile('View_Branch',2)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i> </a>

												</td>
												
											</tr>
																						<tr class="text-center">
											    <td>3</td> 
											    <td>3</td>
												<td>Kolhapur</td>
												<td><a data-toggle="modal" target="_new" href="center.php?branch_id=3" >V. B. Jadhav</a></td>
												<td>9889098909</td>
												<td>gvhvgjh</td>
										
												<td align="center">
												
													<a data-toggle="modal" href="branch_edit.php?branch_id=3"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>
                                          	        <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('branch_delete.php?branch_id=3')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>
													<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_branch_profile('View_Branch',3)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i> </a>

												</td>
												
											</tr>
																						<tr class="text-center">
											    <td>4</td> 
											    <td>7</td>
												<td>Shiv Institute Of Computer Edu</td>
												<td><a data-toggle="modal" target="_new" href="center.php?branch_id=7" >Gopal Kale</a></td>
												<td>8007557530</td>
												<td>Shreenagar</td>
										
												<td align="center">
												
													<a data-toggle="modal" href="branch_edit.php?branch_id=7"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>
                                          	        <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('branch_delete.php?branch_id=7')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>
													<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_branch_profile('View_Branch',7)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i> </a>

												</td>
												
											</tr>
																						<tr class="text-center">
											    <td>5</td> 
											    <td>8</td>
												<td>kkjk</td>
												<td><a data-toggle="modal" target="_new" href="center.php?branch_id=8" >S. B. Patil</a></td>
												<td>8177849257</td>
												<td>jkl</td>
										
												<td align="center">
												
													<a data-toggle="modal" href="branch_edit.php?branch_id=8"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>
                                          	        <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('branch_delete.php?branch_id=8')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>
													<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_branch_profile('View_Branch',8)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i> </a>

												</td>
												
											</tr>
											                                
										</tbody>
									</table>
								</div>
          
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<form action="" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top">	
				    
                               
							<div class="control-group">
							  <label class="control-label">Branch Manager Name</label>
                                  <div class="controls">
									<select name="bm_name" id="bm_name" class="chzn-select">
									<option value="">Select BM</option>  
										                                    	<option value="S. B. Patil">S. B. Patil</option>
										                                    	<option value="V. B. Jadhav">V. B. Jadhav</option>
										                                    	<option value="R. R. Patil">R. R. Patil</option>
										                                    	<option value="machindra lendave">Machindra lendave</option>
										                                    	<option value="Gopal Kale">Gopal Kale</option>
										                                    </select>
                                      <input type="hidden"  name="bm_no" id="bm_no"/>
                                </div>
                            </div>
						
                            
                            <div class="control-group">
                                <label class="control-label">Branch Name</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="branch_name"/>
                                </div>
                            </div>
                            
							<div class="control-group">
                                <label class="control-label">Branch Address </label>
                                <div class="controls">                                    
									<div class="box closable-chat-box">									
									<div class="chat-message-box">
									<textarea name="branch_address" id="text_for_signature" rows="5" placeholder="Add Address"></textarea>									
									</div>
									</div>
                                </div>
                            </div>
							
							
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Add Branch</button>
							<input type="hidden" value="Add new branch" name="submit">
                        </div>
                    </form>                
                </div>                
			</div>
		
            
		</div>
	</div>
</div>            
</div>       
<div style="clear:both;color:#aaa; padding:20px;">
<center>
&copy; 2018  <a href="#" target="_blank">Online Examination System</a>
</center>
<center>
</center>
</div>  </div>
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
        <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i> <?php echo constant('TI_DELETE_CONFIRMATION');?></h6>
	</div>
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_POPUP_BRANCH_DELETE');?></div>
    <div class="modal-footer">
    	<a href="" id="delete_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL_BUTTON');?></button>
    </div>
</div>
<!-----------HIDDEN MODAL ACTIVE STATUS CONFIRMATION - COMMON IN ALL PAGES ------>

<div id="modal-status-active" class="modal hide fade" style="height:140px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i>&nbsp; <?php echo constant('TI_DELETE_CONFIRMATION');?></h6>
	</div>
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_POPUP_DELETE_BRANCH');?></div>
    <div class="modal-footer">
    	<a href="center_status.php?center_id=<?php echo $row['center_id'];?>" id="active_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
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
    	<a href="center_status.php?center_id=<?php echo $row['center_id'];?>" id="deactive_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL_BUTTON');?></button>
    </div>
</div>






<script>

function modal_status_active(param1)
{	
	document.getElementById('active_link').href = param1;
}

function modal_status_deactive(param1)
{	
	document.getElementById('deactive_link').href = param1;
}

function modal_delete(param1)
{
	document.getElementById('delete_link').href = param1;
}

function modal_view_branch_profile(param1 ,param2 ,param3)
{
	document.getElementById('modal-body-question').innerHTML = 
		'<iframe id="frame1" src="viewbranch.php?branch_id='+param2+'" width="100%" height="150" frameborder="0"></iframe>';
	document.getElementById('modal-tablesLabel_question').innerHTML = param1.replace("_"," ");
}

</script>

</html>