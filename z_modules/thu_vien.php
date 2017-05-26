			<!-- block-product -->
			<div class="container block-product">
				<div class="product-header">
					<h1>Thư viện ảnh</h1>
					<!-- <span>Vật liệu xây dựng nổi bật</span> -->
				</div>	
				<div class="row">
					<div class="product-wrap">
						<?
                    // $page = ($page+0);
                    $perpage = 12;
                    $rs_all = $db->select("tgp_gallery","cat=3 and hien_thi=1","order by time desc, id desc");
                    $sum = $db->num_rows($rs_all);
                    $pages    = ($sum-($sum%$perpage))/$perpage;
                    if ($sum % $perpage <> 0)
                    {
                      $pages = $pages + 1;
                    }
                    $page   = (!isset($page) || $page==0)?1:(($page>$pages)?$pages:$page);
                    $min    =   abs($page-1) * $perpage;
                    $max    =   $perpage;

                    $rs = $db->select("tgp_gallery","cat=3 and hien_thi=1","order by time desc, id desc limit ".$min.", ".$max);

                  if($sum==0){
                     ?>
                     <p>Chưa cập nhật hình ảnh trong mục này.</p>
                     <?
                  }
                  else{
                  while ($row=$db->fetch($rs)) {
                  ?>
						
						<div class="product-item" style="float:left; width:20%;">
							<div class="item-art detail-item-art">
                                <div class='list-group gallery'>
                                <figure>
                                    <a class="fancybox" href="<?=$domain?>uploads/gal/tv_<?=$row['hinh']?>" data-fancybox-group="gallery" title="<?=$row['ten']?>"><img class="img-responsive" src="<?=$domain?>uploads/gal/tv_<?=$row['hinh']?>" alt="<?=$row['ten']?>"/></a>
                                </figure>
                                
                                </div>
                            </div>
						</div>
					<?} }?>	
						
					</div>
				</div>
				<? showPageNavigation($page, $pages, $domain.'thu-vien-anh/'); ?>
			</div>
			<!-- /block-product -->
			