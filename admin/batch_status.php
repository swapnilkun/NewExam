<?php
include('include/configure.php');
if(isset($_GET['b_id']))
{
	 $b_id=$_GET['b_id'];

	$select=mysqli_query($con,"select * from batch where b_id='$b_id'");
	while($row=mysqli_fetch_object($select))
	{
		$status_var=$row->batch_status;
		if($status_var=='0')
		{
			$status_state=1;
		}
		else
		{
			$status_state=0;
		}
		$update=mysqli_query($con,"update batch set batch_status='$status_state' where b_id='$b_id' ");
		if($update)
		{
			header("Location:batch.php");
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
?>