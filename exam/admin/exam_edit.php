<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
if(isset($_POST['submit']) && $_POST['e_id']!="" && $_POST['center_id']!="")
{	
	
	$subject_id= implode(",",$_POST['subject_id']);
	$show_question= implode(",",$_POST['show_question']);
	//$sort_order= implode(",",$_POST['subject_sort_order']);
	
	


	//$category_id= mysql_prep($_POST['category_id']);
//	$subcategory_id= mysql_prep($_POST['s_c_id']);
    $branch_name=mysql_prep($_POST['branch_name']);
    $sub_id= mysql_prep($_POST['course_name']);
	$batch_name= mysql_prep($_POST['batch_name']);
	$exam_name= mysql_prep($_POST['exam_name']);
	$exam_date= mysql_prep($_POST['exam_date']);	
	//$exam_time= mysql_prep($_POST['exam_time']);
	$exam_duration= mysql_prep($_POST['exam_duration']);
	$neg_mark_status= mysql_prep($_POST['neg_mark_status']);
	$negative_marks= mysql_prep($_POST['negative_marks']);	
	$time_reduction= mysql_prep($_POST['time_reduction']);	

		
	/*$subject_id= mysql_prep($_POST['s_id']);*/

	$passing_percentage= mysql_prep($_POST['passing_percentage']);
	//$re_exam_day= mysql_prep($_POST['re_exam_day']);
	$terms_condition= mysql_prep($_POST['terms_condition']);
	$result_show_on_mail= mysql_prep($_POST['result_show_on_mail']);
	
	$query_select_exam=mysqli_query($con,"SELECT * FROM exam where exam_name='".$exam_name."'");
	if(mysqli_num_rows($query_select_exam)>0)
	{
		//$error .= constant('TI_EXAM_ERROR_ALLREADY_EXIT') ;
	/*	 $exam_date= mysql_prep($_POST['exam_date']);
		if($exam_date!="")
		{
		$dobexplode=explode("/",$exam_date);
		$dob_day=$dobexplode[1];
		$dob_month=$dobexplode[0];
		$dob_year=$dobexplode[2];
		$exam_date_from=$dob_year.'-'.$dob_month.'-'.$dob_day;
		}*/
			 
		$query_insert_exam = "update exam set subject_id='{$sub_id}',branch_name='{$branch_name}',batch_name='{$batch_name}', exam_date='{$exam_date}', exam_duration='{$exam_duration}',neg_mark_status='{$neg_mark_status}',negative_marks='{$negative_marks}',passing_percentage='{$passing_percentage}',terms_condition='{$terms_condition}',result_show_on_mail='{$result_show_on_mail}',show_question='{$show_question}',sort_order='{$sort_order}',time_reduction='{$time_reduction}' where e_id='".$_POST['e_id']."' and center_id='".$_POST['center_id']."'";
		$result_exam=mysqli_query($con,$query_insert_exam);
		if($result_exam)
		{
			$message_success .=constant('TI_EXAM_EDIT_SUCCESS_MESSAGE') ;;
		}
		else
		{
			$error .= constant('TI_EXAM_MYSQL_ERROR') ;
		}



		
	}
	else
	{
	   /* $exam_date= mysql_prep($_POST['exam_date']);
		if($exam_date!="")
		{
		$dobexplode=explode("/",$exam_date);
		$dob_day=$dobexplode[1];
		$dob_month=$dobexplode[0];
		$dob_year=$dobexplode[2];
		$exam_date_from=$dob_year.'-'.$dob_month.'-'.$dob_day;
		}*/
		
		$query_insert_exam = "update exam set subject_id='{$subject_id}',branch_name='{$branch_name}',atch_name='{$batch_name}', exam_name='{$exam_name}', exam_date='{$exam_date}',  exam_duration='{$exam_duration}',neg_mark_status='{$neg_mark_status}',negative_marks='{$negative_marks}',passing_percentage='{$passing_percentage}',terms_condition='{$terms_condition}',result_show_on_mail='{$result_show_on_mail}',show_question='{$show_question}',sort_order='{$sort_order}',time_reduction='{$time_reduction}' where e_id='".$_POST['e_id']."' center_id='".$_POST['center_id']."' ";
		$result_exam=mysqli_query($con,$query_insert_exam);
		if($result_exam)
		{
			$message_success .=constant('TI_EXAM_EDIT_SUCCESS_MESSAGE') ;;
		}
		else
		{
			$error .= constant('TI_EXAM_MYSQL_ERROR') ;
		}
	}	
	
}
if($_GET['e_id']!="")
{
	$e_id=$_GET['e_id'];
	$query=mysqli_query($con,"SELECT * FROM exam where e_id='".$e_id."'");
	$result=mysqli_fetch_array($query);
/*	if($result['exam_date']!="")
	{
		$exam_date_explode=explode("-",$result['exam_date']);		
		$exam_date=$exam_date_explode[1]."/".$exam_date_explode[2]."/".$exam_date_explode[0];
	}*/
}
if($_GET['center_id']!="")
{
	$center_id=$_GET['center_id'];
	$query=mysqli_query($con,"select * from exam where center_id='".$center_id."'");
	$result=mysqli_fetch_array($query);
}
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

<script type="text/javascript"> 
	<!-- 
	function showMe_check (it, box) { 
	  var vis = (box.checked) ? "block" : "none"; 
	  document.getElementById(it).style.display = vis;
	} 
	//--> 
