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
    	<a href="#"><img src="../images/logo/<?php echo $query_general_setting['g_logo'];?>"  style="max-height:100px; max-width:100px;"/> </a>
    </div>
   	<br />
<?php }else{?>

<br />
    <div style="text-align:center;">
    	<a href="#"><img src="../images/logo/defaultlogo/your-logo.png"  style="max-height:100px; max-width:100px;"/> </a>
    </div>
   	<br />
<?php 
	}
	?>
	<ul class="nav nav-collapse collapse nav-collapse-primary" >        


		<?php if(basename(url())=="home.php"){ ?>
		<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="#" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_DASHBOARD');?>">
					<i class="icon-desktop icon-1x"></i>                  
					<span><?php echo constant('TI_LEFT_MENU_DASHBOARD');?> </span>
				</a>
		</li>








		



<?php if(basename(url())=="selectexam.php"){ ?>
			<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="#" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_PRACTICE_TEST');?>">
					<i class="icon-question-sign icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_PRACTICE_TEST');?> </span>
				</a>
			</li>

      
		
       
       
  <?php if(basename(url())=="practice_history.php"){ ?>
			<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="#" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_PRACTICE_TEST_HISTOY');?>">
					<i class="icon-lightbulb icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_PRACTICE_TEST_HISTOY');?> </span>
				</a>
			</li>
        
    
   
	<?php if(basename(url())=="selectmainexam.php"){ ?>
			<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="#" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_MAIN_TEST');?>">
					<i class="icon-trophy icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_MAIN_TEST');?> </span>
				</a>
			</li>

		<?php if(basename(url())=="maintest_history.php"){ ?>
			<li class="dark-nav active"><?php }else { ?><li class="dark-nav"><?php } ?>
			<span class="glow"></span>
				<a href="#" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo constant('TI_LEFT_MENU_MAIN_TEST_HISTOY');?>">
					<i class="icon-book icon-1x"></i>
					<span><?php echo constant('TI_LEFT_MENU_MAIN_TEST_HISTOY');?> </span>
				</a>
			</li>


	 <?php if(basename(url())=="notice.php"){ ?>
		   <li class="dark-nav active"><?php }else { ?><li><?php } ?>	
			<span class="glow"></span>
				<a href="#" rel="tooltip" data-placement="right" 
					data-original-title="<?php echo constant('TI_LEFT_MENU_NOTICE');?>">
					<i class="icon-list-ol icon-1x"></i>					
					<span><?php echo constant('TI_LEFT_MENU_NOTICE');?> </span>
				</a>
			</li>

		 <?php if(basename(url())=="contact.php"){ ?>
		<li class="dark-nav active"><?php }else { ?><li><?php } ?>	
		<span class="glow"></span>
				<a href="#" rel="tooltip" data-placement="right" 
					data-original-title="<?php echo constant('TI_LEFT_MENU_CONTACT_US');?>">
					<i class="icon-envelope-alt icon-1x"></i>					
					<span><?php echo constant('TI_LEFT_MENU_CONTACT_US');?> </span>
				</a>
		</li>
		
	</ul>
	
</div>