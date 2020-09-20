<link href="<?php echo base_url();?>assets/datatable/dataTables.bootstrap.css" rel="stylesheet">
<div class="row">
    <div class="col-md-12">
        <?php echo $this->session->flashdata('msg'); ?>
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i> <?php echo lang_key('all_users'); ?></h3>
                <?php $page = ($this->uri->segment(5)!='')?$this->uri->segment(5):0;?>
                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php $this->load->helper('text'); ?>
                <?php if ($posts->num_rows() <= 0) { ?>
                    <div class="alert alert-info"><?php echo lang_key('no_pages'); ?></div>
                <?php } else { ?>
                    <div style="margin-bottom: 10px;" class="row col-md-12 col-sm-12 col-xs-12 pull-left text-left">
                        <div class="row col-md-2 col-sm-2">
                            <select  id="opts" class="form-control">
                                <option value="mass_ban">Забанить</option>
                                <option value="mass_unban">Разбанить</option>
                                <option value="mass_delete">Удалить</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <button class="btn btn-info" id="opts_go">Выполнить</button>
                        </div>
                        <a href="<?php echo site_url('admin/users/create');?>" class="btn btn-success"><?php echo lang_key('create_user'); ?></a>
                        <a href="<?php echo site_url('admin/users/exportemails');?>" class="btn btn-info"><?php echo lang_key('export_user_email'); ?></a>
                    </div>
                    <div style="clear:both;margin-top:30px;"></div>
                    <div id="no-more-tables">
                        <table id="all-posts" class="table table-hover">
                            <thead>
                            <tr>
                                <th class="numeric"><input style="width: 15px;" type="checkbox" class="form-control allcheck"></th>
                                <th class="numeric">#</th>
                                <th class="numeric"><?php echo lang_key('image'); ?></th>
                                <th class="numeric"><?php echo lang_key('name'); ?></th>
                                <th class="numeric"><?php echo lang_key('email'); ?></th>
                                <!--<th class="numeric"><?php echo lang_key('vkontakte'); ?></th>-->
                                <th class="numeric"><?php echo lang_key('odnoklassniki'); ?></th>
                                <th class="numeric"><?php echo lang_key('coins'); ?></th>
                                <th class="numeric"><?php echo lang_key('last_seen'); ?></th>
                                <th class="numeric"><?php echo lang_key('status');?></th>
                                <th class="numeric"><?php echo lang_key('options');?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($posts->result() as $row): ?>
                                <tr>
                                    <td data-title="check" class="numeric"><input style="width: 15px;" type="checkbox" data-id="<?=$row->num?>" class="form-control check_item"></td>
                                    <td data-title="#" class="numeric"><?php echo $i; ?></td>
                                    <td data-title="<?php echo lang_key('image'); ?>" class="numeric">
                                        <img src="<?php echo get_profile_photo_by_id($row->num,'thumb'); ?>" class="thumbnail" style="height:36px;">
                                    </td>
                                    <td data-title="<?php echo lang_key('name'); ?>" class="numeric">
                                        <a href="<?php echo site_url('admin/users/detail/' . $row->num); ?>"><?php echo $row->name; ?></a>
                                    </td>
                                    <td data-title="<?php echo lang_key('email'); ?>" class="numeric"><?php echo $row->email; ?></td>
                                    <!--<td data-title="<?php echo lang_key('vkontakte'); ?>" class="numeric">
                                        <?php if ($row->vk_id != 0){?>
                                            <a target="_blank" href="<?php echo 'https://vk.com/id' . $row->vk_id; ?>"><?php echo 'vk.com/id' . $row->vk_id; ?></a>
                                        <?php } ?>
                                    </td>-->
                                    <td data-title="<?php echo lang_key('odnoklassniki'); ?>" class="numeric">
                                        <?php if ($row->ok_id != 0){?>
                                            <a target="_blank" href="<?php echo 'https://ok.ru/profile/' . $row->ok_id; ?>"><?php echo 'ok.ru/profile/' . $row->ok_id; ?></a>
                                        <?php } ?>
                                    </td>
                                    <td data-title="<?php echo lang_key('coins'); ?>" class="numeric"><?php echo $row->coins; ?></td>
                                    <td data-title="<?php echo lang_key('last_seen'); ?>" class="numeric"><?php echo date('m/d/Y', $row->last_seen); ?></td>
                                    <td data-title="<?php echo lang_key('status');?>" class="numeric">
                                        <?php
                                        /*if ($row->pending == 1)
                                            echo '<div class="label label-info">Pending</div>';
                                        else */
                                        if ($row->banned == 1)
                                            echo '<div class="label label-danger">Banned</div>';
                                        else {
                                            echo '<div class="label label-success">Active</div>';
                                        }
                                        ?>
                                    </td>
                                    <td data-title="<?php echo lang_key('options');?>" class="numeric">
                                        <div class="btn-group">
                                            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="">
                                                <i class="fa fa-cog"></i><?php echo lang_key('action');?> <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu dropdown-info">
                                                <!--li><a href="<?php echo site_url('admin/userdetail/' . $row->name) ?>"
                                                       target="_blank">Profile</a></li-->
                                                <li><a href="<?php echo site_url('admin/edituser/' . $row->num); ?>"><?php echo lang_key('edit');?></a>
                                                </li>
                                                <li><a href="<?php echo site_url('admin/userdetail/' . $row->num); ?>"><?php echo lang_key('detail') ?></a>
                                                </li>
                                                <?php //if($row->pending == 1){?>
                                                <!--<li><a href="<?php echo site_url('admin/confirmuser/'.$page.'/'. $row->num); ?>"><?php echo lang_key('confirm') ?></a>
                                                </li>-->
                                                <?php //} ?>
                                                <?php if($row->num != 1){?>
                                                    <li><a href="<?php echo site_url('admin/deleteuser/'.$page.'/'. $row->num); ?>"><?php echo lang_key('delete');?></a>
                                                    </li>
                                                    <?php
                                                    if ($row->banned == 1) {
                                                        ?>
                                                        <li>
                                                            <a href="<?php echo site_url('admin/users/unban_user/' . $row->num . '/' . $this->uri->segment(5)); ?>"><?php echo lang_key('unban');?></a>
                                                        </li>
                                                    <?php
                                                    } else {
                                                        ?>
                                                        <li>
                                                            <a href="<?php echo site_url('admin/users/ban_user/' . $row->num . '/' . $this->uri->segment(5)); ?>"><?php echo lang_key('ban');?></a>
                                                        </li>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++;endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>assets/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/datatable/dataTables.bootstrap.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        $('body').on('change', '.allcheck:checked ', function() {
            $('.check_item').prop({
                checked: true
            });
        });
        $('body').on('change', '.allcheck:not(:checked)', function() {
            $('.check_item').prop({
                checked: false
            });
        });

        $('body').on('click','#opts_go',function(){
            var vals = $('.check_item').map(function(i,el){
                if($(el).prop('checked')){
                    return id = $(el).data("id");
                }
            }).get();

            if(vals.length >0 )
            {
                var opt = $('#opts').val();
                console.log(opt);
                if (confirm('Вы уверенны что хотите выполнить это действие?')) {
                    $.ajax({  
                        type: "POST",  
                        url: "<?php echo site_url('admin/users/');?>/"+opt+"/",  
                        data: ({checks:vals}),  
                        success: function(data){  
                            location.reload();
                        }  
                    });
                }
            }
            else{
                alert('Нет выбраных чекбоксов!');
            }
        });
    });
    
    jQuery('#searchkey').keyup(function () {
        var val = jQuery(this).val();
        var loadUrl = '<?php echo site_url('admin/search/');?>';
        jQuery("#bookings").html(ajax_load).load(loadUrl, {'key': val});
    });
    
    var ajax_load = '<div class="box">loading...</div>';
    
    jQuery('document').ready(function () {
        jQuery('#all-posts').dataTable();
        jQuery.ajaxSetup({
            cache: false
        });
    });
</script>