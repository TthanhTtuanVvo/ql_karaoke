<?php
session_start();
@error_reporting(1);
@set_time_limit(0);

$domain="http://".$_SERVER['HTTP_HOST'];


if(isset($_GET['act'])) {$act = htmlspecialchars($_GET['act']);}
if(isset($_GET['logout'])) {$logout = htmlspecialchars($_GET['logout']);}

include "kt_login.php";
include "../config.php";
$db = new lg_mysql($host,$dbuser,$dbpass,$csdl);
include "kt_admin.php";
include "function.php";

if ($da_dang_nhap)
{
	if(isAjaxRequest() & isset($_REQUEST['ajax'])){
		$com = $_POST['com'];
		$id = $_POST['id'];
		$type = $_POST['type'];
		$value = $_POST['value'];
		$db->query("Update $com set $type = $value where id = ".$id);
		die;
	}
	
if (empty($act)) $act = "home";
include "tpl/skin/header.php";
	include "tpl/skin/left-menu.php";
	echo "<div class=\"content-wrapper\">";
	// include "prog/search_box.php";
	if (is_file("prog/".$act.".php"))
		include "prog/".$act.".php";
	else
		echo "<b>This function is locked.</b>";
	echo "</div>";
	//include "tpl/skin/copyright.php";
include "tpl/skin/footer.php";
}
else	include "login.php";
?>

