<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
?>
  
<script language="javascript" type="text/javascript">

function getXMLHTTP() { 
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getState(category_id) {		
		
		var strURL="subcategory_find.php?category_id="+category_id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('subcategorydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	function getsubject(category_id,subcategory_id) {		
		var strURL="subject_find.php?category_id="+category_id+"&subcategory_id="+subcategory_id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('subjectdiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}	
			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script> 
<?php
if (isset($_POST['submit'])) 
{ 
	$email = @mysql_real_escape_string($_POST['email']);
	$sql = "SELECT email FROM teacher WHERE email='$email'";
	$result = mysqli_query($con,$sql);

	if(mysqli_num_rows($result) >0)
	{
	   $message_success .=constant('TI_CENTER_ERROR_ALLREADY_EXIT') ;
	}
	else
	{	
		
        //	$subject_id= implode(",",$_POST['subject_id']);
        //	$category_id= mysql_prep($_POST['category_id']);
        
	    $subcategory_id= mysql_prep($_POST['s_c_id']);
     	$teacher_id=mysql_prep($_POST['teacher_id']);
		$teacher_name=mysql_prep($_POST['teacher_name']);
		$teacher_addr=mysql_prep($_POST['teacher_addr']);
		$phone_no=mysql_prep($_POST['phone_no']);
		$email=mysql_prep($_POST['email']);
		$username=mysql_prep($_POST['username']);
		$password_md5=encrypt($_POST['password']);
		$password=mysql_prep($_POST['password']);

		$query_add_center=mysqli_query($con,"insert into teacher (subject_id,teacher_name,teacher_addr,teacher_id,phone_no,email,username,password,password_md5) values('".$subject_id."','".$teacher_name."','".$teacher_addr."','".$teacher_id."','".$phone_no."','".$email."','".$username."','".$password."','".$password_md5."')");

		if($query_add_center)
		{
			$message_success .=constant('TI_BRANCH_MANAGER_ADD_MESSAGE');
		}
		else
		{
		$error .= constant('TI_BRANCH_MANAGER_MYSQL_ERROR');
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
                          <?php echo constant('TI_MANAGE_BRANCH_MANAGER');?> </h3>
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
								<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i><?php echo constant('TI_BRANCH_MANAGER_LIST');?></a>
							</li>
							<li>
								<a href="#add" data-toggle="tab"><i class="icon-plus"></i><?php echo constant('TI_BRANCH_MANAGER_ADD');?></a>
							</li>
						</ul>  
					</div>
					<div class="box-content padded">
						<div class="tab-content">        
							<div class="tab-pane box active" id="list">
								<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
									<thead>
										<tr>
											<th><div><?php echo "Sr No.";?></div></th>
											<th><div><?php echo "BM ID";?></div></th>
											<th><div><?php echo "BM Name";?></div></th>
											<th><div><?php echo "BM Address";?></div></th>
											<th><div><?php echo "Email";?></div></th>
											<th><div><?php echo "Mobile Number";?></div></th>
											<th><div><?php echo "Status";?></div></th>
											<th><div><?php echo "Options";?></div></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$query_center_setting=mysqli_query($con,"select * from teacher order by center_id");
											$i=0;
											while($res=mysqli_fetch_array($query_center_setting))
											{ 
												$i++;										
											?>
											<tr class="text-center">
											   <td><?php echo $i;?></td>
											   	<td><?php echo $res['center_id'];?></td>
												<td><?php echo @$res['teacher_name'];?></td>
												<td><?php echo $res['teacher_addr'];?></td>
												<td><?php echo $res['email'];?></td>
												<td><?php echo $res['phone_no'];?></td>
												
												<td><?php
														if($res['teacher_status']==1)
														{?>														

														<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('center_status.php?center_id=<?php echo $res['center_id'];?>')" class="btn btn-red btn-small"><i class="icon-eye-close"></i></a>
													<?php }
														else
														{?>														
															
														<a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('center_status.php?center_id=<?php echo $res['center_id'];?>')" class="btn btn-green btn-small"><i class="icon-eye-open"></i> </a>
													<?php }?>	
												</td>
												<td align="center">
													<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_center_profile('Center_profile',<?php echo $res['center_id'];?>)"class="btn btn-default btn-small"><i class="icon-user"></i></a>
													

													<a data-toggle="modal" href="center_edit.php?center_id=<?php echo $res['center_id'];?>"  class="btn btn-gray btn-small"><i class="icon-pencil"></i></a>

													<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('center_delete.php?center_id=<?php echo $res['center_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> </a>
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
                                <label class="control-label">Branch Name</label>
                                 <div class="controls" id="subcategorydiv">
									<select name="branch" class="chzn-select" >
									     <option selected="selected" value="">--select--</option>	
									  <?php 
								   $query_batch=mysqli_query($con,"select * from branch");
								   while($result_batch=mysqli_fetch_array($query_batch))
								   {?>
									<option value="<?php echo $result_batch['branch_name'];?>"><?php echo $result_batch['branch_name']; ?></option>

							<?php }
						    ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        
						<!--<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_COURSE_NAME');?></label>
                                 <div class="controls" id="subjectdiv">
							     <input type="text" class="validate[required]" name="course_name"/>   
                               </div>
                            </div>
                        </div>-->

						
						
						<div class="padded"> 
								<div class="control-group">
                                <label class="control-label"><?php echo "Manager ID";?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="teacher_id" />
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label"><?php echo "Branch Manager Name";?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="teacher_name"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo "Branch Manger Address";?> </label>
                                <div class="controls">                                    
									<div class="box closable-chat-box">									
									<div class="chat-message-box">
									<textarea name="teacher_addr" id="text_for_signature" rows="5" placeholder="Add Address"></textarea>									
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
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_CENTER_USER_NAME');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="username"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_CENTER_PASSWORD');?></label>
                                <div class="controls">
                                    <input type="password" class="validate[required]" name="password"/>
                                </div>
                            </div>
							
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo "Add Branch Manager";?></button>
							<input type="hidden" value="Add new Teacher" name="submit">
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
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CLOSE');?></button>
    </div>
</div>






<!-----------HIDDEN MODAL DELETE CONFIRMATION - COMMON IN ALL PAGES ------>
<div id="modal-delete" class="modal hide fade" style="height:140px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i> <?php echo constant('TI_DELETE_CONFIRMATION');?></h6>
	</div>
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_POPUP_DELETE_CENTER');?></div>
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
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_POPUP_DELETE_BRANCH_MANAGER');?></div>
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

function modal_view_center_profile(param1 ,param2 ,param3)
{
	document.getElementById('modal-body-question').innerHTML = 
		'<iframe id="frame1" src="center_view.php?center_id='+param2+'" width="100%" height="400" frameborder="0"></iframe>';
	document.getElementById('modal-tablesLabel_question').innerHTML = param1.replace("_"," ");
}

</script>

</html>