<link href="<?php echo theme_url();?>/assets/jquery-ui/jquery-ui.css" rel="stylesheet">
<script src="<?php echo theme_url();?>/assets/jquery-ui/jquery-ui.js"></script>

<link href="<?php echo theme_url();?>/assets/css/select2.css" rel="stylesheet">
<script src="<?php echo theme_url();?>/assets/js/select2.js"></script>

<?php $per_page = get_settings('classified_settings', 'posts_per_page', 6); ?>
<div class="row">
    <!-- Sidebar column -->
    <div class="col-md-3 col-sm-3">
        <div class="sidebar">
            <form action="<?php echo site_url('show/getresult_ajax/list/'.$per_page);?>" method="post" id="advance-search-form" class="form">

                <div class="s-widget">
                    <div class="title-widget"><i class="fa fa-search color"></i>&nbsp; <?php echo lang_key('search_filters'); ?></div>
                    <!-- Form Group -->
                    <div class="widget-content search">

                        <!-- Search Widget -->
                        <div class="form-group">
                          <div class="input-group">
                            <input class="form-control" type="text" placeholder="<?php echo lang_key('type_anything');?>" value="<?php echo (isset($data['plainkey']))?rawurldecode($data['plainkey']):'';?>" name="plainkey">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-color"><?php echo lang_key('search'); ?></button>
                            </span>
                          </div>
                        </div>


                        <div class="form-group">
                            <?php $city_temp = (isset($data['city']))?$data['city']:'any';?>
                            <select name="city" class="form-control chosen-select">
                                <option data-name="" value="any"><?php echo lang_key('any_city');?></option>
                                <?php foreach (get_all_locations_by_type('city')->result() as $row) {
                                    $sel = ($row->id==$city_temp)?'selected="selected"':'';
                                    ?>
                                    <option data-name="<?php echo $row->name;?>" class="cities city-<?php echo $row->parent;?>" value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo lang_key($row->name);?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <?php $category_temp = (isset($data['category']))?$data['category']:-1;
                            ?>
                            <select name="category" class="form-control chosen-select">
                                <option value="any"><?php echo lang_key('any_category');?></option>
                                              <?php foreach ($categories as $row) {
                                                  $sub = ($row->parent!=0)?'--':'';
                                                  $sel = ($category_temp==$row->id)?'selected="selected"':'';
                                              ?>
                                                  <option value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $sub.lang_key($row->title);?></option>
                                              <?php
                                              }?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><?php echo lang_key('price'); ?> <span class="price-range-amount-view" id="amount"></span> ₪</label>
                            <div id="slider-price-sell" class="price-range-slider"></div>
                            <input type="hidden" id="price-slider-sell" name="range-slider" value="">
                        </div>

                        <div class="form-group">
                            <label><input type="checkbox" name="contact_for_price" class="contact-input"><?php echo lang_key('include_contact_for_price');?></label>
                        </div>

                        <div class="form-group">
                            <?php $sort_by_temp = (isset($data['sort_by']))?$data['sort_by']:'';?>
                            <?php $options = array('price_asc','price_desc','id_asc','id_desc');?>
                            <select name="sort_by" class="form-control chosen-select">
                                <option value=""><?php echo lang_key('order_by');?></option>
                                <?php foreach ($options as $row) {
                                    $sel = ($row==$sort_by_temp)?'selected="selected"':'';
                                    ?>
                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo lang_key($row);?></option>
                                <?php }?>
                            </select>
                        </div>
                        <!-- Button -->
                        <button class="btn btn-red submit-search-button" type="submit"><?php echo lang_key('search');?></button>&nbsp;
                        <button class="btn btn-default" type="reset"><?php echo lang_key('reset');?></button>
                    </div>

                </div>

            </form>
        </div>
        


    </div> <!-- end of left bar -->

    <!-- Mainbar column -->
    <div class="col-md-9 col-sm-9">
      <div class="title-widget"><span style="position:relative;top:12px;"><?php echo lang_key('results'); ?></span>
        <div class="pull-right list-switcher">
          <a class="result-list" href="#"><i class="fa fa-th-list "></i></a>
          <a class="result-grid" href="#"><i class="fa fa-th "></i></a>
          <a class="result-map" href="#"><i class="fa fa-map-marker "></i></a>
          <form id="toggle-form" action="<?php echo site_url('show/toggle/map');?>" method="post">
            <input type="hidden" name="url" value="<?php echo current_url();?>">
          </form>
        </div>
      </div>
      <span class="results">   
      </span>
      <div class="ajax-loading recent-loading"><img src="<?php echo theme_url();?>/assets/img/loading.gif" alt="loading..."></div>
      <a href="" class="load-more-recent btn btn-blue" style="width:100%"><?php echo lang_key('load_more_posts');?></a>
    </div> <!-- end of main content -->
</div><!-- end of row -->

<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDYnCMgxZZB7nwqnz01xEO-KsdHajxAwEk&callback=initMap&v=3.exp&libraries=places"></script>
<script type="text/javascript">
    jQuery(window).resize(function(){
        $('.chosen-select').select2({
            theme: "classic"
        });
    });

    var per_page = '<?php echo $per_page;?>';
    var recent_count = '<?php echo $per_page;?>';

    $(document).ready(function(){
        $('.chosen-select').select2({
            theme: "classic"
        });

        var system_currency = '<?php echo $this->session->userdata(''); ?>';

        <?php $max_price = get_settings('classified_settings', 'max_price_for_search', '20000'); ?>
        <?php $range = (isset($data['range-slider']))? $data['range-slider'] != '' ?  explode(';',$data['range-slider']) :  array(0, $max_price): array(0, $max_price);  ?>
        var price_min = parseInt('<?php echo $range[0]; ?>');
        var price_max = parseInt('<?php echo $range[1]; ?>');
//
        var start_range = 0;

        var end_range = parseInt('<?php echo $max_price; ?>');

        $("#slider-price-sell").slider({

            range: true,

            min: start_range,

            max: end_range,

            values: [ price_min, price_max ],

            slide: function (event, ui) {

                $("#price-slider-sell").val(ui.values[ 0 ] + ';' + ui.values[ 1 ]);
                $("#amount").html( system_currency + ui.values[ 0 ] + " - " + system_currency + ui.values[ 1 ] );

            }

        });
        $("#price-slider-sell").val(price_min + ';' + price_max);
        $("#amount").html( system_currency + $( "#slider-price-sell" ).slider( "values", 0 ) +
        " - " + system_currency + $( "#slider-price-sell" ).slider( "values", 1 ) );

    });

</script>

<script type="text/javascript">
jQuery(document).ready(function(){

  jQuery('#advance-search-form').submit(function(e){
    e.preventDefault();
    var loadUrl = jQuery('#advance-search-form').attr('action');
    var data = jQuery('#advance-search-form').serialize();
    jQuery('.recent-loading').show(); 

    jQuery.post(
        loadUrl,
        data,
        function(result){          
           
           if(result.url!=window.location){
             window.history.pushState({path:result.url},'',result.url);
           }
           
           jQuery('.results').html(result.content);
           jQuery('.recent-loading').hide(); 
           if(jQuery('.results > div > .col-md-4').length<recent_count)
           {
                jQuery('.load-more-recent').hide();
           }
           fix_grid_height();
          
        },
        'json'
    );

  });

  jQuery('.load-more-recent').click(function(e){
      e.preventDefault();
      var next = parseInt(recent_count)+parseInt(per_page);

      var url = jQuery('#advance-search-form').attr('action');
      url = url.replace('/'+recent_count,'/'+next);
      jQuery('#advance-search-form').attr('action',url);
      recent_count = next;

      jQuery('#advance-search-form').submit();  
  });

  jQuery('.result-grid').click(function(e){
      e.preventDefault();
      jQuery('.result-grid').addClass('selected');
      jQuery('.result-list').removeClass('selected');

      var url = jQuery('#advance-search-form').attr('action');
      var action = url.replace('/list/','/grid/');
      jQuery('#advance-search-form').attr('action',action);
      jQuery('#advance-search-form').submit();
    });

  jQuery('.result-list').click(function(e){
    e.preventDefault();
    jQuery('.result-grid').removeClass('selected');
    jQuery('.result-list').addClass('selected');

    var url = jQuery('#advance-search-form').attr('action');
    var action = url.replace('/grid/','/list/');
    jQuery('#advance-search-form').attr('action',action);
    jQuery('#advance-search-form').submit();

  });

  jQuery('.result-map').click(function(e){
    e.preventDefault();
    jQuery('#toggle-form').submit();
  });

  var initialURL = location.href;

});


</script>