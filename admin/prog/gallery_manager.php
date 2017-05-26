<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý hình ảnh</h1>
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
	$func = $_GET['func'];
    $delete = $_GET['delete'];
	if ($delete != 0)
	{
		$db->delete("tgp_gallery","cat = '".$delete."'");
		$db->delete("tgp_gallery_menu","id = '".$delete."'");
		admin_load("Removed successfully.","?act=gallery_manager");
	}
	if ($func == "sort")
	{
		$r	=	$db->select("tgp_cat");
		while ($row = $db->fetch($r))
		{
			$id = $row["id"];
			$db->update("tgp_cat","thu_tu",$order_[$id],"id = '".$id."'");
		}
		$r	=	$db->select("tgp_gallery_menu");
		while ($row = $db->fetch($r))
		{
			$id = $row["id"];
			$db->update("tgp_gallery_menu","thu_tu",$order__[$id],"id = '".$id."'");
		}
		admin_load("Successfully arranged.","?act=gallery_manager");
	}
?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h3 class="card-title">Quản lý hình ảnh</h3>
			<div class="table-responsive">
				<form action="?act=gallery_manager" method="get">
					<input type="hidden" name="act" value="gallery_manager" />
					<input type="hidden" name="func" value="sort" />
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align:center;">Nhóm</th>
								<th style="text-align:center;">Tên mục</th>
								<!-- <th style="text-align:center;">Hiển thị</th> -->
								<th style="text-align:center;">Thêm hình</th>
								<th style="text-align:center;">Sửa</th>
								<th style="text-align:center;">Xem</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$r	=	$db->select("tgp_cat","_gallery = 1","order by thu_tu asc");
							while ($row = $db->fetch($r))
							{
							?>
							  <tr class="tb_foot">
							    <td style="text-align:right;"><b><?=$row["ten"]?></b></td>
							    <td>&nbsp;</td>
								<td>-</td>
							    <td><a href="?act=gallery_menu_new&txt_cat=<?=$row["id"]?>"><?if($row['id']=='album'){?><img src="images/i_add.gif" border="0" /><?}?></a></td>
							    <!-- <td>-</td> -->
							    <td>-</td>
							  </tr>
							<?php
								$r2	=	$db->select("tgp_gallery_menu","cat = '".$row["id"]."'","order by id desc");
								while ($row2 = $db->fetch($r2))
								{
							?>
							  <tr class="tb_content">
							    <td>&nbsp;</td>
							    <td class="gal_re" style="text-align:left;"><img src="images/node.gif" align="absmiddle" /> <img src="images/lang_vn.gif" align="absmiddle" /> <a class="" href="?act=gallery_list&id=<?=$row2["id"]?>"><?=$row2["ten"]?></a>
							    
							    </td>
								<!-- <td align="center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row2['hien_thi']) ? 'checked' : ''?> class="switch-input" data-type="hien_thi" data-com="tgp_gallery_menu" data-id="<?=$row2['id']?>"/></td> -->
							    <td style="text-align:center"><a href="?act=gallery_new&txt_cat=<?=$row2["id"]?>"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm hình</a></td>
							    <td align="center"><a href="?act=gallery_menu_edit&id=<?=$row2["id"]?>" class="icon-form"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
							    <td align="center"><a href="?act=gallery_list&id=<?=$row2["id"]?>" class="icon-form"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
							  </tr>
							<?php
								}
							}
							?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>