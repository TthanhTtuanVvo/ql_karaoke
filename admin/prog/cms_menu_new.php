<font size="2" face="Tahoma"><b>Tin tức <img src="images/bl3.gif" border="0" /> Thêm mục mới</b></font>
<hr size="1" color="#cadadd" />
<?
	$act = $_GET['act'];
    $id = $_GET['id'];
    $txt_cat = $_GET['txt_cat'];
    $txt_ten = $_GET['txt_ten'];
    $txt_hien_thi = $_GET['txt_hien_thi'];
    $txt_noi_bat = $_GET['txt_noi_bat'];
    
    include "templates/cms_menu.php";
	if (empty($func)) $func = $_GET['func'];
	$txt_cat = $db->escape($txt_cat);
	//	Kiểm tra sự tồn tại của ID
	$r	= $db->select("tgp_cat","id = '".$txt_cat."' and _cms = 1");
	if ($db->num_rows($r) == 0)
		admin_load("Không tồn tại mục này.","?act=cms_manager");
?>
<center>
<?php
	$OK = false;
	
	if ($func == "new")
	{
		if (empty($txt_ten))
			$error = "Bạn chưa nhập tên mục.";
		else
		{
			$db->insert("tgp_cms_menu","id,cat,ten,thu_tu,hien_thi,type,noi_bat","0,'".$db->escape($txt_cat)."','".$db->escape($txt_ten)."','".(cat_count($txt_cat)+1)."','".($txt_hien_thi+0)."','".($txt_type+0)."','".($txt_noi_bat+0)."'");
			admin_load("Đã thêm vào CSDL","?act=cms_manager");
			$OK = true;
		}
	}
	else
	{
		$txt_ten		=	"";
		$txt_hien_thi	=	1;
	}
	
	if (!$OK)
		template_edit("?act=cms_menu_new","new",0,$txt_cat,$txt_ten,$txt_hien_thi,$txt_type,$txt_noi_bat,$error);
?>
</center>