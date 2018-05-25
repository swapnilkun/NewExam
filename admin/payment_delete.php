<?php
include('include/configure.php');
if(isset($_GET['student_id']))
{
$id=$_GET['student_id'];
$query=mysqli_query($con,"delete from student where student_id='$id'");
 if($query)
	{
  header("location:payment.php");
    }
	else
	{
	mysqli_error($con);
	}

}
?>