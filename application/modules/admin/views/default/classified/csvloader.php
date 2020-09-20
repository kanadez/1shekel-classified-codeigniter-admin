<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i><?php echo lang_key("csvloader") ?> </h3>

                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo site_url('admin/classified/uploadcsv/');?>" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('file_to_parse'); ?></label>
                        <div class="col-sm-9 col-md-3 controls">
                            <input id="import_csv_select_input" type="file" name="file" accept=".csv" data-url="csvimport" />
                            <input type="hidden" name="show_map_on_homepage_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('file_to_parse'); ?>
                        </div>
                    </div>
                </form>
                <div id="csvimport_result_wrapper" class="col-sm-12"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>Планировка загрузчика</h3>

                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php echo $this->session->flashdata('msg'); ?>
                <?php echo validation_errors();?>
                <?php $settings = json_decode($settings);?>
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('admin/classified/csvloader/');?>" method="post">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-4 col-lg-4 ">Постепенная загрузка?</label>
                            <div class="col-sm-8 col-md-8 controls">
                                <select name="is_grad"  class="form-control">
                                    <option <?php echo $settings->is_grad == 0 ? "selected" : ""; ?> value="0">Да</option>
                                    <option <?php echo $settings->is_grad == 1 ? "selected" : ""; ?> value="1">Нет</option>
                                </select>
                                 <span class="help-inline">&nbsp;</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-12 col-lg-12 ">Количество постов загружаемых в час.</label>
                            <div class="col-sm-12 col-md-12 controls">
                                <input type="number" name="count" min='1' max="100" value="<?php echo $settings->count; ?>" class="form-control">
                                 <span class="help-inline">&nbsp;</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-12 col-lg-12 ">Файл импорта (CSV, ',', 'UTF-8')</label>
                            <div class="col-sm-12 col-md-12 controls">
                                <input class="custom-file-upload" type="file" name="csv" accept=".csv" data-btn-text="Select a File" />
                            </div>
                        </div>
                        <p></p>
                        <br />
                        <div class="row">
                            <label class="col-sm-12 col-lg-12 ">Картинки</label>
                            <div class="col-sm-12 col-md-12 controls">
                                <input class="custom-file-upload" type="file" multiple name="photos[]" accept="image/*" data-btn-text="Select a File" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-lg-10 controls row">
                            <input class="btn btn-primary" type="submit" value="<?php echo lang_key("update") ?>" />
                        </div>
                    </div>
                </form>
                <div class="form-group">
                    <div class="col-sm-12 col-lg-12 row">
                        <?php echo lang_key($import_status); ?>: <?php echo $import_remaining != 1 ? $import_remaining : ""; ?>
                    </div>
                    <?php //if(count($errors)){ ?>
                        <!--<br>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 ">
                            Ошибки:
                            </div>
                            <ul class="col-sm-12 col-lg-12 ">
                            <?foreach ($data['errors'] as $error) {?>
                             <li><?//=$error?></li>
                            <?}?>
                            </ul>
                        </div>-->
                    <?php //}?>
                </div>
                <!--<div class="form-group clearfix">

                    <div class="col-sm-9 col-lg-10 controls">
                        <a href="<?php //echo site_url('admin/classified/import_clean/');?>" class="btn btn-primary"><i
                                class="fa fa-check"></i>Остановить И Очистить</a>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>
<script src="/assets/admin/js/jquery.ui.widget.js"></script>
<script src="/assets/admin/js/jquery.iframe-transport.js"></script>
<script src="/assets/admin/js/jquery.fileupload.js"></script>
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
    
    $('#import_csv_select_input').fileupload({
            done: function (e, data) {
                $('#csvimport_result_wrapper').html(data.result);
           }
        });
});
</script>