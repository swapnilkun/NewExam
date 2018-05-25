  $(function () {
	 
	$(".loader-img").hide();
    $(".data-tbl").DataTable({
		"lengthMenu": [[100, 200,300,500, -1], [100, 200,300,500, "All"]]
	});  
     $(".select2").select2();	 
  });
  //Date picker
    $('#dob,#doj,#expirationdate,#registrationdate,#amountpaidon, #dateto,#datefrom').datepicker({
		format: 'dd-mm-yyyy',
		autoclose: true
    });
    //Initialize Select2 Elements
    $(".select-city").select2();
    $(".select-state").select2();
   $("#compose-textarea, #detail, #eligibility, #question").wysihtml5();   
	
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
	  //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });	
		/*	
	$(document).ajaxStart(function(){
        pageLoaderOverlay('show');
    });
   
   $(document).ajaxComplete(function(){
       pageLoaderOverlay('hide');
    });
	*/
/* display page loader overlay */
function pageLoaderOverlay(param){if(param=='show'){$.LoadingOverlay("show", {image:"",fontawesome : "fa fa-spinner fa-spin"});	}else if(param=='hide'){$.LoadingOverlay("hide");}}

  function readURL(input) {
	  if (input.files && input.files[0]) {
		  var reader = new FileReader();
		  reader.onload = function (e) {	
		  $('#img_preview').attr('src', e.target.result);	
		  }
		  reader.readAsDataURL(input.files[0]);
		  }
		 }
  
   function readImg(input) {
	   if (input.files && input.files[0]) {
	   var reader = new FileReader();reader.onload = function (e) { 
	   var elementId = $(input).attr('id');    $('#'+elementId+'_preview').attr('src', e.target.result);   } 
	   reader.readAsDataURL(input.files[0]);
	   }
	  }
function smallLoader(element,status){ var html = ''; if(status==1) html = '<img src="resources/dist/img/loader_small.gif" />'; $('#'+element).html(html);} 

$("#staff_photo, #queimg").change(function(){readURL(this);});
$("#staff_photo_id, #staff_photoid").change(function(){readImg(this);});

//bulk select
$('#selectall').click(function(event) {
  if(this.checked) {
      $(':checkbox').each(function() {
          this.checked = true;
      });
  }
  else {
    $(':checkbox').each(function() {
          this.checked = false;
      });
  }
});

$('.selectall_cert').click(function(event) {
	var selectId = $(this).attr('id');	
	if(this.checked) {
	 $('.'+selectId).each(function() {
		   this.checked = true;
        });
	}else{
		$('.'+selectId).each(function() {          
		   this.checked = false;
        });
	}
});

$( "#add-enquiry-form" ).click(function() {
  $( "#enquiry-form" ).toggle();
});

$( "#add-enquiry-form" ).click(function() {
  $( "#enquiry-form" ).toggle();
});
/* ------------------------- insitute staff -------------------------------------- */

/* admin --->manage institute */
function getCitiesByState(stateId){ $.post('include/classes/ajax.php',{action:'get_city_list', state_id:stateId}, function(data){ $("#city").html(data);}); }

function deleteInstitueFile(fileId, instId){ var conf = confirm('Delete this file?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_institute_file', file_id:fileId, inst_id:instId }, function(data){$("#file-area"+fileId).hide();});} };



function deleteCourseFile(fileId, courseId){ var conf = confirm('Delete this file?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_course_file', file_id:fileId, course_id:courseId }, function(data){$("#file-area"+fileId).hide();});} };

function deleteCourse(courseId){ var conf = confirm('Delete this course?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_course',course_id:courseId }, function(data){  $("#course-id"+courseId).hide();});} };

// admin-> manage exam
function deleteExam(examId){ var conf = confirm('Delete this exam?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_exam',exam_id:examId }, function(data){  $("#exam-id"+examId).hide();});} };

/* admin --->manage question bank */
function getExamByCourse(courseId){ $.post('include/classes/ajax.php',{action:'get_exam_list', course_id:courseId}, function(data){ $("#examid").html(data);}); }

// admin-> delete question bank
function deleteQueBank(queBankId){ var conf = confirm('Delete this question bank?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_quebank', quebank_id:queBankId }, function(data){$("#quebank-id"+queBankId).hide();});} };

// admin-> empty question bank
function emptyQueBank(queBankId){ var conf = confirm('Delete all the data of this question bank?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'empty_quebank', quebank_id:queBankId }, function(data){
	$("#total-"+queBankId).html('0'); });} };

// admin-> manage staff
function deleteAdminStaff(staffId, loginId){ var conf = confirm('Delete this staff?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_admin_staff', staff_id:staffId, login_id:loginId }, function(data){ console.log(data); $("#staff-id-"+staffId).hide();});} };

// admin-> manage gallery
function deleteGallery(galleryId){ var conf = confirm('Delete this gallery?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_gallery', gallery_id:galleryId}, function(data){ $("#row-"+galleryId).hide();});} };

function deleteGalleryFile(galleryFileId){ var conf = confirm('Delete this file?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_gallery_file', gallery_file_id:galleryFileId}, function(data){ $("#gallery-file-id-"+galleryFileId).hide();});} };


// admin--> website setting -->list institute
function changeInstVisibility(instId, flag){ var conf = confirm('Are you sure?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'change_inst_website_visiblity', inst_id:instId, flag:flag}, function(data){ 
if(flag==0)
			$("#status-"+instId).html('<a href="javascript:void(0)" style="color:#f00" onclick="changeInstVisibility('+instId+',1)"><i class="fa fa-close"></i>');
		else if(flag==1)
			$("#status-"+instId).html('<a href="javascript:void(0)" style="color:#3c763d" onclick="changeInstVisibility('+instId+',0)"><i class="fa fa-check"></i></i>');
		console.log(data);
 });} };

// admin-> manage institutes 
function deleteInstitute(instId){ var conf = confirm('Delete this institute?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_institute',inst_id:instId }, function(data){ console.log(data); $("#row-"+instId).hide();});} };

// set accpunt expiry date
function setAccExpDate(startDate){ $.post('include/classes/ajax.php',{action:'set_acc_expiry_date', start_date:startDate}, function(data){console.log(data); $("#expirationdate").val(data); });}

//change institue status active inactive
function changeInstStatus(instId, flag){ var conf = confirm('Are you sure?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'change_inst_status', inst_id:instId, flag:flag}, function(data){ 
if(flag==0)
			$("#status-"+instId).html('<a href="javascript:void(0)" style="color:#f00" onclick="changeInstStatus('+instId+',1)"><i class="fa fa-close"></i>');
		else if(flag==1)
			$("#status-"+instId).html('<a href="javascript:void(0)" style="color:#3c763d" onclick="changeInstStatus('+instId+',0)"><i class="fa fa-check"></i></i>');
		console.log(data);
 });} };
 

