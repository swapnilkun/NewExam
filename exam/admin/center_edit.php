<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
?>
  
<script language="javascript" type="text/javascript">

function getXMLHTTP() { 
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getState(category_id) {		
		
		var strURL="subcategory_find.php?category_id="+category_id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('subcategorydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	function getsubject(category_id,subcategory_id) {		
		var strURL="subject_find.php?category_id="+category_id+"&subcategory_id="+subcategory_id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('subjectdiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}	
			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script> 
<?php
if(isset($_POST['submit']) and $_POST['center_id']!="")
{	
//	$subject_id= implode(",",$_POST['subject_id']);
//	$category_id= mysql_prep($_POST['category_id']);
//	$subcategory_id= mysql_prep($_POST['s_c_id']);
	$teacher_id=mysql_prep($_POST['teacher_id']);
	$teacher_name=mysql_prep($_POST['teacher_name']);
	$teacher_addr=mysql_prep($_POST['teacher_addr']);
	$phone_no=mysql_prep($_POST['phone_no']);
	$username=mysql_prep($_POST['username']);
	$password_md5=encrypt($_POST['password']);
	$password=mysql_prep($_POST['password']);
	$email = @mysql_real_escape_string($_POST['email']);

	$sql = "SELECT email FROM teacher WHERE email='$email'";
	$result = mysqli_query($con,$sql);

	if(mysqli_num_rows($result) >0)
	{
		$query=mysqli_query($con,"update teacher set  teacher_name='{$teacher_name}', teacher_addr='{$teacher_addr}',teacher_id='{$teacher_id}',phone_no='{$phone_no}',username='{$username}',password_md5='{$password_md5}',password='{$password}' where center_id='".$_POST['center_id']."'");
		{
		$error .= $category_name. constant('TI_BRANCH_MANAGER_ERROR_ALLREADY_EXIT');
	   }		
	}
	else
	{		
		$query=mysqli_query($con,"update teacher set teacher_name='{$teacher_name}', teacher_addr='{$teacher_addr}',teacher_id='{$teacher_id}',phone_no='{$phone_no}',username='{$username}',password_md5='{$password_md5}',password='{$password}' where center_id='".$_POST['center_id']."'");
		if($query)
		{
			$message_success .=constant('TI_BRANCH_MANAGER_EDIT_MESSAGE');
		}
		else
		{
		$error .= constant('TI_BRANCH_MANAGER_MYSQL_ERROR');
		}		   
	}
}
if($_GET['center_id']!="")
{
	$center_id=$_GET['center_id'];
	$query=mysqli_query($con,"select * from teacher where center_id='".$center_id."'");
	$result=mysqli_fetch_array($query);
}

?>
<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i><?php echo "Manage Branch Manager";?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-wrench"></i><?php echo "Edit Branch Manager";?></a>
					</li>
				</ul>	
			</div>
	<div class="box-content padded">
		<div class="tab-content">        
			<?php include("message.php");?>
			<div class="tab-pane active" id="add" style="padding: 5px">
				<form method="post" action="" class="form-horizontal validatable" enctype="multipart/form-data">
                      
						<!--<div class="padded">       
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_COURSE_NAME');?></label>
                                <div class="controls">
									<select name="category_id" class="chzn-select" onChange="getState(this.value)">
									<option><?php echo constant('TI_SELECT_COURSE');?></option>  
										<?php $query_category=mysqli_query($con,"select * from category where category_status=1");
										while($result_category=mysqli_fetch_array($query_category))
										{
										?>
                                    	<option value="<?php echo $result_category['c_id'];?>"><?php echo ucfirst($result_category['category_name']);?></option>
										
										<?php }?>
                                    </select>
                                </div>
                            </div>
						</div>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_CLASS_NAME');?></label>
                                 <div class="controls" id="subcategorydiv">
									<select name="subcategory_id" class="chzn-select">										
                                    	<option><?php echo constant('TI_SELECT_CLASS_FIRST');?></option>
										
                                    </select>
                                </div>
                            </div>
                        </div>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_SUBJECT_NAME');?></label>
                                 <div class="controls" id="subjectdiv">
																		
                                    	<?php echo constant('TI_SELECT_SUBJECT_FIRST');?>
                                   
                                </div>
                            </div>
                        </div>-->

						
                         <div class="padded"> 
								<div class="control-group">
                                <label class="control-label"><?php echo "Branch Manager ID";?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" readonly name="teacher_id" value="<?php echo $result['teacher_id'];?>"/>
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label"><?php echo "Branch Manager Name";?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="teacher_name" value="<?php echo $result['teacher_name'];?>"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo "Branch Manager Address";?> </label>
                                <div class="controls">                                    
									<div class="box closable-chat-box">
									
									<div class="chat-message-box">
									<textarea name="teacher_addr" id="text_for_signature" rows="5" placeholder="Add Center"><?php echo $result['teacher_addr'];?></textarea>
									
									</div>
									</div>
                                </div>
                            </div>
							 <div class="control-group">
                                <label class="control-label"><?php echo "Phone No.";?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="phone_no"value="<?php echo $result['phone_no'];?>" />
                                </div>
                            </div>          
							
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_CENTER_EMAIL');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required,custom[email]]" name="email" value="<?php echo $result['email'];?>"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_CENTER_USER_NAME');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="username" value="<?php echo $result['username'];?>"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_CENTER_PASSWORD');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="password" value="<?php echo $result['password'];?>"/>
                                </div>
                            </div>
							
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo "Edit Branch Manager";?> </button>
							<input type="hidden" value="Update_setting" name="submit">
							<input type="hidden" value="<?php echo $result['center_id'];?>" name="center_id">
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