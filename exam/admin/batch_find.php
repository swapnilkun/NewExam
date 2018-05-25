<?php 
include('include/configure.php');
$course_name=intval($_GET['course_name']);
$batch_name=intval($_GET['batch_name']);

$query="SELECT s.s_id,s.subject_name from subject s join batch b on b.course_name=s.s_id  WHERE b.course_name=".$course_name." AND b.batch_name=".$batch_name." AND  b.batch_status=1";
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
	
	
	$query_question_no=mysqli_query($con,"SELECT * FROM questions_table WHERE question_status=1 AND s_id='".$row['s_id']."'");
	$numbrofquestion_in_a_subject=mysqli_num_rows($query_question_no);
	
	
	
	
	?>
<div class="control-group">
	<label class="control-label"><input type="checkbox" name="subject_id[]" value="<?php echo $row['s_id']?>"  onclick="showMe('div<?php echo $row['s_id']?>', this)">&nbsp;<?php echo ucfirst($row['subject_name']);?>  </label>
	<div class="controls">
		<div id="div<?php echo $row['s_id']?>" style="display:none">
			&nbsp;<?php echo constant("TEXTUSINTENTIO_EXAM_LABEL_COURSE_QUESTION");?>(<?php echo $numbrofquestion_in_a_subject;?>)&nbsp;<input type="text" name="show_question[]" class="validate[required]">&nbsp;&nbsp; <?php echo constant("TEXTUSINTENTIO_EXAM_LABEL_COURSE_QUESTION_WARNING");?> 
			
		</div>
	</div>
</div>
<?php } ?>