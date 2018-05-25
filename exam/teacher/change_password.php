<?php
include('include/configure.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');

if (isset($_POST['submit'])) 
   {
		if((!isset($_POST['old_pass'])) || (empty($_POST['old_pass']))){
			$error .= $category_name. constant('TI_CURRENT_PASSWORD_EMPTY');
		} elseif ((!isset($_POST['new_pass'])) || (empty($_POST['new_pass']))) {
			$error .= $category_name. constant('TI_NEW_PASSWORD_EMPTY');
		} elseif((!isset($_POST['con_pass'])) || (empty($_POST['con_pass']))) {
			$error .= $category_name. constant('TI_CONFIRM_PASSWORD_EMPTY');
		} elseif($_POST['new_pass'] != $_POST['con_pass']) {
			$error .= $category_name. constant('TI_PASSWORD_MATCH_ERROR');
		 
		}
		$c_id=$_SESSION['center_id'];
		$old_pass = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];
		$con_pass = $_POST['con_pass'];
		
		if ( !isset($error) && ($new_pass == $con_pass))
		{
			$query = "SELECT * from center WHERE password ='".$_POST['old_pass']."' AND c_id='".$c_id."' ";
			
			$result_set = mysqli_query($con,$query);
			confirm_query($result_set);
			
				if (mysqli_num_rows($result_set) == 1) 
					{
						$query = "UPDATE center SET password='{$_POST['new_pass']}', password_md5 ='".encrypt($_POST['new_pass'])."' WHERE c_id ='".$c_id."' ";
						
						$result = mysqli_query($con,$query);
							if ($result) 
							{
								$message_success .= $category_name. constant('TI_PASSWORD_CHANGED_SUCCESS_MESSAGE');
								
							} 
							else
							{
							 $error .= $category_name. constant('TI_PASSWORD_FAILED_MESSAGE');

							 $error .=  mysqli_error($con);
							}
					 
				   }
				  else 
				   {
				    $error .= $category_name. constant('TI_PASSWORD_WRONG_MESSAGE');
				   }
		}
      else
		 {
		 $error .=  mysqli_error($con);
		 }

	} 
	
?>
 <div class="main-content">
                    <div class="container-fluid" >
            <div class="row-fluid">
                <div class="area-top clearfix">
                    <div class="pull-left header">
                        <h3 class="title">
                        <i class="icon-edit"></i>
                         <?php echo constant('TI_MANAGE_CHANGE_PASSWORD');?> </h3>
                    </div>

                </div>
            </div>
        </div>
                       
                    <div class="container-fluid padded">
<div class="box">
	<div class="box-header">
    
		<ul class="nav nav-tabs nav-tabs-left">

			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-lock"></i> 
					<?php echo constant('TI_CHANGE_PASSWORD');?></a></li>
		</ul>
        
	</div>
	<div class="box-content padded">
	<?php include("message.php");?>
		<div class="tab-content">
			<div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content padded">
		    <form action="<?php $PHP_SELF ?>" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top">
			
		
							 <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_CURRENT_PASSWORD');?></label>
                                <div class="controls">
                                    <input type="password" class="" name="old_pass" value=""/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_NEW_PASSWORD');?></label>
                                <div class="controls">
                                    <input type="password" class="" name="new_pass" value=""/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_CONFIRM_PASSWORD');?></label>
                                <div class="controls">
                                    <input type="password" class="" name="con_pass" value=""/>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-gray"><?php echo constant('TI_CHANGE_PASSWORD_UPDATE_BUTTON');?></button>
								<input type="hidden" value="Add new user" name="submit">
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