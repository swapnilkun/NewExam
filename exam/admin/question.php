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
					<h3 class="title"> <i class="icon-edit"></i>Manage Question </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
					
						<a href="#list" data-toggle="tab" onclick="show6();"><i class="icon-search"></i>View Question</a>
					</li>
					<li>
						<a href="#add" data-toggle="tab" onclick="show5();"><i class="icon-plus"></i>Add Question</a>
					</li>
				</ul>	
			</div>
	<div class="box-content padded">
		<div class="tab-content">        
						 <form action="question.php" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top">	
					        <div class="padded" style="margin-top: 12px;">       
								<div class="control-group">
									<label class="control-label">Course Name</label>
									<div class="controls">
										<select name="course_name" class="chzn-select" onChange="getBranch(this.value)">
										<option value="">Select Course</option>  
																						<option value="59">DCCO</option>
											
																						<option value="60">Adavance Tally</option>
											
																						<option value="61">MS-Office</option>
											
																						<option value="62">Php</option>
											
																						<option value="63">Erterfddf</option>
											
																								
										</select>
									</div>
								</div>
						
							</div>
						    	<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Exam Name</label>
                                 <div class="controls" id="examdiv">
									<select name="exam_name">										
                                    	<option value="">Select Exam</option>
										
                                    </select>
                                </div>
                            </div>
                        </div>
							
							<div class="form-actions" style="margin-top: 0px;">
								<input type="hidden" name="operation" value="selection" />
								<input type="submit" value="Search" class="btn btn-normal btn-gray" />
							</div>
						</form>
		    	<div class="tab-pane active" id="list">
			    
        <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
            <thead>
                <tr>
                    <th class="text-center"><div>#</div></th>
                    <th class="text-center"><div>Course Name</div></th>
                    <th class="text-center"><div>Question</div></th>  
                    <th class="text-center"><div>Status</div></th> 
                    <th class="text-center"><div>Options</div></th>
                </tr>
            </thead>
            <tbody>
                                    <tr class="text-center">
                        <td>1</td>
                        <td>DCCO</td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td>Question</td>
                                    <td><p>zsdfsfresrr</p><br />
</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Option</td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> No.  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Correct </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Choices</p>
                                                </div>										
                                            </div>
                                                                                            <div class="Row">
                                                    <div class="Cell">
                                                        A                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_137" value="A" checked="checked">
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>ersert</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														B                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_137" value="B" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>ertfser</p>
</p>
                                                    </div>													
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														C                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_137" value="C" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>vcvb</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														D                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_137" value="D" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>cvcbcfg</p>
</p>
                                                    </div>

                                                </div>



                                            



                                        </div>				
                                    </td>
                                </tr>
                                <tr><td>Marks</td><td>20</td></tr>								
                            </table>				
                        </td>
                        <td>
																				

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=137&s_id=')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
							
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=137&s_id=59&o_q_id=129"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=137&s_id=59&o_q_id=129')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>



                        </td>		
                    </tr>
						                    <tr class="text-center">
                        <td>2</td>
                        <td>Adavance Tally</td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td>Question</td>
                                    <td><p>how is it possible???</p><br />
</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Option</td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> No.  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Correct </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Choices</p>
                                                </div>										
                                            </div>
                                                                                            <div class="Row">
                                                    <div class="Cell">
                                                        A                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_136" value="A" checked="checked">
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>o</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														B                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_136" value="B" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>r</p>
</p>
                                                    </div>													
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														C                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_136" value="C" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>t</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														D                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_136" value="D" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>y</p>
</p>
                                                    </div>

                                                </div>



                                            



                                        </div>				
                                    </td>
                                </tr>
                                <tr><td>Marks</td><td>10</td></tr>								
                            </table>				
                        </td>
                        <td>
																				

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=136&s_id=')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
							
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=136&s_id=60&o_q_id=128"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=136&s_id=60&o_q_id=128')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>



                        </td>		
                    </tr>
						                    <tr class="text-center">
                        <td>3</td>
                        <td></td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td>Question</td>
                                    <td><p>how?</p><br />
</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Option</td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> No.  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Correct </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Choices</p>
                                                </div>										
                                            </div>
                                                                                            <div class="Row">
                                                    <div class="Cell">
														A                                                    </div>
                                                    <div class="Cell">
                                                        <input type="checkbox" name="correct_ans_A" value="A" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>adfd</p>
