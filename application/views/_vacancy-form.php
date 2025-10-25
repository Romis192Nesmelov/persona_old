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
    <?php echo !empty($vacancy) ? '<input type="hidden" name="vacancy" value="' . $vacancy . '">' : ''; ?>
    <?php echo isset($horizontal) && $horizontal ? '</div>' : ''; ?>
    <input type="hidden" name="url" value="<?= current_url() ?>">
    <input type="hidden" name="custom_url" value="addVacancyLead">
    <input class="bot-mrgn-ult" type="submit" value="Отправить">
    <?php echo isset($tel) && $tel ? '<p>или по тел. <a class="txt" href="tel:' . $tel . '">' . $tel . '</a></p>' : ''; ?>
    <p class="lead-form__policy">Нажимая кнопку "Отправить" я даю <a class="txt" popup-trigger="personaldata" style="border-bottom: 1px dotted">согласие на обработку и хранение персональных данных</a> и соглашаюсь с <a class="txt" popup-trigger="privacy" style="border-bottom: 1px dotted">политикой конфиденциальности</a></p>
</form>
