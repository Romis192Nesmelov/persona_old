<?php
if (!isset($salon_slug)) {
    $salon_slug = 'default';
}
?>
<section id="About">
    <div>
        <div class="wrp">
            <?php if (file_exists('./media/salons/' . $salon_slug . '/gallery/')) : ?>
                <?php echo isset($title_gallery) ? '<h5 class="about__gallery-title bg-heading"><span>' . $title_gallery . '</span></h5>' : ''; ?>
                <div class="w-1 about__slider swiper js-slider-salon">
                    <div class="content swiper-wrapper">
                        <?php
                        $files = glob('./media/salons/' . $salon_slug . '/gallery/*.jpg');
                        $imgs = [];
                        foreach ($files as $file) {
                            $imgs[] = str_replace(['./', '.jpg'], '', $file);
                        }
                        foreach ($imgs as $img) : ?>
                            <div class="w-1 swiper-slide">
                                <picture>
                                    <source type="image/webp" class="swiper-lazy" data-srcset="<?= base_url() . $img . '.webp' ?>">
                                    <img class="swiper-lazy" data-src="<?= base_url() . $img . '.jpg' ?>" alt="Фото салона">
                                </picture>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="about__gallery-next gallery-next" type="button"></button>
                    <button class="about__gallery-prev gallery-prev" type="button"></button>
                </div>
            <?php endif; ?>
            <div class="w-1 text">
                <h4 class="bot-mrgn-sml about__title"><?= isset($title) ? $title : 'О «Персоне»' ?></h4>
                <div class="w-1 row mobile-row bot-mrgn-sml">
                    <?php echo isset($quote_1) ? '<div class="w-6-12 mobile"><p class="big">' . $quote_1 . '</p></div>' : ''; ?>
                    <?php echo isset($quote_2) ? '<div class="w-6-12 mobile"><p class="big">' . $quote_2 . '</p></div>' : ''; ?>
                </div>
            <?= isset($author) ? '<!--div class="w-1 bot-mrgn-sml"><q>' . $author . '</q></div-->' : ''; ?>
                <div class="w-1 row mobile-row cntr-itms">
                        <a class="w-3-12 mobile row cntr-itms item" popup-trigger="about-premium">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.85 27.2">
                                <path
                                        d="M27.85,9h0a.51.51,0,0,0-.06-.22s0,0,0,0L22.61.23s0,0,0,0a.57.57,0,0,0-.11-.11l-.06,0,0,0a.45.45,0,0,0-.16,0H5.63a.9.9,0,0,0-.16,0l0,0-.06,0L5.27.2s0,0,0,0L.07,8.69s0,0,0,0A.51.51,0,0,0,0,8.94H0S0,9,0,9a.48.48,0,0,0,.07.2l0,0L13.55,27l0,0,.05.06h0l0,0,.08,0,0,0,.13,0,.12,0,0,0,.08,0,0,0h0l0-.06,0,0L27.76,9.22a0,0,0,0,1,0,0,.48.48,0,0,0,.07-.2S27.85,9,27.85,9ZM5.56,1.51l2.86,7H1.31Zm12.55,7.9L13.93,24.92,9.74,9.41ZM9.94,8.47l4-7,4,7ZM14.73.94H21.5L18.65,7.86ZM9.2,7.86,6.35.94h6.77ZM8.77,9.41l4.07,15.1L1.42,9.41Zm10.31,0h7.35L15,24.51Zm.35-.94,2.86-7,4.25,7Z"/>
                            </svg>
                            <p>Клиентский сервис<br><strong>премиум класса</strong></p>
                        </a>

                        <a class="w-3-12 mobile row cntr-itms item" popup-trigger="about-fashion">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 111.39 148.2">
                                <path
                                        d="M19.88.05A16.07,16.07,0,0,0,8.31,5.63C-1.34,16.46,0,39.52.11,40.63,1.94,56,3.43,61.49,5.32,68.4,5.85,70.32,6.4,72.34,7,74.72a2.51,2.51,0,0,0,2.43,1.89,2.89,2.89,0,0,0,.5,0l25.25-5.12a2.49,2.49,0,0,0,2-2.65c-.63-8.17,1.58-12.78,3.71-17.26,1.89-4,3.85-8.06,3.46-14.3C43.47,23,42.05-1.19,19.88.05ZM36.36,49.39c-2.12,4.44-4.5,9.42-4.29,17.59L11.25,71.2c-.39-1.47-.75-2.82-1.1-4.11-1.84-6.72-3.29-12-5.07-26.91C5.07,40,3.77,18.24,12,9A11.18,11.18,0,0,1,20.13,5l1.12,0c14.87,0,17,15.39,18.12,32.83C39.65,42.49,38.13,45.69,36.36,49.39Z"/>
                                <path
                                        d="M36.67,79.91l-24.76,5a2.51,2.51,0,0,0-1.95,3c3.51,16.62,7.71,26.23,18.79,26.23a21.6,21.6,0,0,0,3.39-.28c4.56-.72,7.51-2.3,9.29-5,3.43-5.21,1.54-13.7-1.84-27.12A2.48,2.48,0,0,0,36.67,79.91Zm.59,26.2c-.6.9-1.85,2.17-5.9,2.8a16.22,16.22,0,0,1-2.61.22c-6.52,0-10-5.06-13.36-19.8l19.93-4C37.93,95.8,39.34,103,37.26,106.11Z"/>
                                <path
                                        d="M103.07,39.7A16.12,16.12,0,0,0,91.5,34.11C69.63,33,67.92,57.06,67,71.6c-.37,6,1.59,10.05,3.48,14,2.14,4.47,4.35,9.09,3.71,17.26a2.52,2.52,0,0,0,2,2.65l25.26,5.11a2.09,2.09,0,0,0,.49.05,2.5,2.5,0,0,0,2.43-1.89c.6-2.37,1.14-4.39,1.66-6.3,1.89-6.92,3.39-12.38,5.24-27.93C111.36,73.58,112.72,50.52,103.07,39.7Zm3.25,34.4c-1.8,15.05-3.25,20.36-5.09,27.07-.35,1.29-.72,2.63-1.1,4.09l-20.81-4.21c.2-8.17-2.18-13.15-4.3-17.59-1.76-3.7-3.29-6.9-3-11.86C73.11,54,75.21,38.2,91.25,39.1A11.13,11.13,0,0,1,99.33,43C107.6,52.28,106.32,74,106.32,74.1Z"/>
                                <path
                                        d="M99.47,119l-24.76-5a2.48,2.48,0,0,0-2.93,1.85l-.36,1.47c-3,12.15-5,20.18-1.46,25.54,1.79,2.71,4.83,4.37,9.29,5.08a21.38,21.38,0,0,0,3.38.28c11.09,0,15.29-9.62,18.79-26.23a2.49,2.49,0,0,0-2-3ZM80,143c-3-.47-4.93-1.42-5.91-2.9-2.27-3.43-.47-11,1.94-20.72l19.93,4C92.24,140,88.29,144.3,80,143Z"/>
                            </svg>
                            <p>На шаг быстрее<br><strong>моды</strong></p>
                        </a>

                        <a class="w-3-12 mobile row cntr-itms item" popup-trigger="about-atmosphere">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 194.77 142.13">
                                <path
                                        d="M176.34,22.83c-.07,0-.69,0-.77,0-.33,0-.82,0-1.29,0-3-4.49-12.37-16.54-29.08-21.11-14.52-4-30.61-1.11-47.81,8.4C80.19.63,64.1-2.24,49.58,1.74,32.83,6.32,23.48,18.4,20.48,22.88c-.67,0-1.29-.06-1.77-.06h-.08a19,19,0,0,0-.4,38,14.61,14.61,0,0,1,9.69,7.28c9.06,15.81-1.48,49.05-1.58,49.39a3.37,3.37,0,0,0,3.21,4.41H165.22a3.37,3.37,0,0,0,3.21-4.41c-.1-.34-10.65-33.55-1.58-49.39a14.59,14.59,0,0,1,9.69-7.28,18.84,18.84,0,0,0,18.23-19C194.77,31.35,186.41,22.83,176.34,22.83Zm-33-14.6c12,3.24,19.69,11.13,23.47,15.9a32.43,32.43,0,0,0-16.56,10.7c-9.28,11.25-11.95,29-7.95,52.89H100.76V15.93C116.29,7.36,130.58,4.78,143.32,8.23Zm-91.87,0c12.72-3.47,27-.87,42.56,7.7V87.72H52.49c4-23.86,1.33-41.64-8-52.89A32.29,32.29,0,0,0,28,24.15C31.73,19.39,39.46,11.48,51.45,8.23ZM176.13,54.05a3.61,3.61,0,0,0-.73.07A21.36,21.36,0,0,0,161,64.71c-8.46,14.77-3,40.17-.26,50.41H34.05c2.73-10.24,8.19-35.64-.27-50.41A21.39,21.39,0,0,0,19.37,54.12a3.71,3.71,0,0,0-.74-.07A12.07,12.07,0,0,1,6.76,41.81,12.2,12.2,0,0,1,19.19,29.57a27,27,0,0,1,20.13,9.56c8.46,10.24,10.41,27.51,5.8,51.33a3.39,3.39,0,0,0,.72,2.79,3.36,3.36,0,0,0,2.6,1.23h97.88a3.38,3.38,0,0,0,3.32-4c-4.6-23.82-2.65-41.09,5.8-51.33,7.43-9,17.86-9.55,20.61-9.55h.08a12.24,12.24,0,0,1,0,24.47Z"/>
                                <path
                                        d="M151.19,128.6a3.37,3.37,0,0,0-3.38,3.37v3.4h-6.94V132a3.38,3.38,0,0,0-6.76,0v6.78a3.38,3.38,0,0,0,3.38,3.38h13.7a3.37,3.37,0,0,0,3.37-3.38V132A3.37,3.37,0,0,0,151.19,128.6Z"/>
                                <path
                                        d="M56.6,128.6A3.37,3.37,0,0,0,53.22,132v3.4H46.28V132a3.38,3.38,0,0,0-6.76,0v6.78a3.38,3.38,0,0,0,3.38,3.38H56.6A3.38,3.38,0,0,0,60,138.75V132A3.38,3.38,0,0,0,56.6,128.6Z"/>
                            </svg>
                            <p>Всегда <strong>комфортно, приветливая</strong> атмосфера</p>
                        </a>
                    <div class="w-3-12">
                        <a class="btn" popup-trigger="about-lead">Записаться</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <div class="cs-popup info-popup" trigger="about-premium">
        <div class="wrp">
            <div class="w-1 row jsfd">
                <div class="w-8-12 no-mrgn text">
                    <h5 class="bot-mrgn-ult about__title">Клиентский сервис<br><strong>премиум класса</strong></h5>
                    <p>Высокий уровень сервиса и забота о каждом клиенте основной приоритет салонов «ПЕРСОНА»</p>
                    <p class="bot-mrgn-ult"><strong>Доверяйте свой образ лучшим специалистам</strong></p>
                    <?php $this->load->view('_form', ['horizontal' => false, 'heading' => null, 'master' => false]); ?>
                </div>
                <div class="w-4-12 no-mrgn img  k1-lazy-picture"
                     data-bg-src="<?php echo base_url(); ?>assets/imgs/popup_about-premium.webp"
                     ></div>
            </div>
        </div>
    </div>
    <div class="cs-popup info-popup" trigger="about-fashion">
        <div class="wrp">
            <div class="w-1 row jsfd">
                <div class="w-8-12 no-mrgn text">
                    <h5 class="bot-mrgn-ult about__title">На шаг быстрее<br><strong>моды</strong></h5>
                    <p>Специалисты персоны отличаются тем, что постоянно повышают своё мастерство, обучаются у мировых экспертов и всегда следят за трендами</p>
                    <p class="bot-mrgn-ult"><strong>В ногу со временем с лучшим от «ПЕРСОНЫ»</strong></p>
                    <?php $this->load->view('_form', ['horizontal' => false, 'heading' => null, 'master' => false]); ?>
                </div>
                <div class="w-4-12 no-mrgn img k1-lazy-picture"
                     data-bg-src="<?php echo base_url(); ?>assets/imgs/popup_about-fashion.webp"
                ></div>
            </div>
        </div>
    </div>
    <div class="cs-popup info-popup" trigger="about-atmosphere">
        <div class="wrp">
            <div class="w-1 row jsfd">
                <div class="w-8-12 no-mrgn text">
                    <h5 class="bot-mrgn-ult about__title">Всегда <strong>комфортно, приветливая</strong> атмосфера</h5>
                    <p>Каждого клиента мы стараемся окружить заботой и вниманием, а специалисты всегда становятся лучшими друзьями, проводниками в сфере моды и красоты</p>
                    <p class="bot-mrgn-ult"><strong>Доверяй свой образ только своим</strong></p>
                    <?php $this->load->view('_form', ['horizontal' => false, 'heading' => null, 'master' => false]); ?>
                </div>
                <div class="w-4-12 no-mrgn img k1-lazy-picture"
                     data-bg-src="<?php echo base_url(); ?>assets/imgs/popup_about-atmosphere.webp"
                ></div>
            </div>
        </div>
    </div>

