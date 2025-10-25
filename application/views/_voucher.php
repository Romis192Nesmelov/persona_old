
<?php if ($salon['slug'] == 'default' || $salon['online_store']) : ?>
<section class="voucher" id="Voucher">
    <div class="container">

        <h2 class="voucher__title">Электронные сертификаты на депозит со скидкой</h2>

        <div class="voucher-banner" style="position: relative; border-radius: 30px; overflow: hidden; background: #000;">
            <!-- Новый декоративный фон справа -->
            <img src="/assets/imgs/voucher-banner-bg.png"
                 alt="Beauty инструменты"
                 style="position: absolute; right: 0; top: 0; height: 100%; max-width: 54%; z-index: 1; object-fit: contain; pointer-events: none;" />

            <!-- Левая часть: текст и кнопки -->
            <div class="voucher-banner__left" style="position: relative; z-index: 2; padding: 60px 0 60px 60px;">
                <div class="voucher-banner__badge" style="font-size: 54px; color: #FFD100; font-weight: 700; margin-bottom: 24px;">
                    NEW!
                </div>
                <div class="voucher-banner__title" style="font-size: 52px; color: #fff; font-weight: 700; margin-bottom: 40px; line-height: 1.15;">
                    Покупайте BEAUTY Депозит<br>
                    с кэшбэком до <span style="color: #FFD100;">20.000₽</span>
                </div>
                <div class="voucher-banner__buttons" style="display: flex; gap: 40px;">
    <a href="#" class="voucher-btn-outline" popup-trigger="voucher-info"
       style="border: 6px solid #FFD100; border-radius: 28px; padding: 20px 52px; color: #fff; font-size: 32px; font-weight: 700; text-decoration: none; background: none; display: inline-block; transition: 0.2s;">
        Подробнее..
    </a>
    <a class="voucher-btn-fill voucher-salon-btn"
   href="<?= $salon['online_store'] ? $salon['online_store'] : '#' ?>"
   target="_blank" rel="nofollow"
   style="background: #FFD100; color: #000; font-size: 32px; font-weight: 700; border-radius: 28px; padding: 20px 52px; border: 6px solid #FFD100; text-decoration: none; display: inline-block; transition: 0.2s;">
    <span>Купить</span>
    <svg width="20px" height="20px" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; margin-left: 16px;">
        <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293h-704q-52 0-84.5-37.5t-32.5-90.5v-128q0-53 32.5-90.5t84.5-37.5h704l-293-294q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" fill="#fff"/>
    </svg>
</a>
</div>

        </div>
        
       
        <!--
        <div class="voucher__container"> ... </div>
        -->
    </div>
</section>


<div class="voucher-overlay"></div>
<div class="voucher-popup">
    <div class="voucher-popup__title">
        <span id="voucher-salon-selected">Выберите салон:</span>
        <a href="#" class="voucher-popup__change d-none">Изменить</a>
    </div>
    <div id="voucher-content" class="voucher-popup__container">
        <div class="voucher-popup__loading d-none">
            <span>Загрузка...</span>
            <img src="<?php echo base_url(); ?>assets/imgs/loading.svg" width="40" height="40" alt="Загрузка...">
        </div>
        <ul class="voucher-popup__salons">
            <?php foreach ($salons as $salon_store): ?>
            <?php if ($salon_store['online_store']) : ?>
            <li class="voucher-popup__salon">
                <a href="<?= $salon_store['online_store'] ?>" class="voucher-popup__link voucher-load <?= $salon_store['slug'] == $salon['slug'] ? 'voucher-current' : '' ?>" target="_blank" rel="nofollow">
                    Персона <?= $salon_store['name'] ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 772 529.93" class="metro" fill="<?= $salon_store['metro_color']; ?>">
                        <path d="M772,455.93v69H499.49V456.07H540l-39.8-113.84L386,529.82,271.83,342.24,232,456.23h40.64v68.62H177.44L0,524.93v-69c15.82.08,31.65,0,47.47.35,4.42.1,6.27-1.4,7.86-5.42q87.88-222.34,176-444.58c.69-1.73,1.52-3.4,2.61-5.82L386,266.6,538.14.33c1.06,2.46,1.74,4,2.35,5.48q63.23,159.63,126.44,319.27Q692,388.43,717.19,451.73c.71,1.77,2.84,4.22,4.34,4.24C738.35,456.2,755.18,456,772,455.93Z"></path>
                    </svg>
                </a>
            </li>
            <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <button class="voucher-popup__close-btn close" type="button"></button>
</div>
<div class="cs-popup info-popup" trigger="voucher-info">
  <div class="wrp">
    <div class="w-1 voucher-info__wrap">
      <div class="voucher-info">
        <!-- Левая колонка -->
        <div class="voucher-info__left">
          <h3 class="voucher-info__title">Подробные условия</h3>

          <div class="voucher-info__lead">
            Открытие beauty депозита.<br>
            Персональный счёт, с возможностью пополнения 24/7.<br>
            С неограниченным сроком действия.<br>
            Экономия до 20&nbsp;000 руб.
          </div>

          <hr class="voucher-info__divider">

          <div class="voucher-info__subtitle">
            Покупая указанный номинал, <br>вы получаете на счёт:
          </div>

          <!-- прозрачная картинка с бонусами -->
          <img class="voucher-info__bonuses"
               src="/assets/imgs/voucher-bonuses.png"
               alt="Номиналы и бонусы">
        </div>

        <!-- Правая колонка -->
        <div class="voucher-info__right">
          <div class="voucher-info__text">
            <p>
              Покупая электронные сертификаты на депозит вы получаете уникальный код сертификата на почту и в виде СМС на указанный номер телефона. Не сообщайте третьим лицам код сертификата! При посещении салона назовите этот код администратору и номинал сертификата будет зачислен на ваш депозитный счёт. Сертификат не ограничен по времени использования. Использование возможно в любое время, срок сгорания отсутствует. С депозитного счёта можно оплатить любые услуги и товары в салоне в полном объёме. Неиспользованный остаток номинала автоматически переносится на следующие визиты и не сгорает. При повторном посещении салона не требуется ещё раз называть код сертификата, вся неиспользованная сумма остаётся на депозите. Сертификаты будет привязан к выбранному салону, воспользоваться сертификатом в другом салоне невозможно. Если Вы оплатили сертификат, но передумали посещать салон, возможен полный возврат средств на ту платёжную систему, с которой была проведена оплата. Если Вам необходимо сделать возврат, или изменить салон, в котором Вы хотите воспользоваться сертификатом, пожалуйста свяжитесь с нами по номеру +7 (495) 128-71-21. Если после оплаты Вам не поступил код сертификата в СМС сообщении и на почту или Вы ошиблись при вводе данных, пожалуйста сразу свяжитесь с нами по указанному выше номеру телефона.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php endif; ?>
<script>const isVoucherWidgetActive = '<?= !empty($active) ?>';</script>
