<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');


if (isset($_POST['submit'])) 
{ 
	if($_POST['area_permistion']!="")
	{
		$permistion="";
		@$area_permistion= $_POST['area_permistion'];
		if( is_array($area_permistion))
		{
			while (list ($key, $val) = each ($area_permistion)) 
			{
				$permistion .= "$val,";
			}
		}
		$admin_parmistion= substr($permistion,0,-1);
	}
	else
	{
		$admin_parmistion=0;
	}

	$username= mysql_prep($_POST['username']);
	$useremail= mysql_prep($_POST['useremail']);
	$userpassword= mysql_prep($_POST['userpassword']);
	if($userpassword!="")
	{
		$userpassword_md5= mysql_prep(encrypt($_POST['userpassword']));
	}

	$query_select_user=mysqli_query($con,"SELECT * FROM user where useremail='".$useremail."'");
	if(mysqli_num_rows($query_select_user)>0)
	{
		$error .= constant('TI_USER_ERROR_EMAIL_EXITS');
	}
	else
	{
		$query_insert_user = "INSERT INTO user (username,useremail,userpassword,userpassword_md5,area_permistion) VALUES('{$username}','{$useremail}','{$userpassword}','{$userpassword_md5}','{$admin_parmistion}')";
		$result_user=mysqli_query($con,$query_insert_user);
		if($result_user)
		{
			$message_success .= constant('TI_USER_MESSAGE');
		}
		else
		{
			$error .=  constant('TI_USER_MYSQL_ERROR');
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
                        <?php echo constant('TI_MANAGE_USER');?> </h3>
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
								<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i><?php echo constant('TI_USER_LIST');?></a>
							</li>
							<li>
								<a href="#add" data-toggle="tab"><i class="icon-plus"></i><?php echo constant('TI_USER_ADD');?></a>
							</li>
						</ul>  
					</div>
					<div class="box-content padded">
						<div class="tab-content">        
							<div class="tab-pane box active" id="list">
								<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
									<thead>
										<tr>
											<th><div><?php echo constant('TI_TABLE_ID');?></div></th>
											<th><div><?php echo constant('TI_TABLE_USER_NAME');?></div></th>
											<th><div><?php echo constant('TI_TABLE_USER_EMAIL');?></div></th>  
											<th><div><?php echo constant('TI_TABLE_STATUS');?></div></th> 
											<th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$query=mysqli_query($con,"select * from user order by username");
											$i=0;
											while($row=mysqli_fetch_array($query))
											{ 
												$i++;										
											?>
											<tr class="text-center">
												<td><?php echo $i;?></td>
												<td><?php echo ucfirst($row['username']);?></td>
												<td><?php echo $row['useremail'];?></td>
												<td  align="center">								
													<?php
														if($row['user_status']==1)
														{?>														

														<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('user_status.php?u_id=<?php echo $row['u_id'];?>')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> <?php echo constant('TI_DEACTIVATE_BUTTON');?></a>
													<?php }
														else
														{?>													
															
															<a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('user_status.php?u_id=<?php echo $row['u_id'];?>')" class="btn btn-green btn-small"><i class="icon-eye-open"></i> <?php echo constant('TI_ACTIVATE_BUTTON');?></a>
													<?php }?>								
												</td>
												<td align="center">
													<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('user_delete.php?u_id=<?php echo $row['u_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON');?></a>
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
                                <label class="control-label"><?php echo constant('TI_LABEL_USER_EMAIL');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required,custom[email]]" name="useremail"/>
                                </div>
                            </div>
                        </div>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_USER_NAME');?></label>
                                <div class="controls">
                                   <input type="text" name="username" value="" class="validate[required,minSize[8]]"/>
                                </div>
                            </div>
                        </div>
						
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_USER_PASSWORD');?></label>
                                <div class="controls">
                                    <input type="password" value=""  name="userpassword" class="validate[required,minSize[8]]"/>
                                </div>
                            </div>
                        </div>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_USER_PERMISTION');?></label>
                                <div class="controls">
                                    <select name="area_permistion[]" class="chzn-select" multiple>
										<option><?php echo constant('TI_DROPDOWN_PERMISSION');?></option>                             	
										<option value="2"><?php echo ucfirst(constant('TI_LEFT_MENU_CATEGORY'));?></option>
										<option value="3"><?php echo ucfirst(constant('TI_LEFT_MENU_SUB_CATEGORY'));?></option>
										<option value="4"><?php echo ucfirst(constant('TI_LEFT_MENU_SUBJECT'));?></option>
										<option value="5"><?php echo ucfirst(constant('TI_LEFT_MENU_CENTER'));?></option>
										<option value="6"><?php echo ucfirst(constant('TI_LEFT_MENU_STUDENT'));?></option>
										<option value="7"><?php echo ucfirst(constant('TI_LEFT_MENU_EXAM'));?></option>
										<option value="8"><?php echo ucfirst(constant('TI_LEFT_MENU_SETTINGS'));?></option> 		
										<option value="9"><?php echo ucfirst(constant('TI_LEFT_MENU_GENERAL_SETTINGS'));?></option>
										<option value="10"><?php echo ucfirst(constant('TI_LEFT_MENU_USER'));?></option>
										<option value="11"><?php echo ucfirst(constant('TI_LEFT_MENU_QUESTION'));?></option>
										<option value="12"><?php echo ucfirst(constant('TI_LEFT_MENU_NOTICE'));?></option> 
										<option value="13"><?php echo ucfirst(constant('TI_LEFT_MENU_VIEW_RESULT'));?></option> 
										<option value="14"><?php echo ucfirst(constant('TI_LEFT_MENU_BATCH'));?></option> 

										<option value="15"><?php echo ucfirst(constant('TI_LEFT_MENU_EXPORT'));?></option> 
										<option value="16"><?php echo ucfirst(constant('TI_LEFT_MENU_IMPORT'));?></option> 
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo constant('TI_USER_ADD_BUTTON');?></button>
							<input type="hidden" value="Add new Category" name="submit">
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


<!-----------HIDDEN MODAL DELETE CONFIRMATION - COMMON IN ALL PAGES ------>
<div id="modal-delete" class="modal hide fade" style="height:140px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i>&nbsp; <?php echo constant('TI_DELETE_CONFIRMATION');?></h6>
	</div>
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_POPUP_DELETE_USER');?></div>
    <div class="modal-footer">
    	<a href="user_delete.php?u_id=<?php echo $row['u_id'];?>" id="delete_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
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
    	<a href="user_status.php?u_id=<?php echo $row['u_id'];?>" id="active_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
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
    	<a href="user_status.php?u_id=<?php echo $row['u_id'];?>" id="deactive_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL_BUTTON');?></button>
    </div>
</div>






<script>

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