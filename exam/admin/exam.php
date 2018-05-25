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
	
	function getState(course_name) {		
		
		var strURL="batchwise_find.php?course_name="+course_name;
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
	function getsubject(course_name,batch_name) {		
		var strURL="batch_find.php?course_name="+course_name+"&batch_name="+batch_name;
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
<script type="text/javascript"> 
	<!-- 
	function showMe (it, box) { 
	  var vis = (box.checked) ? "block" : "none"; 
	  document.getElementById(it).style.display = vis;
	} 
	//--> 
</script>

<?php

if (isset($_POST['submit'])) 
{ 
	$subject_id= implode(",",$_POST['subject_id']);
	$show_question= implode(",",$_POST['show_question']);
	//$sort_order= implode(",",$_POST['subject_sort_order']);



    $branch_name=mysql_prep($_POST['branch_name']);
	//print_R($_POST);exit;
	//$category_id= mysql_prep($_POST['category_id']);
	//$subcategory_id= mysql_prep($_POST['s_c_id']);
	$sub_id= mysql_prep($_POST['course_name']);
	$batch_name= mysql_prep($_POST['batch_name']);
	$exam_name= mysql_prep($_POST['exam_name']);
    $exam_date= mysql_prep($_POST['exam_date']);
	$exam_time= mysql_prep($_POST['exam_time']);
	$exam_duration= mysql_prep($_POST['exam_duration']);
	$neg_mark_status= mysql_prep($_POST['neg_mark_status']);
	$negative_marks= mysql_prep($_POST['negative_marks']);
	$time_reduction= mysql_prep($_POST['time_reduction']);

	

	$passing_percentage= mysql_prep($_POST['passing_percentage']);
//	$re_exam_day= mysql_prep($_POST['re_exam_day']);
	$terms_condition= mysql_prep($_POST['terms_condition']);
	$result_show_on_mail= mysql_prep($_POST['result_show_on_mail']);

	
	
	$query_select_exam=mysqli_query($con,"SELECT * FROM exam where exam_name='".$exam_name."'");



	if(mysqli_num_rows($query_select_exam)>0)
	{
		$error .= constant('TI_EXAM_ERROR_ALLREADY_EXIT') ;
	}
	else
	{
	    //$exam_date= mysql_prep($_POST['exam_date']);

	/*	if($exam_date!="")
		{
		$dobexplode=explode("/",$exam_date);
		$dob_day=$dobexplode[1];
		$dob_month=$dobexplode[0];
		$dob_year=$dobexplode[2];
		$exam_date_from=$dob_year.'-'.$dob_month.'-'.$dob_day;
		}*/



		$query_insert_exam = "INSERT INTO exam (subject_id,branch_name,batch_name,exam_name,exam_date,exam_time,exam_duration,neg_mark_status,negative_marks,passing_percentage,terms_condition,result_show_on_mail,show_question,sort_order,time_reduction) VALUES('{$sub_id}','{$branch_name}','{$batch_name}','{$exam_name}','{$exam_date}','{$exam_time}','{$exam_duration}','{$neg_mark_status}','{$negative_marks}','{$passing_percentage}','{$terms_condition}','{$result_show_on_mail}','{$show_question}','{$sort_order}','{$time_reduction}')";


		$result_exam=mysqli_query($con,$query_insert_exam);
		if($result_exam)
		{
			$message_success .=constant('TI_EXAM_SUCCESS_MESSAGE') ;;
		}
		else
		{
			$error .= constant('TI_EXAM_MYSQL_ERROR') ;
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
                        Manage Exam </h3>
                    </div>

                </div>
            </div>
        </div>
        
         <div class="container-fluid padded">
            <div class="box">
			            <div class="box-header">
    
  
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					Exam List                	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					Add Exam              	</a></li>
		</ul>

        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                		   	<th><div>Sr. No</div></th> 
                		    <th><div>Exam ID</div></th> 
							<th><div>Branch Name</div></th> 
							<th><div>Course Name</div></th> 
							<th><div>Batch Name</div></th> 
							<!--<th><div></div></th>-->
							<th><div>Exam Name</div></th>
							<th><div>Exam Date</div></th>
							<th><div>Status</div></th> 
							<th><div>Options</div></th>
						</tr>
					</thead>
                    <tbody>
															<tr class="text-center">
								    <td>1</td>
								    <td>49</td>
									<td>Kolhapur</td>
								<td>DCCO</td>
								<td>Third Batch </td>
								<!--<td> </td>-->
								<td>Ms-office </td>
								<td>2018-04-21 </td>
									
								<td>
									<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('exam_status.php?e_id=49')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
									
								 </td>

								<td align="center">
		                            <a data-toggle="modal" href="exam_edit.php?e_id=49" class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>
							     	<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('exam_delete.php?e_id=49')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>
                            	</td>
                            	
								</tr>
														<tr class="text-center">
								    <td>1</td>
								    <td>50</td>
									<td>Kolhapur</td>
								<td>DCCO</td>
								<td>01 </td>
								<!--<td> </td>-->
								<td>mid test </td>
								<td>2018-04-26 </td>
									
								<td>
									<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('exam_status.php?e_id=50')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
									
								 </td>

								<td align="center">
		                            <a data-toggle="modal" href="exam_edit.php?e_id=50" class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>
							     	<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('exam_delete.php?e_id=50')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>
                            	</td>
                            	
								</tr>
														<tr class="text-center">
								    <td>1</td>
								    <td>51</td>
									<td>Satara</td>
								<td>DCCO</td>
								<td>01 </td>
								<!--<td> </td>-->
								<td>MS_OFFICE </td>
								<td>2018-04-26 </td>
									
								<td>
									<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('exam_status.php?e_id=51')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
									
								 </td>

								<td align="center">
		                            <a data-toggle="modal" href="exam_edit.php?e_id=51" class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>
							     	<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('exam_delete.php?e_id=51')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>
                            	</td>
                            	
								</tr>
														<tr class="text-center">
								    <td>1</td>
								    <td>52</td>
									<td>Satara</td>
								<td>Adavance Tally</td>
								<td>02 </td>
								<!--<td> </td>-->
								<td>Advance Tally </td>
								<td>2018-04-26 </td>
									
								<td>
									<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('exam_status.php?e_id=52')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
									
								 </td>

								<td align="center">
		                            <a data-toggle="modal" href="exam_edit.php?e_id=52" class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>
							     	<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('exam_delete.php?e_id=52')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>
                            	</td>
                            	
								</tr>
														<tr class="text-center">
								    <td>1</td>
								    <td>53</td>
									<td>Pune</td>
								<td>DCCO</td>
								<td>02 </td>
								<!--<td> </td>-->
								<td>Test </td>
								<td>2018-04-26 </td>
									
								<td>
									<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('exam_status.php?e_id=53')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
									
								 </td>

								<td align="center">
		                            <a data-toggle="modal" href="exam_edit.php?e_id=53" class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>
							     	<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('exam_delete.php?e_id=53')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>
                            	</td>
                            	
								</tr>
														<tr class="text-center">
								    <td>1</td>
								    <td>54</td>
									<td>Kolhapur</td>
								<td>DCCO</td>
								<td>02 </td>
								<!--<td> </td>-->
								<td>DCCO Test </td>
								<td>2018-04-26 </td>
									
								<td>
									<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('exam_status.php?e_id=54')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
									
								 </td>

								<td align="center">
		                            <a data-toggle="modal" href="exam_edit.php?e_id=54" class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>
							     	<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('exam_delete.php?e_id=54')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>
                            	</td>
                            	
								</tr>
						                                
							</tbody>
                </table>
			</div>
  
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<form action="" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top">
					
						<div class="padded">       
							<div class="control-group">
							  <label class="control-label">Branch Name</label>
                                  <div class="controls">
									<select name="branch_name" class="chzn-select">
									<option value="">Select Branch</option>  
										                                    	<option value="Pune">Pune</option>
										                                    	<option value="Satara">Satara</option>
										                                    	<option value="Kolhapur">Kolhapur</option>
										                                    	<option value="Shiv Institute Of Computer Edu">Shiv Institute Of Computer Edu</option>
										                                    	<option value="kkjk">Kkjk</option>
										                                    </select>
                                </div>
                            </div>
						</div>
						
						<div class="padded">       
							<div class="control-group">
                                <label class="control-label">Course Name</label>
                                <div class="controls">
									<select name="course_name" class="chzn-select" onChange="getState(this.value)">
									<option value="">Select Course</option>  
										                                    	<option value="59">DCCO</option>
										
										                                    	<option value="60">Adavance Tally</option>
										
										                                    </select>
                                </div>
                            </div>
						</div>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Batch Name</label>
                                 <div class="controls" id="subcategorydiv">
									<select name="batch_name">										
                                    	<option value="">Select Batch</option>
										
                                    </select>
                                </div>
                            </div>
                        </div>
                        
						<!--<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Course List</label>
                                 <div class="controls" id="subjectdiv">
																		
                                    	                                   
                                </div>
                            </div>
                        </div>-->


						
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Exam Name</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="exam_name"/>
                                </div>
                            </div>
                        </div>

						
						<!--<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Exam Date</label>
                                <div class="controls">
                                    <input type="text" name="exam_date"  class="validate[required] datepicker"/>
                                </div>
                            </div>
                        </div>-->
                        
                        	<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Exam Date</label>
                                <div class="controls">
                                    <input type="date" name="exam_date"  class=""/>
                                </div>
                            </div>
                        </div>
                        

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Exam Duration(In Minute)</label>
                                <div class="controls">
                                   <input type="text"  name="exam_duration" class="validate[required,custom[integer]]" />
                                </div>
                            </div>
                        </div>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Passing Percentage(In %)</label>
                                <div class="controls">
                                   <input type="text"  name="passing_percentage" class="validate[required,custom[integer]]" />
                                </div>
                            </div>
                        </div>
					<!--	<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">RE Exam Day</label>
                                <div class="controls">
                                   <input type="text"  name="re_exam_day" class="validate[custom[integer]]" maxlength="3"/>                                </div>
                            </div>
                        </div>-->
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Negative Marking</label>
                                <div class="controls">
                                <input type="checkbox" name="neg_mark_status"  value="1" onclick="showMe('div1', this)" />
								</div>
                            </div>
                        </div>
						
						<div  id="div1" style="display:none">
							<div class="padded">                   
								<div class="control-group">
									<label class="control-label">Negative Marks</label>
									<div class="controls">
										<input type="text"  name="negative_marks" class="validate[required,custom[number]]" id="pr_departuretime_airlines"/>
									</div>
								</div>
							</div>
						</div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Time reduction Allow if late login</label>
                                <div class="controls">
                                <input type="checkbox" name="time_reduction"  value="1" />
								</div>
                            </div>
                        </div>

						<div class="padded">   
							<div class="control-group">
                                <label class="control-label">Terms & Condition</label>
                                <div class="controls">
                                    <div class="box closable-chat-box">
                                        <div class="box-content">
											<div class="chat-message-box">
												<textarea name="terms_condition" id="terms_condition" rows="5" placeholder="Terms & Condition"></textarea>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
						<!--<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"> Result on Mail</label>
                                <div class="controls">
                                <input type="checkbox" name="result_show_on_mail"  value="1" />
								</div>
                            </div>
                        </div>-->
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Add Exam</button>
							<input type="hidden" value="Add new exam" name="submit">
                        </div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
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
</div>          
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


<!-----------HIDDEN QUESTION MODAL FORM - COMMON IN ALL PAGES ------>
<div id="question-modal-form" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div id="modal-tablesLabel_question" style="color:#fff; font-size:16px;">&nbsp; </div>
	</div>
    <div class="modal-body" id="modal-body-question"><?php echo constant('TI_LOADING_DATA');?></div>
    <div class="modal-footer">
     
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CLOSE');?></button>
    </div>
</div>






<!-----------HIDDEN MODAL DELETE CONFIRMATION - COMMON IN ALL PAGES ------>
<div id="modal-delete" class="modal hide fade" style="height:140px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h6 id="modal-tablesLabel"> <i class="icon-trash"></i>&nbsp; <?php echo constant('TI_DELETE_CONFIRMATION');?></h6>
	</div>
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_POPUP_EXAM_DELETE');?></div>
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
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_STATUS_DATA_ACTIVE');?></div>
    <div class="modal-footer">
    	<a href="exam_status.php?e_id=<?php echo $row['e_id'];?>" id="active_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
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
    	<a href="exam_status.php?e_id=<?php echo $row['e_id'];?>" id="deactive_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL_BUTTON');?></button>
    </div>
</div>






<script>
function modal_questions_paper(param1 ,param2 ,param3)
{
	document.getElementById('modal-body-question').innerHTML = 
		'<iframe id="frame1" src="question_add.php?e_id='+param2+'&g_id='+param3+'" width="100%" height="400" frameborder="0"></iframe>';
	document.getElementById('modal-tablesLabel_question').innerHTML = param1.replace("_"," ");
}

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

function modal_view_question_profile(param1 ,param2 ,param3)
{
	document.getElementById('modal-body-question').innerHTML = 
		'<iframe id="frame1" src="viewquestion.php?q_id='+param2+'" width="100%" height="400" frameborder="0"></iframe>';
	document.getElementById('modal-tablesLabel_question').innerHTML = param1.replace("_"," ");
}

</script>
 <script type='text/javascript' src='../js/jquery/jquery-ui-1.10.3.custom.min.js'></script>
<script type='text/javascript' src='../js/timepicker/jquery-ui-timepicker-addon.js'></script>    
<script type='text/javascript' src='../js/plugins.js'></script>  
</html>