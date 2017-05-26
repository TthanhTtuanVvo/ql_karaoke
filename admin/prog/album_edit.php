<?php
    $act = $_POST['act'];
    $txt_ten = $_POST['txt_ten'];
    $txt_hien_thi = isset($_POST['txt_hien_thi']) ? 1 : 0;

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

    $func = $_POST['func'];
	include "templates/album.php";
?>
<center>
<?php
	//	Kiểm tra sự tồn tại của ID
	$id = $id + 0;
	$r	= $db->select("tbl_album","id = '".$id."'");
	if ($db->num_rows($r) == 0)
		admin_load("This record does not exist.","?act=sanpham_list");

	$max_file_size	=	4048000;
	$up_dir			=	"../uploads/album/";

	$OK = false;

	if ($func == "update")
	{
		if (empty($txt_ten))
			$error = "Please enter the name.";
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
				$db->query("update tbl_album set cat = '".$db->escape($txt_cat)."', ten = '".$db->escape($txt_ten)."', hien_thi = '".($txt_hien_thi+0)."' where id = '".$id."'");
				if ($hinh)
				{	
					$db->update("tbl_album","hinh",$file_full_name,"id = '".$id."'");
				}
				admin_load("Has been successfully updated.","?act=album_list&id=".($txt_cat+0));
			}
		}
	}
	else
	{
		$r	= $db->select("tbl_album","id = '".$id."'");
		while ($row = $db->fetch($r))
		{
			$txt_ten		= $row["ten"];
			$txt_hien_thi	= $row["hien_thi"];
		}
	}

	if (!$OK)
		template_edit("?act=album_edit&id=".$id,"update",$id,$txt_cat,$txt_ten,$txt_hien_thi,$error)
?>
</center>