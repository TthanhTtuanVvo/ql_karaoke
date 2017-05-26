					<div class="row">
                     <div class="col-xs-12">
                        <div class="card">
                           <div class="card-body">
                              <div class="col-xs-12">
                                 <div class="form-group">
                                    <label class="control-label col-md-3">Tên sản phẩm (EN) :</label>
                                    <div class="col-md-8">
                                       <input type="text" name="txt_ten_en" value="<?=$txt_ten_en?>" class="form-control">
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>

                              <div class="col-xs-12 form-group">
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-3">Chú thích (EN):</label>
                                    <div class="col-md-8">
                                       <textarea rows="5" name="txt_chu_thich_en" class="form-control"><?=$txt_chu_thich_en?></textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                              
                              <div class="col-xs-12 form-group">
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-2">Nội dung (EN) :</label>
                                    <div class="col-md-9">
                                       <textarea rows="5" id ="txt_noi_dung_en" name="txt_noi_dung_en" class="form-control"><?=$txt_noi_dung_en?></textarea>
                                       <script type="text/javascript">
                                          // This is a check for the CKEditor class. If not defined, the paths must be checked.
                                          if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
                                          else
                                          {
                                              var editor = CKEDITOR.replace( 'txt_noi_dung_en' );
                                              CKFinder.setupCKEditor( editor, '../ckfinder' );
                                          }
                                       </script>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                               <div class="col-xs-12 form-group">
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-2">Thành phần (EN) :</label>
                                    <div class="col-md-9">
                                       <textarea rows="5" id ="txt_thanh_phan_en" name="txt_thanh_phan_en" class="form-control"><?=$txt_thanh_phan_en?></textarea>
                                       <script type="text/javascript">
                                          // This is a check for the CKEditor class. If not defined, the paths must be checked.
                                          if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
                                          else
                                          {
                                              var editor = CKEDITOR.replace( 'txt_thanh_phan_en' );
                                              CKFinder.setupCKEditor( editor, '../ckfinder' );
                                          }
                                       </script>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                               <div class="col-xs-12 form-group">
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-2">Dạng bào chế (EN):</label>
                                    <div class="col-md-9">
                                       <textarea rows="5" id ="txt_dang_bao_che_en" name="txt_dang_bao_che_en" class="form-control"><?=$txt_dang_bao_che_en?></textarea>
                                       <script type="text/javascript">
                                          // This is a check for the CKEditor class. If not defined, the paths must be checked.
                                          if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
                                          else
                                          {
                                              var editor = CKEDITOR.replace( 'txt_dang_bao_che_en' );
                                              CKFinder.setupCKEditor( editor, '../ckfinder' );
                                          }
                                       </script>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                               <div class="col-xs-12 form-group">
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-2">Quy cách đóng gói (EN) :</label>
                                    <div class="col-md-9">
                                       <textarea rows="5" id ="txt_dong_goi_en" name="txt_dong_goi_en" class="form-control"><?=$txt_dong_goi_en?></textarea>
                                       <script type="text/javascript">
                                          // This is a check for the CKEditor class. If not defined, the paths must be checked.
                                          if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
                                          else
                                          {
                                              var editor = CKEDITOR.replace( 'txt_dong_goi_en' );
                                              CKFinder.setupCKEditor( editor, '../ckfinder' );
                                          }
                                       </script>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                               <div class="col-xs-12 form-group">
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-2">Tác dụng (EN) :</label>
                                    <div class="col-md-9">
                                       <textarea rows="5" id ="txt_tac_dung_en" name="txt_tac_dung_en" class="form-control"><?=$txt_tac_dung_en?></textarea>
                                       <script type="text/javascript">
                                          // This is a check for the CKEditor class. If not defined, the paths must be checked.
                                          if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
                                          else
                                          {
                                              var editor = CKEDITOR.replace( 'txt_tac_dung_en' );
                                              CKFinder.setupCKEditor( editor, '../ckfinder' );
                                          }
                                       </script>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                               <div class="col-xs-12 form-group">
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-2">Chỉ định (EN) :</label>
                                    <div class="col-md-9">
                                       <textarea rows="5" id ="txt_chi_dinh_en" name="txt_chi_dinh_en" class="form-control"><?=$txt_chi_dinh_en?></textarea>
                                       <script type="text/javascript">
                                          // This is a check for the CKEditor class. If not defined, the paths must be checked.
                                          if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
                                          else
                                          {
                                              var editor = CKEDITOR.replace( 'txt_chi_dinh_en' );
                                              CKFinder.setupCKEditor( editor, '../ckfinder' );
                                          }
                                       </script>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                               <div class="col-xs-12 form-group">
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-2">Chống chỉ định (EN) :</label>
                                    <div class="col-md-9">
                                       <textarea rows="5" id ="txt_chong_chi_dinh_en" name="txt_chong_chi_dinh_en" class="form-control"><?=$txt_chong_chi_dinh_en?></textarea>
                                       <script type="text/javascript">
                                          // This is a check for the CKEditor class. If not defined, the paths must be checked.
                                          if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
                                          else
                                          {
                                              var editor = CKEDITOR.replace( 'txt_chong_chi_dinh_en' );
                                              CKFinder.setupCKEditor( editor, '../ckfinder' );
                                          }
                                       </script>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                               <div class="col-xs-12 form-group">
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-2">Tác dụng phụ (EN) :</label>
                                    <div class="col-md-9">
                                       <textarea rows="5" id ="txt_tac_dung_phu_en" name="txt_tac_dung_phu_en" class="form-control"><?=$txt_tac_dung_phu_en?></textarea>
                                       <script type="text/javascript">
                                          // This is a check for the CKEditor class. If not defined, the paths must be checked.
                                          if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
                                          else
                                          {
                                              var editor = CKEDITOR.replace( 'txt_tac_dung_phu_en' );
                                              CKFinder.setupCKEditor( editor, '../ckfinder' );
                                          }
                                       </script>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                               <div class="col-xs-12 form-group">
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-2">Tương tác thuốc (EN) :</label>
                                    <div class="col-md-9">
                                       <textarea rows="5" id ="txt_tuong_tac_thuoc_en" name="txt_tuong_tac_thuoc_en" class="form-control"><?=$txt_tuong_tac_thuoc_en?></textarea>
                                       <script type="text/javascript">
                                          // This is a check for the CKEditor class. If not defined, the paths must be checked.
                                          if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
                                          else
                                          {
                                              var editor = CKEDITOR.replace( 'txt_tuong_tac_thuoc_en' );
                                              CKFinder.setupCKEditor( editor, '../ckfinder' );
                                          }
                                       </script>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                               <div class="col-xs-12 form-group">
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-2">Quá liều và xử trí (EN) :</label>
                                    <div class="col-md-9">
                                       <textarea rows="5" id ="txt_xu_ly_en" name="txt_xu_ly_en" class="form-control"><?=$txt_xu_ly_en?></textarea>
                                       <script type="text/javascript">
                                          // This is a check for the CKEditor class. If not defined, the paths must be checked.
                                          if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
                                          else
                                          {
                                              var editor = CKEDITOR.replace( 'txt_xu_ly_en' );
                                              CKFinder.setupCKEditor( editor, '../ckfinder' );
                                          }
                                       </script>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                               <div class="col-xs-12 form-group">
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-2">Liều lượng và cách dùng (EN) :</label>
                                    <div class="col-md-9">
                                       <textarea rows="5" id ="txt_cach_dung_en" name="txt_cach_dung_en" class="form-control"><?=$txt_cach_dung_en?></textarea>
                                       <script type="text/javascript">
                                          // This is a check for the CKEditor class. If not defined, the paths must be checked.
                                          if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
                                          else
                                          {
                                              var editor = CKEDITOR.replace( 'txt_cach_dung_en' );
                                              CKFinder.setupCKEditor( editor, '../ckfinder' );
                                          }
                                       </script>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                               <div class="col-xs-12 form-group">
                                 <div class="col-xs-12">
                                    <label class="control-label col-md-2">Lưu ý chung (EN) :</label>
                                    <div class="col-md-9">
                                       <textarea rows="5" id ="txt_luu_y_en" name="txt_luu_y_en" class="form-control"><?=$txt_luu_y_en?></textarea>
                                       <script type="text/javascript">
                                          // This is a check for the CKEditor class. If not defined, the paths must be checked.
                                          if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
                                          else
                                          {
                                              var editor = CKEDITOR.replace( 'txt_luu_y_en' );
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