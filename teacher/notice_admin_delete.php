<?php
include('include/configure.php');

if(isset($_GET['n_id']))
{
$id=$_GET['n_id'];
$query=mysqli_query($con,"delete from noticecenter where center_id='".$_SESSION['center_id']."' AND notice_id='".$id."'");
 if($query)
	{
  header("location:notice_admin.php");
    }
	else
	{
	mysqli_error($con);
	}

}
?>