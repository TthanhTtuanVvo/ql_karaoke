<?php
function check($str) {
	echo '<pre>';
	print_r($str);
	echo '</pre>';
	die();
}
function	redirect($thong_bao,$url)
{
?>
<center><br><br><br>
	<b><font size="2"><?=$thong_bao?></font></b>
	<br>Xin đợi vài giây hoặc bấm <b><a href="<?=$url?>">vào đây</a></b> để trở về trang chủ...
</center>
<head>
	<meta http-equiv="Refresh" content="3; URL=<?=$url?>">
</head>
<?php
	die();
}


function showPageNavigation($currentPage, $maxPage, $path = '') {
	if ($maxPage <= 1)
	{
		return;
	}
	
	
	//$suffix = '/tinhve.html';
    $suffix = '/';
	
	$nav = array(
		// bao nhiêu trang bên trái currentPage
		'left'	=>	3,
		// bao nhiêu trang bên phải currentPage
		'right'	=>	3,
	);
	
	// nếu maxPage < currentPage thì cho currentPage = maxPage
	if ($maxPage < $currentPage) {
		$currentPage = $maxPage;
	}
	
	// số trang hiển thị
	$max = $nav['left'] + $nav['right'];
	
	// phân tích cách hiển thị
	if ($max >= $maxPage) {
		$start = 1;
		$end = $maxPage;
	}
	elseif ($currentPage - $nav['left'] <= 0) {
		$start = 1;
		$end = $max + 1;
	}
	elseif (($right = $maxPage - ($currentPage + $nav['right'])) <= 0) {
		$start = $maxPage - $max;
		$end = $maxPage;
	}
	else {
		$start = $currentPage - $nav['left'];
		if ($start == 2) {
			$start = 1;
		}
		
		$end = $start + $max;
		if ($end == $maxPage - 1) {
			++$end;
		}
	}
	
	$navig = '<div class="block-showpage"><span class="showpage_label">Trang <b>'.$currentPage.'</b> trên <b>'.$maxPage.'</b></span>';
	if ($currentPage >= 2) {
		if ($currentPage >= $nav['left']) {
			if ($currentPage - $nav['left'] > 2 && $max < $maxPage) {
				// thêm nút "First"
				$navig .= '<span class="page_item"><a href="'.$path.'1'.$suffix.'">1</a></span>';
				$navig .= '<span class="current_page_item"><b>...</b></span>';
			}
		}
		// thêm nút "«"
		$navig .= '<span class="page_item"><a href="'.$path.($currentPage - 1).$suffix.'">«</a></span>';
	}

	for ($i=$start;$i<=$end;$i++) {
		// trang hiện tại
		if ($i == $currentPage) {
			$navig .= '<span class="current_page_item">'.$i.'</span>';
		}
		// trang khác
		else {
			$pg_link = $path.$i;
			$navig .= '<span class="page_item"><a href="'.$pg_link.$suffix.'">'.$i.'</a></span>';
		}
	}
	
	if ($currentPage <= $maxPage - 1) {
		// thêm nút "»"
		$navig .= '<span class="page_item"><a href="'.$path.($currentPage + 1).$suffix.'">»</a></span>';
		
		if ($currentPage + $nav['right'] < $maxPage - 1 && $max + 1 < $maxPage) {
			// thêm nút "Last"
			$navig .= '<span class="current_page_item">...</span>';
			$navig .= '<span class="page_item"><a href="'.$path.$maxPage.$suffix.'">'.$maxPage.'</a></span>';
		}
	}
	$navig .= '</div>';
	
	// hiển thị kết quả
	echo $navig;
}
function get_sql($sql)
{
	global $db;
	$get_sql_query_statement = $db->query($sql);
	if ($result_get_sql_query = $db->fetch($get_sql_query_statement))
	{
		return $result_get_sql_query[0];
	}
	else
	{
		return "SQL_NULL";
	}
}

