<div class="page-title">
	<div>
		<h1><i class="fa fa-edit"></i> <?=($_GET['act'] == "cms_menu_new") ? "Thêm thành viên" : "Sửa thành viên"?></h1>
		<p></p>
	</div>
	<div>
		<ul class="breadcrumb">
			<li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
			<li><a href="?act=member_list">Quản lý nội dung</a></li>
			<li><a href="?act=<?=$_GET['act']?>&id=<?=$_GET['id']?>"><?=($_GET['act'] == "cms_menu_new") ? "thêm thành viên" : "sửa thành viên"?></a></li>
		</ul>
	</div>
</div>
<?
function	template_edit($url, $func, $id,$txt_username,$txt_email,$txt_ten,$txt_dien_thoai,$txt_dia_chi,$txt_level,$txt_trang_thai,$error)
{
?>
<div class="row">
	<div class="col-md-12">
		<?=$error!=""?"<div align=center style='color:#990000;'><strong>".$error."</strong></div>":""?>
		<form name="frm_edit" id="frm_edit" action="<?=$url?>" enctype="multipart/form-data" method="GET" style="margin:0px;" >
			<input type="hidden" name="act" value="<?=str_replace("?act=","",$url)?>" />
			<input type="hidden" name="txt_cat" value="<?=$txt_cat?>" />
			<input type="hidden" name="id" value="<?=$id?>" />
			<input type="hidden" name="func" value="<?=$func?>" />
			<div class="form-group">
				<input type="submit" class="btn btn-success" name="submit" value="Lưu"/>
				<input type="reset" class="btn btn-danger" name="submit" value="Nhập lại"/>
				<input type="button" class="btn btn-default" name="submit" value="Xem danh sách" onclick="Forward('?act=member_list');"/>
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
								            <label class="control-label col-md-3">Tên truy cập:</label>
								            <div class="col-md-8">
								            	<input type="text" name="txt_username" <?=$func=="update"?"readonly=\"readonly\"":""?> value="<?=$txt_username?>" class="form-control">
								            </div>
								            <div class="clearfix"></div>
									    </div>
									    <div class="form-group">
								            <label class="control-label col-md-3">Mật khẩu:</label>
								            <div class="col-md-8">
								            	<input type="password" name="txt_password" value="<?=$txt_password?>" class="form-control">
								            </div>
								            <div class="clearfix"></div>
									    </div>
									    <div class="form-group">
								            <label class="control-label col-md-3">Nhập lại mật khẩu:</label>
								            <div class="col-md-8">
								            	<input type="password" name="txt_password2" value="<?=$txt_password2?>" class="form-control">
								            </div>
								            <div class="clearfix"></div>
									    </div>
									    <div class="form-group">
								            <label class="control-label col-md-3">Email :</label>
								            <div class="col-md-8">
								            	<input type="email" name="txt_email" value="<?=$txt_email?>" class="form-control">
								            </div>
								            <div class="clearfix"></div>
									    </div>
									    <div class="form-group">
								            <label class="control-label col-md-3">Họ và tên:</label>
								            <div class="col-md-8">
								            	<input type="text" name="txt_ten" value="<?=$txt_ten?>" class="form-control">
								            </div>
								            <div class="clearfix"></div>
									    </div>
									    <div class="form-group">
								            <label class="control-label col-md-3">Điện thoại:</label>
								            <div class="col-md-8">
								            	<input type="text" name="txt_dien_thoai" value="<?=$txt_dien_thoai?>" class="form-control">
								            </div>
								            <div class="clearfix"></div>
									    </div>
									    <div class="form-group">
								            <label class="control-label col-md-3">Địa chỉ:</label>
								            <div class="col-md-8">
								            	<input type="text" name="txt_dia_chi" value="<?=$txt_dia_chi?>" class="form-control">
								            </div>
								            <div class="clearfix"></div>
									    </div>
									    <div class="form-group">
								            <div class="animated-checkbox">
								                <label>
								                	<input type="checkbox" name="txt_trang_thai" <?=(!isset($txt_trang_thai) || $txt_trang_thai==1)?'checked="checked"':''?>/><span class="label-text">Trạng thái</span>
								                </label>
							              	</div>
								        </div>
								        <div class="form-group">
								        	<label class="control-label col-md-3">Cấp bậc:</label>
								        	<div class="col-md-9">
									            <div class="radio">
					                              <label>
					                                <input id="optionsRadios1" type="radio" name="txt_level" value="1" <?=$txt_level==1?"checked":""?>>Admin
					                              </label>
					                            </div>
					                            <div class="radio">
					                           		<label>
					                            		<input id="optionsRadios2" type="radio" name="txt_level" value="2" <?=$txt_level==2?"checked":""?>>Mods
					                            	</label>
					                            </div>
					                            <div class="radio">
					                            	<label>
					                                	<input id="optionsRadios3" type="radio" name="txt_level" value="3" <?=$txt_level==3?"checked":""?>>Member
					                           		</label>
					                            </div>
					                        </div>
					                        <div class="clearfix"></div>
								        </div>
							    	</div>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<?
}
?>