//change institue verfiy flag
function changeInstVerify(instId, flag){  var conf = confirm('Are you sure?');  if(conf==true){
smallLoader('verify-'+instId, 1); $.post('include/classes/ajax.php',{action:'change_inst_verify', inst_id:instId, flag:flag}, function(data){console.log(data); smallLoader('verify-'+instId, 0);
if(flag==0)
	$("#verify-"+instId).html('<a href="javascript:void(0)" style="color:#f00" onclick="changeInstVerify('+instId+',1)"><i class="fa fa-close"></i> NO');
else if(flag==1)
	$("#verify-"+instId).html('<a href="javascript:void(0)" style="color:#3c763d" onclick="changeInstVerify('+instId+',0)"><i class="fa fa-check"></i></i> YES');});}};

// admin-->employer

function deleteEmployer(empId){ var conf = confirm('Delete this Employer?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_employer',emp_id:empId }, function(data){ $("#row-"+empId).hide();});} };

function deleteEmployerFile(fileId, empId){ var conf = confirm('Delete this file?'); if(conf==true){ 
$.post('include/classes/ajax.php',{action:'delete_employer_file', file_id:fileId, emp_id:empId }, function(data){ console.log(data); $("#file-area"+fileId).hide();});} };

//change employer status active inactive
function changeEmpStatus(empId, flag){ var conf = confirm('Are you sure?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'change_emp_status', emp_id:empId, flag:flag}, function(data){ 
if(flag==0)
			$("#status-"+empId).html('<a href="javascript:void(0)" style="color:#f00" onclick="changeEmpStatus('+empId+',1)"><i class="fa fa-close"></i>');
		else if(flag==1)
			$("#status-"+empId).html('<a href="javascript:void(0)" style="color:#3c763d" onclick="changeEmpStatus('+empId+',0)"><i class="fa fa-check"></i></i>');
		console.log(data);
 });} };
//change employer verfiy flag
function changeEmpVerify(empId, flag){ var conf = confirm('Are you sure?'); if(conf==true){ smallLoader('verify-'+empId, 1); $.post('include/classes/ajax.php',{action:'change_emp_verify', emp_id:empId, flag:flag}, function(data){ smallLoader('verify-'+empId, 0); console.log(data);  
if(flag==0)
	$("#verify-"+empId).html('<a href="javascript:void(0)" style="color:#f00" onclick="changeEmpVerify('+empId+',1)"><i class="fa fa-close"></i>');
else if(flag==1)
	$("#verify-"+empId).html('<a href="javascript:void(0)" style="color:#3c763d" onclick="changeEmpVerify('+empId+',0)"><i class="fa fa-check"></i></i>');

 });} };
 
//change course status flag
function changeCoureStatus(courseId, flag){ var conf = confirm('Are you sure?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'change_course_status', course_id:courseId, flag:flag}, function(data){
if(flag==0)
	$("#status-"+courseId).html('<a href="javascript:void(0)" style="color:#f00" onclick="changeCoureStatus('+courseId+',1)"><i class="fa fa-close"></i> In-Active</a>');
else if(flag==1)
	$("#status-"+courseId).html('<a href="javascript:void(0)" style="color:#3c763d" onclick="changeCoureStatus('+courseId+',0)"><i class="fa fa-check"></i></i> Active</a>');
	});} };

function bulkEditCourse(){
	var checkValues = $('input[name=check_course]:checked').map(function(){	return $(this).val();}).get();
	 checkValues =  JSON.stringify(checkValues);	
	$.post('include/classes/ajax.php',{action:'bulk_edit_course', courseIdArr:checkValues}, function(data){ $("#ajax-data").html(data); });	
}
$( "#bulk_edit_course_form" ).submit(function( event ) {
    event.preventDefault(); /*$(".loader-img").show();*/
	$.ajax({url: 'include/classes/ajax.php',type: 'POST', data: $(this).serialize(),dataType: 'html'})
    .done(function(data){var data = JSON.parse(data);
		if(!data.success){
			$("#exam_fees_err").addClass('has-error'); $("#exam_fees_err .help-block").html(data.error);
		}else if(data.success==true){$(".loader-img").hide(); location.reload();}
    }).fail(function(){	alert('Ajax Submit Failed ...');  });
});

// bulk delete courses
function bulkDeleteCourse()
{
    var checkValuesArr = $('input[name=check_course]:checked').map(function(){ return $(this).val();}).get();
   checkValues =  JSON.stringify(checkValuesArr);   
  // console.log(checkValues);
 if(checkValuesArr.length > 0){  
 var conf = confirm("Are you sure?");
 if(conf)
 {
    $.post('include/classes/ajax.php',{ action:'bulk_delete_courses', course_id:checkValues }, function(data){ //console.log(data);
      for(var i=0; i<checkValuesArr.length; i++)
      {
        $("#course-id"+checkValuesArr[i]).hide();
        //console.log(checkValuesArr[i]);
      }
      alert("Courses deleted successfully.");
    }) ; 
  }
   }else{
    alert("Please select courses to delete.");
   }
}
//chage exam active status
function changeExamStatus(examId, flag){ 
	var conf = confirm('Are you sure?'); 
	if(conf==true){ 
	$.post('include/classes/ajax.php',{ action:'change_exam_status', exam_id:examId, flag:flag}, function(data){
		if(flag==0)
			$("#status-"+examId).html('<a href="javascript:void(0)" onclick="changeExamStatus('+examId+',1)" style="color:#f00"><i class="fa fa-times"></i>In-Active</a>');
		else if(flag==1)
			$("#status-"+examId).html('<a href="javascript:void(0)" onclick="changeExamStatus('+examId+',0)" style="color:#3c763d"><i class="fa fa-check"></i>Active</a>');
	});	
} 
}

//chage exam result display status
function changeExamDispResultFlag(examId, flag){ 
	var conf = confirm('Are you sure?'); 
	if(conf==true){ 
	$.post('include/classes/ajax.php',{ action:'change_exam_result_display', exam_id:examId, flag:flag}, function(data){
		if(flag==0)
			$("#disp-result-"+examId).html('<a href="javascript:void(0)" onclick="changeExamDispResultFlag('+examId+',1)"><i class="fa fa-close"></i>');
		else if(flag==1)
			$("#disp-result-"+examId).html('<a href="javascript:void(0)" onclick="changeExamDispResultFlag('+examId+',0)"><i class="fa fa-check"></i></i>');
		console.log(data);
	});	
} 
}
//chage exam result display status
function changeExamDemoFlag(examId, flag){ 
	var conf = confirm('Are you sure?'); 
	if(conf==true){ 
	$.post('include/classes/ajax.php',{ action:'change_exam_demo_status', exam_id:examId, flag:flag}, function(data){
		if(flag==0)
			$("#demo-"+examId).html('<a href="javascript:void(0)" onclick="changeExamDemoFlag('+examId+',1)"><i class="fa fa-close"></i>');
		else if(flag==1)
			$("#demo-"+examId).html('<a href="javascript:void(0)" onclick="changeExamDemoFlag('+examId+',0)"><i class="fa fa-check"></i></i>');
	});	
} 
}

