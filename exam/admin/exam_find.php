<?php 
include('include/configure.php');
$category_id=intval($_GET['category_id']);
$subcategory_id=intval($_GET['subcategory_id']);

$query="SELECT * FROM exam WHERE category_id=".$category_id." AND subcategory_id=".$subcategory_id." AND  exam_status=1";
$result=mysqli_query($con,$query);

?>
<select name="e_id" class="chzn-select">
<option ><?php echo constant('TI_DROPDOWN_EXAM');?></option>
<?php while($row=mysqli_fetch_array($result)) { ?>
<option value=<?php echo $row['e_id']?>><?php echo ucfirst($row['exam_name']);?></option>
<?php } ?>
</select>