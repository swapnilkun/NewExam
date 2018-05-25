<?php
include('include/configure.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');

if (isset($_POST['submit'])) 
{ 
	$notice_subject= mysql_prep($_POST['notice_subject']);	
	$notice_textarea= mysql_prep($_POST['notice_textarea']);	

      $notice_date = mysql_prep($_POST['notice_date']);
	
		if($notice_date!="")
		{
		$dobexplode=explode("/",$notice_date);
		$dob_day=$dobexplode[1];
		$dob_month=$dobexplode[0];
		$dob_year=$dobexplode[2];
		//$notice_date_from=$dob_day.'-'.$dob_month.'-'.$dob_year;
		$notice_date_from=$dob_year.'-'.$dob_month.'-'.$dob_day;
		}

	$query_insert_notice = "INSERT INTO notice (noitce,notice_subject,notice_date,status,admin_id) VALUES('{$notice_textarea}','{$notice_subject}','{$notice_date_from}',1,'{$_SESSION['user_id']}')";
	$result_notice=mysqli_query($con,$query_insert_notice);
	if($result_notice)
	{
		$message_success .= constant('TI_INSTRUCTION_ADD_SUCCESS_MESSAGE');
	}
	else
	{
		$error .= constant('TI_INSTRUCTION_ADDED_FAILED_MESSAGE');
		$error .= "<p>" . mysqli_error($con) . "</p>";
	}
		
}

?><div class="main-content">
                    <div class="container-fluid" >
            <div class="row-fluid">
                <div class="area-top clearfix">
                    <div class="pull-left header">
                        <h3 class="title">
                        <i class="icon-edit"></i>
                        <?php echo constant('TI_MANAGE_INSTRUCTION');?> </h3>
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
				<?php echo constant('TI_LABEL_INSTRUCTION_LIST');?>	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					     <?php echo constant('TI_LABEL_ADD_INSTRUCTION');?></a></li>
		</ul>
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		
							<th><div><?php echo constant('TI_LABEL_INSTRUCTION_SUBJECT');?></div></th> 
							<th><div><?php echo constant('TI_LABEL_INSTRUCTION_DATE');?></div></th>
                    		<th><div><?php echo constant('TI_LABEL_INSTRUCTION');?></div></th>   
							<th><div><?php echo constant('TI_LABEL_INSTRUCTION_STATUS');?></div></th> 
                    		<th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
						</tr>
					</thead>
                    <tbody>
							<?php 
								$query=mysqli_query($con,"select * from notice where admin_id='".$_SESSION['user_id']."' order by notice_date");
								$i=0;
								while($row=mysqli_fetch_array($query))
								{ 
									$i++;
										
							?>
								<tr class="text-center">
								
								<td style="max-width:500px"><?php echo $row['notice_subject'];?> </td>
								<td><?php echo $row['notice_date'];?></td>
								<td style="max-width:500px"><?php echo $row['noitce'];?> </td>
								<td>
								
								
								<?php
									if($row['status']==1)
									{?>														

									<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('notice_status.php?n_id=<?php echo $row['n_id'];?>')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> <?php echo constant('TI_DEACTIVATE_BUTTON');?></a>
									<?php }
									else
									{?>														

									<a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('notice_status.php?n_id=<?php echo $row['n_id'];?>')" class="btn btn-green btn-small"><i class="icon-eye-open"></i> <?php echo constant('TI_ACTIVATE_BUTTON');?></a>
									<?php }?>	
								
								</td>
								<td align="center">
								<a data-toggle="modal" href="edit_notice.php?n_id=<?php echo $row['n_id'];?>" class="btn btn-gray btn-small"><i class="icon-pencil"></i> <?php echo constant('TI_EDIT');?></a>
								<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('noticedelete.php?notice_id=<?php echo $row['n_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON');?></a>
								
								<a data-toggle="modal" href="noticestudent.php?n_id=<?php echo $row['n_id'];?>" class="btn btn-danger btn-small"><i class="icon-user"></i> <?php echo constant('TI_DESBOARD_ICON_STUDENT');?></a>

								<a data-toggle="modal" href="noticecenter.php?n_id=<?php echo $row['n_id'];?>" class="btn btn-green btn-small"><i class="icon-user"></i> <?php echo "Teacher";?></a>

								</td>
								</tr>
						<?php } ?>
                                
							</tbody>
                </table>
			</div>
                   
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<form action="<?php $PHP_SELF ?>" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top">
					<div style="display:none">
						<input type="hidden" name="authenticity_token" value="bbe71376778db965d72f26d342a9f91c" />
					</div> 

						<div class="padded"> 
						   <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_INSTRUCTION_SUBJECT');?> </label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="notice_subject" value=""/>
                                </div>
                            </div>	
							
							                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_INSTRUCTION_DATE');?></label>
                                <div class="controls">
                                    <input type="text" name="notice_date"  class="validate[required,custom[dateFormat]] datepicker"/>
                                </div> 
                            </div>

                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_INSTRUCTION');?></label>
                                <div class="controls">
                                     <div class="box closable-chat-box">
                                        <div class="box-content">
                                                <div class="chat-message-box">
                                                <textarea name="notice_textarea" id="ttt" class="validate[required]" rows="5" placeholder="add instruction"></textarea>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                           
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo "Add Instruction";?></button>
							<input type="hidden" value="Add new notice" name="submit">
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
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_POPUP_INSTRUCTION_DELETE');?></div>

    <div class="modal-footer">
    	<a href="noticedelete.php?status=<?php echo $row['n_id'];?>" id="delete_link" class="btn btn-red" ><?php echo constant('TI_CONFIRM');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL_BUTTON');?></button>
    </div>
</div>
<!-----------HIDDEN MODAL ACTIVE CONFIRMATION - COMMON IN ALL PAGES ------>
<div id="modal-status-active" class="modal hide fade" style="height:140px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i>&nbsp; <?php echo constant('TI_DELETE_CONFIRMATION');?></h6>
	</div>
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_STATUS_DATA_ACTIVE');?></div>
    <div class="modal-footer">
    	<a href="notice_status.php?n_id=<?php echo $row['n_id'];?>" id="active_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL_BUTTON');?></button>
    </div>
</div>
 <!-----------HIDDEN MODAL DEACTIVE CONFIRMATION - COMMON IN ALL PAGES ------>

<div id="modal-status-deactive" class="modal hide fade" style="height:140px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i>&nbsp; <?php echo constant('TI_DELETE_CONFIRMATION');?></h6>
	</div>
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_STATUS_DATA_DEACTIVE');?></div>
    <div class="modal-footer">
    	<a href="notice_status.php?n_id=<?php echo $row['n_id'];?>" id="deactive_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
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
<script>

			CKEDITOR.replace( 'goodbyemessage', {
				fullPage: true,
				allowedContent: true,
				extraPlugins: 'wysiwygarea'
			});

		</script>

		 <script>

			CKEDITOR.replace( 'welcomemessage', {
				fullPage: true,
				allowedContent: true,
				extraPlugins: 'wysiwygarea'
			});

		</script>
</html>