// set course name by course id
function setCourseName(courseId){ $.post('include/classes/ajax.php',{action:'set_course_name_by_course_id', course_id:courseId}, function(data){console.log(data); $("#examname").val(data); });}

//set marks per questions
function setMarkPerQue(){
	var marksPerQue=0;
	var totalMarks = parseInt($("#totalmarks").val());
	var totalque = parseInt($("#totalque").val());
	if(totalMarks!='NaN' && totalque!='NaN')
	 marksPerQue = totalMarks / totalque;
console.log(marksPerQue) 
	if(isNaN(marksPerQue) || marksPerQue=='Infinity') marksPerQue=0;
	$("#markperque").val(marksPerQue);
}

// admin-> manage question bank--> question  
function deleteQuestion(queId){ var conf = confirm('Delete this institute?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_question',question_id:queId }, function(data){$("#row-"+queId).hide();});} };

//chage question bank active status
function changeQueBankStatus(queBank, flag){ 
	var conf = confirm('Are you sure?'); 
	if(conf==true){ 
	$.post('include/classes/ajax.php',{ action:'change_quebank_status', quebank_id:queBank, flag:flag}, function(data){
		if(flag==0)
			$("#status-"+queBank).html('<a href="javascript:void(0)" onclick="changeQueBankStatus('+queBank+',1)"><small class="label bg-red">In-Active</small></a>');
		else if(flag==1)
			$("#status-"+queBank).html('<a href="javascript:void(0)" onclick="changeQueBankStatus('+queBank+',0)"><small class="label bg-green">Active</small></a>');
		
	});	
} 
}

// view question bank
function changeQueBank(queBank){ if(queBank!='')  location.href = "page.php?page=view-quebank&id="+queBank;}
function changeCourseQueBank(course){ if(course!='')  location.href = "page.php?page=view-quebank&course="+course;}


 $(".send-email-inst").click(function(){ // Click to only happen on announce links
     $("#inst_email").val($(this).data('email'));
     $("#inst_id").val($(this).data('id'));
});
/* send emai to the institute */
$('#send_email_form').on('submit', function (e) {
	 $('.loader-mg-modal').show(); e.preventDefault();
  $.ajax({
	type: 'post',
	url: 'include/classes/ajax.php',
	data: $('#send_email_form').serialize(),
	success: function (data) {	 
	  var data = JSON.parse(data);  var success = data.success;	
	  if(!success)
	  {	   $('.loader-mg-modal').hide();	
		   var message = data.errors.message;
		   var email = data.errors.email;	
		   if(message!='undefined' && message!=''){
			   $("#msg-error").addClass('has-error');$("#msg-error .help-block").html(message);  }	  
	  }else{
		  $(".bs-example-modal-md").hide();	$('.loader-mg-modal').hide();location.reload(); }
	}});
});
//Institutes

//Courses-->delete institute DITRP course

function deleteInstCourse(instCourseId){ var conf = confirm('Delete this course?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_inst_course',inst_course_id:instCourseId }, function(data){$("#row-"+instCourseId).hide();});} };

function bulkDeleteInstCourse()
{
 var checkValuesArr = $('input[name=check_course]:checked').map(function(){ return $(this).val();}).get();
 checkValues =  JSON.stringify(checkValuesArr);   
 if(checkValuesArr.length > 0){  
 var conf = confirm("Are you sure?");
 if(conf)
 {
    $.post('include/classes/ajax.php',{ action:'bulk_delete_inst_courses', inst_course_id:checkValues}, function(data){ console.log(data);
      for(var i=0; i<checkValuesArr.length; i++)
      {
        $("#row-"+checkValuesArr[i]).hide();
        console.log(checkValuesArr[i]);
      }
      alert("Courses deleted successfully.");
    }) ; 
  }
   }else{
    alert("Please select courses to delete.");
   }
}

//change course status flag
function changeInstCourseStatus(instCourseId, flag){ var conf = confirm('Are you sure?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'change_inst_course_status', inst_course_id:instCourseId, flag:flag}, function(data){
	
if(flag==0)
	$("#status-"+instCourseId).html('<a href="javascript:void(0)" style="color:#f00" onclick="changeCoureStatus('+instCourseId+',1)"><i class="fa fa-close"></i>');
else if(flag==1)
	$("#status-"+instCourseId).html('<a href="javascript:void(0)" style="color:#3c763d" onclick="changeCoureStatus('+instCourseId+',0)"><i class="fa fa-check"></i></i>');
	});} };
	
	//change non DITRP course status flag
function changeNonAicpeCourseStatus(courseId, flag){ var conf = confirm('Are you sure?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'change_nonaicpe_course_status', course_id:courseId, flag:flag}, function(data){
	console.log(data);
if(flag==0)
	$("#status-"+courseId).html('<a href="javascript:void(0)" style="color:#f00" onclick="changeNonAicpeCourseStatus('+courseId+',1)"><i class="fa fa-close"></i>');
else if(flag==1)
	$("#status-"+courseId).html('<a href="javascript:void(0)" style="color:#3c763d" onclick="changeNonAicpeCourseStatus('+courseId+',0)"><i class="fa fa-check"></i></i>');
	});} };

// delete non ditrp course
function deleteNonAicpeCourse(courseId){ var conf = confirm('Delete this course?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_nonaicpe_course',course_id:courseId }, function(data){$("#course-id"+courseId).hide();});} };

/*function deleteInstCourse(instCourseId){ var conf = confirm('Delete this course?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_nonaicpe_course',inst_course_id:instCourseId }, function(data){$("#inst-course-id"+courseId).hide();});} };*/

//bulk delete non ditrp courses
function bulkDeleteNonAicpeCourse()
{
 var checkValuesArr = $('input[name=check_course]:checked').map(function(){ return $(this).val();}).get();
 checkValues =  JSON.stringify(checkValuesArr);   
 if(checkValuesArr.length > 0){  
 var conf = confirm("Are you sure?");
 if(conf)
 {
    $.post('include/classes/ajax.php',{ action:'bulk_delete_nonaicpe_courses', course_id:checkValues}, function(data){ console.log(data);
      for(var i=0; i<checkValuesArr.length; i++)
      {
        $("#course-id"+checkValuesArr[i]).hide();
        console.log(checkValuesArr[i]);
      }
      alert("Courses deleted successfully.");
    }) ; 
  }
   }else{
    alert("Please select courses to delete.");
   }
}

