<?
// // if($_GET['act']=='phong_new')
// {
//    $cat_name = get_sql("select ten from tgp_product_menu where id=".$txt_cat);
// }
// else
// {
//    $cat_id = get_sql("select cat from phong where id=".$id);
//    $cat_name = get_sql("select ten from tgp_product_menu where id=".$cat_id);
// }

?>
<div class="page-title">
   <div>
      <h1><i class="fa fa-edit"></i> <?=($_GET['act'] == "phong_new") ? "Quản lý thêm phòng" : "Quản lý sửa phòng"?></h1>
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
   function get_cat($cat) {
       global $db;
   ?>
<select name="txt_cat" class="form-control">
   <?
      $rscat = $db->select("tgp_product_menu","cat='0' and hien_thi=1","order by thu_tu, id limit 150");
      while ($rowcat=$db->fetch($rscat)) {
          ?>
   <option value="<?=$rowcat['id']?>" <?if($cat==$rowcat['id']){echo 'selected';}?>><?=$rowcat['ten']?></option>
   <?
      $rscat2 = $db->select("tgp_product_menu","cat='".$rowcat['id']."' and hien_thi=1","order by thu_tu, id limit 150");
      while ($rowcat2=$db->fetch($rscat2)) {
          ?>
   <option value="<?=$rowcat2['id']?>" <?if($cat==$rowcat2['id']){echo 'selected';}?>>------- <?=$rowcat2['ten']?></option>
   <?
      }
      } 
      ?>
</select>
<? 
   }
   
   function template_edit($url,$func,$id,$txt_ten,$txt_chu_thich,$txt_noi_dung,$txt_hien_thi,$txt_noi_bat, $txt_title, $txt_keyword, $txt_description,$error)
   {
       global $db;
       $thumbnailname = get_sql("select hinh from vatlieu where id= '".$id."'"); 
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
            <input type="button" class="btn btn-default" name="submit" value="Xem danh sách" onclick="Forward('?act=phong_list&id=<?=$txt_cat?>');"/>
         </div>
         <div class="col-xs-12 form-group">
            <div class="col-xs-6">
               <div class="animated-checkbox">
                  <label>
                  <input type="checkbox" name="txt_hien_thi" <?=(!isset($txt_hien_thi) || $txt_hien_thi==1)?'checked="checked"':''?>/><span class="label-text">Hiển thị</span>
                  </label>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <label>
                  <input type="checkbox" name="txt_noi_bat" <?=(!isset($txt_noi_bat) || $txt_noi_bat==1)?'checked="checked"':''?>/><span class="label-text">Nổi bật</span>
                  </label>
               </div>
            </div>
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
                              <div class="col-xs-12">
                                 <div class="form-group">
                                    <label class="control-label col-md-3">Tên sản phẩm :</label>
                                    <div class="col-md-8">
                                       <input type="text" name="txt_ten" value="<?=$txt_ten?>" class="form-control">
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                              <!-- <div class="col-xs-12">
                                 <div class="form-group">
                                    <label class="control-label col-md-3">Danh mục :</label>
                                    <div class="col-md-8">
                                       <?=get_cat($txt_cat)?>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div> -->

                              <div class="col-xs-12 form-group">
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-3">Chú thích:</label>
                                    <div class="col-md-8">
                                       <textarea rows="5" name="txt_chu_thich" class="form-control"><?=$txt_chu_thich?></textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                              
                              <div class="col-xs-12 form-group">
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-2">Chọn hình ảnh:</label>
                                    <div class="col-md-9">
                                       <input type="file" name="txt_hinh" value="" class="form-control">
                                       <span>Kích thước chuẩn 1200x900 px</span>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                                 <?if($func=='update'){?>
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-3">Hình ảnh hiện tại:</label>
                                    <div class="col-md-8">
                                       <img src="../uploads/product/vl_<?=$thumbnailname?>" style="width:160px"/>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                                 <?}?>                                      
                              </div>
                              

                              <div class="col-xs-12 form-group">
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-2">Nội dung :</label>
                                    <div class="col-md-9">
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
                              </div>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div role="tabpanel" class="tab-pane" id="seo">
                  <?php include "seo.php";?>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
      </form>
   </div>
</div>
<?
   }
   
   ?>
<style>
   .label_sp{
   display: block;
   padding: 4px 0;
   width: 50%;    
   }
   .input_sp{
   -webkit-border-radius: 2px;
   -moz-border-radius: 2px;
   border-radius: 2px;
   padding: 6px 0;
   border: 1px solid #c1c1c1;
   text-indent: 8px;
   }
   .sub_sp{
   width: 20%;
   text-align: center;
   }
   .cate {
   background: #27C2F0;
   color: #fff;
   }
</style>