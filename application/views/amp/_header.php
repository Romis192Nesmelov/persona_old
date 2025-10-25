<?php if (isset($salon) && isset($salons) && isset($utm)) : ?>
    <header class="header">
        <div class="header__bar">
            <div class="container">
                <p class="header__address"><?= $salon['address_short'] ?></p>
                <nav class="header__cta cta">
                    <div class="cta__item">
                        <a <?php if ($salon['slug'] != 'default') : ?>href="tel:<?= $salon['tel'] ?>"<?php endif; ?>
                           class="cta__link" tabindex="0">
                            <amp-img src="<?= base_url() ?>assets/icons/icon-call.svg" width="20" height="20" alt=""></amp-img>
                            Позвонить
                        </a>
                        <?php if ($salon['slug'] == 'default') : ?>
                            <div class="cta__links">
                                <p class="call__links-title"><b>Выберите салон</b></p>
                                <?php foreach ($salons as $salon_tel) : ?>
                                    <a href="tel:<?= $salon_tel['tel'] ?>" class="cta__links-item">
                                        <span>Персона <?= $salon_tel['name'] ?></span>
                                        <span><?= $salon_tel['tel'] ?></span>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="cta__item">
                        <span role="button" on="tap:lead.open" class="cta__link" tabindex="0">
                            <amp-img src="<?= base_url() ?>assets/icons/icon-booking.svg" width="20" height="20" alt=""></amp-img>
                            Запись онлайн
                        </span>
                    </div>
                    <?php if (false) : ?>
                    <!--- INSTAGRAM -->
                    <div class="cta__item cta__item--mh">
                        <a <?php if ($salon['slug'] != 'default') : ?>href="<?= $salon['instagram'] ?>"<?php endif; ?>
                           target="_blank" class="cta__link" tabindex="0">
                            <amp-img src="<?= base_url() ?>assets/icons/icon-instagram.svg" width="20" height="20" alt=""></amp-img>
                            Instagram
                        </a>
                        <?php if ($salon['slug'] == 'default') : ?>
                            <div class="cta__links">
                                <p class="cta__links-title"><b>Выберите салон</b></p>
                                <?php foreach ($salons as $salon_inst) : ?>
                                    <a href="<?= $salon_inst['instagram'] ?>" target="_blank" class="cta__links-item">@персона <?= $salon_inst['name'] ?></a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <?php endif; ?>
                    <button type="button" on="tap:mobile-menu.toggle" class="burger">
                        <amp-img width="20" height="20" src="<?php echo base_url(); ?>assets/icons/icon-burger.svg" alt=""></amp-img>
                    </button>
                </nav>
            </div>
        </div>
        <nav class="header__nav">
            <div class="container">
                <a target="_blank" class="logo" href="/">
                    <amp-img width="180" height="22" src="<?php echo base_url(); ?>media/general/default/logo.svg" alt="ПЕРСОНА"></amp-img>
                </a>
                <ul class="header__nav-links">
                    <li class="header__nav-link">
                        <a href="#Services"><span>Услуги</span></a>
                    </li>
                    <li class="header__nav-link">
                        <a href="#Salons"><span>Салоны</span></a>
                    </li>
                    <li class="header__nav-link">
                        <a href="#Offers"><span>Акции</span></a>
                    </li>

                    <li class="header__nav-link">
                        <a href="#About"><span>О нас</span></a>
                    </li>

                    <li class="header__nav-link">
                        <a target="_blank" href="/blog"><span>Блог</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="header__clear-top"></div>
    <amp-sidebar id="mobile-menu" layout="nodisplay" side="right">
        <nav class="sidebar">
            <p class="sidebar__title">ПЕРСОНА <?= $salon['address_short']; ?></p>
            <a target="_blank" href="/" class="sidebar__link">Главная</a>
            <a href="#Services" on="tap:Services.scrollTo" class="sidebar__link">Услуги</a>
            <a href="#Salons" on="tap:Salons.scrollTo" class="sidebar__link">Салоны</a>
            <a href="#Offers" on="tap:Offers.scrollTo" class="sidebar__link">Акции</a>
            <a href="#About" on="tap:About.scrollTo" class="sidebar__link">О нас</a>
            <a target="_blank" href="/blog" class="sidebar__link">Блог</a>
            <button on="tap:mobile-menu.close" class="sidebar__close" type="button">
                <amp-img width="20" height="20" src="<?= base_url(); ?>assets/icons/icon-close.svg" alt=""></amp-img>
            </button>
        </nav>
    </amp-sidebar>
<?php endif; ?>