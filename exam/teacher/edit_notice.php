<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');

if(isset($_POST['submit']))
{	
     $notice_subject= mysql_prep($_POST['notice_subject']);	
	 $notice_textarea= mysql_prep($_POST['notice_textarea']);	
     $notice_date = mysql_prep($_POST['notice_date']);
	
	 if($notice_date!="")
		{
		$dobexplode=explode("/",$notice_date);
		$dob_day=$dobexplode[1];
		$dob_month=$dobexplode[0];
		$dob_year=$dobexplode[2];
		$notice_date_from=$dob_year.'-'.$dob_month.'-'.$dob_day;
		
		}

	$query_update_notice = "update notice set noitce='{$notice_textarea}', notice_subject='{$notice_subject}', notice_date='{$notice_date_from}' where n_id='".$_POST['n_id']."' ";

		$result_notice=mysqli_query($con,$query_update_notice);
		if($result_notice)
		{
			$message_success .=constant('TI_NOTICE_EDIT_SUCCESS_MESSAGE') ;;
		}
		else
		{
			$error .= constant('TI_NOTICE_EDITED_FAILED_MESSAGE') ;
		}
}
if($_GET['n_id']!="")
{
	$n_id=$_GET['n_id'];
	$query=mysqli_query($con,"SELECT * FROM notice where n_id='".$n_id."'");
	$result=mysqli_fetch_array($query);
	$result['notice_date'];
	
	$date=explode("-",$result['notice_date']);
    
	$date_day=$date[2];
	$date_month=$date[1];
	$date_year=$date[0];
	$date_edit_notice=$date_month.'/'.$date_day.'/'.$date_year;
	

}

?>

<div class="main-content">
	<div class="container-fluid" >
		<div class="row-fluid">
			<div class="area-top clearfix">
				<div class="pull-left header">
					<h3 class="title"><i class="icon-edit"></i><?php echo constant('TI_MANAGE_NOTICE');?> </h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid padded">
		<div class="box">
			<div class="box-header">    	
				<ul class="nav nav-tabs nav-tabs-left">
					<li class="active">
						<a href="#add" data-toggle="tab"><i class="icon-wrench"></i><?php echo constant('TI_EDIT_NOTICE');?></a>
					</li>
				</ul>	
			</div>
			<div class="box-content padded">
				<div class="tab-content">        
					<?php include("message.php");?>
					<div class="tab-pane active" id="add" style="padding: 5px">
						
					<form action="<?php $PHP_SELF ?>" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top" enctype="multipart/form-data">
			             <div style="display:none">
				             <input name="authenticity_token" value="41c9b784755e732ee1b2a6ab5f8800f1" type="hidden">
			              </div> 
			         <div class="padded"> 
						   <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_NOTICE_SUBJECT');?> </label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="notice_subject" value="<?php echo $result['notice_subject'];?>"/>
                                </div>
                            </div>	
							
                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_NOTICE_DATE');?></label>
                                <div class="controls">
                                    <input type="text" name="notice_date"  class="validate[required,custom[dateFormat]] datepicker" value="<?php echo $date_edit_notice ;?>"/>
                                </div> 
                            </div>

                            <div class="control-group">
                                <label class="control-label"><?php echo constant('TI_LABEL_NOTICE');?></label>
                                <div class="controls">
                                     <div class="box closable-chat-box">
                                        <div class="box-content">
                                                <div class="chat-message-box">
                                                <textarea name="notice_textarea" id="ttt" class="validate[required]" rows="5" placeholder="add notice"><?php echo $result['noitce'];?></textarea>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


						<div class="form-actions">
							<button type="submit" class="btn btn-gray"><?php echo 'Edit Notice';?></button>
							<input type="hidden" value="Edit Notice" name="submit">
							<input type="hidden" value="<?php echo $result['n_id'];?>" name="n_id">
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