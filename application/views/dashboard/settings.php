<?php
?>
    <section>
        <div>
            <div class="wrp bot-mrgn-sml">
                <div class="w-1 row jsfd cntr-itms">
                    <h2>Общие настройки</h2>
                </div
            </div>
        </div>
    </section>

<?php if (isset($files)) : ?>
    <section id="MediaUpload">
        <div>
            <div class="wrp">
                <div class="w-1">
                    <h2>Редактировать медиа-контент</h2>
                </div>
                <?php
                foreach ($files as $file) {
                    $this->load->view('widgets/_form-single-image', array(
                            'type' => 'general',
                            'slug' => 'default',
                            'params' => $file,
                            'disabled' => false
                        )
                    );
                }
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>