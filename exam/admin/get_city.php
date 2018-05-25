

<?php
session_start();
require_once 'include/configure.php' ;
$state = mysqli_real_escape_string($con,$_POST['state']);
//echo $deptId;
 		 $result = mysqli_query($con,"SELECT * FROM district where state_id='".$state."'");
	
		$options = "<option value=''>Select City</option>";
		  while($row = mysqli_fetch_assoc($result)) {
		          
		          
		          		$options .= "<option value='".$row['id']."'>".$row['district_name']."</option>";
	                	}
		          	echo $options;	
?>