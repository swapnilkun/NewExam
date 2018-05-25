<?php
include('include/configure.php');
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
	function getadmin(admin_id){
		
		var strURL="admin_find.php?admin_id="+admin_id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('admindiv').innerHTML=req.responseText;						
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

<script> 
	function togglecheckboxes(master,group)
	{ 
		var cbarray = document.getElementsByName(group); 
		for(var i = 0; i < cbarray.length; i++)
		{
			cbarray[i].checked = master.checked; 
		}
	} 
</script>


<?php



if (isset($_POST['submit2'])) 
{
	
	if($_POST['to']=="admin")
	{
		$query_student_result=mysqli_fetch_array(mysqli_query($con,"select * from student where student_id='".$_SESSION['student_id']."'"));
		$query_category_result=mysqli_fetch_array(mysqli_query($con,"select * from category where c_id='".$query_student_result['category_id']."'"));

		
		if($_POST['cbg2']!="")
		{
			$subject= mysql_prep($_POST['subject_name']);
			$message= mysql_prep($_POST['message']);

			$checkBox1 = implode(',', $_POST['cbg2']);
			$checkBox= explode(',',$checkBox1);
			for ($i=0; $i<sizeof($checkBox); $i++)
			{
				$general_setting=mysqli_fetch_array(mysqli_query($con,"select * from general_setting where id=1 and g_id=1"));
				$message_success="";
				$query_user=mysqli_query($con,"select * from user where u_id='".$checkBox[$i]."'");
				$result_user=mysqli_fetch_array($query_user);
				$to=$result_user['useremail'];
				$username=$result_user['username'];
				
				$messages="<html><body>
				<table>
				<tr><td>Hi ".$username.",</td></tr>	
				<tr><td>&nbsp;</td></tr>
				<tr><td>".$message."</td></tr>
				<tr><td>&nbsp;</td></tr>									
				<tr><td><b>Best Regards,</b></td></tr>
				<tr><td>".$_SESSION['student_name']."</td></tr>
				<tr><td>".$query_category_result['category_name']."</td></tr>				
				<tr><td>".$query_student_result['student_phone']."</td></tr>
				</table>
				</body></html>";

				

				$headers = "From:".$general_setting['g_email']."\r\n";
				$headers .= "Reply-To:".$_SESSION['student_email']."\r\n";
				$headers .= 'MIME-Version: 1.0' . "\r\n";
				$headers .= "Content-type:text/html; charset=iso-8859-1\r\n";

				

		

				$student=mail($to,$subject,$messages,$headers );




				$username="";
				$messages="";
				if($student)
				{
				$message_success .= constant('TI_STUDENT_MAIL_MESSAGE');
				}
				else
				{
				$error .= constant('TI_STUDENT_MAIL_MESSAGE_ERROR');
				}			
			}
		}
		else
		{
			$error .= constant('TI_NOTICE_SELECT_STUDENT');
		}
   }
}
?>

<body>
        <div class="main-content">
          <div class="container-fluid" >
            <div class="row-fluid">
                <div class="area-top clearfix">
                    <div class="pull-left header">
                        <h3 class="title">
                        <i class="icon-edit"></i>
                       <?php echo constant('TI_LABEL_CONTACT');?></h3>
                    </div>

                </div>
            </div>
        </div>
        
	<div class="container-fluid padded">
	<div class="box">
	<?php include("message.php");?>
                       
	<div class="box-header">
    
		<ul class="nav nav-tabs nav-tabs-left">
		   
			<li class="active">
            	
				<a href="#add" data-toggle="tab"><i class="icon-align-justify"></i>
				<?php echo constant('TI_ADMIN');?>              	</a>
			</li>
		</ul>
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
		    				
            <div class="tab-pane active" id="add" style="padding: 5px">
               <div class="box-content">  
					<form action="<?php $PHP_SELF ?>" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top" id="chk_option" onsubmit="return confirm_update();">

						<div class="padded">       
							<div class="control-group">
                                <label class="control-label"><?php echo constant('TI_ADMIN');?></label>
                                <div class="controls">
									<select name="to" class="validate[required]" onChange="getadmin(this.value)">
									<option value=""><?php echo constant('TI_SELECT_FOR_MESSAGE');?></option>  
									<option value="admin"><?php echo constant('TI_ADMIN');?></option>
									</select>
                                </div>
                            </div>
						</div>

						<div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_SUBJECT_NAME');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="subject_name"/>
                                </div>
                            </div>
                        </div>

						
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_MAIL_MESSAGE');?></label>
                                <div class="controls">
                                   
									<div class="box closable-chat-box">									
									<div class="chat-message-box">
									<textarea name="message" class="validate[required]" id="text_for_signature" rows="5" placeholder="Add Message"></textarea>
									</div>
									</div>
                                </div>
                            </div>
                        </div>
						
						
                     <div id="admindiv"></div> 

                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray" id="buttonClass"><?php echo constant('TI_SEND_MAIL');?></button>
							<input type="hidden" name="submit2" value="submit">
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

<script type="text/javascript">
    function confirm_update() {
        check=false;
        var aCheckbox = document.getElementById('chk_option').elements;
        for(i=0;i<aCheckbox.length;++i)
        {
            if(aCheckbox[i].type=='checkbox' && aCheckbox[i].checked)
           {
               check=true;
           }
         }
         if(check==true)
         {
             return true;
        }
        else
            {alert("Please select at least one email id/username to send the mail");
            return false;
            }

    }
    </script>
</body>