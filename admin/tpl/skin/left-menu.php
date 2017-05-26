
<aside class="main-sidebar hidden-print">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image"><img src="images/avatar-default.png" alt="User Image" class="img-circle"></div>
      <div class="pull-left info">
        <?php $level_arr  = array("Coder","Administrator","Moderator","Member"); ?>
        <p><?=$_SESSION["login_admin_user"]?></p>
        <p class="designation">Cấp độ: <?=$level_arr[$_SESSION["level"]]?></p>
      </div>
    </div>
    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">
      <li class="<?php if($act == "" || $act == "home") echo 'active';?>"><a href="?act=home"><i class="fa fa-dashboard"></i><span>Trang chủ Quản trị</span></a></li>
      <li class="treeview active">
        <a href="javascript:void(0)"><i class="fa fa-bars"></i><span>Danh mục</span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="?act=cms_manager"><i class="fa fa-circle-o"></i> Quản lý nội dung</a></li>
          <li><a href="?act=evt_manager"><i class="fa fa-circle-o"></i> Quản lý sự kiên</a></li>
          <li><a href="?act=gallery_manager"><i class="fa fa-circle-o"></i> Quản lý hình ảnh</a></li>
          <li><a href="?act=page_list"><i class="fa fa-circle-o"></i> Thông tin website</a></li>
          <li><a href="?act=other"><i class="fa fa-circle-o"></i> Cấu hình hệ thống</a></li>
        </ul>
      </li>
      <li class="treeview active"><a href="javascript:void(0)"><i class="fa fa-list"></i><span>Dự án</span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="?act=product_manager"><i class="fa fa-circle-o"></i> Quản lý phòng</a></li>
          <!-- <li><a href="?act=phong_list"><i class="fa fa-circle-o"></i> Quản lý phòng</a></li> -->
          <!-- <li><a href="?act=phong_list"><i class="fa fa-circle-o"></i> Quản lý sản phẩm</a></li> -->
          <li><a href="?act=contact_list"><i class="fa fa-circle-o"></i> Thư khách hàng</a></li>
          <!-- <li><a href="?act=register_list"><i class="fa fa-circle-o"></i> Email đăng ký khách hàng</a></li> -->
        </ul>
      </li>
      <li class="treeview active"><a href="javascript:void(0)"><i class="fa fa-list"></i><span>Tài khoản</span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="?act=member_list"><i class="fa fa-circle-o"></i> Danh sách thành viên</a></li>
          <li><a href="?act=member_edit&id=1"><i class="fa fa-circle-o"></i> Trang cá nhân</a></li>
          <li><a href="?logout=OK"><i class="fa fa-circle-o"></i> Thoát </a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>