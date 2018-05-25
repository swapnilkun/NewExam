<body>
	<div id="main_body">
		<div class="navbar navbar-top navbar-inverse">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="brand" href="home.php">
			<?php 						
				echo $query_general_setting['g_organization']
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
								<div class="avatar">
									
									<div class="it_circle">
									 <i class="icon-user icon-5x" style="color:#34495E;"></i>
									 </div>
								</div>
								<span><?php echo "&nbsp;".ucwords($_SESSION['admin_username']);?></span>
							</li>
							<li class="divider"></li>
							
								<li><a href="user.php">
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
					<a href="#" ><i class="icon-user"></i><?php echo constant('TI_MAIN_HEADER_ADMIN_PANEL');?> </a>
					</li>
				</ul>
				
			</div>
		</div>
	</div>
   </div> 