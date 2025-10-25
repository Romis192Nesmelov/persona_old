<?php
if (!isset($category) || !isset($permissions)) {
    die('Style internal error. Please try again');
}
?>
<section>
    <div>
        <div class="wrp">
            <div class="w-1 row jsfd">
                <h2><?php echo array_key_exists('id', $category) ? 'Редактировать' : 'Добавить'; ?> зал</h2>
                <div class="w-6-12 row rght cntr-itms">
                    <a class="btn" href="<?php echo base_url(); ?>dashboard/costs">Вернуться к списку залов и мастеров</a>
                    <?php if (array_key_exists('id', $category)) : ?>
                        <?php $this->load->view('widgets/_form-delete', array('delete_path' => 'costs/deleteCategory', 'slug' => $category['id'], 'type' => 'categories', 'disabled' => $permissions['price_delete'])); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="w-1">
                <?php
                if (isset($fields)) {
                    if (array_key_exists('id', $category)) {
                        $category['slug'] = $category['id'];
                    }
                    $this->load->view('widgets/_form', array(
                            'fields' => $fields,
                            'data' => $category,
                            'post' => base_url() . 'dashboard/costs/addCategory',
                            'ajax' => 'costs/updateCategory',
                        )
                    );
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php if (array_key_exists('id', $category)) : ?>
<section id="Selector">
    <div>
        <!-- services -->
        <div class="wrp bot-mrgn-sml">
            <div class="w-1 row jsfd cntr-itms">
                <h2>Категории услуг</h2>
            </div>
        </div>
        <div class="grd">
            <?php $this->load->view('widgets/_btn-add', array('enabled' => $permissions['price_add'], 'type' => 'costs/service', 'get' => '?category=' . $category['id'])); ?>
            <?php foreach ($services as $service) {
                $this->load->view('widgets/_selector-item', array(
                    'slug' => $service['id'],
                    'name' => $service['name'],
                    'type' => 'costs/service',
                    'custom_img_path' => 'price/services/' . $service['id'] . '/',
                    'custom_img_name' => 'bg.jpg'
                ));
            }
            ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if (array_key_exists('id', $category) && isset($files) && $files) : ?>
    <section id="MediaUpload">
        <div>
            <div class="wrp">
                <div class="w-1">
                    <h2>Редактировать медиа-контент</h2>
                </div>
                <?php
                foreach ($files as $file) {
                    $this->load->view('widgets/_form-single-image', array(
                            'type' => 'price/categories',
                            'slug' => $category['id'],
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
