<?php
if($message_success!="")
{?>

<script>
$(document).ready(function() {
function ask()
{
Growl.info({title:"<?php echo $message_success;?>",text:" "});
}
setTimeout(ask, 500);
});
</script>
<?php }
if($error!="")
{?>

<script>
$(document).ready(function() {
function ask()
{
Growl.info({title:"<?php echo $error;?>",text:" "});
}
setTimeout(ask, 500);
});
</script>
<?php }?>