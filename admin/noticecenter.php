<?php
include('include/configure.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
?>

<script> 
function togglecheckboxes(master,group)
{ 
	var cbarray = document.getElementsByName(group); 
	for(var i = 0; i < cbarray.length; i++)
	{
		cbarray[i].checked = master.checked; 
	}
} 
</script>

<?php

if (isset($_POST['submit'])) 
{ 
	  if($_POST['cbg1']!="")
	 {
			$checkBox1 = implode(',', $_POST['cbg1']);
			
			$checkBox= explode(',',$checkBox1);
			
			$query=mysqli_query($con,"delete from noticecenter where notice_id='".$_REQUEST['n_id']."'");
            
			for ($i=0; $i<sizeof($checkBox); $i++)
			{
                $query_date=mysqli_fetch_array(mysqli_query($con,"select * from notice where n_id='".$_REQUEST['n_id']."' "));

				$query_insert=mysqli_query($con,"insert into noticecenter (center_id,notice_id,notice_date) values('".$checkBox[$i]."','".$_REQUEST['n_id']."','".$query_date['notice_date']."')"); 

			}

			if($query_insert)
			{
			$message_success .= constant('TI_NOTICE_ADDED_SUCCESS_MESSAGE');
			}
			else
			{
				$error .= constant('TI_NOTICE_ADDED_FAILED_MESSAGE');
				$error .= "<p>" . mysqli_error($con) . "</p>";
			}
			
    }
 else
	{
	
	$message_success .= constant('TI_NOTICE_SELECT_CENTER_FIRST');

    }
  
}

?><div class="main-content">
                    <div class="container-fluid" >
            <div class="row-fluid">
                <div class="area-top clearfix">
                    <div class="pull-left header">
                        <h3 class="title">
                        <i class="icon-edit"></i>
                        <?php echo constant('TI_NOTICE_FOR_CENTERS');?> </h3>
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
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo constant('TI_CENTER_LIST');?></a></li>
			
		</ul>
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
           
            <div class="tab-pane box active" id="list">
			<form action="noticecenter.php?n_id=<?php echo $_REQUEST['n_id'];?>" method="post">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
							<th><div><input type="checkbox" id="cbgroup1_master" onchange="togglecheckboxes(this,'cbg1[]')"></div></th>
							
							<th><div><?php echo "Teacher Name";?></div></th> 
							
						</tr>
					</thead>
                    <tbody>
							
                    <?php 
								$query=mysqli_query($con,"select * from teacher ");
								$i=0;
								while($row=mysqli_fetch_array($query))
								{ 
									$query_center=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM noticecenter where notice_id='".$_REQUEST['n_id']."' and  center_id='".$row['c_id']."' "));
									
									$i++;
										
							?>
								<tr>
								<td align="center">
								
								<?php if($query_center['center_id']==$row['center_id']){?>
							     
								<input type="checkbox" id="cb1_1" class="cbgroup1" name="cbg1[]" value="<?php echo $row['center_id']?>" checked>
								<?php }else{?>
								<input type="checkbox" id="cb1_1" class="cbgroup1" name="cbg1[]" value="<?php echo $row['center_id']?>">
								<?php }?>
								
								</td>
								<td><?php echo $row['teacher_name'];?> </td>
								</tr>
						<?php } ?>            
					</tbody>
                </table>
				<div><input type="submit" value="Submit" name="submit" class="btn btn-gray"></div>
				 </form>
			</div>
		</div>
	</div>
</div>
</div>   
   <?php include("copyright.php");?>  
</div>

</body>
</html>