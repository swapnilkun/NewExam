<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');

if(isset($_POST['submit']) && $_POST['id']!="")
{	
        $branch_name=mysql_prep($_POST['branch_name']);
		$purpose=mysql_prep($_POST['purpose']);
		$amount=mysql_prep($_POST['amount']);
		$date=mysql_prep($_POST['date']);
		$date1 = date('Y-m-d',strtotime($date));
		$desc=mysql_prep($_POST['desc']);
		
		 $query_update_mysql_student=mysqli_query($con,"update expenses set branch_name='{$branch_name}', purpose='{$purpose}',amount='{$amount}',date='{$date1}',description='{$desc}' where id='".$_POST['id']."'");
			 
		
		if($query_update_mysql_student)
		{
			
			$message_success .=ucfirst($student_name)." ". constant('TI_EXPENSES_EDIT_MESSAGE');

		}
		else
		{
			$error .=  constant('TI_EXPENSE_MYSQL_ERROR');
		}
	
	
}
if($_GET['id']!="")
{
$id=$_GET['id'];
$query=mysqli_query($con,"select * from expenses where id='".$id."'");
$result=mysqli_fetch_array($query);

}
?>

<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i><?php echo constant('TI_MANAGE_EXPENSES');?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-wrench"></i><?php echo constant('TI_EXPENSES_EDIT_BUTTON');?></a>
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
                                <label class="control-label"><?php echo constant('TI_LABEL_BRANCH_NAME');?></label>
                                <div class="controls">
									<select name="branch_name" class="chzn-select">
									<option value="">Select Branch</option>  
										<?php $query_course=mysqli_query($con,"select * from branch");
										while($result_course=mysqli_fetch_array($query_course))
										{
										?>
                                    	<!--<option value="<?php echo $result_course['branch_name'];?>"><?php echo ucfirst($result_course['branch_name']);?></option>-->
                                    		 <option value="<?php echo $result_course['branch_name']; ?>" <?php if($result_course['branch_name'] == $result['branch_name']) { echo "selected=selected"; }?>> <?php echo $result_course['branch_name']; ?></option>
							
										
										<?php }?>
                                    </select>
                                </div>
                            </div>
						</div>
						
                        <div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Purpose</label>
                                <div class="controls">
                                 	<div class="box closable-chat-box">									
									<div class="chat-message-box">
									<textarea name="purpose" id="text_for_signature" rows="3" placeholder="Purpose"><?php echo $result['purpose']; ?></textarea>
									</div>
								</div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="padded">  
							<div class="control-group">
                                <label class="control-label">Amount</label>
                                <div class="controls">                                    
								
								    <input type="text"  name="amount" value="<?php echo $result['amount']; ?>" />										
									</div>
								
                                </div>
                           </div>
                           
                           <div class="padded"> 
							 <div class="control-group">
                                <label class="control-label">Date</label>
                                <div class="controls">
                                    <input type="date" name="date" value="<?php echo $result['date']; ?>"  />
                                </div>
                            </div>
                            </div>
							
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                 	<div class="box closable-chat-box">									
									<div class="chat-message-box">
									<textarea name="desc" id="text_for_signature" rows="3" placeholder="Description"><?php echo $result['description']; ?></textarea>
									</div>
								</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo constant('TI_EXPENSES_EDIT_BUTTON');?> </button>
							<input type="hidden" value="Update_setting" name="submit">
							<input type="hidden" value="<?php echo $result['id'];?>" name="id">
                        </div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>
</div>       
           <?php include("copyright.php");?>
		   </div>
	</div>
</body> 
</html>