<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i><?php echo lang_key("classified_settings") ?> </h3>

                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php echo $this->session->flashdata('msg'); ?>
                <?php echo validation_errors();?>
                <?php $settings = json_decode($settings);?>
                <form class="form-horizontal" action="<?php echo site_url('admin/classified/saveclassifiedsettings/');?>" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('show_map_on_homepage'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="show_map_on_homepage" class="form-control">
                                <?php $options = array('Yes','No');?>
                                <?php foreach($options as $row){?>
                                    <?php $sel=($settings->show_map_on_homepage==$row)?'selected="selected"':'';?>
                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="show_map_on_homepage_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('show_map_on_homepage'); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('coin_price_in_shekels'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <input type="text" name="coin_price_in_shekels" value="<?php echo $settings->coin_price_in_shekels;?>" placeholder="" class="form-control" >
                            <input type="hidden" name="coin_price_in_shekels_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('coin_price_in_shekels'); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('per_page'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <input type="text" name="per_page" value="<?php echo $settings->per_page;?>" placeholder="" class="form-control" >
                            <input type="hidden" name="per_page_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('per_page'); ?>
                        </div>
                    </div>

                    <!--<div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('system_currency'); ?></label>
                        <div class="col-sm-9 col-md-3 controls">
                            <select name="system_currency" class="form-control">
                                <?php $options = get_all_currencies();?>
                                <?php foreach($options as $currency=>$val){?>
                                    <?php $sel=($settings->system_currency==$currency)?'selected="selected"':'';?>
                                   <option value="<?php echo $currency;?>" <?php echo $sel;?>><?php echo $val[0].' ('.get_currency_icon($currency).' '. $currency.')';?></option>
                                <?php }?>
                            </select>
                            <input type="radio" name="system_currency_type" value="0" <?php echo $settings->system_currency_type==0?'checked="checked"':'';?>> Use Icon
                            <input type="radio" name="system_currency_type" value="1" <?php echo $settings->system_currency_type==1?'checked="checked"':'';?>> Use Short Code
                            <input type="hidden" name="system_currency_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('system_currency'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('enable_signup'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="enable_signup" class="form-control">
                                <?php $options = array('Yes','No');?>
                                <?php foreach($options as $row){?>
                                    <?php $sel=($settings->enable_signup==$row)?'selected="selected"':'';?>
                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="enable_signup_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('enable_signup'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('if_package_expired'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="hide_posts_if_expired" class="form-control">
                                <?php $options = array('No'=>'do_not_hide','Yes'=>'hide');?>
                                <?php foreach($options as $key=>$row){?>
                                    <?php $sel=($settings->hide_posts_if_expired==$key)?'selected="selected"':'';?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo lang_key($row);?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="hide_posts_if_expired_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('hide_posts_if_expired'); ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('show_admin_user'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="show_admin_agent" class="form-control">
                                <?php $options = array('Yes'=>'Yes','No'=>'No');?>
                                <?php foreach($options as $key=>$row){?>
                                    <?php $sel=($settings->show_admin_agent==$key)?'selected="selected"':'';?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="show_admin_agent_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('show_admin_agent'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('show_state_province'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="show_state_province" class="form-control">
                                <?php $options = array('yes'=>'Yes','no'=>'No');?>
                                <?php foreach($options as $key=>$row){?>
                                    <?php $sel=($settings->show_state_province==$key)?'selected="selected"':'';?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="show_state_province_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('show_state_province'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('show_home_page_banner'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="show_home_page_banner" class="form-control">
                                <?php $options = array('yes'=>'Yes','no'=>'No');?>
                                <?php foreach($options as $key=>$row){?>
                                    <?php $sel=($settings->show_home_page_banner==$key)?'selected="selected"':'';?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="show_home_page_banner_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('show_home_page_banner'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('show_home_page_search'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="show_home_page_search" class="form-control">
                                <?php $options = array('yes'=>'Yes','no'=>'No');?>
                                <?php foreach($options as $key=>$row){?>
                                    <?php $sel=($settings->show_home_page_search==$key)?'selected="selected"':'';?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="show_home_page_search_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('show_home_page_search'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('hide_users_profile_email'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="hide_users_profile_email" class="form-control">
                                <?php $options = array('no'=>'No','yes'=>'Yes');?>
                                <?php foreach($options as $key=>$row){?>
                                    <?php $sel=($settings->hide_users_profile_email==$key)?'selected="selected"':'';?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="hide_users_profile_email_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('hide_users_profile_email'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('hide_users_profile_phone'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="hide_users_profile_phone" class="form-control">
                                <?php $options = array('no'=>'No','yes'=>'Yes');?>
                                <?php foreach($options as $key=>$row){?>
                                    <?php $sel=($settings->hide_users_profile_phone==$key)?'selected="selected"':'';?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="hide_users_profile_phone_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('hide_users_profile_phone'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('city_dropdown'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="city_dropdown" class="form-control">
                                <?php $options = array('dropdown'=>'Dropdown','autocomplete'=>'Autocomplete');?>
                                <?php 
                                    /*
                                    Earlier version does not have city dropdown option
                                    So check for existence
                                    */
                                    if(!isset($settings->city_dropdown))
                                        $settings->city_dropdown = 'autocomplete';
                                ?>
                                <?php foreach($options as $key=>$row){?>
                                    <?php $sel=($settings->city_dropdown==$key)?'selected="selected"':'';?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="city_dropdown_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('city_dropdown'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('posts_per_page'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="posts_per_page" class="form-control">
                                <?php $options = array(3,5,6,9,10,12,15,18,20,24,28,30,33,36,40,50,100);?>
                                <?php foreach($options as $key=>$row){?>
                                    <?php $sel=($settings->posts_per_page==$row)?'selected="selected"':'';?>
                                    <option <?php echo $sel;?> value="<?php echo $row;?>"><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="posts_per_page_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('posts_per_page'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('max_price_for_search'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <input type="text" name="max_price_for_search" value="<?php echo(isset($settings->max_price_for_search))?$settings->max_price_for_search:20000;?>" placeholder="<?php echo lang_key('type_something');?>" class="form-control" >
                            <input type="hidden" name="max_price_for_search_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('max_price_for_search'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('show_price_like'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="currency_placing" class="form-control">
                                <?php $options = array('before_with_no_gap'=>'$1000','before_with_gap'=>'$ 1000','after_with_no_gap'=>'1000$','after_with_gap'=>'1000 $');?>
                                <?php foreach($options as $key=>$row){?>
                                    <?php $sel=($settings->currency_placing==$key)?'selected="selected"':'';?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="currency_placing_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('currency_placing'); ?>
                        </div>
                    </div>

                    <div style="border-bottom:1px solid #aaa;font-weight:bold;font-size:14px;padding:0 0 5px 5px;"><?php echo lang_key('facebook_app_settings');?></div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('enable_facebook_login'); ?></label>
                        <div class="col-sm-9 col-md-3 controls">
                            <select name="enable_fb_login" class="form-control">
                                <?php $options = array('Yes','No');?>
                                <?php foreach($options as $row){?>
                                    <?php $sel=($settings->enable_fb_login==$row)?'selected="selected"':'';?>
                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="enable_fb_login_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('enable_fb_login'); ?>
                        </div>
                    </div>

                    <div class="form-group fb-settings" id="fb_app_id" style="display:none">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('fb_app_id'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="fb_app_id" value="<?php echo(isset($settings->fb_app_id))?$settings->fb_app_id:'';?>" placeholder="<?php echo lang_key('type_something');?>" class="form-control" >
                            <input type="hidden" name="fb_app_id_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('fb_app_id'); ?>
                        </div>
                    </div>

                    <div class="form-group fb-settings" id="fb_secret_key" style="display:none">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('fb_secret_key'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="fb_secret_key" value="<?php echo(isset($settings->fb_secret_key))?$settings->fb_secret_key:'';?>" placeholder="<?php echo lang_key('type_something');?>" class="form-control" >
                            <input type="hidden" name="fb_secret_key_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('fb_secret_key'); ?>
                        </div>
                    </div>-->


                    <!--start-->



                    <!--<div style="border-bottom:1px solid #aaa;font-weight:bold;font-size:14px;padding:0 0 5px 5px;"><?php echo lang_key('comment_settings');?></div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('enable_comment'); ?></label>
                        <div class="col-sm-9 col-md-3 controls">
                            <select name="enable_comment" class="form-control">
                                <?php $options = array('No','Facebook Comment', 'Disqus Comment');?>
                                <?php foreach($options as $row){?>
                                    <?php $v = (set_value('enable_comment')!='')?set_value('enable_comment'):$settings->enable_comment;?>
                                    <?php $sel=($v==$row)?'selected="selected"':'';?>
                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="enable_comment_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('enable_comment'); ?>
                        </div>
                    </div>

                    <div class="form-group fb-comment-settings" id="fb_app_id" style="display:none">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('fb_app_id'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="fb_comment_app_id" value="<?php echo(isset($settings->fb_comment_app_id))?$settings->fb_comment_app_id:'';?>" placeholder="<?php echo lang_key('type_something');?>" class="form-control" >
                            <input type="hidden" name="fb_comment_app_id_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('fb_comment_app_id'); ?>
                        </div>
                    </div>

                    <div class="form-group fb-comment-settings" id="disqus_shortname_holder" style="display:none">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('disqus_shortname'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="disqus_shortname" value="<?php echo(isset($settings->disqus_shortname))?$settings->disqus_shortname:'';?>" placeholder="<?php echo lang_key('type_something');?>" class="form-control" >
                            <input type="hidden" name="disqus_shortname_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('disqus_shortname'); ?>
                        </div>
                    </div>-->



                    <!--End-->

                    <!--div style="border-bottom:1px solid #aaa;font-weight:bold;font-size:14px;padding:0 0 5px 5px;">Google+ app settings</div>
                    <span class="settings-help">
                        <ul>
                            <li>Please use "<?php echo site_url('account/google_plus_auth/auth_callback');?>" as redirect url while creating google+ app</li>
                        </ul>
                    </span>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Enable Google+ login'); ?></label>
                        <div class="col-sm-9 col-md-3 controls">
                            <select name="enable_gplus_login" class="form-control">
                                <?php $options = array('Yes','No');?>
                                <?php foreach($options as $row){?>
                                    <?php $sel=($settings->enable_gplus_login==$row)?'selected="selected"':'';?>
                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="enable_gplus_login_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('enable_gplus_login'); ?>
                        </div>
                    </div>

                    <div class="form-group gplus-settings" id="gplus_app_id">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Google+ client id'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="gplus_app_id" value="<?php echo(isset($settings->gplus_app_id))?$settings->gplus_app_id:'';?>" placeholder="<?php echo lang_key('type_something');?>" class="form-control" >
                            <input type="hidden" name="gplus_app_id_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('gplus_app_id'); ?>
                        </div>
                    </div>

                    <div class="form-group gplus-settings" id="gplus_secret_key">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Google+ client secret'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="gplus_secret_key" value="<?php echo(isset($settings->gplus_secret_key))?$settings->gplus_secret_key:'';?>" placeholder="<?php echo lang_key('type_something');?>" class="form-control" >
                            <input type="hidden" name="gplus_secret_key_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('gplus_secret_key'); ?>
                        </div>
                    </div-->


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
    jQuery('#enable_bank_transfer').change(function(){
        var val = jQuery(this).val();
        if(val=='Yes')
        {
            jQuery('.bank-transfer').show();

            if(jQuery('#enable_feature_payment').val()=='Yes')
                jQuery('input[name=featured_payment_bank_instruction_rules]').val('required');
            else
                jQuery('input[name=featured_payment_bank_instruction_rules]').val('');
            
            jQuery('input[name=signup_payment_bank_instruction_rules]').val('required');
        }
        else
        {
            jQuery('.bank-transfer').hide();
            jQuery('input[name=featured_payment_bank_instruction_rules]').val('');
            jQuery('input[name=signup_payment_bank_instruction_rules]').val('');
        }

    }).change();

    jQuery('#enable_feature_payment').change(function(){
        var val =  jQuery(this).val();
        if(val=='Yes')
        {
            jQuery('input[name=feature_charge_rules]').val('required');
            jQuery('input[name=feature_day_limit_rules]').val('required');
            jQuery('#feature_payment_settings_panel').show();
        }
        else
        {
            jQuery('input[name=feature_charge_rules]').val('');
            jQuery('input[name=feature_day_limit_rules]').val('');
            jQuery('#feature_payment_settings_panel').hide();            
        }
    }).change();

    jQuery('select[name=do_water_mark]').change(function(e){
        var val = jQuery(this).val();
        if(val=='Yes')
        {
            jQuery('input[name=water_mark_text_rules]').attr('value','required');
            jQuery('#water_mark_text').show();
        }
        else
        {
            jQuery('input[name=water_mark_text_rules]').attr('value','');            
            jQuery('#water_mark_text').hide();
        }
    }).change();

    jQuery('select[name=enable_fb_login]').change(function(e){
        var val = jQuery(this).val();
        if(val=='Yes')
        {
            jQuery('input[name=fb_app_id_rules]').attr('value','required');
            jQuery('input[name=fb_secret_key_rules]').attr('value','required');
            jQuery('.fb-settings').show();
        }
        else
        {
            jQuery('input[name=fb_app_id_rules]').attr('value','');
            jQuery('input[name=fb_secret_key_rules]').attr('value','');
            jQuery('.fb-settings').hide();
        }
    }).change();

    /* start facebook comment settings */

    jQuery('select[name=enable_comment]').change(function(e){
        var val = jQuery(this).val();
        if(val=='Facebook Comment')
        {
            jQuery('input[name=fb_comment_app_id_rules]').attr('value','required');
            jQuery('.fb-comment-settings').show();
        }
        else
        {
            jQuery('input[name=fb_comment_app_id_rules]').attr('value','');
            jQuery('.fb-comment-settings').hide();
        }

        if(val=='Disqus Comment')
        {
            jQuery('input[name=disqus_shortname_rules]').attr('value','required');
            jQuery('#disqus_shortname_holder').show();
        }
        else
        {
            jQuery('input[name=disqus_shortname_rules]').attr('value','');
            jQuery('#disqus_shortname_holder').hide();
        }
    }).change();

    /* end facebook comment settings*/

    jQuery('select[name=enable_gplus_login]').change(function(e){
        var val = jQuery(this).val();
        if(val=='Yes')
        {
            jQuery('input[name=gplus_app_id_rules]').attr('value','required');
            jQuery('input[name=gplus_secret_key_rules]').attr('value','required');
            jQuery('.gplus-settings').show();
        }
        else
        {
            jQuery('input[name=gplus_app_id_rules]').attr('value','');
            jQuery('input[name=gplus_secret_key_rules]').attr('value','');
            jQuery('.gplus-settings').hide();
        }
    }).change();
});
</script>