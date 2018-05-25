<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');

if($_POST["main_exam_id"]!="")
{
$query_exam_term=mysqli_fetch_array(mysqli_query($con,"select * from exam where e_id='".$_POST["main_exam_id"]."'"));
}

?>
<script type="text/javascript">
function AjaxFunction()
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {
document.getElementById("msg").innerHTML=httpxml.responseText;
document.getElementById("msg").style.background='#FFFFFF';
      }
    }
	var url="ajax-server-clock-demock.php?main_exam_id=<?php echo $_POST[main_exam_id]?>";
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
httpxml.open("GET",url,true);
httpxml.send(null);
tt=timer_function();
  }

///////////////////////////
function timer_function(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('AjaxFunction();',refresh)
}

</script>





 <link href="css/question.css" media="screen" rel="stylesheet" type="text/css" />
<div class="main-content">
                    <div class="container-fluid" >
            <div class="row-fluid">
                <div class="area-top clearfix">
                    <div class="pull-left header">
                        <h3 class="title">
                        <i class="icon-bell-alt"></i><?php echo constant('TI_MANAGE_TERMS_CONDITION');?></h3>
                    </div>

                </div>
            </div>
        </div>


<div class="container-fluid padded">
	<div class="box">
		<div class="box-header">
			<ul class="nav nav-tabs nav-tabs-left">
				<li class="active"><a href="#list" data-toggle="tab"><i class="icon-align-justify"></i><?php echo constant('TI_TERMS_CONDITION');?> </a></li>
			</ul>        
		</div>
		<div class="box-content padded">
			<div class="tab-pane  active" id="list">
			<script>
			function isChecked()
			{
		
			if (document.getElementById("exam_chkbox").checked == true) {
				<?php
					$date = date("H:i:s");
					list($cur_hor, $cur_min, $cur_sec) = explode(':', $date);
					 $current_time=$cur_hor.':'.$cur_min;

					$_SESSION['Current_time_exam']=$current_time;
					
				?>
	
			window.location = 'mainpaper.php?exam_id=<?php echo encrypt_string($_POST["main_exam_id"])?>';
			}
			else {
			alert("Please accept the terms & conditions.");
			return false; 
			}
			}

			</script>		 
			  
			<table  border="0" width="100%">
			<tr>
			<td><?php echo $query_exam_term['terms_condition'];?></td>
			</tr>
			</table>			

		<hr/>
		

			<table border="0" width="100%">
				<tbody>
					<tr>
					   <td colspan="2">	
							<div class="area-top-ti clearfix">
								<div class="pull-left header">
									<h3 class="title"> <i class="icon-warning-sign"></i><?php echo constant('TI_LABEL_GLOSSARY');?> </h3>
								</div>
							</div>           
						</td>		   
					</tr>
					<tr>
					   <td>
							<a href="#" class="green"><div><?php echo constant('TI_LABEL_CIRCLE_ANSWERED');?></div></a>				
					   </td>
					   <td>
						   <a href="#" class="red"><div> <?php echo constant('TI_LABEL_CIRCLE_NOTANSWERED');?></div></a>						 
					   </td>
					</tr>	
					<tr>
					   <td colspan="2">
							&nbsp;		
					   </td>
					  
					</tr>	
					<tr>
					   <td>
							<a href="#" class="orange"><div> <?php echo constant('TI_LABEL_CIRCLE_MARKED');?></div></a>						  
					   </td>
					   <td>
						   <a href="#" class="blue"><div><?php echo constant('TI_LABEL_CIRCLE_NOTVISITED');?></div> </a>						 
					   </td>
					</tr>
				</tbody>
			</table>

<hr/>
			

			<table border="0" width="100%">
				<tr>
                  <td width="5%">
                     <form name="form1" method="post" action="">
                        <input type="checkbox" name="checkbox" id="exam_chkbox" >
                        <label for="checkbox"></label>
                     </form>
                  </td>
                  <td><?php echo constant('TI_TERM_CONDITION_CHECKBOK_MESSAGE');?></td>
               </tr>
               <tr>  
					<td>&nbsp;</td>
                  <td align="right">

					 <a style="cursor:pointer;" onclick="isChecked(); return false;">
                        <div class="btn btn-gray btn-small "><i class="icon-play-circle icon-1x"></i>&nbsp; <?php echo constant('TI_STAET_EXAM_BUTTON');?></div>
                     </a>
                     
                  </td>                 
               </tr>
			</table>	
			<br/>
			</div>
		</div>
	</div>
</div>
    <?php include("copyright.php");?>        
	</div>
	</div>



<div id="take_exam-modal-form" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div id="modal-tablesLabel_take_exam" style="color:#fff; font-size:16px;"></div>
	</div>
    <div class="modal-body" id="modal-body-take_exam"><?php echo constant('TI_LOADING_DATA');?></div>
    <div class="modal-footer">      
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CLOSE');?></button>
    </div>
</div>
<script>
function modal_view_take_exam(param1 ,param2 ,param3)
{
	document.getElementById('modal-body-take_exam').innerHTML = 
		'<iframe id="frame1" src="examinfo_duration.php?batch_time='+param2+'&endTimeduration='+param3+' " width="100%" height="100" frameborder="0"></iframe>';
	document.getElementById('modal-tablesLabel_take_exam').innerHTML = param1.replace("_"," ");
}
</script>
</body> 
</html>