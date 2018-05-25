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
							<a href="selectexam.php">
							<i class="icon-question-sign"></i>
							<span><?php echo constant('TI_DESHBOARD_PRACTICE_TEST');?></span></a>
						</div>	
						<div class="span2 action-nav-button">
							<a href="practice_history.php">
							<i class="icon-lightbulb"></i>
							<span><?php echo constant('TI_DESHBOARD_PRACTICE_TEST_HISTOY');?></span>
							
							</a>
						</div>				
						<div class="span2 action-nav-button">
							<a href="selectmainexam.php">
							<i class="icon-trophy"></i>
							<span><?php echo constant('TI_DESHBOARD_MAIN_TEST');?></span>
							
							</a>
						</div>
						<div class="span2 action-nav-button">
							<a href="maintest_history.php">
							<i class="icon-book"></i>
							<span><?php echo constant('TI_DESHBOARD_MAIN_TEST_HISTOY');?></span>
							
							</a>
						</div>
						
						<div class="span2 action-nav-button">
							<a href="hall_ticket.php">
                            <i class="icon-book"></i>      
							<span><?php echo 'Hall Ticket';?></span>                            
							</a>
						</div>
                    </div>
					


                    <div class="row-fluid">
						<div class="span2 action-nav-button">
							<a href="notice.php">
                            <i class="icon-list-ol"></i>      
							<span><?php echo constant('TI_DESHBOARD_NOTICE');?></span>                            
							</a>
						</div>
						<div class="span2 action-nav-button">
							<a href="contact.php">
							<i class="icon-envelope-alt"></i>
							<span><?php echo constant('TI_DESHBOARD_CONTACT_US');?></span></a>
						</div>	
						
						
                    </div>




<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="col-lg-6 col-md-6">
				<div class="box-header">
					<span class="title"><i class="icon-reorder"></i>&nbsp;<?php echo TI_MANAGE_MAIN_TEST;?></span>
				</div>
				<div class="box-content scrollable" style="max-height: 500px; overflow-y: auto">
					<div class="box-section news with-icons">
						<?php $query_category=mysqli_query($con,"select * from exam");
						while($result_category=mysqli_fetch_array($query_category))
						{	
							$Category_name[]=$result_category['exam_name'];
							$query_student=mysqli_query($con,"select * from practice_exam_status where exam_id='".$result_category['e_id']."'");
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
						data.addColumn('string', 'Exam');
						data.addColumn('number', 'Attempts');

						data.addRows([			

						<?php
						for($i=0;$i<$count_array_size;$i++)
						{
							echo "['".$Category_name[$i]."',".$count_num_row_student[$i]."],";
						}
						?>         
						]);

						// Set chart options
						var options = {'title':'<?php echo TI_EXAM_TAKEN_GRAPH;?>', 'width':450,'height':300};

						// Instantiate and draw our chart, passing in some options.
						//var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
						var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
						chart.draw(data, options);
					  }
					</script>
				<!--Div that will hold the pie chart-->
				<div id="chart_div"></div>


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
   
  
    </div>
  <?php include("copyright.php");?>
	</div>
	</div>
</body>
</html>