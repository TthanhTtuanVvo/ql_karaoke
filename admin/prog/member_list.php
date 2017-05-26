<?
    $func = $_POST['func'];
    if ($_POST["func"]=="del") $id = $_POST["id"]; else $id = $_GET['id'];
    $tik = $_POST['tik'];
	if ($func == "del")
	{
		for ($i = 0; $i < count($tik); $i++)
		{
			$db->delete("tgp_user","id = '".$tik[$i]."'");
		}
		admin_load("Đã xóa các Username đã chọn.","?act=member_list");
		die();
	}
?>
<div class="page-title">
	<div>
		<h1><i class="fa fa-dashboard"></i> Danh sách Thành viên</h1>
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
			<h3 class="card-title">Danh sách Thành viên</h3>
			<div class="table-responsive">
				<form action="?act=member_list" method="post" onsubmit="return confirm('Are you sure ?');">
					<input type="hidden" name="func" value="del" />
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align:center;">Thứ tự</th>
								<th style="text-align:center;">Tài khoản</th>
								<th style="text-align:center;">Họ tên</th>
								<th style="text-align:center;">Địa chỉ</th>
								<th style="text-align:center;">Số điện thoại</th>
								<th style="text-align:center;">Ngày khởi tạo</th>
								<th style="text-align:center;">Trạng thái</th>
								<th style="text-align:center;">Cấp độ</th>
								<th style="text-align:center;">Sửa</th>
								<th style="text-align:center;">Xóa</th>
							</tr>
						</thead>
						<tbody>
							<?
							$level_arr	=	array("Coder","Administrator","Moderator","Member");
							$count	=	0;
							if($_SESSION["level"]==1||$_SESSION["level"]==2||$_SESSION["level"]==3)
							{ 
							    $r		=	$db->select("tgp_user","level <> 0","order by username asc"); 
							} else  {
							    $r		=	$db->select("tgp_user","","order by username asc");
							}
							while ($row = $db->fetch($r))
							{
								$dem++;
							?>
							<tr>
								<td align="center"><?=$dem?></td>
								<td align="center"><?=$row["username"]?></td>
								<td><?=$row["ten"]?></td>
							    <td><?=$row["dia_chi"]?></td>
							    <td><?=$row["dien_thoai"]?></td>
								<td><?=lg_date::vn_time($row["time"])?></td>
								<td align="center"><?=$row["trang_thai"]==1?"<img src=\"images/true.png\" />":"<img src=\"images/false.png\" />"?></td>
								<td align="center"><?=$level_arr[$row["level"]]?></td>
								<td align="center">
							        <?if($_SESSION["level"]==1||$_SESSION["level"]==0){?>
							            <a href="?act=member_edit&id=<?=$row["id"]?>" class="icon-form"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>    
							        <?}?>
							    </td>
								<td align="center">
							        <?if($_SESSION["level"]==1||$_SESSION["level"]==0){?>
							            <input name="tik[]" type="checkbox" value="<?=$row["id"]?>" />    
							        <?}?>
							    </td>
							</tr>
							<?
							}
							?>
						</tbody>
					</table>
					<?if($_SESSION["level"]==1||$_SESSION["level"]==0){?>
					<a href="?act=member_new" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
					<button type="submit" name="xoa" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
					<?}?>
				</form>
			</div>
		</div>
	</div>
</div>