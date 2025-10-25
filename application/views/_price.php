<?php if (isset($categories) && isset($services) && isset($styles) && isset($prices) && isset($style_categories)) : ?>
    <section class="price" id="Price">
        <div class="container">
            <h2 class="main-price-title">
                Цены на услуги в салоне красоты <b>«Персона» </b>
            </h2>
            <ul class="price__categories-list">
                <?php foreach ($categories as $category) : ?>
                    <li style="background-image: url(<?= base_url(); ?>media/price/categories/<?= $category['id'] ?>/bg_small.jpg);"
                        class="price__category-item">
                        <button type="button" data-id="<?= $category['id'] ?>" class="price__category-btn">
                            <?= $category['name'] ?>
                        </button>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div id="PriceCategory">
                <!-- expanded category here -->
            </div>
            <ul class="price__services-list" id="PriceServices">
                <!-- services list here -->
            </ul>

            <div id="PriceService">
                <!-- expanded service here -->
            </div>

            <div id="PriceStyles">

            </div>
        </div>
    </section>
    <template id="PriceCategoriesTemplate">
        <?php foreach ($categories as $category): ?>
            <div data-categoryId="<?= $category['id'] ?>" class="price__category"
                 style="background-image: url(<?= base_url(); ?>media/price/categories/<?= $category['id'] ?>/bg_big.jpg);">
                <?php if (!empty($category['information'])): ?>
                    <button class="price__info-btn price__info-btn--category" type="button">
                        <span class="price__info-text"><?= $category['information'] ?></span>
                    </button>
                <?php endif; ?>

                <span class="price__category-title"><?= $category['name'] ?></span>
                <?php if (!empty($category['offer_type']) && !empty($category['offer_text'])): ?>
                    <span class="price__category-offer-type"><?= $category['offer_type'] ?></span>
                    <span class="price__category-offer-text"><?= $category['offer_text'] ?></span>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </template>
    <template id="PriceServiceListTemplate">
        <?php foreach ($services as $service): ?>
            <li class="price__service-item" data-categoryId="<?= $service['price_category_id'] ?>">
                <button type="button" data-id="<?= $service['id'] ?>" class="price__service-btn"
                        style="background-image: url(<?= base_url(); ?>media/price/services/<?= $service['id'] ?>/bg.jpg);">
                    <?= $service['name'] ?>
                </button>
            </li>
        <?php endforeach; ?>
    </template>
    <template id="PriceServicesTemplate">
        <?php foreach ($services as $service): ?>
            <div data-serviceId="<?= $service['id'] ?>" class="price__service"><?= $service['name'] ?></div>
        <?php endforeach; ?>
    </template>
    <template id="PriceStyleListTemplate">
        <?php foreach ($services as $service): ?>
            <div data-serviceId="<?= $service['id'] ?>">
                <?php foreach ($style_categories as $style_category): ?>
                    <?php if ($style_category['price_service_id'] === $service['id']): ?>
                        <div class="price__style-category">
                            <p class="price__style-category-name"><?= $style_category['name'] ?></p>
                            <p class="price__style-category-desc"><?= $style_category['description'] ?></p>
                        </div>
                        <ul class="price__styles-list">
                            <?php foreach ($styles as $style): ?>
                                <?php if ($style['price_style_category_id'] === $style_category['id'] && $style['price_service_id'] === $service['id']) : ?>
                                    <li class="price__styles-item">
                                        <div class="price__styles-title"><?= $style['name'] ?></div>
                                        <p class="price__styles-desc"><?= $style['description'] ?></p>
                                        <div class="price__styles-container">
                                            <?php if (!empty($style['information'])): ?>
                                                <button class="price__info-btn">
                                                    <span class="price__info-text"><?= $style['information'] ?></span>
                                                </button>
                                            <?php endif; ?>
                                            <?php if (!empty($style['duration'])): ?>
                                                <span class="price__duration"><?= $style['duration'] ?> минут</span>
                                            <?php endif; ?>
                                            <?php if (!empty($style['special_information'])): ?>
                                                <div class="price__special-info">
                                                    <?php if (!empty($style['special_information_price_icon_id'])): ?>
                                                        <span class="price__special-info__icon"
                                                              style="background-image: url(<?= base_url(); ?>media/price/icons/<?= $style['special_information_price_icon_id'] ?>/icon.svg);"></span>
                                                    <?php endif; ?>
                                                    <?= $style['special_information'] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="swiper js-slider-prices price__prices-slider">
                                            <div class="swiper-wrapper">
                                                <?php $count_prices = 0 ?>
                                                <?php foreach ($prices as $price): ?>
                                                    <?php if ($price['price_style_id'] == $style['id']): ?>
                                                        <?php $count_prices++ ?>
                                                        <div class="swiper-slide price__master-slide">
                                                            <div class="price__master-info">
                                                                <div class="price__master-name"><?= $price['master_name'] ?></div>
                                                                <?php if (!empty($price['master_description'])): ?>
                                                                    <div class="price__master-desc"><?= $price['master_description'] ?></div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="price__cost"><?= $price['price'] ?> ₽</div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                            <button class="price__btn-next gallery-next <?= $count_prices <= 1 ? 'd-none' : '' ?>" type="button"></button>
                                            <button class="price__btn-prev gallery-prev <?= $count_prices <= 1 ? 'd-none' : '' ?>" type="button"></button>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif ?>
                <?php endforeach; ?>
                <div class="price__style-category">
                    <p class="price__style-category-name">* * *</p>
                </div>
                <ul class="price__styles-list">
                    <?php foreach ($styles as $style): ?>
                        <?php if ($style['price_service_id'] === $service['id'] && empty($style['price_style_category_id'])) : ?>
                            <li class="price__styles-item">
                                <div class="price__styles-title"><?= $style['name'] ?></div>
                                <p class="price__styles-desc"><?= $style['description'] ?></p>
                                <div class="price__styles-container">
                                    <?php if (!empty($style['information'])): ?>
                                        <button class="price__info-btn">
                                            <span class="price__info-text"><?= $style['information'] ?></span>
                                        </button>
                                    <?php endif; ?>
                                    <?php if (!empty($style['duration'])): ?>
                                        <span class="price__duration"><?= $style['duration'] ?> минут</span>
                                    <?php endif; ?>
                                    <?php if (!empty($style['special_information'])): ?>
                                        <div class="price__special-info">
                                            <?php if (!empty($style['special_information_price_icon_id'])): ?>
                                                <span class="price__special-info__icon"
                                                      style="background-image: url(<?= base_url(); ?>media/price/icons/<?= $style['special_information_price_icon_id'] ?>/icon.svg);"></span>
                                            <?php endif; ?>
                                            <?= $style['special_information'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="swiper js-slider-prices price__prices-slider">
                                    <div class="swiper-wrapper">
                                        <?php $count_prices = 0 ?>
                                        <?php foreach ($prices as $price): ?>
                                            <?php if ($price['price_style_id'] == $style['id']): ?>
                                                <?php $count_prices++ ?>
                                                <div class="swiper-slide price__master-slide">
                                                    <div class="price__master-info">
                                                        <div class="price__master-name"><?= $price['master_name'] ?></div>
                                                        <?php if (!empty($price['master_description'])): ?>
                                                            <div class="price__master-desc"><?= $price['master_description'] ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="price__cost"><?= $price['price'] ?> ₽</div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <button class="price__btn-next gallery-next <?= $count_prices <= 1 ? 'd-none' : '' ?>" type="button"></button>
                                    <button class="price__btn-prev gallery-prev <?= $count_prices <= 1 ? 'd-none' : '' ?>" type="button"></button>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </template>

    <script>
      (function () {
        //containers
        const priceCategoryContainer = document.querySelector('#PriceCategory');
        const priceServiceListContainer = document.querySelector('#PriceServices');
        const priceServiceContainer = document.querySelector('#PriceService');
        const priceStylesContainer = document.querySelector('#PriceStyles');
        //templates
        const priceCategoriesTemplate = document.querySelector('#PriceCategoriesTemplate');
        const priceServiceListTemplate = document.querySelector('#PriceServiceListTemplate');
        const priceServicesTemplate = document.querySelector('#PriceServicesTemplate');
        const priceStyleListTemplate = document.querySelector('#PriceStyleListTemplate');
        const expandService = (evt) => {
          priceServiceContainer.innerHTML = '';
          const serviceNode = priceServicesTemplate.content.querySelector(`[data-serviceId="${evt.target.dataset.id}"]`);
          if (serviceNode) {
            priceServiceContainer.append(serviceNode.cloneNode(true));
          }
          window.scrollTo({top: priceServiceContainer.offsetTop - 40, behavior: 'smooth'});
        };
        const showStyles = (evt) => {
          priceStylesContainer.innerHTML = '';
          const styleNodes = Array.from(priceStyleListTemplate.content.querySelectorAll(`[data-serviceId="${evt.target.dataset.id}"]`));
          priceStylesContainer.append(...styleNodes.map((node) => node.cloneNode(true)));
          window.dispatchEvent(new CustomEvent('priceSliderInit'));
        };
        const handleServicesClick = () => {
          document.querySelectorAll('.price__service-btn').forEach((btn) => {
            btn.addEventListener('click', expandService);
            btn.addEventListener('click', showStyles);
          });
        };
        const expandCategory = (evt) => {
          priceCategoryContainer.innerHTML = '';
          const categoryNode = priceCategoriesTemplate.content.querySelector(`[data-categoryId="${evt.target.dataset.id}"]`);
          if (categoryNode) {
            priceCategoryContainer.append(categoryNode.cloneNode(true));
          }
          window.scrollTo({top: priceCategoryContainer.offsetTop - 40, behavior: 'smooth'});
        };
        const showServices = (evt) => {
          priceServiceListContainer.innerHTML = '';
          const serviceNodes = Array.from(priceServiceListTemplate.content.querySelectorAll(`[data-categoryId="${evt.target.dataset.id}"]`));
          priceServiceListContainer.append(...serviceNodes.map((node) => node.cloneNode(true)));
          handleServicesClick();
        };
        document.querySelectorAll('.price__category-btn').forEach((btn) => {
          btn.addEventListener('click', expandCategory);
          btn.addEventListener('click', showServices);
          btn.addEventListener('click', () => {
            priceStylesContainer.innerHTML = '';
            priceServiceContainer.innerHTML = '';
          });
        });
      })();
    </script>
<?php endif; ?>

