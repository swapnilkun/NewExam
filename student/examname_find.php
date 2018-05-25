<?php
include('include/configure.php');

//$course_name=intval($_GET['course_name']);

$course_name=intval($_GET['course_name']);
$batch_name=intval($_GET['batch_name']);

$query="SELECT exam_name from exam WHERE subject_id=".$course_name." AND batch_name=".$batch_name." AND  exam_status=1";
$sql=mysqli_query($con,$query);
?>
<select name="exam_name">
<option value="">Select Exam</option>
<?php while($row=mysqli_fetch_assoc($sql)) { ?>
<option value="<?php echo $row['exam_name']?>"><?php echo $row['exam_name'];?></option>
<?php } ?>
</select>
