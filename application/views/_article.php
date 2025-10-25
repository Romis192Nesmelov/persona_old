<?php if ($article) : ?>
    <section id="#Article" class="article">
        <div class="container">
            <h1 class="article__title"><?= $article['h1'] ?></h1>
            <div class="article__date">
                <time datetime="<?= date('Y-m-d', strtotime($article['date'])) ?>"><?= date('d.m.Y г.', strtotime($article['date'])) ?></time>
            </div>
            <div class="article__content">
                <?= $article['text'] ?>
                <?php if (!empty($article['master_name'])) : ?>
                    <div class="article__master">
                        <div class="article__master-name"><?= $article['master_name'] ?></div>
                        <div class="article__master-position">
                            <?= $article['master_position'] ?>
                            <a href="/<?= $salon['slug'] ?>"><?= $salon['name'] ?></a>
                        </div>
                        <div class="article__master-info">
                            <picture>
                                <source type="image/webp" srcset="/media/articles/<?= $article['id'] ?>/master.webp">
                                <img src="/media/articles/<?= $article['id'] ?>/master.jpg"
                                     alt="<?= $article['master_name'] ?>">
                            </picture>
                            <div class="article__master-description">
                                <?= $article['master_description'] ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-3-12">
                <a class="btn" popup-trigger="about-lead">Записаться</a>
            </div>
        </div>
    </section>
    <?php if (!empty($similar_articles)) : ?>
        <section class="blog">
            <div class="container">
                <h2 class="blog__similar-title">Похожие статьи:</h2>
            </div>
            <div class="container">
                <div class="swiper js-slider-articles">
                    <div class="swiper-wrapper">
                        <?php foreach ($similar_articles as $similar_article) : ?>
                            <div class="blog__similar swiper-slide">
                                <a class="blog__link" href="/blog/<?= $similar_article['slug'] ?>">
                                    <div class="blog__img">
                                        <picture>
                                            <source type="image/webp" srcset="/media/articles/<?= $similar_article['id'] ?>/poster.webp">
                                            <img src="/media/articles/<?= $similar_article['id'] ?>/poster.jpg" alt="<?= $similar_article['h1'] ?>">
                                        </picture>
                                    </div>
                                    <div class="blog__article-name">
                                <span>
                                    <?= $similar_article['h1'] ?>
                                </span>
                                    </div>
                                    <div class="blog__date">
                                        <time datetime="<?= date('Y-m-d', strtotime($similar_article['date'])) ?>"><?= date('d.m.Y г.', strtotime($similar_article['date'])) ?></time>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button class="articles__gallery-next gallery-next" type="button"></button>
                <button class="articles__gallery-prev gallery-prev" type="button"></button>
            </div>
        </section>
    <?php endif; ?>
    <div class="cs-popup info-popup" trigger="about-lead">
        <div class="wrp">
            <div class="w-1 row jsfd">
                <div class="w-8-12 no-mrgn text">
                    <h3 class="bot-mrgn-ult about__title">Запишись в салон красоты онлайн сейчас</h3>
                    <p class="bot-mrgn-ult">Оставьте свои контактные данные, мы <b>быстро перезвоним</b> и уточним
                        детали записи</p>
                    <?php $this->load->view('_form', array('horizontal' => false, 'heading' => null, 'master' => false)); ?>
                </div>
                <div class="w-4-12 no-mrgn img"
                     style="background-image: url(<?php echo base_url(); ?>assets/imgs/popup_about-atmosphere.jpg);"></div>
            </div>
        </div>
    </div>
<?php endif; ?>



