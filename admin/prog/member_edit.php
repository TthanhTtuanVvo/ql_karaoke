<?
    $act = $_GET['act'];
    $txt_cat = $_GET['txt_cat'];
    $func = $_GET['func'];
    $id = $_GET['id'];
    
    $txt_username = $_GET['txt_username'];
    $txt_password = $_GET['txt_password'];
    $txt_password2 = $_GET['txt_password2'];
    $txt_email = $_GET['txt_email'];
    $txt_ten = $_GET['txt_ten'];
    $txt_dien_thoai = $_GET['txt_dien_thoai'];
    $txt_dia_chi = $_GET['txt_dia_chi'];
    $txt_level = $_GET['txt_level'];
    $txt_trang_thai = isset($_GET['txt_trang_thai']) ? 1 : 0;
    
	include "templates/member.php";
?>
<center>
<?
	$OK = false;

	$id =	$id+0;
	$r	=	$db->select("tgp_user","id = '".$id."'");
	if ($db->num_rows($r) == 0)
	{
		Admin_Load("Tài khoản này không tồn tại.","?act=member_list");
		$OK = true;
	}

	if ($func == "update")
	{
		// xác thực về mật khẩu
		if (empty($txt_password))
		{
			// kiểm tra email
			if (kt_email_dung($txt_email))
				$error = "Email sai";
			// kiểm tra tên thành viên
			else if (empty($txt_ten))
				$error = "Vui lòng nhập họ tên";
			// OK all
			else
			{
				$db->query("update tgp_user set ten = '".$db->escape($txt_ten)."', email = '".$db->escape($txt_email)."', dien_thoai = '".$db->escape($txt_dien_thoai)."', dia_chi = '".$db->escape($txt_dia_chi)."', level = '".($txt_level+0)."', trang_thai = '".($txt_trang_thai+0)."' where id = '".$id."'");
				$OK = true;
				admin_load("Updated information for that user.","?act=member_list");
			}
		}
		else
		{
			if ($txt_password != $txt_password2)
				$error = "Mật khẩu không khớp.";
			else
			{
				$db->query("update tgp_user set password = '".md5($txt_password)."' where id = '".$id."'");
                //$db->query("update tgp_user set password = '".md5($txt_password.$txt_username)."' where id = '".$id."'");
				$OK = true;
				admin_load("Thông tin đã được chỉnh sửa.","?act=member_list");
			}
		}
	}
	else
	{
		$r	=	$db->select("tgp_user","id = '".$id."'");
		while ($row = $db->fetch($r))
		{
			$txt_username	=	$row["username"];
			$txt_email		=	$row["email"];
			$txt_ten 		=	$row["ten"];
			$txt_dien_thoai =	$row["dien_thoai"];
			$txt_dia_chi	=	$row["dia_chi"];
			$txt_level		=	$row["level"];
			$txt_trang_thai	=	$row["trang_thai"];
		}
		$error			=	"";
	}
	
	if (!$OK)
		template_edit("?act=member_edit", "update", $id , $txt_username , $txt_email , $txt_ten , $txt_dien_thoai , $txt_dia_chi , $txt_level , $txt_trang_thai , $error);
?>
</center>