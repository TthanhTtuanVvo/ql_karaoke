<div class="block-main">
        <div class="block-news container">
            <!-- <h3>Tin tức</h3> -->
            <div class="row">
            <div class="box-about col-sm-12 wow slideInLeft" data-wow-duration="1s" data-wow-delay=".2s">
        <!-- <span>Vật liệu xây dựng nổi bật</span> -->
    <?
			$db->query("update tgp_cms set luot_xem=(luot_xem+1) where id='".$pid."'");
			$q = $db->select("tgp_cms","id='".$pid."' and hien_thi=1","");
			$row = $db->fetch($q);
			
		?>	
			<!-- block-product -->
			
				<div class="pt-header">
					<h1 class="tieu-de-h1"><?=$row['ten']?></h1>
					<span style="font-size:12px; color: #009d46;"><?=date("d/m/Y",$row['time'])." - Lượt xem: ".$row['luot_xem']?></span>
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
					<a href="<?=$domain?>tin-tuc-xem/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>.html">» <?=$row['ten']?></a> <span style="color: #666666; font-size: 12px;">( <?=date("d/m/Y",$row['time'])?> )</span>
				</div>	
				<h3 style="display: none;"><?=$row['ten']?></h3>
		<?}?>
				</div>
				</div>
			</div>
		</div>
</div>