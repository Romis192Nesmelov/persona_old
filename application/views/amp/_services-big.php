<?php if (isset($services) && isset($salon)) : ?>
    <section id="Services" class="services base-section">
        <div class="container">
            <h4 class="title">Выберите нужную услугу</h4>
            <div class="list-grid">
                <?php foreach ($services as $service) : ?>
                    <a class="services__item" target="_blank"
                       href="<?= base_url() . ($salon['slug'] !== 'default' ? $salon['slug'] . '/' : '') . $service['slug'] ?>"
                       style="background-image: url(<?php echo base_url(); ?>media/services/<?php echo $service['slug']; ?>/preview_big.jpg);">
                        <p class="services__item-title"><?php echo $service['name_short']; ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
