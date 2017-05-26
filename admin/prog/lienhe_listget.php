<font size="2" face="Tahoma"><b>Thông tin<img src="images/bl3.gif" border="0" /> <a href="?act=lienhe_list"> Liên hệ </a> </b></font>
<hr size="1" color="#cadadd" />
<center>
<table class="tb_table" border="0" cellpadding="0" cellspacing="0" width="60%">
<?php
    global $id;
    $id = $_GET['id'];
    $q	=$db->select("lienhe","id='".$id."'","");
    $r = $db->fetch($q);
?>
<tr>
	<td width="65%" align="left">
		<div style="padding: 10px;">
            <p class="p_p"><strong>Tên</strong>: <span style="display: inline-block;"><?=$r['ten']?></span></p>
            <p class="p_p"><strong>Email</strong>: <?=$r['email']?></p>
            <p class="p_p"><strong>Nội dung</strong></p>       
            <?=$r['noi_dung']?>
        </div>
	</td>
</tr>
</table>
</center>

<style>
.p_p{padding: 0 0 10px 0}
.p_p strong{display: inline-block;width: 100px;}
.p_p span{font-weight: bold;font-size: 16px;}
</style>