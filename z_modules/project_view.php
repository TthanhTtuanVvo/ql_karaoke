<?
    $q = $db->select("tgp_gallery","cat=2 and hien_thi=1","order by time desc, id desc");
    if($db->num_rows($q) > 0){
        $row=$db->fetch($q);
 ?>
    <style type="text/css" media="screen">
        .block-rooms{
    background: url("<?=$domain?>uploads/gal/doitac_<?=$row['hinh']?>") center no-repeat;
}
    </style>
    <?}?>
<div class="block-rooms" style="padding-bottom: 15px;">
        <div class="container">
            <div class="row">
                <div class="box-rooms col-sm-12">
                <?
                	$perpage = 12;
                    $rs_all = $db->select("sanpham","cat='".$pid."' and hien_thi=1","order by time desc,id desc");
                    $sum = $db->num_rows($rs_all);
                    $pages    = ($sum-($sum%$perpage))/$perpage;
                    if ($sum % $perpage <> 0)
                    {
                      $pages = $pages + 1;
                    }
                    $page   = (!isset($page) || $page==0)?1:(($page>$pages)?$pages:$page);
                    $min    =   abs($page-1) * $perpage;
                    $max    =   $perpage;
                    $q = $db->select("sanpham","cat='".$pid."' and hien_thi=1","order by id desc limit ".$min.", ".$max);
                ?>
                    <div class="row">
                        <h3><?=get_sql("select ten from tgp_product_menu where id='".$pid."'")?></h3>
                        <p><?=get_sql("select chu_thich from tgp_product_menu where id='".$pid."'")?></p>
                        <?=get_sql("select noi_dung from tgp_product_menu where id='".$pid."'")?>
                        <?
                            if($db->num_rows($q) > 0) {
                            while ($row=$db->fetch($q)) {
                        ?>
                        <div style="padding-bottom: 15px;" class="rooms col-sm-3 col-xs-6 wow slideInUp" data-wow-duration="1s" data-wow-delay=".4s">
                        	<div class="item-art detail-item-art">
                                <div class='list-group gallery'>
                            <figure>
                                <a class="fancybox" href="<?=$domain?>uploads/product/sp_<?=$row['hinh']?>" data-fancybox-group="gallery" title="<?=$row['ten']?>"><img class="img-responsive" src="<?=$domain?>uploads/product/sp_<?=$row['hinh']?>" alt="<?=$row['ten']?>"></a>
                                <i class="fa fa-share-square" aria-hidden="true"></i>
                            </figure>
                            <div>
                                <a class="fancybox" href="<?=$domain?>uploads/product/sp_<?=$row['hinh']?>" title="<?=$row['ten']?>"><?=$row['ten']?></a>
                            </div>
                            </div>
                            </div>
                        </div>
                        
                        <?} }?>
                    </div>
                </div>
            </div>
        </div>
        <? showPageNavigation($page, $pages, $domain.'chi-tiet-phong/'.$_GET['id']."/"); ?>
    </div>