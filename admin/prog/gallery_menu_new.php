<?
	$act = $_GET['act'];
    $id = $_GET['id'];
    $txt_cat = $_GET['txt_cat'];
    $txt_ten = $_GET['txt_ten'];
    $txt_hien_thi = isset($_POST['txt_hien_thi']) ? 1 : 0;
    $func = $_GET['func'];
    include "templates/gallery_menu.php";

	$txt_cat = $db->escape($txt_cat);
	//	Kiểm tra sự tồn tại của ID
	$r	= $db->select("tgp_cat","id = '".$txt_cat."' and _gallery = 1");
	if ($db->num_rows($r) == 0)
		admin_load("Không tồn tại Nhóm này.","?act=gallery_manager");
?>
<center>
<?php
	$OK = false;
	
	if ($func == "new")
	{
		if (empty($txt_ten))
			$error = "Vui lòng nhập Tên mục.";
		else
		{
			$db->insert("tgp_gallery_menu","id,cat,ten,thu_tu,hien_thi","0,'".$db->escape($txt_cat)."','".$db->escape($txt_ten)."','".(cat_count($txt_cat)+1)."','".($txt_hien_thi+0)."'");
			admin_load("Đã thêm Mục đó vào CSDL","?act=gallery_manager");
			$OK = true;
		}
	}
	else
	{
		$txt_ten		=	"";
		$txt_hien_thi	=	1;
	}
	
	if (!$OK)
		template_edit("?act=gallery_menu_new","new",0,$txt_cat,$txt_ten,$txt_hien_thi,$error);
?>
</center>