<div class="visually-hidden" id="Offers"></div>
<?php if (!empty($offers) && !empty($salon)) : ?>
    <section class="base-section">
        <h2 class="title">
            Акции в салоне «Персона» <?= $salon['slug'] != 'default' ? $salon['name'] : '' ?>
        </h2>
        <div class="container">
            <amp-carousel
                    width="1170"
                    height="400"
                    layout="responsive"
                    type="slides"
                    role="region"
                    aria-label="Акции в салоне «Персона» <?= $salon['slug'] != 'default' ? $salon['name'] : '' ?>"
            >
                <?php foreach ($offers as $offer_r) : ?>
                <div>
                    <amp-img
                            alt=""
                            media="(max-width: 768px) and (min-width: 577px)"
                            width="768"
                            height="263"
                            layout="responsive"
                            src="<?= base_url() ?>media/offers/<?= $offer_r['id'] ?>/tablet.webp"
                    >
                        <amp-img
                                fallback
                                alt=""
                                media="(max-width: 768px) and (min-width: 577px)"
                                width="768"
                                height="263"
                                layout="responsive"
                                src="<?= base_url() ?>media/offers/<?= $offer_r['id'] ?>/tablet.jpg"
                        >
                        </amp-img>
                    </amp-img>
                    <amp-img
                            alt=""
                            media="(max-width: 576px)"
                            width="576"
                            height="197"
                            layout="responsive"
                            src="<?= base_url() ?>media/offers/<?= $offer_r['id'] ?>/mobile.webp"
                    >
                        <amp-img
                                fallback
                                alt=""
                                media="(max-width: 576px)"
                                width="576"
                                height="197"
                                layout="responsive"
                                src="<?= base_url() ?>media/offers/<?= $offer_r['id'] ?>/mobile.jpg"
                        ></amp-img>
                    </amp-img>
                    <amp-img
                            alt=""
                            media="(min-width: 769px)"
                            width="1170"
                            height="400"
                            layout="responsive"
                            src="<?= base_url() ?>media/offers/<?= $offer_r['id'] ?>/desktop.webp"
                    >
                        <amp-img
                                fallback
                                alt=""
                                media="(min-width: 769px)"
                                width="1170"
                                height="400"
                                layout="responsive"
                                src="<?= base_url() ?>media/offers/<?= $offer_r['id'] ?>/desktop.jpg"
                        ></amp-img>
                    </amp-img>
                </div>
                <?php endforeach; ?>
            </amp-carousel>
        </div>
    </section>
<?php endif; ?>
