<?php
if (!isset($article) || !isset($permissions)) {
    die('Style internal error. Please try again');
}
?>
    <section>
        <div>
            <div class="wrp">
                <div class="w-1 row jsfd">
                    <h2><?php echo array_key_exists('id', $article) ? 'Редактировать' : 'Добавить'; ?> статью</h2>
                    <div class="w-6-12 row rght cntr-itms">
                    <?php if (array_key_exists('id', $article)) : ?>
                        <a target="_blank" class="btn" href="<?php echo base_url(); ?>blog/<?= $article['slug'] ?>">Посмотреть статью</a>
                        <?php $this->load->view('widgets/_form-delete', array('delete_path' => 'deleteArticle', 'slug' => $article['id'], 'type' => 'articles', 'disabled' => $permissions['articles_delete'])); ?>
                    <?php else: ?>
                        <a class="btn" href="<?php echo base_url(); ?>dashboard/articles">Вернуться к списку статей</a>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="w-1">
                    <?php
                    if (isset($fields)) {
                        $this->load->view('widgets/_form', array(
                                'fields' => $fields,
                                'data' => $article,
                                'radio_list' => $salons,
                                'post' => base_url() . 'dashboard/addArticle',
                                'ajax' => 'updateArticle',
                            )
                        );
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php if (array_key_exists('id', $article) && isset($files) && $files) : ?>
    <section id="MediaUpload">
        <div>
            <div class="wrp">
                <div class="w-1">
                    <h2>Редактировать медиа-контент</h2>
                </div>
                <?php
                foreach ($files as $file) {
                    $this->load->view('widgets/_form-single-image', array(
                            'type' => 'articles',
                            'slug' => $article['id'],
                            'params' => $file,
                            'disabled' => $permissions['articles_upload'] == 0,
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

                $files = get_filenames('./media/articles/' . $article['id'] . '/gallery/');
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
                        'max_size' => '500000',
                        'max_width' => '1700',
                        'min_width' => '100',
                        'max_height' => '1700',
                        'min_height' => '100',
                        'mime' => 'image/jpeg',
                        'ext' => 'jpg',
                        'allow_delete' => 1,
                    );
                    $this->load->view('widgets/_form-single-image', array(
                            'type' => 'articles',
                            'slug' => $article['id'] . '/gallery',
                            'params' => $file,
                            'disabled' => $permissions['articles_upload'] == 0,
                            'tooltip' => true
                        )
                    );
                }
                $new_number = $last_int + 1;
                $file = array(
                    'slug' => 'photo',
                    'number' => $new_number,
                    'title' => 'Фото',
                    'max_size' => '900000',
                    'max_width' => '1700',
                    'min_width' => '100',
                    'max_height' => '1700',
                    'min_height' => '100',
                    'mime' => 'image/jpeg',
                    'ext' => 'jpg',
                    'add_form' => 1
                );
                $this->load->view('widgets/_form-mass-image', array(
                        'type' => 'articles',
                        'slug' => $article['id'] . '/gallery',
                        'params' => $file,
                        'disabled' => $permissions['articles_upload'] == 0,
                        'tooltip' => false
                    )
                );
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>