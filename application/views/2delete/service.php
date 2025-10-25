<?php
/**
 * Copyright (c) 2018.
 * Powered by CheckSanity (https://checksanity.ru)
 * Developed for Prime Production (https://primeproduction.ru)
 */

if (isset($service) && isset($service_detailed) && isset($salon)) {

} else {
    show_404();
}

$style_one = null;

if (array_key_exists('style', $_GET)) {
    if (array_key_exists($_GET['style'], $service_detailed['styles'])) {
        $style_one = $service_detailed['styles'][$_GET['style']];
    } else if (array_key_exists($_GET['style'], $service_detailed['other_styles'])) {
        $style_one = $service_detailed['other_styles'][$_GET['style']];
    }
}

?>
    <!-- MAIN -->
    <section id="MainScreen" style="padding-top: var(--section-full-padding-top); padding-bottom: var(--section-full-padding-bot);">
        <div class="cs_sec_wrap">
            <div class="cs_wrap"
                 style="background: url(<?php echo $service_detailed['link'] . '/bg-main.jpg'; ?>) var(--primary) no-repeat left bottom; background-size: cover; padding: 40px; border-radius: 15px;">
                <img class="main-img" src="<?php echo $service_detailed['link'] . '/img-main.png'; ?>">
                <div class="cs_col eight_twelve mobile">
                    <h1 class="bot_mrgn_med" style="text-transform: uppercase;">
                        <?php
                        if ($style_one) {
                            echo $style_one['name_full'];
                        } else {
                            echo $service_detailed['main_desc'];
                        }
                        echo ' в «ПЕРСОНЕ»';
                        ?>
                    </h1>
                    <h4 class="bot_mrgn_med">от <b>лучших</b> специалистов Москвы</h4>
                    <p class="bot_mrgn_med"><?php echo $service_detailed['main_subsubdesc']; ?></p>
                    <a class="btn auto bot_mrgn_med" href="#Choose"><?php echo $service_detailed['action_button']; ?></a>
                    <div class="cs_col"></div>
                    <div class="cs_col three_twelve mobile" cs-popup="ms_1">
                        <img class="svg main-icon" src="/temp-media/icons/shopping-mall.svg">
                        <p>Находимся в <b class="block"><?php echo $salon['address_short']; ?></b></p>
                    </div>
                    <div cs-popup-content="ms_1" cs-popup-style="info">
                        <div class="cs_col one cs_flex_row">
                            <div class="cs_col eight_twelve mobile" style="padding: 20px;">
                                <h2 class="bot_mrgn_sml">Находимся в <b><?php echo $salon['address_short']; ?></b></h2>
                                <p class="bot_mrgn_sml">Отдохните и уделите время себе, получив превосходный сервис <b>от лучших специалистов Москвы</b></p>
                                <p><b>Запишись онлайн:</b></p>
                                <div class="cs_col one contact-us-vertical"></div>
                                <p class="align_center">или по тел. <a href="tel:<?php echo $salon['tel_link']; ?>"><?php echo $salon['tel']; ?></a></p>
                            </div>
                            <img class="mobile_hide" src="/media/salons/<?php echo $salon['slug']; ?>/popup.jpg">
                        </div>
                    </div>
                    <div class="cs_col three_twelve mobile" cs-popup="ms_2">
                        <img class="svg main-icon" src="/temp-media/icons/wallet.svg">
                        <p>Цена на все <?php echo $service_detailed['main_type']; ?><br/></b><b>от
                                <?php
                                if ($style_one) {
                                    echo $style_one['price'];
                                } else {
                                    echo $service_detailed['main_price'];
                                }
                                ?>
                                руб.</b>
                        </p>
                    </div>
                    <div cs-popup-content="ms_2" cs-popup-style="info">
                        <div class="cs_col one cs_flex_row">
                            <div class="cs_col eight_twelve mobile" style="padding: 20px;">
                                <h2 class="bot_mrgn_sml">Цена на <?php echo $service_detailed['main_type']; ?>
                                    <br/><b>от <?php echo $service_detailed['main_price']; ?> руб</b></h2>
                                <p class="bot_mrgn_sml">Отдохните от шопинга и уделите время себе, получив окрашивание от <b>лучших специалистов Москвы.</b></p>
                                <p><b>Запишись онлайн:</b></p>
                                <div class="cs_col one contact-us-vertical"></div>
                                <p class="align_center">или по тел. <a href="tel:<?php echo $salon['tel_link']; ?>"><?php echo $salon['tel']; ?></a></p>
                            </div>
                            <img class="mobile_hide" src="<?php echo $service_detailed['link']; ?>ms_price.jpg">
                        </div>
                    </div>
                    <div class="cs_col three_twelve mobile" cs-popup="ms_3">
                        <img class="svg main-icon" src="/temp-media/icons/award.svg">
                        <p>Абсолютно <b class="block">безупречное качество</b></p>
                    </div>
                    <div cs-popup-content="ms_3" cs-popup-style="info">
                        <div class="cs_col one cs_flex_row">
                            <div class="cs_col eight_twelve mobile" style="padding: 20px;">
                                <h2 class="bot_mrgn_sml">Абсолютно <b>безупречное качество</b></h2>
                                <p class="bot_mrgn_sml">Нам потребовалось более 10 лет, чтобы бренд "ПЕРСОНА" ассоциировался со словом качество обращаясь за
                                    любой услугой к нам,
                                    Вы можете быть спокойны и уверены, ведь работают профессионалы</p>
                                <p><b>Запишись онлайн:</b></p>
                                <div class="cs_col one contact-us-vertical"></div>
                                <p class="align_center">или по тел. <a href="tel:<?php echo $salon['tel_link']; ?>"><?php echo $salon['tel']; ?></a></p>
                            </div>
                            <img class="mobile_hide" src="<?php echo $service_detailed['link']; ?>ms_quality.jpg">
                        </div>
                    </div>
                </div>
                <div id="MainContactUs" class="cs_col three_twelve align_right mobile"
                     style="background: var(--white); box-shadow: 0px 7px 11.8px 8.2px rgba(0, 0, 0, 0.05);">
                    <div class="cs_col one" style="background-image: url(/temp-media/form-header.png); background-repeat: repeat; padding-bottom: 12px;"></div>
                    <div class="cs_col one" style="padding: 20px 25px;">
                        <h4 class="align_center bot_mrgn_ult">Запишись<br/><b>сейчас</b> онлайн</h4>
                        <div class="cs_col one contact-us-vertical"></div>
                        <p class="align_center">или по тел.<br/><a href="tel:<?php echo $salon['tel_link']; ?>"><?php echo $salon['tel']; ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICE -->
    <section id="Choose">
        <div class="cs_sec_wrap">
            <div class="cs_wrap">
                <?php if ($style_one) : ?>
                    <div class="cs_col one style-popup bot_mrgn_med">
                        <?php WidgetFactoryHelper::styleDetailedBlock($service_detailed['link_style'], $_GET['style'], $style_one, $salon, true); ?>
                    </div>
                    <div class="cs_col bot_mrgn_sml">
                        <h3 style="font-weight: 700;">Наши мастера отлично знают этот стиль и многие другие:</h3>
                    </div>
                    <div class="cs_col one equal_height">
                        <?php WidgetFactoryHelper::serviceGetChooseSmall($service_detailed, $service_detailed['styles'], $_GET['style'], $salon); ?>
                        <?php
                        if (array_key_exists('other_styles', $service_detailed)) {
                            WidgetFactoryHelper::serviceGetChooseSmall($service_detailed, $service_detailed['other_styles'], $_GET['style'], $salon);
                        }
                        ?>
                    </div>
                <? else : ?>
                    <div class="cs_col bot_mrgn_med">
                        <h2><?php echo $service_detailed['action_title']; ?>:</h2>
                    </div>
                    <div class="cs_col one equal_height no_margins_v bot_mrgn_col">
                        <!-- НЕ ЗНАЮ ЧТО ПОДОЙДЕТ -->
                        <?php
                        $service_block_size = 'one';
                        $isGetContact = WidgetFactoryHelper::serviceGetContact($service_detailed);
                        if ($isGetContact) {
                            $service_block_size = 'nine_twelve';
                        }

                        ?>
                        <!-- УСЛУГИ -->
                        <?php
                        $service_no_margins = 'no_margins_v';
                        if (array_key_exists('style_margin_v', $service_detailed) && $service_detailed['style_margin_v']) {
                            $service_no_margins = '';
                        }
                        ?>
                        <div class="cs_col <?php echo $service_block_size; ?> equal_height <?php echo $service_no_margins; ?> mobile">
                            <?php WidgetFactoryHelper::serviceGetChoose($service_detailed, $service_detailed['styles'], $salon); ?>
                        </div>
                    </div>
                    <!-- ПРОЧИЕ УСЛУГИ -->
                    <?php if (array_key_exists('other_styles', $service_detailed)) : ?>
                        <div class="cs_col equal_height">
                            <?php WidgetFactoryHelper::serviceGetChoose($service_detailed, $service_detailed['other_styles'], $salon); ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- BEFORE AFTER -->
    <section class="mobile_hide" style="background-color: var(--background-2-principles);">
        <div class="cs_sec_wrap">
            <div class="cs_wrap">
                <div class="cs_col align_center_txt">
                    <h1 style="font-weight: 300;">2 принципа <span class="dot-highlight">ПЕРСОНЫ</span><br/>для безупречного результата</h1>
                </div>
            </div>
            <div class="cs_wrap">
                <div class="cs_col one two-princips">
                    <div class="cs_col one" style="width: calc(100% - 100px); padding: 0 50px;">
                        <img src="<?php echo $service_detailed['link'] . 'after.jpg'; ?>">
                    </div>
                    <div class="cs_col one" style="width: calc(100% - 100px); padding: 0 50px;">
                        <img src="<?php echo $service_detailed['link'] . 'before.jpg'; ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- OFFER -->
    <section style="background: url('/temp-media/offer.png') var(--background-offer) no-repeat center;">
        <div class="cs_sec_wrap">
            <div class="cs_wrap">
                <div class="cs_col six_twelve mobile">
                    <h1 class="bot_mrgn_med">Доверяй свой образ профессионалам</h1>
                    <h4>«ПЕРСОНА» — знак качества, запишись сейчас онлайн</h4>
                </div>
                <div class="cs_col four_twelve align_right mobile">
                    <div class="cs_col one contact-us-vertical"></div>
                    <p class="align_center">или по тел. <a href="tel:<?php echo $salon['tel_link']; ?>"><?php echo $salon['tel']; ?></a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT -->
