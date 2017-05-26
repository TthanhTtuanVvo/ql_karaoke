<div class="page-title">
  <div>
    <h1><i class="fa fa-edit"></i> <?=($_GET['act'] == "album_new") ? "Thêm mới" : "Chỉnh sửa"?></h1>
    <p></p>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
      <li><a href="?act=album_manager">Quản lý album</a></li>
      <li><a href="?act=<?=$_GET['act']?>&id=<?=$_GET['id']?>"><?=($_GET['act'] == "album_new") ? "Thêm mới" : "Chỉnh sửa"?></a></li>
    </ul>
  </div>
</div>
<?
function	template_edit($url,$func,$id,$txt_cat,$txt_ten,$txt_hien_thi,$error)
{
	global $db;
?>
<div class="row">
	<div class="col-md-12">
		<?=$error!=""?"<div align=center style='color:#990000;'><strong>".$error."</strong></div>":""?>
		<form name="frm_edit" id="frm_edit" action="<?=$url?>" enctype="multipart/form-data" method="POST" style="margin:0px;" >
			<input type="hidden" name="act" value="<?=str_replace("?act=","",$url)?>" />
			<input type="hidden" name="txt_cat" value="<?=$txt_cat?>" />
			<input type="hidden" name="id" value="<?=$id?>" />
			<input type="hidden" name="func" value="<?=$func?>" />
			<div class="form-group">
				<input type="submit" class="btn btn-success" name="submit" value="Lưu"/>
				<input type="button" class="btn btn-default" name="submit" value="Xem danh sách" onclick="Forward('?act=album_list&id=<?=$txt_cat?>');"/>
			</div>
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#noidung" aria-controls="home" role="tab" data-toggle="tab">Nội dung</a>
					</li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="noidung">
						<div class="row">
							<div class="col-xs-12">
							    <div class="card">
							    	<div class="card-body">
							    		<div class="form-group">
								            <label class="control-label col-md-3">Tên :</label>
								            <div class="col-md-8">
								            	<input type="text" name="txt_ten" value="<?=$txt_ten?>" class="form-control">
								            </div>
								            <div class="clearfix"></div>
									    </div>
									    <div class="form-group">
								            <label class="control-label col-md-3">Nhóm :</label>
								            <div class="col-md-8">
								            	<select name="txt_cat" class="form-control">
								            		<?
								            		$rs = $db->select("tgp_product_menu","hien_thi=1 and cat=0","order by thu_tu, id");
													while ($row = $db->fetch($rs)) {
								            			?>
								            			<optgroup label="<?=$row['ten']?>"></optgroup>
								            			<?
								            			$rs2 = $db->select("sanpham","hien_thi=1 and cat='".$row['id']."'","order by id desc");
														while ($row2 = $db->fetch($rs2)) {
								            			?>
															<option <?if($row2['id']==$txt_cat){echo 'selected';}?> value="<?=$row2['id']?>">&nbsp;&nbsp;&nbsp;---- <?=$row2['ten']?></option>
								            			<?
								            			}
								            		}								            		
								            		?>
								            	</select>
								            </div>
								            <div class="clearfix"></div>
									    </div>
									    <div class="form-group">
								            <label class="control-label col-md-3">Hình ảnh :</label>
								            <div class="col-md-8">
								            	<input type="file" name="txt_hinh" value="" class="form-control">
								            	<span>Images size: 1.600 x 1.200 px </span>
								            </div>
								            <div class="clearfix"></div>
								        </div>
									    <div class="form-group">
								            <div class="animated-checkbox">
								                <label>
								                	<input type="checkbox" name="txt_hien_thi" <?=(!isset($txt_hien_thi) || $txt_hien_thi==1)?'checked="checked"':''?>/><span class="label-text">Hiển thị</span>
								                </label>
							              	</div>
								        </div>
							    	</div>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
<?
}
?>