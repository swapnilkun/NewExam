<?php
ini_set ( 'memory_limit', '64M' );
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');

if (isset($_POST['submit'])) 
{ 

include_once("xlsxwriter.class.php");
 

############ CATEGORY ############
$header_category = array(
    'c_id'=>'string',
    'category_name'=>'string',
    'category_status'=>'string',  
);
$query_category = mysqli_query($con,"SELECT * FROM category order by c_id");
$CategoryDimArray = array();
while ($data_category = mysqli_fetch_array($query_category))
{
	$CategoryDimArray []= array ( $data_category['c_id'],$data_category['category_name'],$data_category['category_status'] );
}


############ SUBCATEGORY ############

$header_subcategory = array(
    's_c_id'=>'string',
    'category_id'=>'string',
    'subcategory_name'=>'string',  
	'subcategory_status'=>'string', 
);
$query_subcategory = mysqli_query($con,"SELECT * FROM subcategory order by s_c_id");
$SubcategoryDimArray = array();
while ($data_subcategory = mysqli_fetch_array($query_subcategory))
{
	$SubcategoryDimArray []= array ( $data_subcategory['s_c_id'],$data_subcategory['category_id'],$data_subcategory['subcategory_name'], $data_subcategory['subcategory_status'] );
}


$header_subject = array(
    's_id'=>'string',
    'category_id'=>'string',
    'subcategory_id'=>'string',  
	'subject_name'=>'string', 
	'subject_status'=>'string', 
);
$query_subject = mysqli_query($con,"SELECT * FROM subject order by s_id");
$SubjectDimArray = array();
while ($data_subject = mysqli_fetch_array($query_subject))
{
	$SubjectDimArray []= array ( $data_subject['s_id'],$data_subject['category_id'],$data_subject['subcategory_id'], $data_subject['subject_name'],$data_subject['subject_status'] );
}


############ OBJECTIVE QUESTIONS ############



$header_question1 = array(
	'question_type'=>'string',
    'q_id'=>'string',
    's_id'=>'string',
    'c_id'=>'string',  
	's_c_id'=>'string', 
	'o_q_id'=>'string',  
	'question'=>'string',
	'typeofquestion'=>'string',
    'option_a'=>'string',
    'option_b'=>'string',  
	'option_c'=>'string', 
	'option_d'=>'string',
	'correct_ans'=>'string',  
	'question_status'=>'string', 
	'marks'=>'string', 
	
);
$query1= "SELECT * FROM questions_table q, objective_table o where q.q_id=o.q_id";
$query_question1 = mysqli_query($con, $query1);
$Question1DimArray = array();
while ($data_question1 = mysqli_fetch_array($query_question1))
{
	$Question1DimArray []= array ($data_question1['question_type'],$data_question1['q_id'],$data_question1['s_id'],$data_question1['c_id'], $data_question1['s_c_id'], $data_question1['o_q_id'],$data_question1['question'], $data_question1['typeofquestion'],$data_question1['option_a'],$data_question1['option_b'], $data_question1['option_c'], $data_question1['option_d'],$data_question1['correct_ans'],$data_question1['question_status'],$data_question1['marks'] );
}




////////////////student///////////
$header_student = array(
    'student_id'=>'string',
    'category_id'=>'string',
    'subcategory_id'=>'string',  
    'subject_id'=>'string',  
    'b_id'=>'string',  
    'student_name'=>'string',  
    'student_father'=>'string',  
    'student_mother'=>'string', 
    'student_dob'=>'string',  
    'student_address'=>'string',  
    'student_phone'=>'string',  
    'student_email'=>'string',  
    'user_name'=>'string',  
    'password'=>'string',  
    'password_md5'=>'string',  
    'student_status'=>'string',  
    'studentlogo'=>'string',  
);
$query_student = mysqli_query($con,"SELECT * FROM student order by student_id");
$StudentDimArray = array();
while ($data_student = mysqli_fetch_array($query_student))
{
	$StudentDimArray []= array ( $data_student['student_id'], $data_student['category_id'], $data_student['subcategory_id'], $data_student['subject_id'],
				$data_student['b_id'], $data_student['student_name'], $data_student['student_father'],  $data_student['student_mother'],
				$data_student['student_dob'], $data_student['student_address'], $data_student['student_phone'], $data_student['student_email'],
				$data_student['user_name'], $data_student['password'], $data_student['password_md5'],$data_student['student_status'],$data_student['studentlogo']);
}



############ END ############
$dop_filename = 'TI_OES_'.date('Y_m_d_H_i_s').'.xlsx';

$writer = new XLSXWriter();
$writer->setAuthor('Textus Intentio');

$writer->writeSheet($CategoryDimArray,'sheet1',$header_category); // Excel sheet 1
$writer->writeSheet($SubcategoryDimArray,'sheet2',$header_subcategory); // Excel sheet 2
$writer->writeSheet($SubjectDimArray,'sheet3',$header_subject); // Excel sheet 3
$writer->writeSheet($Question1DimArray,'sheet4',$header_question1); // Excel sheet 4
$writer->writeSheet($StudentDimArray,'sheet5',$header_student); 
$result_file=$writer->writeToFile('export/'.$dop_filename);
	

	if(file_exists('export/'.$dop_filename))
	{
		$message_success .=$dop_filename." ".constant('TI_EXPORT_ADD_MESSAGE');
	}
	else
	{
		$error .=  constant('TI_EXPORT_FILE_MYSQL_ERROR');
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
                        <?php echo constant('TI_MANAGE_EXPORT');?> </h3>
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
								<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i><?php echo constant('TI_EXPORT_LIST');?></a>
							</li>
							<li>
								<a href="#add" data-toggle="tab"><i class="icon-plus"></i><?php echo constant('TI_EXPORT_ADD_BUTTON');?></a>
								
							</li>
						</ul>  
					</div>
					<div class="box-content padded">
						<div class="tab-content">        
							<div class="tab-pane box active" id="list">
								<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
									<thead>
										<tr>
											
											<th><div><?php echo constant('TI_TABLE_EXPORT_NAME');?></div></th>  
											
											<th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$log_directory = 'export';

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

													<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('export_table_delete.php?b_id=<?php echo $value;?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON');?></a>

													<a data-toggle="modal" href="download.php?action=downloadfile&file=export/<?php echo $value;?>" class="btn btn-green btn-small"><i class="icon-download"></i> <?php echo constant('TI_DONLOAD_FILE_BUTTON');?></a>
												
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
                	<form action="<?php $PHP_SELF ?>" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top">	
						<div class="padded">       
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_EXPORT_FILE_BUTTON_NAME');?></label>
                                <div class="controls">
									<button type="submit" class="btn btn-gray"><?php echo constant('TI_EXPORT_FILE');?></button>
									<input type="hidden" value="Add File" name="submit">
                                </div>
                            </div>
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