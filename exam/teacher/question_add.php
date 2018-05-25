<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');

		if (isset($_POST['submit']) and $_POST['p_e_id']!="") 
		{ 		
			
			$question= mysql_prep($_POST['question']);
			$typeofquestion= mysql_prep($_POST['typeofquestion']);			
			$marks= mysql_prep($_POST['marks']);

            $exam_query=mysqli_query($con,"select * from practice_exam where p_e_id='".$_POST['p_e_id']."'");
			$exam=mysqli_fetch_array($exam_query);

			$category_id=$exam['category_id'];
			$s_c_id=$exam['subcategory_id'];
			$center_id=$_SESSION['center_id'];
			if($typeofquestion=="Single")
			{
				$correct_ans= mysql_prep($_POST['correct_ans']);
				$option_a= mysql_prep($_POST['option_a']);
				$option_b= mysql_prep($_POST['option_b']);
				$option_c= mysql_prep($_POST['option_c']);
				$option_d= mysql_prep($_POST['option_d']);

				$query_question_insert = "insert into practice_question (p_e_id,c_id,s_c_id,question,typeofquestion,option_a,option_b,option_c,option_d,correct_ans,marks,center_id) values('".$_POST['p_e_id']."','".$category_id."','".$s_c_id."','".$question."','".$typeofquestion."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','".$correct_ans."','".$marks."','".$center_id."')";
			}
			else if($typeofquestion=="Multiple")
			{
				$correct_ans= mysql_prep($_POST['correct_ans_A'])."-".mysql_prep($_POST['correct_ans_B'])."-".mysql_prep($_POST['correct_ans_C'])."-".mysql_prep($_POST['correct_ans_D']);
				$option_a= mysql_prep($_POST['check_option_a']);
				$option_b= mysql_prep($_POST['check_option_b']);
				$option_c= mysql_prep($_POST['check_option_c']);
				$option_d= mysql_prep($_POST['check_option_d']);

				$query_question_insert = "insert into practice_question (p_e_id,c_id,s_c_id,question,typeofquestion,option_a,option_b,option_c,option_d,correct_ans,marks,center_id) values('".$_POST['p_e_id']."','".$category_id."','".$s_c_id."','".$question."','".$typeofquestion."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','".$correct_ans."','".$marks."','".$center_id."')";
			}
			else
			{
				$error .= constant('TI_QUESTION_MYSQL_ERROR') ;
			}
			



			$result=mysqli_query($con,$query_question_insert);
			confirm_query($result);
			
			if($result)
			{
			$message_success .= constant('TI_QUESTION_SUCCESS_MESSAGE') ;
			}
			else
			{
			$error .= constant('TI_QUESTION_MYSQL_ERROR') ;
			}
		}
if($_GET['p_e_id']!="")
{
	$p_e_id= $_GET['p_e_id'];
}

	
?>
<script>
	function showDiv(elem){
	if(elem.value == 'Single')
	{
	document.getElementById('hidden_div_single').style.display = "block";
	document.getElementById('hidden_div_multiple').style.display = "none";
	document.getElementById('hidden_div_descriptive').style.display = "none";
	}
	else if(elem.value=='Multiple')
	{
	document.getElementById('hidden_div_multiple').style.display = "block";
	document.getElementById('hidden_div_single').style.display = "none";
	document.getElementById('hidden_div_descriptive').style.display = "none";

	}
	else if(elem.value=='Descriptive')
	{
		document.getElementById('hidden_div_descriptive').style.display = "block";
		document.getElementById('hidden_div_single').style.display = "none";
		document.getElementById('hidden_div_multiple').style.display = "none";
	}
	}
