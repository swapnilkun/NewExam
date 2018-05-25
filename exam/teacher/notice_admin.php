<?php
include('include/configure.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');

?>

<script language="javascript" type="text/javascript">

function getXMLHTTP() { 
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getnotice(notice_id) {		
		
		var strURL="read_notice.php?notice_id="+notice_id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('subcategorydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	
</script> 

<body>
        <div class="main-content">
                    <div class="container-fluid" >
            <div class="row-fluid">
                <div class="area-top clearfix">
                    <div class="pull-left header">
                        <h3 class="title">
                        <i class="icon-info-sign"></i>
                       <?php echo constant('TI_LABEL_NOTICE_ADMIN');?></h3>
                    </div>

                </div>
            </div>
        </div>
        
                    <div class="container-fluid padded">
                <div class="box">
                       
					  

	<div class="box-header">
    
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo constant('TI_LABEL_NOTICE_LIST');?></a></li>
		</ul>
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
						
            <div class="tab-pane  active" id="list">
				<div class="accordion" id="accordion1">
                   <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
				   <thead>
				    <tr>
					<th><div><?php echo constant('TI_TABLE_HASH_NOTICE') ?></div></th>
					</tr>
					</thead>
					<tbody>
						  <?php 
								$query=mysqli_query($con,"select * from noticecenter where center_id='".$_SESSION['center_id']."' ORDER BY noticecenter.notice_date DESC ");
								$i=1;

								while($row=mysqli_fetch_array($query))
								{ 
									
									$query_notice=mysqli_fetch_array(mysqli_query($con,"select * from notice where n_id='".$row['notice_id']."' "));
							?>          
                               <tr>
								<td>
								<?php
                                 if($query_notice['status']==1)
								{
								?>
							<div class="accordion-group">
                                 <div class="accordion-heading" onclick="getnotice(<?php echo $row['notice_id']; ?>)">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php echo $i;?>">
                                       <i class="icon-rss icon-1x"></i>&nbsp;&nbsp;

                                        <?php if($row['read_unread_notice']==1){?>
									   <b style="color:#7087A3;"><?php echo $query_notice['notice_subject'];?></b>
									   <?php } else{?>
									   <?php echo ucfirst($query_notice['notice_subject']);?>
									   <?php }?>
									   
									   <span style="float:right;"><?php echo $query_notice['notice_date'];?></span>
									</a>
                                </div>
                                <div id="collapse<?php echo $i;?>" class="accordion-body collapse ">
                                    <div class="accordion-inner">
                                        <table cellpadding="0" cellspacing="0" border="0"  class="table table-normal">
                                            <tbody>
                                                  <tr> 
													   <td>

														<div class="btn-group">

														<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('notice_admin_delete.php?n_id=<?php echo $row['notice_id'];?>')" class="btn btn-gray btn-normal"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON');?> </a>

														</div>
														</td>
														 </tr>
														 <tr class="gradeA">
														<td width="100"><?php echo $query_notice['noitce'];?>
														</td>
                                                 </tr>                                     
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
							<?php } ?>
                           </td>
						 </tr>
							<?php 
					$i++;} ?>
					</tbody>
					</table>
							
				</div>
			</div>
            
		</div>
	</div>
</div>
</div>       
  <?php include("copyright.php");?>  
		</div>
	</div>
<div id="modal-delete" class="modal hide fade" style="height:140px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i>&nbsp; <?php echo constant('TI_DELETE_CONFIRMATION');?></h6>
	</div>
   <div class="modal-delete-body" id="modal-body-delete"><?php echo constant('TI_POPUP_DELETE_NOTICE');?></div>
    <div class="modal-footer">
    	<a href="" id="delete_link" class="btn btn-red" ><?php echo constant('TI_CONFIRME_BUTTON');?></a>
        <button class="btn btn-default" data-dismiss="modal"><?php echo constant('TI_CANCEL_BUTTON');?></button>
    </div>
</div>
<script>
function modal_delete(param1)
{
	document.getElementById('delete_link').href = param1;
}
</script>


</body>

