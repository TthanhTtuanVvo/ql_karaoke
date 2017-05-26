<?php

    $id = $_POST['id'];
    $func = $_POST['func'];
    $tik = $_POST['tik'];
	if ($func == "del")
	{
		for ($i = 0; $i < count($tik); $i++)
		{
			$db->query("update lienhe set hien_thi=0,deleted_time='".time()."' where id = '".$tik[$i]."'");
		}
		admin_load("Đã xóa dữ liệu thành công.","?act=contact_list");
	}
?>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý đơn hàng</h1>
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
			<h3 class="card-title">Danh sách Thư khách hàng</h3>
			<div class="table-responsive">
				<form action="?act=contact_list" method="post" id="frm_sanpham">
					<input type="hidden" name="func" value="del" />
					<input type="hidden" name="id" value="<?=$id?>" />
					<button style="float: right;" type="submit" name="xoa" class="btn btn-primary button_2"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
					<p style="clear:both;">&nbsp;</p>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align:center;">Tên khách</th>
								<th style="text-align:center;">SĐT</th>
								<th style="text-align:center;">Email</th>
								<!-- <th style="text-align:center;">Tiêu đề</th> -->
								<th style="text-align:center;">Nội dung</th>
								<th style="text-align:center;">Thời gian</th>
								<th style="text-align:center;">Xóa</br><input 
								type="checkbox" id="chonhet"/></th>
							</tr>
						</thead>
						<tbody>
						<?php
							$q	=$db->select("lienhe","hien_thi=1","order by id desc");
							while ($r = $db->fetch($q))
							{
							?>
							<tr class="tb_content">
								<td style="text-align:center;"><?=$r["ten"]?></td>
								<td style="text-align:center;"><?=$r["phone"]?></td>
								<td style="text-align:center;"><?=$r["email"]?></td>
								<!-- <td style="text-align:center;"><?=$r["address"]?></td> -->
								<td style="text-align:center;"><?=$r["noi_dung"]?></td>
								<td style="text-align:center;"><?=date("d/m/Y - H\h:i\'",$r["thoi_gian_nhan"])?></td>
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