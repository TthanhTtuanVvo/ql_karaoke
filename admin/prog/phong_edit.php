<?php
	$act = $_POST['act'];
	$txt_ten = $_POST['txt_ten'];
    $txt_chu_thich = $_POST['txt_chu_thich'];
    $txt_noi_dung = $_POST['txt_noi_dung'];
    
    $txt_hien_thi = isset($_POST['txt_hien_thi']) ? 1 : 0;
    $txt_noi_bat = isset($_POST['txt_noi_bat']) ? 1 : 0;
    // $txt_chu_thich = $_POST['txt_chu_thich'];
    // $txt_noi_dung = $_POST['txt_noi_dung'];
    $txt_title = $_POST['txt_title'];
    $txt_keyword = $_POST['txt_keyword'];
    $txt_description = $_POST['txt_description'];
    $func = $_POST['func'];
 
    if ($_POST["func"]=="update") 
    {
	    $id = $_POST["id"];
	    // $txt_cat = $_POST['txt_cat'];
    }
    else 
    {
	    $id = $_GET["id"];
	    // $txt_cat = $_GET['txt_cat'];
    } 
    include "templates/phong.php";
?>
<center>
<?php
	//	Kiểm tra sự tồn tại của ID
	$id = $id + 0;
	$r	= $db->select("vatlieu","id = '".$id."'");
	if ($db->num_rows($r) == 0)
		admin_load("Không tồn tại mục này.","?act=product_manager");
	
	$max_file_size	=	2048000;
	$up_dir			=	"../uploads/product/";

	$OK = false;

	if ($func == "update")
	{
		if (empty($txt_ten))
			$error = "Vui lòng nhập tên.";
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
			if ($OK)
			{
				$db->query("update vatlieu set ten = '".$db->escape($txt_ten)."',chu_thich = '".$db->escape($txt_chu_thich)."', noi_dung = '".$txt_noi_dung."', hien_thi = '".($txt_hien_thi+0)."' , noi_bat = '".($txt_noi_bat+0)."' ,time = '".time()."', seo_title = '".($txt_title)."', seo_keyword = '".($txt_keyword)."', seo_description = '".($txt_description)."' where id = '".$id."'");
				if ($hinh)
				{
                    $txt_hinh_1	= "vl_".time().".".$file_type;                
                    img_resize($up_dir.$file_full_name,$up_dir.$txt_hinh_1,"w=1200&h=900&zc=1");
                    $db->update("vatlieu","hinh",$file_full_name,"id = '".$id."'");
				}
				admin_load("Đã cập nhật thành công.","?act=phong_list");
			}			
		}
	}
	else
	{
		$r	= $db->select("vatlieu","id = '".$id."'");
		while ($row = $db->fetch($r))
		{	
			// $txt_cat		            = $row["cat"];
			$txt_ten		        = $row["ten"];
			$txt_chu_thich		        = $row["chu_thich"];
			$txt_hinh		        = $row["hinh"];
            $txt_noi_dung		        = $row["noi_dung"];
            
			$txt_hien_thi	= $row["hien_thi"];
			$txt_noi_bat	= $row["noi_bat"];
            $txt_title    = $row["seo_title"];
            $txt_keyword    = $row["seo_keyword"];
            $txt_description    = $row["seo_description"];
		}
	}
	
	if (!$OK)
		template_edit("?act=phong_edit","update",$id,$txt_ten,$txt_chu_thich,$txt_noi_dung,$txt_hien_thi,$txt_noi_bat, $txt_title, $txt_keyword, $txt_description,$error)
?>
</center>