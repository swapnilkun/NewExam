<?php
include('include/configure.php');


if(isset($_GET['notice_id']))
{
$status1=$_GET['notice_id'];
$update=mysqli_query($con,"DELETE FROM notice where n_id='$status1'");


$update1=mysqli_query($con,"DELETE FROM noticestudent where notice_id='$status1'");

$update2=mysqli_query($con,"DELETE FROM noticecenter where notice_id='$status1'");


if($update)
{
header("Location:notice.php");
}
else
{
echo mysqli_error($con);
}
}


?>