</script>
<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"> <i class="icon-edit"></i><?php echo constant('TI_MANAGE_QUESTION');?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-plus"></i><?php echo constant('TI_ADD_QUESTION');?></a>
					</li>
				</ul>	
			</div>
	<div class="box-content padded">
		<div class="tab-content">        
			<?php include("message.php");?>
				<div class="tab-pane active" id="add" style="padding: 5px">
				<form method="post" action="" class="form-horizontal validatable" enctype="multipart/form-data">
                        <form action="<?php $PHP_SELF ?>" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top" enctype="multipart/form-data">	
				<div class="padded">  
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
							<div class="box closable-chat-box">
								<div class="box-content padded">									
							</div>
						</div>
					</div>	
				</div>

				<div class="padded">  
					<div class="control-group">
						<label class="control-label"><?php echo constant('TI_LABEL_QUESTION_QUESTION');?></label>
						<div class="controls">
							<div class="box closable-chat-box">
								<div class="box-content">
									<div class="chat-message-box">
										
										<textarea  name="question" class="validate[required]" rows="5" placeholder="Add Question"></textarea>
										<script>
										CKEDITOR.replace( 'question' );
										</script>
 
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			   <div class="padded">                   
					<div class="control-group">
						<label class="control-label"><?php echo constant('TI_LABEL_QUESTION_ANSWER_TYPE');?></label>
						<div class="controls">
						 <select name="typeofquestion" class="validate[required]"  onchange="showDiv(this)" id="pr_bookingtype">
							<option value=""><?php echo constant('TI_DROPDOWN_QUESTION_SELECT_ANSWER_TYPE');?></option>
							<option value="Single"><?php echo constant('TI_QUESTION_SINGLE_SELECTION');?></option>
							<option value="Multiple"><?php echo constant('TI_QUESTION_MULTIPLE_SELECTION');?></option>  		
						</select> 
						</div>
					</div>
				</div>
				<div id="hidden_div_single" style="display: none;">
					<div class="padded">                   
					<div class="control-group">
					<div><?php echo constant('TI_LABEL_QUESTION_CHOICES');?></div>
					<div class="CSSTableGenerator" >
					<table >
					<tr>
					<td>
					<?php echo constant('TI_TABLE_QUESTION_CHOICES_NO');?>  
					</td>
					<td >
					<?php echo constant('TI_TABLE_QUESTION_CHOICES_CORRECT');?> 
					</td>
					<td>
					<?php echo constant('TI_TABLE_QUESTION_CHOICES_CHOICES');?>
					</td>
					</tr>
					<tr>
					<td><div><?php echo constant('TI_LABEL_QUESTION_CHOICES_A');?></div></td>
					<td><div><input type="radio" name="correct_ans" value="A"></div></td>   
					<td>					
					<div class="box closable-chat-box">
						<div class="box-content">
							<div class="chat-message-box">
								
								<textarea  name="option_a" class="validate[required]" rows="5" placeholder="Add Choices A"></textarea>
								<script>
								CKEDITOR.replace( 'option_a' );
								</script>
							</div>
						</div>
					</div>					
					</td>   
					</tr>
					<tr>
					<td><div><?php echo constant('TI_LABEL_QUESTION_CHOICES_B');?></div></td>
					<td><div><input type="radio" name="correct_ans" value="B"></div></td>   
					<td>
					<div class="box closable-chat-box">
						<div class="box-content">
							<div class="chat-message-box">
								
								<textarea  name="option_b" class="validate[required]" rows="5" placeholder="Add Choices B"></textarea>
								<script>
								CKEDITOR.replace( 'option_b' );
								</script>
							</div>
						</div>
					</div>	
					
					</td>   
					</tr>
					<tr>
					<td><div><?php echo constant('TI_LABEL_QUESTION_CHOICES_C');?></div></td>
					<td><div><input type="radio" name="correct_ans" value="C"></div></td>   
					<td>
					<div class="box closable-chat-box">
						<div class="box-content">
							<div class="chat-message-box">
								
								<textarea  name="option_c" class="validate[required]" rows="5" placeholder="Add Choices C"></textarea>
								<script>
								CKEDITOR.replace( 'option_c' );
								</script>
							</div>
						</div>
					</div>	
					</td>  
					</tr>
					<tr>
					<td><div><?php echo constant('TI_LABEL_QUESTION_CHOICES_D');?></div></td>
					<td><div><input type="radio" name="correct_ans" value="D"></div></td>   
					<td>
					
					<div class="box closable-chat-box">
						<div class="box-content">
							<div class="chat-message-box">
								
								<textarea  name="option_d" class="validate[required]" rows="5" placeholder="Add Choices D"></textarea>
								<script>
								CKEDITOR.replace( 'option_d' );
								</script>
							</div>
						</div>
					</div>	
					</td>          
					</tr>
					</table>
					</div>
					</div>
					</div>
				</div>
				<div id="hidden_div_multiple" style="display: none;">
					<div class="padded">                   
					<div class="control-group">
					<div><?php echo constant('TI_LABEL_QUESTION_CHOICES');?></div>
					<div class="CSSTableGenerator" >
					<table >
					<tr>
					<td>
					<?php echo constant('TI_TABLE_QUESTION_CHOICES_NO');?>  
					</td>
					<td >
					<?php echo constant('TI_TABLE_QUESTION_CHOICES_CORRECT');?> 
					</td>
					<td>
					<?php echo constant('TI_TABLE_QUESTION_CHOICES_CHOICES');?>
					</td>
					</tr>
					<tr>
					<td><div><?php echo constant('TI_LABEL_QUESTION_CHOICES_A');?></div></td>
					<td><div><input type="checkbox" name="correct_ans_A" value="A"></div></td>   
					<td>
					<div class="box closable-chat-box">
						<div class="box-content">
							<div class="chat-message-box">
							
								<textarea  name="check_option_a" class="validate[required]" rows="5" placeholder="Add Choices A"></textarea>
								<script>
								CKEDITOR.replace( 'check_option_a' );
								</script>
							</div>
						</div>
					</div>	
					
					</td>   
					</tr>
					<tr>
					<td><div><?php echo constant('TI_LABEL_QUESTION_CHOICES_B');?></div></td>
					<td><div><input type="checkbox" name="correct_ans_B" value="B"></div></td>   
					<td>
					
					<div class="box closable-chat-box">
						<div class="box-content">
							<div class="chat-message-box">
							
								<textarea  name="check_option_b" class="validate[required]" rows="5" placeholder="Add Choices B"></textarea>
								<script>
								CKEDITOR.replace( 'check_option_b' );
								</script>
							</div>
						</div>
					</div>	
					</td>   
					</tr>
					<tr>
					<td><div><?php echo constant('TI_LABEL_QUESTION_CHOICES_C');?></div></td>
					<td><div><input type="checkbox" name="correct_ans_C" value="C"></div></td>   
					<td>
					<div class="box closable-chat-box">
						<div class="box-content">
							<div class="chat-message-box">
								
								<textarea  name="check_option_c" class="validate[required]" rows="5" placeholder="Add Choices C"></textarea>
								<script>
								CKEDITOR.replace( 'check_option_c' );
								</script>
							</div>
						</div>
					</div>	
					</td>  
					</tr>
					<tr>
					<td><div><?php echo constant('TI_LABEL_QUESTION_CHOICES_D');?></div></td>
					<td><div><input type="checkbox" name="correct_ans_D" value="D"></div></td>   
					<td>
					<div class="box closable-chat-box">
						<div class="box-content">
							<div class="chat-message-box">
						
								<textarea  name="check_option_d" class="validate[required]" rows="5" placeholder="Add Choices D"></textarea>
								<script>
								CKEDITOR.replace( 'check_option_d' );
								</script>
							</div>
						</div>
					</div>	
					</td>          
					</tr>
					</table>
					</div>
					</div>
					</div>
				</div>
				
				<div class="padded">                   
					<div class="control-group">
						<label class="control-label"><?php echo constant('TI_LABEL_QUESTION_SET_MARKS');?></label>
						<div class="controls">
							<input type="text" class="validate[required,custom[integer]]" name="marks" maxlength="2" value="<?php echo $res['marks']?>"/>
						</div>
					</div>
				</div>		
				<div class="form-actions">
					<button type="submit" class="btn btn-gray"><?php echo constant('TI_QUESTION_ADD_BUTTON');?></button>
					<input type="hidden" value="Add Question" name="submit">
					<input type="hidden" value="<?php echo mysql_prep($p_e_id);?>" name="p_e_id">
					
				</div>
                 </form>                
                </div>                
			</div>
		
            
		</div>
	</div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>            </div>       
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
        <button class="btn btn-gray" onclick="custom_print('frame1')"><?php echo constant('TI_PRINT');?></button>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CLOSE');?></button>
    </div>
