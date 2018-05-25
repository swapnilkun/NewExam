<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');


if($_GET['exam_id']!="")
{
	//$p_e_id=decrypt_string($_GET['exam_id']);
	$e_id=$_GET['exam_id'];	

	$exam_dy = $_GET["exam_dy"];
	$given_exam_date = $exam_dy;

	$query_check_center=mysqli_query($con,"select * from exam where  e_id='".$e_id."' and exam_status=1");
	$row_check_center=mysqli_fetch_array($query_check_center);
	$center_id_explode=explode(",",$row_check_center['category_id']);
	$subject_id= $row_check_center['subject_id'];
	
	if(in_array($_GET['caid'],$center_id_explode))
	{
		$center_id=$_GET['caid'];
		$student_id=$_GET['sid'];
		$query_student_name=mysqli_fetch_array(mysqli_query($con,"select s.student_name,b.batch_name,b.batch_time,s.student_id from student s join batch b on s.b_id=b.b_id where student_id='".$student_id."'"));
		//$query_center_name=mysqli_fetch_array(mysqli_query($con,"select * from center where c_id='".$center_id."'"));
	}
}

$query=mysqli_query($con,"select * from exam where  category_id='".$row_check_center['category_id']."' and e_id='".$e_id."' and exam_status=1");
$row=mysqli_fetch_array($query);

$query_subject=mysqli_fetch_array(mysqli_query($con,"select * from subject where s_id='".$subject_id."'"));

?>		
<style>
.ticket{
	margin: 56px 189px;
	border: 1px solid #ccc;
}
.padding-p-l{
	padding: 0px 31px;
}
.padding-p-l h4{
	font-weight: bolder;
   float:right;
    color: #000;
}
.padding-p-l p{
	font-weight: 100;
    font-size: 12px;
}
.middle{
	padding: 0px 31px;
	text-align: justify;
    
}
p, label{
	font-size: 15px;
}
.info{
	padding: 30px 64px 0;
	color: #000;
}

</style>
<div class="main-content">
                    <div class="container-fluid" >
            <div class="row-fluid">
                <div class="area-top clearfix">
                    <div class="pull-left header">
                        <h3 class="title">
                        <i class="icon-edit"></i>
                       Hall Ticket
						</h3>
                    </div>

                </div>
            </div>
        </div>
        
     
        
		<div class="container-fluid padded">
			<div class="box">
			
				<div class="box-content padded">
					<div class="tab-content">
						<div class="tab-pane box active" id="list" valign="top">
							<div class="ticket" id="print"  style="background-color:#fff;">
								<div class="row" style="margin-top: 18px;">
								   <div class="col-md-2 padding-p-l">
										<img src="../images/logo/your_school.png" height="100" width="100">
										<h4 style="font-weight: bolder;">Online Examination System
										<p>Hall Ticket for Mid Term Examination</p>
										</h4>
									</div>
								</div>
								<div class="row">
									<div class="middle">
										<div class="info">
											<p><b>Enrollment No: </b><?php echo $query_student_name['student_id'];?></p>
											<p><b>Student Name: </b> <?php echo $query_student_name['student_name'];?></p>
											<p><b>Exam Centre: </b> Online Examination System</p>
											<!--<img src="../images/logo/your_school.png" height="100" width="100" style="float:right;">-->
										</div>
									</div>
								</div>
								<div class="row">
									<div class="middle">
										<div class="info">
											<table class="table table-bordered" cellspacing="0" style="margin-bottom:0px;">
												<thead>
													<tr>
														<th width="15%" style="color: #000 !important;">Subject Name</th>
														<th width="15%" style="color: #000 !important;">Exam Date</th>
														<th width="15%" style="color: #000 !important;">Batch</th>
														<th width="15%" style="color: #000 !important;">Exam Time</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td width="15%" style="color: #000 !important;"><?php echo $query_subject['subject_name'];?></td>
														<td width="15%" style="color: #000 !important;"><?php echo $row_check_center['exam_date'];?></td>
														<td width="15%" style="color: #000 !important;"><?php echo $query_student_name['batch_name'];?></td>
														<td width="15%" style="color: #000 !important;"><?php echo $query_student_name['batch_time'];?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="middle">
										<div class="info">
											<p><img src="../images/signature/signature.png" height="100" width="100"></p>
											<p><b>Principal Signature</b>
											<label style="float:right;color:#000;"><b>Student Signature</b></label></p>
										</div>	
										<div class="info">
											<p></p>
										
										</div>
										
									</div>
								</div>
								<div class="row">
									<div class="middle">
										<center><p style="color:red;">Note: Please bring your Identity Card.</p></center>
									</div>
								</div>
							</div>
							<div><center><button class="btn btn-sm btn-danger" href="#" id="pdf"></i><span>Get Hall Ticket</span></button></center>
						</div>
						
					</div>
				</div>
			</div>           
		</div>       
		 <?php include("copyright.php");?>     
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script>
$('#pdf').click(function() {
  var options = {};
  var pdf = new jsPDF('p', 'pt', 'a4');
  <!--pdf.setTextColor(255,0,0);-->
  pdf.addHTML($("#print"), 15, 15, options, function() {
    pdf.save('download.pdf');
  });
});


</script>
</body> 
</html>