<?php if (isset($service) && isset($salon)) : ?>

    <div class="container">
        <section id="MainScreen" class="service">
            <div class="service__wrapper" style="background-image: url(<?php echo base_url(); ?>media/services/<?php echo $service['slug']; ?>/bg_ms.jpg);">
                <div style="background-image: url(<?php echo base_url(); ?>media/services/<?php echo $service['slug']; ?>/img_ms.png);"
                     class="service__img"></div>
                <div class="service__info">
                    <h1 class="service__title"><?php echo $service['name']; ?> <?= isset($block) && array_key_exists('title', $block) ? $block['title'] : ''; ?> <?= $salon['slug'] !== 'default' ? $salon['name'] : ' Москва' ?></h1>
                    <p class="service__subtitle"><?php echo isset($block) && array_key_exists('profs', $block) ? $block['profs'] : ''; ?></p>
                    <p class="service__description"><?php echo $service['description']; ?></p>
                    <a class="service__btn" href="#Styles">Выбор <?php echo $service['what']; ?></a>
                    <div class="service__features">
                        <button on="tap:place.open" type="button" class="service__feature">
                            <amp-img width="30" height="30" src="<?= base_url(); ?>assets/icons/icon-place.svg"></amp-img>
                        <span><?php echo isset($block) && array_key_exists('where', $block) ? $block['where'] : ''; ?>
                            <br/><strong><?php echo $salon['address_short']; ?></strong></span>
                        </button>
                        <button on="tap:price.open" type="button" class="service__feature">
                            <amp-img width="30" height="30" src="<?= base_url(); ?>assets/icons/icon-price.svg"></amp-img>
                            <span><?php echo isset($block) && array_key_exists('price', $block) ? $block['price'] . ' ' : ''; ?> <?php echo $service['what']; ?>
                                <br/><strong>от <?php echo $service['start_price']; ?> руб.</strong></span>
                        </button>
                        <button on="tap:quality.open" type="button" class="service__feature">
                            <amp-img width="30" height="30" src="<?= base_url(); ?>assets/icons/icon-quality.svg"></amp-img>
                            <span><?php echo isset($block) && array_key_exists('quality', $block) ? $block['quality'] : ''; ?></span>
                        </button>
                    </div>
                </div>
                <div class="service__form">
                    <?php $heading_title = !$service['h2'] ? $service['name'] : $service['h2'];
                    $heading = 'Запишись на <br/><strong>' . mb_strtolower($heading_title) . ' </strong> онлайн'; ?>
                    <p class="service__form-title"><?= $heading ?></p>
                    <?php $this->load->view('amp/_form', array('slug_salon' => $salon['slug'], 'slug_service' => $service['slug'], 'tel' => $salon['tel'])); ?>
                </div>
            </div>
        </section>
    </div>

    <amp-lightbox animate-in="fade-in" class="lightbox" id="place" layout="nodisplay">
        <div tabindex="-1" role="button" on="tap:place.close" class="lightbox__overlay"></div>
        <div class="lightbox__content">
            <div class="lead-modal">
                <div class="lead-modal__content">
                    <h5 class="lead-modal__title"><?php echo isset($block) && array_key_exists('where', $block) ? $block['where'] : ''; ?>
                        <strong><?php echo $salon['address_short']; ?></strong></h5>
                    <p class="lead-modal__text"><?php echo isset($block) && array_key_exists('where_text', $block) ? $block['where_text'] : ''; ?></p>
                    <?php $this->load->view('amp/_form', array('slug_salon' => $salon['slug'], 'slug_service' => $service['slug'], 'tel' => $salon['tel'])); ?>
                </div>
                <div class="lead-modal__img"
                     style="background-image: url(<?php echo base_url(); ?>media/salons/<?php echo $salon['slug']; ?>/popup.jpg);"></div>
            </div>
            <button aria-label="Закрыть модальное окно" class="lightbox__close" on="tap:place.close">
                <amp-img alt="" width="20" height="20" src="<?= base_url() ?>assets/icons/icon-close.svg"></amp-img>
            </button>
        </div>
    </amp-lightbox>
    <amp-lightbox animate-in="fade-in" class="lightbox" id="price" layout="nodisplay">
        <div tabindex="-1" role="button" on="tap:price.close" class="lightbox__overlay"></div>
        <div class="lightbox__content">
            <div class="lead-modal">
                <div class="lead-modal__content">
                    <h5 class="lead-modal__title"><?php echo isset($block) && array_key_exists('price', $block) ? $block['price'] . ' ' : ''; ?><?php echo $service['what']; ?>
                        <strong>от <?php echo $service['start_price']; ?> руб.</strong></h5>
                    <p class="lead-modal__text"><?php echo isset($block) && array_key_exists('price_text', $block) ? $block['price_text'] : ''; ?></p>
                    <?php $this->load->view('amp/_form', array('slug_salon' => $salon['slug'], 'slug_service' => $service['slug'], 'tel' => $salon['tel'])); ?>
                </div>
                <div class="lead-modal__img"
                     style="background-image: url(<?php echo base_url(); ?>media/services/<?php echo $service['slug']; ?>/popup_price.jpg);"></div>
            </div>
            <button aria-label="Закрыть модальное окно" class="lightbox__close" on="tap:price.close">
                <amp-img alt="" width="20" height="20" src="<?= base_url() ?>assets/icons/icon-close.svg"></amp-img>
            </button>
        </div>
    </amp-lightbox>
    <amp-lightbox animate-in="fade-in" class="lightbox" id="quality" layout="nodisplay">
        <div tabindex="-1" role="button" on="tap:quality.close" class="lightbox__overlay"></div>
        <div class="lightbox__content">
            <div class="lead-modal">
                <div class="lead-modal__content">
                    <h5 class="lead-modal__title"><?php echo isset($block) && array_key_exists('quality', $block) ? $block['quality'] : ''; ?></h5>
                    <p class="lead-modal__text"><?php echo isset($block) && array_key_exists('quality_text', $block) ? $block['quality_text'] : ''; ?></p>
                    <?php $this->load->view('amp/_form', array('slug_salon' => $salon['slug'], 'slug_service' => $service['slug'], 'tel' => $salon['tel'])); ?>
                </div>
                <div class="lead-modal__img"
                     style="background-image: url(<?php echo base_url(); ?>media/services/<?php echo $service['slug']; ?>/popup_quality.jpg);"></div>
            </div>
            <button aria-label="Закрыть модальное окно" class="lightbox__close" on="tap:quality.close">
                <amp-img alt="" width="20" height="20" src="<?= base_url() ?>assets/icons/icon-close.svg"></amp-img>
            </button>
        </div>
    </amp-lightbox>

<?php endif; ?>
