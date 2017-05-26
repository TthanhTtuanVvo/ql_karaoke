<div class="block-footer">
        <div class="container">
            <div class="row">
                <div class="copyright col-sm-6 col-xs-6">
                    <?=get_page('ban_quyen')?>
                </div>
                <div class="social col-sm-6 col-xs-6">
                    <a class="f-face" href="<?=get_bien('link_fb')?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a class="g-plus" href="<?=get_bien('link_g')?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                    <a class="y-play" href="<?=get_bien('link_y')?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <span id="top-link-block" class="hidden">
            <a href="#top" class="well well-sm"  onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
                <i class="fa fa-chevron-up" aria-hidden="true"></i>
            </a>
        </span><!-- /top-link-block -->
    </div>
</div>
    <script type="text/javascript" src="<?=$domain?>js/jquery.1.10.2.min.js"></script>
    <script type="text/javascript" src="<?=$domain?>js/bootstrap.js"></script>
    <script type="text/javascript" src="<?=$domain?>js/wow.min.js"></script>
    <script type="text/javascript" src="<?=$domain?>js/jquery.mmenu.min.all.js"></script>
    <script type="text/javascript" src="<?=$domain?>js/jquery.nicescroll.min.js"></script>
    <script src="<?=$domain?>source/jquery.fancybox.js" charset="utf-8"></script>  
    <script type="text/javascript" src="<?=$domain?>js/slick.js"></script>
    <script type="text/javascript"> //mmenu
    $(document).ready(function() {
        $('nav#menu').mmenu({
            "offCanvas": {
                "position": "right" //Right on left
            }
        });
    });
    </script>
    <script type="text/javascript">
        new WOW().init();
    </script>
    <script type="text/javascript"> // Slick-box-sp
    $('.slick-event').slick({
        dots: true,
        infinite: true,
        speed: 400,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });
    </script>
    <script type="text/javascript"> //Scroll animate
        $(window).load(function() { 
            $("html").niceScroll({
                cursorcolor: "#cba135",
                cursorwidth: "8px",
                scrollspeed: 100,
            });
        });
    </script>
    <script type="text/javascript"> //Back to top
        if ( ($(window).height() + 100) < $(document).height() ) {
            $('#top-link-block').removeClass('hidden').affix({
                // how far to scroll down before link "slides" into view
                offset: {top:100}
            });
        }
    </script>
    <script language='JavaScript' type='text/javascript'>
        function refreshCaptcha()
        {
            var img = document.images['captchaimg'];
            img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
        }
    </script>
    <script type="text/javascript">
     $(window).load(function() {
       $(".fancybox").fancybox({ 
        openEffect: "none",
        closeEffect: "none",
        //  minWidth  : 800,
        // minHeight : 456,
        //  minWidth  : "60%", 
        // minHeight : "40%", 
        maxWidth: "100%",
        maxHeight: "100%",
    });
       });
    </script>
</body>

</html>