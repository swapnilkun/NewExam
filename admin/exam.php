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



		$query_insert_exam = "INSERT INTO exam (subject_id,branch_name,batch_name,exam_name,exam_date,exam_time,exam_duration,neg_mark_status,negative_marks,passing_percentage,terms_condition,result_show_on_mail,show_question,sort_order,time_reduction)
		VALUES('{$sub_id}','{$branch_name}','{$batch_name}','{$exam_name}','{$exam_date}','{$exam_time}','{$exam_duration}','{$neg_mark_status}','{$negative_marks}','{$passing_percentage}','{$terms_condition}','{$result_show_on_mail}','{$show_question}','{$sort_order}','{$time_reduction}')";


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



?><div class="main-content">
                    <div class="container-fluid" >
            <div class="row-fluid">
                <div class="area-top clearfix">
                    <div class="pull-left header">
                        <h3 class="title">
                        <i class="icon-edit"></i>
                        <?php echo constant('TI_MANAGE_EXAM');?> </h3>
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
					<?php echo constant('TI_EXAM_LIST');?>                	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					<?php echo constant('TI_EXAM_ADD');?>              	</a></li>
		</ul>

        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
							<th><div>Branch Name</div></th> 
							<th><div><?php echo constant('TI_TABLE_COURSE_NAME') ?></div></th> 
							<th><div><?php echo constant('TI_TABLE_BATCH_NAME') ?></div></th> 
							<!--<th><div><?php echo constant('TI_TABLE_SUBJECT_NAME') ?></div></th>-->
							<th><div><?php echo constant('TI_TABLE_EXAM_NAME') ?></div></th>
							<th><div><?php echo constant('TI_TABLE_EXAM_DATE') ?></div></th>
							<th><div><?php echo constant('TI_TABLE_STATUS') ?></div></th> 
							<th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
						</tr>
					</thead>
                    <tbody>
							<?php 

								$query=mysqli_query($con,"select e.e_id,e.branch_name,s.subject_name,e.exam_date,e.exam_status,e.batch_name,e.exam_name from exam e left join subject s on s.s_id=e.subject_id");
								$i=0;
								while($row=mysqli_fetch_array($query))
								{ 
									$subject_id_explode=explode(",",$row['subject_id']);
									$count=count($subject_id_explode);
									for($i=0;$i<$count;$i++)
									{
										$query_subject_name=mysqli_fetch_array(mysqli_query($con,"select * from subject where s_id='".$subject_id_explode[$i]."'"));

										$subject_name .=$query_subject_name['subject_name'].', ';

										
									}
									
									//$query_category_name=mysqli_fetch_array(mysqli_query($con,"select * from category where c_id='".$row['category_id']."'"));
									//$query_subcategory_name=mysqli_fetch_array(mysqli_query($con,"select * from subcategory where s_c_id='".$row['subcategory_id']."'"));
									
                                       
									  // $exam_date= mysql_prep($row['exam_date']);

										/*if($exam_date!="")
										{
										$date_explode=explode("-",$exam_date);
										
										$date_month=$date_explode[1];
										$date_year=$date_explode[0];
										$date_day=$date_explode[2];
										$exam_date_format=$date_day.'-'.$date_month.'-'.$date_year;
										}*/
										
									$i++;
										
							?>
								<tr class="text-center">				
									<td><?php echo $row['branch_name'];?></td>
								<td><?php echo $row['subject_name'];?></td>
								<td><?php echo $row['batch_name'];?> </td>
								<!--<td><?php //echo substr($subject_name, 0 , -2);?> </td>-->
								<td><?php echo $row['exam_name'];?> </td>
								<td><?php echo $row['exam_date'];?> </td>
									
								<td><?php
									if($row['exam_status']==1)
									{?>

									<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('exam_status.php?e_id=<?php echo $row['e_id'];?>')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> <?php echo constant('TI_DEACTIVATE_BUTTON');?></a>
								<?php }
									else
									{?>
										
									<a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('exam_status.php?e_id=<?php echo $row['e_id'];?>')" class="btn btn-green btn-small"><i class="icon-eye-open"></i> <?php echo constant('TI_ACTIVATE_BUTTON');?></a>
								<?php }?>	
								 </td>

								<td align="center">
		                            <a data-toggle="modal" href="exam_edit.php?e_id=<?php echo $row['e_id'];?>" class="btn btn-gray btn-small"><i class="icon-wrench"></i> <?php echo constant('TI_EDIT');?></a>
							     	<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('exam_delete.php?e_id=<?php echo $row['e_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON');?> </a>
                            	</td>
                            	
								</tr>
						<?php $subject_name="";} ?>
                                
							</tbody>
                </table>
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
                                <label class="control-label"><?php echo constant('TI_LABEL_COURSE_NAME');?></label>
                                <div class="controls">
									<select name="course_name" class="chzn-select" onChange="getState(this.value)">
									<option value="">Select Course</option>  
										<?php $query_course=mysqli_query($con,"select b.course_name,s.subject_name from subject s join batch b on b.course_name=s.s_id where s.subject_status=1");
										while($result_course=mysqli_fetch_array($query_course))
										{
										?>
                                    	<option value="<?php echo $result_course['course_name'];?>"><?php echo ucfirst($result_course['subject_name']);?></option>
										
										<?php }?>
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
																		
                                    	<?php //echo constant('TI_SELECT_SUB_CATEGORY_FIRST');?>
                                   
                                </div>
                            </div>
                        </div>-->


						
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_EXAM_NAME');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="exam_name"/>
                                </div>
                            </div>
                        </div>

						
						<!--<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_EXAM_DATE_FROM');?></label>
                                <div class="controls">
                                    <input type="text" name="exam_date"  class="validate[required] datepicker"/>
                                </div>
                            </div>
                        </div>-->
                        
                        	<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_EXAM_DATE_FROM');?></label>
                                <div class="controls">
                                    <input type="date" name="exam_date"  class=""/>
                                </div>
                            </div>
                        </div>
                        

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_EXAM_TIME_DURATION');?></label>
                                <div class="controls">
                                   <input type="text"  name="exam_duration" class="validate[required,custom[integer]]" />
                                </div>
                            </div>
                        </div>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_PASSING_PERCENTAGE');?></label>
                                <div class="controls">
                                   <input type="text"  name="passing_percentage" class="validate[required,custom[integer]]" />
                                </div>
                            </div>
                        </div>
					<!--	<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_RE_EXAM_DAY');?></label>
                                <div class="controls">
                                   <input type="text"  name="re_exam_day" class="validate[custom[integer]]" maxlength="3"/><?php echo constant('TI_LABEL_RE_EXAM_DAY_NOTICE');?>
                                </div>
                            </div>
                        </div>-->
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_EXAM_NEGATIVE_MARKING');?></label>
                                <div class="controls">
                                <input type="checkbox" name="neg_mark_status"  value="1" onclick="showMe('div1', this)" />
								</div>
                            </div>
                        </div>
						
						<div  id="div1" style="display:none">
							<div class="padded">                   
								<div class="control-group">
									<label class="control-label"><?php echo constant('TI_NEGATIVE_MARKS');?></label>
									<div class="controls">
										<input type="text"  name="negative_marks" class="validate[required,custom[number]]" id="pr_departuretime_airlines"/>
									</div>
								</div>
							</div>
						</div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_EXAM_LATE_TIME_REDUCTION');?></label>
                                <div class="controls">
                                <input type="checkbox" name="time_reduction"  value="1" />
								</div>
                            </div>
                        </div>

						<div class="padded">   
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_TERMS_CONDITION');?></label>
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
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_EXAM_RESULT_MAIL');?></label>
                                <div class="controls">
                                <input type="checkbox" name="result_show_on_mail"  value="1" />
								</div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo constant('TI_CREATE_EXAM');?></button>
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