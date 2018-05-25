
<?php
session_start();
require_once 'include/configure.php' ;
$course = mysqli_real_escape_string($con,$_POST['course']);
//echo $deptId;
 		 $result = mysqli_query($con,"SELECT * FROM subject where subject_name='".$course."'");

		  while($row = mysqli_fetch_assoc($result)) {
		          
		          echo $row['s_id'];
 	}
		         
?>