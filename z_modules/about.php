			<!-- block-main -->
	<div class="block-main">
        <div class="block-about container">
            <div class="row">
                <div class="box-about col-sm-12 wow slideInLeft" data-wow-duration="1s" data-wow-delay=".2s">
						<h1>Giới thiệu</h1>
						<!-- <span>blah blah blah</span> -->
					<?=get_page('gioi_thieu')?>
				</div>	
			</div>
		</div>
	</div>
			<!-- /block-main -->	
	<div class="block-about-us container-fluid">
		<?
			$q=$db->select("tgp_gallery","cat=3 and hien_thi=1");
			$row=$db->fetch($q);
		?>
            <div class="container">
                <div class="row">
                    <div class="img-about-us col-sm-5 col-xs-12 wow slideInLeft" data-wow-duration="1s" data-wow-delay=".4s">
                        <img src="<?=$domain?>uploads/gal/gt_<?=$row['hinh']?>" alt="<?=$row['ten']?>" class="img-responsive">
                    </div>
                    <div class="box-about-us col-sm-7 col-xs-12 wow slideInRight" data-wow-duration="1s" data-wow-delay=".8s">
                        <h3>Về chúng tôi</h3>
                        <?=get_page('about')?>
                    </div>
                </div>
            </div>
    </div>	