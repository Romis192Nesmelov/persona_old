<?php
/**
 * Copyright (c) 2018.
 * Powered by CheckSanity (https://checksanity.ru)
 * Developed for Prime Production (https://primeproduction.ru)
 */

if (isset($services) && isset($salon)) {

} else {
    show_404();
}
?>

<!-- MAIN -->
<section id="MainScreen" style="padding-top: var(--section-full-padding-top); padding-bottom: var(--section-full-padding-bot);">
    <div class="cs_sec_wrap">
        <div class="cs_wrap bg_overlay"
             style="background: url('<?php echo '/media/salons/' . $salon['slug'] . '/bg-main.jpg'; ?>') var(--black) no-repeat center; background-size: cover; border-radius: 15px;">
            <div class="cs_col six_twelve mobile" style="padding: 3%;">
                <h4 class="bot_mrgn_sml">Салон красоты</h4>
                <img alt="ПЕРСОНА логотип" src="/temp-media/logo.svg" class="svg bot_mrgn_sml">
                <h4 class="bot_mrgn_med"><?php echo $salon['address_short']; ?></h4>
                <div class="cs_col one bot_mrgn_med">
                    <div class="cs_col four_twelve">
                        <h6>188</h6>
                        <p>Услуг в салоне <?php echo $salon['address_short']; ?></p>
                    </div>
                    <div class="cs_col four_twelve">
                        <h6><?php echo $salon['workers']; ?></h6>
                        <p>Профессионалов своего дела</p>
                    </div>
                    <div class="cs_col four_twelve">
                        <h6 class="zero-jump">0</h6>
                        <p>Недовольнымх клиентов</p>
                    </div>
                </div>
                <h3 class="bg bot_mrgn_med" style="font-weight: 500;"><span>Красоту творим любовью</span></h3>
                <p style="font-weight: 500;" class="bot_mrgn_sml">Записаться на услуги on-line</p>
                <div class="cs_col contact-us-horizontal"></div>
                <p>или по тел. <a style="color: var(--white);" href="tel:<?php echo $salon['tel_link']; ?>"><?php echo $salon['tel']; ?></a>
            </div>
        </div>
    </div>
</section>

<!-- SERVICE -->
<section id="Choose">
    <div class="cs_sec_wrap">
        <div class="cs_wrap">
            <div class="cs_col align_center_txt">
                <h2>Выберите нужную услугу:</h2>
            </div>
        </div>
        <div class="cs_wrap">
            <div class="cs_col one equal_height">
                <?php foreach ($services as $service) : ?>
                    <?php if (array_key_exists('preview-b', $service)) : ?>
                        <a href="<?php echo current_url() . '/' . $service['slug']; ?>" class="cs_col three_twelve service-item">
                            <img src="<?php echo $service['preview-b']; ?>">
                            <p class="big hr_line_under"><?php echo $service['name']; ?></p>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php WidgetFactoryHelper::aboutPersona($salon['slug'], $salon); ?>

<?php WidgetFactoryHelper::aboutTeam($salon['slug'], $salon['name']); ?>

<?php WidgetFactoryHelper::personaMap($salons); ?>

