<?php if (isset($salons)) : ?>
    <section class="salons base-section" id="Salons">
        <div class="container">
            <div class="list-grid">
                <?php foreach ($salons as $salon) : ?>
                    <a target="_blank" href="<?= base_url() .  $salon['slug']; ?>" class="salons__link">
                        <p class="salon__name">
                            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 772 529.93"
                                 class="metro"
                                 fill="<?= $salon['metro_color']; ?>">
                                <path d="M772,455.93v69H499.49V456.07H540l-39.8-113.84L386,529.82,271.83,342.24,232,456.23h40.64v68.62H177.44L0,524.93v-69c15.82.08,31.65,0,47.47.35,4.42.1,6.27-1.4,7.86-5.42q87.88-222.34,176-444.58c.69-1.73,1.52-3.4,2.61-5.82L386,266.6,538.14.33c1.06,2.46,1.74,4,2.35,5.48q63.23,159.63,126.44,319.27Q692,388.43,717.19,451.73c.71,1.77,2.84,4.22,4.34,4.24C738.35,456.2,755.18,456,772,455.93Z"></path>
                            </svg>
                            <?= $salon['name']; ?>
                        </p>
                        <p class="salon__address"><?= $salon['address_short']; ?></p>
                        <p class="salon__tel"><?= $salon['tel']; ?></p>
                        <p class="salon__hours"><?= $salon['working_hours']; ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
