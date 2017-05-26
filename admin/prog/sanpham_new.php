<?php
    $txt_ten = $_POST['txt_ten'];
    $txt_chu_thich = $_POST['txt_chu_thich'];
    $txt_noi_dung = $_POST['txt_noi_dung'];
    
    $txt_hien_thi = isset($_POST['txt_hien_thi']) ? 1 : 0;
    $txt_noi_bat = isset($_POST['txt_noi_bat']) ? 1 : 0;
    $txt_title = $_POST['txt_title'];
    $txt_keyword = $_POST['txt_keyword'];
    $txt_description = $_POST['txt_description'];

    $func = $_POST['func'];

    if ($_POST["func"]=="new") 
    {
	    $id = $_POST["id"];
	    $txt_cat = $_POST['txt_cat']; 
    }
    else 
    {
	    $id = $_GET['id'];
	    $txt_cat = $_GET['txt_cat']; 
    } 
    include "templates/sanpham.php";
    
?>
<font size="2" face="Tahoma"><b>
<a href="?act=product_manager">Quản lý danh mục</a> <img src="images/bl3.gif" border="0" /> 
Thêm mới
</b></font>

<hr size="1" color="#cadadd" />
<center>
<?php
	$max_file_size	=	2048000;
	$up_dir			=	"../uploads/product/";

	$OK = false;
	
	if ($func == "new")
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
			//=================
			
			// Process xong
			if ($OK)
			{
				$id = $db->insert("sanpham","cat,ten,chu_thich,noi_dung,hien_thi,noi_bat,time,user,seo_title, seo_keyword, seo_description","'".$txt_cat."','".$db->escape($txt_ten)."','".$txt_chu_thich."','".$txt_noi_dung."','".($txt_hien_thi+0)."','".($txt_noi_bat+0)."','".time()."','".$thanh_vien["id"]."','".$txt_title."','".$txt_keyword."','".$txt_description."'");
				
				
				if ($hinh)
				{
                    $txt_hinh_1	= "sp_".time().".".$file_type;
                
                    img_resize($up_dir.$file_full_name,$up_dir.$txt_hinh_1,"w=800&h=800&zc=1");
                   	$db->update("sanpham","hinh",$file_full_name,"id = '".$id."'");
				}
				
				admin_load("Đã thêm mới vào CSDL","?act=sanpham_list&id=".$txt_cat);
			}
		}
	}
	else
	{
		$txt_ten		= "";
		$txt_chu_thich		= "";
		$txt_noi_dung		= "";
		
		$txt_hien_thi	= 1;
		$txt_noi_bat	= 0;
        $txt_title    = "";
        $txt_keyword    = "";
        $txt_description    = "";

		$txt_date		= lg_date::vn_other(time(),"d/m/Y");
	}
	 
	if (!$OK)

		template_edit("?act=sanpham_new&txt_cat=".$txt_cat, "new", 0 ,$txt_cat,$txt_ten,$txt_chu_thich,$txt_noi_dung,$txt_hien_thi,$txt_noi_bat, $txt_title, $txt_keyword, $txt_description,$error)
		
?>
</center>  