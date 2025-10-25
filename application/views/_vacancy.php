<?php if ($vacancy) : ?>
    <section id="Vacancy">
        <div class="container">
            <div class="vacancy" style="background-image: url(<?= base_url(); ?>media/vacancies/<?= $vacancy['id'] ?>/cover.jpg);">
                <h1 class="vacancy__title"><?= $vacancy['h1'] ?></h1>
            </div>
            <ul class="vacancy__features-list">
                <?php if ($vacancy['offer']): ?>
                    <li class="vacancy__feature vacancy__feature--offer">
                        <div class="vacancy__feature-content">
                            <span class="vacancy__feature-title">Мы предлагаем:</span>
                            <?= ($vacancy['offer']) ?>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if ($vacancy['requirements']): ?>
                    <li class="vacancy__feature vacancy__feature--requirements">
                        <div class="vacancy__feature-content">
                            <span class="vacancy__feature-title">Ждем от Вас:</span>
                            <?= ($vacancy['requirements']) ?>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if ($vacancy['responsibilities']): ?>
                    <li class="vacancy__feature vacancy__feature--responsibilities">
                        <div class="vacancy__feature-content">
                            <span class="vacancy__feature-title">Обязанности:</span>
                            <?= ($vacancy['responsibilities']) ?>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="vacancies__text"><?= $settings['subtitle'] ?></div>
            <a class="vacancies__tel" href="tel:<?= $settings['tel'] ?>"><?= $settings['tel'] ?></a>
            <button style="margin-top: 20px" popup-trigger="vacancy-lead" class="vacancy__lead-btn" type="button">Откликнуться</button>
        </div>
    </section>
<?php endif; ?>
<div class="cs-popup info-popup" trigger="vacancy-lead">
    <div class="wrp">
        <div class="w-1 row jsfd">
            <div class="w-8-12 no-mrgn text">
                <h3 class="bot-mrgn-ult about__title">Откликнуться на вакансию</h3>
                <p class="bot-mrgn-ult">Оставьте свои контактные данные, мы <b>быстро перезвоним</b> и уточним все
                    детали</p>
                <?php $this->load->view('_vacancy-form', array('horizontal' => false, 'heading' => null, 'vacancy' => $vacancy['slug'])); ?>
            </div>
            <div class="w-4-12 no-mrgn img"
                 style="background-image: url(<?php echo base_url(); ?>assets/imgs/popup_about-atmosphere.jpg);"></div>
        </div>
    </div>
</div>