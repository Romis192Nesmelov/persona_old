<div class="cs-popup info-popup promo-popup" trigger="promo-lead">
    <div class="wrp">
        <div class="w-1 row jsfd">
            <div class="w-8-12 no-mrgn text promo-popup__content">
                <div class="promo__title promo__title--big promo__title--upper">получи</div>
                <div class="promo__title promo__title--big promo__title--upper">скидку</div>
                <div class="promo__title promo__title--discount">-20%</div>
                <div class="promo__title">на первый</div>
                <div class="promo__title">визит</div>
                <div class="promo__title promo__title--big" style="display:none;">сейчас</div>
                <div class="promo-popup__timer timer" style="display: none">
                  <span class="timer-section minute-1">0</span>
                  <span class="timer-section minute-2">0</span>
                  <span class="timer-separator">:</span>
                  <span class="timer-section second-1">0</span>
                  <span class="timer-section second-2">0</span>
                </div>
              <form class="lead-form promo-lead-form" autocomplete="off">
                <div class="input-group">
                  <label>Ваше имя:</label>
                  <input type="text" name="name" placeholder="Например: Саша" minlength="3" maxlength="16" required>
                </div>
                <div class="input-group">
                  <label>Ваш телефон:</label>
                  <input type="text" name="tel" placeholder="+7 (800) 555-35-35" minlength="6" required>
                </div>
                  <?php echo isset($slug_salon) && $slug_salon !== 'default' ? '<input type="hidden" name="salon" value="' . $slug_salon . '">' : ''; ?>
                  <?php if ((empty($slug_salon) || $slug_salon == 'default') && !empty($salons)) : ?>
                    <div class="input-group">
                      <label>Выберите салон:</label>
                      <select class="salons-select" name="salon" required>
                        <option selected disabled value="">Выберите из списка</option>
                          <?php foreach ($salons as $salon) : ?>
                            <option value="<?= $salon['slug'] ?>">Персона <?= $salon['name'] ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                  <?php endif; ?>
                  <?php echo isset($slug_service) && $slug_service ? '<input type="hidden" name="service" value="' . $slug_service . '">' : ''; ?>
                  <?php echo isset($slug_style) && $slug_style ? '<input type="hidden" name="style" value="' . $slug_style . '">' : ''; ?>
                  <?php echo isset($horizontal) && $horizontal ? '</div>' : ''; ?>
                <input type="hidden" name="url" value="<?= current_url() ?>">
                <input type="hidden" name="discount" value="promo">
                <input class="bot-mrgn-ult" type="submit" value="Записаться">
              </form>
                <p style="display: block!important;" class="lead-form__policy">Нажимая кнопку "Записаться" я даю <a class="txt" popup-trigger="personaldata" style="border-bottom: 1px dotted">согласие на обработку и хранение персональных данных</a> и соглашаюсь с <a class="txt" popup-trigger="privacy" style="border-bottom: 1px dotted">политикой конфиденциальности</a>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="promo-footer d-none">
  <div class="promo-footer__container" style="padding-top: 7px; padding-bottom: 7px">
    <div class="promo-footer__title" style="display: none">Успей записаться за:</div>
    <div class="timer" style="margin-left: 0; display: none">
      <span class="timer-section minute-1">0</span>
      <span class="timer-section minute-2">0</span>
      <span class="timer-separator">:</span>
      <span class="timer-section second-1">0</span>
      <span class="timer-section second-2">0</span>
    </div>
    <div class="promo-footer__title promo-footer__title--big">Запишитесь на две услуги и получите скидку 20% на первый визит!</div>
    <button class="promo-footer__cta" type="button" popup-trigger="promo-lead">Записаться!</button>
    <button class="promo-footer__close" aria-label="Закрыть уведомление" type="button"></button>
  </div>
</div>
