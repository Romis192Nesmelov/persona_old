<?php
if (!isset($offer) && !isset($permissions)) {
    die('Block internal error');
}

?>
<section>
    <div>
        <div class="wrp">
            <div class="w-1 row jsfd">
                <h2><?php echo array_key_exists('slug', $offer) ? 'Редактировать' : 'Добавить'; ?> акцию</h2>
                <?php if (array_key_exists('slug', $offer)) : ?>
                    <div class="w-6-12 row rght cntr-itms">
                        <?php $this->load->view('widgets/_form-delete', array('delete_path' => 'deleteOffer', 'slug' => $offer['slug'], 'type' => 'offers', 'disabled' => $permissions['offers_delete'])); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-1">
                <?php

                if (isset($fields)) {
                    $this->load->view('widgets/_form', array(
                            'fields' => $fields,
                            'data' => $offer,
                            'post' => base_url() . 'dashboard/addOffer',
                            'ajax' => 'updateOffer',
                        )
                    );
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php if (array_key_exists('slug', $offer)) : ?>
<section id="MediaUpload">
    <div>
        <div class="wrp">
            <div class="w-1">
                <h2>Редактировать медиа-контент</h2>
            </div>
            <?php
            foreach ($files as $file) {
                $this->load->view('widgets/_form-single-image', array(
                        'type' => 'offers',
                        'slug' => $offer['slug'],
                        'params' => $file,
                        'disabled' => $permissions['offers_upload'] == 0,
                    )
                );
            }
            ?>
        </div>
    </div>
</section>
<?php endif ?>