<?php
if (!isset($master) && !isset($permissions)) {
    die('Block internal error');
}

?>
<section>
    <div>
        <div class="wrp">
            <div class="w-1 row jsfd">
                <h2><?php echo array_key_exists('slug', $master) ? 'Редактировать' : 'Добавить'; ?> информацию о мастере</h2>
                <?php if (array_key_exists('slug', $master)) : ?>
                    <div class="w-6-12 row rght cntr-itms">
                        <?php $this->load->view('widgets/_form-delete', array('delete_path' => 'deleteMaster', 'master' => $master['slug'], 'type' => 'masters', 'slug' => $master['id'], 'disabled' => !$master['sycret_sync'] || !$permissions['masters_delete'])); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-1">
                <?php
                if (isset($fields)) {
                    $this->load->view('widgets/_form', array(
                            'fields' => $fields,
                            'data' => $master,
                            'post' => base_url() . 'dashboard/addMaster',
                            'ajax' => 'updateMaster',
                        )
                    );
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php if (array_key_exists('slug', $master)) : ?>
<section id="MediaUpload">
    <div>
        <div class="wrp">
            <div class="w-1">
                <h2>Редактировать медиа-контент</h2>
            </div>
            <?php
            foreach ($files as $file) {
                $this->load->view('widgets/_form-single-image', array(
                        'type' => 'masters',
                        'slug' => $master['slug'],
                        'params' => $file,
                        'disabled' => $permissions['masters_upload'] == 0 || $master['sycret_sync'] == 1,
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
            $files = get_filenames('./media/masters/' . $master['slug'] . '/gallery/');
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
                    'max_width' => '450',
                    'min_width' => '450',
                    'max_height' => '450',
                    'min_height' => '450',
                    'mime' => 'image/jpeg', // jpg, jpeg
                    'ext' => 'jpg',
                    'allow_delete' => 1
                );
                $this->load->view('widgets/_form-single-image', array(
                        'type' => 'masters',
                        'slug' => $master['slug'] . '/gallery',
                        'params' => $file,
                        'disabled' => $permissions['masters_upload'] == 0,
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
                'max_width' => '450',
                'min_width' => '450',
                'max_height' => '450',
                'min_height' => '450',
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
                'add_form' => 1
            );
            $this->load->view('widgets/_form-mass-image', array(
                    'type' => 'masters',
                    'slug' => $master['slug'] . '/gallery',
                    'params' => $file,
                    'disabled' => $permissions['masters_upload'] == 0,
                    'tooltip' => false
                )
            );
            ?>
        </div>
    </div>
</section>
<?php endif ?>