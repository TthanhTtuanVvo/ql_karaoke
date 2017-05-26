<?php
session_start();
@error_reporting(0);
@set_time_limit(0);

// $domain="http://".$_SERVER['HTTP_HOST']."/mobilecenter";

include "kt_login.php";
include "../config.php";
$db = new lg_mysql($host,$dbuser,$dbpass,$csdl);
include "kt_admin.php";
include "function.php";
if ($da_dang_nhap) {
	if(isset($_POST['id'])) {
		$table = $_POST['tbl'];
		$id = $_POST['id'];
		$value = $_POST['value'];
		$type = $_POST['type'];
		$value = ($value > 0 ) ? 0 : 1;
		$db->query("Update $table set $type = $value where id = ".$id);
		echo $value;
	}
}
?>