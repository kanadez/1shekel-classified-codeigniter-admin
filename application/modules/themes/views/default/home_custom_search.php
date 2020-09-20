
<?php $CI = get_instance(); ?>
<link href="<?php echo theme_url();?>/assets/jquery-ui/jquery-ui.css" rel="stylesheet">
<script src="<?php echo theme_url();?>/assets/jquery-ui/jquery-ui.js"></script>

<link href="<?php echo theme_url();?>/assets/css/select2.css" rel="stylesheet">
<script src="<?php echo theme_url();?>/assets/js/select2.js"></script>
<div class="real-estate">
    <div class="re-big-form">
        <div class="container">
            <!-- Nav tab style 2 starts -->
            <div class="nav-tabs-home buy-sell-tab">
                <!-- Nav tabs -->
                <ul>
                </ul>
                <!-- Tab content -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab-1">

                        <form role="form" action="<?php echo site_url('show/advfilter')?>" method="post">
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="input-11"><?php echo lang_key('select_city');?></label>
                                        <select id="input-11" name="city" class="form-control chosen-select">
                                            <option data-name="" value="any"><?php echo lang_key('any_city');?></option>
                                              <?php foreach (get_all_cities_in_use()->result() as $row) {
                                                  $sel = ($row->id==set_value('city'))?'selected="selected"':'';
                                                  ?>
                                                  <option data-name="<?php echo $row->name;?>" class="cities city-<?php echo $row->parent;?>" value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo lang_key($row->name);?></option>
                                              <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="input-14"><?php echo lang_key('select_category');?></label>
                                        <?php
                                        $CI = get_instance();
                                        $CI->load->model('user/post_model');
                                        $categories = $CI->post_model->get_all_categories();
                                        ?>
                                        <select id="input-14" name="category" class="form-control chosen-select">
                                            <option value="any"><?php echo lang_key('any_category');?></option>
                                              <?php foreach ($categories as $row) {
                                                  $sub = ($row->parent!=0)?'--':'';
                                                  $sel = (set_value('category')==$row->id)?'selected="selected"':'';
                                              ?>
                                                  <option value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $sub.lang_key($row->title);?></option>
                                              <?php
                                              }?>
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label><?php echo lang_key('price'); ?> <span class="price-range-amount-view" id="amount"></span> ₪</label>
                                        <div id="slider-price-sell" class="price-range-slider"></div>
                                        <input type="hidden" id="price-slider-sell" name="range-slider" value="">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-color"><i class="fa fa-search"></i>&nbsp; <?php echo lang_key('search_classifieds'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    jQuery(window).resize(function(){
        $('.chosen-select').select2({
            theme: "classic"
        });
    });

    $(document).ready(function(){
        $('.chosen-select').select2({
            theme: "classic"
        });

        var system_currency = '';
        var start_range = 0;

        var end_range = parseInt('<?php echo get_settings('classified_settings', 'max_price_for_search', '20000'); ?>');
        <?
        //dymm
        $CI = get_instance();
        $CI->load->database();        
        $CI->db->select_max('price','max_price');
        //$CI->db->select_min('price','min_price');
        $CI->db->where('status', 1);
        if(isset($category_id) && intval($category_id)){
            $CI->db->where('category', intval($category_id));
        }
        $res1 = $CI->db->get('posts');

        if ($res1->num_rows() > 0)
        {
            $res2 = $res1->result();
            
            if(count($res2) && $res2[0]->max_price && intval($res2[0]->max_price)){
              
            ?>
            end_range = parseInt("<?php echo $res2[0]->max_price; ?>");
            <?php        
            }
            
        }    
        //$query = $CI->db->get_where('posts',array('status'=>1),1,0);
        ?>

        $("#slider-price-sell").slider({

            range: true,

            min: start_range,

            max: end_range,

            values: [ start_range, end_range ],

            slide: function (event, ui) {

                $("#price-slider-sell").val(ui.values[ 0 ] + ';' + ui.values[ 1 ]);
                $("#amount").html( system_currency + ui.values[ 0 ] + " - " + system_currency + ui.values[ 1 ] );

            }

        });
        $("#amount").html( system_currency + $( "#slider-price-sell" ).slider( "values", 0 ) +
        " - " + system_currency + $( "#slider-price-sell" ).slider( "values", 1 ) );


    });

</script>
<!-- property search big form -->