<h1 style="display: none;">Sự kiện - Karaoke mercury</h1>
<h3 style="display: none;">các sự kiện - Karaoke mercury</h3>
<div class="block-main">
        <div class="block-news container">
            <h3>Sự kiện</h3>
            <div class="row">
            <?
                $perpage = 12;
                    $rs_all = $db->select("tgp_cms","cat =2 and hien_thi=1","order by time desc, id desc");
                    $sum = $db->num_rows($rs_all);
                    $pages    = ($sum-($sum%$perpage))/$perpage;
                    if ($sum % $perpage <> 0)
                    {
                      $pages = $pages + 1;
                    }
                    $page   = (!isset($page) || $page==0)?1:(($page>$pages)?$pages:$page);
                    $min    =   abs($page-1) * $perpage;
                    $max    =   $perpage;

                    $q = $db->select("tgp_cms","cat =2 and hien_thi=1","order by time desc, id desc limit ".$min.", ".$max);

                  if($sum==0){
                     ?>
                     <p>Chưa cập nhật bài viết trong mục này.</p>
                     <?
                  }
                  else{
                    $dem=1;
                  while ($row=$db->fetch($q)) {
            ?>
                <div <?if($dem%2==1){ echo 'class="box-news col-sm-12 wow slideInLeft"';} else { echo 'class="box-news col-sm-12 wow slideInRight"';}?> data-wow-duration="1s" data-wow-delay=".2s">
                    <div class="row">
                        <div class="box-new-img col-sm-4 col-xs-5">
                            <a href="<?=$domain?>su-kien-xem/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>.html"><img class="img-responsive" src="<?=$domain?>uploads/evt/news_<?=$row['hinh']?>" alt="<?=$row['ten']?>"></a>
                        </div>
                        <div class="box-new-content col-sm-8 col-xs-7">
                            <div class="news-title">
                                <p><a href="<?=$domain?>su-kien-xem/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>.html" title=""><?=$row['ten']?></a></p>
                                <p>Thời gian diễn ra: <?=date("d/m/Y",$row['time_event'])?></p>
                                <span style="font-size:12px; color: #777;padding-bottom: 8px;"><?=date("d/m/Y",$row['time'])?></span>
                            </div>
                            <div class="news-content">
                                <p><?=lg_string::crop($row['chu_thich'],100)?></p>
                            </div>
                            <span class="read-more">
                                <a href="<?=$domain?>su-kien-xem/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>.html" title="<?=$row['ten']?>">Xem thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            </span>
                            <h2 style="display: none;"><?=$row['ten']?></h2>
                        </div>
                    </div>
                </div>
               
                <? $dem++; } }?>
                
            </div>
        </div>
        <? showPageNavigation($page, $pages, $domain.'su-kien/'); ?>
    </div>