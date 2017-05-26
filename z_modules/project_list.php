	<?
		$q = $db->select("tgp_product_menu","id='".$pid."' and hien_thi=1","");
		$row = $db->fetch($q);
		$exact_url = $pid.'-'.lg_string::get_link($row['ten']);

		if($_GET['id']!=$exact_url)
		{
		    ?>
		    <meta http-equiv="refresh" content="0;URL=/du-an-list/<?=$pid?>-<?=lg_string::get_link($row['ten'])?>/"/>
		    <?
		}
	?>
		<!-- block-product -->
		<div class="container block-product">
			<div class="product-header">
				<h3>Dự án <?=$row['ten']?></h3>
				<!-- <span>asdas awrwqr</span> -->
			</div>	
			<div class="row">
				<div class="product-wrap">
				<?
                    // $page = ($page+0);
                    $perpage = 12;
                    $rs_all = $db->select("sanpham","cat='".$pid."' and hien_thi=1","order by time desc, id desc");
                    $sum = $db->num_rows($rs_all);
                    $pages    = ($sum-($sum%$perpage))/$perpage;
                    if ($sum % $perpage <> 0)
                    {
                      $pages = $pages + 1;
                    }
                    $page   = (!isset($page) || $page==0)?1:(($page>$pages)?$pages:$page);
                    $min    =   abs($page-1) * $perpage;
                    $max    =   $perpage;

                    $rs = $db->select("sanpham","cat='".$pid."' and hien_thi=1","order by time desc, id desc limit ".$min.", ".$max);

                  if($sum==0){
                     ?>
                     <p>Chưa cập nhật sản phẩm trong mục này.</p>
                     <?
                  }
                  else{
                  while ($row=$db->fetch($rs)) {
                  ?>
					<div class="col-md-3 product-item">
						<a href="<?=$domain?>chi-tiet-du-an/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>.html" title="<?=$row['ten']?>"><img class="img-responsive" src="<?=$domain?>uploads/product/sp_<?=$row['hinh']?>" alt="<?=$row['ten']?>"></a>
						<a href="<?=$domain?>chi-tiet-du-an/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>.html" title="<?=$row['ten']?>" class="url"><?=$row['ten']?></a>
					</div>
				<?} } ?>	
				</div>
			</div>
			<? showPageNavigation($page, $pages, $domain.'du-an-list/'.$_GET['id']."/"); ?>
		</div>
		<!-- /block-product -->
			