<link href="<?php echo base_url(); ?>assets/css/jquery.datetimepicker.min.css" rel="stylesheet" type="text/css">
<?php if (file_exists('./assets/css/' . $assets . '.css')) : ?>
<?php endif; ?>
<?php if (isset($assets_service) && file_exists('./assets/css/' . $assets_service . '.css')) : ?>
    <link href="<?php echo base_url(); ?>assets/css/<?php echo $assets_service; ?>.min.css?<?= '11.09.2023' ?>"
          rel="stylesheet" type="text/css">
<?php endif; ?>

<script src="https://www.google.com/recaptcha/api.js?render=6Lc9cjYkAAAAAOatw_4MwOM5cvmxsr1MIb27aYu1"></script>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
<script src="<?php echo base_url(); ?>assets/main.min.js?<?= '26.06.2024' ?>"></script>
<script src="<?php echo base_url(); ?>assets/swiper-bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/jquery.datetimepicker.full.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script>
    $_BASEURL = '<?php echo base_url(); ?>';
</script>
<script>function gtag() {}</script>
<script>
    new Swiper(".js-slider-masters", {
        spaceBetween: 50,
        pagination: {el: ".masters__pagination", clickable: !0},
        navigation: {nextEl: ".masters__gallery-next", prevEl: ".masters__gallery-prev"},
        autoHeight: !0
    }), new Swiper(".master__gallery", {
        spaceBetween: 30,
        nested: !0,
        navigation: {nextEl: ".master__gallery-next", prevEl: ".master__gallery-prev"},
        loop: !0,
        loopedSlides: 30,
        lazy: !0
    }), new Swiper(".js-slider-offers", {
        spaceBetween: 50,
        pagination: {el: ".offers__pagination", clickable: !0},
        autoplay: {delay: 5e3},
        loop: !0,
        lazy: !0,
        loopedSlides: 30
    }), new Swiper(".js-slider-salon", {
        spaceBetween: 50,
        autoplay: {delay: 8e3},
        navigation: {nextEl: ".about__gallery-next", prevEl: ".about__gallery-prev"},
        loop: !0,
        loopedSlides: 30,
        lazy: !0
    }), new Swiper(".js-style-slider", {
        spaceBetween: 50,
        navigation: {nextEl: ".style__gallery-next", prevEl: ".style__gallery-prev"},
        loop: !0,
        loopedSlides: 30,
        lazy: !0
    }), new Swiper(".js-slider-articles", {
        slidesPerView: 3,
        spaceBetween: 40,
        navigation: {nextEl: ".articles__gallery-next", prevEl: ".articles__gallery-prev"},
        lazy: !0,
        breakpoints: {
            320: {slidesPerView: 1, spaceBetween: 40},
            576: {slidesPerView: 2, spaceBetween: 30},
            768: {slidesPerView: 3, spaceBetween: 40}
        }
    }), window.addEventListener("priceSliderInit", () => {
        new Swiper(".js-slider-prices", {
            spaceBetween: 50,
            navigation: {prevEl: ".price__btn-next", nextEl: ".price__btn-prev"},
            loop: !0,
            allowTouchMove: !1
        })
    });
</script>

</body>
</html>

