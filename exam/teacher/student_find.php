<?php
include('include/configure.php');
include('include/meta_tag.php');

$category_id=intval($_GET['category_id']);
$query=mysqli_query($con,"SELECT * FROM student WHERE category_id=".$category_id." and center_id='".$_SESSION['center_id']."' and student_status=1");

?>

<div class="box-content padded">
		<div class="tab-content">           
            <div class="tab-pane box active" id="list">			
                <table cellpadding="0" cellspacing="0" border="0" class="dataTable responsive">
                	<thead>
                		<tr>
							<th><div><input type="checkbox" id="cbgroup1_master" onchange="togglecheckboxes(this,'cbg1[]')"></div></th>
							<th><div><?php echo constant('TI_TABLE_CATEGORY_NAME');?></div></th> 							
							<th><div><?php echo constant('TI_TABLE_STUDENT_NAME');?></div></th>  
							<th><div><?php echo constant('TI_TABLE_STUDENT_FATHER_NAME');?></div></th> 
						</tr>
					</thead>
                    <tbody>
							
							<div id="checkboxlist">
							<?php 
								$i=0;
								while($row=mysqli_fetch_array($query))
								{ 
									$query_category_name=mysqli_fetch_array(mysqli_query($con,"select * from category where c_id='".$row['category_id']."'"));
									$query_center_name=mysqli_fetch_array(mysqli_query($con,"select * from teacher where center_id='".$row['center_id']."'"));
							?>
								<tr>
								<td align="center">
								<input type="checkbox" id="cb1_1" class="chk" name="cbg1[]" value="<?php echo $row['student_id']?>">
								</td>
								<td><?php echo $query_category_name['category_name'];?> </td>
								<td><?php echo $row['student_name'];?> </td>
								<td><?php echo $row['student_father'];?> </td>
								</tr>

						<?php } ?> 
						</div>
					</tbody>
                </table>
			</div>
		</div>
	</div>

