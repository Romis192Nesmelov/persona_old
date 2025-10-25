<?php if (empty($salon['in_region']) && isset($price)): ?>
    <section class="main-price" id="Pricelist">
        <div class="container">
            <h2 class="main-price-title">
                Цены на <?= isset($service_name) ? mb_strtolower($service_name) : 'услуги' ?> в салоне красоты
                    <b>«Персона» <?= $salon['slug'] !== 'default' ? $salon['name'] : '' ?></b>
            </h2>
            <div class="main-price-container">
                <div class="main-price-item description">Наименование услуги</div>
                <div class="main-price-item description">Цена, от</div>
                <?php foreach ($price as $price_item): ?>
                    <div class="main-price-item"><?= $price_item['name'] ?></div>
                    <div class="main-price-item"><?= $price_item['cost'] ?> руб.</div>
                <?php endforeach; ?>
            </div>
            <button class="full-price-btn">Смотреть полный прайс-лист</button>
    </section>

    <div class="full-price-container d-none">
        <div class="full-price">
            <div class="full-price-item description">Наименование услуги</div>
            <div class="full-price-item description">Цена, от</div>
            <?php foreach ($full_price as $service => $full_price_block) : ?>
                <div class="full-price-item full-price-category"><?= $service ?></div>
                <div class="full-price-item full-price-category"></div>
                <?php foreach ($full_price_block as $price_item): ?>
                    <div class="full-price-item"><?= $price_item['name'] ?></div>
                    <div class="full-price-item"><?= $price_item['cost'] ?> руб.</div>
                <?php endforeach; ?>
            <?php endforeach ?>
        </div>
        <button class="full-price-close close"></button>
    </div>
    <div class="overlay d-none"></div>
<?php endif; ?>
