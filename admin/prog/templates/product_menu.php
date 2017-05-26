<div class="page-title">
	<div>
		<h1><i class="fa fa-edit"></i> <?=($_GET['act'] == "product_menu_new") ? "Thêm danh mục" : "Sửa danh mục"?></h1>
		<p></p>
	</div>
	<div>
		<ul class="breadcrumb">
			<li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
			<li><a href="?act=product_manager">Quản lý danh mục</a></li>
		</ul>
	</div>
</div>
<?
function	template_edit($url,$func,$id,$txt_cat,$txt_ten,$txt_chu_thich,$txt_hinh,$txt_noi_dung,$txt_hien_thi,$txt_noi_bat,$txt_title,$txt_keyword,$txt_description,$error)
{
global $db, $domain;
$img_name = get_sql("select hinh from tgp_product_menu where id='".$id."'");
?>
<div class="row">
	<div class="col-md-12">
		<?=$error!=""?"<div align=center style='color:#990000;'><strong>".$error."</strong></div>":""?>
		<form name="frm_edit" id="frm_edit" action="<?=$url?>" enctype="multipart/form-data" method="POST" style="margin:0px;" />
			<input type="hidden" name="act" value="<?=str_replace("?act=","",$url)?>" />
			<input type="hidden" name="id" value="<?=$id?>" />
			<input type="hidden" name="func" value="<?=$func?>" />
			<div class="form-group">
				<input type="submit" class="btn btn-success" name="submit" value="Lưu"/>
				<input type="button" class="btn btn-default" name="submit" value="Xem danh sách" onclick="Forward('?act=product_manager');"/>
			</div>
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#noidung" aria-controls="home" role="tab" data-toggle="tab">Nội dung</a>
					</li>
					<li><a href="#seo" aria-controls="seo" role="tab" data-toggle="tab">SEO</a></li>
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
								            <label class="control-label col-md-3">Chú thích :</label>
								            <div class="col-md-8">
								            	<textarea cols="2" id="txt_chu_thich" name="txt_chu_thich" class="form-control"><?=$txt_chu_thich?></textarea>
								            	<script type="text/javascript">
		                                          // This is a check for the CKEditor class. If not defined, the paths must be checked.
		                                          if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
		                                          else
		                                          {
		                                              var editor = CKEDITOR.replace( 'txt_chu_thich' );
		                                              CKFinder.setupCKEditor( editor, '../ckfinder' );
		                                          }
		                                       </script>
								            </div>
								            <div class="clearfix"></div>
									    </div>
									    <div class="form-group">
								            <label class="control-label col-md-3">Hình ảnh :</label>
								            <div class="col-md-8">
								            	<input type="file" name="txt_hinh" value="" class="form-control">
								           		<span>Kích thước chuẩn: 800*800 px</span><br/>
								           		<?if($func=='update'){?>
								           		<img style="width:160px;" src="<?=$domain?>uploads/product_menu/<?=$img_name?>" class="img-responsive"/>
								           		<?}?>
								            </div>
								            <div class="clearfix"></div>
								        </div>
								        <div class="form-group">
		                                    <label class="control-label col-md-3">Nội dung :</label>
		                                    <div class="col-md-8">
		                                       <textarea rows="5" id ="txt_noi_dung" name="txt_noi_dung" class="form-control"><?=$txt_noi_dung?></textarea>
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
		                              	</div>
									    <div class="form-group">
								            <div class="animated-checkbox">
								                <label>
								                	<input type="checkbox" name="txt_hien_thi" <?=(!isset($txt_hien_thi) || $txt_hien_thi==1)?'checked="checked"':''?>/><span class="label-text">Hiển thị</span>
								                </label>
								                &nbsp;&nbsp;&nbsp;&nbsp;
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
						<?php include "seo.php";?>
					</div>
				</div>
			</div>
		</form>
<?
}
function	show_cat($name,$id)
{
	global $db;
	
?>
<select name="<?=$name?>" class="form-control">
	<option value="0" <?if($id=='0'){echo 'selected';}?>>-- Danh mục gốc --</option>
<?
$r = $db->select("tgp_product_menu","cat='0' and hien_thi=1","order by thu_tu asc");
while ($row = $db->fetch($r))
{
	?>
	<option value="<?=$row["id"]?>" <?if($id==$row["id"]){echo 'selected';}?>><?=$row["ten"]?></option>
	<?
}
?>
</select>
<?php
}
function	cat_count($id)
{
	global $db;
	$r	=	$db->select("tgp_product_menu","cat = '".$id."'");
	return $db->num_rows($r);
}
?>