<h1 style="display: none;">Liên hệ - Mercury</h1>
<?
    $txtEmail = $_POST['txtEmail'];
    $txtName = $_POST['txtName'];   
    $txtSubject = $_POST['txtSubject'];
    $txtContent = $_POST['txtContent']; 
    $txtTel = $_POST['txtTel'];
    $txtAddress = $_POST['txtAddress'];
    $txtCompany = $_POST['txtCompany'];
    $baomat=$_POST['6_letters_code'];
    $func = $_POST['func'];
    $mail1=get_bien("email");
?>
<?
if (!empty($func)) 
{
    if (empty($txtEmail)) $txtEmail = $_POST['txtEmail'];
    if (empty($txtName)) $txtName = $_POST['txtName'];  
    if (empty($txtSubject)) $txtSubject = $_POST['txtSubject'];
    if (empty($txtContent)) $txtContent = $_POST['txtContent']; 
    if (empty($txtTel)) $txtTel = $_POST['txtTel'];
    if (empty($txtAddress)) $txtAddress = $_POST['txtAddress'];
    if (empty($txtCompany)) $txtCompany = $_POST['txtCompany'];
    if (empty($func)) $func = $_POST['func'];
    if ($func=='guiemail') 
    { 
        $CHECK = TRUE;
        if (empty($txtName)){
            $CHECK=FALSE;
            $thongbaoloi = "Bạn chưa nhập tên";
        }
        else if (!ereg("[A-Za-z0-9_-]+([\.]{1}[A-Za-z0-9_-]+)*@[A-Za-z0-9-]+([\.]{1}[A-Za-z0-9-]+)+", $txtEmail)) {
            $CHECK=FALSE;
            $thongbaoloi = "Email của bạn không đúng!";
        }
        else if (empty($txtTel))
        {
            $CHECK=FALSE;
            $thongbaoloi = 'Vui lòng nhập SĐT';
        }
        else if (empty($txtContent)){
            $CHECK=FALSE;
            $thongbaoloi = "Bạn chưa nhập nội dung\n";
        }
        else if(empty($_SESSION['letters_code'] ) ||
            strcasecmp($_SESSION['letters_code'], $baomat) != 0)
        {
        //Note: the captcha code is compared case insensitively.
        //if you want case sensitive match, update the check above to
        // strcmp()
        $CHECK=FALSE;
        $thongbaoloi = "The captcha code does not match!";
        }
        $cartContent1 .= "<br /> <b>THÔNG TIN  KHÁCH HÀNG:</b><br />". 
            (($txtName)?"Họ tên : ".$txtName."<br />":"").
            (($txtAddress)?"Địa chỉ : ".$txtAddress."<br />":"").
            (($txtTel)?"Số điện thoại : ".$txtTel."<br />":"").
            (($txtEmail)?"Email : ".$txtEmail."<br />":"").
            (($txtContent)?"Ghi chú : ".$txtContent."<br /><br /><br />":"").
            '<div style="color: #7e7e7e; font-size: 12px; text-align: left; font-weight: normal; line-height: 19px;" >Truy cập vào <a target="_blank" href="'.$domain.'"> '.$domain.' </a> để biết thêm về sản phẩm - dịch vụ. Xin cảm ơn.! <br/>Hotline: <b>  '.get_page("hotline","chu_thich").' </b>Email: <b> '.get_page("email","chu_thich").' </b> <br/> Bạn cũng có thể đến trực tiếp theo địa chỉ: <b> '.get_page("address","chu_thich").' </b> </div>';
        //Nội dung liên hệ về email
        if ($CHECK){
            
            
            $OK = $db->insert("lienhe","ten,email,dia_chi,tieu_de,noi_dung,phone,company_name,hien_thi,thoi_gian_nhan","'".$txtName."','".$txtEmail."','".$txtAddress."','".$txtSubject."','".$txtContent."','".$txtTel."','".$txtCompany."',1,'".time()."'");
            if($OK) $thongbaoloi = "Gởi thành công. <br/> Cám ơn bạn! .<br/>";
            if ($OK == true) $thongbaoloi = "<b>Thư của bạn đã được gởi đi<br/> Cảm ơn bạn đã liên hệ với chúng tôi </b>";
          else $thongbaoloi = "Không thể gởi đi thư liên hệ của bạn vì có một số lỗi hệ thống từ phía máy chủ.<br/> Bạn vui lòng thử lại";
           if($OK)
           {    
              include_once "./mail/class.phpmailer.php";
              include_once "./mail/class.smtp.php";
                $mail = new PHPMailer();
                $mail->IsSMTP(); // set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com'; // specify main and backup server
                $mail->Port = '465'; // set the port to use
                $mail->SMTPAuth = true; // turn on SMTP authentication
                $mail->SMTPSecure = 'ssl';
                $mail->Username = "noreply.emailcontact@gmail.com"; // your SMTP username or your gmail username
                $mail->Password = "emailcontact@123"; // your SMTP password or your gmail password
                
                $emailFrom = get_bien("title")."<".$txtEmail.">";
                
                //$from = "tinhve.dev2@gmail.com"; // Reply to this email
                $to="$mail1"; // Recipients email ID
                $name=get_bien("title"); // Recipient's name
                $mail->From = $txtEmail;
                $mail->FromName = get_bien("title"); // Name to indicate where the email came from when the recepient received
                
                $mail->AddAddress($to,$name);                  // name is optional
                
                //$mail->AddAddress($to,$name);
                $mail->AddReplyTo($txtEmail,"Khách hàng");
                $mail->WordWrap = 50; // set word wrap
                $mail->IsHTML(true); // guiemail as HTML
                $mail->Subject = "Email từ khách - ".$txtTel;
                $mail->Body = $cartContent1;
                $mail->AltBody = "Mail nay duoc gui bang PHP Mailer - tinhve.vn"; //Text Body
                //$mail->SMTPDebug = 2;
                
                if($mail->Send())
                { 
                  $thongbaoloi = "Gởi thành công. <br/> Cám ơn bạn! .<br/>";
                }
                else
                {
                    $thongbaoloi = "Không thể chấp nhận yêu cầu của bạn vì có một số lỗi hệ thống từ phía máy chủ.<br/> Bạn vui lòng thử lại lần sau.";
                }
            }
            else
            {
                $thongbaoloi = "Có lỗi";
            }
            // check email về địa chỉ Email
        }
    }
}
?>
<div class="block-main">
        <div class="block-contacts container">
            <div class="row">
                <div class="box-contacts-maps col-sm-12 wow slideInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                    <h3>Bản đồ</h3>
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
                    </body><!-- /map-contact -->
                </div>
                <div class="box-contacts-information col-sm-12">
                    <?=get_page('lien_he')?>
                </div>
                <div class="box-mail-contacts col-sm-12 wow slideInRight" data-wow-duration="1s" data-wow-delay=".2s">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="slogan_contact">Hãy liên hệ với chúng tôi!</h3>
                        </div>
                        <div class="block_form_contact">
                          <p class="form_notify"><?=!empty($thongbaoloi)?$thongbaoloi:""?></p>
                            <form action="" method="post" class="form_contact">
                                
                                    <input class="form-control" type="hidden" name="func" value="guiemail" />
                                
                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">Họ & tên</label>
                                    <input type="text" class="form-control" name="txtName" value="<?=$txtName?>" placeholder="Họ tên">
                                </div><!-- end control -->
                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" name="txtEmail" value="<?=$txtEmail?>" placeholder="Email">
                                </div><!-- end control -->
                                <div class="form-group col-sm-12">
                                    <label for="exampleInputEmail1">Điện thoại</label>
                                    <input type="text" class="form-control" name="txtTel" value="<?=$txtTel?>" placeholder="Điện thoại">
                                </div><!-- end control -->
                                <div class="form-group col-sm-12">
                                    <label for="exampleInputEmail1">Nội dung</label>
                                    <textarea class="form-control" name="txtContent" value="<?=$txtContent?>" rows="4" ></textarea>
                                </div><!-- end control -->
                                <div class="form-group box_captcha col-sm-12">
                                    <label for="exampleInputEmail1">Xác thực</label></br>
                                    <span class="ma_captcha"><img style="" src="<?=$domain?>captcha_code_file.php?rand=<?php echo rand(); ?>" id="captchaimg"></span>
                                    <small>Nhấn <a style="color: #fd0a43;" href="javascript: refreshCaptcha();">vào đây</a> để làm mới hình ảnh</small>
                                    <input id="captcha" placeholder="Gõ lại như hình trên" class="input_captcha form-control" name="6_letters_code" type="text">
                                </div><!-- end control -->
                                <div class="form-group col-sm-12">
                                    <button id="guiemail" value="guiemail" class="btn btn-primary">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>