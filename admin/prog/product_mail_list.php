<?php

    $id = $_POST['id'];
    $func = $_POST['func'];
    $tik = $_POST['tik'];
	if ($func == "del")
	{
		for ($i = 0; $i < count($tik); $i++)
		{
			$db->delete("tgp_product_email","id = '".$tik[$i]."'");
		}
		admin_load("Đã xóa dữ liệu thành công.","?act=product_mail_list");
		die();
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
			<h3 class="card-title">Danh sách đơn hàng</h3>
			<div class="table-responsive">
				<form action="?act=product_mail_list" method="post" id="frm_sanpham">
					<input type="hidden" name="func" value="del" />
					<input type="hidden" name="id" value="<?=$id?>" />
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align:center;">Tên khách</th>
								<th style="text-align:center;">Email</th>
								<th style="text-align:center;">Nội dung</th>
								<th style="text-align:center;">Xóa</br><input type="checkbox" id="chonhet"/></th>
							</tr>
						</thead>
						<tbody>
						<?php
							$q	=$db->select("tgp_product_email","","order by id desc");
							while ($r = $db->fetch($q))
							{
							?>
							<tr class="tb_content">
								<td style="text-align:center;"><?=$r["name"]?></td>
								<td style="text-align:center;"><?=$r["email"]?></td>
								<td  style="text-align:center;"><a class="a_ove_lh" href="?act=product_mail_listget&id=<?=$r["id"]?>" class="icon-form"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
								<td style="text-align:center;"><input name="tik[]" type="checkbox" value="<?=$r["id"]?>" /></td>
							</tr>
							<?
							}
							?>
						</tbody>
					</table>
					<button type="submit" name="xoa" class="btn btn-primary button_2"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
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