<div class="cs-popup info-popup" trigger="about-lead">
    <div class="wrp">
        <div class="w-1 row jsfd">
            <div class="w-8-12 no-mrgn text">
                <h3 class="bot-mrgn-ult about__title">Запишись в салон красоты онлайн сейчас</h3>
                <p class="bot-mrgn-ult">Оставьте свои контактные данные, мы <b>быстро перезвоним</b> и уточним детали
                    записи</p>
                <?php $this->load->view('_form', ['horizontal' => false, 'heading' => null, 'master' => false]); ?>
            </div>
            <div class="w-4-12 no-mrgn img k1-lazy-picture"
                 data-bg-src="<?php echo base_url(); ?>assets/imgs/popup_about-atmosphere.webp"
            ></div>
        </div>
    </div>
</div>

<div class="cs-popup info-popup" trigger="adamas-lead" id="AdamasLead">
    <div class="wrp">
        <div class="w-1 row jsfd">
            <div class="w-8-12 no-mrgn text">
                <h3 class="bot-mrgn-ult about__title">Получить скидку 20% на все услуги</h3>
                <p class="bot-mrgn-ult">Эксклюзивное предложение действительно для клиентов партнера сети АДАМАС<br>
                    Скидка 20% предоставляется однократно и не суммируется с действующими. и спец предложениями</p>

                <form class="lead-form" autocomplete="off">
                    <div class="input-group">
                        <label>Ваше имя:</label>
                        <input type="text" name="name" placeholder="Например: Саша" minlength="3" maxlength="16"
                               required>
                    </div>
                    <div class="input-group">
                        <label>Ваш телефон:</label>
                        <input type="text" name="tel" placeholder="+7 (800) 555-35-35" minlength="6" required>
                    </div>
                    <?php echo isset($slug_salon) && $slug_salon !== 'default' ? '<input type="hidden" name="salon" value="' . $slug_salon . '">' : ''; ?>
                    <?php if ((empty($slug_salon) || $slug_salon == 'default') && !empty($salons)) : ?>
                        <div class="input-group">
                            <label>Выберите салон:</label>
                            <select class="salons-select" name="salon" required>
                                <option selected disabled value="">Выберите из списка</option>
                                <?php foreach ($salons as $salon) : ?>
                                    <option value="<?= $salon['slug'] ?>">Персона <?= $salon['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <?php echo isset($slug_service) && $slug_service ? '<input type="hidden" name="service" value="' . $slug_service . '">' : ''; ?>
                    <?php echo isset($slug_style) && $slug_style ? '<input type="hidden" name="style" value="' . $slug_style . '">' : ''; ?>
                    <?php echo isset($horizontal) && $horizontal ? '</div>' : ''; ?>
                    <input type="hidden" name="url" value="adamas">
                    <input type="hidden" name="adamas" value="true">
                    <input class="bot-mrgn-ult" type="submit" value="Записаться">
                    <p class="lead-form__policy">Нажимая кнопку "Записаться" я даю <a class="txt" popup-trigger="personaldata" style="border-bottom: 1px dotted">согласие на обработку и хранение персональных данных</a> и соглашаюсь с <a class="txt" popup-trigger="privacy" style="border-bottom: 1px dotted">политикой конфиденциальности</a>
                    </p>
                </form>


            </div>
            <div class="w-4-12 no-mrgn img k1-lazy-picture"
                 data-bg-src="<?php echo base_url(); ?>assets/imgs/popup_about-atmosphere.webp"
                 ></div>
        </div>
    </div>
</div>

<div class="cs-popup info-popup" trigger="sokolov-lead">
    <div class="wrp">
        <div class="w-1 row jsfd">
            <div class="w-8-12 no-mrgn text">
                <h3 class="bot-mrgn-ult about__title">Записаться в салон ПЕРСОНА на эксклюзивных условиях</h3>
                <p class="bot-mrgn-ult">Эксклюзивное предложение действительно для клиентов партнера сети SOKOLOV<br>
                    Скидка по промокоду предоставляется однократно и не суммируется с действующими акциями и спец
                    предложениями.<br>
                    Для посещения салона на эксклюзивных условиях необходима предварительная запись.</p>

                <form class="lead-form" autocomplete="off">
                    <div class="input-group">
                        <label>Ваше имя:</label>
                        <input type="text" name="name" placeholder="Например: Саша" minlength="3" maxlength="16"
                               required>
                    </div>
                    <div class="input-group">
                        <label>Ваш телефон:</label>
                        <input type="text" name="tel" placeholder="+7 (800) 555-35-35" minlength="6" required>
                    </div>
                    <?php echo isset($slug_salon) && $slug_salon !== 'default' ? '<input type="hidden" name="salon" value="' . $slug_salon . '">' : ''; ?>
                    <?php if ((empty($slug_salon) || $slug_salon == 'default') && !empty($salons)) : ?>
                        <div class="input-group">
                            <label>Выберите салон:</label>
                            <select class="salons-select" name="salon" required>
                                <option selected disabled value="">Выберите из списка</option>
                                <?php foreach ($salons as $salon) : ?>
                                    <option value="<?= $salon['slug'] ?>">Персона <?= $salon['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <?php echo isset($slug_service) && $slug_service ? '<input type="hidden" name="service" value="' . $slug_service . '">' : ''; ?>
                    <?php echo isset($slug_style) && $slug_style ? '<input type="hidden" name="style" value="' . $slug_style . '">' : ''; ?>
                    <?php echo isset($horizontal) && $horizontal ? '</div>' : ''; ?>
                    <input type="hidden" name="url" value="sokolov">
                    <input type="hidden" name="sokolov" value="true">
                    <!--input type="hidden" name="url" value="<= $_SERVER['REQUEST_URI'] ?>"-->
                    <input class="bot-mrgn-ult" type="submit" value="Записаться">
                    <p class="lead-form__policy">Нажимая кнопку "Записаться" я даю <a class="txt" popup-trigger="personaldata" style="border-bottom: 1px dotted">согласие на обработку и хранение персональных данных</a> и соглашаюсь с <a class="txt" popup-trigger="privacy" style="border-bottom: 1px dotted">политикой конфиденциальности</a>
                    </p>
                </form>


            </div>
            <div class="w-4-12 no-mrgn img k1-lazy-picture"
                 data-bg-src="<?php echo base_url(); ?>assets/imgs/popup_about-atmosphere.webp"
            ></div>
        </div>
    </div>
</div>

<div class="cs-popup info-popup" trigger="journal-lead">
    <div class="wrp">
        <div class="w-1 row jsfd">
            <div class="w-8-12 no-mrgn text">
                <h3 class="bot-mrgn-ult about__title">Записаться в салон ПЕРСОНА на эксклюзивных условиях</h3>
                <p class="bot-mrgn-ult">
                    Скидка предоставляется однократно и не суммируется с действующими акциями и спец
                    предложениями.<br>
                    Для посещения салона на эксклюзивных условиях необходима предварительная запись.</p>

                <form class="lead-form" autocomplete="off">
                    <div class="input-group">
                        <label>Ваше имя:</label>
                        <input type="text" name="name" placeholder="Например: Саша" minlength="3" maxlength="16"
                               required>
                    </div>
                    <div class="input-group">
                        <label>Ваш телефон:</label>
                        <input type="text" name="tel" placeholder="+7 (800) 555-35-35" minlength="6" required>
                    </div>
                    <?php echo isset($slug_salon) && $slug_salon !== 'default' ? '<input type="hidden" name="salon" value="' . $slug_salon . '">' : ''; ?>
                    <?php if ((empty($slug_salon) || $slug_salon == 'default') && !empty($salons)) : ?>
                        <div class="input-group">
                            <label>Выберите салон:</label>
                            <select class="salons-select" name="salon" required>
                                <option selected disabled value="">Выберите из списка</option>
                                <?php foreach ($salons as $salon) : ?>
                                    <option value="<?= $salon['slug'] ?>">Персона <?= $salon['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <?php echo isset($slug_service) && $slug_service ? '<input type="hidden" name="service" value="' . $slug_service . '">' : ''; ?>
                    <?php echo isset($slug_style) && $slug_style ? '<input type="hidden" name="style" value="' . $slug_style . '">' : ''; ?>
                    <?php echo isset($horizontal) && $horizontal ? '</div>' : ''; ?>
                    <input type="hidden" name="url" value="journal">
                    <input type="hidden" name="journal" value="true">
                    <!--input type="hidden" name="url" value="<= $_SERVER['REQUEST_URI'] ?>"-->
                    <input class="bot-mrgn-ult" type="submit" value="Записаться">
                    <p class="lead-form__policy">Нажимая кнопку "Записаться" я даю <a class="txt" popup-trigger="personaldata" style="border-bottom: 1px dotted">согласие на обработку и хранение персональных данных</a> и соглашаюсь с <a class="txt" popup-trigger="privacy" style="border-bottom: 1px dotted">политикой конфиденциальности</a>
                    </p>
                </form>


            </div>
            <div class="w-4-12 no-mrgn img k1-lazy-picture"
                 data-bg-src="<?php echo base_url(); ?>assets/imgs/popup_about-atmosphere.webp"
            ></div>
        </div>
    </div>
</div>

<?php if (!empty($active)) : ?>
    <a popup-trigger="about-lead" style="display: none!important;" class="d-none leed-form-popup" href=""></a>
<?php endif ?>
<?php if (!empty($adamas)) : ?>
    <a popup-trigger="adamas-lead" style="display: none!important;" class="d-none adamas-form-popup" href=""></a>
<?php endif ?>
<?php if (!empty($sokolov)) : ?>
    <a popup-trigger="sokolov-lead" style="display: none!important;" class="d-none sokolov-form-popup" href=""></a>
<?php endif ?>
<?php if (!empty($journal)) : ?>
    <a popup-trigger="journal-lead" style="display: none!important;" class="d-none journal-form-popup" href=""></a>
<?php endif ?>
<script>const isLeedWidgetActive = '<?= !empty($active) ?>';</script>
<script>const isAdamasWidgetActive = '<?= !empty($adamas) ?>';</script>
<script>const isSokolovWidgetActive = '<?= !empty($sokolov) ?>';</script>
<script>const isJournalWidgetActive = '<?= !empty($journal) ?>';</script>
