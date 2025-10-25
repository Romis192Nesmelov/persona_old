<?php if (isset($salon) && empty($salon['in_region']) && isset($price)): ?>
    <section class="price base-section" id="Pricelist">
        <div class="container">
            <h2 class="title">
                Цены на <?= isset($service_name) ? mb_strtolower($service_name) : 'услуги' ?> в салоне красоты
                <b>«Персона» <?= $salon['slug'] !== 'default' ? $salon['name'] : '' ?></b>
            </h2>
            <div class="price__wrapper">
                <div class="price__item price__item--bold">Наименование услуги</div>
                <div class="price__item price__item--bold">Цена, от</div>
                <?php foreach ($price as $price_item): ?>
                    <div class="price__item"><?= $price_item['name'] ?></div>
                    <div class="price__item"><?= $price_item['cost'] ?> руб.</div>
                <?php endforeach; ?>
            </div>
            <button type="button" on="tap:price.open"  class="price__btn">Смотреть полный прайс-лист</button>
    </section>

    <amp-lightbox animate-in="fade-in" class="lightbox" id="price" layout="nodisplay">
        <div tabindex="-1" role="button" on="tap:price.close" class="lightbox__overlay"></div>
        <div class="lightbox__content">
            <div class="price__wrapper price__wrapper--modal">
                <div class="price__item price__item--bold">Наименование услуги</div>
                <div class="price__item price__item--bold">Цена, от</div>
                <?php foreach ($price as $price_item): ?>
                    <div class="price__item"><?= $price_item['name'] ?></div>
                    <div class="price__item"><?= $price_item['cost'] ?> руб.</div>
                <?php endforeach; ?>
            </div>
            <button aria-label="Закрыть модальное окно" class="lightbox__close" on="tap:price.close">
                <amp-img alt="" width="20" height="20" src="<?= base_url() ?>assets/icons/icon-close.svg"></amp-img>
            </button>
        </div>
    </amp-lightbox>
<?php endif; ?>
