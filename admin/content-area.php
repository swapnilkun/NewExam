<?php 
/*$query2=mysqli_query($con,"select * from category");
confirm_query($query2);
$num_category=mysqli_num_rows($query2);
$query2s=mysqli_query($con,"select * from category where category_status=1");
confirm_query($query2s); 
$num_category_status=mysqli_num_rows($query2s);

$query3=mysqli_query($con,"select * from subcategory");
confirm_query($query3);
$num_subcategory=mysqli_num_rows($query3);
$query3s=mysqli_query($con,"select * from subcategory where subcategory_status=1");
confirm_query($query3s);
$num_subcategory_status=mysqli_num_rows($query3s);*/

$query3=mysqli_query($con,"select * from branch");
confirm_query($query3);
$num_branch=mysqli_num_rows($query3);
$query3s=mysqli_query($con,"select * from branch where branch_status=1");
confirm_query($query3s);
$num_branch_status=mysqli_num_rows($query3s);

$query4=mysqli_query($con,"select * from subject");
confirm_query($query4);
$num_subject=mysqli_num_rows($query4);
$query4s=mysqli_query($con,"select * from subject  where subject_status=1");
confirm_query($query4s);
$num_subject_status=mysqli_num_rows($query4s);

$query5=mysqli_query($con,"select * from teacher");
confirm_query($query5);
$num_center=mysqli_num_rows($query5);
$query5s=mysqli_query($con,"select * from teacher where teacher_status=1");
confirm_query($query5s);
$num_center_status=mysqli_num_rows($query5s);

$query6=mysqli_query($con,"select * from student");
confirm_query($query6);
$num_student=mysqli_num_rows($query6);
$query6s=mysqli_query($con,"select * from student where student_status=1");
confirm_query($query6s);
$num_student_status=mysqli_num_rows($query6s);

$query7=mysqli_query($con,"select * from exam");
confirm_query($query7);
$num_exam=mysqli_num_rows($query7);
$query7s=mysqli_query($con,"select * from exam where exam_status=1");
confirm_query($query7s);
$num_exam_status=mysqli_num_rows($query7s);

$query8=mysqli_query($con,"select * from question");
confirm_query($query8);
$num_question=mysqli_num_rows($query8);
$query8s=mysqli_query($con,"select * from question where question_status=1");
confirm_query($query8s);
$num_question_status=mysqli_num_rows($query8s);

$query9=mysqli_query($con,"select * from user");
confirm_query($query9);
$num_user=mysqli_num_rows($query9);
$query9s=mysqli_query($con,"select * from user where user_status=1");
confirm_query($query9s);
$num_user_status=mysqli_num_rows($query9s);


