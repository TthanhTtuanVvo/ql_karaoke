<?php
    $menu[0]	=	"Danh mục";
    $name[0][0]	=	"Quản lý nội dung";         $link[0][0] =	"?act=cms_manager";
    $name[0][1] =   "Hình ảnh";                 $link[0][1] =   "?act=gallery_manager";
    $name[0][2] =   "Thông tin website";        $link[0][2] =   "?act=page_list";
    $name[0][3] =   "Cấu hình hệ thống";        $link[0][3] =   "?act=other";
    $name[0][4] =   "Hỗ trợ trực tuyến";        $link[0][4] =   "?act=support_list";
    $menu[1]    =   "Sản phẩm";
    $name[1][0] =   "Quản lý danh mục";         $link[1][0] =    "?act=product_manager";
    $name[1][1] =   "Quản lý sản phẩm";         $link[1][1] =    "?act=sanpham_list";
    $name[1][2] =   "Quản lý phụ kiện";         $link[1][2] =    "?act=phukien_list";
?>

<?  $level_arr	=	array("Coder","Administrator","Moderator","Member"); ?>
<div id="fw_menu">
	<ul id="menu_1">
		<li class="<?=($act=='home')?'active':''?>" onclick="Forward('?act=home');">Trang chủ</li>
		<?
		for ($i = 0; $i < count($menu); $i++)
		{
		echo "<li>".$menu[$i];
    		echo "<ul>";
    			for ($j = 0; $j < count($name[$i]); $j++)
    			{
    				echo "<li onclick=\"Forward('".$link[$i][$j]."');\">".$name[$i][$j]."</li>";
    			}
    		echo "</ul>";
		echo "</li>";
		}
		?>
        <!-- <li onclick="Forward('?act=product_manager');">Sản phẩm</li> -->
        <!-- <li onclick="Forward('?act=lienhe_list');">Email liên hệ</li> -->
        <?
		//for ($i = 0; $i < count($menu2); $i++)
		//{
		//echo "<li>".$menu2[$i];
		// "<ul>";
		//	for ($j = 0; $j < count($name2[$i]); $j++)
		//	{
		//		echo "<li onclick=\"Forward('".$link2[$i][$j]."');\">".$name2[$i][$j]."</li>";
		//	}
		//echo "</ul>";
		//echo "</li>";
		//}
		//?>
        <!--<li onclick="Forward('?act=other');">Cấu hình hệ thống</li>-->
        <?
        if($_SESSION["level"]==0||$_SESSION["level"]==1)
        {
            ?> <li onclick="Forward('?act=member_list');">Thành viên</li> <?
        }
        ?>
	</ul>
	<a class="home" href="<?=$domain?>" target="_blank">Về trang chủ website</a>
    <div id="tool">
        <form action="<?=$url?>" enctype="multipart/form-data" method="GET" style="margin:0px;" />
            <input type="hidden" name="logout" value="OK" />
            <input name="submit" type="submit" class="button2" value="Logout" />
            <!--
            <a href="" onclick="Forward('?logout=OK');"><img border="0" src="images/logout.png" /></a>
            -->
        </form>
	</div>
</div>
<div id="fw_menu_2">
    <div style="float: left; padding-left: 20px;">
        <a class="go_back" href="javascript:history.go(-1)"> Quay lại</a>
        Hôm nay: <?=date('d/m/Y - g:i s A');?> | Đã có
        <b>
        <?php
            $gia_tri = 0;
            $r = $db->select("tgp_online_daily","");
            while ($row = $db->fetch($r))
            $gia_tri += $row["bo_dem"];
            echo $gia_tri;
        ?></b> số lượt truy cập website | Hiện có: <b>
        <?
            $r = mysql_query("SELECT * FROM tgp_online");
            $gia_tri = mysql_num_rows($r);
            echo '0'.$gia_tri;
        ?> </b> người online
    </div>
   Chào  <b><?=$_SESSION["username"]?></b> - Cấp độ: <b><?=$level_arr[$_SESSION["level"]]?></b> - <a href="?act=member_edit&id=<?=$_SESSION["id"]?>">Thông tin cá nhân</a>
</div>