</script>

<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i><?php echo constant('TI_MANAGE_EXAM');?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-wrench"></i><?php echo constant('TI_EXAM_EDIT');?></a>
					</li>
				</ul>	
			</div>
			<div class="box-content padded">
				<div class="tab-content">        
					<?php include("message.php");?>
					<div class="tab-pane active" id="add" style="padding: 5px">
						<form method="post" action="<?php $PHP_SELF ?>" class="form-horizontal validatable" enctype="multipart/form-data">
						
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
                                    	<!--<option value="<?php echo $result_course['branch_name'];?>"><?php echo ucfirst($result_course['branch_name']);?></option>-->
                                    		 <option value="<?php echo $result_course['branch_name']; ?>" <?php if($result_course['branch_name'] == $result['branch_name']) { echo "selected=selected"; }?>> <?php echo $result_course['branch_name']; ?></option>
							
										
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
										<?php $query_course=mysqli_query($con,"select *  from subject");
										while($result_course=mysqli_fetch_array($query_course))
										{
										?>
                                  		<option value="<?php echo $result_course['s_id'];?>" <?php if($result_course['s_id']==$result['subject_id']){echo 'selected="selected"';}?>><?php echo ucfirst($result_course['subject_name']);?></option>
									
										
										<?php }?>
                                    </select>
                                </div>
                            </div>
						</div>
						
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Batch Name</label>
                                 <div class="controls" id="subcategorydiv">
									<select name="batch_name" >										
                                    	<option>Select Batch</option>
                                    		<?php $query_course=mysqli_query($con,"select * from batch");
										while($result_course=mysqli_fetch_array($query_course))
										{
										?>
                                  		<option value="<?php echo $result_course['batch_name'];?>" <?php if($result_course['batch_name']==$result['batch_name']){echo 'selected="selected"';}?>><?php echo ucfirst($result_course['batch_name']);?></option>
									
										
										<?php }?>
										
                                    </select>
                                </div>
                            </div>
                        </div>
                       
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_EXAM_NAME');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="exam_name" value="<?php echo $result['exam_name'];?>"/>
                                </div>
                            </div>
                        </div>

						
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_EXAM_DATE_FROM');?></label>
                                <div class="controls">
                                    <input type="date" name="exam_date"  value="<?php echo $result['exam_date'];?>"/>
                                </div>
                            </div>
                        </div>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_EXAM_TIME_DURATION');?></label>
                                <div class="controls">
                                   <input type="text"  name="exam_duration" class="validate[required,custom[integer]]" value="<?php echo $result['exam_duration'];?>"/>
                                </div>
                            </div>
                        </div>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_PASSING_PERCENTAGE');?></label>
                                <div class="controls">
                                   <input type="text"  name="passing_percentage" class="validate[required,custom[integer]]" value="<?php echo $result['passing_percentage'];?>"/>
                                </div>
                            </div>
                        </div>
						<!--<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_RE_EXAM_DAY');?></label>
                                <div class="controls">
                                   <input type="text"  name="re_exam_day" class="validate[custom[integer]]" maxlength="3" value="<?php echo $result['re_exam_day'];?>"><?php echo constant('TI_LABEL_RE_EXAM_DAY_NOTICE');?>
                                </div>
                            </div>
                        </div>-->
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_EXAM_NEGATIVE_MARKING');?></label>
                                <div class="controls">
                                <input type="checkbox" name="neg_mark_status"  value="1" onclick="showMe('div1', this)" <?php if($result['neg_mark_status']==1){echo 'checked="checked"';}?>/>
								</div>
                            </div>
                        </div>
						<div  id="div1">
							<div class="padded">                   
								<div class="control-group">
									<label class="control-label"><?php echo constant('TI_NEGATIVE_MARKS');?></label>
									<div class="controls">
										<input type="text"  name="negative_marks" class="validate[required,custom[number]]" id="pr_departuretime_airlines" value="<?php echo $result['negative_marks'];?>"/>
									</div>
								</div>
							</div>
						</div>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_EXAM_LATE_TIME_REDUCTION');?></label>
                                <div class="controls">
                                <input type="checkbox" name="time_reduction"  value="1" <?php if($result['time_reduction']==1){echo 'checked="checked"';}?>/>
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
												<textarea name="terms_condition" id="terms_condition" rows="5" placeholder="Terms & Condition"><?php echo $result['terms_condition'];?></textarea>
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
                                <input type="checkbox" name="result_show_on_mail"  value="1" <?php if($result['result_show_on_mail']==1){echo 'checked="checked"';}?>/>
								</div>
                            </div>
                        </div>
						
							<div class="form-actions">
								<button type="submit" class="btn btn-gray"><?php echo constant('TI_EXAM_EDIT_BUTTON');?></button>
								<input type="hidden" value="Edit_exam" name="submit">
								<input type="hidden" value="<?php echo $result['e_id'];?>" name="e_id">
								<input type="hidden" value="<?php echo $result['center_id'];?>" name="center_id">

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
<script type='text/javascript' src='../js/jquery/jquery-ui-1.10.3.custom.min.js'></script>
<script type='text/javascript' src='../js/timepicker/jquery-ui-timepicker-addon.js'></script>    
<script type='text/javascript' src='../js/plugins.js'></script>    
</body>
</html>