<?php
include('include/configure.php');

$category_id=intval($_GET['category_id']);
$query=mysqli_query($con,"SELECT * FROM subcategory WHERE category_id=".$category_id." and subcategory_status=1");

?>
<select name="s_c_id" onchange="getsubject(<?php echo $category_id;?>,this.value)"  class="chzn-select">
<option ><?php echo constant('TI_SELECT_SUB_CATEGORY');?></option>
<?php while($row=mysqli_fetch_array($query)) { ?>
<option value=<?php echo $row['s_c_id']?>><?php echo ucfirst($row['subcategory_name']);?></option>
<?php } ?>
</select>
