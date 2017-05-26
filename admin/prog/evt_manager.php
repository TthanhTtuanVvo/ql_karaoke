<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<div class="page-title">
	<div>
		<h1><i class="fa fa-dashboard"></i> Quản lý sự kiện</h1>
		<p></p>
	</div>
	<div>
	    <ul class="breadcrumb">
	    	<li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
	    	<li><a href="?act=cms_manager">Quản lý danh mục</a></li>
	    </ul>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h3 class="card-title">Quản lý nội dung chính</h3>
			<div class="table-responsive">
				<form action="<?=$url?>" enctype="multipart/form-data" method="GET">
				<input type="hidden" name="act" value="cms_manager" />
				<input type="hidden" name="func" value="sort" />
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th style="text-align:center;">Nhóm</th>
							<th style="text-align:center;">Tên mục</th>
							<th style="text-align:center;">Hiển thị</th>
							<th style="text-align:center;">Nổi bật</th>
							<th style="text-align:center;">Thêm bài viết</th>
							<th style="text-align:center;">Sửa</th>
							<th style="text-align:center;">Xem</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$r	=	$db->select("tgp_cat","_cms = 2","order by thu_tu asc");
							while ($row = $db->fetch($r))
							{
							?>
							  <tr class="tb_foot">
							    <td style="text-align:left;padding-left: 6%;"><b><?=$row["ten"]?></b></td>
							    <td><?=$row["chu_thich"]?></td>
								<td align="center">-</td>
								<td align="center">-</td>
							    <td align="center">-</td>
							    <td align="center">-</td>
							    <td align="center">-</td>
							  </tr>
							<?php
								$r2	=	$db->select("tgp_cms_menu","cat = '".$row["id"]."'","order by thu_tu asc");
								while ($row2 = $db->fetch($r2))
								{
							?>
							  <tr class="tb_content">
							    <td>&nbsp;</td>
							    <td style="text-align:left;"><img src="images/node.gif" align="absmiddle" /> <img src="images/lang_vn.gif" align="absmiddle" /> <a class="a_sp" href="?act=evt_list&id=<?=$row2["id"]?>"><?=$row2["ten"]?></a> <font size=1 color="#999999"><?=$row2["type"]==0?"1 column":($row2["type"]==1?"2 columns":"1 page")?></font></td>
							    <td align="center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row2['hien_thi']) ? 'checked' : ''?> class="switch-input" data-type="hien_thi" data-com="tgp_cms_menu" data-id="<?=$row2['id']?>"/></td>
								<td align="center"><input type="checkbox" <?=($row2['noi_bat']) ? 'checked' : ''?> class="switch-input" data-type="noi_bat" data-com="tgp_cms_menu" data-id="<?=$row2['id']?>"/></td>
							    <td align="center"><a href="?act=evt_new&txt_cat=<?=$row2["id"]?>" class="icon-form"><i class="fa fa-plus-square" aria-hidden="true"></i></a></td>
							    <td align="center"><a href="?act=evt_menu_edit&id=<?=$row2["id"]?>" class="icon-form"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
							    <td align="center"><a href="?act=evt_list&id=<?=$row2["id"]?>" class="icon-form"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
							  </tr>
							<?php
								}
							}
							?>
					</tbody>
				</form>
				</table>
				<!-- <a href="?act=cms_new" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a> -->
			</div>
		</div>
	</div>
</div>