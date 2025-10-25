<?php
if (!isset($salon) || !isset($permissions)) {
    die('Salon internal error. Please try again');
}
?>
<section>
    <div>
        <div class="wrp">
            <div class="w-1 row jsfd">
                <h2><?php echo array_key_exists('slug', $salon) ? 'Редактирование' : 'Добавление'; ?> салона</h2>
                <?php if (array_key_exists('slug', $salon)) : ?>
                    <?php if ($salon['slug'] != 'default') : ?>
                        <div class="w-6-12 row rght cntr-itms">
                            <a class="btn" href="<?php echo base_url(); ?><?php echo $salon['slug']; ?>" target="_blank">Перейти на страницу салона</a>
                            <?php $this->load->view('widgets/_form-delete', array('slug' => $salon['slug'], 'type' => 'salons', 'disabled' => $permissions['salons_delete'])); ?>
                        </div>
                    <?php else: ?>
                        <p>Это данные салона по-умолчанию!</p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="w-1">
                <?php
                if (isset($fields)) {
                    $this->load->view('widgets/_form', array(
                            'fields' => $fields,
                            'data' => $salon,
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

<?php if (array_key_exists('slug', $salon) && isset($files)) : ?>
    <section id="MediaUpload">
        <div>
            <div class="wrp">
                <div class="w-1">
                    <h2>Редактировать медиа-контент</h2>
                </div>
                <?php
                foreach ($files as $file) {
                    $this->load->view('widgets/_form-single-image', array(
                            'type' => 'salons',
                            'slug' => $salon['slug'],
                            'params' => $file,
                            'disabled' => $permissions['salons_upload'] == 0,
                        )
                    );
                }
                ?>
            </div>
            <div class="wrp">
                <div class="w-1">
                    <h2>Редактировать галерею</h2>
                </div>
                <?php
                function toInt($str) {
                    return (int) preg_replace('/\D/', '', $str);
                }
                function parseName($str) {
                    return rtrim($str, '.jpg');
                }
                $files = get_filenames('./media/salons/' . $salon['slug'] . '/gallery/');
                $imgs = [];
                foreach ($files as $f) {
                    $imgs[] = str_replace(['.jpg', '.webp'], '', $f);
                }
                $imgs = array_unique($imgs);
                $files = [];
                foreach ($imgs as $img) {
                    $files[] = $img . '.jpg';
                }
                uasort($files, function ($a, $b) {
                    return toInt($a) <=> toInt($b);
                });

                $last_int = 0;
                foreach ($files as $f_name) {
                    if (toInt($f_name) > $last_int) {
                        $last_int = toInt($f_name);
                    }
                    $file = array(
                        'slug' => 'photo',
                        'name' => parseName($f_name),
                        'title' => 'Фото',
                        'max_size' => '300000',
                        'max_width' => '1920',
                        'min_width' => '1000',
                        'max_height' => '450',
                        'min_height' => '200',
                        'mime' => 'image/jpeg', // jpg, jpeg
                        'ext' => 'jpg',
                        'allow_delete' => 1
                    );
                    $this->load->view('widgets/_form-single-image', array(
                            'type' => 'salons',
                            'slug' => $salon['slug'] . '/gallery',
                            'params' => $file,
                            'disabled' => $permissions['salons_upload'] == 0,
                            'tooltip' => true
                        )
                    );
                }

                $new_number = $last_int + 1;
                $file = array(
                    'slug' => 'photo',
                    'number' => $new_number,
                    'title' => 'Фото',
                    'max_size' => '300000',
                    'max_width' => '1920',
                    'min_width' => '1000',
                    'max_height' => '450',
                    'min_height' => '200',
                    'mime' => 'image/jpeg',
                    'ext' => 'jpg',
                    'add_form' => 1
                );
                $this->load->view('widgets/_form-mass-image', array(
                        'type' => 'salons',
                        'slug' => $salon['slug'] . '/gallery',
                        'params' => $file,
                        'disabled' => $permissions['salons_upload'] == 0,
                        'tooltip' => false
                    )
                );
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>
