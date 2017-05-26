		<?
			$q = $db->select("vatlieu","id='".$pid."' and hien_thi=1","");
			$row = $db->fetch($q);
		?>	
			<!-- block-product -->
			<div class="container block-product">
				<div class="product-header">
					<h1><?=$row['ten']?></h1>
				</div>	
				<div class="product-detail">
					<?=$row['noi_dung']?>				
				</div>	
				<div class="product-header">
					<h2>Các vật liệu khác</h2>
				</div>	
				<div style="padding:10px;">	
		<?
			$q = $db->select("vatlieu","id<>'".$pid."' and hien_thi=1","order by time desc,id desc limit 7");
			while ($row=$db->fetch($q)) {
		?>
				<div class="tin_khac">
					<a href="<?=$domain?>chi-tiet-vat-lieu/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>.html">» <?=$row['ten']?></a>
				</div>	
		<?}?>
				</div>
			</div>
			<!-- /block-product -->