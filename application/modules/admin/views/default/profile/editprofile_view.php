<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i><?php echo lang_key("edit_profile") ?> </h3>
                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                    <a href="#" data-action="close"><i class="fa fa-times"></i></a></div>
            </div>
            <div class="box-content">
                <?php echo $this->session->flashdata('msg'); ?>
                <?php //echo validation_errors(); ?>
                <form class="form-horizontal" action="<?php echo site_url('admin/updateprofile'); ?>" method="post">
                    <?php if(isset($action) && $action=='edituser'){?>
                    <input type="hidden" name="action" value="edituser" />
                    <input type="hidden" name="id" value="<?php echo $profile->num; ?>"/>
                    <?php }else{?>
                    <input type="hidden" name="action" value="editprofile" />
                    <?php if(is_admin()){?>
                    <input type="hidden" name="id" value="<?php echo $this->session->userdata('user_id'); ?>"/>
                    <?php }else{?>
                    <input type="hidden" name="id" value="<?php echo $profile->num; ?>"/>
                    <?php }?>
                    <?php }?>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">&nbsp;</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <img class="thumbnail" id="user_photo" src="<?php echo get_profile_photo_by_id($profile->num,'thumb');?>"  style="width:100px;" />
                            <span id="profile_photo_error"><?php echo form_error('profile_photo'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('name'); ?></label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="name" value="<?php echo $profile->name; ?>" placeholder="<?php echo lang_key('name'); ?>" class="form-control">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('name'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('username'); ?></label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="email" value="<?php echo $profile->email; ?>" placeholder="<?php echo lang_key('username'); ?>" class="form-control">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('email'); ?>
                        </div>
                    </div>
                    <?php if(is_admin() && $this->session->userdata('user_id')!=$profile->num){ // if i am admin the user is someone else?>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('password'); ?></label>
                            <div class="col-sm-9 col-lg-6 controls">
                                <input type="password" name="password" value="<?php echo ''; ?>"
                                       placeholder="<?php echo lang_key('admin_change_pass_help'); ?>" class="form-control">
                                <?php echo form_error('password'); ?>
                                <span class="help-inline">&nbsp;</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('re_password'); ?></label>
                            <div class="col-sm-9 col-lg-6 controls">
                                <input type="password" name="confirm_password" value="<?php echo ''; ?>"
                                       placeholder="<?php echo lang_key('confirm_password'); ?>" class="form-control">
                                <?php echo form_error('confirm_password'); ?>
                                <span class="help-inline"><?php echo lang_key('admin_change_pass_help');?></span>
                            </div>
                        </div>
                    <?php }?>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('coins'); ?></label>
                        <?php $v = (set_value('coins')) ? set_value('coins') : $profile->coins; ?>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="coins" value="<?php echo $v; ?>" placeholder="<?php echo lang_key('coins'); ?>" class="form-control">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('coins'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"></label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <button class="btn btn-primary" type="submit"><i
                                    class="fa fa-check"></i><?php echo lang_key("update") ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
    var base_url = "<?php echo base_url();?>";

    jQuery('#profile_photo').change(function(){
        var val = jQuery(this).val();
        var src = base_url+'uploads/profile_photos/thumb/'+val;        

        jQuery('#user_photo').attr('src',src);
    }).change();
    jQuery('#user_type').change(function(){
        var val = jQuery(this).val();
        //alert(val);
        if(val==3)
        {
            jQuery('.company-holder').hide();
        }
        else
        {            
            jQuery('.company-holder').show();
        }
    }).change();
});

</script>