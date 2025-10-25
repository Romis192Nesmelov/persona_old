<section id="Vacancies">
    <div class="container">
        <h1 class="vacancies__title"><?= $settings['h1'] ?></h1>
        <div class="vacancies__text"><?= $settings['subtitle'] ?></div>
        <a class="vacancies__tel" href="tel:<?= $settings['tel'] ?>"><?= $settings['tel'] ?></a>

        <?php if (!empty($vacancies)) : ?>
            <div class="vacancies__list-container">
                <ul class="vacancies__list">
                    <?php foreach ($vacancies as $vacancy) : ?>
                        <li class="vacancies__item">
                            <img src="<?= base_url(); ?>media/vacancies/<?= $vacancy['id'] ?>/poster.jpg"
                                 alt="<?= $vacancy['h1'] ?>">
                            <div class="vacancies__item-container">
                                <div class="vacancies__item-title"><?= $vacancy['h1'] ?></div>
                                <?php if (!empty($vacancy['short_text'])) : ?>
                                    <div class="vacancies__content">
                                        <?= $vacancy['short_text'] ?>
                                    </div>
                                <?php endif; ?>
                                <a class="vacancies__item-link"
                                   href="<?= base_url(); ?>vacancies/<?= $vacancy['slug'] ?>">Читать подробнее</a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif ?>
    </div>
</section>

<div class="vacancies__divider"></div>

<section id="VacanciesFeatures">
    <div class="container">
        <h2 class="vacancies__subtitle"><?= $settings['features_title'] ?></h2>
        <ul class="vacancies__features-list">
            <li class="vacancies__feature vacancies__feature--growth">
                <div class="vacancies__feature-title">
                    Профессиональный рост
                </div>
                <p class="vacancies__feature-text">
                    Вы можете вырасти от мастера до арт директора или преподавателя.
                </p>
            </li>
            <li class="vacancies__feature vacancies__feature--locations">
                <div class="vacancies__feature-title">
                    Топовые локации салонов
                </div>
                <p class="vacancies__feature-text">
                    Крупнейшие торговые центры и бизнес центры класса «А»
                </p>
            </li>
            <li class="vacancies__feature vacancies__feature--education">
                <div class="vacancies__feature-title">
                    Обучение за счет компании
                </div>
                <p class="vacancies__feature-text">
                    Наши специалисты имеют возможность обучения на льготных условиях у
                    ведущих специалистов российских и западных школ.
                </p>
            </li>
            <li class="vacancies__feature vacancies__feature--development">
                <div class="vacancies__feature-title">
                    Творческое развитие
                </div>
                <p class="vacancies__feature-text">
                    Проведение открытых творческих конкурсов парикмахерского искусства внутри
                    сити по международным стандартам для развития навыков и подготовки к участию в премиях.
                </p>
            </li>
        </ul>
    </div>
</section>

<?php if (!empty($articles)) : ?>
    <section id="VacanciesArticles">
        <ul class="vacancies__articles-list">
            <?php foreach ($articles as $article) : ?>
                <li class="vacancies__article">
                    <div class="vacancies__article-img">
                        <img src="<?= base_url() ?>media/vacancies_articles/<?= $article['id'] ?>/poster.jpg"
                             alt="<?= $article['title'] ?>">
                    </div>
                    <a href="<?= base_url(); ?>vacancies/blog/<?= $article['slug'] ?>"
                       class="vacancies__article-title"><?= $article['h1'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php endif; ?>

<section id="VacanciesPartners">
    <div class="container">
        <h2 class="vacancies__subtitle"><?= $settings['partners_title'] ?></h2>
        <img style="display: block" src="<?= base_url() ?>assets/imgs/partners.png" alt="Наши партнеры">
    </div>
</section>
