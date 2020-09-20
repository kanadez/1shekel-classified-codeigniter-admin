<link href="<?php echo theme_url();?>/assets/jquery-ui/jquery-ui.css" rel="stylesheet">

<?php $post = $post->row();?>
<div class="page-heading-two">
    <div class="container">
        <h2><?php echo get_post_data_by_lang($post,'title'); ?> <span><?php echo lang_key('post_ad_subtitle');?></span></h2>
        <div class="breads">
            <a href="<?php echo site_url(); ?>"><?php echo lang_key('home'); ?></a> / <?php echo get_post_data_by_lang($post,'title'); ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">

        <form action="<?php echo site_url('update-ad');?>" method="post" role="form" class="form-horizontal">
        <input type="hidden" name="id" value="<?php echo $post->id;?>">
        <input type="hidden" name="page" value="<?php echo ($page)?$page:0;?>">
        <div class="row">
            <?php echo $this->session->flashdata('msg');?>
            <div class="col-md-6 col-sm-6">
                <!-- Shopping items content -->
                <div class="shopping-content">
                    <div class="shopping-checkout">
                        <!-- Heading -->
                            <h4><?php echo lang_key('basic_info');?></h4>
                            <hr/>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputEmail1"><?php echo lang_key('category');?></label>
                                <div class="col-md-8">
                                    <select name="category" class="form-control">
                                        <option value=""><?php echo lang_key('select_category');?></option>
                                        <?php foreach ($categories as $row) {
                                            $sub = ($row->parent!=0)?'--':'';
                                            $v = (set_value('category')!='')?set_value('category'):$post->category;
                                            $sel = ($v==$row->id)?'selected="selected"':'';
                                        ?>
                                            <option value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $sub.lang_key($row->title);?></option>
                                        <?php
                                        }?>
                                    </select>
                                    <?php echo form_error('category');?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">&nbsp;</label>
                                <div class="col-md-8">
                                    <?php $v = (set_value('contact_for_price')!='')?set_value('contact_for_price'):$post->contact_for_price;?>
                                    <?php $chk = ($v==1)?'checked="checked"':'';?>
                                    <input type="checkbox" name="contact_for_price" id="contact_for_price" value="1" <?php echo $chk;?> class="form-control"> 
                                    <label for="contact_for_price" class="contact_for_price_label"><?php echo lang_key('contact_for_price');?></label>
                                    <?php echo form_error('contact_for_price');?>
                                </div>
                            </div>

                            <div class="form-group price-input-holder">
                                <label class="col-md-3 control-label"><?php echo lang_key('price');?></label>
                                <div class="col-md-8">
                                    <?php $v = (set_value('price')!='')?set_value('price'):$post->price;?>
                                    <input type="text" name="price" placeholder="<?php echo lang_key('price');?>" value="<?php echo $v;?>" class="form-control">
                                    <?php echo form_error('price');?>
                                </div>
                            </div>

                            
                            <h4><?php echo lang_key('address_info');?></h4>
                            <hr/>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang_key('phone');?></label>
                                <div class="col-md-8">
                                    <?php $v = (set_value('phone_no')!='')?set_value('phone_no'):$post->phone_no;?>
                                    <input id="phone_no" type="text" name="phone_no" placeholder="<?php echo lang_key('phone_no');?>" value="<?php echo $v;?>" class="form-control">
                                    <?php echo form_error('phone_no');?>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-md-3 control-label">&nbsp;</label>
                                <div class="col-md-8">
                                    <?php $v = (set_value('hide_my_phone')!='')?set_value('hide_my_phone'):get_post_meta($post->id,'hide_phone','');?>
                                    <?php $chk = ($v==1)?'checked="checked"':'';?>
                                    <input type="checkbox" name="hide_my_phone" id="hide_my_phone" value="1" <?php echo $chk;?> class="form-control">
                                    <label for="hide_my_phone" class="hide_my_phone_label"><?php echo lang_key('hide_my_phone');?></label>
                                    <?php echo form_error('hide_my_phone');?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">&nbsp;</label>
                                <div class="col-md-8">
                                    <?php $v = (set_value('hide_my_email')!='')?set_value('hide_my_email'):get_post_meta($post->id,'hide_email','');?>
                                    <?php $chk = ($v==1)?'checked="checked"':'';?>
                                    <input type="checkbox" name="hide_my_email" id="hide_my_email" value="1" <?php echo $chk;?> class="form-control">
                                    <label for="hide_my_email" class="hide_my_email_label"><?php echo lang_key('hide_my_email');?></label>
                                    <?php echo form_error('hide_my_email');?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">&nbsp;</label>
                                <div class="col-md-8">
                                    <?php $v = (set_value('hide_my_address')!='')?set_value('hide_my_address'):get_post_meta($post->id,'hide_address','');?>
                                    <?php $chk = ($v==1)?'checked="checked"':'';?>
                                    <input type="checkbox" name="hide_my_address" id="hide_my_address" value="1" <?php echo $chk;?> class="form-control">
                                    <label for="hide_my_address" class="hide_my_address_label"><?php echo lang_key('hide_my_address');?></label>
                                    <?php echo form_error('hide_my_address');?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang_key('country');?></label>
                                <div class="col-md-8">
                                    <select name="country" id="country" class="form-control">
                                        <option data-name="" value=""><?php echo lang_key('select_country');?></option>
                                        <?php $v = (set_value('country')!='')?set_value('country'):$post->country;?>
                                        <?php foreach (get_all_locations_by_type('country')->result() as $row) {
                                            $sel = ($row->id==$v)?'selected="selected"':'';
                                            ?>
                                            <option data-name="<?php echo $row->name;?>" value="<?php echo $row->id;?>" selected <?php echo $sel;?>><?php echo $row->name;?></option>
                                        <?php }?>
                                    </select>
                                    <?php echo form_error('country');?>
                                </div>
                            </div>
                        <?php $state_active = get_settings('classified_settings', 'show_state_province', 'yes'); ?>
                        <?php if($state_active == 'yes'){ ?>
                        <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang_key('state');?></label>
                                <div class="col-md-8">
                                    <select name="state" id="state" class="form-control">
                                        
                                    </select>
                                    <?php echo form_error('state');?>
                                </div>
                            </div>
                        <?php } ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang_key('city');?></label>
                                <div class="col-md-8">
                                    <?php $city_field_type = 'dropdown'; ?>
                                    <?php $selected_city = (set_value('city')!='')?set_value('city'):$post->city;?>
                                    <?php if ($city_field_type=='dropdown') {?>
                                    <select name="city" id="city" class="form-control" onchange="codeAddress()">
                                        <option data-name="" value=""><?php echo lang_key('select_city');?></option>
                                        <?php foreach (get_all_locations_by_type('city')->result() as $row) {
                                            $sel = ($row->id==$selected_city)?'selected="selected"':'';
                                            ?>
                                            <option data-name="<?php echo $row->name;?>" value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $row->name;?></option>
                                        <?php }?>
                                    </select>
                                    <?php }else {?>
                                    <input type="text" id="city" name="city" value="<?php echo get_location_name_by_id($selected_city);?>" placeholder="<?php echo lang_key('city');?>" class="form-control input-sm" >
                                    <span class="help-inline city-loading">&nbsp;</span>
                                    <?php }?>
                                    <?php echo form_error('city');?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang_key('address');?></label>
                                <div class="col-md-8">
                                <?php $v = (set_value('address')!='')?set_value('address'):$post->address;?>
                                    <input id="address" type="text" name="address" placeholder="<?php echo lang_key('address');?>" value="<?php echo $v;?>" class="form-control" onchange="codeAddress()">
                                    <?php echo form_error('address');?>
                                    <span class="help-inline city-loading"><?php echo lang_key('address_info_why');?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="codeAddress()"><i class="fa fa-map-marker"></i> <?php echo lang_key('view_on_map');?></a>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">&nbsp;</label>
                                <div class="col-md-8">
                                    <div id="form-map"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang_key('latitude');?></label>
                                <div class="col-md-8">
                                    <?php $v = (set_value('latitude')!='')?set_value('latitude'):$post->latitude;?>
                                    <input id="latitude" type="text" name="latitude" placeholder="<?php echo lang_key('latitude');?>" value="<?php echo $v;?>" class="form-control">
                                    <?php echo form_error('latitude');?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo lang_key('longitude');?></label>
                                <div class="col-md-8">
                                    <?php $v = (set_value('longitude')!='')?set_value('longitude'):$post->longitude;?>
                                    <input id="longitude" type="text" name="longitude" placeholder="<?php echo lang_key('longitude');?>" value="<?php echo $v;?>" class="form-control">
                                    <?php echo form_error('longitude');?>
                                </div>
                            </div>                            
                        
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">

                <h4><?php echo lang_key('general_info');?></h4>
                <hr/>

                <?php 
            $CI = get_instance();
            $CI->load->model('admin/system_model');
            $langs = $CI->system_model->get_all_langs();
            ?>


                
            <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab1">
                    <?php $flag=1; foreach ($langs as $lang=>$long_name){ 
                        ?>
                    <li class="<?php echo (default_lang()==$lang)?'active':'';?>"><a data-toggle="tab" href="#<?php echo $lang;?>"><i class="fa fa-globe"></i> <?php echo $long_name;?></a></li>
                    <?php $flag++; }?>
                </ul>
                <div class="tab-content" id="myTabContent1">
                     <?php $flag=1; foreach ($langs as $lang=>$long_name){ 
                     ?>
                     <div id="<?php echo $lang;?>" class="tab-pane fade in <?php echo (default_lang()==$lang)?'active':'';?>">
                    
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo lang_key('title');?></label>
                            <div class="col-md-8">
                                <?php $v = (set_value('title_'.$lang)!='')?set_value('title_'.$lang):get_post_data_by_lang($post,'title',$lang);?>
                                <input type="text" name="title_<?php echo $lang;?>" placeholder="<?php echo lang_key('title');?>" value="<?php echo $v;?>" class="form-control">
                                <?php echo form_error('title_'.$lang);?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo lang_key('description');?></label>
                            <div class="col-md-8">
                                <?php $v = (set_value('description_'.$lang)!='')?set_value('description_'.$lang):get_post_data_by_lang($post,'description',$lang);?>
                                <textarea rows="15" name="description_<?php echo $lang;?>" class="form-control rich"><?php echo $v;?></textarea>
                                <?php echo form_error('description_'.$lang);?>
                            </div>
                        </div>
<p><?php echo lang_key('lang-title-desc');?>.</p>
                    
                    </div>
                    <?php $flag++; }?>
                </div>
            </div>

                

                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo lang_key('tags');?></label>
                    <div class="col-md-8">
                        <?php $v = (set_value('tags')!='')?set_value('tags'):$post->tags;?>
                        <textarea rows="15" name="tags" class="form-control tag-input"><?php echo $v;?></textarea>
                        <span><?php echo lang_key('put_as_comma_seperated')?></span>
                        <?php echo form_error('tags');?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo lang_key('featured_image');?></label>
                    <div class="col-md-8">
                        <div class="featured-img">
                            <?php $v = (set_value('featured_img')!='')?set_value('featured_img'):$post->featured_img;?>
                            <input type="hidden" name="featured_img" id="featured-img-input" value="<?php echo $v;?>">
                            <img id="featured-img" src="<?php echo base_url('uploads/images/no-image.png');?>">
                            <div class="upload-button"><?php echo lang_key('upload');?></div>
                            <?php echo form_error('featured_img');?>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo lang_key('video_url');?></label>
                    <div class="col-md-8">
                        <?php $v = (set_value('video_url')!='')?set_value('video_url'):$post->video_url;?>
                        <span id="video_preview"></span>
                        <input id="video_url" type="text" name="video_url" placeholder="<?php echo lang_key('video_url');?>" value="<?php echo $v;?>" class="form-control">
                        <span class="help-inline"><?php echo lang_key('video-urls');?></span>
                        <?php echo form_error('video_url');?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo lang_key('gallery');?></label>
                    <div class="col-md-8">
                        <?php $tmp_gallery = ($post->gallery!='')?json_decode($post->gallery):array();?>
                        <?php $gallery = (isset($_POST['gallery']))?$_POST['gallery']:$tmp_gallery;?>
                        <ul class="multiple-uploads">
                            <?php foreach ($gallery as $item) {
                            ?>
                            <li class="gallery-img-list">
                              <input type="hidden" name="gallery[]" value="<?php echo $item;?>" />
                              <img src="<?php echo base_url('uploads/gallery/'.$item);?>" />
                              <div class="remove-image" onclick="jQuery(this).parent().remove();">X</div>
                            </li>
                            <?php }?>
                            <li class="add-image" id="dragandrophandler">+</li>
                        </ul>       
                        <div class="clearfix"></div>
                        <span class="gallery-upload-instruction"><?php echo lang_key('gallery-warn');?></span>
                        <div class="clearfix clear-top-margin"></div>
                    </div>
                </div>            

                
                
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <hr>
                <div class="form-group align-centre">
                    <button class="btn btn-color" type="submit"><?php echo lang_key('save');?></button>
                    <button class="btn btn-default" type="reset"><?php echo lang_key('reset');?></button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDYnCMgxZZB7nwqnz01xEO-KsdHajxAwEk&callback=initMap&v=3.exp&libraries=places"></script>
