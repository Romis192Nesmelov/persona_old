<?php
if (!isset($master) || !isset($permissions)) {
    die('Style internal error. Please try again');
}
?>
<section>
    <div>
        <div class="wrp">
            <div class="w-1 row jsfd">
                <h2><?php echo array_key_exists('id', $master) ? 'Редактировать' : 'Добавить'; ?> категорию мастеров</h2>
                <div class="w-6-12 row rght cntr-itms">
                    <a class="btn" href="<?php echo base_url(); ?>dashboard/costs">Вернуться к списку категорий мастеров</a>
                    <?php if (array_key_exists('id', $master)) : ?>
                        <?php $this->load->view('widgets/_form-delete', array('delete_path' => 'costs/deleteMaster', 'slug' => $master['id'], 'type' => 'masters', 'disabled' => $permissions['price_delete'])); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="w-1">
                <?php
                if (isset($fields)) {
                    if (array_key_exists('id', $master)) {
                        $master['slug'] = $master['id'];
                    }
                    $this->load->view('widgets/_form', array(
                            'fields' => $fields,
                            'data' => $master,
                            'post' => base_url() . 'dashboard/costs/addMaster',
                            'ajax' => 'costs/updateMaster',
                        )
                    );
                }
                ?>
            </div>
        </div>
    </div>
</section>
