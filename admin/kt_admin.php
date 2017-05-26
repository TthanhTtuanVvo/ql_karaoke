<?php
$da_dang_nhap		=	false;
$thanh_vien["id"]	=	0;

if (empty($login_admin_user))
{
	$da_dang_nhap	=	false;
	$error_text		=	"Vui lòng đăng nhập vào hệ thống!";
}
elseif ( !kt_admin($login_admin_user,$login_admin_pass) )
{
	$da_dang_nhap	=	false;
	$error_text		=	"<b>Tên đăng nhập</b> or <b>Mật khẩu</b> không đúng!";
}
else
{
	$da_dang_nhap	=	true;
	$r = $db->select("tgp_user","username = '".$db->escape($login_admin_user)."'");
	$row = $db->fetch($r);
    $thanh_vien	=	$row;
    $_SESSION["id"]	        =	$row['id'];
	$_SESSION["username"]	=	$row['username'];
    $_SESSION["level"]	    =	$row['level'];
    
    
         
}
	
function	kt_admin($user , $pass)
{
	global $db;
	
	$r	=	$db->select("tgp_user","username = '".$db->escape($user)."' and password = '".md5($pass)."' and trang_thai = 1 ");
    //$r2 = $db->fetch($r);
	if ($db->num_rows($r) == 0)
		return	false;
	else
		return	true;
        //$_SESSION["username"]	=	$r2['username'];
		//Ps:baodk24
}
?>