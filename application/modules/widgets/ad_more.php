<div class="info-box">
                                    <?php 
                                        $fa_icon        = get_category_fa_icon($post->parent_category);
                                        $category_title = get_category_title_by_id($post->category);
                                    ?>
                                    <i class="fa <?php echo $fa_icon; ?> bg-red category"></i>
                                    <div class="sub-cat">
                                        <a href="<?php echo site_url('show/categoryposts/'.$post->category.'/'.$category_title);?>"><?php echo $category_title; ?></a>
                                    </div>

                                    <div class="ad-detail-info">
                                        <span class="span-left"><i class="fa fa-clock-o clock-icon"></i> <?php echo lang_key('added'); ?>:</span>

                                        <span class="span-right">
                						    	<?php echo translateable_date($post->create_time); ?>
                                        </span>
                                    </div>

                                    <div class="ad-detail-info">
                                        <span class="span-left"><i class="fa fa-map-marker location-icon"></i> <?php echo lang_key('location'); ?>:</span>
                
                                        <span class="span-right">
                						    	<?php echo get_location_name_by_id($post->city); ?>
                                        </span>
                                    </div>

                                    <div class="ad-detail-info">
                                        <span class="span-left"><i class="fa fa-money price-icon"></i> <?php echo lang_key('price'); ?>:</span>
                
                                        <span class="span-right">
                						    	<?php echo show_price($post->price,$post->contact_for_price); ?>
                                        </span>
                                    </div>

                                    <div class="ad-detail-info">
                                        <span class="span-left"><i class="fa fa-eye view-icon"></i> <?php echo lang_key('views'); ?>:</span>
                
                                        <span class="span-right">
                						    	<?php echo $post->total_view; ?>
                                        </span>
                                    </div>

                                    <?php if(get_post_meta($post->id,'hide_phone','')!=1){?>
                                    <div class="ad-detail-info">
                                        <span class="span-left"><i class="fa fa-phone phone-icon"></i> <?php echo lang_key('phone'); ?>:</span>
                
                                        <span class="span-right">
                						    	<?php echo $post->phone_no; ?>
                                        </span>
                                    </div>
                                    <?php }?>

                                    <?php if($post->featured==1){?>
                                    <div class="ad-detail-info">
                                        <span class="span-left"><i class="fa fa-bookmark bookmark-icon"></i> <?php echo lang_key('featured'); ?>:</span>
                
                                        <span class="span-right">
                                                <?php echo lang_key('yes'); ?>
                                        </span>
                                    </div>
                                    <?php }?>

                                    <div class="ad-detail-info">
                                    <span class="span-left"><script type="text/javascript">(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
  }})();</script>
<div class="pluso" data-background="transparent" data-options="medium,square,line,horizontal,nocounter,theme=01" data-services="vkontakte,facebook,twitter,google,odnoklassniki,email"></div></span>
                                        <span class="span-right">
                                        <a target="_blank" href="<?php echo site_url('show/printview/'.$post->unique_id);?>"><i class="fa fa-print fa-lg"></i> <?php echo lang_key('print') ?></a></span>
                                    </div>
                                </div>