</p>
                                                    </div>

                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														B                                                    </div>
                                                    <div class="Cell">

                                                        <input type="checkbox" name="correct_ans_B" value="B" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>fdfd</p>
</p>
                                                    </div>

                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														C                                                    </div>
                                                    <div class="Cell">											
                                                        <input type="checkbox" name="correct_ans_C" value="C" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>fdfd</p>
</p>
                                                    </div>

                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														D                                                    </div>
                                                    <div class="Cell">
                                                        <input type="checkbox" name="correct_ans_D" value="D" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>gw</p>
</p>
                                                    </div>

                                                </div>

												



                                        </div>				
                                    </td>
                                </tr>
                                <tr><td>Marks</td><td>2</td></tr>								
                            </table>				
                        </td>
                        <td>
																				

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=127&s_id=')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
							
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=127&s_id=55&o_q_id=120"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=127&s_id=55&o_q_id=120')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>



                        </td>		
                    </tr>
						                    <tr class="text-center">
                        <td>4</td>
                        <td></td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td>Question</td>
                                    <td><p>How to choose the color?</p><br />
</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Option</td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> No.  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Correct </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Choices</p>
                                                </div>										
                                            </div>
                                                                                            <div class="Row">
                                                    <div class="Cell">
														A                                                    </div>
                                                    <div class="Cell">
                                                        <input type="checkbox" name="correct_ans_A" value="A" checked="checked">
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>a</p>
</p>
                                                    </div>

                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														B                                                    </div>
                                                    <div class="Cell">

                                                        <input type="checkbox" name="correct_ans_B" value="B" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>b</p>
</p>
                                                    </div>

                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														C                                                    </div>
                                                    <div class="Cell">											
                                                        <input type="checkbox" name="correct_ans_C" value="C" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>c</p>
</p>
                                                    </div>

                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														D                                                    </div>
                                                    <div class="Cell">
                                                        <input type="checkbox" name="correct_ans_D" value="D" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>d</p>
</p>
                                                    </div>

                                                </div>

												



                                        </div>				
                                    </td>
                                </tr>
                                <tr><td>Marks</td><td>5</td></tr>								
                            </table>				
                        </td>
                        <td>
																				

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=126&s_id=')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
							
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=126&s_id=21&o_q_id=119"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=126&s_id=21&o_q_id=119')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>



                        </td>		
                    </tr>
						                    <tr class="text-center">
                        <td>5</td>
                        <td></td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td>Question</td>
                                    <td><p>gfdrgtr</p><br />
</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Option</td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> No.  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Correct </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Choices</p>
                                                </div>										
                                            </div>
                                                                                            <div class="Row">
                                                    <div class="Cell">
                                                        A                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_124" value="A" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>ergtertg</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														B                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_124" value="B" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>ertgetg</p>
</p>
                                                    </div>													
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														C                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_124" value="C" checked="checked">
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>ergtgttfbx</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														D                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_124" value="D" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>sssssssssssssss</p>
</p>
                                                    </div>

                                                </div>



                                            



                                        </div>				
                                    </td>
                                </tr>
                                <tr><td>Marks</td><td>5</td></tr>								
                            </table>				
                        </td>
                        <td>
																				

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=124&s_id=')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
							
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=124&s_id=26&o_q_id=117"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=124&s_id=26&o_q_id=117')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>



                        </td>		
                    </tr>
						                    <tr class="text-center">
                        <td>6</td>
                        <td></td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td>Question</td>
                                    <td><p>what is java??</p><br />
