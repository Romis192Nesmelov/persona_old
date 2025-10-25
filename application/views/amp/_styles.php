<?php if (isset($styles) && isset($service)) : ?>

    <section id="Styles" class="styles base-section">
        <div class="container">
            <h5 class="styles__title"><?php echo $service['select_heading']; ?>:</h5>
            <div class="styles__list">
                <?php if ($service['need_help']) : ?>
                    <div class="styles__help">
                        <h6 class="styles__question">?</h6>
                        <h5 class="styles__question-text"><b>Я не знаю,</b> что мне подойдет</h5>
                        <button on="tap:help.open" type="button" class="styles__question-btn">Зато мы знаем, рассказать?</button>
                    </div>
                <?php endif; ?>
                <?php foreach ($styles as $key => $style) : ?>
                    <button on="tap:style<?= $style['slug']; ?>.open" class="styles__item" style="background-image: url(<?php echo base_url(); ?>media/styles/<?php echo $style['slug']; ?>/preview_big.jpg);">
                        <span><?php echo $style['name_short']; ?></span>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php if ($service['need_help']) : ?>
        <amp-lightbox animate-in="fade-in" class="lightbox" id="help" layout="nodisplay">
            <div tabindex="-1" role="button" on="tap:help.close" class="lightbox__overlay"></div>
            <div class="lightbox__content">
                <div class="lead-modal">
                    <div class="lead-modal__content">
                        <h5 class="lead-modal__title"><?php echo isset($need_help_block) && array_key_exists('title', $need_help_block) ? $need_help_block['title'] : ''; ?></h5>
                        <p class="lead-modal__text"><?php echo isset($need_help_block) && array_key_exists('text', $need_help_block) ? $need_help_block['text'] : ''; ?></p>
                        <?php $this->load->view('amp/_form', array('slug_salon' => $salon['slug'], 'slug_service' => $service['slug'], 'tel' => $salon['tel'])); ?>
                    </div>
                    <div class="lead-modal__img"
                         style="background-image: url(<?php echo base_url(); ?>assets/imgs/popup_about-atmosphere.jpg);"></div>
                </div>
                <button aria-label="Закрыть модальное окно" class="lightbox__close" on="tap:help.close">
                    <amp-img alt="" width="20" height="20" src="<?= base_url() ?>assets/icons/icon-close.svg"></amp-img>
                </button>
            </div>
        </amp-lightbox>
    <?php endif; ?>

    <?php foreach ($styles as $style) : ?>
        <amp-lightbox animate-in="fade-in" class="lightbox" id="style<?= $style['slug']; ?>" layout="nodisplay">
            <div tabindex="-1" role="button" on="tap:style<?= $style['slug']; ?>.close" class="lightbox__overlay"></div>
            <div class="lightbox__content">
                <div class="lead-modal lead-modal--extended">
                    <div class="lead-modal__header" style="background-image: url(<?php echo base_url(); ?>media/styles/<?php echo $style['slug']; ?>/popup.jpg);">
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
                <button aria-label="Закрыть модальное окно" class="lightbox__close" on="tap:style<?= $style['slug']; ?>.close">
                    <amp-img alt="" width="20" height="20" src="<?= base_url() ?>assets/icons/icon-close.svg"></amp-img>
                </button>
            </div>
        </amp-lightbox>
    <?php endforeach; ?>
<?php endif; ?>
