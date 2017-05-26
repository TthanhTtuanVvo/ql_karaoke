<?
	$act = $_POST['act'];
    $id = $_POST['id'];
    $txt_ten = $_POST['txt_ten'];
    $txt_chu_thich = $_POST['txt_chu_thich'];
    $txt_noi_dung = $_POST['txt_noi_dung'];
    $txt_hinh = $_POST['txt_hinh'];
    $txt_hien_thi = isset($_POST['txt_hien_thi']) ? 1 : 0;
    $txt_title = $_POST['txt_title'];
    $txt_keyword = $_POST['txt_keyword'];
    $txt_description = $_POST['txt_description'];
    
    include "templates/product_menu.php";

	if (empty($func)) $func = $_POST['func'];
	if ($func == "new")
    	$txt_cat = $_POST['txt_cat'];
    else
    	$txt_cat = $_GET['txt_cat'];

	$txt_cat = $db->escape($txt_cat);
?>
<center>
<?php

	$max_file_size	=	2048000;
	$up_dir			=	"../uploads/product_menu/";
	$OK = false;
	
	if ($func == "new")
	{
		$id = $_POST['id'];
		if (empty($txt_ten))
			$error = "Vui lòng nhập Tên.";
		else
		{	
			// kiểm tra file uploads.
			$file_type = $_FILES['txt_hinh']['type'];
			$file_name = $_FILES['txt_hinh']['name'];
			$file_size = $_FILES['txt_hinh']['size'];
			switch ($file_type)
			{
				case "image/pjpeg"	: $file_type = "jpg"; break;
				case "image/jpeg"	: $file_type = "jpg"; break;
				case "image/gif" 	: $file_type = "gif"; break;
				case "image/x-png" 	: $file_type = "png"; break;
				case "image/png" 	: $file_type = "png"; break;
				default : $file_type = "unk"; break;
			}
			$file_full_name = time().".".$file_type;
			if ( ($file_size > 0) && ($file_size <= $max_file_size) )
				if ($file_type != "unk")
						if ( @move_uploaded_file($_FILES['txt_hinh']['tmp_name'],$up_dir.$file_full_name) )
						{
							$OK = true;
							$hinh = true;
						}
						else
							$error = "Không thể upload hình ảnh.";
				else
				{
					$error = "Sai định dạng file - Không thể upload hình ảnh.";
				}
			else
			{
				if ($file_size == 0)
				{
					$OK		= true;
					$hinh	= false;
				}
				else
					$error = "Hình của bạn chọn vượt quá kích thước cho phép.";
			}
			// Process xong

			if($OK)
			{
				$id = $db->insert("tgp_product_menu","id,cat,ten,hinh,chu_thich,noi_dung,thu_tu,hien_thi, seo_title, seo_keyword, seo_description","0,'".$db->escape($txt_cat)."','".$db->escape($txt_ten)."','".$db->escape($txt_hinh)."','".($txt_chu_thich)."','".($txt_noi_dung)."','".(cat_count($txt_cat)+1)."','".($txt_hien_thi+0)."','".($txt_title)."','".($txt_keyword)."','".($txt_description)."'");

				if ($hinh)
				{
					$txt_hinh_1	= "sp_".time().".".$file_type;
                
                    img_resize($up_dir.$file_full_name,$up_dir.$txt_hinh_1,"w=800&h=800&zc=1");
                   	$db->update("tgp_product_menu","hinh",$file_full_name,"id = '".$id."'");
				}

				admin_load("Đã thêm Mục đó vào CSDL","?act=product_manager");
			}
		}
	}
	else
	{
		$txt_ten		=	"";
		$txt_chu_thich		=	"";
		$txt_noi_dung		=	"";
		$txt_hinh		=	"";
		$txt_hien_thi	=	1;
        $txt_title    = "";
        $txt_keyword    = "";
        $txt_description    = "";
        $txt_noi_bat    = "";
	}
	
	if (!$OK)
		template_edit("?act=product_menu_new&txt_cat=".$_GET['txt_cat']."","new",0,$txt_cat,$txt_ten,$txt_chu_thich,$txt_hinh,$txt_noi_dung,$txt_hien_thi,$txt_noi_bat,$txt_title,$txt_keyword,$txt_description,$error);
?>
</center>