//change course status flag
function changeInstStaffStatus(staffId, flag){ var conf = confirm('Are you sure?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'change_inst_staff_status', staff_id:staffId, flag:flag}, function(data){
	console.log(data);
if(flag==0)
	$("#status-"+staffId).html('<a href="javascript:void(0)" style="color:#f00" onclick="changeInstStaffStatus('+staffId+',1)"><i class="fa fa-close"></i>');
else if(flag==1)
	$("#status-"+staffId).html('<a href="javascript:void(0)" style="color:#3c763d" onclick="changeInstStaffStatus('+staffId+',0)"><i class="fa fa-check"></i></i>');
	});} };

function deleteInstStaff(staffId){ var conf = confirm('Delete this staff member?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_inst_staff',inst_staff_id:staffId }, function(data){$("#row-"+staffId).hide();});} };

function changePass(loginId, email){ var conf = confirm('Do you really want to change the password?'); if(conf==true){ pageLoaderOverlay('show'); $.post('include/classes/ajax.php',{action:'change_pass',login_id:loginId, email:email }, function(data){ console.log(data); /*$("#row-"+staffId).hide();*/ pageLoaderOverlay('hide'); alert(data); });} };
//change gallery status flag
function changeGalleryStatus(galleryId, flag){ var conf = confirm('Are you sure?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'change_gallery_status', gallery_id:galleryId, flag:flag}, function(data){
	console.log(data);
if(flag==0)
	$("#status-"+galleryId).html('<a href="javascript:void(0)" style="color:#f00" onclick="changeGalleryStatus('+galleryId+',1)"><i class="fa fa-close"></i>');
else if(flag==1)
	$("#status-"+galleryId).html('<a href="javascript:void(0)" style="color:#3c763d" onclick="changeGalleryStatus('+galleryId+',0)"><i class="fa fa-check"></i></i>');
	});} };
// student--->add student
function generatePass()
{
	 $.post('include/classes/ajax.php',{action:'generate_pass'}, function(data){ console.log(data); $("#pword, #confpword").val(data); $("#show_pword").html(data); });
}
// get institute courses by course type
function getInstituteCourses(courseType){ $.post('include/classes/ajax.php',{action:'get_institute_courses', course_type:courseType}, function(data){ $("#course").html(data);}); }

// institute----> student --->enquiry
//delete student
function deleteStudentEnquiry(enqId){ var conf = confirm('Delete this enquiry?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_student_enquiry',enq_id:enqId }, function(data){ console.log(data); $("#row-"+enqId).hide();});} };

// institute----> student
function deleteStudFile(fileId){ var conf = confirm('Delete this file?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_stud_file',stud_file_id:fileId }, function(data){ console.log(data); $("#img-"+fileId).hide();});} };

// get student courses by student id
function getStudentCourses(studId){ $.post('include/classes/ajax.php',{action:'get_student_courses', stud_id:studId}, function(data){$("#course").html(data);}); }

// get student courses by student id
function getStudentAllCourses(studId){ $.post('include/classes/ajax.php', {action:'get_student_allcourses', stud_id:studId}, function(data){$("#course").html(data);}); }

//change course status flag
function changeStudentStatus(studId, flag){ var conf = confirm('Are you sure?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'change_student_status', stud_id:studId, flag:flag}, function(data){
if(flag==0)
	$("#status-"+studId).html('<a href="javascript:void(0)" style="color:#f00" onclick="changeStudentStatus('+studId+',1)"><i class="fa fa-close"></i>');
else if(flag==1)
	$("#status-"+studId).html('<a href="javascript:void(0)" style="color:#3c763d" onclick="changeStudentStatus('+studId+',0)"><i class="fa fa-check"></i></i>');
	});} };
	
//delete student
function deleteStudent(studId){ var conf = confirm('Delete this staff member?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_student',stud_id:studId }, function(data){ console.log(data); $("#row-"+studId).hide();});} };

function getStudCourseDetails(studId){
$.post('include/classes/ajax.php',{action:'get_stud_course_details', stud_id:studId}, function(data){$("#course-info").html(data);});}

 $(".show-stud-course-info").click(function(){ //$(".course-info-studname").html($(this).data('name'));
 var studid = $(this).data('id');
 var studname = $(this).data('name');
 var studemail = $(this).data('email');
 $(".course-info-studname").html(studname); 
  $("#add_stud_course_info_form #stud_id").val(studid);
 $(".add-stud-course-info").attr('data-id',studid);
 $(".add-stud-course-info").attr('data-name',studname);
 $(".add-stud-course-info").attr('data-email',studemail); 
 getStudCourseDetails(studid);
 });
 
 $(".add-stud-course-info").click(function(){ 
 $(".show-stud-course-details").modal('hide');
 });
/* add course to student */
$('#add_stud_course_info_form').on('submit', function (e) {
	$('.loader-mg-modal').show(); e.preventDefault();
	var error = false;
	if($("#course_type").val()=='')
	{
		error = true;
		$(".course-type-error").addClass('has-error');$(".course-type-error .help-block").html('Required fields!'); 
	}
	if($("#course").val()=='')
	{
		error = true;
		$(".course-error").addClass('has-error');$(".course-error .help-block").html('Required fields!'); 
	}
	
	if(error==false){
  $.ajax({
	type: 'post',
	url: 'include/classes/ajax.php',
	data: $('#add_stud_course_info_form').serialize(),
	success: function (data) {	 
	  var data = JSON.parse(data);  
	  var success = data.success;	
	  if(!success)
	  {	   $('.loader-mg-modal').hide();	
		   var course = data.errors.course;
		   var course_type = data.errors.course_type;	
		   if(course!='undefined' && course!=''){
			   $("#msg-error").addClass('has-error');$("#msg-error .help-block").html(course);  }
			 if(course_type!='undefined' && course_type!=''){
			   $("#msg-error").addClass('has-error');$("#msg-error .help-block").html(course_type);  }
	  }else{
		  $(".add-stud-course-details").modal('hide');	$('.loader-mg-modal').hide();location.reload(); }
	}});
	}
	$('.loader-mg-modal').hide();
});

