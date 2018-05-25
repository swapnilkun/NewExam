<?php 
include('include/configure.php');
include('login_check.php');
if(isset($_GET['e_id']))
{
	$exam_id=$_GET['e_id'];
$query=mysqli_query($con,"select * from exam where e_id='$exam_id'");
while($result=mysqli_fetch_object($query))
	{
   $status=$result->exam_status;
   if($status=='0')
		{
         $exam_status=1;
        }
		else
		{
		$exam_status=0;
		}
	$update=mysqli_query($con,"update exam set exam_status='$exam_status' where e_id='$exam_id'");
    if($update)
	{
	  header("Location:exam.php");
	 }
	   else
		{
			echo mysqli_error($con);
		}
   }
  }

?>