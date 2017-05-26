<?php
    $id = $_GET['id'];
    $txt_cat = $_GET['txt_cat'];
    $txt_ten = $_GET['txt_ten'];
    $txt_hien_thi = isset($_POST['txt_hien_thi']) ? 1 : 0;
    $func = $_GET['func'];
    
	include "templates/gallery_menu.php";
	//	Kiểm tra sự tồn tại của ID
	$r	= $db->select("tgp_gallery_menu","id = '".$id."'");
	if ($db->num_rows($r) == 0)
		admin_load("Không tồn tại Mục này.","?act=gallery_manager");
?>
<center>
<?php
	$OK = false;
	
	if ($func == "update")
	{
		if (empty($txt_ten))
			$error = "Please enter the directory name.";
		else
		{
			$db->query("update tgp_gallery_menu set ten = '".$db->escape($txt_ten)."', cat = '".$db->escape($txt_cat)."', hien_thi = '".($txt_hien_thi+0)."' where id = '".$id."'");
			admin_load("Has been successfully updated.","?act=gallery_manager");
			$OK = true;
		}
	}
	else
	{
		$r	= $db->select("tgp_gallery_menu","id = '".$id."'");
		while ($row = $db->fetch($r))
		{
			$txt_ten		=	$row["ten"];
			$txt_cat		=	$row["cat"];
			$txt_hien_thi	=	$row["hien_thi"];
		}
	}
	
	if (!$OK)
		template_edit("?act=gallery_menu_edit","update",$id,$txt_cat,$txt_ten,$txt_hien_thi,$error);
?>
</center>