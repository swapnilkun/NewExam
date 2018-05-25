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
                        <h3 class="title">
                        <i class="icon-lightbulb"></i>
                        <?php echo 'Hall Ticket';?> </h3>
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
				<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> <?php echo 'Hall Ticket';?> </a></li>
				
				</ul>
				</div>
	<div class="box-content padded">
		<div class="tab-content">
           
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
							
							<th><div><?php echo constant('TI_TABLE_EXAM_NAME');?></div></th>
							
							<th><div><?php echo constant('TI_TABLE_SUBJECT_NAME');?></div></th>
							
							<th><div><?php echo constant('TI_TABLE_TAKE_EXAM_DATE');?></div></th>
						
                    		<th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
						</tr>
					</thead>
                    <tbody>
							<?php 
						
							$query=mysqli_query($con,"select s.student_id,s.category_id,b.subject_name,e.exam_name,e.exam_date,e.e_id from student s left join subject b on s.subcategory_id=b.subcategory_id left join exam e on b.s_id=e.subject_id where student_id='".$_SESSION['student_id']."'");
										
										while($row=mysqli_fetch_array($query))
										{ 				
											
											//$query_Center=mysqli_fetch_array(mysqli_query($con,"select * from center where c_id='".$row['center_id']."'"));

											//$query_category_name=mysqli_fetch_array(mysqli_query($con,"select * from subject where subcategory_id='".$row['subcategory_id']."'"));


											//$query_exam=mysqli_fetch_array(mysqli_query($con,"select * from exam where subject_id='".$row['subject_id']."'"));
							?>
								<tr>
								
								<td><?php echo $row['exam_name'];?> </td>
								
								<td><?php echo $row['subject_name'];?> </td>
								
								<td><?php echo $row['exam_date'];?> </td>

								<td align="center">
									<a data-toggle="modal" target="_new" href="view_ticket.php?exam_id=<?php echo $row['e_id'];?>&exam_dy=<?php echo $row['exam_date'];?>&sid=<?php echo $row['student_id'];?>&caid=<?php echo $row['category_id'];?>" class="btn btn-gray btn-small"><i class="icon-wrench"></i> <?php echo 'View Hall Ticket'; ?></a>	
								</td>
								</tr>
						<?php $subject_name="";
									
								} ?>
                                
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
</html>