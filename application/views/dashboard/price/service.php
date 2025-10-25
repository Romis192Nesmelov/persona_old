<?php
if (!isset($service) || !isset($permissions)) {
    die('Style internal error. Please try again');
}

?>
<section>
    <div>
        <div class="wrp">
            <div class="w-1 row jsfd">
                <h2><?php echo array_key_exists('id', $service) ? 'Редактировать' : 'Добавить'; ?> категорию услуг</h2>
                <div class="w-6-12 row rght cntr-itms">
                    <a class="btn" href="<?php echo base_url(); ?>dashboard/costs/category/<?= $service['price_category_id'] ?>">Вернуться к залу</a>
                    <?php if (array_key_exists('id', $service)) : ?>
                        <?php $this->load->view('widgets/_form-delete', array('delete_path' => 'costs/deleteService', 'slug' => $service['id'], 'type' => $service['price_category_id'], 'disabled' => $permissions['price_delete'])); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="w-1">
                <?php
                if (isset($fields)) {
                    if (array_key_exists('id', $service)) {
                        $service['slug'] = $service['id'];
                    }
                    $this->load->view('widgets/_form', array(
                            'fields' => $fields,
                            'data' => $service,
                            'post' => base_url() . 'dashboard/costs/addService',
                            'ajax' => 'costs/updateService',
                        )
                    );
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php if (array_key_exists('id', $service)) : ?>
    <section id="Selector">
        <div>
            <!-- services -->
            <div class="wrp bot-mrgn-sml">
                <div class="w-1 row jsfd cntr-itms">
                    <h2>Подкатегории услуг</h2>
                </div>
            </div>
            <div class="grd">
                <?php $this->load->view('widgets/_btn-add', array('enabled' => $permissions['price_add'], 'type' => 'costs/style_category', 'get' => '?service=' . $service['id'])); ?>
                <?php foreach ($style_categories as $style_category) {
                    $this->load->view('widgets/_selector-item', array(
                        'slug' => $style_category['id'],
                        'name' => $style_category['name'],
                        'type' => 'costs/style_category',
                        'no_image' => true
                    ));
                }
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (array_key_exists('id', $service)) : ?>
    <section id="Selector">
        <div>
            <!-- services -->
            <div class="wrp bot-mrgn-sml">
                <div class="w-1 row jsfd cntr-itms">
                    <h2>Услуги</h2>
                </div>
            </div>
            <div class="grd">
                <?php $this->load->view('widgets/_btn-add', array('enabled' => $permissions['price_add'], 'type' => 'costs/style', 'get' => '?service=' . $service['id'])); ?>
                <?php foreach ($styles as $style) {
                    $this->load->view('widgets/_selector-item', array(
                        'slug' => $style['id'],
                        'name' => $style['name'],
                        'type' => 'costs/style',
                        'no_image' => true
                    ));
                }
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (array_key_exists('id', $service) && isset($files) && $files) : ?>
    <section id="MediaUpload">
        <div>
            <div class="wrp">
                <div class="w-1">
                    <h2>Редактировать медиа-контент</h2>
                </div>
                <?php
                foreach ($files as $file) {
                    $this->load->view('widgets/_form-single-image', array(
                            'type' => 'price/services',
                            'slug' => $service['id'],
                            'params' => $file,
                            'disabled' => $permissions['price_edit'] == 0,
                        )
                    );
                }
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>