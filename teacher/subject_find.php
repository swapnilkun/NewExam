<?php 
include('include/configure.php');
$category_id=intval($_GET['category_id']);
$subcategory_id=intval($_GET['subcategory_id']);

$query="SELECT * FROM subject s JOIN teacher t ON s.s_id=t.subject_id WHERE t.center_id='".$_SESSION['center_id']."' and subject_status=1";
$result=mysqli_query($con,$query);


?>
<script type="text/javascript"> 
	<!-- 
	function showMe (it, box) { 
	  var vis = (box.checked) ? "block" : "none"; 
	  document.getElementById(it).style.display = vis;
	} 
	//--> 
</script>

<?php while($row=mysqli_fetch_array($result)) {
	
	
	$query_question_no=mysqli_query($con,"SELECT * FROM questions_table q JOIN subject s ON q.c_id=s.category_id AND q.s_c_id=s.subcategory_id AND q.s_id=s.s_id WHERE question_status=1 AND s.center_id='".$_SESSION['center_id']."'");
	$numbrofquestion_in_a_subject=mysqli_num_rows($query_question_no);
	
	
	
	
	?>
<div class="control-group">
	<label class="control-label"><input type="checkbox" name="subject_id[]" value="<?php echo $row['s_id']?>"  onclick="showMe('div<?php echo $row['s_id']?>', this)">&nbsp;<?php echo ucfirst($row['subject_name']);?>  </label>
	<div class="controls">
		<div id="div<?php echo $row['s_id']?>" style="display:none">
			&nbsp;<?php echo constant("TEXTUSINTENTIO_EXAM_LABEL_SUBJECT_QUESTION");?>(<?php echo $numbrofquestion_in_a_subject;?>)&nbsp;<input type="text" name="show_question[]" class="validate[required]">&nbsp;&nbsp; <?php echo constant("TEXTUSINTENTIO_EXAM_LABEL_SUBJECT_QUESTION_WARNING");?> 
			
		</div>
	</div>
</div>
<?php } ?>