</div>
<!-----------HIDDEN MODAL DELETE CONFIRMATION - COMMON IN ALL PAGES ------>
<div id="modal-delete" class="modal hide fade" style="height:140px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i></h6>
	</div>
  <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_DELETE_DATA');?></div>
    <div class="modal-footer">
    	<a href="" id="delete_link" class="btn btn-red" ><?php echo constant('CONFIRME');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL');?></button>
    </div>
</div>

<script>
function modal(param1 ,param2 ,param3)
{
	document.getElementById('modal-body').innerHTML = 
		'<iframe id="frame1" src="edit_teacher.php?t_id='+param2+'/'+param3+'" width="100%" height="400" frameborder="0"></iframe>';

	document.getElementById('modal-tablesLabel').innerHTML = param1.replace("_"," ");
}

function modal_delete(param1)
{
	document.getElementById('delete_link').href = param1;
}

/////////////PRINT A DIV FUNCTION////////////////

function custom_print(div_id)
{
	var mywindow = window.open('', 'my div', 'height=400,width=600');
	mywindow.document.write(document.getElementById(div_id).contentWindow.document.head.innerHTML);
	mywindow.document.write(document.getElementById(div_id).contentWindow.document.body.innerHTML); 
	mywindow.print();
	mywindow.close();
	return true;
}

</script>
 
</html>