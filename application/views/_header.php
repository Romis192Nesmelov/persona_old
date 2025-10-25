<?php
?>
<header>
    <div id="Bar">
        <div>
            <?php echo isset($salon) && array_key_exists('address_short', $salon) ? '<p class="bar-salon-address">' . $salon['address_short'] . '</p>' : ''; ?>
            <div class="info">
                <a class="logo__container" href="/">
                    <img src="<?= base_url(); ?>media/general/default/logo-w.svg" alt="ПЕРСОНА">
                </a>
                <?php if (!empty($salon['tel'])) : ?>
                    <div class="call__container">
                        <a <?php if ($salon['slug'] != 'default') : ?>href="tel:<?= $salon['tel'] ?>"<?php endif; ?>
                           class="info-link" tabindex="0">
                            <svg class="icon" width="20" height="20" viewBox="0 0 1792 1792"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M1600 1240q0 27-10 70.5t-21 68.5q-21 50-122 106-94 51-186 51-27 0-53-3.5t-57.5-12.5-47-14.5-55.5-20.5-49-18q-98-35-175-83-127-79-264-216t-216-264q-48-77-83-175-3-9-18-49t-20.5-55.5-14.5-47-12.5-57.5-3.5-53q0-92 51-186 56-101 106-122 25-11 68.5-21t70.5-10q14 0 21 3 18 6 53 76 11 19 30 54t35 63.5 31 53.5q3 4 17.5 25t21.5 35.5 7 28.5q0 20-28.5 50t-62 55-62 53-28.5 46q0 9 5 22.5t8.5 20.5 14 24 11.5 19q76 137 174 235t235 174q2 1 19 11.5t24 14 20.5 8.5 22.5 5q18 0 46-28.5t53-62 55-62 50-28.5q14 0 28.5 7t35.5 21.5 25 17.5q25 15 53.5 31t63.5 35 54 30q70 35 76 53 3 7 3 21z"/>
                            </svg>
                            <span>Позвонить<span>
                        </a>
                        <?php if ($salon['slug'] == 'default') : ?>
                            <div class="call__links-container">
                                <div class="call__links">
                                    <p class="call__links-item"><b>Веберите салон</b></p>
                                    <?php foreach ($salons as $salon_tel) : ?>
                                        <a href="tel:<?= $salon_tel['tel'] ?>" class="call__links-item">
                                            Персона
                                            <?= $salon_tel['name'] ?>
                                            <br>
                                            <?= $salon_tel['tel'] ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if (!isset($hide_online_link) || !$hide_online_link) : ?>
                    <div class="booking__container">
                        <a style="background-image: linear-gradient(to right, #ffd200 0%, #ffba00 51%, #ffd200 100%);
                            padding: 4px 12px;
                            border-radius: 16px;" class="info-link" target="_blank" tabindex="0"
                           href="<?= $salon['online_link'] ?>&utm_source=<?= $utm ?>" rel="nofollow">
                            <!-- TODO: add booking__popup-open class to link with online_link -->
                            <!-- TODO: remove popup-trigger of link with online_link -->
                            <svg style="fill: #000000" class="icon" width="20" height="20" viewBox="0 0 1792 1792"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M1303 964l-512 512q-10 9-23 9t-23-9l-288-288q-9-10-9-23t9-22l46-46q9-9 22-9t23 9l220 220 444-444q10-9 23-9t22 9l46 46q9 9 9 22t-9 23zm-1175 700h1408v-1024h-1408v1024zm384-1216v-288q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v288q0 14 9 23t23 9h64q14 0 23-9t9-23zm768 0v-288q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v288q0 14 9 23t23 9h64q14 0 23-9t9-23zm384-64v1280q0 52-38 90t-90 38h-1408q-52 0-90-38t-38-90v-1280q0-52 38-90t90-38h128v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h384v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h128q52 0 90 38t38 90z"/>
                            </svg>
                            <span style="color: #000000">Запись онлайн</span>
                        </a>
                    </div>
                <? endif; ?>
                <?php if (false) : ?>
                    <!--- INSTAGRAM -->
                    <div class="instagram__container">
                        <a <?php if ($salon['slug'] != 'default') : ?>href="<?= $salon['instagram'] ?>"<?php endif; ?>
                           target="_blank" class="info-link" tabindex="0">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M352,0H160C71.648,0,0,71.648,0,160v192c0,88.352,71.648,160,160,160h192c88.352,0,160-71.648,160-160V160C512,71.648,440.352,0,352,0z M464,352c0,61.76-50.24,112-112,112H160c-61.76,0-112-50.24-112-112V160C48,98.24,98.24,48,160,48h192c61.76,0,112,50.24,112,112V352z"></path>
                                <path d="M256,128c-70.688,0-128,57.312-128,128s57.312,128,128,128s128-57.312,128-128S326.688,128,256,128z M256,336c-44.096,0-80-35.904-80-80c0-44.128,35.904-80,80-80s80,35.872,80,80C336,300.096,300.096,336,256,336z"></path>
                                <circle cx="393.6" cy="118.4" r="17.056"></circle>
                            </svg>
                            <span>Instagram</span>
                        </a>
                        <?php if ($salon['slug'] == 'default') : ?>
                            <div class="instagram__links-container">
                                <div class="instagram__links">
                                    <p class="instagram__links-item"><b>Веберите салон</b></p>
                                    <?php foreach ($salons as $salon_inst) : ?>
                                        <a href="<?= $salon_inst['instagram'] ?>" target="_blank"
                                           class="instagram__links-item">@персона <?= $salon_inst['name'] ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                <?php endif; ?>

                <div class="menu">
                    <div class="menu__icon">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <nav class="menu__links">
                        <h4 class="menu-name">ПЕРСОНА <?= $salon['address_short']; ?></h4>
                        <a href="/" class="menu__links-item"><span>Главная</span></a>
                        <a href="#Services" class="menu__links-item"><span>Услуги</span></a>
                        <a href="<?= $salon['slug'] == 'default' ? '#Salons' : '#Locations' ?>"
                           class="menu__links-item"><span>Салоны</span></a>
                        <a href="#Offers" class="menu__links-item"><span>Акции</span></a>
                        <a href="#About" class="menu__links-item"><span>О нас</span></a>
                        <a href="#Locations" class="menu__links-item"><span>Контакты</span></a>
                        <a href="/blog" class="menu__links-item"><span>Блог</span></a>
                        <a href="/vacancies" class="menu__links-item"><span>Вакансии</span></a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div id="Header">
        <div>
            <a class="logo" href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>media/general/default/logo.svg" alt="ПЕРСОНА">
            </a>
            <nav>
                <a href="#Services"><span>Услуги</span></a>
                <a href="<?= $salon['slug'] == 'default' ? '#Salons' : '#Locations' ?>"><span>Салоны</span></a>
                <a href="#Offers"><span>Акции</span></a>
                <a href="#About"><span>О нас</span></a>
                <a href="#Locations"><span>Контакты</span></a>
                <a href="/blog"><span>Блог</span></a>
                <a href="/vacancies"><span>Вакансии</span></a>
            </nav>
        </div>
    </div>
</header>
