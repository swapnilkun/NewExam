<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');

if(isset($_POST['submit']) and $_POST['student_id']!="")		
{
	$student_email=mysql_prep($_POST['student_email']);
	
	$category_id=mysql_prep($_POST['category_id']);
	$center_id=mysql_prep($_POST['center_id']);
	
	$student_name=mysql_prep($_POST['student_name']);
	$student_father=mysql_prep($_POST['student_father']);
	$student_mother=mysql_prep($_POST['student_mother']);
	$student_dob = mysql_prep($_POST['student_dob']);
	if($student_dob!="")
	{
		$dobexplode=explode("/",$student_dob);
		$dob_day=$dobexplode[1];
		$dob_month=$dobexplode[0];
		$dob_year=$dobexplode[2];
		$student_dob_from=$dob_day.'-'.$dob_month.'-'.$dob_year;
	}

	$student_address=mysql_prep($_POST['student_address']);
	$student_phone=mysql_prep($_POST['student_phone']);

	if($_POST['password']!="")
	{
		$password_md5=encrypt($_POST['password']);
		$password=mysql_prep($_POST['password']);
	}
	$student_id = mysql_prep($_POST['student_id']);

	$sql = "SELECT * FROM student WHERE student_email='$student_email'";
	$result = mysqli_query($con,$sql);

	if(mysqli_num_rows($result) >0)
	{
		
		$query=mysqli_query($con,"update student set student_address='{$student_address}',student_phone='{$student_phone}',password='{$password}',password_md5='{$password_md5}' where center_id='".$_SESSION['center_id']."' and student_id='{$student_id}'");

		if($_FILES['studentlogo']['name']!="")
		{		
			$img_dir="../images/logo/studentlogo/";	
			list($width, $height, $type, $attr) = getimagesize($_FILES["studentlogo"]['tmp_name']);			

			if($width<='200' && $height<='200')
			{
				$img = explode('.', $_FILES['studentlogo']['name']);	
				$img_type=$img[1];//image type(like jpg.png,gif,bmp)
				$extension_type = strtolower($img_type);

				if(in_array($extension_type , array('jpg','jpeg', 'gif', 'png', 'bmp')))
				{
					if($extension_type=='jpg' || $extension_type=='jpeg' || $extension_type=='gif' || $extension_type=='png' || $extension_type=='bmp')
					{
						$originalImage=$img_dir.$_FILES['studentlogo']['name'];
						$fileupload=move_uploaded_file ($_FILES['studentlogo']['tmp_name'],$originalImage);
						if($fileupload)
						{
							$query_update_mysql_setting=mysqli_query($con,"update student set studentlogo='".$_FILES['studentlogo']['name']."' where center_id='".$_SESSION['center_id']."' and student_id='{$student_id}'");
						}
					}
				}
			}
		}

		if($query)
		{
			$message_success .= constant('TI_STUDENT_EDIT_PROFILE_MESSAGE');
		}
		else
		{
		$error .= constant('TI_STUDENT_PROFILE_MYSQL_ERROR');
		}		
	}
	else
	{
		$query=mysqli_query($con,"update student set student_dob='{$student_dob_from}',student_address='{$student_address}',student_phone='{$student_phone}',password='{$password}',password_md5='{$password_md5}' where center_id='".$_SESSION['center_id']."' and student_id='{$student_id}'");

		if($_FILES['studentlogo']['name']!="")
		{		
			$img_dir="../images/logo/studentlogo/";	
			list($width, $height, $type, $attr) = getimagesize($_FILES["studentlogo"]['tmp_name']);		
			if($width<='200' && $height<='200')
			{
				$img = explode('.', $_FILES['studentlogo']['name']);	
				$img_type=$img[1];//image type(like jpg.png,gif,bmp)
				$extension_type = strtolower($img_type);

				if(in_array($extension_type , array('jpg','jpeg', 'gif', 'png', 'bmp')))
				{
					if($extension_type=='jpg' || $extension_type=='jpeg' || $extension_type=='gif' || $extension_type=='png' || $extension_type=='bmp')
					{
						$originalImage=$img_dir.$_FILES['studentlogo']['name'];
						$fileupload=move_uploaded_file ($_FILES['studentlogo']['tmp_name'],$originalImage);
						if($fileupload)
						{
							$query_update_mysql_setting=mysqli_query($con,"update student set studentlogo='".$_FILES['studentlogo']['name']."' where center_id='".$_SESSION['center_id']."' and student_id='{$student_id}'");
						}
					}
				}
			}
		}

		if($query)
		{
			$message_success .= constant('TI_STUDENT_EDIT_PROFILE_MESSAGE');
		}
		else
		{
		$error .= constant('TI_STUDENT_PROFILE_MYSQL_ERROR');
		}		
	}
}