<script src="<?php echo theme_url();?>/assets/js/markercluster.min.js"></script>
<script src="<?php echo theme_url();?>/assets/js/map-icons.min.js"></script>
<script src="<?php echo theme_url();?>/assets/js/map_config.js"></script>

<script src="<?php echo theme_url();?>/assets/jquery-ui/jquery-ui.js"></script>
<?php require'multiple-uploader.php';?>
<?php require'bulk_uploader_view.php';?>
<script type="text/javascript">
jQuery(document).ready(function(){
    
    jQuery('#photoimg').attr('target','.multiple-uploads');
    jQuery('#photoimg').attr('input','gallery');
    var obj = $("#dragandrophandler");
    obj.on('dragenter', function (e)
    {
        e.stopPropagation();
        e.preventDefault();
        $(this).css('border', '2px solid #0B85A1');
    });

    obj.on('dragover', function (e)
    {
         e.stopPropagation();
         e.preventDefault();
    });

    obj.on('drop', function (e)
    {
     
         $(this).css('border', '2px dotted #0B85A1');
         e.preventDefault();
         var files = e.originalEvent.dataTransfer.files;
         //console.log(files);
         //We need to send dropped files to Server
         handleFileUpload(files,obj);
    });

    $(document).on('dragenter', function (e)
    {
        e.stopPropagation();
        e.preventDefault();
    });

    $(document).on('dragover', function (e)
    {
      e.stopPropagation();
      e.preventDefault();
      obj.css('border', '2px dotted #0B85A1');
    });
    
    $(document).on('drop', function (e)
    {
        e.stopPropagation();
        e.preventDefault();
    });

    jQuery('.multiple-uploads > .add-image').click(function(){
        jQuery('#photoimg').attr('target','.multiple-uploads');
        jQuery('#photoimg').attr('input','gallery');
        jQuery('#photoimg').click();
    });

    jQuery( ".multiple-uploads" ).sortable();
});
</script>

