<?php
    $act = $_POST['act'];
    $txt_ten = $_POST['txt_ten'];
    $txt_hien_thi = isset($_POST['txt_hien_thi']) ? 1 : 0;
    $txt_chu_thich = $_POST['txt_chu_thich'];
    $txt_noi_dung = $_POST['txt_noi_dung'];
    $func = $_POST['func'];
    if ($_POST["func"]=="update")
    {
    $id = $_POST["id"];
    $txt_cat = $_POST['txt_cat'];
    }
    else
    {
    $id = $_GET['id'];
    $txt_cat = $_GET['txt_cat'];
    }
	include "templates/gallery.php";
?>
<center>
<?php
	//	Kiểm tra sự tồn tại của ID
	$id = $id + 0;
	$r	= $db->select("tgp_gallery","id = '".$id."'");
	if ($db->num_rows($r) == 0)
		admin_load("This article does not exist.","?act=gallery_manager");

	$max_file_size	=	4048000;
	$up_dir			=	"../uploads/gal/";

	$OK = false;

	if ($func == "update")
	{
		if (empty($txt_ten))
			$error = "Please enter the name of the article.";
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
				$db->query("update tgp_gallery set cat = '".$db->escape($txt_cat)."', ten = '".$db->escape($txt_ten)."', chu_thich = '".$txt_chu_thich."', noi_dung = '".$txt_noi_dung."', hien_thi = '".($txt_hien_thi+0)."' where id = '".$id."'");
				if ($hinh)
				{
				   $txt_hinh_1	= "slide_".time().".".$file_type;
				    $txt_hinh_2	= "doitac_".time().".".$file_type;
				    $txt_hinh_3	= "gt_".time().".".$file_type;
				    $txt_hinh_4	= "bb_".time().".".$file_type;
				    // $txt_hinh_2	= "partner_".time().".".$file_type;

				    if($txt_cat==1){
                    img_resize($up_dir.$file_full_name,$up_dir.$txt_hinh_1,"w=1920&h=815&zc=1");
                    }
                    elseif($txt_cat==2){
                    img_resize($up_dir.$file_full_name,$up_dir.$txt_hinh_2,"w=1920&h=1279&zc=1"); 
                    }
                    elseif($txt_cat==3){
                    img_resize($up_dir.$file_full_name,$up_dir.$txt_hinh_3,"w=800&h=800&zc=1"); 
                    }
                    else {
                    img_resize($up_dir.$file_full_name,$up_dir.$txt_hinh_4,"w=580&h=100&zc=1"); 
                    }
					$db->update("tgp_gallery","hinh",$file_full_name,"id = '".$id."'");
				}
				admin_load("Has been successfully updated.","?act=gallery_list&id=".($txt_cat+0)); 
			}
		}
	}
	else
	{
		$r	= $db->select("tgp_gallery","id = '".$id."'");
		while ($row = $db->fetch($r))
		{
			$txt_cat		= $row["cat"];
			$txt_ten		= $row["ten"];
			$txt_chu_thich	= $row["chu_thich"];
			$txt_noi_dung	= $row["noi_dung"];
			$txt_hien_thi	= $row["hien_thi"];
		}
	}

	if (!$OK)
		template_edit("?act=gallery_edit&id=".$id,"update",$id,$txt_cat,$txt_ten,$txt_chu_thich,$txt_noi_dung,$txt_hien_thi,$error)
?>
</center>