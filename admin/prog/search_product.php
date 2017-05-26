
<?php
    if(isset($_GET["id"])){$id = htmlspecialchars($_GET['id']);}else{$id='';}
    $s_key = $_GET['search_key'];
    $page = $_GET['page'];
    $func = $_POST['func'];

    $tik = $_POST['tik'];

	if ($func == "del")
	{
		for ($i = 0; $i < count($tik); $i++)
		{
			$db->delete("sanpham","id = '".$tik[$i]."'");
		}
		admin_load("Đã xóa các Bài viết đã chọn.","?act=sanpham_list&h_id=".$_POST["id"]);
		die();
	}

?>
<script type="text/javascript">
	function change_item(){
		var a=document.getElementById("danhmuc");
		window.location ="?act=sanpham_list&id="+a.value;	
		return true;
	}
</script>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Kết quả tìm kiếm</h1>
    <p></p>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
      <li><a href="?act=sanpham_list">Danh sách sản phẩm</a></li>
    </ul>
  </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="table-responsive">
				<form action="?act=sanpham_list" method="post" id="frm_sanpham">
					<input type="hidden" name="func" value="del" />
					<input type="hidden" name="id" value="<?=$id?>" />
					<? {?>
					<a href="?act=sanpham_new&txt_cat=<?=$id?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
					<button style="float: right;" type="submit" name="xoa" class="btn btn-primary button_2"><i class="fa fa-trash" aria-hidden="true"></i>Xóa</button>
					<p></p>
					<?}?>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align:center;">Thứ tự</th>
								<th style="text-align:center;">Danh mục</th>
								<th style="text-align:center;">Tên</th>
								<th style="text-align:center;">Hình</th>
								<th style="text-align:center;">Xem trước</th>
								<th style="text-align:center;">Hiển thị</th>
								<th style="text-align:center;">Nổi bật</th>
								<th style="text-align:center;">Sửa</th>
								<th style="text-align:center;">Xóa</br><input type="checkbox" id="chonhet"/></th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$page		=	$page + 0;
								$perpage	=	20;
								$r_all		=	$db->select("sanpham","ten like '%$s_key%' or ma_sanpham like '%$s_key%' or seo_keyword like '%$s_key%'");
								
								$sum		=	$db->num_rows($r_all);
								$pages		=	($sum-($sum%$perpage))/$perpage;
								if ($sum % $perpage <> 0 )	$pages = $pages+1;
								$page		=	($page==0)?1:(($page>$pages)?$pages:$page);
								$min 		= 	abs($page-1) * $perpage;
								$max 		= 	$perpage;

								$count	=	$min;
								$r = $db->select("sanpham","ten like '%$s_key%' or ma_sanpham like '%$s_key%' or seo_keyword like '%$s_key%'","order by time desc, id desc limit $min, $max");
								
								while ($row = $db->fetch($r))
								{
									$catname = get_sql("select ten from tgp_product_menu where id = '".$row['cat']."'");
									if($row['brand']=='0'){$brandname='Chưa xác định';}
									else
									{
									$brandname = get_sql("select name from tbl_brand where id = '".$row['brand']."'");
									}
									$count++;
								?>
								<tr class="tb_content">
									<td align="center"><?=$count?></td>
								    <td style="font-weight: bold; text-align: center;"><?=$catname?></td>
								    <td style="font-weight: bold; text-align: left;"><a style="text-decoration:none" href="?act=sanpham_edit&id=<?=$row["id"]?>&id_cat=<?=$row['h_id']?>"><?=$row["ten"]?></a>
								    <small>
								    <br/>Giá: <span style="font-weight: bold;color: #c00;"><?=number_format($row['gia'])?>đ</span> 
								    <br/>Hãng: <?=$brandname?>
								    <br/>Mã sản phẩm: <?=$row["ma_sanpham"]?>
								    <br/>Đóng gói: <?=$row["dong_goi"]?>							</td>
								    </small>
								    
								    <td><img src="../uploads/product/sp_<?=$row['hinh']?>" width="40"/></td>
								    
								  	<td><a href="<?=$domain?>san-pham/<?=$row['id']?>-<?=lg_string::get_link($row['ten'])?>.html" target="_blank">[Xem]</a></td>
								    <td align="center"><input type="checkbox" <?=($row['hien_thi']) ? 'checked' : ''?> class="switch-input" data-type="hien_thi" data-com="sanpham" data-id="<?=$row['id']?>"/></td>
									<td align="center"><input type="checkbox" <?=($row['noi_bat']) ? 'checked' : ''?> class="switch-input" data-type="noi_bat" data-com="sanpham" data-id="<?=$row['id']?>"/></td>
									<td align="center"><a href="?act=sanpham_edit&id=<?=$row["id"]?>" class="icon-form"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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
					    				echo "<li class=\"active\"><a href='?act=sanpham_list&id=".$id."&page=$i'>".$i."</a></li>";
					    			else
					    				echo "<li><a href='?act=sanpham_list&id=".$id."&page=$i'>".$i."</a></li>";
								}
					    	?>
	                  </ul>
					</div>
					<div class="clear"></div>
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