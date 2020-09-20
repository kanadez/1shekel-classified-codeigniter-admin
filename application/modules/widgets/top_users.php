<?php
$CI = get_instance();
$CI->load->database();
$CI->db->where('status',1);
$CI->db->select('created_by, COUNT(created_by) as total');
$CI->db->group_by('created_by');
$CI->db->order_by('total', 'desc');
$CI->db->limit(3);
$query = $CI->db->get('posts');

?>
<div class="s-widget">
    <div class="title-widget"><i class="fa fa-user color"></i>  <?php echo lang_key('top_users') ?></div>
    <div class="widget-content tabs">
        <div class="nav-tabs-two">

            <!-- Tab content -->
                <!-- Popular posts -->
                <div id="popular" class="tab-pane">
                    <ul>
                        <?php foreach ($query->result() as $post) { ?>
                        <li class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                            <a href="<?php echo site_url('profile/'.$post->created_by.'/'.get_user_fullname_by_id($post->created_by));?>">
                                <!-- Item image -->
                                <img class="img-responsive img-thumbnail" alt="<?php echo get_user_fullname_by_id($post->created_by);?>" src="<?php echo get_profile_photo_by_id($post->created_by,'thumb');?>">
                                <h6><?php echo get_user_fullname_by_id($post->created_by);?></h6>
                                <!-- Item title -->
                                <span class="label label-red" style="color: #ffffff"> <?php echo lang_key('posts');?>: <?php echo $post->total;?></span>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- Recent posts -->


        </div>
    </div>
</div>
<div style="clear:both"></div>