<script type="text/javascript">
    function getUrlVars(url) {
        var vars = {};
        var parts = url.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
    }

    function showVideoPreview(url)
    {
        if(url.search("youtube.com")!=-1)
        {
            var video_id = getUrlVars(url)["v"];
            //https://www.youtube.com/watch?v=jIL0ze6_GIY
            var src = '//www.youtube.com/embed/'+video_id;
            //var src  = url.replace("watch?v=","embed/");
            var code = '<iframe class="thumbnail" width="100%" height="200" src="'+src+'" frameborder="0" allowfullscreen></iframe>';
            jQuery('#video_preview').html(code);
        }
        else if(url.search("vimeo.com")!=-1)
        {
            //http://vimeo.com/64547919
            var segments = url.split("/");
            var length = segments.length;
            length--;
            var video_id = segments[length];
            var src  = url.replace("vimeo.com","player.vimeo.com/video");
            var code = '<iframe class="thumbnail" src="//player.vimeo.com/video/'+video_id+'" width="100%" height="200" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
            jQuery('#video_preview').html(code);
        }
        else
        {
            //alert("only youtube and video url is valid");
        }
    }

    jQuery(document).ready(function(){

    var city_field_type =  '<?php echo get_settings("classified_settings", "city_dropdown", "autocomplete"); ?>' ;

    jQuery('#video_url').change(function(){
        var url = jQuery(this).val();
        showVideoPreview(url);
    }).change();

    jQuery('#contact_for_price').click(function(){
        show_hide_price();
    });
    show_hide_price();

    jQuery('.upload-button').click(function(){
        jQuery('#photoimg_featured').click();
    });

    jQuery('#featured-img-input').change(function(){
        var val = jQuery(this).val();
        if(val=='')
        {
            val = 'no-image.png';
        }

        var base_url  = '<?php echo base_url();?>';
        var image_url = base_url+'uploads/thumbs/'+val;
        jQuery( '#featured-img' ).attr('src',image_url);

    }).change();

    var site_url = '<?php echo site_url();?>';
    var val = jQuery('#country').val();
    var loadUrl = site_url+'/show/get_locations_by_parent_ajax/'+val;
    jQuery.post(
        loadUrl,
        {},
        function(responseText){
            jQuery('#state').html(responseText);
            var sel_country = '<?php echo (set_value("country")!='')?set_value("country"):$post->country;?>';
            var sel_state   = '<?php echo (set_value("state")!='')?set_value("state"):$post->state;?>';
            if(val==sel_country)
                jQuery('#state').val(sel_state);
            else
                jQuery('#state').val('');
            jQuery('#state').focus();
            jQuery('#state').trigger('change');
        }
    );
    jQuery('#country').change(function(){
        jQuery('#city').val('');
        jQuery('#selected_city').val('');
        var val = jQuery(this).val();
        var loadUrl = site_url+'/show/get_locations_by_parent_ajax/'+val;
        jQuery.post(
            loadUrl,
            {},
            function(responseText){
                <?php if($state_active=='yes'){?>
                jQuery('#state').html(responseText);
                var sel_country = '<?php echo (set_value("country")!='')?set_value("country"):$post->country;?>';
                var sel_state   = '<?php echo (set_value("state")!='')?set_value("state"):$post->state;?>';
                if(val==sel_country)
                jQuery('#state').val(sel_state);
                else
                jQuery('#state').val('');
                jQuery('#state').focus();
                jQuery('#state').trigger('change');
                <?php }else{?>
                var sel_country = '<?php echo (set_value("country")!='')?set_value("country"):$post->country;?>';
                var sel_city   = '<?php echo (set_value("selected_city")!='')?set_value("selected_city"):$post->city;?>';
                var city   = '<?php echo (set_value("city")!='')?set_value("city"):get_location_name_by_id($post->city);?>';
                if(city_field_type=='dropdown')
                populate_city(val);
                if(val==sel_country)
                {
                    jQuery('#selected_city').val(sel_city);
                    jQuery('#city').val(city);
                }
                else
                {
                    jQuery('#selected_city').val('');
                    jQuery('#city').val('');            
                }
                <?php }?>
            }
        );
     });

    jQuery('#state').change(function(){
        <?php if($state_active=='yes'){?>
        var val = jQuery(this).val();
        var sel_state   = '<?php echo (set_value("state")!='')?set_value("state"):$post->state;?>';
        var sel_city   = '<?php echo (set_value("selected_city")!='')?set_value("selected_city"):$post->city;?>';
        var city   = '<?php echo (set_value("city")!='')?set_value("city"):get_location_name_by_id($post->city);?>';

        if(city_field_type=='dropdown')
        populate_city(val); //populate the city drop down

        if(val==sel_state)
        {
            jQuery('#selected_city').val(sel_city);
            jQuery('#city').val(city);
        }
        else
        {
            jQuery('#selected_city').val('');
            jQuery('#city').val('');            
        }
        <?php }?>
    });

    <?php if($state_active == 'yes'){ ?>
        if(city_field_type=='dropdown'){
            
            var sel_state   = '<?php echo (set_value("state")!='')?set_value("state"):$post->state;?>';
            populate_city(sel_state);
        }
        var parent = '#state';
    <?php } else { ?>
        if(city_field_type=='dropdown'){
            
            var sel_country = jQuery('#country').val();
            populate_city(sel_country);
        }
        var parent = '#country';
    <?php } ?>

    if(city_field_type=='autocomplete') {

        jQuery( "#city" ).bind( "keydown", function( event ) {
            if ( event.keyCode === jQuery.ui.keyCode.TAB &&
                jQuery( this ).data( "ui-autocomplete" ).menu.active ) {
                event.preventDefault();
            }
        })
            .autocomplete({
                source: function( request, response ) {

                    jQuery.post(
                        "<?php echo site_url('show/get_cities_ajax');?>/",
                        {term: request.term,parent: jQuery(parent).val()},
                        function(responseText){
                            response(responseText);
                            jQuery('#selected_city').val('');
                            jQuery('.city-loading').html('');
                        },
                        "json"
                    );
                },
                search: function() {
                    // custom minLength
                    var term = this.value ;
                    if ( term.length < 2 || jQuery(parent).val()=='') {
                        return false;
                    }
                    else
                    {
                        jQuery('.city-loading').html('Loading...');
                    }
                },
                focus: function() {
                    // prevent value inserted on focus
                    return false;
                },
                select: function( event, ui ) {
                    this.value = ui.item.value;
                    jQuery('#selected_city').val(ui.item.id);
                    jQuery('.city-loading').html('');
                    return false;
                }
            });
    }
    else if(city_field_type=='dropdown') {
        jQuery('#city_dropdown').change(function (){
            var text = $('#city_dropdown').find(':selected').text();
            alert(text);
            var val = jQuery('option:selected', this).attr('city_id');
            jQuery('#selected_city').val(val);
        });
    }

      
});
function show_hide_price()
{
    var val = jQuery('#contact_for_price').attr('checked');
    if(val=='checked')
    {
        jQuery('.price-input-holder').hide();
    }
    else
    {
        jQuery('.price-input-holder').show();        
    }
}