function	get_page($alias,$col = "noi_dung")
{
	global $db , $_fix;
	
	$alias = $db->escape($alias);
	
	$db->query("UPDATE tgp_page SET luot_xem = luot_xem + 1 WHERE alias = '".$alias."'");
	$r	=	$db->select("tgp_page","alias = '".$alias."'");
	while ($row = $db->fetch($r))
	{
		return $row[$col];
	}
	
	return "Unknown alias '".$alias."'";
}
function	get_bien($id)
{
	global $db;
	
	$r	=	$db->select("tgp_bien","ten = '".$id."'");
	while ($row = $db->fetch($r))
		return $row["gia_tri"];
}
function gui_date($nguoigoi,$nguoinhan,$tieude,$noidung)
{
	global $conf;
	
	if (ereg("(.*)<(.*)>", $nguoigoi, $regs)) {
	   $nguoigoi = '=?UTF-8?B?'.base64_encode($regs[1]).'?=<'.$regs[2].'>';
	}
	
	$header = "From: ".$nguoigoi."\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-Type: text/html; charset=UTF-8\r\n";
	$noidung =	str_replace("\n"	, "<br>"	, $noidung);
	$noidung =	str_replace("  "	, "&nbsp; "	, $noidung);
	$noidung =	str_replace("<script>","&lt;script&gt;", $noidung);

	//$noidung =  $noidung;
	
	
	return (@date($nguoinhan, $tieude, $noidung, $header));
			
}

function	get_author()
{
	global $db, $act, $id;
	$txt	=	get_bien("meta_author");	
	return $txt;
}
function	get_copyright()
{
	global $db, $act, $id;
	$txt	=	get_bien("meta_copyright");	
	return $txt;
}
function	get_facebook()
{
	global $db, $act, $id;
	$txt	=	get_bien("link_fb");	
	return $txt;
}
function	get_toado()
{
	global $db, $act, $id;
	$txt	=	get_bien("toado");	
	return $txt;
}
function	get_gg_analytics()
{
	global $db, $act, $id;
	$txt	=	get_bien("gganalytics");	
	return $txt;
}
function	get_vchat()
{
	global $db, $act, $id;
	$txt	=	get_bien("vchat");	
	return $txt;
}

