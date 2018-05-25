<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
?>
  
<?php
if(isset($_POST['submit']) and $_POST['branch_id']!="")
{	

	$branch_name=mysql_prep($_POST['branch_name']);
	$branch_address=mysql_prep($_POST['$branch_address']);


	  echo 	$query=mysqli_query($con,"update branch set branch_name='{$branch_name}', branch_address='{$branch_address}' where branch_id='".$_POST['branch_id']."'");
	
		//$query=mysqli_query($con,"update teacher set category_id='{$category_id}',subcategory_id='{$subcategory_id}',subject_id='{$subject_id}',teacher_name='{$teacher_name}', teacher_addr='{$teacher_addr}',teacher_id='{$teacher_id}',phone_no='{$phone_no}',username='{$username}',password_md5='{$password_md5}',password='{$password}' where center_id='".$_POST['center_id']."'");
		if($query)
		{
			$message_success .=constant('TI_BRANCH_EDIT_MESSAGE');
		}
		else
		{
		$error .= constant('TI_BRANCH_MYSQL_ERROR');
		}		   
	
}
if($_GET['branch_id']!="")
{
	$branch_id=$_GET['branch_id'];
	$query=mysqli_query($con,"select * from branch where branch_id='".$branch_id."'");
	$result=mysqli_fetch_array($query);
}

?>
<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i><?php echo "Manage Branch";?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-wrench"></i><?php echo "Edit Branch";?></a>
					</li>
				</ul>	
			</div>
	<div class="box-content padded">
		<div class="tab-content">        
			<?php include("message.php");?>
			<div class="tab-pane active" id="add" style="padding: 5px">
				<form method="post" action="" class="form-horizontal validatable" enctype="multipart/form-data">
                      	 
                            <div class="control-group">
                                <label class="control-label"><?php echo "Branch Name";?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="branch_name" value="<?php echo $result['branch_name'];?>"/>
                                </div>
                            </div>
							
                            	<div class="control-group">
                                <label class="control-label"><?php echo "Branch Address";?> </label>
                                <div class="controls">                                    
									<div class="box closable-chat-box">									
									<div class="chat-message-box">
									<textarea name="branch_address" id="text_for_signature" rows="5" placeholder="Add Address"> <?php echo $result['branch_address'];?></textarea>									
									</div>
									</div>
                                </div>
                            </div>
							
						
							
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo "Edit Branch";?> </button>
							<input type="hidden" value="Update_setting" name="submit">
							<input type="hidden" value="<?php echo $result['branch_id'];?>" name="branch_id">
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