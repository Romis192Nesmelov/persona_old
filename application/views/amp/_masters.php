<?php if (!empty($masters) && isset($title) && !empty($salons)) : ?>
    <section class="base-section masters">
        <h2 class="title"><?= $title ?></h2>
        <div class="container">
            <amp-carousel
                          class="masters__carousel"
                          id="mastersSlider"
                          width="1170"
                          height="600"
                          layout="responsive"
                          sizes="(max-width: 1200px) calc(100vw - 30px), 1170px"
                          heights="(max-width: 768px) 1000px, (max-width: 1024) 1000px, 600px"
                          type="slides"
                          role="region"
                          aria-label="<?= $title ?>">
                <?php foreach ($masters as $master) : ?>
                    <div class="masters__slide">
                        <div class="master__info">
                            <p class="master__name"><?= $master['name'] ?></p>
                            <?php if (!empty($master['position'])) : ?>
                                <?php
                                $salon_name = '';
                                foreach ($salons as $m_salon) {
                                    if ($m_salon['slug'] === $master['salon']) {
                                        $salon_name = $m_salon['name'];
                                    }
                                }
                                ?>
                                <p class="master__position"><?= $master['position'] ?> в салоне
                                    Персона <?= $salon_name ?></p>
                            <?php endif; ?>
                            <div class="master__img-wrapper">
                                <div class="master__img">
                                    <amp-img width="250" height="250" layout="responsive"
                                             sizes="(max-width: 1024px) 180px, 250px"
                                             src="<?= base_url() ?>media/masters/<?= $master['id'] ?>/master.webp"
                                             alt="">
                                        <amp-img fallback width="250" height="250" layout="responsive"
                                                 sizes="(max-width: 1024px) 180px, 250px"
                                                 src="<?= base_url() ?>media/masters/<?= $master['id'] ?>/master.jpg"
                                                 alt=""></amp-img>
                                    </amp-img>
                                </div>
                                <?php if (!empty($master['description'])) : ?>
                                    <p class="master__description"><?= $master['description'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php $files = glob('./media/masters/' . $master['id'] . '/gallery/*.jpg');
                        $imgs = [];
                        foreach ($files as $file) {
                            $imgs[] = str_replace(['./', '.jpg'], '', $file);
                        }
                        ?>
                        <?php if (!empty($imgs)) : ?>
                            <div class="master__gallery">
                                <amp-carousel layout="responsive" width="400" height="400" type="slides"
                                              layout="responsive"
                                              sizes="(max-width: 1200px) 300px, 400px"
                                              heights="(max-width: 1200px) 300px, 400px"
                                              role="region" class="masters__slider--inner" controls loop
                                              aria-label="">

                                    <?php foreach ($imgs as $img): ?>
                                        <amp-img alt=""
                                                 width="400"
                                                 height="400"
                                                 layout="responsive"
                                                 sizes="(max-width: 1200px) 300px, 400px"
                                                 class="master__gallery-img"
                                                 src="<?= base_url() . $img . '.webp' ?>">
                                            <amp-img fallback
                                                     alt=""
                                                     width="400"
                                                     height="400"
                                                     layout="responsive"
                                                     sizes="(max-width: 1200px) 300px, 400px"
                                                     class="master__gallery-img"
                                                     src="<?= base_url() . $img . '.jpg' ?>">
                                            </amp-img>
                                        </amp-img>
                                    <?php endforeach; ?>
                                </amp-carousel>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </amp-carousel>
                <amp-selector on="select:mastersSlider.goToSlide(index=event.targetOption)" layout="container">
                    <ul class="masters__dots">
                        <?php for ($i = 0; $i < count($masters); $i++) : ?>
                            <li <?= $i === 0 ? 'selected' : '' ?> option="<?= $i ?>"></li>
                        <?php endfor; ?>
                    </ul>
                </amp-selector>
        </div>
    </section>
<?php endif; ?>
