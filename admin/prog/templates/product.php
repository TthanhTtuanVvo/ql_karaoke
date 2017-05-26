<?
function	template_edit($url,$func,$id,$txt_cat,$txt_ten,$txt_hien_thi,$txt_thu_tu,$txt_url,$txt_hinh,$error)
{
?>
<?=$error!=""?"<div align=center style='color:#990000;'><strong>".$error."</strong></div>":""?>
<form name="frm_edit" id="frm_edit" action="<?=$url?>" enctype="multipart/form-data" method="post" style="margin:0px;" />
<input type="hidden" name="act" value="<?=str_replace("?act=","",$url)?>" />
<input type="hidden" name="txt_cat" value="<?=$txt_cat?>" />
<input type="hidden" name="id" value="<?=$id?>" />
<input type="hidden" name="func" value="<?=$func?>" />
	<table border="0" cellpadding="2" cellspacing="2" width="700">
	<tr>
		<td width="35%" align="right">Tên: </td>
		<td width="65%" align="left">
			<input type="text" name="txt_ten" value="<?=$txt_ten?>" class="inputbox input_sp" style="width:90%" />
		</td>
	</tr>
	<tr>
		<td align="right">Nhóm :</td>
		<td align="left">
			<? show_cat("txt_cat",$txt_cat); ?>
		</td>
	</tr>
    
    <!--<tr>
        <td width="35%" align="right">Hình ảnh (390x418): </td>
        <td width="65%" align="left">
            <input type="file" name="txt_hinh" class="inputbox" style="width:90%" />
        </td>
    </tr>-->
    <!--<tr>
        <td width="35%" align="right">Keyword: </td>
        <td width="65%" align="left">
            <input type="text" name="txt_url" value="<?=$txt_url?>" class="inputbox" style="width:90%" />
        </td>
    </tr>-->
    
	<tr>
		<td align="right">
			Hiển thị :
		</td>
		<td align="left">
			<input name="txt_hien_thi" type="radio" value="0" <?=$txt_hien_thi==0?"checked":""?> /> Tắt
			<input name="txt_hien_thi" type="radio" value="1" <?=$txt_hien_thi==1?"checked":""?> /> Mở *
		</td>
	</tr>
    <tr>
		<td width="35%" align="right">Thứ tự: </td>
		<td width="65%" align="left">
			<input type="text" name="txt_thu_tu" value="<?=$txt_thu_tu?>" class="inputbox input_sp" style="width:10%" />
		</td>
	</tr>
	<tr>
		<td colspan="2"></td>
	</tr>
	<tr>
		<td width="100%" colspan="2" align="center">
		<input name="submit" type="submit" class="button" style="width:20%;" value="Submit" />
		<input name="submit" type="reset" class="button" style="width:20%;" value="Làm lại" />
		<input type="button" value="Xem DS" class="button" style="width:20%;" onclick="Forward('?act=product_manager');">
		</td>
	</tr>
	</table>
</form>
<?
}
function	show_cat($name,$id)
{
	global $db;
	
$r2 = $db->select("tgp_cat","_product = 1","order by thu_tu asc");
?>
<select name="<?=$name?>" class="inputbox input_sp" style="width:50%;">
<?php
while ($row2 = $db->fetch($r2))
{
	echo "<optgroup label='".$row2["ten"]."'>";
	$r	=	$db->select("tgp_product_menu","cat = '".$row2["id"]."'","order by thu_tu asc");
	while ($row = $db->fetch($r))
	{
		echo "<option value='".$row["id"]."'";
		if ($id == $row["id"]) echo " selected ";
		echo ">".$row["ten"]."</option>";
	}
	echo "</optgroup>";
}
?>
</select>
<?php
}
?>