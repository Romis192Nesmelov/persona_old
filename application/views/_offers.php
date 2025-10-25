<div class="visually-hidden" id="Offers"></div>
<?php if (!empty($offers)) : ?>
    <section class="offers">
        <h2 class="offers__title">
            Акции в салоне «Персона» <?= $salon['slug'] != 'default' ? $salon['name'] : '' ?>
        </h2>
        <div class="container offers__container js-slider-offers swiper">
            <div class="offers__slider swiper-wrapper">
                <?php foreach ($offers as $offer_r) : ?>
                    <div class="offers__slide swiper-slide">
                        <picture>
                            <source type="image/webp" class="swiper-lazy" data-srcset="<?= base_url() ?>media/offers/<?= $offer_r['id'] ?>/mobile.webp" media="(max-width:576px)">
                            <source type="image/webp" class="swiper-lazy" data-srcset="<?= base_url() ?>media/offers/<?= $offer_r['id'] ?>/tablet.webp" media="(max-width:768px)">
                            <source type="image/webp" class="swiper-lazy" data-srcset="<?= base_url() ?>media/offers/<?= $offer_r['id'] ?>/desktop.webp">
                            <source class="swiper-lazy" data-srcset="<?= base_url() ?>media/offers/<?= $offer_r['id'] ?>/mobile.jpg" media="(max-width:576px)">
                            <source class="swiper-lazy" data-srcset="<?= base_url() ?>media/offers/<?= $offer_r['id'] ?>/tablet.jpg" media="(max-width:768px)">
                            <img class="swiper-lazy" alt="<?= $offer_r['name'] ?>" data-src="<?= base_url() ?>media/offers/<?= $offer_r['id'] ?>/desktop.jpg">
                        </picture>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="offers__pagination swiper-pagination"></div>
        </div>
    </section>
<?php endif; ?>
