<?
$id = $_GET['id'];
$tenmien = get_sql("select ten from tgp_product_menu where id=".$id);
?>
<font size="2" face="Tahoma">
<b>
<a href="?act=product_manager">Quản lý </a> <img src="images/bl3.gif" border="0" /> <?=$tenmien?> <img src="images/bl3.gif" border="0" /> 
</b>
</font>
<hr size="1" color="#cadadd" />
<div class="function">
	<a href="?act=product_new&txt_cat=<?=$id?>"><img src="images/add_new.gif" align="absmiddle" border="0" /></a> <a href="?act=product_new&txt_cat=<?=$id?>">Thêm mới</a>
</div>
<?php
	//	Kiểm tra sự tồn tại của ID
	$id = $_GET['id'];
    $c_id = $_GET['c_id'];
    $page = $_GET['page'];
    $func = $_POST['func'];
    if ($_POST["func"]=="del") $id = $_POST["id"]; else $id = $_GET['id'];
    $tik = $_POST['tik'];
	$r	= $db->select("tgp_product_menu","id = '".$id."'");
	//if ($db->num_rows($r) == 0)
	//	admin_load("Không tồn tại Mục này.","?act=product_manager");

	if ($func == "del")
	{
		for ($i = 0; $i < count($tik); $i++)
		{
			$db->delete("tgp_product","id = '".$tik[$i]."'");
		}
		admin_load("Đã xóa các mục đã chọn.","?act=product_list&id=".$id);
		die();
	}
?>
<center>
<form action="?act=product_list" method="post" onsubmit="return confirm('Bạn có chắc chắn không ?');">
<input type="hidden" name="func" value="del" />
<input type="hidden" name="id" value="<?=$id?>" />
<table class="tb_table" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr class="tb_head">
	<td>STT</td>
    <!--<td>Hình ảnh</td>-->
	<td>Loại </td>
	<td>Danh mục </td>
	<td>Hiển thị</td>
    <td>Thứ tự</td>
	<td>Chỉnh sửa</td>
	<td>Xóa</td>
</tr>
<?php
$page		=	$page + 0;
$perpage	=	20;
$r_all		=	$db->select("tgp_product","cat = '".$id."'");
$sum		=	$db->num_rows($r_all);
$pages		=	($sum-($sum%$perpage))/$perpage;
if ($sum % $perpage <> 0 )	$pages = $pages+1;
$page		=	($page==0)?1:(($page>$pages)?$pages:$page);
$min 		= 	abs($page-1) * $perpage;
$max 		= 	$perpage;

$count	=	$min;
$r		=	$db->select("tgp_product","cat = '".$id."'","order by id asc limit $min, $max");
while ($row = $db->fetch($r))
{
	$count++;
?>
<tr class="tb_content">
	<td><?=$count?></td>
    <td class="tooltip_box_" style="display: none;"><img src="../uploads/product_gal/gal_<?=$row['hinh']?>" width="30px"/>
        <span class="tooltip_"><?=$row["url"]?></span>
    </td>
	<td><a class="a_sp" href="?act=sanpham_list&h_id=<?=$row["id"]?>"><?=$row["ten"]?></a></td>
	<td><a href="?act=sanpham_list&h_id=<?=$row["id"]?>"><img src="images/go_right.gif" border="0" /></a></td>
	<td><?=$row["hien_thi"]==1?"<img src=\"images/true.gif\" />":"<img src=\"images/false.gif\" />"?></td>
    <td style="color: #f00;"><?=$row["thu_tu"]?></td>
	<td><a href="?act=product_edit&id=<?=$row["id"]?>">Sửa</a></td>
	<td><input name="tik[]" type="checkbox" value="<?=$row["id"]?>" /></td>
</tr>
<?
}
?>
<tr class="tb_foot">
	<td colspan="6" style="text-align:left;">
		<strong>Trang : </strong>
		<?php
			if ($pages==0) echo ":1:";
    		for($i=1;$i<=$pages;$i++) {
    			if ($i==$page) echo "<b>[".$i."]</b>";
    			else {
					echo "<a href='?act=product_list&id=".$id."&page=$i'>-$i-</a>";
				}
			}
    	?>
	</td>
	<td style="text-align:center; background: #F2F5F7;padding: 4px"><input type="submit" value="Xóa" class="button_2 nut_button" style="width:80%;" /></td>
</tr>
</table>
</table>
</form>
</center>
<div class="function">
	<a href="?act=product_new&txt_cat=<?=$id?>"><img src="images/add_new.gif" align="absmiddle" border="0" /></a> <a href="?act=product_new&txt_cat=<?=$id?>">Thêm mới</a>
</div>