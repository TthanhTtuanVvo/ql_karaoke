<?php
    $act = $_POST['act'];
    $txt_ten = $_POST['txt_ten'];
    $txt_hinh = $_POST['txt_hinh'];
    $txt_hinh_note = $_POST['txt_hinh_note'];
    $txt_hien_thi = isset($_POST['txt_hien_thi']) ? 1 : 0;
    $txt_noi_bat = isset($_POST['txt_noi_bat']) ? 1 : 0;
    $txt_chu_thich = $_POST['txt_chu_thich'];
    $txt_noi_dung = $_POST['txt_noi_dung'];
    $txt_date = $_POST['txt_date'];
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
    include "templates/cms.php";
   
?>
<center>
<?php
	$max_file_size	=	6048000;
	$up_dir			=	"../uploads/cms/";

	$OK = false;
	
	if ($func == "new")
	{
		if (empty($txt_ten))
			$error = "Vui lòng nhập tiêu đề.";
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
							$error = "Unable to upload images.";
				else
				{
					$error = "Wrong file format - Can not upload images.";
				}
			else
			{
				if ($file_size == 0)
				{
					$OK		= true;
					$hinh	= false;
				}
				else
					$error = "Your image exceeds the size allowed.";
			}
			// Process xong
			if ($OK)
			{
				$time = time($txt_date);
			
				$id = $db->insert("tgp_cms","id,cat,ten,chu_thich,hinh_note,noi_dung,hien_thi,noi_bat,time,user, seo_title, seo_keyword, seo_description","0,'".($txt_cat+0)."','".$db->escape($txt_ten)."','".$txt_chu_thich."','".$db->escape($txt_hinh_note)."','".$txt_noi_dung."','".($txt_hien_thi+0)."','".($txt_noi_bat+0)."','".$time."','".$thanh_vien["id"]."','".($txt_title)."','".($txt_keyword)."','".($txt_description)."'");
				
				if ($hinh)
				{
                    $txt_hinh_1	= "news_".time().".".$file_type;
                    img_resize($up_dir.$file_full_name,$up_dir.$txt_hinh_1,"w=600&h=400&zc=1");
					$db->update("tgp_cms","hinh",$file_full_name,"id = '".$id."'");
                    
				}
				
				admin_load("Cập nhật thành công...","?act=cms_list&id=".($txt_cat+0));
			}
		}
	}
	else
	{
		$txt_ten		= '';
        $txt_hinh		= '';
		$txt_chu_thich	= '';
		$txt_hinh_note	= '';
		$txt_noi_dung	= '';
        $txt_hien_thi	= '';
		$txt_noi_bat	= 0;
		$txt_hien_thi	= 1;
		$txt_date		= lg_date::vn_other(time(),"d/m/Y");
        $txt_title    = "";
        $txt_keyword    = "";
        $txt_description    = "";
	}
	
	if (!$OK)
		template_edit("?act=cms_new", "new", 0 ,$txt_cat,$txt_ten,$txt_chu_thich,$txt_hinh,$txt_hinh_note,$txt_noi_dung,$txt_hien_thi,$txt_noi_bat,$txt_date,$error,$txt_title,$txt_keyword,$txt_description)
?>
</center>