<?php if ($article) : ?>
    <section id="#Article" class="article">
        <div class="container">
            <h1 class="article__title"><?= $article['h1'] ?></h1>
            <div class="article__date">
                <time datetime="<?= date('Y-m-d', strtotime($article['date'])) ?>"><?= date('d.m.Y г.', strtotime($article['date'])) ?></time>
            </div>
            <div class="article__content">
                <?= $article['text'] ?>
            </div>
        </div>
    </section>
<?php endif; ?>
