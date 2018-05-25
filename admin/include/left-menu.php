<?php include('login_check.php');?>
<div class="sidebar-background">
	<div class="primary-sidebar-background">
	</div>
</div>
<div class="primary-sidebar">

<?php

if($query_general_setting['g_logo']!="")
{
?>	

    <br />
    <div style="text-align:center;">
    	<a href=""><img src="../images/logo/<?php echo $query_general_setting['g_logo'];?>"  style="max-height:100px; max-width:100px;"/> </a>
    </div>
   	<br />
<?php }else{?>

<br />
    <div style="text-align:center;">
    	<a href=""><img src="../images/logo/defaultlogo/your-logo.png"  style="max-height:100px; max-width:100px;"/> </a>
    </div>
   	<br />
<?php 
	}
	?>
	<ul class="nav nav-collapse collapse nav-collapse-primary">        


		<?php if(basename(url())=="home.php"){ ?>
		<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="home.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_DASHBOARD');?>">
					<i class="icon-desktop icon-1x"></i>                  
					<span><?php echo constant('TI_LEFT_MENU_DASHBOARD');?> </span>
				</a>
		</li>
<?php
/*if (in_array("2", $explode_permistion) or in_array("0", $explode_permistion))
{

		 if(basename(url())=="category.php"){ ?>
		<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="category.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_COURSE');?>">
					<i class="icon-folder-close icon-1x"></i>                   
					<span><?php echo constant('TI_LEFT_MENU_COURSE');?> </span>
				</a>
		</li>
<?php }
*/

/*if (in_array("3", $explode_permistion) or in_array("0", $explode_permistion))
{

		 if(basename(url())=="sub_category.php"){ ?>
		<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_MANAGE_STUDENT');?>">
					<i class="icon-tags icon-1x"></i>                    
					<span><?php echo constant('TI_LEFT_MENU_MANAGE_STUDENT');?> </span>
				</a>
		</li>
*/

if (in_array("3", $explode_permistion) or in_array("0", $explode_permistion))
{
			if(basename(url())=="student.php"){ ?>
			<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
				<span class="glow"></span>
				<a class="accordion-toggle  " data-toggle="collapse" href="#students_submenu_first" rel="tooltip" data-placement="right" 
					data-original-title="<?php echo constant('TI_LEFT_MENU_MANAGE_STUDENT');?>">
						<i class="icon-tags icon-1x"></i>                 
					<span><?php echo constant('TI_LEFT_MENU_MANAGE_STUDENT');?> <i class="icon-caret-down"></i></span>
				</a>
            
				<ul id="students_submenu_first" class="collapse">
				<?php if (in_array("9", $explode_permistion) or in_array("0", $explode_permistion))
				{?>
				 <li class="">
					<a href="student.php">                  		
                    <i class="icon-male icon-1x"></i><span><?php echo constant('TI_LEFT_MENU_STUDENT');?> </span></a>
                </li>
				<?php } 
				
				if (in_array("10", $explode_permistion) or in_array("0", $explode_permistion))
				{?>
                <li class="">
					<a href="enquiry.php">                  		
                    <i class="icon-male icon-1x"></i><span><?php echo constant('TI_LEFT_MENU_ENQUIRY');?> </span></a>
                </li>
               	<?php } 
               	
               	if (in_array("10", $explode_permistion) or in_array("0", $explode_permistion))
				{?>
                <li class="">
					<a href="payment.php">                  		
                    <i class="icon-male icon-1x"></i><span><?php echo constant('TI_LEFT_MENU_PAYMENT');?> </span></a>
                </li>
               	<?php } ?>
            </ul>
		</li>

<?php }

if (in_array("3", $explode_permistion) or in_array("0", $explode_permistion))
{
			if(basename(url())=="exam.php"){ ?>
			<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
				<span class="glow"></span>
				<a class="accordion-toggle  " data-toggle="collapse" href="#exam_submenu_first" rel="tooltip" data-placement="right" 
					data-original-title="<?php echo constant('TI_LEFT_MENU_STUDENT_EXAM');?>">
						<i class="icon-tags icon-1x"></i>                 
					<span><?php echo constant('TI_LEFT_MENU_STUDENT_EXAM');?> <i class="icon-caret-down"></i></span>
				</a>
            
				<ul id="exam_submenu_first" class="collapse">
				<?php if (in_array("14", $explode_permistion) or in_array("0", $explode_permistion))
				{?>
				 <li class="">
			    <a href="batch.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_BATCH');?>">
					<i class="icon-screenshot icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_BATCH');?> </span>
				</a>
			    </li>
			    
				<?php } 
				
				if (in_array("7", $explode_permistion) or in_array("0", $explode_permistion))
				{?>
                <li class="">
			    	<span class="glow"></span>
			    	<a href="exam.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_EXAM');?>">
					<i class="icon-book icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_EXAM');?> </span>
				    </a>
                </li>
                
               	<?php } 
               if (in_array("11", $explode_permistion) or in_array("0", $explode_permistion))
				{?>
                <li class="">
			        <span class="glow"></span>
				    <a href="question.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_QUESTION');?>">
					<i class="icon-question-sign icon-1x"></i>
					<span><?php  echo "Question" ?> </span>	</a>
                </li>
               	<?php } 
               
				if (in_array("15", $explode_permistion) or in_array("0", $explode_permistion))
				{?>
                <li class="">
			    	<span class="glow"></span>
				    <a href="hall_ticket.php" rel="tooltip" data-placement="right" 
					data-original-title="<?php echo 'Hall Ticket';?>">
					<i class="icon-question-sign icon-1x"></i>					
					<span><?php echo 'Hall Ticket';?> </span>
				    </a>
                </li>
               	<?php } 
               	
               if (in_array("13", $explode_permistion) or in_array("0", $explode_permistion))
				{?>
                <li class="">
			         <span class="glow"></span>
				     <a href="selectresult.php" rel="tooltip" data-placement="right" 
					 data-original-title="<?php echo constant('TI_LEFT_MENU_VIEW_RESULT');?>">
					 <i class="icon-trophy icon-1x"></i>					
					 <span><?php echo constant('TI_LEFT_MENU_VIEW_RESULT');?> </span>
				</a>
                </li>
               	<?php } ?>


            </ul>
		</li>

<?php }

if (in_array("3", $explode_permistion) or in_array("0", $explode_permistion))
{
			if(basename(url())=="branch.php"){ ?>
			<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
				<span class="glow"></span>
				<a class="accordion-toggle  " data-toggle="collapse" href="#branch_submenu_first" rel="tooltip" data-placement="right" 
					data-original-title="<?php echo constant('TI_LEFT_MENU_MANAGE_BRANCH');?>">
						<i class="icon-tags icon-1x"></i>                 
					<span><?php echo constant('TI_LEFT_MENU_MANAGE_BRANCH');?> <i class="icon-caret-down"></i></span>
				</a>
            
				<ul id="branch_submenu_first" class="collapse">
				<?php if (in_array("4", $explode_permistion) or in_array("0", $explode_permistion))
				{?>
				 <li class="">
					<span class="glow"></span>
			     	<a href="branch.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_BRANCH');?>">
					<i class="icon-building icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_BRANCH');?> </span>
				</a>
                </li>
				<?php } 
				
				if (in_array("4", $explode_permistion) or in_array("0", $explode_permistion))
				{?>
                <li class="">
				    <span class="glow"></span>
				    <a href="center.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo "Teacher";?>">
					<i class="icon-building icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_BRANCH_MANAGER');?> </span>
				</a>
                </li>
                <?php }
                
                
                if (in_array("4", $explode_permistion) or in_array("0", $explode_permistion))
				{?>
				 <li class="">
					<span class="glow"></span>
			     	<a href="staff.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_STAFF');?>">
					<i class="icon-building icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_STAFF');?> </span>
				</a>
                </li>
				<?php } 
				if (in_array("4", $explode_permistion) or in_array("0", $explode_permistion))
				{?>
                <li class="">
				    <span class="glow"></span>
				    <a href="expenses.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_EXPENSES');?>">
					<i class="icon-building icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_EXPENSES');?> </span>
				</a>
                </li>

               	<?php } ?>
            </ul>
		</li>

<?php }

if (in_array("3", $explode_permistion) or in_array("0", $explode_permistion))
{

		 if(basename(url())=="subject.php"){ ?>
		<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="subject.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_COURSE');?>">
					<i class="icon-tag icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_COURSE');?> </span>
				</a>
		</li>
<?php }
/*if (in_array("4", $explode_permistion) or in_array("0", $explode_permistion))
{		
			if(basename(url())=="center.php"){ ?>
			<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="center.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo "Teacher";?>">
					<i class="icon-building icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_BRANCH_MANAGER');?> </span>
				</a>
			</li>
<?php }

if (in_array("4", $explode_permistion) or in_array("0", $explode_permistion))
{		
			if(basename(url())=="branch.php"){ ?>
			<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="branch.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo "Teacher";?>">
					<i class="icon-building icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_BRANCH');?> </span>
				</a>
			</li>
<?php }

if (in_array("14", $explode_permistion) or in_array("0", $explode_permistion))
{		
			if(basename(url())=="batch.php"){ ?>
			<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="batch.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_BATCH');?>">
					<i class="icon-screenshot icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_BATCH');?> </span>
				</a>
			</li>
<?php }

		

if (in_array("6", $explode_permistion) or in_array("0", $explode_permistion))
{

		if(basename(url())=="student.php"){ ?>
			<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="student.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_STUDENT');?>">
					<i class="icon-male icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_STUDENT');?> </span>
				</a>
			</li>

<?php
}*/
/*if (in_array("7", $explode_permistion) or in_array("0", $explode_permistion))
{

		if(basename(url())=="exam.php"){ ?>
			<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="exam.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_EXAM');?>">
					<i class="icon-book icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_EXAM');?> </span>
				</a>
			</li>
<?php
}
if (in_array("11", $explode_permistion) or in_array("0", $explode_permistion))
{
			 if(basename(url())=="question.php"){ ?>
			<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="question.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_QUESTION');?>">
					<i class="icon-question-sign icon-1x"></i>
					<span><?php //echo constant('TI_LEFT_MENU_QUESTION'); 
					 echo "Question"
					?> </span>
				</a>
			</li>
			
<?php
}*/
if (in_array("8", $explode_permistion) or in_array("0", $explode_permistion))
{
			
			if(basename(url())=="general_setting.php"){ ?>
			<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
				<span class="glow"></span>
				<a class="accordion-toggle  " data-toggle="collapse" href="#settings_submenu_first" rel="tooltip" data-placement="right" 
					data-original-title="<?php echo constant('TI_LEFT_MENU_SETTINGS');?>">
					<i class="icon-cogs icon-1x"></i>                
					<span><?php echo constant('TI_LEFT_MENU_SETTINGS');?> <i class="icon-caret-down"></i></span>
				</a>
            
				<ul id="settings_submenu_first" class="collapse">
				<?php if (in_array("9", $explode_permistion) or in_array("0", $explode_permistion))
				{?>
				 <li class="">
					<a href="general_setting.php">                  		
                  		<i class="icon-wrench"></i>&nbsp;<?php echo constant('TI_LEFT_MENU_GENERAL_SETTINGS');?></a>
                </li>
				<?php } 
				
				if (in_array("10", $explode_permistion) or in_array("0", $explode_permistion))
				{?>
                <li class="">
					<a href="user.php"><i class="icon-user"></i>&nbsp;<?php echo constant('TI_LEFT_MENU_USER');?></a>
                </li>
               	<?php } ?>
            </ul>
		</li>
<?php }

if (in_array("12", $explode_permistion) or in_array("0", $explode_permistion))
{
if(basename(url())=="notice.php"){ ?>
		<li class="dark-nav active"><?php }else { ?><li><?php } ?>	
		<span class="glow"></span>
				<a href="notice.php" rel="tooltip" data-placement="right" 
					data-original-title="<?php echo constant('TI_LEFT_MENU_INSTRUCTION');?>">
					<i class="icon-list-ol icon-1x"></i>					
					<span><?php echo constant('TI_LEFT_MENU_INSTRUCTION');?> </span>
				</a>
		</li>
<?php } 

/*if (in_array("13", $explode_permistion) or in_array("0", $explode_permistion))
{
if(basename(url())=="hall_ticket.php"){ ?>
		<li class="dark-nav active"><?php }else { ?><li><?php } ?>	
		<span class="glow"></span>
				<a href="hall_ticket.php" rel="tooltip" data-placement="right" 
					data-original-title="<?php echo 'Hall Ticket';?>">
					<i class="icon-question-sign icon-1x"></i>					
					<span><?php echo 'Hall Ticket';?> </span>
				</a>
		</li>
<?php }


 if (in_array("13", $explode_permistion) or in_array("0", $explode_permistion))
{
if(basename(url())=="question_set.php"){ ?>
		<li class="dark-nav active"><?php }else { ?><li><?php } ?>	
		<span class="glow"></span>
				<a href="question_set.php" rel="tooltip" data-placement="right" 
					data-original-title="<?php echo 'Question Set';?>">
					<i class="icon-question-sign icon-1x"></i>					
					<span><?php echo 'Question Set';?> </span>
				</a>
		</li>
<?php }
 

if (in_array("13", $explode_permistion) or in_array("0", $explode_permistion))
{
if(basename(url())=="selectresult.php"){ ?>
		<li class="dark-nav active"><?php }else { ?><li><?php } ?>	
		<span class="glow"></span>
				<a href="selectresult.php" rel="tooltip" data-placement="right" 
					data-original-title="<?php echo constant('TI_LEFT_MENU_VIEW_RESULT');?>">
					<i class="icon-trophy icon-1x"></i>					
					<span><?php echo constant('TI_LEFT_MENU_VIEW_RESULT');?> </span>
				</a>
		</li>
<?php }
      
*/		

if (in_array("15", $explode_permistion) or in_array("0", $explode_permistion))
{
if(basename(url())=="export_table.php"){ ?>
<li class="dark-nav active"><?php }else { ?><li><?php } ?>	
<span class="glow"></span>
		<a href="export_table.php" rel="tooltip" data-placement="right" 
			data-original-title="<?php echo constant('TI_DESBOARD_ICON_EXPORT');?>">
			<i class="icon-download icon-1x"></i>					
			<span><?php echo constant('TI_DESBOARD_ICON_EXPORT');?> </span>
		</a>
</li>
<?php }  


if (in_array("16", $explode_permistion) or in_array("0", $explode_permistion))
{
if(basename(url())=="import_table.php"){ ?>
<li class="dark-nav active"><?php }else { ?><li><?php } ?>	
<span class="glow"></span>
		<a href="import_table.php" rel="tooltip" data-placement="right" 
			data-original-title="<?php echo constant('TI_DESBOARD_ICON_IMPORT');?>">
			<i class="icon-upload icon-1x"></i>					
			<span><?php echo constant('TI_DESBOARD_ICON_IMPORT');?> </span>
		</a>
</li>
<?php } ?>   
		
		
	</ul>
	
</div>