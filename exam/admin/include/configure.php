<?php
error_reporting (E_ALL ^ E_NOTICE);
$gc_timeout = 21600;
ini_set('session.gc_maxlifetime', $gc_timeout);
include("../mysql_connection.php");
$query_general_setting=mysqli_fetch_array(mysqli_query($con,"select * from general_setting where id=1 and g_id=1"));
date_default_timezone_set($query_general_setting["g_timezone"]);
date_default_timezone_get();
include("english.php");
include("function.php");

if(basename(url())!="index.php" or basename(url())!="index.php?log=1"){
$explode_permistion=explode(",",$_SESSION['area_permistion']);
}
?>