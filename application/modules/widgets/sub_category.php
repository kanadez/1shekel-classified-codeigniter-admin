<?php
$CI = get_instance();
$CI->load->model('user/post_model');
$category_id =  $CI->uri->segment(4);
$CI->load->database();
$CI->db->order_by('id','desc');
$CI->db->where(array('status'=>1,'parent'=>$category_id));
$query = $CI->db->get('categories');
//echo $CI->db->last_query();die;

?>
<div class="s-widget">
    <!-- Heading -->
    <h5><i class="fa fa-sun-o color"></i>&nbsp; <?php echo lang_key('all_sub_categories');?></h5>
    <!-- Widgets Content -->
    <div class="widget-content hot-properties">
        <?php if($query->num_rows()<=0){?>
            <div class="alert alert-info"><?php echo lang_key('no_sub_categories');?></div>
        <?php }else{?>
            <ul class="list-unstyled list-6">
                <?php
                foreach ($query->result() as $post) {
                    ?>
                    <li class="col-xs-12 col-sm-6 col-md-12 col-lg-12"><a href="<?php echo site_url('show/categoryposts/'.$post->id.'/'.dbc_url_title(lang_key($post->title)));?>"><?php echo dbc_url_title(lang_key($post->title)); ?> <span dir="rtl" class="color">(<?php echo $CI->post_model->count_post_by_category_id($post->id);?>)</span></a></li>
                    </li>
                <?php
                }
                ?>
            </ul>
        <?php }?>
    </div>
</div>
<div style="clear:both"></div>