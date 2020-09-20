<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>Минус-слова </h3>
                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php echo $this->session->flashdata('msg'); ?>
                <?php echo validation_errors();?>
                <?php //$settings = json_decode($settings);?>
                <form class="form-horizontal" action="<?php echo site_url('admin/classified/minuswords/');?>" method="post">
                    <div class="form-group">
                        <label class="col-sm-12 col-lg-12 ">Минимальный процент русских символов, %</label>
                        <div class="col-sm-12 col-md-12 controls">
                            <input type="number" name="percent" min='0' max="100" value="<?=$percent?>" class="form-control">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('publish_directly'); ?>
                        </div>
                        <div class="col-sm-12 col-md-12 controls">
                            <textarea name="words" id="" cols="30" rows="10" class="form-control"><?=$words?></textarea>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('publish_directly'); ?>
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
