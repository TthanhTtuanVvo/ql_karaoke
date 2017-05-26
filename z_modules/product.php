			<!-- block-product -->
			<div class="container block-product">
				<div class="product-header">
					<h1>Vật liệu xây dựng</h1>
					<span>Vật liệu xây dựng nổi bật</span>
				</div>	
				<div class="row">
					<div class="product-wrap">
						<?
                    // $page = ($page+0);
                    $perpage = 12;
                    $rs_all = $db->select("vatlieu","hien_thi=1 and noi_bat=1","order by time desc, id desc");
                    $sum = $db->num_rows($rs_all);
                    $pages    = ($sum-($sum%$perpage))/$perpage;
                    if ($sum % $perpage <> 0)
                    {
                      $pages = $pages + 1;
                    }
                    $page   = (!isset($page) || $page==0)?1:(($page>$pages)?$pages:$page);
                    $min    =   abs($page-1) * $perpage;
                    $max    =   $perpage;

                    $rs = $db->select("vatlieu","hien_thi=1 and noi_bat=1","order by time desc, id desc limit ".$min.", ".$max);

                  if($sum==0){
                     ?>
                     <p>Chưa cập nhật sản phẩm trong mục này.</p>
                     <?
                  }
                  else{
                  while ($row=$db->fetch($rs)) {
                  ?>
						
						<div class="col-md-3 product-item">
							<a href="<?=$domain?>chi-tiet-vat-lieu/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>.html" title="<?=$row['ten']?>"><img class="img-responsive" src="<?=$domain?>uploads/product/vl_<?=$row['hinh']?>" alt="<?=$row['ten']?>"></a>
							<a href="<?=$domain?>chi-tiet-vat-lieu/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>.html" title="<?=$row['ten']?>" class="url"><?=lg_string::crop($row['ten'],6)?></a>
						</div>
					<?} }?>	
						
					</div>
				</div>
				<? showPageNavigation($page, $pages, $domain.'vat-lieu-xay-dung/'); ?>
			</div>
			<!-- /block-product -->