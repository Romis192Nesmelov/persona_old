<section class="field" id="Field">
  <div class="container">
    <h2 class="field__title">Услуга выезда мастера</h2>
    <div class="field__container">
      <div class="field__promo">
        <div class="field__img field__img--car"></div>
        <div class="field__img field__img--new"></div>
      </div>
      <button type="button" class="field__btn" popup-trigger="field-lead">Пригласите специалиста</button>
      <div class="field__promo-text">в удобное для вас время и место</div>
      <ul class="field__price">
        <li class="field__price-item">
          <span>Стрижка</span>
          <span>от 3500 р.</span>
        </li>
        <li class="field__price-item">
          <span>Укладка</span>
          <span>от 2900 р.</span>
        </li>
        <li class="field__price-item">
          <span>Коктейльная укладка</span>
          <span>от 3800 р.</span>
        </li>
        <li class="field__price-item">
          <span>Маникюр + покрытие лак в ПОДАРОК</span>
          <span>от 2700 р.</span>
        </li>
        <li class="field__price-item">
          <span>Маникюр с покрытием гель-лак</span>
          <span>от 3500 р.</span>
        </li>
        <li class="field__price-item">
          <span>Педикюр + покрытие лак в ПОДАРОК</span>
          <span>от 2700 р.</span>
        </li>
        <li class="field__price-item">
          <span>Педикюр с покрытием гель-лак</span>
          <span>от 3900 р.</span>
        </li>
        <li class="field__price-item">
          <span>Макияж вечерний</span>
          <span>от 4500 р.</span>
        </li>
        <li class="field__price-item">
          <span>Макияж дневной</span>
          <span>от 3100 р.</span>
        </li>
      </ul>
      <button type="button" class="field__cta-btn" popup-trigger="field-lead">Хотите больше услуг? Записывайтесь и мы предложим!</button>
      <div class="field__promo-big">Безопасность. Качество. Сервис</div>
    </div>
  </div>
</section>
<div class="field-popup">
  <div class="field-popup__promo">
    <div class="field-popup__img field-popup__img--car"></div>
    <div class="field-popup__img field-popup__img--new"></div>
  </div>
  <div class="field-popup__text">Теперь Вы можете</div>
  <button type="button" class="field-popup__btn" popup-trigger="field-lead">Пригласить специалиста</button>
  <div class="field-popup__text field-popup__text--big">в удобное для Вас время и место</div>
  <div class="field-popup__text field-popup__text--upper">Безопасность. Качество. Сервис.</div>
  <button class="field-popup__close-btn close" type="button"></button>
</div>
<div class="field-popup__overlay"></div>

<div class="cs-popup info-popup" trigger="field-lead">
  <div class="wrp">
    <div class="w-1 row jsfd">
      <div class="w-8-12 no-mrgn text">
        <h3 class="bot-mrgn-ult about__title">Пригласите мастера в удобное время и место</h3>
        <p class="bot-mrgn-ult">
          Выберите желаемое время и услугу и наши специалисты уточнят все детали и направят к Вам наиболее подходящего мастера в ближайшее время
        </p>
          <?php $this->load->view('_form-field', array('horizontal' => false, 'heading' => null)); ?>
      </div>
      <div class="w-4-12 no-mrgn img"
           style="background-image: url(<?php echo base_url(); ?>assets/imgs/popup_about-atmosphere.jpg);"></div>
    </div>
  </div>
</div>
