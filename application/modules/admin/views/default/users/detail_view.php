<?php $this->load->helper('date');?>
<?php echo $this->session->flashdata('msg');?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-file"></i> <?php echo lang_key('profile_info'); ?></h3>
                <div class="box-tool">
                    <a data-action="collapse" href="extra_profile.html#"><i class="fa fa-chevron-up"></i></a>

                </div>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-md-3">
                        <img class="img-responsive img-thumbnail" src="<?php echo get_profile_photo_by_id($profile->num);?>">
                    </div>
                    <div class="col-md-9 user-profile-info">
                        <p>
                            <span><?php echo lang_key('first_name'); ?>:</span> <?php echo $profile->name ?>
                        </p>
                        
                        
                        <p>
                            <span><?php echo lang_key('email'); ?>:</span><a href="mailto:<?php echo $profile->email; ?>"><?php echo $profile->email; ?></a>
                        </p>
                        <?php if($profile->num!=1){?>
                        <p>
                            <a href="<?php echo site_url('admin/banuser/'.$profile->num.'/forever');?>" class="btn btn-warning"><?php echo lang_key('ban_forever'); ?></a>
                            <a href="<?php echo site_url('admin/deleteuser/0/' . $profile->num); ?>" class="btn btn-danger"><?php echo lang_key('delete');?></a>
                        </p>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




