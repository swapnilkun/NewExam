<?php
include('include/configure.php');

$project = mysqli_real_escape_string($con,$_POST['state']);

	 $role_result = $con->query("SELECT * FROM teacher where teacher_name='$project'");

		while($row13 = $role_result->fetch_assoc())
		{	    
		 echo $row13['phone_no'];
			
      	}
      
?>