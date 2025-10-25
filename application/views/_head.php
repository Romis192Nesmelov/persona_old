<?php if (isset($seo) && isset($assets))  : ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $seo['description']; ?>">
    <meta name="format-detection" content="telephone=no">
    <title><?php echo $seo['title']; ?></title>
	<link rel="canonical" href="<?= $canonical ?>">
    <?php if (!empty($amp_link)) : ?>
        <link rel="amphtml" href="<?= $amp_link ?>">
    <?php endif; ?>
    <link rel="icon" href="<?php echo base_url(); ?>assets/favicon.png" type="image/png">
    <meta property="og:title" content="<?php echo $seo['title']; ?>">
    <meta property="og:description" content="<?php echo $seo['description_short']; ?>">
    <meta property="og:url" content="<?php echo base_url(); ?>/">
    <meta property="og:image" content="<?php echo base_url(); ?>assets/logos/logo_ogp.jpg">
    <link href="<?php echo base_url(); ?>assets/css/<?php echo $assets; ?>.min.css?<?= '11.09.2023' ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/style.css?<?= '08.11.2023' ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/vacancies.min.css?<?= '28.06.2024' ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/swiper-bundle.min.css"/>
</head>
<body>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(51223982, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        trackHash:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/51223982" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<?php else: ?>
    <?php die('Internal site error. Внутренняя ошибка сайта.'); ?>
<?php endif; ?>
