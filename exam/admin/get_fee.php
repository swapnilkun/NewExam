<?php
session_start();
require_once 'include/configure.php' ;
 $instCourseIds = mysqli_real_escape_string($con,$_POST['instCourseIds']);

//$instCourseIds = intval($con,$_POST['instCourseIds']);
 
//echo '<script>alert('.$instCourseId.')</script>';

//$state = mysqli_real_escape_string($con,$_POST['state']);

//echo $deptId;

 		 $result = mysqli_query($con,"SELECT * FROM subject where subject_name='".$instCourseIds."'");
	      while($row = mysqli_fetch_assoc($result)) 
	      {
		    echo $row['course_fee'];
          }
?>		          