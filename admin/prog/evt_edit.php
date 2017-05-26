<?php
    $act = $_POST['act'];
    $txt_cat = $_POST['txt_cat'];
    $txt_ten = $_POST['txt_ten'];
    $txt_time = $_POST['txt_time'];
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
    if ($_POST["func"]=="update") $id = $_POST["id"]; else $id = $_GET['id'];
    
    include "templates/evt.php";
?>
<center>
<?php
	//	Kiểm tra sự tồn tại của ID
	$id = $id + 0;
	$r	= $db->select("tgp_cms","id = '".$id."'");
	if ($db->num_rows($r) == 0)
		admin_load("This article does not exist.","?act=evt_manager");
	
	$max_file_size	=	6048000;
	$up_dir			=	"../uploads/evt/";

	$OK = false;

	if ($func == "update")
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
				$time = strtotime(str_replace("/","-",$txt_date));
			
				$db->query("update tgp_cms set cat = '".$db->escape($txt_cat)."', ten = '".$db->escape($txt_ten)."',time_event = '".strtotime($txt_time)."',  chu_thich = '".$txt_chu_thich."', hinh_note = '".$db->escape($txt_hinh_note)."', noi_dung = '".$txt_noi_dung."', hien_thi = '".($txt_hien_thi+0)."', noi_bat = '".($txt_noi_bat+0)."', time = '".$time."', seo_title = '".($txt_title)."', seo_description = '".($txt_description)."', seo_keyword = '".($txt_keyword)."' where id = '".$id."'");
				if ($hinh)
				{
                    $txt_hinh_1	= "news_".time().".".$file_type;
                    img_resize($up_dir.$file_full_name,$up_dir.$txt_hinh_1,"w=600&h=400&zc=1");
                	
					$db->update("tgp_cms","hinh",$file_full_name,"id = '".$id."'");
                    
				}
				admin_load("Cập nhật thành công...","?act=evt_list&id=".($txt_cat+0));
			}			
		}
	}
	else
	{
		$r	= $db->select("tgp_cms","id = '".$id."'");
		while ($row = $db->fetch($r))
		{
			$txt_cat		= $row["cat"];
			$txt_ten		= $row["ten"];
			$txt_time		= lg_date::vn_other($row["time_event"],"Y-m-d");
			// check(date("d/m/Y",$txt_time));
			$txt_chu_thich	= $row["chu_thich"];
			$txt_hinh_note	= $row["hinh_note"];
			$txt_noi_dung	= $row["noi_dung"];
			$txt_hien_thi	= $row["hien_thi"];
			$txt_noi_bat	= $row["noi_bat"];
            $txt_title    = $row["seo_title"];
            $txt_keyword    = $row["seo_keyword"];
            $txt_description    = $row["seo_description"];
			$txt_date		= lg_date::vn_other($row["time"],"d/m/Y");
		}
	}
	
	if (!$OK)        
		template_edit("?act=evt_edit","update",$id,$txt_cat,$txt_ten,$txt_time,$txt_chu_thich,$txt_hinh,$txt_hinh_note,$txt_noi_dung,$txt_hien_thi,$txt_noi_bat,$txt_date,$error,$txt_title,$txt_keyword,$txt_description);
?>
</center>