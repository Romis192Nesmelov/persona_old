<?php function ampify_img($html)
{
    preg_match_all("#<img(.*?)\\/?>#", $html, $img_matches);

    foreach ($img_matches[1] as $key => $img_tag) {
        preg_match_all('/(alt|src|width|height)=["\'](.*?)["\']/i', $img_tag, $attribute_matches);
        $attributes = array_combine($attribute_matches[1], $attribute_matches[2]);

        if (!array_key_exists('width', $attributes) || !array_key_exists('height', $attributes)) {
            if (array_key_exists('src', $attributes)) {
                list($width, $height) = getimagesize(FCPATH .  $attributes['src']);
                $attributes['width'] = $width;
                $attributes['height'] = $height;
            }
        }

        $amp_tag = '<amp-img ';
        foreach ($attributes as $attribute => $val) {
            $amp_tag .= $attribute . '="' . $val . '" ';
        }

        $amp_tag .= 'layout="responsive"';
        $amp_tag .= '>';
        $amp_tag .= '</amp-img>';

        $html = str_replace($img_matches[0][$key], $amp_tag, $html);
    }

    return $html;
}

?>
<?php if ($article) : ?>
    <section id="#Article" class="article">
        <div class="container">
            <h1 class="article__title"><?= $article['h1'] ?></h1>
            <div class="article__date">
                <time datetime="<?= date('Y-m-d', strtotime($article['date'])) ?>"><?= date('d.m.Y г.', strtotime($article['date'])) ?></time>
            </div>
            <div class="article__content">
                <?= ampify_img($article['text']) ?>
                <?php if (!empty($article['master_name'])) : ?>
                    <div class="article__master">
                        <div class="article__master-name"><?= $article['master_name'] ?></div>
                        <div class="article__master-position">
                            <?= $article['master_position'] ?>
                            <a target="_blank" href="/<?= $salon['slug'] ?>"><?= $salon['name'] ?></a>
                        </div>
                        <div class="article__master-info">
                            <amp-img layout="responsive" width="240" height="240"
                                     src="/media/articles/<?= $article['id'] ?>/master.jpg"
                                     alt=""></amp-img>
                            <div class="article__master-description">
                                <?= $article['master_description'] ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
    </section>
<?php endif; ?>



