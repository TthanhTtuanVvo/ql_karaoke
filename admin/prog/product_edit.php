<?php
	$act = $_POST['act'];
    $txt_ten = $_POST['txt_ten'];   
    $txt_hien_thi = $_POST['txt_hien_thi'];
    $txt_thu_tu = $_POST['txt_thu_tu'];
    $txt_hinh   = $_POST['txt_hinh'];
    $txt_url    = $_POST['txt_url'];
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
    include "templates/product.php";
    $tenmien = get_sql("select ten from tgp_product where id=".$id);
?>
<?php
	//	Kiểm tra sự tồn tại của ID
	$id = $id + 0;
	$r	= $db->select("tgp_product","id = '".$id."'");
	if ($db->num_rows($r) == 0)
    admin_load("Không tồn tại mục này.","?act=product_manager");
    
    $max_file_size	=	2048000;
	$up_dir			=	"../uploads/product_gal/";

	$OK = false;

	if ($func == "update")
	{
		if (empty($txt_ten))
			$error = "Vui lòng nhập tên nhóm tin.";
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
    				$db->query("update tgp_product set cat = '".$db->escape($txt_cat)."', ten = '".$db->escape($txt_ten)."' , hien_thi = '".($txt_hien_thi+0)."', thu_tu = '".($txt_thu_tu)."', url = '".($txt_url)."' where id = '".$id."'");
                    
                    if ($hinh)
				    {
                    $txt_hinh_1	= "gal_".time().".".$file_type;
                
                    img_resize($up_dir.$file_full_name,$up_dir.$txt_hinh_1,"w=390&h=418&zc=1");
                    $db->update("tgp_product","hinh",$file_full_name,"id = '".$id."'");
				    }
                    
    				admin_load("Đã cập nhật thành công.","?act=product_list&id=".($txt_cat+0));
                }
            }			
	}
	else
	{
		$r	= $db->select("tgp_product","id = '".$id."'");
		while ($row = $db->fetch($r))
		{
			$txt_cat		= $row["cat"];
			$txt_ten		= $row["ten"];
			$txt_hien_thi	= $row["hien_thi"];
            $txt_thu_tu     = $row["thu_tu"];
            $txt_url        = $row["url"];
		}
	}
	
	if (!$OK)
		template_edit("?act=product_edit","update",$id,$txt_cat,$txt_ten,$txt_hien_thi,$txt_thu_tu,$txt_url,$txt_hinh,$error)
?>
</center>