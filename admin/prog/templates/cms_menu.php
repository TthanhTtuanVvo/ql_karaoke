<div class="page-title">
  <div>
    <h1><i class="fa fa-edit"></i> <?=($_GET['act'] == "cms_menu_new") ? "Thêm menu" : "Sửa menu"?></h1>
    <p></p>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
      <li><a href="?act=cms_manager">Quản lý nội dung</a></li>
      <li><a href="?act=<?=$_GET['act']?>&id=<?=$_GET['id']?>"><?=($_GET['act'] == "cms_menu_new") ? "thêm menu" : "sửa menu"?></a></li>
    </ul>
  </div>
</div>
<?
function	template_edit($url,$func,$id,$txt_cat,$txt_ten,$txt_hien_thi,$txt_type,$txt_noi_bat,$error,$txt_title,$txt_keyword,$txt_description)
{
global $db, $domain;
$img_name = get_sql("select hinh from tgp_cms_menu where id='".$id."'");
?>
<div class="row">
	<div class="col-md-12">
		<?=$error!=""?"<div align=center style='color:#990000;'><strong>".$error."</strong></div>":""?>
		<form name="frm_edit" id="frm_edit" action="<?=$url?>" enctype="multipart/form-data" method="post" style="margin:0px;" />
			<input type="hidden" name="act" value="<?=str_replace("?act=","",$url)?>" />
			<input type="hidden" name="id" value="<?=$id?>" />
			<input type="hidden" name="func" value="<?=$func?>" />
			<div class="form-group">
				<input type="submit" class="btn btn-success" name="submit" value="Lưu"/>
				<input type="button" class="btn btn-default" name="submit" value="Xem danh sách" onclick="Forward('?act=cms_manager');"/>
			</div>
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#noidung" aria-controls="home" role="tab" data-toggle="tab">Nội dung</a>
					</li>
					<li role="presentation">
					<a href="#seo" aria-controls="tab" role="tab" data-toggle="tab">SEO</a>
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
								            <label class="control-label col-md-3">Hình ảnh :</label>
								            <div class="col-md-8">
								            	<input type="file" name="txt_hinh" value="" class="form-control">
								           		<span>Kích thước chuẩn: 1600*800 px</span><br/>
								           		<?if($func=='update'){?>
								           		<img src="<?=$domain?>/uploads/cms_menu/<?=$img_name?>" class="img-responsive" />
								           		<?}?>
								            </div>
								            <div class="clearfix"></div>
								        </div>

									    <div class="form-group">
								            <div class="animated-checkbox">
								                <label>
								                	<input type="checkbox" name="txt_hien_thi" <?=(!isset($txt_hien_thi) || $txt_hien_thi==1)?'checked="checked"':''?>/><span class="label-text">Hiển thị</span>
								                </label>
							              		&nbsp;&nbsp;&nbsp;
								                <label>
								                	<input type="checkbox" name="txt_noi_bat" <?=(!isset($txt_noi_bat) || $txt_noi_bat==1)?'checked="checked"':''?>/><span class="label-text">Nổi bật</span>
								                </label>
							              	</div>
								        </div>
							    	</div>
							    </div>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="seo"> 
					<?php
						include "seo.php";
					?>
				</div>
				</div>
			</div>
		</form>
	</div>
</div>
<?
}
function	show_cat($name,$id)
{
	global $db;
	
$r = $db->select("tgp_cat","_cms = 1","order by thu_tu asc");
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
	
	$r	=	$db->select("tgp_cms_menu","cat = '".$id."'");
	return $db->num_rows($r);
}
?>