<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?=get_title()?></title>
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
        <meta content="telephone=no" name="format-detection" />

        <meta name="description" content="<?=get_description()?>" />
        <meta name="keywords" content="<?=get_keywords()?>" />

        <link rel="shortcut icon" href="<?=$domain?>images/favicon.png" type="image/x-icon" />
        <link href="/rss.xml" rel="alternate" type="application/rss+xml" title="RSS 2.0" />  

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="DC.title" content="<?=get_title()?>" />
        <meta name="geo.region" content="VN" />
        <meta name="geo.placename" content="Da Nang" /> 
        <meta name="geo.position" content="16.047334;108.209233" /> 
        <meta name="ICBM" content="16.047334, 108.209233" />
        <!-- <meta name="author" content="tinhve.vn" /> -->
        <meta name='revisit-after' content='1 days' /> 
        <meta name="reply-to" content="mercurykaraokedn@gmail.com" />
        <meta name="robots" content="all,index,follow" />

        
        <meta property="og:locale" content="vi_VN" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?=get_title()?>" />
        <meta property="og:description" content="<?=get_description()?>" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" /> 
        <meta property="og:site_name" content="KARAOKE MERCURY" />  
        <meta property="article:tag" content="KARAOKE MERCURY" />
        <meta property="fb:app_id" content="" />

        <meta name="google-site-verification" content="k4cQ2IVk8aaXpBD4p1-A2xcPcN-L4VtgN3KBqYqrFEY" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&amp;subset=latin-ext,vietnamese" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin-ext,vietnamese" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?=$domain?>css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="<?=$domain?>css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?=$domain?>css/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="<?=$domain?>css/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?=$domain?>css/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="<?=$domain?>css/animate.css" />
    <link rel="stylesheet" type="text/css" href="<?=$domain?>css/jquery.mmenu.all.css" />
    <link rel="stylesheet" type="text/css" href="<?=$domain?>css/demo.css" />
    <link rel="stylesheet" href="<?=$domain?>source/jquery.fancybox.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?=$domain?>css/custom.css" />
    <link rel="stylesheet" type="text/css" href="<?=$domain?>css/style.css" />
    <!-- JS -->
    
</head>

<body>
    <div class="wrap">
    <div class="menumobile">
        <div class="header">
            <a href="#menu"></a>
            <div class="clear"></div>
        </div>
        <nav id="menu">
            <ul>
                <li><a <?if($act=='' || $act=='home') echo 'class="active"';?> href="<?=$domain?>" title="Trang Chủ">Trang Chủ</a></li>
                <li><a <?if($act=='about') echo 'class="active"';?> href="<?=$domain?>gioi-thieu.html" title="Giới Thiệu">Giới Thiệu</a></li>
                <li><a <?if($act=='project' || $act=='project_view') echo 'class="active"';?> href="<?=$domain?>danh-muc-phong/" title="Phòng Karaoke">Phòng karaoke</a></li>
                <li><a <?if($act=='su_kien' || $act=='su_kien_xem') echo 'class="active"';?> href="<?=$domain?>su-kien/" title="sự kiện">Sự kiện</a></li>
                <li><a <?if($act=='tin_tuc' || $act=='tin_tuc_xem') echo 'class="active"';?> href="<?=$domain?>tin-tuc/" title="Tin Tức">Tin Tức</a></li>
                <li><a <?if($act=='lien_he') echo 'class="active"';?> href="<?=$domain?>lien-he.html" title="Liên Hệ">Liên Hệ</a></li>
            </ul>
        </nav>
    </div>
    <div class="block-header">
        <div class="container">
            <div class="row">
                <div class="box-logo col-sm-4 col-xs-12">
                    <?if($act=='' || $act=='home') {?><h1><a href="<?=$domain?>" title=""><img class="img-responsive" src="<?=$domain?>images/logo.png" alt="logo mercury"></a></h1><?} else {?>
                    <h6 class="style-h6"><a href="<?=$domain?>" title=""><h1><a href="<?=$domain?>" title=""><img class="img-responsive" src="<?=$domain?>images/logo.png" alt="logo mercury"></a></h1></a></h6>
                    <?}?>
                </div>
                <div class="box-menu hidden-xs col-sm-8 col-xs-8">
                    <ul>
                        <li><a <a <?if($act=='' || $act=='home') echo 'class="active"';?> href="<?=$domain?>" title="Trang Chủ">Trang Chủ</a></li>
                        <li><a <?if($act=='about') echo 'class="active"';?> href="<?=$domain?>gioi-thieu.html" title="Giới Thiệu">Giới Thiệu</a></li>
                        <li><a <?if($act=='project' || $act=='project_view') echo 'class="active"';?> href="<?=$domain?>danh-muc-phong/" title="Phòng Karaoke">Phòng Karaoke</a></li>
                        <li><a <?if($act=='su_kien' || $act=='su_kien_xem') echo 'class="active"';?> href="<?=$domain?>su-kien/" title="sự kiện">Sự kiện</a></li>
                        <li><a <?if($act=='tin_tuc' || $act=='tin_tuc_xem') echo 'class="active"';?> href="<?=$domain?>tin-tuc/" title="Tin Tức">Tin Tức</a></li>
                        <li><a <?if($act=='lien_he') echo 'class="active"';?> href="<?=$domain?>lien-he.html" title="Liên Hệ">Liên Hệ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>