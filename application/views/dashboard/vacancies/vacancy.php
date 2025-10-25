<?php
if (!isset($vacancy) || !isset($permissions)) {
    die('Style internal error. Please try again');
}
?>
    <section>
        <div>
            <div class="wrp">
                <div class="w-1 row jsfd">
                    <h2><?php echo array_key_exists('id', $vacancy) ? 'Редактировать' : 'Добавить'; ?> вакансию</h2>
                    <div class="w-6-12 row rght cntr-itms">
                    <?php if (array_key_exists('id', $vacancy)) : ?>
                        <a target="_blank" class="btn" href="<?php echo base_url(); ?>vacancies/<?= $vacancy['slug'] ?>">Посмотреть вакансию</a>
                        <?php $this->load->view('widgets/_form-delete', array('delete_path' => 'vacancies/deleteVacancy', 'slug' => $vacancy['id'], 'type' => 'vacancies', 'disabled' => $permissions['vacancies_delete'])); ?>
                    <?php else: ?>
                        <a class="btn" href="<?php echo base_url(); ?>dashboard/vacancies">Вернуться к списку вакансий</a>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="w-1">
                    <?php
                    if (isset($fields)) {
                        $this->load->view('widgets/_form', array(
                                'fields' => $fields,
                                'data' => $vacancy,
                                'post' => base_url() . 'dashboard/vacancies/addVacancy',
                                'ajax' => 'vacancies/updateVacancy',
                            )
                        );
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php if (array_key_exists('id', $vacancy) && isset($files) && $files) : ?>
    <section id="MediaUpload">
        <div>
            <div class="wrp">
                <div class="w-1">
                    <h2>Редактировать медиа-контент</h2>
                </div>
                <?php
                foreach ($files as $file) {
                    $this->load->view('widgets/_form-single-image', array(
                            'type' => 'vacancies',
                            'slug' => $vacancy['id'],
                            'params' => $file,
                            'disabled' => $permissions['vacancies_upload'] == 0,
                        )
                    );
                }
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>