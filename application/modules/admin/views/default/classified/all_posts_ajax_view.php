<?php 
$curr_page = $this->uri->segment(5);
if($curr_page=='')
  $curr_page = 0;
$dl = default_lang();
?>
        <table id="all-posts" class="table table-hover table-advance">
            <thead>
                <tr>
                    <th class="numeric"><input style="width: 15px;" type="checkbox" class="form-control allcheck"></th>
                    <th class="numeric">#</th>
                    <th class="numeric"><?php echo lang_key('image');?></th>
                    <th class="numeric"><?php echo lang_key('author');?></th>
                    <th class="numeric"><?php echo lang_key('title');?></th>
                    <th class="numeric"><?php echo lang_key('category');?></th>
                    <th class="numeric"><a href="<?php echo site_url('admin/classified/allposts/'.$curr_page."/price"); ?>"><?php echo lang_key('price');?></a></th>
                    <th class="numeric"><?php echo lang_key('city');?></th>
                    <?php if(get_settings('package_settings','enable_pricing','Yes')=='Yes'){?>
                    <th class="numeric"><a href="<?php echo site_url('admin/classified/allposts/'.$curr_page."/timestamp"); ?>"><?php echo lang_key('expirtion_date');?></a></th>
                    <?php }?>
                    <th class="numeric"><a href="<?php echo site_url('admin/classified/allposts/'.$curr_page."/status"); ?>"><?php echo lang_key('status');?></a></th>
                    <th class="numeric"><a href="<?php echo site_url('admin/classified/allposts/'.$curr_page."/highlighted"); ?>"><?php echo lang_key('featured');?></a></th>
                    <th class="numeric"><a href="<?php echo site_url('admin/classified/allposts/'.$curr_page."/vip"); ?>">VIP</a></th>
                    <th class="numeric"><a href="<?php echo site_url('admin/classified/allposts/'.$curr_page."/timestamp"); ?>"><?php echo lang_key('expired');?></a></th>
                    <th class="numeric"><a href="<?php echo site_url('admin/classified/allposts/'.$curr_page."/timestamp"); ?>"><?php echo lang_key('creation_date');?></a></th>
                    <th class="numeric"><?php echo lang_key('actions');?></th>
                </tr>
            </thead>
            <tbody>

          <?php $i=1;foreach($posts->result() as $row):  
                $detail_link = post_detail_url($row);
          ?>

               <tr>
                  <td data-title="check" class="numeric"><input style="width: 15px;" type="checkbox" data-id="<?=$row->num?>" class="form-control check_item"></td>
                  <td data-title="#" class="numeric"><?php echo $i;?></td>
                  <td data-title="<?php echo lang_key('image');?>" class="numeric"><img class="thumbnail" style="width:50px;margin-bottom:0px;" src="<?php echo get_featured_photo_by_id($row->photo);?>" /></td>
                  <td data-title="<?php echo lang_key('author');?>" class="numeric"><a href="<?php echo site_url("admin/users/detail/".$row->author); ?>"><?php echo get_author_name_by_id($row->author);?></a></td>
                  <td data-title="<?php echo lang_key('title');?>" class="numeric"><?php echo $row->title;/*echo get_post_data_by_lang($row,'title');*/?></td>
                  <td data-title="<?php echo lang_key('category');?>" class="numeric"><?php echo get_category_title_by_id($row->category_code);?></td>
                  <td data-title="<?php echo lang_key('price');?>" class="numeric"><?php echo show_price($row->price,$row->currency)?></td>
                  <td data-title="<?php echo lang_key('city');?>" class="numeric"><?php echo get_city_name_by_code($row->city);?></td>

                  <?php if(get_settings('package_settings','enable_pricing','Yes')=='Yes'){?>
                  <td data-title="<?php echo lang_key('city');?>" class="numeric"><?php echo $row->expirtion_date;?></td>
                  <?php }?>
                                    
                  <td data-title="<?php echo lang_key('status');?>" class="numeric"><?php echo get_status_title_by_value($row->status);?></td>
                  <td data-title="<?php echo lang_key('featured');?>" class="numeric"><?php echo ($row->highlighted != 0)?'<span class="label label-success">Да</span>':'<span class="label label-info">Нет</span>';?></td>
                  <td data-title="VIP" class="numeric"><?php echo get_vip_status_title_by_value($row->vip, $row->period);?></td>   
                  <td data-title="<?php echo lang_key('expired');?>" class="numeric"><?php echo get_expired_title($row->timestamp, $row->period);?></td> 
                  <td data-title="<?php echo lang_key('creation_date');?>" class="numeric"><?php echo date('m/d/Y', $row->timestamp);?></td> 
                  <td data-title="<?php echo lang_key('actions');?>" class="numeric">
                    <div class="btn-group">
                      <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-cog"></i> <?php echo lang_key('action');?> <span class="caret"></span></a>
                      <ul class="dropdown-menu dropdown-info">
                          <li><a href="<?php echo $detail_link;?>" target="_blank"><?php echo lang_key('view_on_front');?></a></li>
                          <li><a href="<?php echo "http://".$_SERVER["HTTP_HOST"]."/edit.php?item=".$row->num;?>"><?php echo lang_key('edit');?></a></li>
                          <li><a href="<?php echo site_url('admin/classified/deletepost/'.$curr_page.'/'.$row->num);?>"><?php echo lang_key('delete');?></a></li>
                          <?php if(is_admin()){?>
                            <?php if($row->status==3){?>
                            <li><a href="<?php echo site_url('admin/classified/approvepost/'.$curr_page.'/'.$row->num);?>"><?php echo lang_key('approve');?></a></li>
                            <?php }?>
                            <?php if($row->status==5){ // if post is expired give an option to renew?>
                              <li><a href="<?php echo site_url('user/payment/chooserenewpackage/'.$row->num);?>"><?php echo lang_key('renew_package');?></a></li>
                            <?php }?> 
                            
                            <?php if($row->highlighted==0){?>
                            <li><a class="make-featured" data-postid="<?php echo $row->num;?>" href="javascript:void(0)"><?php echo lang_key('make_featured');?></a></li>
                            <?php }else{?>
                            <li><a href="<?php echo site_url('admin/classified/removefeaturepost/'.$curr_page.'/'.$row->num);?>"><?php echo lang_key('remove_featured');?></a></li>
                            <li><a class = "renew-featured" data-postid="<?php echo $row->num;?>" href="javascript:void(0)"><?php echo lang_key('renew_featured');?></a></li>
                            <?php }?>
                          <?php }else{?>
                            <?php if($row->status==5){ // if post is expired give an option to renew?>
                              <li><a href="<?php echo site_url('user/payment/chooserenewpackage/'.$row->num);?>"><?php echo lang_key('renew_package');?></a></li>
                            <?php }?> 
                            <?php if(get_settings('package_settings','enable_featured_pricing','No')=='Yes' && $row->highlighted==0){?>
                            <li><a href="<?php echo site_url('admin/classified/choosefeaturepackage/'.$row->num);?>"><?php echo lang_key('make_featured');?></a></li>
                            <?php }else{?>
                            <li><a href="<?php echo site_url('admin/classified/choosefeaturepackagerenew/'.$row->num);?>"><?php echo lang_key('renew_featured');?></a></li>
                            <?php }?>
                          <?php }?>
                            <?php if($row->status==1){?>
                            <li><a href="<?php echo site_url('admin/classified/promotepost/'.$curr_page.'/'.$row->num);?>"><?php echo lang_key('promote');?></a></li>
                            <?php }?>
                            <?php if(!get_vip_status_by_value($row->vip, $row->period)){ // if post is expired give an option to renew?>
                            <li><a href="<?php echo site_url('admin/classified/setvip/'.$curr_page.'/'.$row->num);?>"><?php echo lang_key('set_vip');?></a></li>
                            <?php }else{?>
                            <li><a href="<?php echo site_url('admin/classified/unsetvip/'.$curr_page.'/'.$row->num);?>"><?php echo lang_key('unset_vip');?></a></li>
                            <?php }?>
                            <?php if (get_expired_flag($row->timestamp, $row->period) == 1){?>
                            <li><a href="<?php echo site_url('admin/classified/prolong/'.$curr_page.'/'.$row->num);?>"><?php echo lang_key('prolong');?></a></li>
                            <?php }?>
                      </ul>
                    </div>
                  </td>
               </tr>

            <?php $i++;endforeach;?>   

           </tbody>
        </table>
        <div class="pagination pull-right">
            <ul class="pagination pagination-colory"><?php echo $pages;?></ul>
        </div>
        <div class="pull-right">
            <img src="<?php echo base_url('assets/images/loading.gif');?>" style="width:20px;margin:5px;display:none" class="loading">
        </div>
        <div class="clearfix"></div>
        <script>
            jQuery('#all-posts').dataTable({iDisplayLength: 9999});
            jQuery('.dataTables_length, .dataTables_paginate').parent().parent().hide();
            jQuery.ajaxSetup({
                cache: false
            });
        </script>