</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Option</td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> No.  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Correct </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Choices</p>
                                                </div>										
                                            </div>
                                                                                            <div class="Row">
                                                    <div class="Cell">
                                                        A                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_123" value="A" checked="checked">
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>err</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														B                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_123" value="B" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>rgrtgt</p>
</p>
                                                    </div>													
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														C                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_123" value="C" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>gdrtgg</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														D                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_123" value="D" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>tgdrtg</p>
</p>
                                                    </div>

                                                </div>



                                            



                                        </div>				
                                    </td>
                                </tr>
                                <tr><td>Marks</td><td>5</td></tr>								
                            </table>				
                        </td>
                        <td>
																				

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=123&s_id=')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
							
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=123&s_id=26&o_q_id=116"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=123&s_id=26&o_q_id=116')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>



                        </td>		
                    </tr>
						                    <tr class="text-center">
                        <td>7</td>
                        <td></td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td>Question</td>
                                    <td>asdfghjk</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Option</td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> No.  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Correct </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Choices</p>
                                                </div>										
                                            </div>
                                                                                            <div class="Row">
                                                    <div class="Cell">
                                                        A                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_122" value="A" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p>a</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														B                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_122" value="B" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p>b</p>
                                                    </div>													
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														C                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_122" value="C" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p>c</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														D                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_122" value="D" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p>d</p>
                                                    </div>

                                                </div>



                                            



                                        </div>				
                                    </td>
                                </tr>
                                <tr><td>Marks</td><td>5</td></tr>								
                            </table>				
                        </td>
                        <td>
																				

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=122&s_id=')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
							
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=122&s_id=52&o_q_id=115"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=122&s_id=52&o_q_id=115')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>



                        </td>		
                    </tr>
						                    <tr class="text-center">
                        <td>8</td>
                        <td></td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td>Question</td>
                                    <td>asdfghjk</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Option</td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> No.  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Correct </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Choices</p>
                                                </div>										
                                            </div>
                                                                                            <div class="Row">
                                                    <div class="Cell">
                                                        A                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_121" value="A" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p>a</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														B                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_121" value="B" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p>b</p>
                                                    </div>													
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														C                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_121" value="C" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p>c</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														D                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_121" value="D" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p>d</p>
                                                    </div>

                                                </div>



                                            



                                        </div>				
                                    </td>
                                </tr>
                                <tr><td>Marks</td><td>5</td></tr>								
                            </table>				
                        </td>
                        <td>
																				

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=121&s_id=')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
							
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=121&s_id=52&o_q_id=114"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=121&s_id=52&o_q_id=114')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>



                        </td>		
                    </tr>
						                    <tr class="text-center">
                        <td>9</td>
                        <td></td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td>Question</td>
                                    <td><p>aaaaaaaaaaaa</p><br />
</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Option</td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> No.  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Correct </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Choices</p>
                                                </div>										
                                            </div>
                                                                                            <div class="Row">
                                                    <div class="Cell">
                                                        A                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_115" value="A" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>eeeeeeeeeeeeeeee</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														B                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_115" value="B" checked="checked">
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>wwwwwwwwwwwwww</p>
</p>
                                                    </div>													
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														C                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_115" value="C" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>rrrrr</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														D                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_115" value="D" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>ggggggg</p>
</p>
                                                    </div>

                                                </div>



                                            



                                        </div>				
                                    </td>
                                </tr>
                                <tr><td>Marks</td><td>5</td></tr>								
                            </table>				
                        </td>
                        <td>
																				

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=115&s_id=')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
							
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=115&s_id=27&o_q_id=106"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=115&s_id=27&o_q_id=106')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>



                        </td>		
                    </tr>
						                    <tr class="text-center">
                        <td>10</td>
                        <td></td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td>Question</td>
                                    <td><p>What are the type of JOIN?</p><br />
</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Option</td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> No.  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Correct </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Choices</p>
                                                </div>										
                                            </div>
                                                                                            <div class="Row">
                                                    <div class="Cell">
														A                                                    </div>
                                                    <div class="Cell">
                                                        <input type="checkbox" name="correct_ans_A" value="A" checked="checked">
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>Inner Join</p>
</p>
                                                    </div>

                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														B                                                    </div>
                                                    <div class="Cell">

                                                        <input type="checkbox" name="correct_ans_B" value="B" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>Up Join</p>
</p>
                                                    </div>

                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														C                                                    </div>
                                                    <div class="Cell">											
                                                        <input type="checkbox" name="correct_ans_C" value="C" checked="checked">
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>Left Join</p>
</p>
                                                    </div>

                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														D                                                    </div>
                                                    <div class="Cell">
                                                        <input type="checkbox" name="correct_ans_D" value="D" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>None of these</p>
</p>
                                                    </div>

                                                </div>

												



                                        </div>				
                                    </td>
                                </tr>
                                <tr><td>Marks</td><td>10</td></tr>								
                            </table>				
                        </td>
                        <td>
																				

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=112&s_id=')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
							
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=112&s_id=28&o_q_id=103"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=112&s_id=28&o_q_id=103')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>



                        </td>		
                    </tr>
						                    <tr class="text-center">
                        <td>11</td>
                        <td></td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td>Question</td>
                                    <td><p>Which statement is used for allocating system privileges to the user?</p><br />
