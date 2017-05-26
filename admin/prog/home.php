<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Trang chủ</h1>
    <p></p>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li><a href="?act=home">Home</a></li>
    </ul>
  </div>
</div>
<div class="row">
<?php
include_once '../lib/ofc-library/open_flash_chart_object.php';
open_flash_chart_object( '100%', 350, $domain.'admin/visitor_data.php', false, '../' );
?>
</div>