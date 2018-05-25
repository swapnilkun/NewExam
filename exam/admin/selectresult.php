<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
?>

	
<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i> View Result </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> View Result </a>
					</li>
				</ul>
			</div>
			<div class="box-content padded">
				<div class="tab-content">
					<div class="tab-pane box active" id="list">
					<br>
						<form action="" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top">							
						
						<div class="padded">       
								<div class="control-group">
									<label class="control-label">Branch Name</label>
									<div class="controls">
										<select name="branch_name" class="chzn-select" onChange="getBranch(this.value)">
										<option value="">Select Branch</option>  
																						<option value="1">Pune</option>
											
																						<option value="2">Satara</option>
											
																						<option value="3">Kolhapur</option>
											
																						<option value="7">Shiv Institute Of Computer Edu</option>
											
																						<option value="8">Kkjk</option>
											
																								
										</select>
									</div>
								</div>
						
							</div>
							
								<!--<div class="padded">       
								<div class="control-group">
									<label class="control-label">Course Name</label>
									<div class="controls">
										<select name="course_name" class="chzn-select" onChange="getState(this.value)">
										<option value="">Select Course</option>  
																						<option value="59">DCCO</option>
											
																						<option value="60">Adavance Tally</option>
											
																						<option value="61">MS-Office</option>
											
																						<option value="62">Php</option>
											
																						<option value="63">Erterfddf</option>
											
																								
										</select>
									</div>
								</div>
						
							</div>-->
						
					  	<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Course Name</label>
                                 <div class="controls" id="coursediv" class="chzn-select">
									<select name="course_name">										
                                    	<option value="">Select Course</option>
										
                                    </select>
                                </div>
                            </div>
                        </div>
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
									<label class="control-label">Exam Name</label>
									 <div class="controls" id="examdiv">
										<select name="exam_id">										
											<option>Select Exam</option>
											
										</select>
									</div>
								</div>
							</div>
                        
                        <!--<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Date</label>
                                 <div class="controls">
								<input name="date" class="validate[required,custom[dateFormat]] datepicker" id="date" type="text">
                                </div>
                            </div>
                        </div>-->
                        
						

							<div class="form-actions">
								<input type="hidden" name="operation" value="selection" />
                    			<input type="submit" value="Search Student" class="btn btn-normal btn-gray" />
							</div>
						</form> 
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
											<th><div><?php echo constant('TI_TABLE_CATEGORY_NAME');?></div></th>  						
											<th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
									   </tr>
									</thead>
									<tbody>
									<?php 				
										$query=mysqli_query($con,"select * from student where category_id='".$_POST['category_id']."'");
										$i=0;
										while($row=mysqli_fetch_array($query))
										{ 				
											//$query_Center=mysqli_fetch_array(mysqli_query($con,"select * from center where c_id='".$row['center_id']."'"));
                                        	$query_category_name = mysqli_fetch_array(mysqli_query($con,"select * from category where c_id = '".$row['category_id']."'"));
                                        	
                        		            $query_exam = mysqli_query($con,"select * from exam where category_id='".$query_category_name['c_id']."' subject_id='".$_POST['s_id']."'");
										?>
												<tr>		
												<td><?php echo ucfirst($row['student_name']);?> </td>
												
												<td><?php echo ucfirst($query_category_name['category_name']);?> </td>
												<td align="center">												
												
												<a data-toggle="modal" target="_new" href="result-list.php?sid=<?php echo encrypt_string($row['student_id']);?>&caid=<?php echo encrypt_string($row['category_id']);?>" class="btn btn-gray btn-small"><i class="icon-wrench"></i> <?php echo 'List of Result'; ?></a>	
											</tr>
												
												</td>
	
											<?php	
										
										 } ?>                                
									</tbody>
									
							 </table>
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
		
		var strURL="resultbatch.php?category_id="+category_id;
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
</script>
</body> 
</html>