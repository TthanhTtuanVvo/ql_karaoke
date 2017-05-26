<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý gallery</h1>
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
	$r	= $db->select("tgp_gallery_menu","id = '".$id."'");
	if ($db->num_rows($r) == 0)
		admin_load("This section does not exist.","?act=gallery_manager");

	if ($func == "del")
	{
		for ($i = 0; $i < count($tik); $i++)
		{
			$db->delete("tgp_gallery","id = '".$tik[$i]."'");
		}
		admin_load("The article has deleted the selected.","?act=gallery_list&id=".$id);
		die();
	}
?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h3 class="card-title">Quản lý nội dung chính</h3>
			<div class="table-responsive">
				<form action="?act=gallery_list" method="post" id="frm_gallery">
					<input type="hidden" name="func" value="del" />
					<input type="hidden" name="id" value="<?=$id?>" />

					<a href="?act=gallery_new&txt_cat=<?=$id?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
					<button style="float: right;" type="submit" name="xoa" class="btn btn-primary button_2"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
					<p></p>
					<table class="table table-striped table-bordered">
						<thead>
							<th style="text-align:center">Stt</th>
						    <th style="text-align:center">Hình ảnh</th>
							<th style="text-align:center">Tên</th>
							<th style="text-align:center">Hiển thị</th>
							<th style="text-align:center">Ngày đăng</th>
							<th style="text-align:center">User</th>
							<th style="text-align:center">Chỉnh sửa</th>
							<th style="text-align:center">Xóa</br><input type="checkbox" id="chonhet"/></th>
						</thead>
						<tbody>
							<?php
							$page		=	$page + 0;
							$perpage	=	30;
							$r_all		=	$db->select("tgp_gallery","cat = '".$id."'");
							$sum		=	$db->num_rows($r_all);
							$pages		=	($sum-($sum%$perpage))/$perpage;
							if ($sum % $perpage <> 0 )	$pages = $pages+1;
							$page		=	($page==0)?1:(($page>$pages)?$pages:$page);
							$min 		= 	abs($page-1) * $perpage;
							$max 		= 	$perpage;

							$count	=	$min;
							$r		=	$db->select("tgp_gallery","cat = '".$id."'","order by id desc limit $min, $max");
							while ($row = $db->fetch($r))
							{
								$count++;
							?>
							<tr class="tb_content">
								<td align="center"><?=$count?></td>
								<td align="center"><img src="../uploads/gal/<?=$row['hinh']?>" width="50px" /></td>
								<td class="bold"><a href="?act=gallery_edit&id=<?=$row["id"]?>"><?=$row["ten"]?></a></td>
								<td align="center"><input type="checkbox" <?=($row['hien_thi']) ? 'checked' : ''?> class="switch-input" data-type="hien_thi" data-com="tgp_gallery" data-id="<?=$row['id']?>"/></td>
								<td align="center"><?=lg_date::vn_time($row["time"])?></td>
								<td align="center"><?=get_user($row["user"],"username")?></td>
								<td align="center"><a href="?act=gallery_edit&id=<?=$row["id"]?>" class="icon-form"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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
				$("#frm_gallery").submit();
			return false;
		})
	})
</script>