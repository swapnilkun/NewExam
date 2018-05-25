<?php
include('include/configure.php');

$branch_name=intval($_GET['category_id']);
$query=mysqli_query($con,"SELECT * FROM exam WHERE branch_name=".$branch_name." and exam_status=1");

?>
<select name="batch_name">
<option >Select</option>
<?php while($row=mysqli_fetch_array($query)) { ?>
<option value=<?php echo $row['batch_name']?>><?php echo ucfirst($row['batch_name']);?></option>
<?php } ?>
</select>
