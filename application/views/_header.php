<?php
?>
<header>
    <div id="Bar">
        <div>
            <?= isset($salon) && array_key_exists('address_short', $salon) ? '<p class="bar-salon-address">' . $salon['address_short'] . '</p>' : ''; ?>
            <div class="info">
                <a class="logo__container" href="/"><img src="<?= base_url(); ?>media/general/default/logo-w.svg" alt="ПЕРСОНА"></a>
                <div class="call__container">
                    <?php $this->load->view('_call_button', array('useDefPhone' => true)); ?>
                    <?php $this->load->view('_choose_a_salon'); ?>
                </div>
                <?php if (!isset($hide_online_link) || !$hide_online_link) : ?>
                    <div class="booking__container">
                        <?php $this->load->view('_record_button'); ?>
                        <?php $this->load->view('_online_record_button', array('useDropDown' => false)); ?>
                    </div>
                <? endif; ?>
<!--                --><?php //if (false) : ?>
                    <!--- INSTAGRAM -->
<!--                    <div class="instagram__container">-->
<!--                        <a --><?php //if ($salon['slug'] != 'default') : ?><!--href="--><?//= $salon['instagram'] ?><!--"--><?php //endif; ?>
<!--                           target="_blank" class="info-link" tabindex="0">-->
<!--                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">-->
<!--                                <path d="M352,0H160C71.648,0,0,71.648,0,160v192c0,88.352,71.648,160,160,160h192c88.352,0,160-71.648,160-160V160C512,71.648,440.352,0,352,0z M464,352c0,61.76-50.24,112-112,112H160c-61.76,0-112-50.24-112-112V160C48,98.24,98.24,48,160,48h192c61.76,0,112,50.24,112,112V352z"></path>-->
<!--                                <path d="M256,128c-70.688,0-128,57.312-128,128s57.312,128,128,128s128-57.312,128-128S326.688,128,256,128z M256,336c-44.096,0-80-35.904-80-80c0-44.128,35.904-80,80-80s80,35.872,80,80C336,300.096,300.096,336,256,336z"></path>-->
<!--                                <circle cx="393.6" cy="118.4" r="17.056"></circle>-->
<!--                            </svg>-->
<!--                            <span>Instagram</span>-->
<!--                        </a>-->
<!--                        --><?php //if ($salon['slug'] == 'default') : ?>
<!--                            <div class="instagram__links-container">-->
<!--                                <div class="instagram__links">-->
<!--                                    <p class="instagram__links-item"><b>Веберите салон</b></p>-->
<!--                                    --><?php //foreach ($salons as $salon_inst) : ?>
<!--                                        <a href="--><?//= $salon_inst['instagram'] ?><!--" target="_blank"-->
<!--                                           class="instagram__links-item">@персона --><?//= $salon_inst['name'] ?><!--</a>-->
<!--                                    --><?php //endforeach; ?>
<!--                                </div>-->
<!--                            </div>-->
<!--                        --><?php //endif ?>
<!--                    </div>-->
<!--                --><?php //endif; ?>

                <div class="menu">
                    <div class="menu__icon">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <nav class="menu__links">
<!--                        <h4 class="menu-name">ПЕРСОНА --><?//= $salon['address_short']; ?><!--</h4>-->
                        <a href="/" class="menu__links-item"><span>Главная</span></a>
                        <a href="#Services" class="menu__links-item"><span>Услуги</span></a>
                        <a href="<?= $salon['slug'] == 'default' ? '#Salons' : '#Locations' ?>" class="menu__links-item"><span>Салоны</span></a>
                        <a href="#Offers" class="menu__links-item"><span>Акции</span></a>
                        <a href="#About" class="menu__links-item"><span>О нас</span></a>
                        <a href="#Locations" class="menu__links-item"><span>Контакты</span></a>
                        <a href="/blog" class="menu__links-item"><span>Блог</span></a>
                        <a href="/vacancies" class="menu__links-item"><span>Вакансии</span></a>
                        <a href="/franchise" class="menu__links-item"><span>Франшиза</span></a>
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
                <a href="/franchise"><span>Франшиза</span></a>
            </nav>
        </div>
    </div>
</header>
