<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../admin/plugins/css/main.css">
<title>Administration Control Panel - Đăng nhập</title>
<script src="../admin/plugins/js/jquery-2.1.4.min.js"></script>
<script src="../admin/plugins/js/essential-plugins.js"></script>
<script src="../admin/plugins/js/bootstrap.min.js"></script>
<script src="../admin/plugins/js/plugins/pace.min.js"></script>
<script src="../admin/plugins/js/main.js"></script>
</head>
<body>

<div id="wrapper">
  <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <img src="images/logo_tinh_ve.png" alt="Tinh Vệ" class="img-responsive" />
      </div>
      <div class="login-box">
        <form method="post" class="login-form">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Đăng nhập</h3>
          <div class="form-group">
            <label class="control-label">Tài khoản</label>
            <input type="text" placeholder="Email" name="log_admin_user" value="<?=$_SESSION["login_admin_user"]?>" autofocus class="form-control">
          </div>
          <div class="form-group">
            <label class="control-label">Mật khẩu</label>
            <input type="password" placeholder="Nhập mật khẩu" name="log_admin_pass" class="form-control">
          </div>
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập <i class="fa fa-sign-in fa-lg"></i></button>
          </div>
        </form>
      </div>
    </section>
</div>
</body>
</html>
