<?php
if (!isset($style_category) || !isset($permissions)) {
    die('Style internal error. Please try again');
}
?>
<section>
    <div>
        <div class="wrp">
            <div class="w-1 row jsfd">
                <h2><?php echo array_key_exists('id', $style_category) ? 'Редактировать' : 'Добавить'; ?> подкатегорию услуг</h2>
                <div class="w-6-12 row rght cntr-itms">
                    <a class="btn"
                       href="<?php echo base_url(); ?>dashboard/costs/service/<?= $style_category['price_service_id'] ?>">Вернуться
                        к категории услуг</a>
                    <?php if (array_key_exists('id', $style_category)) : ?>
                        <?php $this->load->view('widgets/_form-delete', array('delete_path' => 'costs/deleteStyleCategory', 'slug' => $style_category['id'], 'type' => $style_category['price_service_id'], 'disabled' => $permissions['price_delete'])); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="w-1">
                <?php
                if (isset($fields)) {
                    if (array_key_exists('id', $style_category)) {
                        $style_category['slug'] = $style_category['id'];
                    }
                    $this->load->view('widgets/_form', array(
                            'fields' => $fields,
                            'data' => $style_category,
                            'post' => base_url() . 'dashboard/costs/addStyleCategory',
                            'ajax' => 'costs/updateStyleCategory',
                        )
                    );
                }
                ?>
            </div>
        </div>
    </div>
</section>
