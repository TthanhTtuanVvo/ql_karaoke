<?php
    $act = $_GET['act'];
    $func = $_GET['func'];
    $delete = $_GET['delete'];
    $id = $_GET['id'];
    $order_ = $_GET['order_'];
    $order__ = $_GET['order__'];
    $tik = $_GET['tik'];
	if ($delete != 0)
	{
		$db->delete("tgp_product","cat = '".$delete."'");
		$db->delete("tgp_product_menu","id = '".$delete."'");
		admin_load("Đã xóa thành công.","?act=product_manager");
	}
	if ($func == "sort")
	{
		$r	=	$db->select("tgp_cat");
		while ($row = $db->fetch($r))
		{
			$id = $row["id"];
			$db->update("tgp_cat","thu_tu",$order_[$id],"id = '".$id."'");
		}
		$r	=	$db->select("tgp_product_menu");
		while ($row = $db->fetch($r))
		{
			$id = $row["id"];
			$db->update("tgp_product_menu","thu_tu",$order__[$id],"id = '".$id."'");
		}
		admin_load("Đã sắp xếp thành công.","?act=product_manager");
	}
	if ($func == "del")
	{
		for ($i = 0; $i < count($tik); $i++)
		{
			$db->delete("tgp_product_menu","id = '".$tik[$i]."'");
		}
		admin_load("Đã xóa các danh mục đã chọn.","?act=product_manager");
		die();
	}
?>
<div class="page-title">
	<div>
		<h1><i class="fa fa-dashboard"></i> Quản lý danh mục phòng</h1>
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
			<h3 class="card-title">Danh sách danh mục phòng</h3>
			<div class="table-responsive">
				<form action="<?=$url?>" enctype="multipart/form-data" method="GET" id="frm_product_menu">
					<input type="hidden" name="act" value="product_manager" />
					<input type="hidden" name="func" value="del" />

					<a href="?act=product_menu_new&txt_cat=0" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
					<button style="float:right;" type="submit" name="xoa" class="btn btn-primary button_2"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>

					<p></p>

					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align:center;">Tên</th>
								<!-- <th style="text-align:center;">Thêm mục con</th> -->
								<th style="text-align:center;">Thứ tự</th>
								<th style="text-align:center;">Hiển thị</th>
								<th style="text-align:center;">Nổi bật</th>
								<th style="text-align:center;">Sửa</th>
								<th style="text-align:center;">Xóa </br><input type="checkbox" id="chonhet"/></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$r2	=	$db->select("tgp_product_menu","cat = '0'","order by thu_tu asc,id limit 150");
								while ($row2 = $db->fetch($r2))
								{
								?>
								  <tr class="tb_content">
								    <td style="text-align:left; padding-left:50px"><img src="images/node.gif" align="absmiddle" /> <img src="images/lang_vn.gif" align="absmiddle" /> <a class="a_sp" href="?act=sanpham_list&id=<?=$row2["id"]?>"><?=$row2["ten"]?></a> <font size=1 color="#999999"><?=$row2["type"]==0?"1 column":($row2["type"]==1?"2 columns":"1 page")?></font></td>
								    <!-- <td><a href="?act=product_menu_new&txt_cat=<?=$row2['id']?>" class="btn btn-success"> Thêm mới</a></td> -->
								    <td style="text-align:center;"><input type = "number" name="stt" data-id="<?=$row2["id"];?>" value="<?=$row2["thu_tu"];?>" style="width:50px;text-align: center;"/></td>
									<td align="center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row2['hien_thi']) ? 'checked' : ''?> class="switch-input" data-type="hien_thi" data-com="tgp_product_menu" data-id="<?=$row2['id']?>"/></td>
									<td align="center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row2['noi_bat']) ? 'checked' : ''?> class="switch-input" data-type="noi_bat" data-com="tgp_product_menu" data-id="<?=$row2['id']?>"/></td>
								    <td align="center"><a href="?act=product_menu_edit&id=<?=$row2["id"]?>" class="icon-form"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
								    <td align="center"><input name="tik[]" type="checkbox" value="<?=$row2["id"]?>" /></td>
								  </tr>
								  <?php
									$rs3	=	$db->select("tgp_product_menu","cat = '".$row2['id']."'","order by thu_tu asc, id limit 50");
									while ($row3 = $db->fetch($rs3))
									{
									?>
									  <tr class="tb_content">
									    <td style="text-align:left; padding-left:50px"> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<img src="images/node.gif" align="absmiddle" /> <a class="a_sp" href="?act=sanpham_list&id=<?=$row3["id"]?>"><?=$row3["ten"]?></a> <font size=1 color="#999999"><?=$row3["type"]==0?"1 column":($row3["type"]==1?"2 columns":"1 page")?></font></td>
									    <td>---</td>
									    <td style="text-align:center;"><input type = "number" name="stt" data-id="<?=$row3["id"];?>" value="<?=$row3["thu_tu"];?>" style="width:50px;text-align: center;"/></td>
										<td align="center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row3['hien_thi']) ? 'checked' : ''?> class="switch-input" data-type="hien_thi" data-com="tgp_product_menu" data-id="<?=$row3['id']?>"/></td>
										<td align="center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row3['noi_bat']) ? 'checked' : ''?> class="switch-input" data-type="noi_bat" data-com="tgp_product_menu" data-id="<?=$row3['id']?>"/></td>
									    <td align="center"><a href="?act=product_menu_edit&id=<?=$row3["id"]?>" class="icon-form"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
									    <td align="center"><input name="tik[]" type="checkbox" value="<?=$row3["id"]?>" /></td>
									  </tr>
								  <?
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
				$("#frm_product_menu").submit();
			return false;
		})
		$("input[name='stt']").change(function(){
			var base_url = "<?=$domain?>";
			var value = $(this).val();
			var id = $(this).data("id");
			var com = "tgp_product_menu";
			var filed = "thu_tu";
			$.ajax({
				url:base_url+"/admin/update_stt.php",
				data:{id:id,value:value,com:com,filed:filed},
				type:"POST",
				success:function(data) {
					if(!data){
						alert("Đã có lỗi xảy ra !!!");//alert("Đã cập nhật số thứ tự thành công!!!");
					}/* else {
						alert("Đã có lỗi xảy ra !!!");
					}*/
				}
			})
		})
	})
</script>