//insititute -->student-->payments
//dipsplay course info by course id
function dispCoursePaymentInfo(courseId){ var studId = $("#student_id").val(); $.post('include/classes/ajax.php',{action:'get_course_details', course_id:courseId, stud_id:studId}, function(data){	
//console.log(data);
		var data 		= JSON.parse(data); 
		var courseId 	= data.courseId;
		var examFees 	= data.examFees;
		var courseName 	= data.courseName;
		var courseDuration = data.courseDuration;
		var html =''
		html +='<table class="table">';
		html +='<tr><th>Course Name</th>';
		html +='<td>'+courseName+'</td></tr>';
		html +='<tr><th>Course Duration</th>';
		html +='<td>'+courseDuration+'</td></tr>';
		html +='<tr><th>Exam Fees</th>';
		html +='<td>'+examFees+'</td></tr>';
		$("#totalexamfees").val(examFees);
		$("#course-info").html(html);
	});

 }

//dipsplay course info by course id

	//delete student payment
function deleteStudentPayment(payId){ var conf = confirm('Delete this payment detail?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_student_payment',payment_id:payId }, function(data){ console.log(data); $("#row-"+payId).hide();});} };
 
 // institute--->student--->exams-->change exam type
 function changeStudentExamType(courrseDetailId, flag){ var conf = confirm('Are you sure? \r\n Do you really want to change the student exam type?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'change_student_exam_type', course_detail_id:courrseDetailId, flag:flag}, function(data){
	 var examtype_class = '';
	 switch(flag){
		case('1'): examtype_class = 'btn-success'; break;
		case('2'): examtype_class = 'btn-danger'; break;
		case('3'): examtype_class = 'btn-warning'; break;
		default: examtype_class = 'btn-primary'; break;
	}
 var html = '<select class="btn btn-xs '+examtype_class+'" name="changeexamtype" onchange="changeStudentExamType('+courrseDetailId+', this.value)" id="changeexamtype'+courrseDetailId+'">';
 html += data;
 html += '</select>';
 $("#exam-type-"+courrseDetailId).html(html);
 if(flag=='')
 {
	 changeStudentExamStatus(courrseDetailId,'');
	  $("#changeexamstatus"+courrseDetailId).prop("disabled",true);	  
 }else{
	 $("#changeexamstatus"+courrseDetailId).prop("disabled",false);
	
 }
	});
	} };
 // institute--->student--->exams-->change exam status
 function changeStudentExamStatus(courrseDetailId, flag){ 	
	var conf = confirm('Are you sure? \r\n Do you really want to change student exam status?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'change_student_exam_status', course_detail_id:courrseDetailId, flag:flag}, function(data){
	 //console.log(data);
	  var examstatus_class = '';
	 switch(flag){
		case('1'): examstatus_class = 'btn-warning'; break;
		case('2'): examstatus_class = 'btn-success'; break;
		case('3'): examstatus_class = 'btn-info'; break;
		default: examstatus_class = 'btn-primary'; break;
	}
 var html = '<select class="btn btn-xs '+examstatus_class+'" name="changeexamstatus" onchange="changeStudentExamStatus('+courrseDetailId+', this.value)" id="changeexamstatus'+courrseDetailId+'">';
 html += data;
 html += '</select>';
 $("#exam-status-"+courrseDetailId).html(html);
 validateExamApply(courrseDetailId);
	});
	} };
function deleteStudentAdmission(studCourseDetailId){ var conf = confirm('Delete this admission?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_student_admission',stud_course_detail_id:studCourseDetailId }, function(data){ $("#row-"+studCourseDetailId).hide();});} };
	//delete student exam details
function deleteStudentExamDetail(courseDetailId){ var conf = confirm('Delete this exam detail?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_student_exam_detail',course_detail_id:courseDetailId }, function(data){ $("#row-"+courseDetailId).hide();});} };

function toggleEditBox(element)
{
	var elementid = element.substr(9);	
	$("#editbox_"+elementid).toggle();
}
function changeInstCourseFees(instCourseId){ var conf = confirm('Are you sure? Update the course fees?'); if(conf==true){
var inst_course_id = instCourseId.substr(12);
var course_fees = $("#coursefees_"+inst_course_id).val();
course_fees = parseFloat(course_fees).toFixed(2);
	$.post('include/classes/ajax.php',{action:'chage_inst_course_fees',inst_course_id:inst_course_id, course_fees:course_fees}, function(data){ console.log(data);
//var html = course_fees+"<a href='javascript:void(0)' onclick='toggleEditBox(this.id)' class='pull-right' id='editfees_"+inst_course_id+"'><i class='fa fa-pencil'></i></a>";
$("#editbox_"+inst_course_id).hide();
$("#dis_fee_"+inst_course_id).html(course_fees);
	//$("#inst_course_fees_td_"+inst_course_id).html(html);
	});
} };

function setInstCourseInfo(instId,instCourseId)
{	
	$.post('include/classes/ajax.php',{action:'get_inst_course_info',inst_id:instId, inst_course_id:instCourseId}, function(data){	
	var output = JSON.stringify(data);
		var data 		= JSON.parse(data); 		
		var courseFee 	= data.inst_course_fee;
		var courseName 	= data.course_name;
		var courseType 	= data.course_type;
		var amtpaid 	= $("#amtpaid").val();
		if(amtpaid=='') amtpaid=0;	
		amtpaid = parseFloat(amtpaid);
		if(amtpaid > parseFloat(courseFee)){
			$(".amtpaid").addClass('has-error');
			$(".amtpaid .help-block").html('Amount to be paid must be less than total course fees.');
		}else{
			var balance 	= parseFloat(courseFee) - parseFloat(amtpaid);		
			//var courseDuration = data.courseDuration;
			var html ='<table class="table table-bordered"><tr><th>Selected Course Name</th><td>'+courseName+'</td></tr><tr><th>Total Course Fees</th><td>'+courseFee+'</td></tr><tr><th>Amount Paid</th><td>'+amtpaid+'</td></tr><tr class="danger"><th>Amount Balance</th><td>'+balance.toFixed(2)+'</td></tr></table>';		
			
			$("#disp_course_name").val(courseName);
			$("#disp_course_type").val(courseType);
			$("#disp_course_fees").val(parseFloat(courseFee));
			$("#disp_amtbalance").val(parseFloat(balance));
			$("#payment-details").html(html);
		}
	});
}
function calBalAmt(instId,paidamt)
{
	$(".amtpaid").removeClass('has-error'); $(".amtpaid .help-block").html('');
var course = document.getElementById("course");
if(course.selectedIndex == 0) {
	$("#amtpaid").val('');
     alert('Sorry! Please select the course first.');
	 $("#course").focus();
}else{	
	var instCourseId = $("#course").val();
	
 var RE = /^\d*\.?\d{0,2}$/;
    if(RE.test(paidamt)){
	setInstCourseInfo(instId,instCourseId);	
}else{
	$(".amtpaid").addClass('has-error');
	$(".amtpaid .help-block").html('Please enter valid amount!');
}
	
}
}

