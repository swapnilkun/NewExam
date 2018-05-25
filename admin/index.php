<?php 
include('include/configure.php');
if($_POST['login_type']=='admin')
{

		if( (((!isset($_POST['email'])) || (empty($_POST['email']))) && (((!isset($_POST['password'])) || (empty($_POST['password'])))) )){
			$error .=constant('TI_LOGIN_ERROR_EMAIL_PASSWORD_EMPTY_MESSAGE');
		} 
		elseif ((!isset($_POST['email'])) || (empty($_POST['email']))) {
			$error .= constant('TI_LOGIN_ERROR_EMAIL_EMPTY_MESSAGE');
		}
		elseif((!isset($_POST['password'])) || (empty($_POST['password']))) {
			$error .= constant('TI_LOGIN_ERROR_PASSWORD_EMPTY_MESSAGE');
		}
		else
		{

			$email=$_POST['email'];
			//$password = mysql_prep(encrypt($_POST['password']));
			$password = $_POST['password'];

			/*$query="SELECT * FROM user WHERE useremail='{$email}' AND userpassword_md5='{$password}' AND user_status=1";*/
			$query="SELECT * FROM user WHERE useremail='Admin' AND userpassword_md5='Admin@123' AND user_status=1";
			$result_set = mysqli_query($con,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) 
			{
				$found_user = mysqli_fetch_array($result_set);			
				$_SESSION['user_id'] = $found_user['u_id'];
				$_SESSION['useremail'] = $found_user['useremail'];
				$_SESSION['admin_username'] = $found_user['username'];
				$_SESSION['area_permistion'] = $found_user['area_permistion'];
				redirect_to('home.php');
			}
			else
			{		
					$error .= constant('TI_LOGIN_ERROR');					
			}
		}
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<link rel="stylesheet" href="css/adminfont.css">
		<link href="css/jquery/jquery-ui-1.10.3.custom.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="css/admin.css" media="screen" rel="stylesheet" type="text/css" />
		<!--[if lt IE 9]>
		<script src="../js/html5shiv.js" type="text/javascript"></script>
		<script src="../js/excanvas.js" type="text/javascript"></script>
		<![endif]-->
		<script src="../js/textusintentio.js" type="text/javascript"></script>	
		<title><?php echo $query_general_setting['g_title'];?></title>
		<meta name="description" content="<?php echo $query_general_setting['g_description'];?>">
		<meta name="keywords" content="<?php echo $query_general_setting['g_keywords'];?>">
		<?php echo add_my_google_analytics($query_general_setting['g_google_analytics']);?>
		 
	</head>
	<body>
        <div id="main_body">
			<div class="navbar navbar-top navbar-inverse">
                <div class="navbar-inner">
                    <div class="container-fluid">                        
                        <a class="brand" href="#"><?php echo $query_general_setting['g_organization'];?></a> 
						 <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo constant("TI_LOGIN_HEADER_SELECT_SECTION");?><b class="caret"></b></a>                           
                                <ul class="dropdown-menu">
                                <li><a href="../student/index.php"><?php echo constant("TI_LOGIN_HEADER_STUDENT");?></a></li> 
								<li><a href="../teacher/index.php"><?php echo "Branch Manager";?></a></li>  								
								<li><a href="index.php"><?php echo constant("TI_LOGIN_HEADER_ADMIN");?></a></li>  
                                </ul>                            
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="span4 offset4">
                    <div class="padded" style="margin-top:10px">
                        <center>
							<?php
							if($query_general_setting['g_logo']!="")
							{
							?>	
							
							<img src="../images/logo/<?php echo $query_general_setting['g_logo'];?>"  > 
							<?php }else{?>

							<img src="../images/logo/defaultlogo/your-logo.png"/>
							<?php 
							}
							?>
							
                        </center> 
						<center>						
							<img src="../images/panel/admin.png"> 											
                        </center> 

						
							<?php
							if($message_success!="")
							{?>

							<script>
							$(document).ready(function() {
							function ask()
							{
							Growl.info({title:"<?php echo $message_success;?>",text:" "});
							}
							setTimeout(ask, 500);
							});
							</script>
							<?php }
							if($error!="")
							{?>

							<script>
							$(document).ready(function() {
							function ask()
							{
							Growl.info({title:"<?php echo $error;?>",text:" "});
							}
							setTimeout(ask, 500);
							});
							</script>
							<?php }
								
								$log=@$_GET['log'];

							 if(isset($error_message))
							 {
								 echo  $error_message ;
							 }
							 elseif($log==1)
							 {
								 $message = constant('TI_INDEX_MESSAGE_TWO');
							?>

								<script>
								$(document).ready(function() {
								function ask()
								{
								Growl.info({title:"<?php echo $message;?>",text:" "});
								}
								setTimeout(ask, 500);
								});
								</script>
							 <?php }
							else if($_GET['forget']==1)
							{
								 $message = constant('TI_FORGET_PASS_MAIL_SENT_MESSAGE');
								?>

								<script>
								$(document).ready(function() {
								function ask()
								{
								Growl.info({title:"<?php echo $message;?>",text:" "});
								}
								setTimeout(ask, 500);
								});
								</script>
							 <?php
								
							}
							else if($_GET['mail']==1)
							{
								 $message = constant('TI_MAIL_ERROR');
								?>

								<script>
								$(document).ready(function() {
								function ask()
								{
								Growl.info({title:"<?php echo $message;?>",text:" "});
								}
								setTimeout(ask, 500);
								});
								</script>
							 <?php
								
							}
							else if($_GET['blank']==1)
							{
								 $message = constant('TI_EMAIL_BLANK');
								?>

								<script>
								$(document).ready(function() {
								function ask()
								{
								Growl.info({title:"<?php echo $message;?>",text:" "});
								}
								setTimeout(ask, 500);
								});
								</script>
							 <?php
								
							}
							
							 else
							 {
								 echo "<center>".constant('TI_INDEX_MESSAGE_ONE')."</center>";
							 }
							 ?>
                        <div class="login box" style="margin-top: 10px;">
                            <div class="box-header">
                                <span class="title"><?php echo constant('TI_LOGIN');?></span>
                            </div>
                            <div class="box-content padded">                            
                                <form action="index.php" method="post" accept-charset="utf-8" class="separate-sections"><div style="display:none"><input type="hidden" name="login_type" value="admin" /></div>
									<center>
                                        <div style="height:100px;">
                                            <div id="avatar" class="avatar ">
                                               
												 <i class="icon-user icon-7x" style="color:#34495E;"></i>
                                            </div>
                                        </div>                            
                                    </center>                                   
                                    <div class="input-prepend">
                                        <span class="add-on" href="#">
                                        <i class="icon-envelope"></i>
                                        </span>
                                        <input name="email" type="text" placeholder="Email" autocomplete="off" class="validate[required,custom[email]]">
                                    </div>
                                    <div class="input-prepend">
                                        <span class="add-on" href="#">
                                        <i class="icon-key"></i>
                                        </span>
                                        <input name="password" type="password" placeholder="password" autocomplete="off" class="validate[required]">
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <a  data-toggle="modal" href="#modal-simple"  class="btn btn-blue btn-block" >
                                                <?php echo constant("TI_FORGOT_PASSWORD_BUTTON");?>
                                            </a>
                                        </div>
                                        <div class="span6">
                                            <input type="submit" class="btn btn-gray btn-block "  value="login"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr />
                       <?php include("copyright.php");?>
                    </div>
                </div>
            </div>
        </div>    
        <div id="modal-simple" class="modal hide fade" style="top:30%;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h6 id="modal-tablesLabel"><?php echo constant('TI_RESET_PASSWORD_LOGIN');?></h6>
          </div>
          <div class="modal-body" style="padding:20px;">          
			<form action="forgetpassword_mail.php" method="post" accept-charset="utf-8">				
                <!-- <input type="email" name="email"  placeholder="email"  style="margin-bottom: 0px !important;"/>
                <input type="submit" value="reset"  class="btn btn-blue btn-medium"/> -->
				<div class="input-prepend">
				<span class="add-on" href="#">
				<i class="icon-envelope"></i>
				</span>
				<input name="email" type="text" placeholder="Email" autocomplete="off" class="validate[required,custom[email]]">
				</div>
				<input type="submit" value="Send Mail"  class="btn btn-blue btn-medium"/>
            </form>  
		</div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CLOSE');?></button>
          </div>
        </div>  
	</body>
</html>