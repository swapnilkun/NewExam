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


		if(basename(url())=="exam.php"){ ?>
			<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="exam.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_EXAM');?>">
					<i class="icon-book icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_EXAM');?> </span>
				</a>
			</li>

			<?php if(basename(url())=="question_add_sort.php"){ ?>
			<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="question_add_sort.php" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_QUESTION');?>">
					<i class="icon-question-sign icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_QUESTION');?> </span>
				</a>
			</li>


		<?php if(basename(url())=="notice.php"){ ?>
		<li class="dark-nav active"><?php }else { ?><li><?php } ?>	
		<span class="glow"></span>
				<a href="notice.php" rel="tooltip" data-placement="right" 
					data-original-title="<?php echo constant('TI_DESBOARD_ICON_NOTICE_STUDENT');?>">
					<i class="icon-list-ol icon-1x"></i>					
					<span><?php echo constant('TI_DESBOARD_ICON_NOTICE_STUDENT');?></span>
				</a>
		</li> 


		<?php if(basename(url())=="notice_admin.php"){ ?>
		<li class="dark-nav active"><?php }else { ?><li><?php } ?>	
		<span class="glow"></span>
				<a href="notice_admin.php" rel="tooltip" data-placement="right" 
					data-original-title="<?php echo constant('TI_LEFT_MENU_NOTICE_ADMIN');?>">
					<i class="icon-inbox icon-1x"></i>					
					<span><?php echo constant('TI_LEFT_MENU_NOTICE_ADMIN');?></span>
				</a>
		</li>

		<?php if(basename(url())=="contact.php"){ ?>
		<li class="dark-nav active"><?php }else { ?><li><?php } ?>	
		<span class="glow"></span>
				<a href="contact.php" rel="tooltip" data-placement="right" 
					data-original-title="<?php echo constant('TI_LEFT_MENU_CONTACT');?>">
					<i class="icon-envelope"></i>					
					<span><?php echo constant('TI_LEFT_MENU_CONTACT');?></span>
				</a>
		</li>   

<?php 

if(basename(url())=="import_table.php"){ ?>
<li class="dark-nav active"><?php }else { ?><li><?php } ?>	
<span class="glow"></span>
		<a href="import_table.php" rel="tooltip" data-placement="right" 
			data-original-title="<?php echo "Import";?>">
			<i class="icon-upload icon-1x"></i>					
			<span><?php echo "Import";?> </span>
		</a>
</li>

		



      
		
       
       
  
        
        
		
		
	</ul>
	
</div>