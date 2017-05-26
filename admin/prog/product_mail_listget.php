<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý đơn hàng</h1>
    <p></p>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
    </ul>
  </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h3 class="card-title">Chi tiết đơn hàng</h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <?php
                        global $id;
                        $id = $_GET['id'];
                        $q	=$db->select("tgp_product_email","id='".$id."'","");
                        $r = $db->fetch($q);
                        $q2 = $db->select("sanpham", "id = ".$r['id_product']."");
                        $rs = $db->fetch($q2);
                    ?>
                    <tr>
                    	<td width="65%" align="left">
                    		<div style="padding: 10px;">
                                <p class="p_p"><strong>Tên</strong>: <span style="display: inline-block;"><?=$r['name']?></span></p>
                                <p class="p_p"><strong>Số điện thoại</strong>: <?=$r['phone']?></p>
                                <p class="p_p"><strong>Địa chỉ</strong>: <?=$r['address']?></p>
                                <p class="p_p"><strong>Email</strong>: <?=$r['email']?></p>
                                <p class="p_p"><strong>Sản phẩm</strong>: <?=$rs['ten']?></p>
                                <p class="p_p"><strong>Nội dung</strong></p>       
                                <?=$r['note']?>
                            </div>
                    	</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>