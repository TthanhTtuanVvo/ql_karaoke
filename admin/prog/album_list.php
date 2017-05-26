<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý Album</h1>
    <p></p>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
      <li><a href="?act=home">Home</a></li>
    </ul>
  </div>
</div>
<?php
	//	Kiểm tra sự tồn tại của ID
    $page = $_GET['page'];
    $func = $_POST['func'];
    if ($_POST["func"]=="del") $id = $_POST["id"]; else $id = $_GET['id'];
	$tik = $_POST['tik'];

	$r	= $db->select("sanpham","id = '".$id."'");
	if ($db->num_rows($r) == 0)
		admin_load("This record does not exist.","?act=sanpham_list");

	if ($func == "del")
	{
		for ($i = 0; $i < count($tik); $i++)
		{
			$db->delete("tbl_album","id = '".$tik[$i]."'");
		}
		admin_load("The image has deleted.","?act=album_list&id=".$id);
		die();
	}
?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<?
			$rs_project = $db->select("sanpham","id='".$id."'");
			$row_project = $db->fetch($rs_project);
			?>
			<h3 class="card-title">Quản lý album dự án "<?=$row_project['ten']?>"</h3>
			<div class="table-responsive">
				<form action="?act=album_list&id=<?=$id?>" method="post" id="frm_album">
					<input type="hidden" name="func" value="del" />
					<input type="hidden" name="id" value="<?=$id?>" />

					<a href="?act=album_new&txt_cat=<?=$id?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>Thêm mới</a>
					<button style="float: right;" type="submit" name="xoa" class="btn btn-primary button_2"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
					<p></p>
					<table class="table table-striped table-bordered">
						<thead>
							<th style="text-align:center">Stt</th>
						    <th style="text-align:center">Hình ảnh</th>
							<th style="text-align:center">Tên</th>
							<th style="text-align:center">Hiển thị</th>
							<th style="text-align:center">Chỉnh sửa</th>
							<th style="text-align:center">Xóa</br><input type="checkbox" id="chonhet"/></th>
						</thead>
						<tbody>
							<?php
							$r=$db->select("tbl_album","cat = '".$id."'","order by id desc limit 100");
							while ($row = $db->fetch($r))
							{
								$count++;
							?>
							<tr class="tb_content">
								<td align="center"><?=$count?></td>
								<td align="center"><img src="../uploads/album/<?=$row['hinh']?>" width="100" /></td>
								<td class="bold"><a href="?act=album_edit&id=<?=$row["id"]?>"><?=$row["ten"]?></a></td>
								<td align="center"><input type="checkbox" <?=($row['hien_thi']) ? 'checked' : ''?> class="switch-input" data-type="hien_thi" data-com="tbl_album" data-id="<?=$row['id']?>"/></td>
								<td align="center"><a href="?act=album_edit&id=<?=$row["id"]?>&txt_cat=<?=$id?>" class="icon-form"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
								<td align="center"><input name="tik[]" type="checkbox" value="<?=$row["id"]?>" /></td>
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
				$("#frm_album").submit();
			return false;
		})
	})
</script>