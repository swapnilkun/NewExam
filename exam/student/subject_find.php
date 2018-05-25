<?php 
include('include/configure.php');

$sub_category_id=intval($_GET['sub_category_id']);
$query="SELECT * FROM subject WHERE  subcategory_id=".$sub_category_id." AND  subject_status=1";
$result=mysqli_query($con,$query);
?>
<select name="s_id">
<option><?php echo constant('TI_SELECT_SUBJECT_NAME');?></option>
<?php while($row=mysqli_fetch_array($result)) { ?>
<option value="<?php echo $row['s_id']?>"><?php echo ucfirst($row['subject_name']);?></option>
<?php } ?>
</select>
