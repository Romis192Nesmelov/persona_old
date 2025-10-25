<?php if ($blog) : ?>
    <section id="Blog" class="blog">
        <div class="container">
            <h1 class="blog__title">Советы красоты от специалистов салонов «Персона»</h1>
            <ul class="blog__articles blog-carousel">
                <?php foreach ($blog as $article) : ?>
                    <li class="blog__article">
                        <a target="_blank" class="blog__link" href="/blog/<?= $article['slug'] ?>">
                            <div class="blog__img">
                                <amp-img layout="responsive"
                                         width="328"
                                         height="364"
                                         src="/media/articles/<?= $article['id'] ?>/poster.webp"
                                         alt="<?= $article['h1'] ?>">
                                    <amp-img fallback
                                             layout="responsive"
                                             width="328"
                                             height="364"
                                             src="/media/articles/<?= $article['id'] ?>/poster.jpg"
                                             alt="<?= $article['h1'] ?>">
                                    </amp-img>
                                </amp-img>
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
                    <a <?= $paginator['current'] != 1 ? 'href="/blog" target="_blank"' : '' ?>class="blog__pagination-link">1</a>
                </li>
                <?php if ($paginator['current'] - 1 > 2) : ?>
                <li class="blog__pagination-item">..</li>
                <?php endif; ?>
                <?php if ($paginator['current'] - 1 > 1) : ?>
                    <li class="blog__pagination-item">
                        <a target="_blank" href="/blog?page=<?= $paginator['current'] - 1 ?>" class="blog__pagination-link"><?= $paginator['current'] - 1 ?></a>
                    </li>
                <?php endif; ?>
                <?php if ($paginator['current'] != 1) : ?>
                    <li class="blog__pagination-item">
                        <a class="blog__pagination-link"><?= $paginator['current']?></a>
                    </li>
                <?php endif; ?>
                <?php if ($paginator['current'] + 1 < $paginator['pages']) : ?>
                    <li class="blog__pagination-item">
                        <a target="_blank" href="/blog?page=<?= $paginator['current'] + 1 ?>" class="blog__pagination-link"><?= $paginator['current'] + 1 ?></a>
                    </li>
                <?php endif; ?>
                <?php if ($paginator['current'] + 2 < $paginator['pages']) : ?>
                    <li class="blog__pagination-item">..</li>
                <?php endif; ?>
                <?php if ($paginator['current'] != $paginator['pages']) : ?>
                <li class="blog__pagination-item">
                    <a <?= $paginator['current'] != $paginator['pages'] ? 'target="_blank" href="/blog?page=' . $paginator['pages'] . '"' : '' ?> class="blog__pagination-link">
                        <?= $paginator['pages'] ?>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
