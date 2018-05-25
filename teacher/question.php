<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
?>
<script type="text/javascript"
  src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
</script>
 <style type="text/css">
    .Table
    {
        display: table;
    }
    .Title
    {
        display: table-caption;
        text-align: center;
        font-weight: bold;
        font-size: larger;
    }
    .Heading
    {
        display: table-row;
        font-weight: 600;
        text-align: center;
    }
    .Row
    {
        display: table-row;
    }
    .Cell
    {
        display: table-cell;
        border:#EAEBEF solid;
        border-width: thin;
        padding-left: 5px;
        padding-right: 5px;
    }
</style>
<div class="main-content">
                    <div class="container-fluid" >
            <div class="row-fluid">
                <div class="area-top clearfix">
                    <div class="pull-left header">
                        <h3 class="title">
                        <i class="icon-edit"></i>
                       <?php echo constant('TI_MANAGE_QUESTION');?>
						</h3>
                    </div>

                </div>
            </div>
        </div>
        
     
        
		<div class="container-fluid padded">
			<div class="box">
			<?php include("message.php");?>
				<div class="box-header"> 

					<table  class="table table-condensed">
						<tr>
							<td>
								<a data-toggle="modal" href="question_add_sort.php?s_id=<?php echo $row['s_id'];?>"  class="btn btn-green btn-small"><i class="icon-plus-sign"></i> <?php echo "Add Questions";?> </a>

								
								
							</td>
							<td>
								<a data-toggle="modal" href="viewquestion.php?s_id=<?php echo $row['s_id'];?>"  class="btn btn-green btn-small"><i class="icon-zoom-in"></i> <?php echo "View Questions";?> </a>
							</td>
						</tr>
					</table>
				</div>
				
				</div>           
		</div>       
		 <?php include("copyright.php");?>     
	</div>
</div>

</html>