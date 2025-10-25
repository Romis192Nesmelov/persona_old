<?php
if (!isset($settings) || !isset($permissions)) {
    die('Style internal error. Please try again');
}
?>
<section>
    <div>
        <div class="wrp">
            <div class="w-1 row jsfd">
                <h2>Редактировать настройки</h2>
            </div>
            <div class="w-1">
                <?php
                // To use update form
                $settings['slug'] = 'n/a';
                if (isset($fields)) {
                    $this->load->view('widgets/_form', array(
                            'fields' => $fields,
                            'data' => $settings,
                            'ajax' => 'vacancies/updateSettings',
                        )
                    );
                }
                ?>
            </div>
        </div>
    </div>
</section>