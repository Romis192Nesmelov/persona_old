<?php if (isset($seo) && isset($assets) && isset($canonical))  : ?>
<!doctype html>
<html amp lang="ru">
<head>
    <meta charset="utf-8">
    <title><?php echo $seo['title']; ?></title>
    <link rel="canonical" href="<?= $canonical ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url(); ?>assets/favicon.png" type="image/png">
    <meta property="og:title" content="<?php echo $seo['title']; ?>">
    <meta property="og:description" content="<?php echo $seo['description_short']; ?>">
    <meta property="og:url" content="<?php echo base_url(); ?>/">
    <meta property="og:image" content="<?php echo base_url(); ?>assets/logos/logo_ogp.jpg">
    <?php if (isset($article)) : ?>
        <script type="application/ld+json"><?= $article['json'] ?></script>
    <?php endif; ?>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.2.js"></script>
    <script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
    <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
    <script async custom-element="amp-selector" src="https://cdn.ampproject.org/v0/amp-selector-0.1.js"></script>
    <script async custom-element="amp-inputmask" src="https://cdn.ampproject.org/v0/amp-inputmask-0.1.js"></script>
    <script async custom-element="amp-consent" src="https://cdn.ampproject.org/v0/amp-consent-0.1.js"></script>
    <script async custom-element="amp-recaptcha-input" src="https://cdn.ampproject.org/v0/amp-recaptcha-input-0.1.js"></script>

    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <style amp-custom>
      <?= file_get_contents(FCPATH . '/assets/css/amp/main.min.css') ?>
      <?= file_get_contents(FCPATH . '/assets/css/amp/voucher.min.css') ?>
      <?= isset($blog) ? file_get_contents(FCPATH . '/assets/css/amp/blog.min.css') : '' ?>
      <?= isset($article) ? file_get_contents(FCPATH . '/assets/css/amp/article.min.css') : '' ?>
    </style>
</head>
<body>
<amp-analytics  type="metrika">
    <script type="application/json">
        {
            "vars": {
                "counterId": "51223982"
            },
            "triggers": {
                "notBounce": {
                    "on": "timer",
                    "timerSpec": {
                        "immediate": false, "interval": 15, "maxTimerLength": 16
                    },
                    "request": "notBounce"
                }
            }
        }
    </script>
</amp-analytics>
<?php endif; ?>
