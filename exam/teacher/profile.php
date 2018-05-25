<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
if(isset($_POST['submit']) and $_POST['center_id']!="")
{			
	$teacher_name=mysql_prep($_POST['teacher_name']);
	$teacher_addr=mysql_prep($_POST['teacher_addr']);
	$username=mysql_prep($_POST['username']);
	$password_md5=encrypt($_POST['password']);
	$password=mysql_prep($_POST['password']);
	$email = mysql_real_escape_string($_POST['email']);
	$phoneno=mysql_prep($_POST['phoneno']);
	$about_teacher=mysql_prep($_POST['about_teacher']);

	
	

	$sql = "SELECT email FROM teacher WHERE email='$email'";
	$result = mysqli_query($con,$sql);

	if(mysqli_num_rows($result) >0)
	{
		$query=mysqli_query($con,"update teacher set teacher_name='{$teacher_name}', about_teacher='{$about_teacher}', teacher_addr='{$teacher_addr}', phoneno='{$phoneno}', password_md5='{$password_md5}',password='{$password}' where center_id='".$_POST['center_id']."'");


		if($_FILES['teacher_logo']['name']!="")
		{		
			$img_dir="../images/logo/centerlogo/";	
			list($width, $height, $type, $attr) = getimagesize($_FILES["teacherlogo"]['tmp_name']);		
			if($width<='200' && $height<='200')
			{
				$img = explode('.', $_FILES['teacher_logo']['name']);	
				$img_type=$img[1];//image type(like jpg.png,gif,bmp)
				$extension_type = strtolower($img_type);

				if(in_array($extension_type , array('jpg','jpeg', 'gif', 'png', 'bmp')))
				{
					if($extension_type=='jpg' || $extension_type=='jpeg' || $extension_type=='gif' || $extension_type=='png' || $extension_type=='bmp')
					{
						$originalImage=$img_dir.$_FILES['teacher_logo']['name'];
						$fileupload=move_uploaded_file ($_FILES['teacher_logo']['tmp_name'],$originalImage);
						if($fileupload)
						{
							$query_update_mysql_setting=mysqli_query($con,"update teacher set teacher_logo='".$_FILES['teacher_logo']['name']."' where center_id='".$_POST['center_id']."'");
						}
					}
				}
			}
		}


		if($query)
		{
			$message_success .= constant('TI_CENTER_EDIT_MESSAGE');
		}
		else
		{
		$error .= constant('TI_CENTER_MYSQL_ERROR');
		}		
	}
	else
	{		
		$query=mysqli_query($con,"update teacher set teacher_name='{$teacher_name}', teacher_addr='{$teacher_addr}', password_md5='{$password_md5}',password='{$password}',email='{$email}' where center_id='".$_POST['center_id']."'");
		
		if($_FILES['teacher_logo']['name']!="")
		{		
			$img_dir="../images/logo/centerlogo/";	
			list($width, $height, $type, $attr) = getimagesize($_FILES["teacher_logo"]['tmp_name']);		
			if($width<='200' && $height<='200')
			{
				$img = explode('.', $_FILES['teacher_logo']['name']);	
				$img_type=$img[1];//image type(like jpg.png,gif,bmp)
				$extension_type = strtolower($img_type);

				if(in_array($extension_type , array('jpg','jpeg', 'gif', 'png', 'bmp')))
				{
					if($extension_type=='jpg' || $extension_type=='jpeg' || $extension_type=='gif' || $extension_type=='png' || $extension_type=='bmp')
					{
						$originalImage=$img_dir.$_FILES['teacher_logo']['name'];
						$fileupload=move_uploaded_file ($_FILES['teacher_logo']['tmp_name'],$originalImage);
						if($fileupload)
						{
							$query_update_mysql_setting=mysqli_query($con,"update teacher set teacher_logo='".$_FILES['teacher_logo']['name']."' where center_id='".$_POST['center_id']."'");
						}
					}
				}
			}
		}
		if($query)
		{
			$message_success .= constant('TI_CENTER_EDIT_MESSAGE');
		}
		else
		{
		$error .= constant('TI_CENTER_MYSQL_ERROR');
		}		   
	}
}

if($_SESSION['center_id']!="")
{
	$center_id=$_GET['center_id'];
	$query=mysqli_query($con,"select * from teacher where center_id='".$_SESSION['center_id']."'");
	$result=mysqli_fetch_array($query);
}

?>
<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i><?php echo "Manage Teacher";?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-wrench"></i><?php echo "Edit Teacher";?></a>
					</li>
				</ul>	
			</div>
	<div class="box-content padded">
		<div class="tab-content">        
			<?php include("message.php");?>
			<div class="tab-pane active" id="add" style="padding: 5px">
				<form method="post" action="" class="form-horizontal validatable" enctype="multipart/form-data">
                        
                         <div class="padded"> 
								<div class="control-group">
                                <label class="control-label"><?php echo "Teacher ID";?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" readonly name="teacher_id" value="<?php echo $result['teacher_id'];?>"/>
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label"><?php echo "Teacher Name";?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="teacher_name" value="<?php echo $result['teacher_name'];?>"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo "About Teacher";?> </label>
                                <div class="controls">                                    
									<div class="box closable-chat-box">
									
									<div class="chat-message-box">
									<textarea name="about_center" id="text_for_signature" rows="5" placeholder="About Teacher"><?php echo $result['about_teacher'];?></textarea>
									
									</div>
									</div>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo "Teacher Address";?> </label>
                                <div class="controls">                                    
									<div class="box closable-chat-box">
									
									<div class="chat-message-box">
									<textarea name="teacher_addr" id="text_for_signature" rows="5" placeholder="Add Address"><?php echo $result['teacher_addr'];?></textarea>
									
									</div>
									</div>
                                </div>
                            </div>
							 <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_PHONE_CENTER');?></label>
                                <div class="controls">
                                    <input type="text"  name="phone_no" value="<?php echo $result['phone_no'];?>"/>
                                </div>
                            </div>


							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_GENERALSETTING_CERTIFICATE_LOGO');?></label>
                                <div class="controls">
                                     <input type="file" class="" name="teacher_logo"  /><br><b><?php echo constant('TI_GENERALSETTING_LOGO_SIZE');?></b>
                                </div>
                            </div>
							<?php if($result['teacher_logo']!=""){?>
                            <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls" style="width:210px;">
                                    <img id="blah" src="../images/logo/centerlogo/<?php echo $result['teacher_logo'];?>" alt="your Logo" height="100" />
                                </div>
                            </div>
							<?php } else{?>
								<div class="control-group">
									<label class="control-label"></label>
									<div class="controls" style="width:210px;">                                   
									 <i class="icon-user icon-5x" style="color:#34495E;"></i>									
									</div>
								</div>
							<?php }?>	
							
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_CENTER_EMAIL');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required,custom[email]]" name="email" value="<?php echo $result['email'];?>"/>
                                </div>
                            </div>							
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_CENTER_PASSWORD');?></label>
                                <div class="controls">
                                    <input type="password" class="validate[required]" name="password" value="<?php echo $result['password'];?>"/>
                                </div>
                            </div>
							
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo "Add Teacher";?> </button>
							<input type="hidden" value="Update_setting" name="submit">
							<input type="hidden" value="<?php echo $_SESSION['center_id'];?>" name="center_id">
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