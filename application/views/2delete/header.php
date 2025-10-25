<?php
/**
 * Copyright (c) 2018.
 * Powered by CheckSanity (https://checksanity.ru)
 * Developed for Prime Production (https://primeproduction.ru)
 */
?>
<!--
  ~ Copyright (c) 2018.
  ~ Powered by CheckSanity (https://checksanity.ru)
  ~ Developed for Prime Production (https://primeproduction.ru)
  -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="icon" href="<?php echo base_url(); ?>media/favicon.png" type="image/png">
    <title>
        <?php
        if (isset($is_home)) {
            echo 'ПЕРСОНА - Сеть салонов красоты';
            $salon['tel'] = '8 (495) показать номер';
            $salon['tel_link'] = '';
            $salon['address'] = '8 салонов в Москве';
            $salon['insta'] = 'https://www.instagram.com/persona_city_/';
        } else {
            if (isset($salon)) {
                if (isset($service)) {
                    echo $service['name'] . ' - ';
                }
                echo $salon['name'] . ' - ПЕРСОНА';
            }
        }
        ?>
    </title>

    <!-- Font -->
    <link rel="stylesheet" type="text/css" href="https://chcksnt.com/fonts/GothamPro/stylesheet.css" media="all">
    <link rel="stylesheet" type="text/css" href="https://chcksnt.com/fonts/FontAwesome4/stylesheet.css" media="all">

    <!-- CheckSanity WebKit -->
    <link rel="stylesheet" type="text/css" href="https://chcksnt.com/kit/reset.min.css" media="all">

    <link rel="stylesheet" type="text/css" href="https://chcksnt.com/kit/1.9/cs_basic.css">
    <link rel="stylesheet" type="text/css" href="https://chcksnt.com/kit/1.9/cs_responsive.css">
    <link rel="stylesheet" type="text/css" href="https://chcksnt.com/kit/1.9/cs_burger.css">
    <link rel="stylesheet" type="text/css" href="https://chcksnt.com/kit/1.9/cs_infobar.css">

    <!-- CheckSanity widgets -->
    <link rel="stylesheet" type="text/css" href="https://chcksnt.com/temp/ajaxform/1.2/cs_ajaxform.css">
    <link rel="stylesheet" type="text/css" href="https://chcksnt.com/temp/popup_classic/1.2/cs_popup.css">
    <link rel="stylesheet" type="text/css" href="https://chcksnt.com/temp/slider/1.1/cs_slider.css">
    <link rel="stylesheet" type="text/css" href="https://chcksnt.com/temp/beforeafter/1.1/cs_beforeafter.css">

    <!-- Site styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/user.css" media="all">
    <?php if (isset($is_salon)): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/salon.css" media="all">
    <?php elseif (isset($is_home)) : ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/home.css" media="all">
    <?php endif; ?>
    <?php if (isset($service_detailed)) : ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/service/<?php echo $service_detailed['slug']; ?>.css" media="all">
    <?php endif; ?>

    <!-- Yandex.Metrika counter -->
    <script>
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter51223982 = new Ya.Metrika2({
                        id: 51223982,
                        clickmap: true,
                        trackLinks: true,
                        accurateTrackBounce: true,
                        webvisor: true
                    });
                } catch (e) {
                }
            });
            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () {
                    n.parentNode.insertBefore(s, n);
                };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/tag.js";
            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks2");
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/51223982" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- Jquery & Basic Scripts -->
    <script src="https://chcksnt.com/jquery/jquery.min.js"></script>
    <script src="https://chcksnt.com/kit/1.9/cs_basic.js"></script>
    <script src="https://chcksnt.com/kit/1.9/cs_burger.js"></script>
    <script src="https://chcksnt.com/kit/1.9/cs_infobar.js"></script>
    <script>
        let salonName = 'неизвестный салон';
        let serviceName = 'неизвестная услуга';
        let serviceDetailed = 'неизвестные детали услуги';

        <?php if (isset($salon['name'])) :?>
        salonName = '<?php echo $salon['name']; ?>';
        <?php endif; ?>

        <?php if (isset($service_detailed) && isset($services) && isset($services[$service_detailed['slug']]['name'])) : ?>
        serviceName = '<?php echo $services[$service_detailed['slug']]['name']; ?>';

        <?php if (array_key_exists('style', $_GET) && array_key_exists($_GET['style'], $service_detailed['styles'])) :?>
        serviceDetailed = '<?php echo $service_detailed['styles'][$_GET['style']]['name']; ?>';
        <?php endif; ?>

        <?php endif; ?>
    </script>
</head>
<body>
<header class="transparent info_bar">
    <div class="bar">
        <div class="cs_con">
            <p>Beauty-лаборатория</p>
            <div class="cs_flex_row align_right align_middle">
                <?php echo '<p>' . $salon['address'] . '</p>'; ?>
                <p><a href="mailto: info@persona-city.ru"><i class="fa fa-envelope" aria-hidden="true"></i> info@persona-city.ru</a></p>
                <a class="social img" href="<?php echo $salon['insta']; ?>" target="_blank"><img class="svg"
                                                                                                 src="https://chcksnt.com/assets/social_icons_rounded/social-insta.svg"></a>
            </div>
        </div>
    </div>
    <div class="cs_con">
        <div class="logo">
            <a href="/">
                <img class="svg" src="/temp-media/logo.svg"></a>
            </a>
        </div>
        <div class="menu">
            <nav>
                <ul>
                    <?php if (!isset($is_home)) : ?>
                        <?php if (isset($is_salon)) : ?>
                            <li><a href="#Choose">Выбор услуги</a></li>
                        <?php else: ?>
                            <li><a href="#Choose"><?php echo $service_detailed['action_button']; ?></a></li>
                        <?php endif; ?>
                        <li><a href="#Locations">Наши салоны</a></li>
                        <li><a href="#Team">Мастера</a></li>
                    <?php else: ?>
                        <li><a href="#Choose">Наши салоны</a></li>
                        <li><a href="#About">О нас</a></li>
                    <?php endif; ?>
                    <li><a href="#Contacts">Контакты</a></li>
                </ul>
            </nav>
        </div>
        <div class="action">
            <h4 style="margin-bottom: 4px;">
                <?php if ($salon['tel'] == '8 (495) показать номер') : ?>
                    <div class="telToggle">
                        <span><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $salon['tel']; ?></span>
                        <div class="tel-list ">
                            <?php foreach ($salons as $salon) : ?>
                                <div class="cs_col one cs_flex_row align_justify">
                                    <p class="icon"><img class="svg <?php echo $salon['slug']; ?>-metro" src="/temp-media/metro.svg"></p>
                                    <div class="cs_col">
                                        <p class="small name" style="font-weight: 700;"><?php echo $salon['name']; ?></p>
                                        <p class="small tel"><a href="tel:<?php echo $salon['tel_link']; ?>"><?php echo $salon['tel']; ?></a></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="tel: <?php echo $salon['tel_link']; ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $salon['tel']; ?></a>
                <?php endif; ?>
            </h4>
        </div>
    </div>
</header>
