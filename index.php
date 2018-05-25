<?php 
error_reporting (E_ALL ^ E_NOTICE);
include("mysql_connection.php");
$query_general_setting=mysqli_fetch_array(mysqli_query($con,"select * from general_setting where id=1 and g_id=1"));
date_default_timezone_set($query_general_setting["g_timezone"]);
date_default_timezone_get();
include('english.php');
include("admin/include/function.php");
if(basename(url())!="index.php" or basename(url())!="index.php?log=1"){
$explode_permistion=explode(",",$_SESSION['area_permistion']);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<link rel="stylesheet" href="center/css/centerfont.css">
		<link href="center/css/jquery/jquery-ui-1.10.3.custom.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="center/css/center.css" media="screen" rel="stylesheet" type="text/css" />		
		<title><?php echo $query_general_setting['g_title'];?></title>
		<meta name="description" content="<?php echo $query_general_setting['g_description'];?>">
		<meta name="keywords" content="<?php echo $query_general_setting['g_keywords'];?>">
		<link rel="stylesheet" href="style.css"> 





	</head>
	<body style="background-color: #EAEDF1;">
		<div id="main_body">
			<div class="navbar navbar-top navbar-inverse">
				<div class="navbar-inner">
					
				</div>
			</div>
			<div class="container">
				<div>
					<div style="margin-top:10px">
						<center>
						<?php
						if($query_general_setting['g_logo']!="")
						{
						?>	

						<img src="images/logo/<?php echo $query_general_setting['g_logo'];?>" width="300px" > 
						<?php }else{?>

						<img src="images/logo/defaultlogo/your-logo.png" width="300px"/>
						<?php 
						}
						?>					 	

						<div style="margin:auto; width:100%;">
							
							<ul style="padding: 1.5em 0;">
							<li>
								<section class="student">
								<a href="student/index.php">
								<div class="text">
								<h2><?php echo TI_INDEX_STUDENT;?></h2>
								</div>
								</a>
								</section>
							</li>
							<li>
								<section class="center">
								<a href="teacher/index.php">
								<div class="text">
								<h2>BRANCH MANAGER</h2>
								</div>
								</a>
								</section>
							</li>
							<li>
								<section class="admin">
								<a href="admin/index.php">
								<div class="text">
								<h2><?php echo TI_INDEX_ADMIN;?></h2>
								</div>
								</a>
								</section> 
							</li>
							</ul>
						</div>
						</center>
						<?php include("admin/copyright.php");?>
					</div>
				</div>
			</div>
		</div>    
	</body>
</html>