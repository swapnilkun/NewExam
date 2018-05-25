<?php 

$query6=mysqli_query($con,"select * from student where center_id='".$_SESSION['center_id']."'");
confirm_query($query6);
$num_student=mysqli_num_rows($query6);
$query6s=mysqli_query($con,"select * from student where center_id='".$_SESSION['center_id']."' and student_status=1");
confirm_query($query6s);
$num_student_status=mysqli_num_rows($query6s);

$query7=mysqli_query($con,"select * from practice_exam where center_id='".$_SESSION['center_id']."'");
confirm_query($query7);
$num_exam=mysqli_num_rows($query7);
$query7s=mysqli_query($con,"select * from exam where center_id='".$_SESSION['center_id']."' and  exam_status=1");
confirm_query($query7s);
$num_exam_status=mysqli_num_rows($query7s);

$query8=mysqli_query($con,"select * from practice_question  where center_id='".$_SESSION['center_id']."'");
confirm_query($query8);
$num_question=mysqli_num_rows($query8);
$query8s=mysqli_query($con,"select * from practice_question where center_id='".$_SESSION['center_id']."' and question_status=1");
confirm_query($query8s);
$num_question_status=mysqli_num_rows($query8s);

$query9=mysqli_query($con,"select * from user");
confirm_query($query9);
$num_user=mysqli_num_rows($query9);
$query9s=mysqli_query($con,"select * from user where user_status=1");
confirm_query($query9s);
$num_user_status=mysqli_num_rows($query9s);

$query10=mysqli_query($con,"select * from notice where center_id='".$_SESSION['center_id']."'");
confirm_query($query10);
$num_notice=mysqli_num_rows($query10);
$query10s=mysqli_query($con,"select * from notice where center_id='".$_SESSION['center_id']."' and status=1");
confirm_query($query10s);
$num_notice_status=mysqli_num_rows($query10s);

$query11=mysqli_query($con,"select * from noticecenter where center_id='".$_SESSION['center_id']."'");
confirm_query($query11);
$num_admin_notice=mysqli_num_rows($query11);

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
						<div class="span2 action-nav-button">
							<a href="student.php">
							<i class="icon-male"></i>
							<span><?php echo constant('TI_DESBOARD_ICON_STUDENT');?></span>
							<span class="label badge-inverse">T:<?php echo $num_student;?></span>
							<span class="label-active label-total">A:<?php echo $num_student_status;?></span>
							</a>
						</div>		

						<div class="span2 action-nav-button">
							<a href="exam.php">
							<i class="icon-book"></i>
							<span><?php echo constant('TI_EXAM');?></span>
							<span class="label label-total">T:<?php echo $num_exam;?></span>	
							<span class="label-active label-total">A:<?php echo $num_exam_status;?></span>
							</a>
						</div>
						<div class="span2 action-nav-button">
							<a href="question_add_sort.php">
							<i class="icon-question-sign"></i>
							<span><?php echo constant('TI_DESBOARD_ICON_QUESTION');?></span>
							<span class="label label-total">T:<?php echo $num_question;?></span>
							<span class="label-active label-total">A:<?php echo $num_question_status;?></span>
							</a>
						</div>

						<div class="span2 action-nav-button">
							<a href="notice.php">
							<i class="icon-list-ol"></i>
							<span><?php echo constant('TI_DESBOARD_ICON_NOTICE_STUDENT');?></span>
							<span class="label label-total">T:<?php echo $num_notice;?></span>
							<span class="label-active label-total">A:<?php echo $num_notice_status;?></span>
							</a>
						</div>

						<div class="span2 action-nav-button">
							<a href="notice_admin.php">
							<i class="icon-inbox"></i>
							<span><?php echo constant('TI_DESBOARD_ICON_NOTINE_ADMIN');?></span>
							<span class="label label-total">T:<?php echo $num_admin_notice;?></span>
							
							</a>
						</div>
                    </div>
					<div class="row-fluid">						
						<div class="span2 action-nav-button">
							<a href="contact.php">
							<i class="icon-envelope"></i>
							<span><?php echo constant('TI_DESBOARD_ICON_CONTACT');?></span>
							
							</a>
						</div>
                    		
						<div class="span2 action-nav-button">
							<a href="import_table.php">
							<i class="icon-upload"></i>
							<span><?php echo "Import";?></span>
							
							</a>
						</div>
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
							$query_student=mysqli_query($con,"select * from student where category_id='".$result_category['c_id']."' and center_id='".$_SESSION['center_id']."'");
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
							$query_main_exam_status=mysqli_query($con,"select * from practice_exam_status where exam_id='".$result_category_exam['e_id']."' and exam_date >= '".$current_date."' and center_id='".$_SESSION['center_id']."'");
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