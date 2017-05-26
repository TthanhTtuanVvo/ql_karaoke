<div class="container block-product">
    <div class="product-header">
        <h1>Phong thủy</h1>
        <!-- <span>Vật liệu xây dựng nổi bật</span> -->
    </div> 
    <?
                    // $page = ($page+0);
                    $perpage = 12;
                    $rs_all = $db->select("tgp_cms","cat=1 and hien_thi=1","order by time desc, id desc");
                    $sum = $db->num_rows($rs_all);
                    $pages    = ($sum-($sum%$perpage))/$perpage;
                    if ($sum % $perpage <> 0)
                    {
                      $pages = $pages + 1;
                    }
                    $page   = (!isset($page) || $page==0)?1:(($page>$pages)?$pages:$page);
                    $min    =   abs($page-1) * $perpage;
                    $max    =   $perpage;

                    $q = $db->select("tgp_cms","cat=1 and hien_thi=1","order by time desc, id desc limit ".$min.", ".$max);

                  if($sum==0){
                     ?>
                     <p>Chưa cập nhật bài viết trong mục này.</p>
                     <?
                  }
                  else{
                  while ($row=$db->fetch($q)) {
                    $weekday = date("l",$row['time']);
                    $weekday = strtolower($weekday);
                    switch($weekday) {
                        case 'monday':
                            $weekday = 'Thứ hai';
                            break;
                        case 'tuesday':
                            $weekday = 'Thứ ba';
                            break;
                        case 'wednesday':
                            $weekday = 'Thứ tư';
                            break;
                        case 'thursday':
                            $weekday = 'Thứ năm';
                            break;
                        case 'friday':
                            $weekday = 'Thứ sáu';
                            break;
                        case 'saturday':
                            $weekday = 'Thứ bảy';
                            break;
                        default:
                            $weekday = 'Chủ nhật';
                            break;
                    }
    ?> 
    <div class="box-pt col-md-6">
    	<div class="row" style="margin-left: 0; margin-right: 0;">
    		<div class="col-md-4 box-img-new">
    			<figure>
    				<a href="<?=$domain?>phong-thuy-xem/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>.html" title="<?=$row['ten']?>"><img src="<?=$domain?>uploads/cms/news_<?=$row['hinh']?>" alt="<?=$row['ten']?>" class="img-responsive"></a>
    			</figure>
    		</div>
    		<div class="col-md-8 box-content-new">
    			<h2><a href="<?=$domain?>phong-thuy-xem/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>.html" title="<?=$row['ten']?>"><?=lg_string::crop($row['ten'],10)?></a></h2>
                <span style="font-size:12px; color: #009d46;"><?=$weekday.", ".date("d/m/Y - H:m A",$row['time'])?></span>
    			<p><?=lg_string::crop($row['chu_thich'],20)?></p>
    		</div>
    	</div>
        <a class="chi-tiet" href="<?=$domain?>phong-thuy-xem/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>.html" title="<?=$row['ten']?>">Xem chi tiết »</a>
    </div>
    <? } }?>
    <? showPageNavigation($page, $pages, $domain.'phong-thuy/'); ?>
</div>