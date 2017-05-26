<?php
    $act = $_POST['act'];
    $txt_alias = $_POST['txt_alias'];
    $txt_ten = $_POST['txt_ten'];
    $txt_chu_thich  = $_POST['txt_chu_thich'];
    $txt_noi_dung = $_POST['txt_noi_dung'];
    $func = $_POST['func'];
    if ($_POST["func"]=="new") $id = $_POST["id"]; else $id = $_GET['id'];
    
    include "templates/page.php";
?>
<center>
<?php
	if ($func == "new")
	{
		if (empty($txt_ten))
			$error = "Vui lòng nhập tên trang.";
		else if (empty($txt_alias))
			$error = "Vui lòng nhập alias.";
		else
		{
			$id = $db->insert("tgp_page","id,alias,ten,chu_thich,noi_dung,time,user","0,'".$db->escape($txt_alias)."','".$db->escape($txt_ten)."','".$txt_chu_thich."','".$txt_noi_dung."','".time()."','".$thanh_vien["id"]."'");
			admin_load("Đã thêm Trang vào CSDL","?act=page_list");
		}
	}
	else
	{
		$id = $_POST['id'];
		$txt_alias		= $_POST['txt_alias'];
		$txt_ten		= $_POST['txt_ten'];
        $txt_chu_thich  = $_POST['txt_chu_thich'];
		$txt_noi_dung	= $_POST['txt_noi_dung'];
	}
	
	if (!$OK)
		template_edit("?act=page_new","new",$id,$txt_alias,$txt_ten,$txt_chu_thich,$txt_noi_dung,$error)
?>
</center>