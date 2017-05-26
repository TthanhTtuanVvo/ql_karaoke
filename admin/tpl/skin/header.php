<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <link rel="stylesheet" type="text/css" media="screen, projection" href="tpl/page.css" />
<link rel="stylesheet" type="text/css" media="screen, projection" href="tpl/token-input.css" />
<link rel="stylesheet" type="text/css" media="screen, projection" href="tpl/jquery-ui.css" /> -->
<link rel="stylesheet" type="text/css" media="screen, projection" href="../admin/css/nprogress.css" />
<link rel="stylesheet" type="text/css" media="screen, projection" href="../admin/css/bootstrap-switch.css" />
<link rel="stylesheet" type="text/css" href="../admin/plugins/css/main.css">
<link rel="stylesheet" type="text/css" href="../admin/plugins/css/style.css">

<style type="text/css">
a
{color: blue;}
</style>

<script src="../admin/plugins/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js" ></script>
<script type="text/javascript" src="../ckfinder/ckfinder.js"></script>
<!-- <script type="text/javascript" src="phh.js"></script> -->
<!-- <script type="text/javascript" src="../admin/js/jquery.js"></script> -->

<script type="text/javascript" src="js/jquery.number.js"></script>
<script type="text/javascript">
    var base_url = '<?=$domain?>';
    $(function(){

        // Set up the number formatting.
        $('#pricesp').number( true, 0 );
    });  
</script>
<script type="text/javascript" src="../admin/js/jquery.tokeninput.js"></script>
<script type="text/javascript" src="../admin/js/jquery-ui.js"></script> 
<script type="text/javascript" src="../admin/js/nprogress.js"></script> 
<script type="text/javascript" src="../admin/js/bootstrap-switch.min.js"></script>	
<!--
<script type="text/javascript" src="../plugins/fancybox-v3/v2/jquery.fancybox.js"></script>-->
<script src="../admin/plugins/js/essential-plugins.js"></script>
<script src="../admin/plugins/js/bootstrap.min.js"></script>
<script src="../admin/plugins/js/plugins/pace.min.js"></script>
<script src="../admin/plugins/js/main.js"></script>
<script src="../admin/js/myscript.js"></script>

<title>Administration Control Panel</title>
<!--[if lt IE 7]>
<script defer type="text/javascript" src="js/pngfix.js"></script>
<![endif]-->

<!--[if lte IE 6]>
<style type="text/css">
.clearfix {height: 1%;}
</style>
<![endif]-->

<!--[if gte IE 7.0]>
<style type="text/css">
.clearfix {display: inline-block;}
</style>
<![endif]-->
</head>
<body class="sidebar-mini">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a href="?act=home" class="logo">TV Administrator</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a href="#" data-toggle="offcanvas" class="sidebar-toggle"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!-- User Menu-->
              <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user fa-lg"></i> Tài khoản</a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="?act=member_list&id=1"><i class="fa fa-user fa-lg"></i> Thông tin cá nhân</a></li>
                  <li><a href="?logout=OK"><i class="fa fa-sign-out fa-lg"></i> Đăng xuất</a></li>
                </ul>
              </li>
              <li><a href="<?=$domain?>" target="_blank"><i class="fa fa-home fa-lg"></i> Xem trang chủ</a></li>
            </ul>
          </div>
        </nav>
      </header>