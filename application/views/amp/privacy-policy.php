<?php if (isset($title) && isset($text) && isset($id)) : ?>
<amp-lightbox animate-in="fade-in" class="lightbox" id="<?= $id ?>" layout="nodisplay">
    <div tabindex="-1" role="button" on="tap:<?= $id ?>.close" class="lightbox__overlay"></div>
    <div class="lightbox__content">
        <div class="privacy">
            <p class="privacy__title"><?= $title ?></p>
            <p class="privacy__text"><?= $text ?></p>
        </div>
        <button aria-label="Закрыть модальное окно" class="lightbox__close" on="tap:<?= $id ?>.close">
            <amp-img alt="" width="20" height="20" src="<?= base_url() ?>assets/icons/icon-close.svg"></amp-img>
        </button>
    </div>
</amp-lightbox>
<?php endif; ?>