</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Option</td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> No.  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Correct </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Choices</p>
                                                </div>										
                                            </div>
                                                                                            <div class="Row">
                                                    <div class="Cell">
                                                        A                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_111" value="A" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>CREATE</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														B                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_111" value="B" checked="checked">
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>GRANT</p>
</p>
                                                    </div>													
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														C                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_111" value="C" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>REVOKE</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														D                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_111" value="D" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>ROLE</p>
</p>
                                                    </div>

                                                </div>



                                            



                                        </div>				
                                    </td>
                                </tr>
                                <tr><td>Marks</td><td>5</td></tr>								
                            </table>				
                        </td>
                        <td>
																				

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=111&s_id=')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
							
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=111&s_id=28&o_q_id=102"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=111&s_id=28&o_q_id=102')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>



                        </td>		
                    </tr>
						                    <tr class="text-center">
                        <td>12</td>
                        <td></td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td>Question</td>
                                    <td><p>Which of the following is not true about single row functions?</p><br />
</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Option</td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> No.  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Correct </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Choices</p>
                                                </div>										
                                            </div>
                                                                                            <div class="Row">
                                                    <div class="Cell">
                                                        A                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_110" value="A" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>They operate on single row only and return one result per row</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														B                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_110" value="B" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>They accept arguments that could be a column or any expression.</p>
</p>
                                                    </div>													
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														C                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_110" value="C" checked="checked">
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>They cannot be nested</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														D                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_110" value="D" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>They may modify the data type</p>
</p>
                                                    </div>

                                                </div>



                                            



                                        </div>				
                                    </td>
                                </tr>
                                <tr><td>Marks</td><td>5</td></tr>								
                            </table>				
                        </td>
                        <td>
																				

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=110&s_id=')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
							
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=110&s_id=28&o_q_id=101"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=110&s_id=28&o_q_id=101')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>



                        </td>		
                    </tr>
						                    <tr class="text-center">
                        <td>13</td>
                        <td></td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td>Question</td>
                                    <td><p>A voltage will influence current only if the circuit is______.</p></td>
                                </tr>
                                <tr class="text-center">
                                    <td>Option</td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> No.  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Correct </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Choices</p>
                                                </div>										
                                            </div>
                                                                                            <div class="Row">
                                                    <div class="Cell">
                                                        A                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_48" value="A" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>open</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														B                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_48" value="B" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>insulated</p>
</p>
                                                    </div>													
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														C                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_48" value="C" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>high resistence</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														D                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_48" value="D" checked="checked">
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>close</p>
</p>
                                                    </div>

                                                </div>



                                            



                                        </div>				
                                    </td>
                                </tr>
                                <tr><td>Marks</td><td>5</td></tr>								
                            </table>				
                        </td>
                        <td>
																				

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=48&s_id=')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
							
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=48&s_id=27&o_q_id=14"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=48&s_id=27&o_q_id=14')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>



                        </td>		
                    </tr>
						                    <tr class="text-center">
                        <td>14</td>
                        <td></td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td>Question</td>
                                    <td><p>An atom&#39;s atomic number is determined by the number of________.</p></td>
                                </tr>
                                <tr class="text-center">
                                    <td>Option</td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> No.  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Correct </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Choices</p>
                                                </div>										
                                            </div>
                                                                                            <div class="Row">
                                                    <div class="Cell">
                                                        A                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_47" value="A" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>neutrons minus protons</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														B                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_47" value="B" checked="checked">
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>protons</p>
</p>
                                                    </div>													
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														C                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_47" value="C" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>electrons</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														D                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_47" value="D" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>neutrons</p>
</p>
                                                    </div>

                                                </div>



                                            



                                        </div>				
                                    </td>
                                </tr>
                                <tr><td>Marks</td><td>5</td></tr>								
                            </table>				
                        </td>
                        <td>
																				

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=47&s_id=')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
							
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=47&s_id=27&o_q_id=13"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=47&s_id=27&o_q_id=13')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>



                        </td>		
                    </tr>
						                    <tr class="text-center">
                        <td>15</td>
                        <td></td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td>Question</td>
                                    <td><p>Java was first developed in____.</p><br />
