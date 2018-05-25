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
	$category_id= mysql_prep($_POST['category_id']);
	$subcategory_id= mysql_prep($_POST['s_c_id']);
	$subject_id= mysql_prep($_POST['s_id']);
	//$center_id= mysql_prep($_POST['c_id']);
	$student_name= mysql_prep($_POST['student_name']);
	$student_father= mysql_prep($_POST['student_father']);
	$student_mother= mysql_prep($_POST['student_mother']);
	$student_address= mysql_prep($_POST['student_address']);
	$student_phone= $_POST['student_phone'];
	$student_email= $_POST['student_email'];
	$password_md5= mysql_prep(encrypt($_POST['password']));
	$password= $_POST['password'];
$b_id= $_POST['b_id'];

	

  $query_select_student=mysqli_query($con,"SELECT * FROM student where student_email='".$student_email."'");
	if(mysqli_num_rows($query_select_student)>0)
		{
			$error .=constant('TI_STUDENT_ERROR_ALLREADY_EXIT');
		}
	else
	 {
		
		$student_dob = mysql_prep($_POST['student_dob']);
		if($student_dob!="")
		{
		$dobexplode=explode("/",$student_dob);
		$dob_day=$dobexplode[1];
		$dob_month=$dobexplode[0];
		$dob_year=$dobexplode[2];
		$student_dob_from=$dob_day.'-'.$dob_month.'-'.$dob_year;
		}

		 $query_insert_student = "INSERT INTO student (category_id,subcategory_id,subject_id,b_id,student_name,student_father,student_mother,student_dob,student_address,student_phone,student_email,user_name,password,password_md5) VALUES('{$category_id}','{$subcategory_id}','{$subject_id}','{$b_id}','{$student_name}','{$student_father}','{$student_mother}','{$student_dob_from}','{$student_address}','{$student_phone}','{$student_email}','{$username}','{$password}','{$password_md5}')";
		$result_student=mysqli_query($con,$query_insert_student);
		if($result_student)
		{
			$message_success .= $student_name." ".constant('TI_STUDENT_ADD_MESSAGE');
		}
		else
		{
			$error .= constant('TI_STUDENT_MYSQL_ERROR');
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
                        <?php echo constant('TI_MANAGE_STUDENT');?> </h3>
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
				<?php echo constant('TI_STUDENT_LIST');?>                	</a></li>
				
				</ul>
				</div>
	<div class="box-content padded">
		<div class="tab-content">
           
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
							
							<th><div><?php echo constant('TI_TABLE_CATEGORY_NAME') ?></div></th> 

							<th><div><?php echo constant('TI_TABLE_STUDENT_NAME') ?></div></th>
							<th><div><?php echo constant('TI_TABLE_STUDENT_FATHER_NAME') ?></div></th>
							<th><div><?php echo constant('TI_TABLE_BATCH_NAME_TIME') ?></div></th>
							
                    		<th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
						</tr>
					</thead>
                    <tbody>
							<?php 
								$query=mysqli_query($con,"select * from student where center_id= '".$_SESSION['center_id']."'");
								$i=0;
								while($row=mysqli_fetch_array($query))
								{ 
									$query_category_name=mysqli_fetch_array(mysqli_query($con,"select * from category where c_id='".$row['category_id']."'"));
									$query_subcategory_name=mysqli_fetch_array(mysqli_query($con,"select * from subcategory where s_c_id='".$row['subcategory_id']."'"));
									//$query_center_name=mysqli_fetch_array(mysqli_query($con,"select * from center where c_id='".$row['center_id']."'"));
									$query_batch_name=mysqli_fetch_array(mysqli_query($con,"select * from batch where b_id='".$row['b_id']."'"));

									$i++;
										
							?>
								<tr>								
								<td><?php echo $query_category_name['category_name'];?></td>								
								
								<td><?php echo ucfirst($row['student_name']);?> </td>
								<td><?php echo ucfirst($row['student_father']);?> </td>
								<td><?php echo ucfirst($query_batch_name['batch_name'])."(".$query_batch_name['batch_time'].")";?> </td>
								
								

								<td align="center">
							
								<a data-toggle="modal" href="#question-modal-form" onclick="modal_view_student_profile('View_Student',<?php echo $row['student_id'];?>)" class="btn btn-blue btn-small"><i class="icon-zoom-in"></i> <?php echo constant('TI_EXAM_VIEW_BUTTON');?></a>

								</td>
								</tr>
						<?php } ?>
                                
							</tbody>
                </table>
			</div>
           
			
			
		</div>
	</div>
</div>            </div>       
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
        <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i>&nbsp; <?php echo constant('TI_DELETE_CONFIRMATION');?></h6>
	</div>
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_POPUP_STUDENT_DELETE');?></div>
    <div class="modal-footer">
    	<a href="" id="delete_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL_BUTTON');?></button>
    </div>
</div>


<div id="modal-status-active" class="modal hide fade" style="height:140px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i>&nbsp; <?php echo constant('TI_DELETE_CONFIRMATION');?></h6>
	</div>
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_STATUS_DATA_ACTIVE');?></div>
    <div class="modal-footer">
    	<a href="category_status.php?c_id=<?php echo $row['c_id'];?>" id="active_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
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
    	<a href="category_status.php?c_id=<?php echo $row['c_id'];?>" id="deactive_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL_BUTTON');?></button>
    </div>
</div>
<script>
function modal_delete(param1)
{
	document.getElementById('delete_link').href = param1;
}

function modal_view_student_profile(param1 ,param2 ,param3)
{
	document.getElementById('modal-body-question').innerHTML = 
		'<iframe id="frame1" src="viewstudent.php?s_id='+param2+'" width="100%" height="400" frameborder="0"></iframe>';
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
</script>
 
</html>