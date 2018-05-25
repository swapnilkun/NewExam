<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
$query_center_name=mysqli_fetch_array(mysqli_query($con,"select * from teacher where center_id='".$_SESSION['center_id']."'"));

?>
<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-building"></i><?php echo "Teacher Profile";?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-building"></i><?php echo "Teacher Profile";?></a>
					</li>
				</ul>	
			</div>
	<div class="box-content padded">
		<div class="tab-content">        
			
			<div class="tab-pane active" id="add" style="padding: 5px">
				<form method="post" action="" class="form-horizontal validatable" enctype="multipart/form-data">
				<div class="padded">       
							<div class="control-group">
                                <label class="control-label"><?php echo "Teacher ID";?></label>
                                <div class="controls">
									<?php echo $query_center_name['teacher_id'];?>
                                </div>
                            </div>
						</div>
					

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo "Teacher Name";?></label>
                                <div class="controls">
                                   <?php echo $query_center_name['teacher_name'];?>
								</div>
                            </div>
                        </div>

						 <div class="padded">  
							<div class="control-group">
                                <label class="control-label"><?php echo "About Teacher";?> </label>
                                <div class="controls">                                    
									<?php echo $query_center_name['about_teacher'];?>
                                </div>
                            </div>							
						</div>	

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo "Address";?></label>
                                <div class="controls">
                                    <?php echo $query_center_name['teacher_addr'];?>
                                </div>
                            </div>
                        </div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo "Phone No.";?></label>
                                <div class="controls">
                                   <?php echo $query_center_name['phone_no'];?>
                                </div>
                            </div>
                        </div>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo "Email";?></label>
                                <div class="controls">
                                   <?php echo $query_center_name['email'];?>
                                </div>
                            </div>
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