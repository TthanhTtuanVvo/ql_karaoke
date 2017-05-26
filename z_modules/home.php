<h3 style="display: none;">Hệ thống phòng</h3>
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
 <div class="block-slide">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <?
                $q =$db->select("tgp_gallery","cat=1 and hien_thi=1","order by time desc, id desc");
                if($db->num_rows($q) > 0){
            ?>
            <ol class="carousel-indicators">
            <?
                    $count=0;
                    while ($row=$db->fetch($q)) {
                        if($count==0){
            ?>
                <li data-target="#myCarousel" data-slide-to="<?=$count?>" class="active"></li>
            <?} else {?>
                <li data-target="#myCarousel" data-slide-to="<?=$count?>"></li>
            <? } $count++; }?>
            </ol>
            <div class="carousel-inner" role="listbox">
            <?
                $q1 =$db->select("tgp_gallery","cat=1 and hien_thi=1","order by time desc, id desc");
                $count1=0;
                 while ($row1=$db->fetch($q1)) {
                        if($count1==0){
            ?>
                <div class="item active">
                    <img class="img-responsive" src="<?=$domain?>uploads/gal/slide_<?=$row1['hinh']?>" alt="<?=$row1['ten']?>">
                    <div class="hidden-xs wow slideInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                        <?=get_page('slogan')?>
                    </div>
                </div>
            <?} else {?>    
                <div class="item">
                    <img class="img-responsive" src="<?=$domain?>uploads/gal/slide_<?=$row1['hinh']?>" alt="<?=$row1['ten']?>">
                    <div class="hidden-xs wow slideInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                        <?=get_page('slogan')?>
                    </div>
                </div>
            <?} $count1++; }?>
            </div>

            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <?}?>
        </div>
    </div>
    <div class="block-event">
        <div class="slick-event">
            <?
                $q = $db->select("tgp_cms","cat=2 and hien_thi=1","order by time desc, id desc");
                if($db->num_rows($q) > 0) {
                    while ($row=$db->fetch($q)) {
            ?>
           
            <div class="img-event wow slideInUp" data-wow-duration="1s" data-wow-delay=".6s">
                <figure>
                    <img class="img-responsive" src="<?=$domain?>uploads/evt/news_<?=$row['hinh']?>" alt="<?=$row['ten']?>">
                </figure>
                <div>
                    <h3><?=date("d/m/Y",$row['time_event'])?></h3>
                    <a href="<?=$domain?>tin-tuc-xem/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>" title="<?=$row['ten']?>"><?=$row['ten']?></a>
                    <p><?=lg_string::crop($row['chu_thich'],20)?></p>
                    <h2 style="display: none;"><?=$row['ten']?></h2>
                </div>
            </div>
            <?} }?>
            
        </div>
    </div>
    <div class="block-about">
        <div class="container">
            <div class="row">
                <div class="about-home col-sm-12 wow slideInLeft" data-wow-duration="1s" data-wow-delay=".4s">
                    <h3><a href="<?=$domain?>" title=""><img class="img-responsive" src="<?=$domain?>images/logo.png" alt="logo mercury"></a></h3>
                    <p><?=get_page('gioi_thieu','chu_thich')?></p>
                    <div class="view-center">
                        <a class="view-more" href="<?=$domain?>gioi-thieu.html">Đọc thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-rooms">
        <div class="container">
            <div class="row">
                <div class="box-rooms col-sm-12">
                <?
                    $q = $db->select("tgp_product_menu","hien_thi=1","order by id desc limit 4");
                    if($db->num_rows($q) > 0) {
                ?>
                    <div class="row">
                        <h3>Hệ thống phòng</h3>
                        <?
                            while ($row=$db->fetch($q)) {
                        ?>
                        <div class="rooms col-sm-3 col-xs-6 wow slideInUp" data-wow-duration="1s" data-wow-delay=".4s">
                            <figure>
                                <a href="<?=$domain?>chi-tiet-phong/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>.html" title="<?=$row['ten']?>"><img class="img-responsive" src="<?=$domain?>uploads/product_menu/sp_<?=$row['hinh']?>" alt="<?=$row['ten']?>"></a>
                                <i class="fa fa-share-square" aria-hidden="true"></i>
                            </figure>
                            <div>
                                <a href="<?=$domain?>chi-tiet-phong/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>.html" title="<?=$row['ten']?>"><?=$row['ten']?></a>
                                <p><?=lg_string::crop($row['chu_thich'],20)?></p>
                            </div>
                        </div>
                        
                        <?}?>
                        <div class="clear"></div>
                        <div class="view-center">
                            <a class="view-more" href="<?=$domain?>danh-muc-phong/">Xem thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                <?}?>
                </div>
            </div>
        </div>
    </div>
    <div class="block-maps wow slideInRight" data-wow-duration="1s" data-wow-delay=".2s">
        <h3>Bản đồ</h3>
        <div class="map_contact">
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHnNC04F9_o08K9ImoQivLJua1rv94IWY&callback=initMap" type="text/javascript"></script>
            <script type="text/javascript">
                var map;
                function initialize() {
                    var myLatlng = new google.maps.LatLng(<?=get_bien('toado')?>);
                    var myOptions = {
                        zoom: 16,
                        center: myLatlng,
                        draggable: true,
                        scrollwheel: false,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    }
                    map = new google.maps.Map(document.getElementById("div_id"), myOptions);
                    // Biến text chứa nội dung sẽ được hiển thị
                     var text;
                     text= "<p style='font-size:16px;margin-bottom:10px;text-align:center;'><strong>KARAOKE 235 Âu Cơ, Đà Nẵng</strong>";
                     var infowindow = new google.maps.InfoWindow(
                     { content: text,
                     size: new google.maps.Size(100,50),
                     position: myLatlng
                     });
                     infowindow.open(map);
                    var image = 'http://lifebeachvilla.com/images/point.png';
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
                        title:"",
                        icon: image,
                    });

                    google.maps.event.addListener(map, 'click', function(event){
                        this.setOptions({scrollwheel:true});
                    });
                    google.maps.event.addListener(map, 'mouseover', function(event){
                        this.setOptions({scrollwheel:false});
                    });
                }
            </script>
            <body onLoad="initialize()">
                <div  id="div_id" style="height:355px; width:100%;"></div>
            </body>
        </div> <!-- /map-contact -->
    </div>