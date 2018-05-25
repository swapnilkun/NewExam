<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
?>

<?php
if(isset($_POST['submit']) and $_POST['staff_id']!="")
{	
    $branch_name=mysql_prep($_POST['branch_name']);
	$staff_name=mysql_prep($_POST['staff_name']);
	$staff_address=mysql_prep($_POST['staff_address']);
	$phone_no=mysql_prep($_POST['phone_no']);
	$email = mysql_prep($_POST['email']);

		
		$query=mysqli_query($con,"update staff set staff_name='{$staff_name}',branch_name='{$branch_name}', staff_address='{$staff_address}',phone_no='{$phone_no}',email='{$email}' where staff_id='".$_POST['staff_id']."'");
	
		if($query)
		{
			$message_success .=constant('TI_STAFF_EDIT_MESSAGE');
			
				header("Location:staff.php");
		}
		else
		{
		$error .= constant('TI_STAFF_EDIT_MYSQL_ERROR');
	}		   
	
}
if($_GET['staff_id']!="")
{
	$staff_id=$_GET['staff_id'];
	$query=mysqli_query($con,"select * from staff where staff_id='".$staff_id."'");
	$result=mysqli_fetch_array($query);
}

?>
<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i><?php echo "Manage Staff";?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-wrench"></i><?php echo "Edit Staff";?></a>
					</li>
				</ul>	
			</div>
	<div class="box-content padded">
		<div class="tab-content">        
			<?php include("message.php");?>
			<div class="tab-pane active" id="add" style="padding: 5px">
				<form method="post" action="" class="form-horizontal validatable" enctype="multipart/form-data">
                         
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_BRANCH_NAME');?></label>
                                <div class="controls">
									<select name="branch_name" class="chzn-select">
									<option value="">Select Branch</option>  
										<?php $query_course=mysqli_query($con,"select * from branch");
										while($result_course=mysqli_fetch_array($query_course))
										{
										?>
                                    	<!--<option value="<?php echo $result_course['branch_name'];?>"><?php echo ucfirst($result_course['branch_name']);?></option>-->
                                    		 <option value="<?php echo $result_course['branch_name']; ?>" <?php if($result_course['branch_name'] == $result['branch_name']) { echo "selected=selected"; }?>> <?php echo $result_course['branch_name']; ?></option>
							
										
										<?php }?>
                                    </select>
                                </div>
                            </div>
					
						
                            <div class="control-group">
                                <label class="control-label"><?php echo "Staff Name";?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="staff_name" value="<?php echo $result['staff_name'];?>"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo "Staff Address";?> </label>
                                <div class="controls">                                    
									<div class="box closable-chat-box">
									
									<div class="chat-message-box">
									<textarea name="staff_address" id="text_for_signature" rows="5" placeholder="Add Center"><?php echo $result['staff_address'];?></textarea>
									
									</div>
									</div>
                                </div>
                            </div>
							 <div class="control-group">
                                <label class="control-label"><?php echo "Phone No.";?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="phone_no"value="<?php echo $result['phone_no'];?>" />
                                </div>
                            </div>          
							
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_CENTER_EMAIL');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required,custom[email]]" name="email" value="<?php echo $result['email'];?>"/>
                                </div>
                            </div>
						
					 </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo "Edit Staff";?> </button>
							<input type="hidden" value="Update_setting" name="submit">
							<input type="hidden" value="<?php echo $result['staff_id'];?>" name="staff_id">
                        </div>
                    </form>                
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