<div class="page-heading-two">
    <div class="container">
        <h2><i class="fa fa-user"></i>&nbsp;<?php echo lang_key('recover'); ?></h2>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 min-height-default">
            <div class="panel panel-default">
                <div class="panel-body">

                    <form action="<?php echo site_url('account/recoverpassword/');?>" method="post">
                        <?php echo $this->session->flashdata('msg');?>
                        <div class="top-margin">
                            <label>Email Address <span class="text-danger">*</span></label>
                            <input type="text" name="user_email" value="<?php echo set_value('user_email');?>" class="form-control">
                        </div>
                        <?php echo form_error('user_email');?>
                        <hr>

                        <div class="row">
                            <div class="col-lg-8">
                                <?php if(get_settings('classified_settings','enable_signup','Yes')=='Yes'){?>
                                <label class="checkbox">
                                    <a target="_blank" href="<?php echo site_url('account/signup');?>"><?php echo lang_key('sign_up'); ?></a>
                                </label>
                                <?php }?>
                            </div>
                            <div class="col-lg-4 text-right">
                                <button class="btn btn-action" type="submit"><?php echo lang_key('recover'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- /row -->
</div>

