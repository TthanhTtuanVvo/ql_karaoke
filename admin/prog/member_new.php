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

	if ($func == "new")
	{
		// kiểm tra user tồn tại
		$r = $db->select("tgp_user","username = '".$db->escape($txt_username)."'");
		if ($db->num_rows($r) != 0)
			$error = "Đã tồn tại Username này! Vui lòng thử lại tên khác.";
		// kiểm tra username
		else if (empty($txt_username))
			$error = "Vui lòng nhập Username.";
		// kiểm tra chuẩn username
		else if (kt_user_dung($txt_username))
			$error = "Username không đúng chuẩn ( Only include characters a-z and 0-9, the sign -, _)";
		// xác thực về mật khẩu
		else if (empty($txt_password))
			$error = "Vui lòng nhập Mật khẩu.";
		else if ($txt_password != $txt_password2)
			$error = "Mật khẩu không đúng.";
		// kiểm tra email
		else if (kt_email_dung($txt_email))
			$error = "Email không đúng";
        else if (empty($txt_ten))
			$error = "Vui lòng nhập Họ tên.";
		// kiểm tra tên thành viên
		// OK all
		else
		{
			$db->insert("tgp_user","id,username,password,ten,email,dien_thoai,dia_chi,level,trang_thai,time","0,'".$db->escape($txt_username)."','".md5($txt_password)."','".$db->escape($txt_ten)."','".$db->escape($txt_email)."','".$db->escape($dien_thoai)."','".$db->escape($txt_dia_chi)."','".($txt_level+0)."','".($txt_trang_thai+0)."','".time()."'");
            //$db->insert("tgp_user","id,username,password,ten,email,dien_thoai,dia_chi,level,trang_thai,time","0,'".$db->escape($txt_username)."','".md5($txt_password.$txt_username)."','".$db->escape($txt_ten)."','".$db->escape($txt_email)."','".$db->escape($dien_thoai)."','".$db->escape($txt_dia_chi)."','".($txt_level+0)."','".($txt_trang_thai+0)."','".time()."'");
			$OK = true;
			admin_load("Đã thêm User vào tài khoản","?act=member_list");
		}
	}
	else
	{
		$txt_username	=	"";
		$txt_email		=	"";
		$txt_ten 		=	"";
		$txt_dien_thoai =	"";
		$txt_dia_chi	=	"";
		$txt_level		=	1;
		$txt_trang_thai	=	1;
		$error			=	"";
	}
	
	if (!$OK)
		template_edit("?act=member_new", "new", 0 , $txt_username , $txt_email , $txt_ten , $txt_dien_thoai , $txt_dia_chi , $txt_level , $txt_trang_thai , $error);
?>
</center>