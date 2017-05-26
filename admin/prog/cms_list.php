<?php
	//	Kiểm tra sự tồn tại của ID
    $func = $_POST['func'];
    if ($_POST["func"]=="del") $id = $_POST["id"]; else $id = $_GET['id'];
    $tik = $_POST['tik'];
    $page = $_GET['page'];
	$r	= $db->select("tgp_cms_menu","id = '".$id."'");
	if ($db->num_rows($r) == 0)
		admin_load("Không tồn tại Mục này.","?act=cms_list&id=".$id);
		
	if ($func == "del")
	{
		for ($i = 0; $i < count($tik); $i++)
		{
			$db->delete("tgp_cms","id = '".$tik[$i]."'");
		}
		admin_load("Đã xóa các Bài viết đã chọn.","?act=cms_list&id=".$id);
		die();
	}
	$cat_name = get_sql("select ten from tgp_cms_menu where id=".$id);
?>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý bài viết</h1>
    <p></p>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
      <li><a href="?act=cms_manager">Quản lý nội dung</a></li>
    </ul>
  </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h3 class="card-title">Quản lý bài viết <?=$cat_name?></h3>

			<div class="table-responsive">
				<form action="?act=cms_list&id=<?=$_GET['id']?>" id="frm_sanpham" enctype="multipart/form-data" method="post">


					<a href="?act=cms_new&txt_cat=<?=$id?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
					<button style="float:right;" type="submit" name="xoa" class="btn btn-primary button_2"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
						<p></p>
					<input type="hidden" name="func" value="del" />
					<input type="hidden" name="id" value="<?=$_GET['id']?>" />
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align:center;">STT</th>
								<th style="text-align:center;">Hình</th>
								<th style="text-align:center;">Tên</th>
								<th style="text-align:center;">Thứ tự</th>
								<th style="text-align:center;">Hiển thị</th>
								<th style="text-align:center;">Nổi bật</th>
								<th style="text-align:center;">Ngày tạo</th>
								<th style="text-align:center;">Sửa</th>
								<th style="text-align:center;">Xóa</br><input type="checkbox" id="chonhet"/></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$page		=	$page + 0;
								$perpage	=	20;
								$r_all		=	$db->select("tgp_cms","cat = '".$id."'");
								$sum		=	$db->num_rows($r_all);
								$pages		=	($sum-($sum%$perpage))/$perpage;
								if ($sum % $perpage <> 0 )	$pages = $pages+1;
								$page		=	($page==0)?1:(($page>$pages)?$pages:$page);
								$min 		= 	abs($page-1) * $perpage;
								$max 		= 	$perpage;

								$count	=	$min;
								$r		=	$db->select("tgp_cms","cat = '".$id."'","order by id desc, time desc limit $min, $max");
								while ($row = $db->fetch($r))
								{
									$count++;
							?>
							<tr class="tb_content">
								<td align="center"><?=$count?></td>
							    <td align="center"><?if($row['hinh']=="no"){
							        ?>
							        <img src="images/no.png" width="50px"/><br />
							        <?}else{?>
							        <img src="../uploads/cms/news_<?=$row['hinh']?>" width="40px" class="img-responsive"/>    
							        <?}
							        ?>
							    </td>
								<td style="text-align:left !important;"><a href="?act=cms_edit&id=<?=$row["id"]?>" style="text-decoration:none;"><?=$row["ten"]?></a></td>
								<td style="text-align:center;"><input type = "number" name="stt" data-id="<?=$row["id"];?>" value="<?=$row["thu_tu"];?>" style="width:50px;text-align: center;"/></td>
								<td align="center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row['hien_thi']) ? 'checked' : ''?> class="switch-input" data-type="hien_thi" data-com="tgp_cms" data-id="<?=$row['id']?>"/></td>
								<td align="center"><input type="checkbox" <?=($row['noi_bat']) ? 'checked' : ''?> class="switch-input" data-type="noi_bat" data-com="tgp_cms" data-id="<?=$row['id']?>"/></td>
								<td align="center"><?=date('d/m/Y',$row["time"])?></td>
								<td align="center"><a href="?act=cms_edit&id=<?=$row["id"]?>" class="icon-form"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
								<td align="center"><input name="tik[]" type="checkbox" value="<?=$row["id"]?>" /></td>
							</tr>
							<?
							}
							?>
						</tbody>
					</table>
					<div class="paging">
						<ul class="pagination pagination-md">
							<?php
					    		for($i=1;$i<=$pages;$i++) {
					    			if (($_GET['page'] == $i) ||(!isset($_GET['page']) && $i == 1))
					    				echo "<li class=\"active\"><a href='?act=cms_list&id=".$id."&page=$i'>".$i."</a></li>";
					    			else
					    				echo "<li><a href='?act=cms_list&id=".$id."&page=$i'>".$i."</a></li>";
								}
					    	?>
	                  </ul>
					</div>
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
		$("input[name='stt']").change(function(){
			var base_url = "<?=$domain?>";
			var value = $(this).val();
			var id = $(this).data("id");
			var com = "tgp_cms";
			var filed = "thu_tu";
			$.ajax({
				url:base_url+"admin/update_stt.php",
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