<?php

    $id = $_POST['id'];
    $func = $_POST['func'];
    $tik = $_POST['tik'];
	if ($func == "del")
	{
		for ($i = 0; $i < count($tik); $i++)
		{
			$db->delete("tgp_page","id = '".$tik[$i]."'");
		}
		admin_load("Đã xóa dữ liệu thành công.","?act=page_list");
		die();
	}
?>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý bài viết</h1>
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
			<h3 class="card-title">Quản lý bài viết</h3>
			<div class="table-responsive">
				<form action="?act=page_list" method="post" id="frm-pagelist">
					<input type="hidden" name="func" value="del" />
					<input type="hidden" name="id" value="<?=$id?>" />
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align:center;">Thứ tự</th>
								<th style="text-align:center;">Tên mục</th>
								<th style="text-align:center;">Alias</th>
								<th style="text-align:center;">Lượt xem</th>
								<th style="text-align:center;">Ngày cập nhật</th>
								<th style="text-align:center;">Người đăng</th>
								<th style="text-align:center;">Sửa</th>
								<th style="text-align:center;">Xóa</br><input type="checkbox" id="chonhet"/></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$r		=	$db->select("tgp_page","","order by alias");
							while ($row = $db->fetch($r))
							{
								$count++;
							?>
							<tr class="tb_content">
								<td align="center"><?=$count?></td>
								<td align="left" style="text-align: left;"><?=$row["ten"]?><br /><span style="color: #c1c1c1;"><?=$row["ten_en"]?></span></td>
								<td><?=$row["alias"]?></td>
								<td style="text-align:center;"><?=$row["luot_xem"]?> views</td>
								<td><?=lg_date::vn_time($row["time"])?></td>
								<td><?=get_user($row["user"],"username")?></td>
								<td align="center"><a href="?act=page_edit&id=<?=$row["id"]?>" class="icon-form"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
								<td align="center"><input name="tik[]" type="checkbox" value="<?=$row["id"]?>" /></td>
							</tr>
							<?
							}
							?>
						</tbody>
					</table>
					<a href="?act=page_new" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
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
				$("#frm-pagelist").submit();
			return false;
		})
	})
</script>