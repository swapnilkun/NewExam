<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
if(isset($_POST['submit']) && $_POST['c_id']!="")
{	
	$category_name= mysql_prep($_POST['category_name']);
	$center_id= mysql_prep($_POST['center_id']);
	$query_select_category=mysqli_query($con,"SELECT * FROM category WHERE category_name='".$category_name."' AND center_id='".$center_id."'");
	if(mysqli_num_rows($query_select_category)>0)
	{
		$error .= $category_name. constant('TI_COURSE_ERROR_ALLREADY_EXIT');
	}
	else
	{
		$query_update_mysql_category=mysqli_query($con,"UPDATE category SET category_name='".$category_name."', center_id='".$center_id."' where c_id='".$_POST['c_id']."'");

		if($query_update_mysql_category)
		{
			
			$message_success .=$category_name." ". constant('TI_COURSE_EDIT_MESSAGE');

		}
		else
		{
			$error .=  constant('TI_COURSE_MYSQL_ERROR');
		}
	}
	
}
if($_GET['c_id']!="")
{
	$c_id=$_GET['c_id'];
	$query=mysqli_query($con,"SELECT * FROM category where c_id='".$c_id."'");
	$result=mysqli_fetch_array($query);
}

?>
<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i><?php echo constant('TI_MANAGE_COURSE');?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-wrench"></i><?php echo constant('TI_COURSE_EDIT_BUTTON');?></a>
					</li>
				</ul>	
			</div>
			<div class="box-content padded">
				<div class="tab-content">        
					<?php include("message.php");?>
					<div class="tab-pane active" id="add" style="padding: 5px">
						<form method="post" action="<?php $PHP_SELF ?>" class="form-horizontal validatable" enctype="multipart/form-data">
							<div class="padded">
								<div class="control-group">
									<label class="control-label"><?php echo constant('TI_LABEL_COURSE_NAME');?> </label>
									<div class="controls">
										<input type="text" class="validate[required]" name="category_name" value="<?php echo $result['category_name']; ?>"/>
									</div>
								</div>							
							</div>
							<div class="padded">       
								<div class="control-group">
									<label class="control-label"><?php echo "Center Id";?></label>
										<div class="controls">
											<input type="text" class="validate[required]" name="center_id" value="<?php echo $result['center_id']; ?>" />

										</div>
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-gray"><?php echo constant('TI_COURSE_EDIT_BUTTON');?></button>
								<input type="hidden" value="Edit_category" name="submit">
								<input type="hidden" value="<?php echo $result['c_id'];?>" name="c_id">
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