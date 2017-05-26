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
if ($da_dang_nhap)
{	
	if(isset($_POST['id'])) {
		$table = $_POST['com'];
		$id = $_POST['id'];
		$value = $_POST['value'];
		$filed = $_POST['filed'];
		if ($db->update($table, $filed, $value, "id = ".$id))
			echo 1;
		else
			echo 0;
	}
}
?>