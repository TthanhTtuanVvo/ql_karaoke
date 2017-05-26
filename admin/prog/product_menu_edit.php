<?php
	$act = $_POST['act'];
    $txt_ten = $_POST['txt_ten'];
    $txt_chu_thich = $_POST['txt_chu_thich'];
    $txt_noi_dung = $_POST['txt_noi_dung'];
    $txt_hinh = $_POST['txt_hinh'];
    $txt_hien_thi = isset($_POST['txt_hien_thi']) ? 1 : 0;
    $txt_noi_bat = isset($_POST['txt_noi_bat']) ? 1 : 0;
    $txt_title = $_POST['txt_title'];
    $txt_keyword = $_POST['txt_keyword'];
    $txt_description = $_POST['txt_description'];
    if ($_POST["func"]=="update") 
    {
        $id = $_POST["id"];
    }
    else 
    {
        $id = $_GET['id'];
    } 
    include "templates/product_menu.php";
	if (empty($func)) $func = $_POST['func'];
	$id = $id+0;
	//	Kiểm tra sự tồn tại của ID
	$r	= $db->select("tgp_product_menu","id = '".$id."'");
	if ($db->num_rows($r) == 0)
		admin_load("Không tồn tại Mục này.","?act=product_manager");
?>
<center>
<?php
	$OK = false;
	$max_file_size	=	2048000;
	$up_dir			=	"../uploads/product_menu/";




	if ($func == "update")
	{
		$txt_cat = $_POST['txt_cat'];
		
		if (empty($txt_ten))
		{
			$error = "Bạn chưa nhập tên mục.";
		}
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
			{
				if ($file_type != "unk")
				{
					if ( @move_uploaded_file($_FILES['txt_hinh']['tmp_name'],$up_dir.$file_full_name) )
					{
						$OK = true;
						$hinh = true;
					}
					else
					{
						$error = "Unable to upload images.";
					}
				}
				else
				{
					$error = "Wrong file format - Can not upload images.";
				}
			}
			else
			{
				if ($file_size == 0)
				{
					$OK		= true;
					$hinh	= false;
				}
				else
				{
					$error = "Your image exceeds the size allowed.";
				}
			}

			if ($OK)
			{
				$db->query("update tgp_product_menu set ten = '".$db->escape($txt_ten)."',chu_thich = '".($txt_chu_thich)."',noi_dung = '".($txt_noi_dung)."', cat = '".$db->escape($txt_cat)."', hien_thi = '".($txt_hien_thi)."', noi_bat = '".($txt_noi_bat)."', seo_title = '".($txt_title)."', seo_description = '".($txt_description)."', seo_keyword = '".($txt_keyword)."' where id = '".$id."'");

				if ($hinh)
				{
					$txt_hinh_1	= "sp_".time().".".$file_type;
					img_resize($up_dir.$file_full_name,$up_dir.$txt_hinh_1,"w=800&h=800&zc=1");
					$db->update("tgp_product_menu","hinh",$file_full_name,"id = '".$id."'");  
				}
				
				admin_load("Đã cập nhật thành công.","?act=product_manager");
			}
		}
	}
	else
	{
		$r	= $db->select("tgp_product_menu","id = '".$id."'");
		while ($row = $db->fetch($r))
		{
			$txt_ten		=	$row["ten"];
			$txt_chu_thich		=	$row["chu_thich"];
			$txt_noi_dung		=	$row["noi_dung"];
			$txt_hinh		=	$row["hinh"];
			$txt_cat		=	$row["cat"];
			$txt_hien_thi	=	$row["hien_thi"];
			$txt_noi_bat	=	$row["noi_bat"];
            $txt_title    = $row["seo_title"];
            $txt_keyword    = $row["seo_keyword"];
            $txt_description    = $row["seo_description"];
		}
	}
	
	if (!$OK)
		template_edit("?act=product_menu_edit","update",$id,$txt_cat,$txt_ten,$txt_chu_thich,$txt_hinh,$txt_noi_dung,$txt_hien_thi,$txt_noi_bat,$txt_title,$txt_keyword,$txt_description,$error);
?>
</center>