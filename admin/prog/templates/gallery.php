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
function	template_edit($url,$func,$id,$txt_cat,$txt_ten,$txt_chu_thich,$txt_noi_dung,$txt_hien_thi,$error)
{
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
								            <label class="control-label col-md-3">Tên :</label>
								            <div class="col-md-8">
								            	<input type="text" name="txt_ten" value="<?=$txt_ten?>" class="form-control">
								            </div>
								            <div class="clearfix"></div>
									    </div>
									    
									    <!-- <div class="form-group">
								            <label class="control-label col-md-3">Slogan :</label>
								            <div class="col-md-8">
								            	<input type="text" name="txt_slogan" value="<?=$txt_slogan?>" class="form-control">
								            </div>
								            <div class="clearfix"></div>
									    </div> -->
									    <div class="form-group">
								            <label class="control-label col-md-3">Nhóm :</label>
								            <div class="col-md-8">
								            	<?php show_cat("txt_cat",$txt_cat); ?>
								            </div>
								            <div class="clearfix"></div>
									    </div>
									    <div class="form-group">
								            <label class="control-label col-md-3">Link :</label>
								            <div class="col-md-8">
								            	<input type="text" name="txt_chu_thich" value="<?=$txt_chu_thich?>" class="form-control">
								            </div>
								            <div class="clearfix"></div>
									    </div>
									    <div class="form-group">
								            <label class="control-label col-md-3">Hình ảnh :</label>
								            <div class="col-md-8">
								            	<input type="file" name="txt_hinh" value="" class="form-control">
								            	<span>Images size: 1920x815 px cho home, 1920x1279 cho banner, 800x800 cho ảnh giới thiệu  </span>
								            </div>
								            <div class="clearfix"></div>
								        </div>
								        <!-- <div class="form-group">
								            <label class="control-label col-md-3">Nội dung :</label>
								            <div class="col-md-8">
								            	<textarea rows="5" id="txt_noi_dung" name="txt_noi_dung" class="form-control"><?=$txt_noi_dung?>
												</textarea>
													<script type="text/javascript">
	                                          // This is a check for the CKEditor class. If not defined, the paths must be checked.
			                                          if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
			                                          else
			                                          {
			                                              var editor = CKEDITOR.replace( 'txt_noi_dung' );
			                                              CKFinder.setupCKEditor( editor, '../ckfinder' );
			                                          }
			                                       </script>
								            </div>
								            <div class="clearfix"></div>
									    </div> -->
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
	
$r2 = $db->select("tgp_cat","_gallery = 1","order by thu_tu asc");
?>
<select name="<?=$name?>" class="form-control">
<?php
while ($row2 = $db->fetch($r2))
{
	echo "<optgroup label='".$row2["ten"]."'>";
	$r	=	$db->select("tgp_gallery_menu","cat = '".$row2["id"]."'","order by thu_tu asc");
	while ($row = $db->fetch($r))
	{
		echo "<option value='".$row["id"]."'";
		if ($id == $row["id"]) echo " selected ";
		echo ">".$row["ten"]."</option>";
	}
	echo "</optgroup>";
}
?>
</select>
<?php
}
?>