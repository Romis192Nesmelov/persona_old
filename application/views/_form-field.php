<form class="lead-form" autocomplete="off">
    <?php echo isset($heading) && $heading ? '<h2 class="lead-form__title big bot-mrgn-ult">' . $heading . '</h2>' : ''; ?>
    <?php echo isset($horizontal) && $horizontal ? '<div class="w-1 row cntr-itms jsfd bot-mrgn-ult">' : ''; ?>
  <div class="input-group">
    <label>Ваше имя:</label>
    <input type="text" name="name" placeholder="Например: Саша" minlength="3" maxlength="16" required>
  </div>
  <div class="input-group">
    <label>Ваш телефон:</label>
    <input type="text" name="tel" placeholder="+7 (800) 555-35-35" minlength="6" required>
  </div>
  <div class="input-group">
    <label>Желаемая дата и время:</label>
    <input type="text" id="datetimepicker" name="datetime" placeholder="01.01.2020 12:30" required>
  </div>
  <div class="input-group">
    <label>Желаемая услуга:</label>
    <input type="text" name="service" placeholder="Например, стрижка" minlength="2" required>
  </div>
    <?php echo isset($horizontal) && $horizontal ? '</div>' : ''; ?>
  <input type="hidden" name="url" value="<?= current_url() ?>">
  <input type="hidden" name="field_service" value="true">
    <?php echo isset($slug_salon) && $slug_salon ? '<input type="hidden" name="salon" value="' . $slug_salon . '">' : ''; ?>
    <?php echo isset($slug_style) && $slug_style ? '<input type="hidden" name="style" value="' . $slug_style . '">' : ''; ?>
  <input class="bot-mrgn-ult" type="submit" value="Записаться">
    <?php echo isset($tel) && $tel ? '<p>или по тел. <a class="txt" href="tel:' . $tel . '">' . $tel . '</a></p>' : ''; ?>
  <p>Нажимая кнопку "Записаться" я даю <a class="txt" popup-trigger="personaldata" style="border-bottom: 1px dotted">согласие на обработку и хранение персональных данных</a> и соглашаюсь с
    <a class="txt" popup-trigger="privacy" style="border-bottom: 1px dotted">политикой конфиденциальности</a></p>
</form>
