<div class="page-title">
    <div>
        <h1><i class="fa fa-edit"></i> <?=($_GET['act'] == "page_new") ? "Thêm mục" : "Sửa mục"?></h1>
        <p></p>
    </div>
    <div>
        <ul class="breadcrumb">
            <li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
            <li><a href="?act=page_list">Quản lý nội dung</a></li>
            <li><a href="?act=<?=$_GET['act']?>&id=<?=$_GET['id']?>"><?=($_GET['act'] == "page_new") ? "thêm mục" : "sửa mục"?></a></li>
        </ul>
    </div>
</div>
<?
function	template_edit($url,$func,$id,$txt_alias,$txt_ten,$txt_chu_thich,$txt_noi_dung,$error)
{
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
                <input type="reset" class="btn btn-danger" name="reset" value="Nhập lại"/>
                <input type="button" class="btn btn-default" name="submit" value="Xem danh sách" onclick="Forward('?act=page_list');"/>
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
                                            <label class="control-label col-md-3">Tên trang :</label>
                                            <div class="col-md-8">
                                                <input type="text" name="txt_ten" value="<?=$txt_ten?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Alias (Không xóa && không đổi tên):</label>
                                            <div class="col-md-8">
                                                <input type="text" name="txt_alias" value="<?=$txt_alias?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Chú thích :</label>
                                            <div class="col-md-8">
                                                <textarea name="txt_chu_thich" class="form-control" rows="5"><?=$txt_chu_thich?></textarea>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-12">Nội dung :</label>
                                            <div class="col-md-12">
                                                <textarea class="form-control" id="txt_noi_dung" name="txt_noi_dung" id="" rows="30" cols="80"><?=$txt_noi_dung?></textarea>
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