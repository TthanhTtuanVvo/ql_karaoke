<div class="container">
	<div class="block-main">
    <div class="product-header">
        <h2 class="tieu-de-h2">Phong thủy</h2>
        <!-- <span>Vật liệu xây dựng nổi bật</span> -->
    </div> 
    <?
			$db->query("update tgp_cms set luot_xem=(luot_xem+1) where id='".$pid."'");
			$q = $db->select("tgp_cms","id='".$pid."' and hien_thi=1","");
			$row = $db->fetch($q);
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
			<!-- block-product -->
			
				<div class="pt-header">
					<h1><?=$row['ten']?></h1>
					<span style="font-size:12px; color: #009d46;"><?=$weekday.", ".date("d/m/Y - H:m A",$row['time'])." - Lượt xem: ".$row['luot_xem']?></span>
				</div>	
				<div class="product-ct">
					<?=$row['chu_thich']?>				
				</div>
				<div class="product-detail">
					<?=$row['noi_dung']?>				
				</div>	
				<div class="product-header">
					<h3 class="tieu-de-h3">Các bài viết khác</h3>
				</div>	
				<div style="padding:10px;">	
		<?
			$q = $db->select("tgp_cms","cat='".$row['cat']."' and id<>'".$pid."' and hien_thi=1","order by time desc,id desc limit 7");
			while ($row=$db->fetch($q)) {
		?>
				<div class="tin_khac">
					<a href="<?=$domain?>phong-thuy-xem/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>.html">» <?=$row['ten']?></a> <span style="color: #666666; font-size: 12px;">( <?=date("d/m/Y",$row['time'])?> )</span>
				</div>	
		<?}?>
				</div>
			</div>
		</div>
</div>