<?php
/**
 * Copyright (c) 2018.
 * Powered by CheckSanity (https://checksanity.ru)
 * Developed for Prime Production (https://primeproduction.ru)
 */

if (isset($salons)) {

} else {
    show_404();
}
?>

<!-- MAIN -->
<section id="MainScreen" style="padding-top: var(--section-full-padding-top); padding-bottom: var(--section-full-padding-bot);">
    <div class="cs_sec_wrap">
        <div class="cs_wrap" style="background-image: url(/temp-media/bg-home.jpg); background-size: cover; border-radius: 15px; background-color: var(--black);">
            <div class="cs_col six_twelve align_center align_center_txt">
                <img alt="ПЕРСОНА логотип" src="/temp-media/logo.svg" class="svg bot_mrgn_med">
                <h3 class="bot_mrgn_med offer"><span>Красоту творим любовью</span></h3>
                <h3 class="bot_mrgn_big">8 салонов премиум класса<br/>с отличными ценами</h3>
                <p class="big">Выберите ближайший салон</p>
                <a class="img" href="#Choose"><img src="/temp-media/down-arrow.png"></a>
            </div>
        </div>
    </div>
</section>

<section id="Choose">
    <div class="cs_sec_wrap">
        <div class="cs_wrap">
            <div class="cs_col one equal_height">
                <?php foreach ($salons as $salon) : ?>
                    <a href="<?php echo 'salon_' . $salon['slug']; ?>" class="cs_col three_twelve align_center_txt salon-item">
                        <p class="bot_mrgn_sml"><img class="svg <?php echo $salon['slug']; ?>-metro" src="/temp-media/metro.svg"> <?php echo $salon['name']; ?></p>
                        <p class="bot_mrgn_sml"><?php echo $salon['address_short']; ?></p>
                        <p class="small">
                            <?php echo $salon['tel']; ?><br/>
                            <?php echo $salon['working_hours']; ?>
                        </p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php
$salon['tel'] = 'Общий';
$salon['tel_link'] = 'Общий';
$salon['360'] = '4v1539283804413!6m8!1m7!1sCAoSLEFGMVFpcFBLbzhYdWdURHdqVXB3ZmN6UEV2WTFKTlc1Q3piazBTZ0RGLTF6!2m2!1d55.910436866483!2d37.395058141338!3f127.60234377343598!4f3.3928495852288023!5f0.7820865974627469';
WidgetFactoryHelper::aboutPersona('general', $salon);
?>

<?php WidgetFactoryHelper::personaMap($salons); ?>