if($_SESSION['student_id']!="" and $_SESSION['center_id']!="")
{
	$student_id=$_GET['student_id'];
	$query=mysqli_query($con,"select * from student where student_id='".$_SESSION['student_id']."' and  center_id='".$_SESSION['center_id']."'");
	$result=mysqli_fetch_array($query);
	$center_result=mysqli_fetch_array(mysqli_query($con,"select * from teacher where center_id='".$_SESSION['center_id']."'"));
	if($result['student_dob']!="")
	{
	$dob=explode("-",$result['student_dob']);

	$dobe=$dob['1']."/".$dob['0']."/".$dob['2'];
	}
}

?>
<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i><?php echo constant('TI_MANAGE_STUDENT');?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-wrench"></i><?php echo constant('TI_STUDENT_EDIT');?></a>
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
                                <label class="control-label"><?php echo constant('TI_LABEL_CATEGORY_NAME');?></label>
                                <div class="controls">
									<select name="category_id" class="chzn-select" readonly>
									<option><?php echo constant('TI_SELECT_CATEGORY');?></option>  
										<?php $query_category=mysqli_query($con,"select * from category where category_status=1");
										while($result_category=mysqli_fetch_array($query_category))
										{
										?>
                                    	<option value="<?php echo $result_category['c_id'];?>" <?php if($result_category['c_id']==$result['category_id']){echo 'selected="selected"';}?>><?php echo ucfirst($result_category['category_name']);?></option>
										
										<?php }?>
                                                
                                    </select>
                                </div>
                            </div>
						</div>
					

					
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_NAME');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="student_name" value="<?php echo $result['student_name'];?>" readonly/>
                                </div>
                            </div>
                        </div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_FATHER_NAME');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="student_father" value="<?php echo $result['student_father'];?>" readonly/>
                                </div>
                            </div>
                        </div>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_MOTHER_NAME');?></label>
                                <div class="controls">
                                    <input type="text" name="student_mother" class="validate[required]" value="<?php echo $result['student_mother'];?>" readonly/>
                                </div>
                            </div>
                        </div>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_DOB');?></label>
                                <div class="controls">
                                    <input type="text" name="student_dob"  class="validate[required,custom[dateFormat]] " value="<?php echo $dobe;?>" readonly/>
                                </div> 
                            </div>
                        </div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_ADDRESS');?></label>
                                <div class="controls">
                                   
									<div class="box closable-chat-box">									
									<div class="chat-message-box">
									<textarea name="student_address" class="validate[required]" id="text_for_signature" rows="5" placeholder="Add Address"><?php echo $result['student_address'];?></textarea>
									</div>
									</div>
                                </div>
                            </div>
                        </div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_PHONE');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required,custom[integer]]" name="student_phone" value="<?php echo $result['student_phone'];?>"/>
                                </div>
                            </div>
                        </div>
						<div class="padded">  
							<div class="control-group">
								<label class="control-label"><?php echo constant('TI_PROFILE_LOGO');?></label>
								<div class="controls">
									<input type="file" class="" name="studentlogo"  /><br><b><?php echo constant('TI_GENERALSETTING_LOGO_SIZE');?></b>
								</div>
							</div>
							<?php if($result['studentlogo']!=""){?>
							<div class="control-group">
								<label class="control-label"></label>
								<div class="controls" style="width:210px;">
									<img id="blah" src="../images/logo/studentlogo/<?php echo $result['studentlogo'];?>" alt="your Logo" height="100" />
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
						</div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_STUDENT_EMAIL');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required,custom[email]]" name="student_email" value="<?php echo $result['student_email'];?>" readonly/>
                                </div>
                            </div>
                        </div>
						
						<div class="padded">  
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_PASSWORD');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="password" value="<?php echo $result['password'];?>" readonly/>
                                </div>
                            </div>
						 </div>


                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo constant('TI_STUDENT_ADD_BUTTON');?></button>
							<input type="hidden" value="Add new student" name="submit">
							<input type="hidden" value="<?php echo $result['student_id'];?>" name="student_id"/>
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