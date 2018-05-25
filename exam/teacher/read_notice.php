<?php
include('include/configure.php');
$notice_id=$_GET['notice_id'];


$query=mysqli_fetch_array(mysqli_query($con,"update noticecenter set read_unread_notice='0' where notice_id='".$notice_id."' and center_id='".$_SESSION['center_id']."' "));


?>