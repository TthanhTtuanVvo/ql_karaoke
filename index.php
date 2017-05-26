<?
	@session_start();
	error_reporting(1);

	include("config.php");
	$db      =  new   lg_mysql($host,$dbuser,$dbpass,$csdl);
	include("func.php");
	$THANHVIEN["id"] = 0;
	include("z_includes/dem_online.php");
	// if (empty($_GET['act'])) { $act = 'home';}
	if (isset($_GET['act'])) {$act = htmlspecialchars($_GET['act']);}
	else {$act = 'home';} # gan bien $module theo gia tri cua truy van "act"
	if (isset($_GET['id'])) $id = htmlspecialchars($_GET['id']);
	if (isset($_GET['page'])) $page = htmlspecialchars($_GET['page']);
	if (isset($_GET['id'])) {$pid_arr = explode("-",$_GET['id']);
	$pid = $pid_arr[0];}
	include "z_includes/header.php";

	include "z_modules/".$act.".php";

	include "z_includes/footer.php";

?>