<?php
if (!isset($price) || !isset($permissions)) {
    die('Style internal error. Please try again');
}
?>
<section>
    <div>
        <div class="wrp">
            <div class="w-1 row jsfd">
                <h2><?php echo array_key_exists('id', $price) ? 'Редактировать' : 'Добавить'; ?> прайс</h2>
                <div class="w-6-12 row rght cntr-itms">
                    <a class="btn" href="<?php echo base_url(); ?>dashboard/costs/service/<?= $price['price_service_id'] ?>">Вернуться к услуге</a>
                    <?php if (array_key_exists('id', $price)) : ?>
                        <?php $this->load->view('widgets/_form-delete', array('delete_path' => 'costs/deleteServiceDetails', 'slug' => $price['id'], 'type' => $price['price_service_id'], 'disabled' => $permissions['price_delete'])); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="w-1">
                <?php
                if (isset($fields)) {
                    $this->load->view('widgets/_form', array(
                            'fields' => $fields,
                            'data' => $price,
                            'post' => base_url() . 'dashboard/costs/addServiceDetails',
                            'ajax' => 'costs/updateServiceDetails',
                        )
                    );
                }
                ?>
            </div>
        </div>
    </div>
</section>
