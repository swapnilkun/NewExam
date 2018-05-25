<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');


if(isset($_POST['submit']))
{	
	$center_id= mysql_prep($_POST['center_id']);
	$category_name= mysql_prep($_POST['category_id']);
	$subcategory_name= mysql_prep($_POST['subcategory_name']);

	$query_select_sub_category=mysqli_query($con,"SELECT * FROM subcategory where subcategory_name='".$subcategory_name."' and category_id='".$category_name."' and center_id='".$center_id."'");
	if(mysqli_num_rows($query_select_sub_category)>0)
	{
		$error .= $subcategory_name." ". constant('TI_CLASS_ERROR_ALLREADY_EXIT');
	}
	else
	{

		$query_update_mysql_subcategory=mysqli_query($con,"update subcategory set category_id='{$category_name}',subcategory_name='{$subcategory_name}',center_id='{$center_id}' where s_c_id='".$_POST['s_c_id']."'");

		if($query_update_mysql_subcategory)
		{
			$message_success .=$subcategory_name." ". constant('TI_CLASS_EDIT_MESSAGE');			
		}
		else
		{
			$error .=  constant('TI_CLASS_MYSQL_ERROR');
		}
	}
}
if($_GET['s_c_id']!="")
{
	$s_c_id=$_GET['s_c_id'];
	$query=mysqli_query($con,"select * from subcategory where s_c_id='".$s_c_id."'");
	$result=mysqli_fetch_array($query);
}

?>
<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i><?php echo constant('TI_MANAGE_CLASS');?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-wrench"></i><?php echo constant('TI_CLASS_EDIT_BUTTON');?></a>
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
									<select name="category_id" class="chzn-select">
									<option value=""><?php echo constant('TI_DROPDOWN_CATEGORY_NAME');?></option>
										<?php $query_category=mysqli_query($con,"SELECT * FROM category where category_status=1");
										while($result_category=mysqli_fetch_array($query_category))
										{
										?>
                                    	<option value="<?php echo $result_category['c_id'];?>" <?php if($result_category['c_id']==$result['category_id']){echo "selected='selected'";}?>><?php echo ucfirst($result_category['category_name']);?></option>
										<?php }?>
                                    </select>
                                </div>
                            </div>
						</div>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_SUB_CATEGORY_NAME');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="subcategory_name" value="<?php echo $result['subcategory_name']; ?>" />
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
                            <button type="submit" class="btn btn-gray"><?php echo constant('TI_CLASS_EDIT_BUTTON');?> </button>
							<input type="hidden" value="Update_setting" name="submit">
							<input type="hidden" value="<?php echo $result['s_c_id'];?>" name="s_c_id">
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