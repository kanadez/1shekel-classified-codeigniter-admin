<?php 

$file 	= './dbc_config/config.xml';

$xmlstr = file_get_contents($file);

$xml 	= simplexml_load_string($xmlstr);

$config	= $xml->xpath('//config');

?>
<style>
    .marker-label,
    .marker-icon {
        z-index: 99;
        position: absolute;
        display: block;
        margin-top: -37px;
        margin-left: -14px;
        width: 30px;
        height: 30px;
        font-size: 24px !important;
        text-align: center;
        color: #FFFFFF;
        white-space: nowrap;
    }
</style>
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDYnCMgxZZB7nwqnz01xEO-KsdHajxAwEk&callback=initMap&v=3.exp&libraries=places"></script>
<script src="http://cdn.rawgit.com/nathan-muir/fontawesome-markers/master/fontawesome-markers.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/markercluster.min.js"></script>
<script src="<?php echo theme_url();?>/assets/js/jquery.tooltipster.min.js"></script>
<script src="<?php echo theme_url();?>/assets/js/map-icons.min.js"></script>
<script src="<?php echo theme_url();?>/assets/js/map_config.js"></script>
<?php $curr_lang = get_current_lang(); ?>
<?php $posts = get_all_classifieds_map_data() ?>
<script type="text/javascript">
    var map;
    function initialize() {


            var myLatitude = parseFloat('<?php echo get_settings("banner_settings","map_latitude", 37.2718745); ?>');
            var myLongitude = parseFloat('<?php echo get_settings("banner_settings","map_longitude", -119.2704153); ?>');
            var zoomLevel = parseInt('<?php echo get_settings("banner_settings","map_zoom",8); ?>');
            var map_data = <?php echo json_encode($posts); ?>;

            var myLatlng = new google.maps.LatLng(myLatitude,myLongitude);
            var mapOptions = {
                scrollwheel: false,
                zoom: zoomLevel,
                center: myLatlng,
                mapTypeControl: true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                    position: google.maps.ControlPosition.RIGHT_BOTTOM
                },
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.SMALL,
                    position: google.maps.ControlPosition.RIGHT_CENTER
                },
                panControl: true,
                panControlOptions: {
                    position: google.maps.ControlPosition.RIGHT_TOP
                },
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: MAP_STYLE
            }
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            var infowindow = new google.maps.InfoWindow({
                content: "Hello World"
            });

            var marker, i;
            var markers = [];
            var infoContentString = [];

            if(map_data.posts.length > 0){
                for (i = 0; i < map_data.posts.length; i++) {

                    var marker_label = '<i class="fa '+ map_data.posts[i].fa_icon + '"></i>';
                    console.log(marker_label);
                    marker = new Marker({
                        position: new google.maps.LatLng(map_data.posts[i].latitude, map_data.posts[i].longitude),
                        map: map,
                        title: map_data.posts[i].post_title,
                        zIndex: 9,
                        icon: {
                            path: fontawesome.markers.CIRCLE,
                            fillColor: map_data.posts[i].fa_color,
                            fillOpacity: 1,
                            strokeColor: '',
                            strokeWeight: 0,
                            scale: 1/3
                        }

                    });

                    infoContentString[i] = '<div class="img-box-4 text-center map-grid"><div class="img-box-4-item"><div class="image-style-one"><img class="img-responsive" alt="" src="'+ map_data.posts[i].featured_image_url + '"></div>'
                    + '<div class="img-box-4-content"><h4 class="item-title"><a href="'+ map_data.posts[i].detail_link + '">'+ map_data.posts[i].post_title + '</a></h4><div class="bor bg-red"></div><div class="row"><div class="info-dta info-price">'
                    + map_data.posts[i].price + '</div></div><div class="row"><div class="info-dta info-price">'+ map_data.posts[i].post_short_address + '</div></div>' + '</div></div></div>';

                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infowindow.setContent(infoContentString[i]);
                            infowindow.open(map, marker);
                            map.setCenter(this.getPosition());

                        }
                    })(marker, i));
//                createMarkerButton(marker, map_data.posts[i]);
                    markers.push(marker);
//                infoContentString.push(contentString);
                }
                var markerCluster = new MarkerClusterer(map, markers);
            }
        }
   google.maps.event.addDomListener(window, 'load', initialize);


</script>


      <div class="page-title">

        <div>

          <h1><i class="fa fa-file-o"></i> <?php echo lang_key('dashboard');?></h1>

          <h4><?php echo lang_key('overview_stats_more');?></h4>

        </div>

      </div>



<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i><?php echo lang_key('view_posts');?></h3>
                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div id="map-canvas" style="width: 100%; height: 400px"></div>
            </div>
        </div>
    </div>
</div>

    <div class="row">

      <div class="col-md-7">

        <div class="row">

          <div class="col-md-7">

            <div class="row">

              <div class="col-md-12">

                <div class="tile">

                  <p class="title">

                   Легкая в администрировании и управлении доска объявлений!

                  </p>

                  <p>

                    Купить и продать товар теперь легко.

                  </p>

                  <div class="img img-bottom">

                    <i class="fa fa-desktop"></i>

                  </div>

                </div>

              </div>

            </div>

            

          </div>

          <div class="col-md-5">

            <div class="row">

              <div class="col-md-12 tile-active">

                <div class="tile tile-magenta">

                  <div class="img img-center">

                    <i class="fa fa-desktop"></i>

                  </div>

                  <p class="title text-center">

                    Админпанель

                  </p>

                </div>

                <div class="tile tile-blue">

                  <p class="title">

                    Легкая, интуитивно понятная и

                  </p>

                  <p>

                      функциональная CMS.

                  </p>

                  <div class="img img-bottom">

                    <i class="fa fa-desktop"></i>

                  </div>

                </div>

              </div>

            </div>

            

          </div>


        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="tile tile-green">
                    <div class="img">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="content">
                        <p class="big"><?php echo get_post_sell_count(); ?></p>
                        <p class="title"><?php echo lang_key('ads_for_sale') ?></p>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="col-md-5">

        <div class="row">

          <div class="col-md-6">

            <div class="tile tile-orange">

              <div class="img">

                <i class="fa fa-users"></i>

              </div>

              <div class="content">

                <p class="big">

                  <?php 
                  $CI = get_instance();
                  $CI->load->database();
                  $query = $CI->db->get_where('user',array('status'=>1));
                  echo $query->num_rows();
                  ?>

                </p>

                <p class="title">

                  <?php echo lang_key('users') ?>

                </p>

              </div>

            </div>

          </div>

          <div class="col-md-6">

            <div class="tile tile-dark-blue">

              <div class="img">

                <i class="fa fa-bars"></i>

              </div>

              <div class="content">
                <p class="big">
                  <?php
                  $query = $CI->db->get_where('catalog',array('status'=>1));
                  echo $query->num_rows();
                  ?>
                </p>
                <p class="title">
                  <?php echo lang_key('posts');?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<style type="text/css">
  .version{
    font-size: 14px;
    font-style: italic;
    margin:10px 0 0 44px;
  }
</style>
