<?php if (!empty($masters) && isset($title) && !empty($salons)) : ?>
    <section id="Personal" class="masters">
        <h2 class="masters__title"><?= $title ?></h2>
        <div class="container">
            <div class="swiper js-slider-masters masters__container">
                <div class="masters__slider swiper-wrapper">
                    <?php foreach ($masters as $master) : ?>
                        <div class="masters__slide swiper-slide">
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
                                        <picture>
                                            <source type="image/webp"
                                                    srcset="<?= base_url() ?>media/masters/<?= $master['id'] ?>/master.webp">
                                            <img width="250" height="250"
                                                 src="<?= base_url() ?>media/masters/<?= $master['id'] ?>/master.jpg"
                                                 alt="<?= $master['name'] ?>">
                                        </picture>
                                    </div>
                                    <?php if (!empty($master['description'])) : ?>
                                        <p class="master__description">
                                            <?= $master['description'] ?>
                                            <span class="master__lead-btn-container">
                                                <a data-master="<?= $master['name'] ?>" data-salon="<?= $master['salon'] ?>"
                                                   class="btn master__lead-btn" popup-trigger="masters-lead">Записаться</a>
                                            </span>
                                        </p>
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
                                <div class="master__gallery swiper">
                                    <div class="masters__gallery-slider swiper-wrapper">
                                        <?php foreach ($imgs as $img): ?>
                                            <div class="master__gallery-slide swiper-slide">
                                                <picture>
                                                    <source class="swiper-lazy" type="image/webp"
                                                            data-srcset="<?= base_url() . $img . '.webp' ?>">
                                                    <img class="swiper-lazy" alt=""
                                                         width="400" height="400"
                                                         data-src="<?= base_url() . $img . '.jpg' ?>">
                                                </picture>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <button class="master__gallery-next gallery-next" type="button"></button>
                                    <button class="master__gallery-prev gallery-prev" type="button"></button>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="masters__pagination swiper-pagination"></div>
                <button class="masters__gallery-next gallery-next" type="button"></button>
                <button class="masters__gallery-prev gallery-prev" type="button"></button>
            </div>
        </div>
    </section>

    <div class="cs-popup info-popup" trigger="masters-lead">
        <div class="wrp">
            <div class="w-1 row jsfd">
                <div class="w-8-12 no-mrgn text">
                    <h3 class="bot-mrgn-ult about__title">Запишись в салон красоты онлайн сейчас</h3>
                    <p class="bot-mrgn-ult">Оставьте свои контактные данные, мы <b>быстро перезвоним</b> и уточним
                        детали
                        записи</p>
                    <?php $this->load->view('_form', ['horizontal' => false, 'heading' => null, 'master' => true]); ?>
                </div>
                <div class="w-4-12 no-mrgn img"
                     style="background-image: url(<?php echo base_url(); ?>assets/imgs/popup_about-atmosphere.jpg);"></div>
            </div>
        </div>
    </div>
<?php endif; ?>
