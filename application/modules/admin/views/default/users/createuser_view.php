<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i> <?php echo lang_key("create_user"); ?> </h3>
                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                    <a href="#" data-action="close"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php echo $this->session->flashdata('msg'); ?>
                <form class="form-horizontal" action="<?php echo site_url('admin/users/add'); ?>" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('email'); ?></label>
                        <div class="col-sm-9 col-lg-6 controls">
                            <input type="text" name="email" value="<?php echo set_value('email'); ?>"
                                   placeholder="<?php echo lang_key('email'); ?>" class="form-control">
                            <?php echo form_error('email'); ?>
                            <span class="help-inline">&nbsp;</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('first_name'); ?></label>
                        <div class="col-sm-9 col-lg-6 controls">
                            <input type="text" name="name" value="<?php echo set_value('name'); ?>"
                                   placeholder="<?php echo lang_key('first_name'); ?>" class="form-control">
                            <?php echo form_error('name'); ?>
                            <span class="help-inline">&nbsp;</span>
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('first_name'); ?></label>
                        <div class="col-sm-9 col-lg-6 controls">
                            <input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>"
                                   placeholder="<?php echo lang_key('first_name'); ?>" class="form-control">
                            <?php echo form_error('first_name'); ?>
                            <span class="help-inline">&nbsp;</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('last_name'); ?></label>
                        <div class="col-sm-9 col-lg-6 controls">
                            <input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>"
                                   placeholder="<?php echo lang_key('last_name'); ?>" class="form-control">
                            <?php echo form_error('last_name'); ?>
                            <span class="help-inline">&nbsp;</span>
                        </div>
                    </div>-->
                    <!--<div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('type'); ?></label>
                        <div class="col-sm-9 col-lg-6 controls">
                            <?php $curr_value = (set_value('user_type') != '') ? set_value('user_type') : ''; ?>
                            <select class="form-control" name="user_type" id="user_type">
                                <?php for ($i = 0; $i < count($usertypes); $i++){ 
                                    $sel = ($usertypes[$i]["id"] == set_value('user_type')) ? 'selected="selected"' : '';
                                ?>
                                <option value="<?php echo $usertypes[$i]["id"]; ?>" <?php echo $sel;?>><?php echo lang_key($usertypes[$i]["name"]); ?></option>
                                <?php }?>
                            </select>
                            <?php echo form_error('user_type'); ?>
                            <span class="help-inline">&nbsp;</span>
                        </div>
                    </div>-->
                    <!--<div class="form-group company-holder">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('company_name'); ?></label>
                        <div class="col-sm-9 col-lg-6 controls">
                            <input type="text" name="company_name" value="<?php echo set_value('company_name'); ?>"
                                placeholder="<?php echo lang_key('company_name'); ?>" class="form-control">
                            <?php echo form_error('company_name'); ?>
                            <span class="help-inline">&nbsp;</span>
                        </div>
                    </div>-->
                    <?php 
                    if(get_settings('classified_settings','enable_pricing','No')=='Yes')
                    {
                    ?>
                    <!--<div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('package'); ?></label>
                        <div class="col-sm-9 col-lg-6 controls">
                            <?php $curr_value=(set_value('package')!='')?set_value('package'):'';?>
                            <select class="form-control" name="package">
                                <?php foreach($packages->result() as $package){ 
                                        $sel = ($package->id==set_value('package'))?'selected="selected"':'';
                                ?>
                                <option value="<?php echo $package->id;?>" <?php echo $sel;?>><?php echo lang_key($package->title);?></option>
                                <?php }?>
                            </select>
                            <?php echo form_error('package'); ?>
                            <span class="help-inline">&nbsp;</span>
                        </div>
                    </div>-->
                    <?php
                    }
                    ?>
                    <!--<div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('gender'); ?></label>
                        <div class="col-sm-9 col-lg-6 controls">
                            <?php $curr_value=(set_value('gender')!='')?set_value('gender'):'';?>
                            <select class="form-control" name="gender">
                                <?php $sel=($curr_value=='male')?'selected="selected"':'';?>
                                <option value="male" <?php echo $sel;?>>Male</option>
                                <?php $sel=($curr_value=='female')?'selected="selected"':'';?>
                                <option value="female" <?php echo $sel;?>>Female</option>
                            </select>
                            <?php echo form_error('gender'); ?>
                            <span class="help-inline">&nbsp;</span>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('password'); ?></label>
                        <div class="col-sm-9 col-lg-6 controls">
                            <input type="password" name="password" value="<?php echo ''; ?>"
                                   placeholder="<?php echo lang_key('password'); ?>" class="form-control">
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
                            <span class="help-inline">&nbsp;</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"></label>
                        <div class="col-sm-9 col-lg-6 controls">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-check"></i><?php echo lang_key("create") ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>