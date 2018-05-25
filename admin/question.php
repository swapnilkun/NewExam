<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');

		if (isset($_POST['submit']) and $_POST['s_id']!="") 
		{ 		
			$question= mysql_prep($_POST['question']);
			$typeofquestion= mysql_prep($_POST['typeofquestion']);			
			$marks= mysql_prep($_POST['marks']);
           

			$subject_query=mysqli_query($con,"select * from subject where s_id='".$_POST['s_id']."'");
			$subject=mysqli_fetch_array($subject_query);


		
			$category_id=$subject['category_id'];
			$s_c_id=$subject['subcategory_id'];
			
			$query_question_insert = "insert into questions_table (s_id,c_id,s_c_id,question_status,marks,question_type) values('".$_POST['s_id']."','".$category_id."','".$s_c_id."','1','".$marks."','objective')";
			//echo $query_question_insert;
		    $result= @mysqli_query($con,$query_question_insert); 
			$q_id = @mysqli_insert_id($con);
			
			if($typeofquestion=="Single")
			{
				$correct_ans= mysql_prep($_POST['correct_ans']);
				$option_a= mysql_prep($_POST['option_a']);
				$option_b= mysql_prep($_POST['option_b']);
				$option_c= mysql_prep($_POST['option_c']);
				$option_d= mysql_prep($_POST['option_d']);
				
				$query = "insert into objective_table (q_id,question,typeofquestion,option_a,option_b,option_c,option_d,correct_ans) values('".$q_id."','".$question."','".$typeofquestion."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','".$correct_ans."')";

				
				//$query_question_insert = "insert into question (s_id,c_id,s_c_id,question,typeofquestion,option_a,option_b,option_c,option_d,correct_ans,marks) values('".$_POST['s_id']."','".$category_id."','".$s_c_id."','".$question."','".$typeofquestion."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','".$correct_ans."','".$marks."')";
			}
			else if($typeofquestion=="Multiple")
			{
				$correct_ans= mysql_prep($_POST['correct_ans_A'])."-".mysql_prep($_POST['correct_ans_B'])."-".mysql_prep($_POST['correct_ans_C'])."-".mysql_prep($_POST['correct_ans_D']);
				$option_a= mysql_prep($_POST['check_option_a']);
				$option_b= mysql_prep($_POST['check_option_b']);
				$option_c= mysql_prep($_POST['check_option_c']);
				$option_d= mysql_prep($_POST['check_option_d']);
				
				$query = "insert into objective_table (q_id,question,typeofquestion,option_a,option_b,option_c,option_d,correct_ans) values('".$q_id."','".$question."','".$typeofquestion."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','".$correct_ans."')";

				
				//$query_question_insert = "insert into question (s_id,c_id,s_c_id,question,typeofquestion,option_a,option_b,option_c,option_d,correct_ans,marks) values('".$_POST['s_id']."','".$category_id."','".$s_c_id."','".$question."','".$typeofquestion."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','".$correct_ans."','".$marks."')";
			}
			else
			{
				$error .= constant('TI_QUESTION_MYSQL_ERROR') ;
			}
			



			$result=mysqli_query($con,$query);
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
 <style type="text/css">
    .Table
    {
        display: table;
    }
    .Title
    {
        display: table-caption;
        text-align: center;
        font-weight: bold;
        font-size: larger;
    }
    .Heading
    {
        display: table-row;
        font-weight: 600;
        text-align: center;
    }
    .Row
    {
        display: table-row;
    }
    .Cell
    {
        display: table-cell;
        border:#EAEBEF solid;
        border-width: thin;
        padding-left: 5px;
        padding-right: 5px;
    }
     a.btn.btn-green.btn-small.view_obj {
        border-radius: 0px;
        padding: 6px;
    }
    .obj_btn {
        margin: 5px;
    }
</style>
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
						<a href="#add" data-toggle="tab" onclick="show5();"><i class="icon-plus"></i><?php echo constant('TI_ADD_QUESTION');?></a>
					</li>
					<li>
						<a href="#list" data-toggle="tab" onclick="show6();"><i class="icon-search"></i><?php echo 'View Question';?></a>
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
                                <label class="control-label"><?php echo constant('TI_LABEL_COURSE_NAME');?></label>
                                <div class="controls">
									<select name="s_id" class="validate[required]">
									<option value=""><?php echo constant('TI_DROPDOWN_COURSE');?></option>  
										<?php $query_subject=mysqli_query($con,"select * from subject");
										while($result_subject=mysqli_fetch_array($query_subject))
										{
										?>
                                    	<option value="<?php echo $result_subject['s_id'];?>"><?php echo ucfirst($result_subject['subject_name']);?></option>
										
										<?php }?>
                                    </select>
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
					
					
				</div>
                 </form>                
                </div>   
	<div class="tab-pane box active" id="list" style="display:none;">
        <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
            <thead>
                <tr>
                    <th class="text-center"><div><?php echo constant('TI_TABLE_HASH'); ?></div></th>
                    <th class="text-center"><div><?php echo constant('TI_TABLE_QUESTION_NAME'); ?></div></th>  
                    <th class="text-center"><div><?php echo constant('TI_TABLE_STATUS'); ?></div></th> 
                    <th class="text-center"><div><?php echo constant('TI_TABLE_OPTIONS'); ?></div></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = @mysqli_query($con,"select * from questions_table where question_type='objective' order by q_id DESC");
//                $query = mysql_query("SELECT * FROM questions_table where s_id='" . $_GET['s_id'] . "' AND question_type='objective' order by q_id DESC");
                $i = 0;
                while ($row = @mysqli_fetch_array($query)) {

                    $i++;
                    $query1 = @mysqli_query($con,"SELECT * FROM objective_table where q_id='" . $row['q_id'] . "'");
                    $result = @mysqli_fetch_array($query1)
                    ?>
                    <tr class="text-center">
                        <td><?php echo $i; ?></td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td><?php echo constant('TI_TABLE_QUESTION_QUESTION'); ?></td>
                                    <td><?php echo nl2br($result['question']); ?></td>
                                </tr>
                                <tr class="text-center">
                                    <td><?php echo constant('TI_TABLE_QUESTION_OPTION'); ?></td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> <?php echo constant('TI_TABLE_QUESTION_CHOICES_NO'); ?>  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> <?php echo constant('TI_TABLE_QUESTION_CHOICES_CORRECT'); ?> </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> <?php echo constant('TI_TABLE_QUESTION_CHOICES_CHOICES'); ?></p>
                                                </div>										
                                            </div>
                                            <?php if ($result['typeofquestion'] == "Single") { ?>
                                                <div class="Row">
                                                    <div class="Cell">
                                                        <?php echo constant('TI_LABEL_QUESTION_CHOICES_A'); ?>
                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_<?php echo $row['q_id']; ?>" value="A" <?php if ($result['correct_ans'] == 'A') {
                                                            echo 'checked="checked"';
                                                        } ?>>
                                                    </div>
                                                    <div class="Cell">
                                                        <p><?php echo $result['option_a']; ?></p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_B'); ?>
                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_<?php echo $row['q_id']; ?>" value="B" <?php if ($result['correct_ans'] == 'B') {
														echo 'checked="checked"';
														} ?>>
                                                    </div>
                                                    <div class="Cell">
                                                        <p><?php echo $result['option_b']; ?></p>
                                                    </div>													
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_C'); ?>
                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_<?php echo $row['q_id']; ?>" value="C" <?php if ($result['correct_ans'] == 'C') {
														echo 'checked="checked"';
														} ?>>
                                                    </div>
                                                    <div class="Cell">
                                                        <p><?php echo $result['option_c']; ?></p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_D'); ?>
                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_<?php echo $row['q_id']; ?>" value="D" <?php if ($result['correct_ans'] == 'D') {
														echo 'checked="checked"';
														} ?>>
                                                    </div>
                                                    <div class="Cell">
                                                        <p><?php echo $result['option_d']; ?></p>
                                                    </div>

                                                </div>



                                            <?php
                                            } if ($result['typeofquestion'] == "Multiple") {


                                                if ($result['correct_ans'] != "") {
                                                    $explode_correct_ans = explode("-", $result['correct_ans']);
                                                }
                                                ?>
                                                <div class="Row">
                                                    <div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_A'); ?>
                                                    </div>
                                                    <div class="Cell">
                                                        <input type="checkbox" name="correct_ans_A" value="A" <?php if ($explode_correct_ans[0] == 'A') {
														echo 'checked="checked"';
														} ?>>
                                                    </div>
                                                    <div class="Cell">
                                                        <p><?php echo $result['option_a']; ?></p>
                                                    </div>

                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_B'); ?>
                                                    </div>
                                                    <div class="Cell">

                                                        <input type="checkbox" name="correct_ans_B" value="B" <?php if ($explode_correct_ans[1] == 'B') {
														echo 'checked="checked"';
														} ?>>
                                                    </div>
                                                    <div class="Cell">
                                                        <p><?php echo $result['option_b']; ?></p>
                                                    </div>

                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_C'); ?>
                                                    </div>
                                                    <div class="Cell">											
                                                        <input type="checkbox" name="correct_ans_C" value="C" <?php if ($explode_correct_ans[2] == 'C') {
														echo 'checked="checked"';
														} ?>>
                                                    </div>
                                                    <div class="Cell">
                                                        <p><?php echo $result['option_c']; ?></p>
                                                    </div>

                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_D'); ?>
                                                    </div>
                                                    <div class="Cell">
                                                        <input type="checkbox" name="correct_ans_D" value="D" <?php if ($explode_correct_ans[3] == 'D') {
														echo 'checked="checked"';
														} ?>>
                                                    </div>
                                                    <div class="Cell">
                                                        <p><?php echo $result['option_d']; ?></p>
                                                    </div>

                                                </div>

												<?php } ?>




                                        </div>				
                                    </td>
                                </tr>
                                <tr><td><?php echo constant('TI_LABEL_QUESTION_MARKS'); ?></td><td><?php echo $row['marks']; ?></td></tr>								
                            </table>				
                        </td>
                        <td>
						<?php
							if ($row['question_status'] == 1) {
						?>														

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=<?php echo $row['q_id']; ?>&s_id=<?php echo $_GET['s_id']; ?>')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> <?php echo constant('TI_DEACTIVATE_BUTTON'); ?></a>
						<?php
						} else {
						?>														

                                <a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('question_status.php?q_id=<?php echo $row['q_id']; ?>&s_id=<?php echo $_GET['s_id']; ?>')" class="btn btn-green btn-small"><i class="icon-eye-open"></i> <?php echo constant('TI_ACTIVATE_BUTTON'); ?></a>
								<?php } ?>	
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=<?php echo $row['q_id']; ?>&s_id=<?php echo $row['s_id']; ?>&o_q_id=<?php echo $result['o_q_id']; ?>"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> <?php echo constant('TI_EDIT'); ?></a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=<?php echo $row['q_id']; ?>&s_id=<?php echo $row['s_id']; ?>&o_q_id=<?php echo $result['o_q_id']; ?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON'); ?> </a>



                        </td>		
                    </tr>
						<?php } ?>

            </tbody>
        </table>





    </div>
			</div>
		
            
		</div>
	</div>
</div>

<script>
function show6(){
  
  document.getElementById('list').style.display = 'block';
  document.getElementById('add').style.display = 'none';
 
}
function show5(){
  
  document.getElementById('list').style.display = 'none';
  document.getElementById('add').style.display = 'block';
 
}
</script>
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
        <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i>&nbsp; <?php echo constant('TI_DELETE_CONFIRMATION');?></h6>
	</div>
  <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_POPUP_DELETE_QUESTION');?></div>
    <div class="modal-footer">
    	<a href="question_delete.php?q_id=<?php echo $row['q_id']; ?>" id="delete_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL_BUTTON');?></button>
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