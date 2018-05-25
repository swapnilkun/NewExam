<?php
include('include/configure.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');


if(isset($_POST['submit']))
{	
	$query_update_mysql_setting=mysqli_query($con,"update general_setting set g_timezone='".$_POST['g_timezone']."',g_title='".$_POST['g_title']."',g_description='".$_POST['g_description']."',g_keywords='".$_POST['g_keywords']."',g_organization='".$_POST['g_organization']."',g_copyright='".$_POST['g_copyright']."',g_address='".$_POST['g_address']."',g_phone='".$_POST['g_phone']."',g_passingscore='".$_POST['g_passingscore']."',g_email='".$_POST['g_email']."',g_google_analytics='".$_POST['g_google_analytics']."',g_certificate_content='".$_POST['g_certificate_content']."',g_text_signature='".$_POST['g_text_signature']."' where id=1 and g_id=1");
	$lastinsertid=mysqli_insert_id($con);

	if($_FILES['g_logo']['name']!="")
	{
		
		$img_dir="../images/logo/";	
		list($width, $height, $type, $attr) = getimagesize($_FILES["g_logo"]['tmp_name']);		
		if($width<='200' && $height<='200')
		{
			$img = explode('.', $_FILES['g_logo']['name']);	
			$img_type=$img[1];//image type(like jpg.png,gif,bmp)
			$extension_type = strtolower($img_type);

			if(in_array($extension_type , array('jpg','jpeg', 'gif', 'png', 'bmp')))
			{
				if($extension_type=='jpg' || $extension_type=='jpeg' || $extension_type=='gif' || $extension_type=='png' || $extension_type=='bmp')
				{
					$originalImage=$img_dir.$_FILES['g_logo']['name'];
					$fileupload=move_uploaded_file ($_FILES['g_logo']['tmp_name'],$originalImage);
					if($fileupload)
					{
						$query_update_mysql_setting=mysqli_query($con,"update general_setting set g_logo='".$_FILES['g_logo']['name']."' where id=1 and g_id=1");
					}
				}
			}
		}
	}

	
	if($_FILES['g_certificate_logo']['name']!="")
	{
		
		$img_dir="../images/certificate_logo/";	
		list($width, $height, $type, $attr) = getimagesize($_FILES["g_certificate_logo"]['tmp_name']);		
		if($width<='200' && $height<='200')
		{
			$img = explode('.', $_FILES['g_certificate_logo']['name']);	
			$img_type=$img[1];//image type(like jpg.png,gif,bmp)
			$extension_type = strtolower($img_type);

			if(in_array($extension_type , array('jpg','jpeg', 'gif', 'png', 'bmp')))
			{
				if($extension_type=='jpg' || $extension_type=='jpeg' || $extension_type=='gif' || $extension_type=='png' || $extension_type=='bmp')
				{
					$originalImage=$img_dir.$_FILES['g_certificate_logo']['name'];
					$fileupload=move_uploaded_file ($_FILES['g_certificate_logo']['tmp_name'],$originalImage);
					if($fileupload)
					{
						$query_update_mysql_setting=mysqli_query($con,"update general_setting set g_certificate_logo='".$_FILES['g_certificate_logo']['name']."' where id=1 and g_id=1");
					}
				}
			}
		}
	}


	if($_FILES['g_signature']['name']!="")
	{
		
		$img_dir="../images/signature/";	
		list($width, $height, $type, $attr) = getimagesize($_FILES["g_signature"]['tmp_name']);		
		if($width<='200' && $height<='200')
		{
			$img = explode('.', $_FILES['g_signature']['name']);	
			$img_type=$img[1];//image type(like jpg.png,gif,bmp)
			$extension_type = strtolower($img_type);

			if(in_array($extension_type , array('jpg','jpeg', 'gif', 'png', 'bmp')))
			{
				if($extension_type=='jpg' || $extension_type=='jpeg' || $extension_type=='gif' || $extension_type=='png' || $extension_type=='bmp')
				{
					$originalImage=$img_dir.$_FILES['g_signature']['name'];
					$fileupload=move_uploaded_file ($_FILES['g_signature']['tmp_name'],$originalImage);
					if($fileupload)
					{
						$query_update_mysql_setting=mysqli_query($con,"update general_setting set g_signature='".$_FILES['g_signature']['name']."' where id=1 and g_id=1");
					}
				}
			}
		}
	}







	if($query_update_mysql_setting)
	{
		$message_success .= constant('TI_GENERAL_MESSAGE');
	}
	else
	{
		$error .=  constant('TI_GENERAL_MYSQL_ERROR');
	}
	
}
$query_general_setting=mysqli_fetch_array(mysqli_query($con,"select * from general_setting where id=1 and g_id=1"));

	
?>
<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i><?php echo constant('TI_GENERALSETTING');?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-wrench"></i><?php echo constant('TI_ADD_GENERALSETTING');?></a>
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
                                <label class="control-label"><?php echo constant('TI_GENERALSETTING_SITE_TITLE');?> </label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="g_title" value="<?php echo $query_general_setting['g_title']; ?>"/>
                                </div>
                            </div>							
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_GENERALSETTING_SITE_DESCRIPTION');?> </label>
                                <div class="controls">
                                    <textarea name="g_description"><?php echo $query_general_setting['g_description'];?></textarea>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_GENERALSETTING_SITE_KEYWORDS');?> </label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="g_keywords" value="<?php echo $query_general_setting['g_keywords']; ?>"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_GENERALSETTING_ORGANIZATION');?> </label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="g_organization" value="<?php echo $query_general_setting['g_organization']; ?>"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_GENERALSETTING_COPYRIGHT');?> </label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="g_copyright" value="<?php echo $query_general_setting['g_copyright']; ?>"/>
                                </div>
                            </div>
							
					
							 <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_GENERALSETTING_SITE_LOGO');?></label>
                                <div class="controls" style="width:210px;">
                                    <input type="file" class="" name="g_logo" id="imgInp" /><br><b><?php echo constant('TI_GENERALSETTING_LOGO_SIZE');?></b>
                                </div>
                            </div>
							<?php if($query_general_setting['g_logo']!=""){?>
                            <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls" style="width:210px;">
                                    <img id="blah" src="../images/logo/<?php echo $query_general_setting['g_logo'];?>" alt="your Logo" height="100" />
                                </div>
                            </div>
							<?php } else{?>
								<div class="control-group">
									<label class="control-label"></label>
									<div class="controls" style="width:210px;">
                                    <img id="blah" src="../images/logo/defaultlogo/your-logo.png" alt="your image" height="100" />
									</div>
								</div>
							<?php }?>

							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_GENERALSETTING_ADDRESS');?> </label>
                                <div class="controls">
                                    <textarea name="g_address"><?php echo $query_general_setting['g_address']; ?></textarea>
                                </div>
                            </div>

							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_GENERALSETTING_PHONENO');?> </label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="g_phone" value="<?php echo $query_general_setting['g_phone']; ?>"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_GENERALSETTING_EMAIL');?> </label>
                                <div class="controls">
                                    <input type="text" class="validate[required,custom[email]]" name="g_email" value="<?php echo $query_general_setting['g_email']; ?>"/>
                                </div>
                            </div>
							
							
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_GENERALSETTING_TIMEZONE');?> </label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="g_timezone" value="<?php echo $query_general_setting['g_timezone']; ?>"/><br><?php echo constant('TI_GET_TIME_ZONE');?>
                                </div>
                            </div>
							 <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_GENERALSETTING_GOOGLE_ANALYTICS');?> </label>
                                <div class="controls">
                                    <textarea name="g_google_analytics"><?php echo $query_general_setting['g_google_analytics']; ?></textarea><br><?php echo constant('TI_GOOGLE_ANALYTICS_ID_CODE');?>
									
                                </div>
                            </div>

							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_GENERALSETTING_CERTIFICATE_LOGO');?></label>
                                <div class="controls" style="width:210px;">
                                    <input type="file" class="" name="g_certificate_logo" id="imgInp" /><br><b><?php echo constant('TI_GENERALSETTING_LOGO_SIZE');?></b>
                                </div>
                            </div>
							<?php if($query_general_setting['g_certificate_logo']!=""){?>
                            <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls" style="width:210px;">
                                    <img id="blah" src="../images/certificate_logo/<?php echo $query_general_setting['g_certificate_logo'];?>" alt="your Logo" height="100" />
                                </div>
                            </div>
							<?php } else{?>
								<div class="control-group">
									<label class="control-label"></label>
									<div class="controls" style="width:210px;">
                                    <img id="blah" src="../images/uploads/user.jpg" alt="your image" height="100" />
									</div>
								</div>
							<?php }?>						
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_GENERALSETTING_CERTIFICATE_CONTENT');?></label>
                                <div class="controls">
                                    <div class="box closable-chat-box">
                                        <div class="box-content">
                                                <div class="chat-message-box">
                                                <textarea name="g_certificate_content" id="ttt" rows="5" placeholder="add certificate"><?php echo $query_general_setting['g_certificate_content'];?></textarea>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                       
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_GENERALSETTING_CERTIFICATER_SIGNATURE');?></label>
                                <div class="controls" style="width:210px;">
                                    <input type="file" class="" name="g_signature" id="imgInp" /><br><b><?php echo constant('TI_GENERALSETTING_LOGO_SIZE');?></b>
                                </div>
                            </div>
							<?php if($query_general_setting['g_signature']!=""){?>
                            <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls" style="width:210px;">
                                    <img id="blah" src="../images/signature/<?php echo $query_general_setting['g_signature'];?>" alt="your Logo" height="100" />
                                </div>
                            </div>
							<?php } else{?>
								<div class="control-group">
									<label class="control-label"></label>
									<div class="controls" style="width:210px;">
                                    <img id="blah" src="../images/uploads/user.jpg" alt="your image" height="100" />
									</div>
								</div>
							<?php }?>
                         
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_GENERALSETTING_TEXT_FOR_SIGNATURE');?></label>
                                <div class="controls">
                                    <div class="box closable-chat-box">
                                        <div class="box-content">
                                                <div class="chat-message-box">
                                                <textarea name="g_text_signature" id="text_for_signature" rows="5" placeholder="add certificate"><?php echo $query_general_setting['g_text_signature'];?></textarea>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>					

                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo constant('TI_GENERALSETTING_UPDATE');?> </button>
							<input type="hidden" value="Update_setting" name="submit">
                        </div>
                    </form>                
                </div>                
			</div>
            
		</div>
	</div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>            </div>       
    <?php include("copyright.php");?>        
	</div>
	</div>
