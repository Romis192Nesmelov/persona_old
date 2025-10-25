<?php if ($blog) : ?>
    <section id="Blog" class="blog">
        <div class="container">
            <h1 class="blog__title">Советы красоты от специалистов салонов «Персона»</h1>
            <ul class="blog__articles blog-carousel">
                <?php foreach ($blog as $article) : ?>
                    <li class="blog__article">
                        <a class="blog__link" href="/blog/<?= $article['slug'] ?>">
                            <div class="blog__img">
                                <picture>
                                    <source type="image/webp" srcset="/media/articles/<?= $article['id'] ?>/poster.webp">
                                    <img src="/media/articles/<?= $article['id'] ?>/poster.jpg" alt="<?= $article['h1'] ?>">
                                </picture>
                            </div>
                            <div class="blog__article-name">
                                <span>
                                    <?= $article['h1'] ?>
                                </span>
                            </div>
                            <div class="blog__date">
                                <time datetime="<?= date('Y-m-d', strtotime($article['date'])) ?>"><?= date('d.m.Y г.', strtotime($article['date'])) ?></time>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php if ($paginator && $paginator['pages'] > 1) : ?>
            <ul class="blog__pagination">
                <li class="blog__pagination-item">
                    <a <?= $paginator['current'] != 1 ? 'href="/blog"' : '' ?>class="blog__pagination-link">1</a>
                </li>
                <?php if ($paginator['current'] - 1 > 2) : ?>
                <li class="blog__pagination-item">..</li>
                <?php endif; ?>
                <?php if ($paginator['current'] - 1 > 1) : ?>
                    <li class="blog__pagination-item">
                        <a href="/blog?page=<?= $paginator['current'] - 1 ?>" class="blog__pagination-link"><?= $paginator['current'] - 1 ?></a>
                    </li>
                <?php endif; ?>
                <?php if ($paginator['current'] != 1) : ?>
                    <li class="blog__pagination-item">
                        <a class="blog__pagination-link"><?= $paginator['current']?></a>
                    </li>
                <?php endif; ?>
                <?php if ($paginator['current'] + 1 < $paginator['pages']) : ?>
                    <li class="blog__pagination-item">
                        <a href="/blog?page=<?= $paginator['current'] + 1 ?>" class="blog__pagination-link"><?= $paginator['current'] + 1 ?></a>
                    </li>
                <?php endif; ?>
                <?php if ($paginator['current'] + 2 < $paginator['pages']) : ?>
                    <li class="blog__pagination-item">..</li>
                <?php endif; ?>
                <?php if ($paginator['current'] != $paginator['pages']) : ?>
                <li class="blog__pagination-item">
                    <a <?= $paginator['current'] != $paginator['pages'] ? 'href="/blog?page=' . $paginator['pages'] . '"' : '' ?> class="blog__pagination-link">
                        <?= $paginator['pages'] ?>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
            <?php endif; ?>
        </div>
    </section>

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