$query10=mysqli_query($con,"select * from notice where admin_id='".$_SESSION['user_id']."'");
confirm_query($query10);
$num_notice=mysqli_num_rows($query10);
$query10s=mysqli_query($con,"select * from notice where admin_id='".$_SESSION['user_id']."' and status=1");
confirm_query($query10s);
$num_notice_status=mysqli_num_rows($query10s);
?>
<div class="container-fluid padded">
   	<div class="container-fluid padded">
		<div class="row-fluid">
			<div class="span30">				
				<div class="action-nav-normal">
					<div class="row-fluid">
						<div class="span2 action-nav-button">
							<a href="home.php">
                            <i class="icon-desktop"></i>      
							<span><?php echo constant('TI_DESBOARD_ICON_DASHBOARD');?></span>                            
							</a>
						</div>
						<?php 
					/*	if (in_array("2", $explode_permistion) or in_array("0", $explode_permistion))
						{?>
							<div class="span2 action-nav-button">
								<a href="category.php">
								<i class="icon-folder-close"></i> 
								<span><?php echo constant('TI_DESBOARD_ICON_COURSE');?></span> 
								<span class="label label-total"><?php echo constant('TI_LABEL_T');?><?php echo $num_category;?></span>
								<span class="label-active label-total"><?php echo constant('TI_LABEL_A');?><?php echo $num_category_status;?></span>
								</a>
							</div>
							
						<?php }

						if (in_array("3", $explode_permistion) or in_array("0", $explode_permistion))
						{?>
							<div class="span2 action-nav-button">
								<a href="sub_category.php">
								<i class="icon-tags"></i> 
								<span><?php echo constant('TI_DESBOARD_ICON_CLASS');?></span>
								<span class="label label-total"><?php echo constant('TI_LABEL_T');?><?php echo $num_subcategory;?></span>	
								<span class="label-active label-total"><?php echo constant('TI_LABEL_A');?><?php echo $num_subcategory_status;?></span>
								</a>							
							</div>
						<?php }*/
						if (in_array("4", $explode_permistion) or in_array("0", $explode_permistion))
						{
							?>

							<div class="span2 action-nav-button">
								<a href="subject.php">
								<i class="icon-tag"></i> 
								<span><?php echo constant('TI_DESBOARD_ICON_COURSE');?></span>
								<span class="label label-total"><?php echo constant('TI_LABEL_T');?><?php echo $num_subject;?></span>
								<span class="label-active label-total"><?php echo constant('TI_LABEL_A');?><?php echo $num_subject_status;?></span>
								</a>							
							</div>
						<?php }
						if (in_array("5", $explode_permistion) or in_array("0", $explode_permistion))
						{?>

							<div class="span2 action-nav-button">
								<a href="center.php">
								<i class="icon-building"></i> 
								<span><?php echo constant('TI_DESBOARD_ICON_BRANCH_MANAGER');?></span>
								<span class="label label-total"><?php echo constant('TI_LABEL_T');?><?php echo $num_center;?></span>
								<span class="label-active label-total"><?php echo constant('TI_LABEL_A');?><?php echo $num_center_status;?></span>
								</a>
							</div>

						<?php }
      					if (in_array("5", $explode_permistion) or in_array("0", $explode_permistion))
						{?>

							<div class="span2 action-nav-button">
								<a href="branch.php">
								<i class="icon-building"></i> 
								<span><?php echo constant('TI_DESBOARD_ICON_BRANCH');?></span>
								<span class="label label-total"><?php echo constant('TI_LABEL_T');?><?php echo $num_branch;?></span>
								<span class="label-active label-total"><?php echo constant('TI_LABEL_A');?><?php echo $num_branch_status;?></span>
								</a>
							</div>

						<?php } 
						if (in_array("6", $explode_permistion) or in_array("0", $explode_permistion))
						{?>

							<div class="span2 action-nav-button">
								<a href="student.php">
								<i class="icon-male"></i>
								<span><?php echo constant('TI_DESBOARD_ICON_STUDENT');?></span>
								<span class="label badge-inverse"><?php echo constant('TI_LABEL_T');?><?php echo $num_student;?></span>
								<span class="label-active label-total"><?php echo constant('TI_LABEL_A');?><?php echo $num_student_status;?></span>
								</a>
							</div>	
						<?php } 
						
						if (in_array("6", $explode_permistion) or in_array("0", $explode_permistion))
						{?>

							<div class="span2 action-nav-button">
								<a href="staff.php">
								<i class="icon-male"></i>
								<span><?php echo constant('TI_DESBOARD_ICON_STAFF');?></span>
								<span class="label badge-inverse"><?php echo constant('TI_LABEL_T');?><?php echo $num_staff;?></span>
								<span class="label-active label-total"><?php echo constant('TI_LABEL_A');?><?php echo $num_staff_status;?></span>
								</a>
							</div>	
						<?php } ?>
                       </div>
					
					
					<div class="row-fluid">	
					
					
					<?php
					if (in_array("7", $explode_permistion) or in_array("0", $explode_permistion))
					{?>
						<div class="span2 action-nav-button">
							<a href="exam.php">
							<i class="icon-book"></i>
							<span><?php echo constant('TI_EXAM');?></span>
							<span class="label label-total"><?php echo constant('TI_LABEL_T');?><?php echo $num_exam;?></span>	
							<span class="label-active label-total"><?php echo constant('TI_LABEL_A');?><?php echo $num_exam_status;?></span>
							</a>
						</div>
					   	
					<?php
					}
					 
					 
					 	if (in_array("6", $explode_permistion) or in_array("0", $explode_permistion))
						{?>

							<div class="span2 action-nav-button">
								<a href="enquiry.php">
								<i class="icon-male"></i>
								<span><?php echo constant('TI_DESBOARD_ICON_ENQUIRY');?></span>
								<span class="label badge-inverse"><?php echo constant('TI_LABEL_T');?><?php echo $num_staff;?></span>
								<span class="label-active label-total"><?php echo constant('TI_LABEL_A');?><?php echo $num_staff_status;?></span>
								</a>
							</div>	
						<?php }
						
							if (in_array("6", $explode_permistion) or in_array("0", $explode_permistion))
						{?>

							<div class="span2 action-nav-button">
								<a href="payment.php">
								<i class="icon-male"></i>
								<span><?php echo constant('TI_DESBOARD_ICON_PAYMENT');?></span>
								<span class="label badge-inverse"><?php echo constant('TI_LABEL_T');?><?php echo $num_staff;?></span>
								<span class="label-active label-total"><?php echo constant('TI_LABEL_A');?><?php echo $num_staff_status;?></span>
								</a>
							</div>	
						<?php }
						
					if (in_array("11", $explode_permistion) or in_array("0", $explode_permistion))
					{
						?>

						<div class="span2 action-nav-button">
							<a href="question.php">
							<i class="icon-question-sign"></i>
							<span><?php echo constant('TI_DESBOARD_ICON_QUESTION');?></span>
							<span class="label label-total"><?php echo constant('TI_LABEL_T');?><?php echo $num_question;?></span>
							<span class="label-active label-total"><?php echo constant('TI_LABEL_A');?><?php echo $num_question_status;?></span>
							</a>
						</div>
						
				
						<?php 
						}if (in_array("9", $explode_permistion) or in_array("0", $explode_permistion))
						{?>
						<div class="span2 action-nav-button">
							<a href="general_setting.php">
							<i class="icon-wrench"></i>
							<span><?php echo constant('TI_DESBOARD_ICON_GENERAL_SETTINGS');?></span>
							</a>
						</div>
						<?php
						}
						if (in_array("10", $explode_permistion) or in_array("0", $explode_permistion))
						{?>
						<div class="span2 action-nav-button">
							<a href="user.php">
							<i class="icon-user"></i>
							<span><?php echo constant('TI_DESBOARD_ICON_USER');?></span>
							<span class="label label-total"><?php echo constant('TI_LABEL_T');?><?php echo $num_user;?></span>
							<span class="label-active label-total"><?php echo constant('TI_LABEL_A');?><?php echo $num_user_status;?></span>
							</a>
						</div>
						<?php }
					
							?>	

					</div>
					<div class="row-fluid">	
				       <?PHP 
						if (in_array("12", $explode_permistion) or in_array("0", $explode_permistion))
						{ ?>
						<div class="span2 action-nav-button">
							<a href="notice.php">
							<i class="icon-envelope-alt"></i>
							<span><?php echo constant('TI_DESBOARD_ICON_INSTRUCTION');?></span>
							<span class="label label-total"><?php echo constant('TI_LABEL_T');?><?php echo $num_notice;?></span>
							<span class="label-active label-total"><?php echo constant('TI_LABEL_A');?><?php echo $num_notice_status;?></span>
							</a>
						</div>
						
						<?php }
						
						if (in_array("13", $explode_permistion) or in_array("0", $explode_permistion))
						{?>
						<div class="span2 action-nav-button">
							<a href="selectresult.php">
							<i class="icon-trophy"></i>
							<span><?php echo constant('TI_LEFT_MENU_VIEW_RESULT');?></span>
							
							</a>
						</div>
						<?php }
					/* if (in_array("14", $explode_permistion) or in_array("0", $explode_permistion))
					{?>
						<div class="span2 action-nav-button">
							<a href="question_set.php">
							<i class="icon-question-sign"></i>
							<span><?php echo 'Question Set';?></span>
							
							</a>
						</div>
					<?php
					} */
					
				
					if (in_array("14", $explode_permistion) or in_array("0", $explode_permistion))
					{?>
						<div class="span2 action-nav-button">
							<a href="hall_ticket.php">
							<i class="icon-question-sign"></i>
							<span><?php echo 'Hall Ticket';?></span>
							
							</a>
						</div>
					<?php
					}
					
					
					if (in_array("14", $explode_permistion) or in_array("0", $explode_permistion))
					{?>
						<div class="span2 action-nav-button">
							<a href="batch.php">
							<i class="icon-screenshot"></i>
							<span><?php echo constant('TI_DESBOARD_ICON_BATCH');?></span>
							
							</a>
						</div>
					<?php
					}
				
					
					if (in_array("15", $explode_permistion) or in_array("0", $explode_permistion))
					{?>
						<div class="span2 action-nav-button">
							<a href="export_table.php">
							<i class="icon-download"></i>
							<span><?php echo constant('TI_DESBOARD_ICON_EXPORT');?></span>
							
							</a>
						</div>
					<?php
					}
					
					if (in_array("16", $explode_permistion) or in_array("0", $explode_permistion))
					{?>
						<div class="span2 action-nav-button">
							<a href="import_table.php">
							<i class="icon-upload"></i>
							<span><?php echo constant('TI_DESBOARD_ICON_IMPORT');?></span>
							
							</a>
						</div>
				
						<?php }
					
							?>	

					</div>
					<div class="row-fluid">	
				       <?PHP 
				
					if (in_array("14", $explode_permistion) or in_array("0", $explode_permistion))
					{?>
						<div class="span2 action-nav-button">
							<a href="expenses.php">
							<i class="icon-question-sign"></i>
							<span><?php echo 'Expenses';?></span>
							
							</a>
						</div>
					<?php
					} 
					?>
					
					</div>


	<div class="row-fluid">
		<div class="span6">
			<div class="box">
				<div class="box-header">
					<span class="title"><i class="icon-reorder"></i>&nbsp;<?php echo constant('TI_DESBOARD_ICON_CATEGORY');?></span>
				</div>
				<div class="box-content scrollable" style="max-height: 500px; overflow-y: auto">
					<div class="box-section news with-icons">
						<?php $query_category=mysqli_query($con,"select * from category");
						while($result_category=mysqli_fetch_array($query_category))
						{	
							$Category_name[]=$result_category['category_name'];
							$query_student=mysqli_query($con,"select * from student where category_id='".$result_category['c_id']."'");
							$count_num_row_student[]=mysqli_num_rows($query_student);
						}
						$count_array_size=count($count_num_row_student);

						?>

					<script type="text/javascript" src="https://www.google.com/jsapi"></script>
					<script type="text/javascript">

					  // Load the Visualization API and the piechart package.
					  google.load('visualization', '1.0', {'packages':['corechart']});

					  // Set a callback to run when the Google Visualization API is loaded.
					  google.setOnLoadCallback(drawChart);

					  // Callback that creates and populates a data table,
					  // instantiates the pie chart, passes in the data and
					  // draws it.
					  function drawChart() {
						// Create the data table.
						var data = new google.visualization.DataTable();
						data.addColumn('string', 'Topping');
						data.addColumn('number', 'Slices');

						data.addRows([			

						<?php
						for($i=0;$i<$count_array_size;$i++)
						{
							echo "['".$Category_name[$i]."',".$count_num_row_student[$i]."],";
						}
						?>         
						]);

						// Set chart options
						var options = {'title':'<?php echo TI_CHART_HEADING_CATEGORY_ADMIN;?>', 'width':450,'height':300};

						// Instantiate and draw our chart, passing in some options.
						var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
						chart.draw(data, options);
					  }
					</script>
				<!--Div that will hold the pie chart-->
				<div id="chart_div"></div>


					</div>
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="box">
				<div class="box-header">
					<span class="title"><i class="icon-reorder"></i>&nbsp;<?php echo constant('TI_EXAM');?></span>
				</div>
				<div class="box-content scrollable" style="max-height: 500px; overflow-y: auto">
					<div class="box-section news with-icons">

					<?php 
					
					 $current_date= date('Y-m-d',strtotime("-7 days"));//date last seven day					
					
					$query_category_exam=mysqli_query($con,"select * from exam");
						while($result_category_exam=mysqli_fetch_array($query_category_exam))
						{	
							$Category_name_exam[]=$result_category_exam['exam_name'];//category name						

							$query_main_exam_status=mysqli_query($con,"select * from practice_exam_status where exam_id='".$result_category_exam['e_id']."' and exam_date >= '".$current_date."'");

							$count_num_row_main_exam_status[]=mysqli_num_rows($query_main_exam_status);//category count num rows in exam
						}

						 $count_array_size_exam=count($count_num_row_main_exam_status);

						?>

					<script type="text/javascript" src="https://www.google.com/jsapi"></script>
					<script type="text/javascript">

					  // Load the Visualization API and the piechart package.
					  google.load('visualization', '1.0', {'packages':['corechart']});

					  // Set a callback to run when the Google Visualization API is loaded.
					  google.setOnLoadCallback(drawChart);

					  // Callback that creates and populates a data table,
					  // instantiates the pie chart, passes in the data and
					  // draws it.
					  function drawChart() {

						// Create the data table.
						var data = new google.visualization.DataTable();
						data.addColumn('string', 'Topping');
						data.addColumn('number', 'Slices');

						data.addRows([			

						<?php
						for($i=0;$i<$count_array_size_exam;$i++)
						{
							echo "['".$Category_name_exam[$i]."',".$count_num_row_main_exam_status[$i]."],";
						}
						?>         
						]);

						// Set chart options
						var options = {'title':'<?php echo TI_CHART_HEADING_EXAM_ADMIN;?>', 'width':450,'height':300};

						// Instantiate and draw our chart, passing in some options.
						var chart = new google.visualization.PieChart(document.getElementById('chart_div_exam'));
						chart.draw(data, options);
					  }
					</script>
					<!--Div that will hold the pie chart-->
					<div id="chart_div_exam"></div>


					</div>
				</div>
			</div>
		</div>    
   </div>

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
</html>