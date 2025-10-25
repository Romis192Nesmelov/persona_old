<div class="container">
    <section class="base-section promo" id="MainScreen">
        <amp-img width="460" height="55" sizes="(max-width: 768px) 80vw, 460px"
                 src="<?= base_url(); ?>media/general/default/logo-w.svg" alt="ПЕРСОНА"></amp-img>
        <h5 class="promo__slogan">
            <?= isset($slogan) ? $slogan : ''; ?>
        </h5>
        <h1 class="promo__title"><?= isset($h1_text) ? $h1_text : '' ?></h1>
        <a class="promo__link" href="#Salons">
            <?= isset($select_salon_text) ? $select_salon_text : ''; ?>
            <svg width="35" height="35" class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 312.757 312.757">
                <polygon fill="#fff"
                         points="244.062,184.792 170.623,258.23 170.623,0 142.139,0 142.139,258.247 68.69,184.792 48.549,204.939 156.379,312.757 264.208,204.939"/>
            </svg>
        </a>
    </section>
</div>
