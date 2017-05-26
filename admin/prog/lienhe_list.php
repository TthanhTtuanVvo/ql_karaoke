<font size="2" face="Tahoma"><b>Thư liên hệ từ khách hàng <img src="images/bl3.gif" border="0" /> </b></font>
<hr size="1" color="#cadadd" />
<center>
<?php

    $id = $_POST['id'];
    $func = $_POST['func'];
    $tik = $_POST['tik'];
	if ($func == "del")
	{
		for ($i = 0; $i < count($tik); $i++)
		{
			$db->delete("lienhe","id = '".$tik[$i]."'");
		}
		admin_load("Đã xóa dữ liệu thành công.","?act=lienhe_list");
		die();
	}
?>
<form action="?act=lienhe_list" method="post" onsubmit="return confirm('Bạn có muốn xóa ?');">
<input type="hidden" name="func" value="del" />
<input type="hidden" name="id" value="<?=$id?>" />
<table class="tb_table" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr class="tb_head">
	<td>Tên khách</td>
	<td>Email</td>
	<td>Nội dung</td>
	<td>Xóa</td>
</tr>
<?php
$q	=$db->select("lienhe","","order by id desc");
while ($r = $db->fetch($q))
{
?>
<tr class="tb_content">
	<td style="font-weight: bold;"><?=$r["ten"]?></td>
	<td><?=$r["email"]?></td>
	<td style="width: 100px;position: relative;"><a class="a_ove_lh" href="?act=lienhe_listget&id=<?=$r["id"]?>"><?=lg_string::crop($r['noi_dung'],20)?></a>    
    </td>
	<td><input name="tik[]" type="checkbox" value="<?=$r["id"]?>" /></td>
</tr>
<?
}
?>
<tr class="tb_foot">
	<td colspan="3" style="text-align:left;">&nbsp;</td>
	<td><input type="submit" value="Xóa" class="button_2 nut_button" style="width:80%;" /></td>
</tr>
</table>
</table>
</form>
</center>
<style>
.tr_padding td{padding-bottom: 8px;}
.a_ove_lh{display: block;overflow: hidden;padding: 0 54px 0 0;text-decoration: none;text-overflow: ellipsis;white-space: nowrap;width: 100px;}
.a_ove_lh:after{display: inline-block;content: '.. Chi tiết';padding: 0 0 0 10px; position: absolute;right: 0px;}
.a_ove_lh:hover:after{content: '.. Xem';}
</style>