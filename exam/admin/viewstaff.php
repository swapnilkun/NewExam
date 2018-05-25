<?Php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');

if($_GET['s_id']!="")
{
     $s_id=$_GET['s_id'];

	 $query2=mysqli_query($con,"select * from staff where staff_id='{$s_id}'");
	 $res=mysqli_fetch_array($query2);
}

?>

<div class="tab-pane box active" id="edit">
	<div class="box-content">
		<form action="<?php $PHP_SELF ?>" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top" enctype="multipart/form-data">
					<br/>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Staff Name</label>
                                <div class="controls">
                                    <?php echo $res['staff_name'];?>
                                </div>
                            </div>
                        </div>

					
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Staff Address</label>
                                <div class="controls">
									<?php echo $res['staff_address'];?>
                                </div>
                            </div>
                        </div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Phone No.</label>
                                <div class="controls">
                                    <?php echo $res['phone_no'];?>
                                </div>
                            </div>
                        </div>

						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Staff Email Id</label>
                                <div class="controls">
                                    <?php echo $res['email'];?>
                                </div>
                            </div>
                        </div>
			
		</form>
	</div>
</div>
