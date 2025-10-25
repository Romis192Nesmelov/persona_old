<?php if (isset($styles) && isset($service) && isset($style)) : ?>
    <section id="StylesSmall" class="base-section">
        <div class="container">
            <div class="inner-style">
                <div class="lead-modal__header" style="background-image: url(<?= base_url(); ?>media/styles/<?= $style['slug']; ?>/popup.jpg);">
                    <h3 class="lead-modal__header-title"><?php echo $style['name']; ?></h3>
                </div>
                <div class="lead-modal__content">
                    <p class="lead-modal__description"><?php echo $style['description']; ?></p>
                    <p class="lead-modal__feature">
                        <amp-img src="<?= base_url() ?>assets/icons/icon-time.svg" width="25" height="25"></amp-img>
                        <b>Продолжительность: </b><?php echo $style['time']; ?> мин.
                    </p>
                    <p class="lead-modal__feature">
                        <amp-img src="<?= base_url() ?>assets/icons/icon-ruble.svg" width="25" height="25"></amp-img>
                        <b>Стоимость от: </b><?php echo $style['price']; ?> руб.
                    </p>
                    <?php $this->load->view('amp/_form', array('slug_style' => $style['slug'])); ?>
                </div>
                <div class="lead-modal__carousel">
                    <?php $files_string = 'media/styles/' . $style['slug'] . '/gallery/';
                    if (file_exists($files_string)) : ?>

                        <amp-carousel width="400" height="400" layout="responsive" type="slides" role="region" aria-label="" sizes="(max-width: 1200px) 300px, 400px"
                                      heights="(max-width: 1200px) 300px, 400px" >
                            <?php $files = glob('./media/styles/' . $style['slug'] . '/gallery/*.jpg');
                            $imgs = [];
                            foreach ($files as $file) {
                                $imgs[] = str_replace(['./', '.jpg'], '', $file);
                            }
                            foreach ($imgs as $img) : ?>
                                <amp-img sizes="(max-width: 1200px) 300px, 400px"
                                         heights="(max-width: 1200px) 300px, 400px"
                                         width="400"
                                         height="400"
                                         src="<?= base_url() . $img . '.webp' ?>">
                                    <amp-img fallback
                                             sizes="(max-width: 1200px) 300px, 400px"
                                             heights="(max-width: 1200px) 300px, 400px"
                                             width="400"
                                             height="400"
                                             src="<?= base_url() . $img . '.jpg' ?>"></amp-img>
                                </amp-img>
                            <?php endforeach ; ?>
                        </amp-carousel>

                    <?php endif; ?>
                </div>
            </div>

            <div class="inner-style__grid">
                <?php foreach ($styles as $stl) : ?>
                    <?php if ($style['slug'] !== $stl['slug']) : ?>
                        <button on="tap:style<?= $stl['slug']; ?>.open" type="button" class="inner-style__grid-item">
                            <amp-img
                                    width="95"
                                    height="95"
                                    src="<?php echo base_url(); ?>media/styles/<?php echo $stl['slug']; ?>/preview_small.webp"
                                    alt="">
                                <amp-img
                                        fallback
                                        width="95"
                                        height="95"
                                        src="<?php echo base_url(); ?>media/styles/<?php echo $stl['slug']; ?>/preview_small.jpg"
                                        alt=""></amp-img>
                            </amp-img>
                            <span><?php echo $stl['name']; ?></span>
                        </button>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php foreach ($styles as $stl) : ?>
        <amp-lightbox animate-in="fade-in" class="lightbox" id="style<?= $stl['slug']; ?>" layout="nodisplay">
            <div tabindex="-1" role="button" on="tap:style<?= $stl['slug']; ?>.close" class="lightbox__overlay"></div>
            <div class="lightbox__content">
                <div class="lead-modal lead-modal--extended">
                    <div class="lead-modal__header" style="background-image: url(<?php echo base_url(); ?>media/styles/<?php echo $stl['slug']; ?>/popup.jpg);">
                        <h3 class="lead-modal__header-title"><?php echo $stl['name']; ?></h3>
                    </div>
                    <div class="lead-modal__content">
                        <p class="lead-modal__description"><?php echo $stl['description']; ?></p>
                        <p class="lead-modal__feature">
                            <amp-img src="<?= base_url() ?>assets/icons/icon-time.svg" width="25" height="25"></amp-img>
                            <b>Продолжительность: </b><?php echo $stl['time']; ?> мин.
                        </p>
                        <p class="lead-modal__feature">
                            <amp-img src="<?= base_url() ?>assets/icons/icon-ruble.svg" width="25" height="25"></amp-img>
                            <b>Стоимость от: </b><?php echo $stl['price']; ?> руб.
                        </p>
                        <?php $this->load->view('amp/_form', array('slug_style' => $stl['slug'])); ?>
                    </div>
                    <div class="lead-modal__carousel">
                        <?php $files_string = 'media/styles/' . $stl['slug'] . '/gallery/';
                        if (file_exists($files_string)) : ?>

                            <amp-carousel width="400" height="400" layout="responsive" type="slides" role="region" aria-label="" sizes="(max-width: 1200px) 300px, 400px"
                                          heights="(max-width: 1200px) 300px, 400px" >
                                <?php $files = glob('./media/styles/' . $stl['slug'] . '/gallery/*.jpg');
                                $imgs = [];
                                foreach ($files as $file) {
                                    $imgs[] = str_replace(['./', '.jpg'], '', $file);
                                }
                                foreach ($imgs as $img) : ?>
                                    <amp-img sizes="(max-width: 1200px) 300px, 400px"
                                             heights="(max-width: 1200px) 300px, 400px"
                                             width="400"
                                             height="400"
                                             src="<?= base_url() . $img . '.webp' ?>">
                                        <amp-img fallback
                                                 sizes="(max-width: 1200px) 300px, 400px"
                                                 heights="(max-width: 1200px) 300px, 400px"
                                                 width="400"
                                                 height="400"
                                                 src="<?= base_url() . $img . '.jpg' ?>"></amp-img>
                                    </amp-img>
                                <?php endforeach ; ?>
                            </amp-carousel>

                        <?php endif; ?>
                    </div>
                </div>
                <button aria-label="Закрыть модальное окно" class="lightbox__close" on="tap:style<?= $stl['slug']; ?>.close">
                    <amp-img alt="" width="20" height="20" src="<?= base_url() ?>assets/icons/icon-close.svg"></amp-img>
                </button>
            </div>
        </amp-lightbox>
    <?php endforeach; ?>

<?php endif; ?>
