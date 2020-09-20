<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>Настройки 2CheckOut </h3>

                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php echo $this->session->flashdata('msg'); ?>
                <?php $settings = json_decode($settings);?>
                <form class="form-horizontal" action="<?php echo site_url('admin/classified/savecheckout2settings/');?>" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('sandbox_mode'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="enable_sandbox_mode" class="form-control">
                                <?php $options = array('No','Yes');?>
                                <?php foreach($options as $row){?>
                                    <?php $sel=($settings->enable_sandbox_mode==$row)?'selected="selected"':'';?>
                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="enable_sandbox_mode_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('enable_sandbox_mode'); ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('currency'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="currency" class="form-control">
                                <?php $options = get_all_currencies();?>
                                <?php foreach($options as $currency=>$val){?>
                                    <?php $sel=($settings->currency==$currency)?'selected="selected"':'';?>
                                    <option value="<?php echo $currency;?>" <?php echo $sel;?>><?php echo $val[0].' ('.get_currency_icon($currency).' '. $currency.')';?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="currency_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('currency'); ?>
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
