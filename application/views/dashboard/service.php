<?php
if (!isset($service) || !isset($permissions)) {
    die('Service internal error. Please try again');
}
?>
<section>
    <div>
        <div class="wrp">
            <div class="w-1 row jsfd">
                <h2><?php echo array_key_exists('slug', $service) ? 'Редактировать' : 'Добавить'; ?> информацию об услуге</h2>
                <?php if (array_key_exists('slug', $service)) : ?>
                    <div class="w-6-12 row rght cntr-itms">
                        <a class="btn" href="<?php echo base_url(); ?><?php echo $service['slug']; ?>" target="_blank">Перейти на страницу услуги</a>
                        <?php $this->load->view('widgets/_form-delete', array('slug' => $service['slug'], 'type' => 'services', 'disabled' => $permissions['services_delete'])); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-1">
                <?php
                if (isset($fields)) {
                    $this->load->view('widgets/_form', array(
                            'fields' => $fields,
                            'data' => $service,
                            'post' => base_url() . 'dashboard/addData',
                            'ajax' => 'updateData',
                        )
                    );
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php if (array_key_exists('slug', $service) && $permissions['styles_view'] && isset($styles)) : ?>
    <section id="Selector">
        <div>
            <div class="wrp bot-mrgn-sml">
                <div class="w-1 row jsfd cntr-itms">
                    <h2>Список подуслуг</h2>
                    <div class="w-6-12 row rght cntr-itms">
                        <?php $this->load->view('widgets/_btn-order-by', array('disabled' => $permissions['order_by'], 'type' => 'styles')); ?>
                    </div>
                </div>
            </div>
            <div class="grd">
                <?php $this->load->view('widgets/_btn-add', array('enabled' => $permissions['styles_add'], 'type' => 'style', 'get' => '?service=' . $service['slug'])); ?>
                <?php foreach ($styles as $style) {
                    $this->load->view('widgets/_selector-item', array('slug' => $style['slug'], 'name' => $style['name'], 'type' => 'styles'));//'get' => '?service=' . $service['slug']));
                }
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (array_key_exists('slug', $service) && isset($files) && $files) : ?>
    <section id="MediaUpload">
        <div>
            <div class="wrp">
                <div class="w-1">
                    <h2>Редактировать медиа-контент</h2>
                </div>
                <?php
                foreach ($files as $file) {
                    $this->load->view('widgets/_form-single-image', array(
                            'type' => 'services',
                            'slug' => $service['slug'],
                            'params' => $file,
                            'disabled' => $permissions['services_upload'] == 0,
                        )
                    );
                }
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>
