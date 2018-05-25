<?php
include('include/configure.php');

$course_name=intval($_GET['course_name']);
$query=mysqli_query($con,"SELECT * FROM batch WHERE course_name=".$course_name." and batch_status=1");

?>
<select name="batch_name" onchange="getsubject(<?php echo $course_name;?>,this.value)">
<option value="">Select Batch</option>
<?php while($row=mysqli_fetch_array($query)) { ?>
<option value=<?php echo $row['batch_name']?>><?php echo ucfirst($row['batch_name']);?></option>
<?php } ?>
</select>
