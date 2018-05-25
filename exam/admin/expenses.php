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
	
	    $branch_name=mysql_prep($_POST['branch_name']);
		$purpose=mysql_prep($_POST['purpose']);
		$amount=mysql_prep($_POST['amount']);
		$date=mysql_prep($_POST['date']);
    	$date1 = date('Y-m-d',strtotime($date));
		$desc=mysql_prep($_POST['desc']);
	
       $query_insert = "INSERT INTO expenses (branch_name,purpose,amount,date,description) VALUES ('{$branch_name}','{$purpose}','{$amount}','{$date1}','{$desc}')";
	
       $query_mysql_expenses=mysqli_query($con,$query_insert);
       
		if($query_mysql_expenses)
		{
			$message_success .=constant('TI_EXPENSES_ADD_MESSAGE');
		}
		else
		{
		$error .= constant('TI_EXPENSES_MYSQL_ERROR');
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
                          <?php echo constant('TI_MANAGE_EXPENSES');?> </h3>
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
								<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i><?php echo constant('TI_EXPENSES_LIST');?></a>
							</li>
							<li>
								<a href="#add" data-toggle="tab"><i class="icon-plus"></i><?php echo constant('TI_EXPENSES_ADD');?></a>
							</li>
						</ul>  
					</div>
					<div class="box-content padded">
					<div class="tab-content"> 
				
					<div class="tab-pane box active" id="list">
					  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
						<div class="padded">       
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
						</div>
					   
				    	<div class="padded">       
							<div class="control-group">
							   <label class="control-label">filter</label>
                                <div class="controls">
									<select name="status" class="chzn-select" id="basis">
									<option value="">Select...</option>  
									<option value="Yearly">Yearly</option>  
									<option value="Monthly">Monthly</option>  
									<option value="Weekly">Weekly</option>  
								 </select>
                                </div>
                            </div>
					    </div>
					    
					    	<div class="padded" id="year" style="display:none;">       
							<div class="control-group">
							   <label class="control-label">Yearly</label>
							   
                                <div class="controls">
                                     <input name="year" class="date-own form-control" id="year" type="text" placeholder="yearly">
							<script type="text/javascript">

								$('.date-own').datepicker({
								   minViewMode: 2,
								   format: 'yyyy'
								 });
							</script>
								
                                </div>
                            </div>
					    </div>
					    
					    <div class="padded"  id="month" style="display:none;">       
							<div class="control-group">
							   <div class="controls">
    							<div class="form-group">
                                <label>Monthly:</label>
                                <input type="text" class="form-control form-control-1 input-sm from" name="month" placeholder="Monthly" >
                                <script>
                               // var startDate = new Date();
                                  
                                    $('.from').datepicker({
                                        autoclose: true,
                                        minViewMode: 1,
                                        format: 'yyyy-m'
                                    }).on('changeDate', function(selected){
                                            startDate = new Date(selected.date.valueOf());
                                            startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
                                            //$('.to').datepicker('setStartDate', startDate);
                                        });
                                </script>        
                               </div>
                            </div>
					    </div>
					    </div> 
					    
					     <div class="form-actions">
							
                    			<input type="submit" value="Search Expenses" name='search' class="btn btn-normal btn-gray">
							</div>
						    
					   </form>
					   <br>
<?php 

	if(isset($_POST['search'])){
	
	$weekly=$_POST['status'];
	$branch_name=$_POST['branch_name'];
	//$date=$_POST['date'];
	$date=date('Y-m-d');
	$year=$_POST['year'];
	$month=$_POST['month'];
    $week = date( 'Y-m-d', strtotime( $date. ' - 7 days' ));

?>							   <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
									<thead>
										<tr>
										
										    <th><div><?php echo "Branch Name";?></div></th>
											<th><div><?php echo "Purpose";?></div></th>
											<th><div><?php echo "Amount";?></div></th>
											<th><div><?php echo "Date";?></div></th>
											<th><div><?php echo "Description";?></div></th>
											<th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
										</tr>
									</thead>
									<tbody>
									
										     <?php
									 
										  if($year){
											
									    $sql = "SELECT * from expenses WHERE branch_name='".$branch_name."' and date BETWEEN '".$year."-01-01' and '".$year."-12-31'";
									    $query1 = mysqli_query($con,$sql);
										 } elseif($month){
									
										   $query1 = mysqli_query($con, "SELECT * from expenses WHERE branch_name='".$branch_name."' and date BETWEEN '".$month."-01' and '".$month."-31'");
									   
										} elseif($week){
									
										   $query1 = mysqli_query($con, "SELECT * from expenses WHERE branch_name='".$branch_name."' and date BETWEEN '.$date.' and '$week'");
									   
										}
										else{
										   
										    $query1 = mysqli_query($con,"select * from expenses");
										  }
								           
											$i=0;
											while($res=mysqli_fetch_array($query1))
											{ 
												$i++;										
											?>
											<tr class="text-center">
											    
											    <td><?php echo $res['branch_name'];?></td>
												<td><?php echo $res['purpose'];?></td>
												
												<td><?php echo $res['amount'];?></td>
												
												<td><?php echo $res['date'];?></td>
												<td><?php echo $res['description'];?></td>
											<!--<td><?php
														if($res['expenses_status']==1)
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
													

													<a data-toggle="modal" href="expenses_edit.php?id=<?php echo $res['id'];?>"  class="btn btn-gray btn-small"><i class="icon-wrench"></i> <?php echo constant('TI_EDIT_BUTTON');?></a>

													<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('expenses_delete.php?id=<?php echo $res['id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON');?> </a>
									         </td>
											</tr>
											<?php } ?>                                
										</tbody>
									</table>
										<?php } ?>  
								</div>
          
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<form action="<?php $PHP_SELF ?>" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top">	
				    	<div class="padded">       
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
						</div>
				    
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Purpose</label>
                                <div class="controls">
                                 	<div class="box closable-chat-box">									
									<div class="chat-message-box">
									<textarea name="purpose" class="validate[required]" id="text_for_signature" rows="3" placeholder="Purpose"></textarea>
									</div>
								</div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="padded">  
							<div class="control-group">
                                <label class="control-label">Amount</label>
                                <div class="controls">                                    
								
								    <input type="text" class="validate[required]" name="amount" />										
									</div>
								
                                </div>
                           </div>
                           
                           <div class="padded"> 
							 <div class="control-group">
                                <label class="control-label">Date</label>
                                <div class="controls">
                                    <input type="date" name="date" />
                                </div>
                            </div>
                            </div>
							
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                 	<div class="box closable-chat-box">									
									<div class="chat-message-box">
									<textarea name="desc" class="validate[required]" id="text_for_signature" rows="3" placeholder="Description"></textarea>
									</div>
								</div>
                                </div>
                            </div>
                        </div>
						
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo "Add expenses";?></button>
							<input type="hidden" value="Add new expenses" name="submit">
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
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_POPUP_EXPENSES_DELETE');?></div>
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
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_POPUP_EXPENSES_DELETE');?></div>
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


function modal_view_staff_profile(param1 ,param2 ,param3)
{
	document.getElementById('modal-body-question').innerHTML = 
		'<iframe id="frame1" src="viewstaff.php?staff_id='+param2+'" width="100%" height="400" frameborder="0"></iframe>';
	document.getElementById('modal-tablesLabel_question').innerHTML = param1.replace("_"," ");
}

</script>
<script>
$("#basis").on('change', function(){

	var basis = $('#basis').val();
		if ( basis == "Yearly")
		  {  
			$("#year").show();
			$("#month").hide();
		  } else if ( basis == "Monthly" )
		  {
			$("#year").hide();
			$("#month").show();

		  } else if (basis == ''){
			 $("#year").hide();
			 $("#month").hide(); 
		  } else {
			 $("#year").hide();
			 $("#month").hide(); 
		  }
	
	}); 

</script>

</html>