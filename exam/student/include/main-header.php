<?php if(basename(url())=="termsandcondition.php"){ ?>
<!-- <body onload="JavaScript:timedRefresh(15000);"> -->
<body onload="AjaxFunction('AjaxFunction();',1000);">


<?php } else{?>
<body>
<?php }?>
	<div id="main_body">
		<div class="navbar navbar-top navbar-inverse">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="brand" href="home.php">
			<?php 			
			
				echo $query_general_setting['g_organization'];			
				$query_student=mysqli_fetch_array(mysqli_query($con,"select * from student where student_id='".$_SESSION['student_id']."'"));
				$query_center_name=mysqli_fetch_array(mysqli_query($con,"select * from teacher where center_id='".$_SESSION['center_id']."'"));
			?>
			</a>
		
			
			<!-- the new toggle buttons -->
			<ul class="nav pull-right">
				<li class="toggle-primary-sidebar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-primary"><button type="button" class="btn btn-navbar"><i class="icon-th-list"></i></button></li>

				<li class="hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-top"><button type="button" class="btn btn-navbar"><i class="icon-align-justify"></i></button></li>
			</ul>
			<div class="nav-collapse nav-collapse-top collapse">
            	<ul class="nav pull-right">
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo constant('TI_MAIN_HEADER_ACCOUNT');?> <b class="caret"></b></a>					
						<ul class="dropdown-menu">
							<li class="with-image">
								
									<?php if($query_student['studentlogo']!=""){?>
									<div class="">
									<img id="blah" src="../images/logo/studentlogo/<?php echo $query_student['studentlogo'];?>" alt="your Logo" style="max-height:100px; max-width:100px;" /> </div>
									<?php }
									else{ ?>
									<div class="avatar">
										<div class="it_circle">
										<i class="icon-user icon-5x" style="color:#34495E;"></i>
										</div>
									 </div>
									 <?php }
									
									
									?>
								
								<span><?php echo "&nbsp;".ucwords($_SESSION['student_name']);?></span>
							</li>
							<li class="divider"></li>
							
								<li><a href="profile.php">
								<i class="icon-user"></i><span><?php echo constant('TI_MAIN_HEADER_PROFILE');?></span></a></li>
								 <li><a href="change_password.php">
								<i class="icon-lock"></i><span><?php echo constant('TI_MAIN_HEADER_CHANGE_PASSWORD');?></span></a></li> 
								<li><a href="logout.php">
								<i class="icon-off"></i><span><?php echo constant('TI_MAIN_HEADER_LOGOUT');?></span></a></li>
						</ul>
                	
					</li>
				</ul>			
                <ul class="nav pull-right">
					<li class="dropdown">
					<a href="admin_profile.php" ><i class="icon-building"></i><?php echo $query_center_name['teacher_name'];?> </a>
					</li>
				</ul>
				<ul class="nav pull-right">
					<li class="dropdown">
					<a href="#" ><i class="icon-user"></i><?php echo constant('TI_MAIN_HEADER_ADMIN_PANEL');?> </a>
					</li>
				</ul>
				
			</div>
		</div>
	</div>
   </div> 