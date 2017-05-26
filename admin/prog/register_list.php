<?php

    $id = $_POST['id'];
    $func = $_POST['func'];
    $tik = $_POST['tik'];
	if ($func == "del")
	{
		for ($i = 0; $i < count($tik); $i++)
		{
			$db->query("update tbl_subscribers set active = 0 ,deleted_time='".time()."' where id = '".$tik[$i]."'");
		}
		admin_load("Đã xóa dữ liệu thành công.","?act=register_list");
	}
?>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý Emai đăng ký khách hàng</h1>
    <p></p>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
    </ul>
  </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h3 class="card-title">Danh sách Email đăng ký khách hàng</h3>
			<div class="table-responsive">
				<form action="?act=register_list" method="post" id="frm_sanpham">
					<input type="hidden" name="func" value="del" />
					<input type="hidden" name="id" value="<?=$id?>" />
					<button style="float: right;" type="submit" name="xoa" class="btn btn-primary button_2"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
					<p style="clear:both;">&nbsp;</p>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align:center;">Email</th>
								<th style="text-align:center;">Thời gian</th>
								<th style="text-align:center;">Xóa</br><input 
								type="checkbox" id="chonhet"/></th>
							</tr>
						</thead>
						<tbody>
						<?php
							$q	=$db->select("tbl_subscribers","active= 1 ","order by id");
							while ($r = $db->fetch($q))
							{
							?>
							<tr class="tb_content">
								<td style="text-align:center;"><?=$r["email"]?></td>
								<td style="text-align:center;"><?=date('d/m/Y - g:i s A',$r["time"])?></td>
								<td style="text-align:center;"><input name="tik[]" type="checkbox" value="<?=$r["id"]?>" /></td>
							</tr>
							<?
							}
							?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$().ready(function(){
		$("#chonhet").click(function(){
			var status=this.checked;
			$("input[name='tik[]']").each(function(){this.checked=status;})
		});

		$(".button_2").click(function(){
			var listid="";
			$("input[name='tik[]']").each(function(){
				if (this.checked) listid = listid+","+this.value;
		    	})
			listid=listid.substr(1);
			if (listid=="") { 
				alert("Bạn chưa chọn mục nào"); 
				return false;
			}
			hoi = confirm("Bạn có chắc chắn muốn xóa?");
			if (hoi == true)
				$("#frm_sanpham").submit();
			return false;
		})
	})
</script>