<?php WidgetFactoryHelper::aboutPersona($salon['slug'], $salon); ?>

    <!-- TEAM -->
<?php WidgetFactoryHelper::aboutTeam($salon['slug'], $salon['name']); ?>

    <!-- OFFER 2 -->
    <section style="background: url('/temp-media/quests.svg') var(--background-offer) no-repeat center; background-size: 90px;">
        <div class="cs_sec_wrap">
            <div class="cs_wrap">
                <div class="cs_col six_twelve mobile">
                    <h1 class="bot_mrgn_med" style="font-weight: 500;">Не определились с выбором?</h1>
                    <h4>С «ПЕРСОНОЙ» будьте уверены Ваш образ в надежных руках</h4>
                </div>
                <div class="cs_col four_twelve align_right mobile">
                    <div class="cs_col one contact-us-vertical"></div>
                    <p class="align_center">или по тел. <a href="tel:<?php echo $salon['tel_link']; ?>"><?php echo $salon['tel']; ?></a></p>
                </div>
            </div>
        </div>
    </section>

<?php if (isset($services)) : ?>
    <!-- OTHER SERVICES -->
    <div id="ListOfServices" style="background-color: var(--background-services);">
        <div class="cs_sec_wrap">
            <div class="cs_wrap">
                <div class="cs_col align_center_txt">
                    <h2 style="font-weight: 300;">Другие услуги <b>“Персона”</b></h2>
                </div>
            </div>
            <div class="cs_wrap">
                <div class="cs_col one equal_height">
                    <?php
                    $i = 0;
                    foreach ($services as $service) :
                        if (array_key_exists('preview', $service)) :
                            if ($i % 3 == 0) {
                                echo $i > 0 ? '</div>' : '';
                                echo '<div class="cs_col cs_flex_row bot_mrgn_sml mobile_flex_wrap service-row ">';
                            } ?>
                            <a href="/salon_<?php echo $salon['slug']; ?>/<?php echo $service['slug']; ?>"
                               class="cs_col three_twelve cs_flex_row bot_mrgn_sml align_middle mobile service-item">
                                <img src="<?php echo $service['preview']; ?>">
                                <p class="big"><?php echo $service['name']; ?> </p>
                            </a>
                            <?php
                            $i++;
                        endif;
                    endforeach;

                    /* Если количество не делится на 3, то добавляем пустышки */
                    if ($i % 3 != 0) {
                        for ($j = 0; $j < ($i % 3 - 1); $j++) {
                            echo '<a class="cs_col three_twelve">&nbsp;</a>';
                        }
                    }
                    echo '</div>'; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($salons)) : ?>
    <!-- SALONS -->
    <?php WidgetFactoryHelper::personaMap($salons); ?>
<?php endif; ?>