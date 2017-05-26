<div class="page-title">
    <div>
        <h1><i class="fa fa-edit"></i> Tiêu đề webiste - Email liên hệ ...</h1>
        <p></p>
    </div>
    <div>
        <ul class="breadcrumb">
            <li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
        </ul>
    </div>
</div>
<?php
$act                = $_GET['act'];
$txt_title          = $_POST['txt_title'];
$txt_email          = $_POST['txt_email'];
$hotline             = $_POST['hotline'];
$txt_fb             = $_POST['txt_fb'];
$txt_g             = $_POST['txt_g'];
$txt_y             = $_POST['txt_y'];
$toado              = $_POST['toado'];
/*$gganalytics        = magic_quote($_POST['gganalytics']);
$txt_vchat          = magic_quote($_POST['txt_vchat']);*/


$txt_description    = $_POST['txt_description'];
$txt_keywords       = $_POST['txt_keywords'];
if (empty($func)) $func = $_POST['func'];    
if ($func == "update")
{
	$db->update("tgp_bien","gia_tri",$txt_email,"ten = 'email'");
    $db->update("tgp_bien","gia_tri",$hotline,"ten = 'hotline'");
    $db->update("tgp_bien","gia_tri",$txt_fb,"ten = 'link_fb'");
    $db->update("tgp_bien","gia_tri",$txt_g,"ten = 'link_g'");
    $db->update("tgp_bien","gia_tri",$txt_y,"ten = 'link_y'");
    $db->update("tgp_bien","gia_tri",$txt_author,"ten = 'meta_author'");
    // $db->update("tgp_bien","gia_tri",$txt_copyright,"ten = 'meta_copyright'");
    $db->update("tgp_bien","gia_tri",$txt_description,"ten = 'meta_description'");
    $db->update("tgp_bien","gia_tri",$txt_keywords,"ten = 'meta_keywords'");
    $db->update("tgp_bien","gia_tri",$txt_title,"ten = 'title'");
    $db->update("tgp_bien","gia_tri",$toado,"ten = 'toado'");
    /*$db->update("tgp_bien","gia_tri",$gganalytics,"ten = 'gganalytics'");
    $db->update("tgp_bien","gia_tri",$txt_vchat,"ten = 'vchat'");*/
	admin_load("Đã cập nhật các thông tin khác.","?act=other");
}
else
{
}
?>
<div class="row">
    <div class="col-md-12">
		<?=$error!=""?"<div align=center style='color:#990000;'><strong>".$error."</strong></div>":""?>
		<form name="frm_edit" id="frm_edit" action="<?$url?>" enctype="multipart/form-data" method="POST" style="margin:0px;" />
		    <input type="hidden" name="act" value="<?=str_replace("?act=","",$url)?>" />
			<input type="hidden" name="func" value="update" />
			<div class="form-group">
                <input type="submit" class="btn btn-success" name="submit" value="Lưu"/>
                <input type="reset" class="btn btn-danger" name="reset" value="Nhập lại"/>
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
                                            <label class="control-label col-md-3">Title website: </label>
                                            <div class="col-md-9">
                                                <input type="text" name="txt_title" value="<?=get_bien("title")?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Email liên hệ:</label>
                                            <div class="col-md-9">
                                                <input type="text" name="txt_email" value="<?=get_bien("email")?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Facebook:</label>
                                            <div class="col-md-9">
                                                <input type="text" name="txt_fb" value="<?=get_bien("link_fb")?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Google+:</label>
                                            <div class="col-md-9">
                                                <input type="text" name="txt_g" value="<?=get_bien("link_g")?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Youtube:</label>
                                            <div class="col-md-9">
                                                <input type="text" name="txt_y" value="<?=get_bien("link_y")?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group"> 
                                            <label class="control-label col-md-3">Tọa độ bản đồ:</label>
                                            <div class="col-md-9">
                                                <input type="text" name="toado" value="<?=get_bien("toado")?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Meta-description:</label>
                                            <div class="col-md-9">
                                                <textarea name="txt_description" class="form-control" rows="5"><?=get_bien("meta_description")?></textarea>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Meta-keywords:</label>
                                            <div class="col-md-9">
                                                <textarea name="txt_keywords" class="form-control" rows="5"><?=get_bien("meta_keywords")?></textarea>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label class="control-label col-md-3">VChat:</label>
                                            <div class="col-md-9">
                                                <textarea name="txt_vchat" class="form-control" rows="5"><?=get_bien("vchat")?></textarea>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Google Analytics:</label>
                                            <div class="col-md-9">
                                                <textarea name="gganalytics" class="form-control" rows="5"><?=get_bien("gganalytics")?></textarea>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div> -->
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