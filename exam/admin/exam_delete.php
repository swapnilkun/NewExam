<?php
include('include/configure.php');
include('login_check.php');
if(isset($_GET['e_id']))
{
$exam_id=$_GET['e_id'];
$query=mysqli_query($con,"delete from exam where e_id='$exam_id'");
 if($query)
	{
  header("location:exam.php");
    }
	else
	{
	mysqli_error($con);
	}
}
?>