
<div class="clearfix" style="height: 10px"></div>
<?php if(@file_exists('./sitemap.xml')){?>
    <div class="title-footer"><i class="fa fa-sitemap"></i>  <?php echo lang_key('site_map');?></div>
    <a href="<?php echo site_url('show/sitemap')?>" target="_blank"><?php echo lang_key('show_site_map');?></a>
<?php }?>
