<div class="main-content">
		<div class="container-fluid" >
            <div class="row-fluid">
                <div class="area-top clearfix">
                    <div class="pull-left header">
                        <h3 class="title">
                        <i class="icon-edit"></i>
                          <?php echo constant('TI_MANAGE_STAFF');?> </h3>
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
								<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i><?php echo constant('TI_STAFF_LIST');?></a>
							</li>
							<li>
								<a href="#add" data-toggle="tab"><i class="icon-plus"></i><?php echo constant('TI_STAFF_ADD');?></a>
							</li>
						</ul>  
					</div>
					<div class="box-content padded">
						<div class="tab-content">        
							<div class="tab-pane box active" id="list">
								   <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
									<thead>
										<tr>
										
											<th><div><?php echo "Staff Name";?></div></th>
											<th><div><?php echo "Branch Name";?></div></th>
											<th><div><?php echo "Staff Address";?></div></th>
											<th><div><?php echo "Email";?></div></th>
											<th><div><?php echo "Mobile No";?></div></th>
											<th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$query_staff_setting=mysqli_query($con,"select * from staff order by staff_id");
											$i=0;
											while($res=mysqli_fetch_array($query_staff_setting))
											{ 
												$i++;										
											?>
											<tr class="text-center">
											    
											    
												<td><?php echo $res['staff_name'];?></td>
												<td><?php echo $res['branch_name'];?></td>
												<td><?php echo $res['staff_address'];?></td>
												
												<td><?php echo $res['email'];?></td>
												<td><?php echo $res['phone_no'];?></td>
											<!--<td><?php
														if($res['staff_status']==1)
														{?>														

														<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('center_status.php?center_id=<?php echo $res['center_id'];?>')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> <?php echo constant('TI_DEACTIVATE_BUTTON');?></a>
													<?php }
														else
														{?>														
															
														<a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('center_status.php?center_id=<?php echo $res['center_id'];?>')" class="btn btn-green btn-small"><i class="icon-eye-open"></i> <?php echo constant('TI_ACTIVATE_BUTTON');?></a>
													<?php }?>	
												</td>-->
												<td align="center">
													<!--<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_center_profile('Staff_profile',<?php echo $res['staff_id'];?>)"class="btn btn-default btn-small"><i class="icon-user"></i>  <?php echo constant('TI_PROFILE_BUTTON');?> </a>-->
													

													<a data-toggle="modal" href="staff_edit.php?staff_id=<?php echo $res['staff_id'];?>"  class="btn btn-gray btn-small"><i class="icon-wrench"></i> <?php echo constant('TI_EDIT_BUTTON');?></a>

													<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('staff_delete.php?staff_id=<?php echo $res['staff_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON');?> </a>
												    <!--<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_staff_profile('View_Staff',<?php echo $row['staff_id'];?>)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i> <?php echo constant('TI_EXAM_VIEW_BUTTON');?></a>-->
												    <a data-toggle="modal" href="#question-modal-form" onclick="modal_view_staff_profile('View_Staff',<?php echo $res['staff_id'];?>)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i> <?php echo constant('TI_EXAM_VIEW_BUTTON');?></a>

                                                </td>
											</tr>
											<?php } ?>                                
										</tbody>
									</table>
								</div>
          
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<form action="<?php $PHP_SELF ?>" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top">	
				    
						  	      
							<div class="control-group">
							  <label class="control-label"><?php echo constant('TI_LABEL_BRANCH_NAME');?></label>
                                  <div class="controls">
									<select name="branch_name" class="chzn-select">
									<option value="">Select Branch</option>  
										<?php $query_course=mysqli_query($con,"select * from branch");
										while($result_course=mysqli_fetch_array($query_course))
										{
										?>
                                    	<option value="<?php echo $result_course['branch_name'];?>"><?php echo ucfirst($result_course['branch_name']);?></option>
										<?php }?>
                                    </select>
                                </div>
                            </div>
						
						
                            <div class="control-group">
                                <label class="control-label"><?php echo "Staff Name";?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="staff_name"/>
                                </div>
                            </div>
                            
							<div class="control-group">
                                <label class="control-label"><?php echo "Staff Address";?> </label>
                                <div class="controls">                                    
									<div class="box closable-chat-box">									
									<div class="chat-message-box">
									<textarea name="staff_address" id="text_for_signature" rows="5" placeholder="Add Address"></textarea>									
									</div>
									</div>
                                </div>
                            </div>
							 <div class="control-group">
                                <label class="control-label"><?php echo "Phone No.";?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="phone_no" />
                                </div>
                            </div>          
							
							<div class="control-group">
                                <label class="control-label"><?php echo "Email";?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required,custom[email]]" name="email"/>
                                </div>
                            </div>
						
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo "Add Staff";?></button>
							<input type="hidden" value="Add new staff" name="submit">
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
