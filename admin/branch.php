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

		$bm_name=mysql_prep($_POST['bm_name']);
		$bm_no=mysql_prep($_POST['bm_no']);
		$branch=mysql_prep($_POST['branch_name']);
		$address=mysql_prep($_POST['branch_address']);
		
	    $query = "insert into branch (bm_name,bm_number,branch_name,branch_address,branch_status) values('".$bm_name."','".$bm_no."','".$branch."','".$address."','1')";

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
                          <?php echo constant('TI_MANAGE_BRANCH');?> </h3>
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
								<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i><?php echo constant('TI_BRANCH_LIST');?></a>
							</li>
							<li>
								<a href="#add" data-toggle="tab"><i class="icon-plus"></i><?php echo constant('TI_BRANCH_ADD');?></a>
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
											<th><div><?php echo "Branch ID";?></div></th>
											<th><div><?php echo "Branch Name";?></div></th>
											<th><div><?php echo "BM Name";?></div></th>
											<th><div><?php echo "BM Number";?></div></th>
											<th><div><?php echo "Address";?></div></th>
										    <th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
										</tr>
									</thead>
									
									<tbody>
										<?php 
											$query_branch_setting=mysqli_query($con,"select * from branch order by branch_id");
											$i=0;
											while($res=mysqli_fetch_array($query_branch_setting))
											{ 
												$i++;										
											?>
											<tr class="text-center">
											    <td><?php echo $i;?></td> 
											    <td><?php echo $res['branch_id'];?></td>
												<td><?php echo $res['branch_name'];?></td>
												<td><?php echo $res['branch_address'];?></td>
												<td><?php echo $res['bm_number'];?></td>
												<td><?php echo $res['branch_address'];?></td>
										
												<td align="center">
												
													<a data-toggle="modal" href="branch_edit.php?branch_id=<?php echo $res['branch_id'];?>"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> <?php echo constant('TI_EDIT_BUTTON');?></a>
                                          	        <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('branch_delete.php?branch_id=<?php echo $res['branch_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON');?> </a>
													<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_branch_profile('View_Branch',<?php echo $res['branch_id'];?>)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i> <?php echo constant('TI_EXAM_VIEW_BUTTON');?></a>

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
							  <label class="control-label"><?php echo constant('TI_LABEL_BRANCH_MANAGER_NAME');?></label>
                                  <div class="controls">
									<select name="bm_name" id="bm_name" class="chzn-select">
									<option value="">Select BM</option>  
										<?php $query_course=mysqli_query($con,"select * from teacher");
										while($result_course=mysqli_fetch_array($query_course))
										{
										?>
                                    	<option value="<?php echo $result_course['teacher_name'];?>"><?php echo ucfirst($result_course['teacher_name']);?></option>
										<?php }?>
                                    </select>
                                      <input type="hidden"  name="bm_no" id="bm_no"/>
                                </div>
                            </div>
						
                            
                            <div class="control-group">
                                <label class="control-label"><?php echo "Branch Name";?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="branch_name"/>
                                </div>
                            </div>
                            
							<div class="control-group">
                                <label class="control-label"><?php echo "Branch Address";?> </label>
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
                            <button type="submit" class="btn btn-gray"><?php echo "Add Branch";?></button>
							<input type="hidden" value="Add new branch" name="submit">
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

<script>      
    $('#bm_name').on('change', function(){
    var state = this.value;
	//alert(state);
    $.ajax({
	type: "POST",
	url: "bm_find.php",
	data:'state='+state,
	success: function(result){
		$("#bm_no").val(result);
		
		//alert(result);
		 //alert('please select another role' );
	}
	});
});
</script>

</html>