function addCourseRow()
{
	var lastRowIndex = parseInt($("#countcourses").val())+1;
	$.post('include/classes/ajax.php',{action:'add_new_course_row',lastrowindex:lastRowIndex}, function(data){ //console.log(data);
	$("#countcourses").val(parseInt(lastRowIndex));
	$("#courses-rows").append(data);
	});	
}
function deleteCourseRow(rowIndex)
{
	$("#courserow-"+rowIndex).remove();
	var lastRowIndex = $("#countcourses").val();
	$("#countcourses").val(lastRowIndex-1)
}
function getInstCourseFees(instCourseId,elementid)
{
	var eleid = elementid.substr(6);
//alert(eleid);
	$.post('include/classes/ajax.php',{action:'get_inst_course_fees',inst_course_id:instCourseId}, function(data){ //console.log(data);
	$("#coursefees"+eleid).val(data);
	calDiscountedAmt(eleid);
	});	
}
function calDiscountedAmt(elementId)
{
	var totalFees = 0;
	var discAmt 	= $("#discamt"+elementId).val();
	var discRate 	= $("#discrate"+elementId).val();
	var courseFee 	= $("#coursefees"+elementId).val();
	var amtrecieved	= $("#amtrecieved"+elementId).val(0);
	
	if(discAmt=='NaN' || discAmt==0 || discAmt=='')
		totalFees = parseFloat(courseFee).toFixed(2);
	else{
		discAmt = parseFloat(discAmt);
		switch(discRate)
		{
			case('amtminus'):
				totalFees = parseFloat(courseFee) - parseFloat(discAmt);
				break;
			case('amtplus'):
				totalFees = parseFloat(courseFee) + parseFloat(discAmt);
				break;	
			case('perminus'):
				totalFees = parseFloat(courseFee) - ((parseFloat(courseFee) *  parseFloat(discAmt)) / 100);
				break;
			case('perplus'):
				totalFees = parseFloat(courseFee) + ((parseFloat(courseFee) *  parseFloat(discAmt)) / 100);
				break;
		}
	}
	
totalFees = parseFloat(totalFees).toFixed(2);
	$("#totalcoursefee"+elementId).val(totalFees);
	if(amtrecieved!='' && !isNaN(amtrecieved))
		totalFees = parseFloat(totalFees) - parseFloat(amtrecieved);
	$("#amtbalance"+elementId).val(parseFloat(totalFees).toFixed(2));

	//console.log("Total Fees: "+totalFees);
}
function calDiscountedAmtUpd(elementId)
{
	var totalFees = 0;
	var totalPaid 	= $("#total_paid").val();
	if(totalPaid=='NaN' || totalPaid=='' || isNaN(totalPaid))
		totalPaid = 0;
	var discAmt 	= $("#discamt"+elementId).val();
	var discRate 	= $("#discrate"+elementId).val();
	var courseFee 	= $("#coursefees"+elementId).val();
	var amtrecieved	= $("#amtrecieved"+elementId).val();
	/*console.log("Element ID: "+elementId);	
	console.log("Course Fees: "+courseFee);			
	console.log("Discount Amt: "+discAmt);
	console.log("Discount Rate: "+discRate);	*/
	console.log("Total Paid:"+totalPaid);
	if(totalPaid!=0)
		amtrecieved = parseFloat(amtrecieved) + parseFloat(totalPaid);
	if(discAmt=='NaN' || discAmt==0 || discAmt=='')
		totalFees = parseFloat(courseFee).toFixed(2);
	else{
		discAmt = parseFloat(discAmt);
		switch(discRate)
		{
			case('amtminus'):
				totalFees = parseFloat(courseFee) - parseFloat(discAmt);
				break;
			case('amtplus'):
				totalFees = parseFloat(courseFee) + parseFloat(discAmt);
				break;	
			case('perminus'):
				totalFees = parseFloat(courseFee) - ((parseFloat(courseFee) *  parseFloat(discAmt)) / 100);
				break;
			case('perplus'):
				totalFees = parseFloat(courseFee) + ((parseFloat(courseFee) *  parseFloat(discAmt)) / 100);
				break;
		}
	}
	
totalFees = parseFloat(totalFees).toFixed(2);
	$("#totalcoursefee"+elementId).val(totalFees);
	if(amtrecieved!='' && !isNaN(amtrecieved))
		totalFees = parseFloat(totalFees) - parseFloat(amtrecieved);
	$("#amtbalance"+elementId).val(parseFloat(totalFees).toFixed(2));

	//console.log("Total Fees: "+totalFees);
}
function getInstCourseFeesUpd(instCourseId,elementid)
{
	var eleid = elementid.substr(6);
//alert(eleid);
	$.post('include/classes/ajax.php',{action:'get_inst_course_fees',inst_course_id:instCourseId}, function(data){ //console.log(data);
	$("#coursefees"+eleid).val(data);
	calDiscountedAmtUpd(eleid);
	});	
}
function calTotalPerCourseUpd(elementId)
{
	var totalFees = 0;
	var totalPaid 	= $("#total_paid").val();
	var total_paid1 	= $("#total_paid1").val();
	if(totalPaid=='NaN' || totalPaid=='' || isNaN(totalPaid))
		totalPaid = 0;
	//$("#amtrecieved_err"+elementId).html('');
	var totalcoursefee 	= $("#totalcoursefee"+elementId).val();
	var amtrecieved		= $("#amtrecieved"+elementId).val();
	var totalbal = 0;
	if(amtrecieved=='' || amtrecieved=='NaN' || amtrecieved=='undefined')
	{
		//amtrecieved = parseFloat(amtrecieved) + parseFloat(totalcoursefee);
		amtrecieved=0;
	}
	if(totalPaid!=0)
		amtrecieved = parseFloat(amtrecieved) + parseFloat(totalPaid);
	if(parseFloat(amtrecieved)<=parseFloat(totalcoursefee))
	{
		totalbal = parseFloat(totalcoursefee) - parseFloat(amtrecieved);
		
	}else{

		$("#amtrecieved"+elementId).val(totalcoursefee);
		//$("#amtrecieved_err"+elementId).html('');
	}
		
	$("#amtbalance"+elementId).val(parseFloat(totalbal).toFixed(2));
	console.log(totalbal);
	$("#total_paid1").val(amtrecieved);
}
function calTotalPerCourse(elementId)
{
	
	//$("#amtrecieved_err"+elementId).html('');
	var totalcoursefee 	= $("#totalcoursefee"+elementId).val();
	var amtrecieved		= $("#amtrecieved"+elementId).val();
	var totalbal = 0;
	if(amtrecieved=='' || amtrecieved=='NaN' || amtrecieved=='undefined')
		amtrecieved = parseFloat(totalcoursefee);
	if(parseFloat(amtrecieved)<=parseFloat(totalcoursefee))
	{
		totalbal = parseFloat(totalcoursefee) - parseFloat(amtrecieved);
		
	}else{

		$("#amtrecieved"+elementId).val(totalcoursefee);
		//$("#amtrecieved_err"+elementId).html('');
	}
		
	$("#amtbalance"+elementId).val(parseFloat(totalbal).toFixed(2));
	console.log(totalbal);
}

