<b>Quản lý hỗ trợ online</b>
<hr size="1" color="#cadadd" />
<div class="function">
	<a href="?act=support_new"><img src="images/add_new.gif" align="absmiddle" border="0" /></a> <a href="?act=support_new">Thêm hỗ trợ</a>
</div>
<center>
<?php

    $id = $_POST['id'];
    $func = $_POST['func'];
    $tik = $_POST['tik'];
	if ($func == "del")
	{
		for ($i = 0; $i < count($tik); $i++)
		{
			$db->delete("tgp_support","id = '".$tik[$i]."'");
		}
		admin_load("Đã xóa các Trang thông tin đã chọn.","?act=support_list");
		die();
	}
?>
<form action="?act=support_list" method="post" onsubmit="return confirm('Bạn có chắc chắn không ?');">
<input type="hidden" name="func" value="del" />
<input type="hidden" name="id" value="<?=$id?>" />
<table class="tb_table" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr class="tb_head">
	<td>STT</td>
	<td style="text-align: left;">Name</td>
    <td>Tel</td>
    <td>Skype</td>
    <td>Hiển thị</td>
	<td>Chỉnh sửa</td>
	<td>Xóa</td>
</tr>
<?php
$r		=	$db->select("tgp_support","","order by id desc");
while ($row = $db->fetch($r))
{
	$count++;
?>
<tr class="tb_content">
	<td><?=$count?></td>
	<td class="bold" style="text-align: left;"><a class="a_sp" href="?act=support_edit&id=<?=$row["id"]?>"><?=$row["tieude"]?></a></td>
    <td><?=$row["tel"]?></td>
    <td><?=$row["skype"]?></td>
	<td><?=$row["hien_thi"]==1?"<img src=\"images/true.gif\" />":"<img src=\"images/false.gif\" />"?></td>
    <td><a href="?act=support_edit&id=<?=$row["id"]?>">Sửa</a></td>
	<td><input class="nut_ch" name="tik[]" type="checkbox" value="<?=$row["id"]?>" /></td>
</tr>
<?
}
?>
<tr class="tb_foot">
	<td colspan="6" style="text-align:left;">&nbsp;</td>
	<td><input type="submit" value="Xóa" class="button_2 nut_button" style="width:80%;" /></td>
</tr>
</table>
</table>
</form>
</center>
<div class="function">
	<a href="?act=support_new"><img src="images/add_new.gif" align="absmiddle" border="0" /></a> <a href="?act=support_new">Thêm hỗ trợ</a>
</div>