</body>

<!-----------HIDDEN MODAL FORM - COMMON IN ALL PAGES ------>
<div id="modal-form" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div id="modal-tablesLabel" style="color:#fff; font-size:16px;">&nbsp; </div>
	</div>
  <div class="modal-body" id="modal-body"><?php echo constant('TI_LOADING_DATA');?></div>
    <div class="modal-footer">
        <button class="btn btn-gray" onclick="custom_print('frame1')"><?php echo constant('TI_PRINT');?></button>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CLOSE');?></button>
    </div>
</div>
<!-----------HIDDEN MODAL DELETE CONFIRMATION - COMMON IN ALL PAGES ------>
<div id="modal-delete" class="modal hide fade" style="height:140px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i></h6>
	</div>
  <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_DELETE_DATA');?></div>
    <div class="modal-footer">
    	<a href="" id="delete_link" class="btn btn-red" ><?php echo constant('CONFIRME');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL');?></button>
    </div>
</div>

<script>
function modal(param1 ,param2 ,param3)
{
	

		document.getElementById('modal-body').innerHTML = 
		'<iframe id="frame1" src="edit_teacher.php?t_id='+param2+'/'+param3+'" width="100%" height="400" frameborder="0"></iframe>';

	document.getElementById('modal-tablesLabel').innerHTML = param1.replace("_"," ");
}

function modal_delete(param1)
{
	document.getElementById('delete_link').href = param1;
}

/////////////PRINT A DIV FUNCTION////////////////

function custom_print(div_id)
{
	var mywindow = window.open('', 'my div', 'height=400,width=600');
	mywindow.document.write(document.getElementById(div_id).contentWindow.document.head.innerHTML);
	mywindow.document.write(document.getElementById(div_id).contentWindow.document.body.innerHTML); 
	mywindow.print();
	mywindow.close();
	return true;
}

</script>
 
</html>