// Institute--->Student--->Add payment
//get student payment info by stud id or course id
function getStudPaymentInfo(){ var courseId = $("#course").val();  var studId = $("#student_id").val(); $.post('include/classes/ajax.php',{action:'get_stud_payment_info', course_id:courseId, stud_id:studId}, function(data){$("#payment_info").html(data);});}




function getBalAmtCourse(){
	var courseId = $("#course").val();  
	var studId = $("#student_id").val();
	var fees_balance='';
	var total_course_fees='';
		
		$.post('include/classes/ajax.php',{action:'get_stud_course_fee_bal', course_id:courseId, stud_id:studId}, function(data){
		console.log(data);
		//var output = JSON.stringify(data);
		var data 		= JSON.parse(data); 
		//console.log(data);
		 total_course_fees 	= data.total_course_fees;
		 fees_balance 	= data.fees_balance;
		console.log("total_course_fees: "+ total_course_fees);
		console.log("fees_balance: "+ fees_balance);
		$("#amountbalance").val(fees_balance);
		$("#totalbal").val(fees_balance);
		$("#coursefees").val(total_course_fees);
		
		});
}
function calBalAmt()
{
	var amountpaid = $("#amountpaid").val();
	var amountbalance = $("#amountbalance").val();
	var totalBal = 0;
	if(!isNaN(amountpaid) && amountbalance!='' && amountbalance!=0)
	{
		totalBal = parseFloat(amountbalance) - parseFloat(amountpaid); 
		console.log("Amt Bal: "+amountbalance);
		console.log("Amt Paid: "+amountpaid);
		console.log("Total Bal: "+totalBal);
	}
	if((amountpaid>totalBal) || (totalBal<=0) || isNaN(amountbalance)){
		getBalAmtCourse();
	}
	$("#amountbalance").val(parseFloat(totalBal).toFixed(2));
}
function addPayShowBal()
{
	var amountpaid = $("#amountpaid").val();
	var amountbalance = $("#totalbal").val();
	if(amountpaid=='' && isNaN(amountpaid))
	{
		amountpaid = 0;
		
	}
	else{
		if(parseFloat(amountpaid) > parseFloat(amountbalance))
		{
			$("#amountpaid").val(amountbalance);
			amountpaid = parseFloat(amountbalance);
		}	//;
		amountbalance = parseFloat(amountbalance) - parseFloat(amountpaid);
		
	}
	if(isNaN(amountbalance)) amountbalance = $("#totalbal").val();
	$("#amountbalance").val(amountbalance);
	
}
function calTotalBalAmt()
{
	var totalexamfees = $("#totalexamfees").val();
	var totalamtrecieved = $("#totalamtrecieved").val();
	var totalamtbalance = $("#totalamtbalance").val();
	var totalBal = 0;
	
	if(!isNaN(totalamtrecieved) && totalamtrecieved!='' && totalamtrecieved!=0)
	{
		totalBal = parseFloat(totalamtbalance) - parseFloat(totalamtrecieved); 
		
	}
	
	$("#totalamtbalance").val(parseFloat(totalBal).toFixed(2));
}
/*
function getInstCourseFees(instCourseId)
{
	$.post('include/classes/ajax.php',{action:'get_stud_course_fee_bal', course_id:courseId, stud_id:studId}, function(data){
		console.log(data);
		$("#amountbalance").val(data);});
}
*/
//print pay recipet
function printPayReciept(payId)
{
	var protocol = window.location.protocol ;
	var url = window.location.host;
	var path = window.location.pathname;
	 path = path.replace('page.php', "");
	 path = path+'/include/plugins/tcpdf/examples/print_reciept2.php?payid='+payId;
	 
//	alert(protocol+"//"+url+""+path);
	
window.open(
 path,'_new' 
);
}
function togglePaymentInfo(studDetailId)
{
	$("#paymentinfo_"+studDetailId).toggle();
}
function downloadFile(fileid)
{
	var href = $('#downloadLink'+fileid).val();
	window.location.href=href;
}

// student apply demo exam
 $(".send-email-inst").click(function(){ // Click to only happen on announce links
     $("#inst_email").val($(this).data('email'));
     $("#inst_id").val($(this).data('id'));
});

// student apply jobs email
 $(".apply-job-email").click(function(){ // Click to only happen on announce links
     $("#emp_email").val($(this).data('email'));
     $("#subject").val($(this).data('name'));
   
     $("#job_post_id").val($(this).data('id'));
});

function generateESC(elem)
{	
$.post('include/classes/ajax.php',{action:'generate_esc', elem:elem}, function(data){
		location.href='page.php?page=download-offline-papers';
		});
}
function calOfflineResult()
{
	var gotPercent		= 0;
	var grade			= '';
	var res_stat	= '';
	var totalcorrect 	= $('#totalcorrect').val();
	var totalincorrect 	= $('#totalincorrect').val();
	var totalque		= $('#exam_total_que').val();
	var total_marks		= $('#exam_total_marks').val();
	var perMarks		= $('#exam_marks_per_que').val();
	totalcorrect 		= parseInt(totalcorrect);
	totalque 			= parseInt(totalque);
	if(totalcorrect > totalque)
	{
		$('#totalcorrect').val(totalque);
		$('#totalincorrect').val('0');
		totalcorrect=totalque;
	}
	
	var gotMarks 		= parseFloat(totalcorrect) * parseFloat(perMarks);
	gotMarks 			= parseInt(Math.round(gotMarks));
	gotPercent 			= parseFloat((gotMarks*100)/parseInt(total_marks));
	
	
	//alert("totalcorrect:"+totalcorrect+"totalque:"+totalque);
	totalincorrect		= parseInt(totalque) - parseInt(totalcorrect);
	
	if(gotPercent>=85)
	{
		grade = "A+ : Excellent";
		res_stat = "Passed";
	}
	else if(gotPercent>=70 && gotPercent<85)
	{
		grade = "A : Very Good"; 
		res_stat = "Passed";
	}
	else if(gotPercent>=55 && gotPercent<70)
	{
		grade = "B : Good"; 
		res_stat = "Passed";
	}
	else if(gotPercent>=40 && gotPercent<55)
	{
		grade = "C : Average"; 
		res_stat = "Passed";
	}
	else
	{
		grade = ""; 
		res_stat = "Failed";
	}
	$('#result_status').val(res_stat);
	$('#grade').val(grade);
	$('#marks_per').val(gotPercent);
	$('#marksobt').val(gotMarks);
	$('#totalincorrect').val(totalincorrect);
}
function calPracticalResult()
{
	var gotPercent 	= $('#marks_per').val();
	gotPercent = parseFloat(gotPercent);
	if(gotPercent>100) {
		$('#marks_per').val(100);
		gotPercent=100;
	}
	if(gotPercent>=85)
	{
		grade = "A+ : Excellent";
		res_stat = "Passed";
	}
	else if(gotPercent>=70 && gotPercent<85)
	{
		grade = "A : Very Good"; 
		res_stat = "Passed";
	}
	else if(gotPercent>=55 && gotPercent<70)
	{
		grade = "B : Good"; 
		res_stat = "Passed";
	}
	else if(gotPercent>=40 && gotPercent<55)
	{
		grade = "C : Average"; 
		res_stat = "Passed";
	}
	else
	{
		grade = ""; 
		res_stat = "Failed";
	}
	$('#result_status').val(res_stat);
	$('#grade').val(grade);
}
//delete student results
function deleteStudentResult(resultId){ var conf = confirm('Delete this exam result detail?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_student_exam_result',exam_result_id:resultId }, function(data){ $("#row-"+resultId).hide();});} };


