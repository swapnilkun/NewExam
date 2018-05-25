<?Php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');

if($_GET['branch_id']!="")
{
     $branch_id=$_GET['branch_id'];

	 $query2=mysqli_query($con,"select * from branch where branch_id='{$branch_id}'");
	 $res=mysqli_fetch_array($query2);
}

?>

<div class="tab-pane box active" id="edit">
	<div class="box-content">
		<form action="<?php $PHP_SELF ?>" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top" enctype="multipart/form-data">
					<br/>
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Branch Name</label>
                                <div class="controls">
                                    <?php echo $res['branch_name'];?>
                                </div>
                            </div>
                        </div>

					
						<div class="padded">                   
                            <div class="control-group">
                                <label class="control-label">Branch Address</label>
                                <div class="controls">
									<?php echo $res['branch_address'];?>
                                </div>
                            </div>
                        </div>

		</form>
	</div>
</div>
