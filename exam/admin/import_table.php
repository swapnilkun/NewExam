<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');

if (isset($_POST['submit'])) 
{ 
	if($_FILES['g_logo']['name']!="")
	{
		$img_dir="import/";
		$img = explode('.', $_FILES['g_logo']['name']);	
		$img_type=$img[1];//image type(like jpg.png,gif,bmp)


		echo $extension_type = strtolower($img_type);
		if(in_array($extension_type , array('xls')))
		{
			if($extension_type=='xls')
			{
					$originalImage=$img_dir.$_FILES['g_logo']['name'];
					$fileupload=move_uploaded_file ($_FILES['g_logo']['tmp_name'],$originalImage);
					if($fileupload)
					{
						$message_success .=  constant('TI_IMPORT_ADD_MESSAGE');
					}
					else
					{
						$error .=  constant('TI_IMPORT_ERROR');
					}
			}
			else
			{
				$error .=   constant('TI_IMPORT_ERROR_FORMAT');
			}
		}
		else
		{
			$error .=   constant('TI_IMPORT_ERROR_FORMAT');
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
                        <?php echo constant('TI_MANAGE_IMPORT');?> </h3>
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
								<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i><?php echo constant('TI_IMPORT_LIST');?></a>
							</li>
							<li>
								<a href="#add" data-toggle="tab"><i class="icon-plus"></i><?php echo constant('TI_IMPORT_ADD');?></a>
								
							</li>
						</ul>  
					</div>
					<div class="box-content padded">
						<div class="tab-content">        
							<div class="tab-pane box active" id="list">
								<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
									<thead>
										<tr>
											
											<th><div><?php echo constant('TI_TABLE_IMPORT_NAME');?></div></th>  
											
											<th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$log_directory = 'import';

											$results_array = array();

											if (is_dir($log_directory))
											{
													if ($handle = opendir($log_directory))
													{
															//Notice the parentheses I added:
															while(($file = readdir($handle)) !== FALSE)
															{
																 if ($file != "." && $file != "..")
																 {
																	$results_array[] = $file;
																 }
															}
															closedir($handle);
													}
											}


											foreach($results_array as $value)
											{
											?>
											<tr>
												
												<td><?php echo ucfirst($value );?></td>
												
												<td align="center">
													

													<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('import_table_delete.php?b_id=<?php echo $value;?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON');?></a>


													<a data-toggle="modal" href="import.php?import=<?php echo $value;?>" class="btn btn-green btn-small"><i class="icon-upload"></i> <?php echo'Import File';?></a>
												</td>
											</tr>
											<?php
											}
											?>							
											                            
										</tbody>
									</table>
								</div>
        
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<form action="<?php $PHP_SELF ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal validatable" target="_top">	
						<div class="padded">       
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_IMPORT_FILE');?></label>
                                <div class="controls">
									 <input type="file" class="" name="g_logo" id="imgInp" />
                                </div>
                            </div>
						</div>
						
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo constant('TI_IMPORT_ADD_BUTTON');?></button>
							<input type="hidden" value="Add File" name="submit">
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
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_POPUP_DELETE_FILE');?></div>
    <div class="modal-footer">
    	<a href="export_table_delete.php?b_id=<?php echo $value;?>" id="delete_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
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