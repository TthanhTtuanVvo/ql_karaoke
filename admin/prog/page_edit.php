<?php
    $act = $_POST['act'];
    $txt_alias = $_POST['txt_alias'];
    $txt_ten = $_POST['txt_ten'];
    $txt_chu_thich = $_POST['txt_chu_thich'];
    $txt_noi_dung = $_POST['txt_noi_dung'];
    $func = $_POST['func'];
    if ($_POST["func"]=="update") $id = $_POST["id"]; else $id = $_GET['id'];
    
    include "templates/page.php";
?>
<center>
<?php
	//	Kiểm tra sự tồn tại của ID
    $id = $id+0;
	$r	= $db->select("tgp_page","id = '".$id."'");
	if ($db->num_rows($r) == 0)
		admin_load("Không tồn tại trang này.","?act=page_list");

	if ($func == "update")
	{
		if (empty($txt_ten))
			$error = "Vui lòng nhập tên trang.";
		else if (empty($txt_alias))
			$error = "Vui lòng nhập alias.";
		else
		{
			$db->query("update tgp_page set alias = '".$db->escape($txt_alias)."', ten = '".$db->escape($txt_ten)."', chu_thich = '".$db->escape($txt_chu_thich)."', noi_dung = '".$txt_noi_dung."', time = '".time()."' where id = '".$id."'");
			admin_load("Đã cập nhật thành công.","?act=page_list");	
		}
	}
	else
	{
		$r	= $db->select("tgp_page","id = '".$id."'");
		while ($row = $db->fetch($r))
		{
			$txt_alias		= $row["alias"];
			$txt_ten		= $row["ten"];
            $txt_chu_thich  = $row['chu_thich'];
			$txt_noi_dung	= $row["noi_dung"];
		}
	}
	
	if (!$OK)
		template_edit("?act=page_edit","update",$_GET['id'],$txt_alias,$txt_ten,$txt_chu_thich,$txt_noi_dung,$error);
?>
</center>