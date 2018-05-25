<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
?>
  
<?php
if(isset($_POST['submit']) and $_POST['branch_id']!="")
{	
    $bm_name=mysql_prep($_POST['bm_name']);
	$bm_no=mysql_prep($_POST['bm_no']);
	$branch_name=mysql_prep($_POST['branch_name']);
	$branch_address=mysql_prep($_POST['$branch_address']);


		$query=mysqli_query($con,"update branch set  bm_name='{$bm_name}', bm_number='{$bm_no}',branch_name='{$branch_name}', branch_address='{$branch_address}' where branch_id='".$_POST['branch_id']."'");
	
		if($query)
		{
			$message_success .=constant('TI_BRANCH_EDIT_MESSAGE');
		}
		else
		{
		$error .= constant('TI_BRANCH_MYSQL_ERROR');
		}		   
	
}
if($_GET['branch_id']!="")
{
	$branch_id=$_GET['branch_id'];
	$query=mysqli_query($con,"select * from branch where branch_id='".$branch_id."'");
	$result=mysqli_fetch_array($query);
}

?>
<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i><?php echo "Manage Branch";?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-wrench"></i><?php echo "Edit Branch";?></a>
					</li>
				</ul>	
			</div>
	<div class="box-content padded">
		<div class="tab-content">        
			<?php include("message.php");?>
			<div class="tab-pane active" id="add" style="padding: 5px">
				<form method="post" action="" class="form-horizontal validatable" enctype="multipart/form-data">
                      	 
                      	  <div class="control-group">
							  <label class="control-label"><?php echo constant('TI_LABEL_BRANCH_MANAGER_NAME');?></label>
                                  <div class="controls">
									<select name="bm_name" id="bm_name" class="chzn-select">
									<option value="">Select BM</option>  
										<?php $query_course=mysqli_query($con,"select * from teacher");
										while($result_course=mysqli_fetch_array($query_course))
										{
										?>
                                    	<option value="<?php echo $result_course['teacher_name'];?>" <?php if($result_course['teacher_name']==$result['bm_name']){echo 'selected="selected"';}?>><?php echo ucfirst($result_course['teacher_name']);?></option>
										<?php }?>
                                    </select>
                                      <input type="hidden"  name="bm_no" id="bm_no"/>
                                </div>
                            </div>
                            
                      	 
                      	 <div class="control-group">
                                <label class="control-label"><?php echo "BM Number";?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="bm_no" value="<?php echo $result['bm_no'];?>"/>
                                </div>
                            </div>
                            
                            
                            <div class="control-group">
                                <label class="control-label"><?php echo "Branch Name";?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="branch_name" value="<?php echo $result['branch_name'];?>"/>
                                </div>
                            </div>
							
                            	<div class="control-group">
                                <label class="control-label"><?php echo "Branch Address";?> </label>
                                <div class="controls">                                    
									<div class="box closable-chat-box">									
									<div class="chat-message-box">
									<textarea name="branch_address" id="text_for_signature" rows="5" placeholder="Add Address"> <?php echo $result['branch_address'];?></textarea>									
									</div>
									</div>
                                </div>
                            </div>
							
						
							
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo "Edit Branch";?> </button>
							<input type="hidden" value="Update_setting" name="submit">
							<input type="hidden" value="<?php echo $result['branch_id'];?>" name="branch_id">
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