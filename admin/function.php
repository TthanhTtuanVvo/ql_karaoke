<?
function check($str) {
	echo '<pre>';
	print_r($str);
	echo '</pre>';
	die();
}

function isAjaxRequest(){
	if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') 
		return true;
	return false;
}

function	toenlish ( $text )
{
	$UNI	= array ( "á","à","ả","ã","ạ","ắ","ằ","ẳ","ẵ","ặ","ấ","ầ","ẩ","ẫ","ậ","é","è","ẻ","ẽ","ẹ","ế","ề","ể","ễ","ệ","í","ì","ỉ","ĩ","ị","ó","ò","ỏ","õ","ọ","ố","ồ","ổ","ỗ","ộ","ớ","ờ","ở","ỡ","ợ","ú","ù","ủ","ũ","ụ","ứ","ừ","ử","ữ","ự","ý","ỳ","ỷ","ỹ","ỵ","Á","À","Ả","Ã","Ạ","Ắ","Ằ","Ẳ","Ẵ","Ặ","Ấ","Ầ","Ẩ","Ẫ","Ậ","É","È","Ẻ","Ẽ","Ẹ","Ế","Ề","Ể","Ễ","Ệ","Í","Ì","Ỉ","Ĩ","Ị","Ó","Ỏ","Õ","Ọ","Ố","Ồ","Ổ","Ỗ","Ộ","Ơ","Ớ","Ờ","Ở","Ỡ","Ợ","Ú","Ù","Ủ","Ũ","Ụ","Ứ","Ừ","Ử","Ữ","Ự","Ý","Ỳ","Ỷ","Ỹ","Ỵ","ă","â","ê","ô","ơ","ư","đ","Ă","Â","Ê","Ô","Ò","Ư","Đ");
	$TXT	= array ( "a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","e","e","e","e","e","e","e","e","e","e","i","i","i","i","i","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","u","u","u","u","u","u","u","u","u","u","y","y","y","y","y","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","E","E","E","E","E","E","E","E","E","E","I","I","I","I","I","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","U","U","U","U","U","U","U","U","U","U","Y","Y","Y","Y","Y","a","a","e","o","o","u","d","A","A","E","O","O","U","D");

	for ($i = 0; $i < count($UNI); $i++)
	{
		$text = str_replace($UNI[$i], $TXT[$i], $text);
	}
	return $text;
}
function	relink($txt)
{
	$text	=	toenlish($txt);
	$text	=	strtolower($text);
	$text	=	str_replace(" ","-",$text);
	$src	=	array ( "?", "." , "," , "\"", "'", ":", "%", "/", "&");
	for ($i = 0; $i < count($src); $i++)
		$text	=	str_replace($src[$i],"",$text);
    return $text;
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
function	get_user($id,$value)
{
	global $db;
	
	$r	=	$db->select("tgp_user","id = '".$id."'");
	while ($row = $db->fetch($r))
		return $row[$value];
}

function	kt_user_dung($txt_username)
{
	return (!ereg("(^[a-z]+([a-z\_0-9\-]*))$", $txt_username));
}

function	get_bien($id)
{
	global $db;
	
	$r	=	$db->select("tgp_bien","ten = '".$id."'");
	while ($row = $db->fetch($r))
		return $row["gia_tri"];
}

function	kt_email_dung($txt_email)
{
	return (!ereg("[A-Za-z0-9_-]+([\.]{1}[A-Za-z0-9_-]+)*@[A-Za-z0-9-]+([\.]{1}[A-Za-z0-9-]+)+", $txt_email));	
}
function	show_order($name,$sum,$pos,$width,$style=1)
{
?>
<select name="<?=$name?>" dir="rtl" size="1" class="inputbox input_sp" style="width:<?=$width?>;<?=$style==1?"font-weight:bold;color:red;text-align: center; margin: 2px 0px":""?>">
<?php
	for ($i = 1; $i <= $sum; $i++)
	{
		echo "<option value=".$i;
		if ($pos == $i) echo " selected ";
		echo ">".$i."</option>";
	}
?>
</select>
<?php
}
// admin_load
function	admin_load($thong_bao,$url)
{
?>
<center>
	<b><font size="2"><?=$thong_bao?></font></b>
	<br /><img vspace="3" src="images/83.gif" />
	<br>Xin đợi vài giây hoặc bấm <b><a href="<?=$url?>">vào đây</a></b> để tiếp tục...
</center>
<head>
	<meta http-equiv="Refresh" content="1; URL=<?=$url?>">
</head>
<?php
	die();
}

// resize hình ảnh bất kỳ
function img_resize($src,$dis,$par)
{
 	require_once('../lib/phpthumb/phpthumb.class.php');
 	$phpThumb = new phpThumb();
 	$phpThumb->src = $src;
		$r = explode("&",$par);
		for ($i = 0; $i <= count($r); $i++)
		{
			if ($r[$i] != "")
			{
				$q = explode("=",$r[$i]);
				if ($q[0] == 'h') 
					$phpThumb->h = $q[1];
				if ($q[0] == 'w') 
					$phpThumb->w = $q[1];
					
				if ($q[0] == 'zc')
				{
					$phpThumb->zc = $q[1];
				}
				
				if ($q[0] == 'fltr[]')
				{
					$phpThumb->fltr[] = $q[1];
				}
			}
		}
	$phpThumb->q = 100;
	$phpThumb->config_output_format = 'png';
	$phpThumb->config_error_die_on_error = true;
	if ($phpThumb->GenerateThumbnail())
	{
		$phpThumb->RenderToFile($dis);
  	}
  	else
	{
  	}
}
// resize hình ảnh bất kỳ
function img_png_resize($src,$dis,$par)
{
 	require_once('../lib/phpthumb/phpthumb.class.php');
 	$phpThumb = new phpThumb();
 	$phpThumb->src = $src;
		$r = explode("&",$par);
		for ($i = 0; $i <= count($r); $i++)
		{
			if ($r[$i] != "")
			{
				$q = explode("=",$r[$i]);
				if ($q[0] == 'h') 
					$phpThumb->h = $q[1];
				if ($q[0] == 'w') 
					$phpThumb->w = $q[1];
					
				if ($q[0] == 'zc')
				{
					$phpThumb->zc = $q[1];
				}
				
				if ($q[0] == 'fltr[]')
				{
					$phpThumb->fltr[] = $q[1];
				}
			}
		}
	$phpThumb->q = 100;
	$phpThumb->config_output_format = 'png';
	$phpThumb->config_error_die_on_error = true;
	if ($phpThumb->GenerateThumbnail())
	{
		$phpThumb->RenderToFile($dis);
  	}
  	else
	{
  	}
}
function magic_quote($str, $id_connect=false)	
{	
	if (is_array($str))
	{
		foreach($str as $key => $val)
		{
			$str[$key] = escape_str($val);
		}
		
		return $str;
	}
	
	if (is_numeric($str)) {
		return $str;
	}
	
	if(get_magic_quotes_gpc()){
		$str = stripslashes($str);
	}

	if (function_exists('mysql_real_escape_string') AND is_resource($id_connect))
	{
		return mysql_real_escape_string($str, $id_connect);
	}
	elseif (function_exists('mysql_escape_string'))
	{
		return @mysql_escape_string($str);
	}
	else
	{
		return addslashes($str);
	}
}
?>