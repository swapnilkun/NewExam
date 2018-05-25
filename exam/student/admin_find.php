<?php
include('include/configure.php');
include('include/meta_tag.php');

$admin_id=intval($_GET['admin_id']);
if($admin_id=="admin")
{
	$query=mysqli_query($con,"SELECT * FROM user");
}

?>

<div class="box-content padded">
		<div class="tab-content">
           
            <div class="tab-pane box active" id="list">
			
                <table cellpadding="0" cellspacing="0" border="0" class="dataTable responsive">

                	<thead>
                		<tr>
							<th><div><input type="checkbox" id="cbgroup2_master" onchange="togglecheckboxes(this,'cbg2[]')"></div></th>
							<th><div><?php echo constant('TI_TABLE_USER_NAME');?></div></th> 							
							<th><div><?php echo constant('TI_TABLE_USER_EMAIL');?></div></th>  
							
						</tr>
					</thead>
                    <tbody>
							
							<div id="checkboxlist">
							<?php 
								
								$i=0;
								while($row=mysqli_fetch_array($query))
								{ 
							?>
								<tr>
								<td align="center"><input type="checkbox" id="cb1_1" class="chk" name="cbg2[]" value="<?php echo $row['u_id']?>"></td>
								<td><?php echo $row['username'];?> </td>
								<td><?php echo $row['useremail'];?> </td>
								
								</tr>

						<?php } ?> 
						</div>
					</tbody>
                </table>
				
				
			</div>
		</div>
	</div>