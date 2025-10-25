<?php
if (!isset($salon_slug)) {
    $salon_slug = 'default';
}
?>
<section id="About" class="about base-section">
    <div class="container">
        <div class="about__wrapper">
            <?php if (file_exists('./media/salons/' . $salon_slug . '/gallery/')) : ?>
                <?php echo isset($title_gallery) ? '<h5 class="about__gallery-title">' . $title_gallery . '</h5>' : ''; ?>
                <amp-carousel
                        width="1170"
                        height="397"
                        layout="responsive"
                        type="slides"
                        role="region"
                        class="about__gallery"
                >
                    <?php
                    $files = glob('./media/salons/' . $salon_slug . '/gallery/*.jpg');
                    $imgs = [];
                    foreach ($files as $file) {
                        $imgs[] = str_replace(['./', '.jpg'], '', $file);
                    }
                    foreach ($imgs as $img) : ?>
                        <amp-img
                                layout="responsive"
                                width="1170"
                                height="397"
                                src="<?= base_url() . $img . '.webp' ?>" alt="Фото салона">
                            <amp-img
                                    fallback
                                    layout="responsive"
                                    width="1170"
                                    height="397"
                                    src="<?= base_url() . $img . '.jpg' ?>" alt="Фото салона">
                            </amp-img>
                        </amp-img>
                    <?php endforeach; ?>
                </amp-carousel>
            <?php endif; ?>
            <div class="about__text">
                <h4 class="about__title"><?= isset($title) ? $title : 'О «Персоне»' ?></h4>
                <div class="about__columns">
                    <?php echo isset($quote_1) ? '<div class="about__column"><p>' . $quote_1 . '</p></div>' : ''; ?>
                    <?php echo isset($quote_2) ? '<div class="about__column"><p>' . $quote_2 . '</p></div>' : ''; ?>
                </div>
                <?= isset($author) ? '<div class="about__author">' . $author . '</div>' : ''; ?>
                <div class="about__cta">
                    <button on="tap:premium.open" type="button" class="about__cta-btn">
                        <amp-img width="32" height="32" alt=""
                                 src="<?= base_url() ?>assets/icons/icon-ruby.svg"></amp-img>
                        <span>Клиентский сервис<br><strong>премиум класса</strong></span>
                    </button>
                    <button on="tap:fashion.open" type="button" class="about__cta-btn">
                        <amp-img width="32" height="32" alt=""
                                 src="<?= base_url() ?>assets/icons/icon-step.svg"></amp-img>
                        <span>На шаг быстрее<br><strong>моды</strong>
                    </button>
                    <button on="tap:atmosphere.open" type="button" class="about__cta-btn">
                        <amp-img width="32" height="32" alt=""
                                 src="<?= base_url() ?>assets/icons/icon-chair.svg"></amp-img>
                        <span>Всегда <strong>комфортно,<br>приветливая</strong> атмосфера
                    </button>
                    <button on="tap:lead.open" class="gradient-btn" type="button">Записаться</button>
                </div>
            </div>
        </div>
    </div>
</section>


<amp-lightbox animate-in="fade-in" class="lightbox" id="premium" layout="nodisplay">
    <div tabindex="-1" role="button" on="tap:premium.close" class="lightbox__overlay"></div>
    <div class="lightbox__content">
        <div class="lead-modal">
            <div class="lead-modal__content">
                <h5 class="lead-modal__title">Клиентский сервис<br><strong>премиум класса</strong></h5>
                <p class="lead-modal__text">Высокий уровень сервиса и забота о каждом клиенте основной приоритет салонов
                    «ПЕРСОНА»</p>
                <p class="lead-modal__text"><strong>Доверяйте свой образ лучшим специалистам</strong></p>
                <?php $this->load->view('amp/_form'); ?>
            </div>
            <div class="lead-modal__img"
                 style="background-image: url(<?php echo base_url(); ?>assets/imgs/popup_about-premium.jpg);"></div>
        </div>
        <button aria-label="Закрыть модальное окно" class="lightbox__close" on="tap:premium.close">
            <amp-img alt="" width="20" height="20" src="<?= base_url() ?>assets/icons/icon-close.svg"></amp-img>
        </button>
    </div>
</amp-lightbox>
<amp-lightbox animate-in="fade-in" class="lightbox" id="fashion" layout="nodisplay">
    <div tabindex="-1" role="button" on="tap:fashion.close" class="lightbox__overlay"></div>
    <div class="lightbox__content">
        <div class="lead-modal">
            <div class="lead-modal__content">
                <h5 class="lead-modal__title">На шаг быстрее<br><strong>моды</strong></h5>
                <p class="lead-modal__text">Специалисты персоны отличаются тем, что постоянно повышают своё мастерство,
                    обучаются у мировых экспертов и всегда следят за трендами</p>
                <p class="lead-modal__text"><strong>В ногу со временем с лучшим от «ПЕРСОНЫ»</strong></p>
                <?php $this->load->view('amp/_form'); ?>
            </div>
            <div class="lead-modal__img"
                 style="background-image: url(<?php echo base_url(); ?>assets/imgs/popup_about-fashion.jpg);"></div>
        </div>
        <button aria-label="Закрыть модальное окно" class="lightbox__close" on="tap:fashion.close">
            <amp-img alt="" width="20" height="20" src="<?= base_url() ?>assets/icons/icon-close.svg"></amp-img>
        </button>
    </div>
</amp-lightbox>
<amp-lightbox animate-in="fade-in" class="lightbox" id="atmosphere" layout="nodisplay">
    <div tabindex="-1" role="button" on="tap:atmosphere.close" class="lightbox__overlay"></div>
    <div class="lightbox__content">
        <div class="lead-modal">
            <div class="lead-modal__content">
                <h5 class="lead-modal__title">Всегда <strong>комфортно, приветливая</strong> атмосфера</h5>
                <p class="lead-modal__text">Каждого клиента мы стараемся окружить заботой и вниманием, а специалисты
                    всегда становятся лучшими друзьями, проводниками в сфере моды и красоты</p>
                <p class="lead-modal__text"><strong>Доверяй свой образ только своим</strong></p>
                <?php $this->load->view('amp/_form'); ?>
            </div>
            <div class="lead-modal__img"
                 style="background-image: url(<?php echo base_url(); ?>assets/imgs/popup_about-atmosphere.jpg);"></div>
        </div>
        <button aria-label="Закрыть модальное окно" class="lightbox__close" on="tap:atmosphere.close">
            <amp-img alt="" width="20" height="20" src="<?= base_url() ?>assets/icons/icon-close.svg"></amp-img>
        </button>
    </div>
</amp-lightbox>