//change job post status flag
function changeJobPostStatus(jobpostId, flag){ var conf = confirm('Are you sure?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'change_jobpost_status', job_id:jobpostId, flag:flag}, function(data){
	console.log(data);
if(flag==0)
	$("#status-"+jobpostId).html('<a href="javascript:void(0)" style="color:#f00" onclick="changeJobPostStatus('+jobpostId+',1)"><i class="fa fa-close"></i>');
else if(flag==1)
	$("#status-"+jobpostId).html('<a href="javascript:void(0)" style="color:#3c763d" onclick="changeJobPostStatus('+jobpostId+',0)"><i class="fa fa-check"></i></i>');
	});} };
	
//delete job post
function deleteJobPost(jobpostId){ var conf = confirm('Delete this job post?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_jobpost',job_id:jobpostId }, function(data){ console.log(data); $("#row-"+jobpostId).hide();});} };

function getUserListByRole(userRole)
{
	$.ajax({
		type:'post',
		url:'include/classes/ajax.php',
		data:{action:'get_user_list_by_role', user_role:userRole},
		success:function(data)
		{
			$("#userlist").html(data);
			console.log(data);
		}
	});
}
// institute-->exams->list exams
/* check if the exam status is applied or not */

function validateExamApply(id)
{
	var examStatus = $("#changeexamtype"+id).val();
	console.log(examStatus);
	if(examStatus=='')
	{
		$("#changeexamstatus"+id).prop("readonly", "readonly");
		$("#changeexamstatus"+id).prop("disabled", true);
	}
}

//delete certificate request
function deleteCertificateRequest(reqId){ var conf = confirm('Delete this certificate request?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_certificate_request',cert_req_id:reqId }, function(data){ $("#irow-"+reqId).hide();});} };
//delete all certificate request 
function deleteCertificateRequestAll(reqId,subtable){ var conf = confirm('Delete this certificate request?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'delete_certificate_request_all',cert_req_id:reqId }, function(data){ $("#req-"+reqId).hide(); $("#row-"+subtable).hide(); });} };


//reset student exam
$(".resetexam").click(function(e){ var conf = confirm('Are you sure? Do you really want to RESET student exam?'); if(conf==true){ var id = $(this).attr('id'); var stud_course_id = id.substr(4); $.post('include/classes/ajax.php',{action:'reset_student_exam',stud_course_id:stud_course_id }, function(data){ alert(data); location.reload();  }); }  });

function forgotPassSMS(userId, userType){
	var conf = confirm('Do you want to send Username & Password?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'forget_pass_sms',userId:userId,userType:userType }, function(data){ alert("Sent successfully!")});} 
}
function uploadDocsSMS(userId, userType){
	var conf = confirm('Do you want to send Reminder SMS for uploading documents?'); if(conf==true){ $.post('include/classes/ajax.php',{action:'upload_doc_sms',userId:userId,userType:userType }, function(data){ alert("Sent successfully!")});} 
}

//send certificate dispatch SMS
 $(".send-cert-dispatch-sms").click(function(){ $("#total_cert").val($(this).data('total')); $("#cert_req_mast_id").val($(this).data('id')); $("#inst_name").val($(this).data('name'));  $("#inst_mobile").val($(this).data('mobile'));
});

$('#total_cert, #reciept_no, #dispatch_mode').on('keyup change click mouseenter mouseleave',function (){ var total = $("#total_cert").val(); var inst_mobile = $("#inst_mobile").val();	var reciept_no = $("#reciept_no").val();
var dispatch_mode = $("#dispatch_mode").val();	var date_dispatch = $(".date_dispatch").val();	var smsTxt = total+" DITRP Certificates are dispatched by "+dispatch_mode+" on "+date_dispatch+" with Rec. No. "+reciept_no+"\r\nDITRP\r\n9975554765";
$("#message").val(smsTxt);
});

/* submit certifcate dispatch SMS form */
$('#send_cert_dispatch_sms_form').on('submit', function (e) {
	 $('.loader-mg-modal').show(); e.preventDefault();
  $.ajax({
	type: 'post',
	url: 'include/classes/ajax.php',
	data: $('#send_cert_dispatch_sms_form').serialize(),
	success: function (data) {
	$('.loader-mg-modal').hide();		
	  var data = JSON.parse(data);  var success = data.success;		  
	  if(!success) { $('.loader-mg-modal').hide(); var message = data.errors.message; 
		   if(message!='undefined' && message!=''){ $("#msg-error").addClass('has-error');$("#msg-error .help-block").html(message);  }		   
	  }else{ alert(data.message); $(".cert_disptach_sms").modal('hide');location.reload(); }
	}});
});

$("#addMoreDynamicFields").on('click',function(){
	 var rowcount = parseInt($("#rowcount").val())+1;
	 var html = '<tr id="row'+rowcount+'"><td><input type="text" name="field_name[]"  class="form-control" id="field_name"  placeholder="Field name" /></td><td><input type="text" name="field_value[]"  class="form-control" id="field_value"  placeholder="Field value" /></td></tr>';
	 //alert(html);
	 $("#drow").append(html);
 });