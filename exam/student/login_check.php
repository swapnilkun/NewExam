<?php
if($_SESSION['student_id']=="" and $_SESSION['center_id']=="" and $_SESSION['student_email']=="" and $_SESSION['student_name']=="")
{
	redirect_to('index.php');
}
?>