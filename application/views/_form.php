<?php
?>
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
    <?php if (!empty($master)): ?>
        <div class="input-group">
            <label>Специалист:</label>
            <input readonly type="text" name="master">
        </div>
        <input type="hidden" name="salon" value="">
    <?php endif; ?>
    <?php echo isset($slug_salon) && $slug_salon !== 'default' && empty($master) ? '<input type="hidden" name="salon" value="' . $slug_salon . '">' : ''; ?>
    <?php if ((empty($slug_salon) || $slug_salon == 'default') && !empty($salons) && empty($master)) : ?>
      <div class="input-group">
        <label>Выберите салон:</label>
        <select class="salons-select" name="salon" required>
          <option selected disabled value=''>Выберите из списка</option>
            <?php foreach ($salons as $salon) : ?>
              <option value="<?= $salon['slug'] ?>">Персона <?= $salon['name'] ?></option>
            <?php endforeach; ?>
        </select>
      </div>
    <?php endif; ?>
    <?php echo isset($offer) && $offer ? '<input type="hidden" name="offer" value="' . $offer . '">' : ''; ?>
    <?php echo isset($slug_service) && $slug_service ? '<input type="hidden" name="service" value="' . $slug_service . '">' : ''; ?>
    <?php echo isset($slug_style) && $slug_style ? '<input type="hidden" name="style" value="' . $slug_style . '">' : ''; ?>
    <?php echo isset($horizontal) && $horizontal ? '</div>' : ''; ?>
    <input type="hidden" name="url" value="<?= current_url() ?>">
    <!--input type="hidden" name="url" value="<= $_SERVER['REQUEST_URI'] ?>"-->
    <input class="bot-mrgn-ult" type="submit" value="Записаться">
    <?php echo isset($tel) && $tel ? '<p>или по тел. <a class="txt" href="tel:' . $tel . '">' . $tel . '</a></p>' : ''; ?>
    <p class="lead-form__policy">Нажимая кнопку "Записаться" я даю <a class="txt" popup-trigger="personaldata" style="border-bottom: 1px dotted">согласие на обработку и хранение персональных данных</a> и соглашаюсь с <a class="txt" popup-trigger="privacy" style="border-bottom: 1px dotted">политикой конфиденциальности</a></p>
</form>
