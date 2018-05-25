<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
?>

<script>
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
	
	/*function getState(category_id) {		
		
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
		var strURL="exam_find.php?category_id="+category_id+"&subcategory_id="+subcategory_id;
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
				
	}*/
	
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
		var strURL="examname_find.php?course_name="+course_name+"&batch_name="+batch_name;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('examdiv').innerHTML=req.responseText;						
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

<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i> <?php echo 'View Hall Tickets';?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> <?php echo 'View Hall Tickets';?> </a>
					</li>
				</ul>
			</div>
			<div class="box-content padded">
				<div class="tab-content">
					<div class="tab-pane box active" id="list">
					<br>
						<form action="hall_ticket.php" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top">
						    <div class="row">	
					    	
							<div class="padded">       
								<div class="control-group">
									<label class="control-label"><?php echo constant('TI_LABEL_COURSE_NAME');?></label>
									<div class="controls">
										<select name="category_id" class="chzn-select" onChange="getState(this.value)">
										<option>Select Course</option>  
											<?php $query_category=mysqli_query($con,"select * from subject where subject_status=1");
											while($result_category=mysqli_fetch_array($query_category))
											{
											?>
											<option value="<?php echo $result_category['s_id'];?>"><?php echo ucfirst($result_category['subject_name']);?></option>
											
											<?php }?>
													
										</select>
									</div>
								</div>
						
							</div>
							<!--<div class="padded">                   
								<div class="control-group">
									<label class="control-label"><?php echo constant('TI_LABEL_SUB_CATEGORY_NAME');?></label>
									 <div class="controls" id="subcategorydiv">
										<select name="subcategory_id" class="chzn-select">										
											<option><?php echo constant('TI_SELECT_CATEGORY_FIRST');?></option>
											
										</select>
									</div>
								</div>
							</div>-->
					  	
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Batch Name</label>
                                 <div class="controls" id="subcategorydiv" class="chzn-select">
									<select name="batch_name">										
                                    	<option value="">Select Batch</option>
										
                                    </select>
                                </div>
                            </div>
                        </div>
				    
				    	 
							<div class="padded">                   
								<div class="control-group">
									<label class="control-label"><?php echo constant('TI_LABEL_EXAM_NAME');?></label>
									 <div class="controls" id="examdiv">
										<select name="exam_id">										
											<option>Select Exam</option>
											
										</select>
									</div>
								</div>
							</div>
										
                           
							<div class="form-actions">
								<input type="hidden" name="operation" value="selection" />
                    			<input type="submit" value="<?php echo 'Search';?>" class="btn btn-normal btn-gray" />
							</div>
						
							
						</form> 
					 
					   </div>
					</div>
				</div>
			</div>
		</div>  
	</div>       
</div>






<div class="main-content">
<?php 

if($_POST['category_id']!="" )
{
	
?> 
             <div class="container-fluid padded">
                <div class="box">
					<?php include("message.php");?>
					<div class="box-header">
						<ul class="nav nav-tabs nav-tabs-left">
							<li class="active"><a href="#list" data-toggle="tab"><i class="icon-align-justify"></i><?php echo constant('TI_SEARCH_RESULT') ?></a></li>		
						</ul>
					</div>
					<div class="box-content padded">
						<div class="tab-content">           
							<div class="tab-pane box active" id="list">
								<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                					<thead>
                						<tr>					
											<th><div><?php echo constant('TI_TABLE_STUDENT_NAME');?></div></th>
											<th><div><?php echo constant('TI_TABLE_COURSE_NAME');?></div></th>  
											<th><div><?php echo constant('TI_TABLE_EXAM_NAME');?></div></th>  
											<th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
										</tr>
									</thead>
									<tbody>
									<?php 				
									$sql="select * from student s join exam e on e.subject_id=s.subject_id where s.subject_id='".$_POST['category_id']."' and e.batch_name='".$_POST['batch_name']."'";
										$query=mysqli_query($con,$sql);
										$i=0;
										while($row=mysqli_fetch_array($query))
										{ 				
											
											//$query_Center=mysqli_fetch_array(mysqli_query($con,"select * from center where c_id='".$row['center_id']."'"));

										    $sql1="select * from subject where s_id='".$row['subject_id']."'";

	                                        $query_category_name=mysqli_fetch_array(mysqli_query($con,$sql1));
											$query_exam=mysqli_fetch_array(mysqli_query($con,"select * from exam where subject_id='".$query_category_name['s_id']."' and e_id='".$_POST['e_id']."'"));
										?>
												<tr>		
												<td><?php echo ucfirst($row['student_name']);?> </td>
												
												<td><?php echo ucfirst($query_category_name['category_name']);?> </td>
												<td><?php echo ucfirst($query_exam['exam_name']);?> </td>
												<td align="center">												
												
													<a data-toggle="modal" target="_new" href="view_ticket.php?exam_id=<?php echo $query_exam['e_id'];?>&exam_dy=<?php echo $query_exam['exam_date'];?>&sid=<?php echo $row['student_id'];?>&caid=<?php echo $row['category_id'];?>" class="btn btn-gray btn-small"><i class="icon-wrench"></i> <?php echo 'View Hall Ticket'; ?></a>	
											</tr>
												
												
												
												</td>


											
											<?php	
										
										 } ?>                                
									</tbody>
							 </table>
					<center><a data-toggle="modal" target="_new" href="all_tickets.php?exam_id=<?php echo $query_exam['e_id'];?>&exam_dy=<?php echo $query_exam['exam_date'];?>&sid=<?php echo $row['student_id'];?>&caid=<?php echo $row['category_id'];?>" class="btn btn-gray btn-small"><i class="icon-wrench"></i> <?php echo 'View Hall Tickets'; ?></a></center>	

						</div>
       </div>
	</div>
</div>   
</div>    
<?php
}

?>


    <?php include("copyright.php");?>        
	</div>
	
	</div>




<div id="question-modal-form" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div id="modal-tablesLabel_question" style="color:#fff; font-size:16px;"></div>
	</div>
    <div class="modal-body" id="modal-body-question"><?php echo constant('TI_LOADING_DATA');?></div>
    <div class="modal-footer">      
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CLOSE');?></button>
    </div>
</div>


<div id="take_exam-modal-form" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div id="modal-tablesLabel_take_exam" style="color:#fff; font-size:16px;"></div>
	</div>
    <div class="modal-body" id="modal-body-take_exam"><?php echo constant('TI_LOADING_DATA');?></div>
    <div class="modal-footer">      
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CLOSE');?></button>
    </div>
</div>


<script>
function modal_view_take_exam(param1 ,param2 ,param3)
{
	document.getElementById('modal-body-take_exam').innerHTML = 
		'<iframe id="frame1" src="examinfo_popup.php?s_id='+param2+'" width="100%" height="100" frameborder="0"></iframe>';
	document.getElementById('modal-tablesLabel_take_exam').innerHTML = param1.replace("_"," ");
}
</script>


<script>
function modal_view_student_profile(param1 ,param2 ,param3)
{
	document.getElementById('modal-body-question').innerHTML = 
		'<iframe id="frame1" src="examinfo.php?s_id='+param2+'" width="100%" height="100" frameborder="0"></iframe>';
	document.getElementById('modal-tablesLabel_question').innerHTML = param1.replace("_"," ");
}
</script>
</body> 
</html>