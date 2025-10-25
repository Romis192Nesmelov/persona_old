<?php
if (!isset($style) || !isset($permissions)) {
    die('Style internal error. Please try again');
}
?>
    <section>
        <div>
            <div class="wrp">
                <div class="w-1 row jsfd">
                    <h2><?php echo array_key_exists('slug', $style) ? 'Редактировать' : 'Добавить'; ?> подуслугу</h2>
                    <?php if (array_key_exists('slug', $style)) : ?>
                        <div class="w-6-12 row rght cntr-itms">
                            <a class="btn"
                               href="<?php echo base_url(); ?>dashboard/services/<?php echo $style['slug_service']; ?>">Вернуться
                                к редактированию
                                услуги</a>
                            <?php $this->load->view('widgets/_form-delete', array('slug' => $style['slug'], 'type' => 'styles', 'disabled' => $permissions['styles_delete'])); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="w-1">
                    <?php
                    if (isset($fields)) {
                        $this->load->view('widgets/_form', array(
                                'fields' => $fields,
                                'data' => $style,
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
<?php if (array_key_exists('slug', $style) && isset($files) && $files) : ?>
    <section id="MediaUpload">
        <div>
            <div class="wrp">
                <div class="w-1">
                    <h2>Редактировать медиа-контент</h2>
                </div>
                <?php
                foreach ($files as $file) {
                    $this->load->view('widgets/_form-single-image', array(
                            'type' => 'styles',
                            'slug' => $style['slug'],
                            'params' => $file,
                            'disabled' => $permissions['styles_upload'] == 0,
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
                function toInt($str)
                {
                    return (int)preg_replace('/\D/', '', $str);
                }

                function parseName($str)
                {
                    return rtrim($str, '.jpg');
                }

                $files = get_filenames('./media/styles/' . $style['slug'] . '/gallery/');
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
                        'max_size' => '250000', // 70kb
                        'max_width' => '1000',
                        'min_width' => '200',
                        'max_height' => '1000',
                        'min_height' => '200',
                        'mime' => 'image/jpeg', // jpg, jpeg
                        'ext' => 'jpg',
                        'allow_delete' => 1
                    );
                    $this->load->view('widgets/_form-single-image', array(
                            'type' => 'styles',
                            'slug' => $style['slug'] . '/gallery',
                            'params' => $file,
                            'disabled' => $permissions['styles_upload'] == 0,
                            'tooltip' => true
                        )
                    );
                }
                $new_number = $last_int + 1;
                $file = array(
                    'slug' => 'photo',
                    'number' => $new_number,
                    'title' => 'Фото',
                    'max_size' => '250000', // 50kb
                    'max_width' => '1000',
                    'min_width' => '200',
                    'max_height' => '1000',
                    'min_height' => '200', // 550px
                    'mime' => 'image/jpeg', // jpg, jpeg
                    'ext' => 'jpg',
                    'add_form' => 1
                );
                $this->load->view('widgets/_form-mass-image', array(
                        'type' => 'styles',
                        'slug' => $style['slug'] . '/gallery',
                        'params' => $file,
                        'disabled' => $permissions['styles_upload'] == 0,
                        'tooltip' => false
                    )
                );
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>