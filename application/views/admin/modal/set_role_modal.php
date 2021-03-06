<div class="modal-header">
    <h4 class="modal-title"><i class="fa fa-tags"></i>&nbsp;กำหนดสิทธิ์การใช้เมนู - <b><?php echo $this->role_model->get_role($role_id)->row()->role_name; ?></b></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <div class="bootbox-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">กลุ่มเมนู</th>  
                    <th class="text-center">เมนู</th> 
                    <th class="text-center" width="20%">สถานะ</th>
                    <th class="text-center" width="20%">จัดการสิทธิ์</th>
                </tr>
            </thead> 
            <tbody>
                <?php
                $datas = $this->role_model->get_menu();
                if ($datas->num_rows() > 0) {
                    $i = 1;
                    foreach ($datas->result() as $data) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data->group_menu_name; ?></td>
                            <td><?php echo $data->menu_name; ?></td>
                            <?php
                            $check_stetus_role = $this->role_model->check_StetusRole($role_id, $data->menu_id);
                            if ($check_stetus_role == 0) {
                                ?>
                                <td class="text-center" id="<?php echo 'role_show_checkbock' . $data->menu_id; ?>" >
                                    <span class="badge badge-warning" ><i class="fa fa-times-circle"></i>&nbsp;ไม่อนุญาต</span>
                                </td>
                            <?php } else {
                                ?>
                                <td class="text-center" id="<?php echo 'role_show_checkbock' . $data->menu_id; ?>" >
                                    <span class="badge badge-success" ><i class="fa fa-check-circle"></i>&nbsp;อนุญาต</span>
                                </td>
                            <?php } ?>
                            <td>
                                <div class="switch text-center">
                                    <label>
                                        <input type="checkbox" onchange="switchRole('<?php echo $role_id; ?>', '<?php echo $data->menu_id; ?>', this);" id="checkbox_<?php echo $data->menu_id; ?>" <?php echo ($check_stetus_role == 0 ? '' : 'checked'); ?>><span class="lever"></span>
                                    </label>
                                </div>
                            </td>
                            <?php
                            $i++;
                        }
                    } else {
                        ?>
                    <tr>
                        <td class="text-center" colspan="10">ไม่มีข้อมูล</td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>                    
</div>
<div class="modal-footer">
    <button class="btn btn-outline-success" onclick="location.reload();"><i class="fa fa-refresh"></i>&nbsp;รีโหลด</button>
    <button class="btn btn-outline-inverse" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;ปิด</button>
</div>