</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Option</td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> No.  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Correct </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Choices</p>
                                                </div>										
                                            </div>
                                                                                            <div class="Row">
                                                    <div class="Cell">
                                                        A                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_46" value="A" checked="checked">
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>1991</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														B                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_46" value="B" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>1990</p>
</p>
                                                    </div>													
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														C                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_46" value="C" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>1993</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														D                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_46" value="D" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>1996</p>
</p>
                                                    </div>

                                                </div>



                                            



                                        </div>				
                                    </td>
                                </tr>
                                <tr><td>Marks</td><td>5</td></tr>								
                            </table>				
                        </td>
                        <td>
																				

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=46&s_id=')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
							
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=46&s_id=26&o_q_id=12"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=46&s_id=26&o_q_id=12')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>



                        </td>		
                    </tr>
						                    <tr class="text-center">
                        <td>16</td>
                        <td></td>
                        <td>
                            <table border="0">
                                <tr class="text-center">
                                    <td>Question</td>
                                    <td><p>what is java???</p><br />
</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Option</td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> No.  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Correct </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> Choices</p>
                                                </div>										
                                            </div>
                                                                                            <div class="Row">
                                                    <div class="Cell">
                                                        A                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_45" value="A" checked="checked">
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>Programming language</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														B                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_45" value="B" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>method</p>
</p>
                                                    </div>													
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														C                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_45" value="C" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>function</p>
</p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														D                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_45" value="D" >
                                                    </div>
                                                    <div class="Cell">
                                                        <p><p>class</p>
</p>
                                                    </div>

                                                </div>



                                            



                                        </div>				
                                    </td>
                                </tr>
                                <tr><td>Marks</td><td>5</td></tr>								
                            </table>				
                        </td>
                        <td>
																				

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=45&s_id=')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> </a>
							
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=45&s_id=26&o_q_id=11"  class="btn btn-gray btn-small"><i class="icon-pencil"></i> </a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=45&s_id=26&o_q_id=11')" class="btn btn-red btn-small"><i class="icon-trash"></i>  </a>



                        </td>		
                    </tr>
						
            </tbody>
        </table>





    </div>
    				<div class="tab-pane box active" id="add" style="padding: 5px; display:none;>
				<form method="post" action="" class="form-horizontal validatable" enctype="multipart/form-data">
                        <form action="" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top" enctype="multipart/form-data">	
				
				<div class="padded">       
							<div class="control-group">
                                <label class="control-label">Course Name</label>
                                <div class="controls">
									<select name="s_id" class="validate[required]">
									<option value="">Select Course</option>  
										                                    	<option value="59">DCCO</option>
										
										                                    	<option value="60">Adavance Tally</option>
										
										                                    	<option value="61">MS-Office</option>
										
										                                    	<option value="62">Php</option>
										
										                                    	<option value="63">Erterfddf</option>
										
										                                    </select>
                                </div>
                            </div>
						</div>

				<div class="padded">  
					<div class="control-group">
						<label class="control-label">Question</label>
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
						<label class="control-label">Answer Type</label>
						<div class="controls">
						 <select name="typeofquestion" class="validate[required]"  onchange="showDiv(this)" id="pr_bookingtype">
							<option value="">Select Answer Type</option>
							<option value="Single">Single Selection</option>
							<option value="Multiple">Multiple Selection</option>  		
						</select> 
						</div>
					</div>
				</div>
				<div id="hidden_div_single" style="display: none;">
					<div class="padded">                   
					<div class="control-group">
					<div>Enter Choices</div>
					<div class="CSSTableGenerator" >
					<table >
					<tr>
					<td>
					No.  
					</td>
					<td >
					Correct 
					</td>
					<td>
					Choices					</td>
					</tr>
					<tr>
					<td><div>A</div></td>
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
					<td><div>B</div></td>
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
					<td><div>C</div></td>
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
					<td><div>D</div></td>
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
					<div>Enter Choices</div>
					<div class="CSSTableGenerator" >
					<table >
					<tr>
					<td>
					No.  
					</td>
					<td >
					Correct 
					</td>
					<td>
					Choices					</td>
					</tr>
					<tr>
					<td><div>A</div></td>
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
					<td><div>B</div></td>
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
					<td><div>C</div></td>
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
					<td><div>D</div></td>
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
						<label class="control-label">Set Marks</label>
						<div class="controls">
							<input type="text" class="validate[required,custom[integer]]" name="marks" maxlength="2" value=""/>
						</div>
					</div>
				</div>		
				<div class="form-actions">
					<button type="submit" class="btn btn-gray">Add Question</button>
					<input type="hidden" value="Add Question" name="submit">
					
					
				</div>
                 </form>                
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