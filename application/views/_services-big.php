<?php if (isset($services)) : ?>
    <section id="Services" class="big">
        <div>
            <div class="wrp bot-mrgn-med">
                <div class="w-1 cntr-txt">
                    <h3>Выберите нужную услугу:</h3>
                </div>
            </div>
            <div class="grd">
                <?php foreach ($services as $service) : ?>
                    <a class="w-1 item"
                       href="<?= base_url() . ($salon['slug'] !== 'default' ? $salon['slug'] . '/' : '') . $service['slug'] ?>"
                       style="background-size: cover; height: 155px; background-image: url(<?php echo base_url(); ?>media/services/<?php echo $service['slug']; ?>/preview_big.jpg);">
                        <p style="margin-top: auto; margin-bottom: auto; text-transform: uppercase; font-size: 1.3rem"><?php echo $service['name_short']; ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