function populate_city(parent) {
    //alert(parent);
    var site_url = '<?php echo site_url();?>';
    var loadUrl = site_url+'/show/get_city_dropdown_by_parent_ajax/'+parent;
        jQuery.post(
            loadUrl,
            {},
            function(responseText){
                jQuery('#city_dropdown').html(responseText);
                var sel_city   = '<?php echo get_location_name_by_id($selected_city);?>';
                //alert(sel_city);
                jQuery('#city_dropdown').val(sel_city);
            }
        );
}
</script>

<script type="text/javascript" src="<?php echo base_url('assets/tinymce/tinymce.min.js');?>"></script>

<script type="text/javascript">

tinymce.init({
    convert_urls : 0,
    selector: ".rich",
    menubar: false,
    toolbar: "styleselect | bold | link | bullist | numlist | code",
    plugins: [

         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",

         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",

         "save code table contextmenu directionality emoticons template paste textcolor"

   ]

 });
</script>
<script type="text/javascript">
    var markers = [];
    //    var map;
    var Ireland = "Dhaka, Bangladesh";
    function initialize() {
       
        var myLatitude = parseFloat('<?php echo get_settings("banner_settings","map_latitude", 37.2718745); ?>');
        var myLongitude = parseFloat('<?php echo get_settings("banner_settings","map_longitude", -119.2704153); ?>');
        var myLatlng = new google.maps.LatLng(myLatitude,myLongitude);

        geocoder = new google.maps.Geocoder();
        var mapOptions = {
            center: myLatlng,
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: MAP_STYLE
        };
        map = new google.maps.Map(document.getElementById("form-map"),
            mapOptions);

        var ex_latitude = $('#latitude').val();
        var ex_longitude = $('#longitude').val();

        if (ex_latitude != '' && ex_longitude != ''){
            map.setCenter(new google.maps.LatLng(ex_latitude, ex_longitude));//center the map over the result
            var marker = new google.maps.Marker(
                {
                    map: map,
                    draggable:true,
                    animation: google.maps.Animation.DROP,
                    position: new google.maps.LatLng(ex_latitude, ex_longitude)
                });

            markers.push(marker);
            google.maps.event.addListener(marker, 'dragend', function()
            {
                var marker_positions = marker.getPosition();
                $('#latitude').val(marker_positions.lat());
                $('#longitude').val(marker_positions.lng());
//                        console.log(marker.getPosition());
            });

        }

    }

    function codeAddress()
    {
        var main_address = $('#address').val();
        var country = $('#country').find(':selected').data('name');
        var state = $('#state').find(':selected').data('name');
        var city = '';
        
        var city_field_type =  '<?php echo 'dropdown'; ?>' ;
            city = $('#city').find(':selected').text();

        <?php if($state_active == 'yes'){ ?>

        var address = [main_address, city, state, country].join();
        <?php } else { ?>

        var address = [main_address, city, country].join();
        <?php } ?>
//        console.log(address);
        if(country != '' && city != '')
        {


            setAllMap(null); //Clears the existing marker

            geocoder.geocode( {address:address}, function(results, status)
            {
                if (status == google.maps.GeocoderStatus.OK)
                {
//                    console.log(results[0].geometry.location.lat());
                    $('#latitude').val(results[0].geometry.location.lat());
                    $('#longitude').val(results[0].geometry.location.lng());
                    map.setCenter(results[0].geometry.location);//center the map over the result


                    //place a marker at the location
                    var marker = new google.maps.Marker(
                        {
                            map: map,
                            draggable:true,
                            animation: google.maps.Animation.DROP,
                            position: results[0].geometry.location
                        });

                    markers.push(marker);


                    google.maps.event.addListener(marker, 'dragend', function()
                    {
                        var marker_positions = marker.getPosition();
                        $('#latitude').val(marker_positions.lat());
                        $('#longitude').val(marker_positions.lng());
//                        console.log(marker.getPosition());
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });

        }
        else{
            alert('You must enter at least country and city');
        }

    }

    function setAllMap(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>