function	get_title()
{
	global $db,$id,$act,$pid;
	switch ($act) 
	{
		case 'about':
			$txt = get_page('gioi_thieu','ten');
			break;
		case 'lien_he':
			$txt = get_page('lien_he','ten');
			break;
		case 'linh_vuc':
			$txt = get_page('hoat_dong','ten');
			break;
		case 'tuyen_dung':
			$txt = get_page('tuyen_dung','ten');
			break;
		case 'project_list':
			$rs = $db->select("tgp_product_menu","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_title']<>''){$txt=$row['seo_title'];}else{$txt=$row['ten'];}
			break;
		case 'project_view':
			$rs = $db->select("tgp_product_menu","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_title']<>''){$txt=$row['seo_title'];}else{$txt=$row['ten'];}
			break;
		case 'project':
			$txt = " Danh mục phòng - Karaoke Mercury";
			break;
		case 'tin_tuc':
			$txt = "Tin tức - Karaoke Mercury";
			break;
		case 'su_kien':
			$txt = "Sự Kiện - Karaoke Mercury";
			break;	
		case 'tin_tuc_xem':
			$rs = $db->select("tgp_cms","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_title']<>''){$txt=$row['seo_title'];}else{$txt=$row['ten'];}
			break;
		case 'su_kien_xem':
			$rs = $db->select("tgp_cms","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_title']<>''){$txt=$row['seo_title'];}else{$txt=$row['ten'];}
			break;
		case 'dich_vu_xem':
			$rs = $db->select("tgp_cms","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_title']<>''){$txt=$row['seo_title'];}else{$txt=$row['ten'];}
			break;
		default:
			$txt = get_bien("title");
			break;
	}

	return $txt;
}


function	get_description()
{
	global $db,$id,$act,$pid;

	switch ($act) 
	{
		case 'about':
			if(get_page('gioi_thieu','chu_thich')<>'')
			{
				$txt = get_page('gioi_thieu','chu_thich');
			}
			else
			{
				$txt = get_bien('meta_description');
			}
			break;
		case 'linh_vuc':
			if(get_page('hoat_dong','chu_thich')<>'')
			{
				$txt = get_page('gioi_thieu','chu_thich');
			}
			else
			{
				$txt = get_bien('meta_description');
			}
			break;
		case 'lien_he':
			if(get_page('lien_he','chu_thich')<>'')
			{
				$txt = get_page('lien_he','chu_thich');
			}
			else
			{
				$txt = get_bien('meta_description');
			}
			break;
		case 'tuyen_dung':
			if(get_page('tuyen_dung','chu_thich')<>'')
			{
				$txt = get_page('lien_he','chu_thich');
			}
			else
			{
				$txt = get_bien('meta_description');
			}
			break;
		case 'project':
			$txt = get_bien('meta_description');
			break;
		case 'tin_tuc_xem':
			$rs = $db->select("tgp_cms","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_description']<>''){$txt=$row['seo_description'];}else{$txt = get_bien('meta_description');}
			break;
		case 'su_kien_xem':
			$rs = $db->select("tgp_cms","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_description']<>''){$txt=$row['seo_description'];}else{$txt = get_bien('meta_description');}
			break;
		case 'phong_thuy_xem':
			$rs = $db->select("tgp_cms","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_description']<>''){$txt=$row['seo_description'];}elseif($txt=$row['chu_thich']){$txt=$row['chu_thich'];}else{$txt = get_bien('meta_description');}
			break;
		case 'dich_vu_xem':
			$rs = $db->select("tgp_cms","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_description']<>''){$txt=$row['seo_description'];}else{$txt = get_bien('meta_description');}
			break;
		case 'project_list':
			$rs = $db->select("tgp_product_menu","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_description']<>''){$txt=$row['seo_description'];}else{$txt = get_bien('meta_description');}
			break;
		case 'project_view':
			$rs = $db->select("tgp_product_menu","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_description']<>'')
				{
					$txt=$row['seo_description'];
				}
			else{$txt = get_bien('meta_description');}
			break;
		case 'product_view':
			$rs = $db->select("vatlieu","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_description']<>''){$txt=$row['seo_description'];}else{$txt = get_bien('meta_description');}
			break;
		default:
			$txt = get_bien("meta_description");
			break;
	}

	return $txt;
}

function	get_keywords()
{
	global $db,$id,$act,$pid;

	switch ($act) 
	{
		case 'tin_tuc_xem':
			$rs = $db->select("tgp_cms","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_keyword']<>''){$txt=$row['seo_keyword'];}else{$txt = get_bien("meta_keywords");}
			break;
		case 'su_kien_xem':
			$rs = $db->select("tgp_cms","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_keyword']<>''){$txt=$row['seo_keyword'];}else{$txt = get_bien("meta_keywords");}
			break;
		case 'phong_thuy_xem':
			$rs = $db->select("tgp_cms","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_keyword']<>''){$txt=$row['seo_keyword'];}else{$txt=$row['ten'];}
			break;
		case 'dich_vu_xem':
			$rs = $db->select("tgp_cms","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_keyword']<>''){$txt=$row['seo_keyword'];}else{$txt=$row['ten'];}
			break;
		case 'product_view':
			$rs = $db->select("vatlieu","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_keyword']<>''){$txt=$row['seo_keyword'];}else{$txt = get_bien("meta_keywords");}
			break;
		case 'project_list':
			$rs = $db->select("tgp_product_menu","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_keyword']<>''){$txt=$row['seo_keyword'];}else{$txt = get_bien("meta_keywords");}
			break;
		case 'project_view':
			$rs = $db->select("tgp_product_menu","id='".$pid."'","");
			$row = $db->fetch($rs);
			if($row['seo_keyword']<>''){$txt=$row['seo_keyword'];}else{$txt = get_bien("meta_keywords");}
			break;
		default:
			$txt = get_bien("meta_keywords");
			break;
	}

	return $txt;
}


function hashString($string)
{
	return md5('qweasdzxc'.$string);
}

function numberFormatVN($number)
{
	return number_format($number, 0, ',', '.');
}

function getCurrentPageURL() {
    $pageURL = 'http';
    if (@$_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
	$pageURL = explode("&p=", $pageURL);
    return $pageURL[0];
}

function count_online(){
	global $db;
	$time = 600; // 10 phut
	$ssid = session_id();
	date_default_timezone_set("Asia/Bangkok");
	// xoa het han
	$sql = "delete from tgp_online where time<".(time()-$time);
	$db->query($sql);
	//
	$sql = "select id,session_id from tgp_online order by id desc";
	$q = $db->query($sql);
	$result['dangxem'] = $db->num_rows($q);
	$rows = $db->result_array($q);
	$i = 0;
	while(($rows[$i]['session_id'] != $ssid) && $i++<$result['dangxem']);
	if($i<$result['dangxem']){
		$sql = "update tgp_online set time='".time()."' where session_id='".$ssid."'";
		$db->query($sql);
		$result['daxem'] = $rows[0]['id'];
	}
	else{
		$sql = "insert into tgp_online (session_id, time) values ('".$ssid."', '".time()."')";
		$db->query($sql);
		$result['daxem'] = mysql_insert_id();
		$result['dangxem']++;
	}
	
	$is_add = 0;
	$q = $db->query("select * from tgp_counter where st_ip='".$_SERVER['REMOTE_ADDR']."' and st_week = '".date("W")."' and st_day = '".date("d")."' order by st_time desc");
	if($db->num_rows($q) == 0){
			$is_add = 1;
	}else{
		$rs = $db->fetch_array($q);
		if($rs['st_time']+300 < time()){
			$is_add = 1;
		}
	}
	if($is_add){
		$sql = "insert into tgp_counter(st_time,st_week,st_month,st_day,st_year,st_ip,st_url) value(".time().",".date("W").",".date("m").",".date("d").",".date("Y").",'".$_SERVER['REMOTE_ADDR']."','".getCurrentPageURL()."')";
		$db->query($sql);
	}	

		$sql = "select * from tgp_counter where st_year = '".date("Y")."' and st_month = '".((date("m")))."' and   st_day = '".(date("d")-1)."'";
		
		$q0 = $db->query($sql);
		$statistics['yesterday'] = $db->num_rows($q0);
		
		$sql = "select * from tgp_counter where st_year = '".date("Y")."' and st_month = '".((date("m")))."' and   st_day = '".date("d")."'";
		
		$q1 = $db->query($sql);
		$statistics['today'] = $db->num_rows($q1);
		
		
		
		$sql = "select * from tgp_counter where st_year = '".date("Y")."' and st_month = '".date("m")."' and st_week = '".date("W")."'";
		
		$q2 = $db->query($sql);
		$statistics['week'] = $db->num_rows($q2);
		$sql = "select * from tgp_counter where st_year = '".date("Y")."' and st_week = '".(date("W")-1)."'";
		$q3 = $db->query($sql);
		
		$statistics['last_week'] = $db->num_rows($q3);
		$sql = "select * from tgp_counter where st_year = '".date("Y")."' and st_month = '".date("m")."'";
		$q4 = $db->query($sql);
		$statistics['month'] = $db->num_rows($q4);
		$sql = "select * from tgp_counter where st_year = '".date("Y")."' and st_month = '".(date("m")-1)."'";
		
		$q5 = $db->query($sql);
		$statistics['last_month'] = $db->num_rows($q5);
		
		$sql = $sql = "select * from tgp_counter";
		$q6 = $db->query($sql);
		$statistics['all'] = $db->num_rows($q6);
		
		$result['advance'] = $statistics;
		
	
	return $result; // array('dangxem'=>'', 'daxem'=>'')
}

function transfer($msg,$page="index.php")
{	
	global $domain;
	 $showtext = $msg;
	 $page_transfer = $page;
	 include("z_modules/transfer_tpl.php");
	 exit();
}

function getYoutubeIdFromUrl($url) {
    $parts = parse_url($url);
    if(isset($parts['query'])){
        parse_str($parts['query'], $qs);
        if(isset($qs['v'])){
            return $qs['v'];
        }else if($qs['vi']){
            return $qs['vi'];
        }
    }
    if(isset($parts['path'])){
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path)-1];
    }
    return false;
}
?>

