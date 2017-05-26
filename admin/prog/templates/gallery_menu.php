<div class="page-title">
  <div>
    <h1><i class="fa fa-edit"></i> <?=($_GET['act'] == "cms_menu_new") ? "Thêm danh mục" : "Sửa danh mục"?></h1>
    <p></p>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
      <li><a href="?act=gallery_manager">Quản lý nội dung</a></li>
      <li><a href="?act=<?=$_GET['act']?>&id=<?=$_GET['id']?>"><?=($_GET['act'] == "cms_menu_new") ? "thêm danh mục" : "sửa danh mục"?></a></li>
    </ul>
  </div>
</div>
<?
function	template_edit($url,$func,$id,$txt_cat,$txt_ten,$txt_hien_thi,$error)
{
?>
<div class="row">
	<div class="col-md-12">
		<?=$error!=""?"<div align=center style='color:#990000;'><strong>".$error."</strong></div>":""?>
		<form name="frm_edit" id="frm_edit" action="<?=$url?>" enctype="multipart/form-data" method="get" style="margin:0px;" />
			<input type="hidden" name="act" value="<?=str_replace("?act=","",$url)?>" />
			<input type="hidden" name="id" value="<?=$id?>" />
			<input type="hidden" name="func" value="<?=$func?>" />
			<div class="form-group">
				<input type="submit" class="btn btn-success" name="submit" value="Lưu"/>
				<input type="reset" class="btn btn-danger" name="reset" value="Nhập lại"/>
				<input type="button" class="btn btn-default" name="submit" value="Xem danh sách" onclick="Forward('?act=gallery_manager');"/>
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
								            <label class="control-label col-md-3">Tiêu đề :</label>
								            <div class="col-md-8">
								            	<input type="text" name="txt_ten" value="<?=$txt_ten?>" class="form-control">
								            </div>
								            <div class="clearfix"></div>
									    </div>
									    <div class="form-group">
								            <label class="control-label col-md-3">Nhóm :</label>
								            <div class="col-md-8">
								            	<?php show_cat("txt_cat",$txt_cat); ?>
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
function	show_cat($name,$id)
{
	global $db;
	
$r = $db->select("tgp_cat","_gallery = 1","order by thu_tu asc");
?>
<select name="<?=$name?>" class="form-control">
<?php
while ($row = $db->fetch($r))
{
	echo "<option value='".$row["id"]."'";
	if ($id == $row["id"]) echo " selected ";
	echo ">".$row["ten"]."</option>";
}
?>
</select>
<?php
}
function	cat_count($id)
{
	global $db;
	
	$r	=	$db->select("tgp_gallery_menu","cat = '".$id."'");
	return $db->num_rows($r);
}
?>