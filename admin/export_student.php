
<?php
session_start();
    require_once 'include/configure.php';
    

					$sql = "SELECT * from student where type='register' or type='enquiry'";  
					$resultset = mysqli_query($con,$sql);			
					$result = array();

		            while($rows = mysqli_fetch_assoc($resultset)) {
		            $result[] = $rows; 
	                }
				
if(isset($_POST["export_data"])) {	
    
	$filename = "student_list".date('Ymd') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");	
	$show_coloumn = false;
	
	if(!empty($result)) {
	  foreach($result as $record) {
		if(!$show_coloumn) {
		  // display field/column names in first row
		  echo implode("\t", array_keys($record)) . "\n";
		  $show_coloumn = true;
		}
		echo implode("\t", array_values($record)) . "\n";
	  }
	}
	exit;  
}
?>