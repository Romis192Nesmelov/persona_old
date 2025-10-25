<form class="lead-form" <?php if (isset($color)) : ?> style="color: <?= $color ?>" <?php endif; ?> method="post" action-xhr="/addLead" target="_top">
    <input type="hidden" name="url" value="<?= current_url() ?>">
    <?php echo isset($offer) && $offer ? '<input type="hidden" name="offer" value="' . $offer . '">' : ''; ?>
    <?php echo isset($slug_service) && $slug_service ? '<input type="hidden" name="service" value="' . $slug_service . '">' : ''; ?>
    <?php echo isset($slug_style) && $slug_style ? '<input type="hidden" name="style" value="' . $slug_style . '">' : ''; ?>
    <?php echo isset($slug_salon) && $slug_salon !== 'default' ? '<input type="hidden" name="salon" value="' . $slug_salon . '">' : ''; ?>

    <label class="lead-form__label">
        <span class="lead-form__label-text">Ваше имя:</span>
        <input type="text" name="name" placeholder="Например: Саша" minlength="3" maxlength="16" required>
    </label>

    <label class="lead-form__label">
        <span class="lead-form__label-text">Ваш телефон:</span>
        <input type="tel" name="tel" mask="+\7_(000)_000-00-00" mask-output="alphanumeric" minlength="18" placeholder="+7 (999) 999-99-99" required>
    </label>

    <?php if ((empty($slug_salon) || $slug_salon == 'default') && !empty($salons)) : ?>
        <label class="lead-form__label">
            <span class="lead-form__label-text">Выберите салон:</span>
            <select name="salon" required>
                <option selected disabled value=''>Выберите из списка</option>
                <?php foreach ($salons as $salon) : ?>
                    <option value="<?= $salon['slug'] ?>">Персона <?= $salon['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    <?php endif; ?>
    <input class="lead-form__btn gradient-btn" type="submit" value="Записаться">
    <amp-recaptcha-input layout="nodisplay" name="token" data-sitekey="6Lc9cjYkAAAAAOatw_4MwOM5cvmxsr1MIb27aYu1" data-action="recaptcha_example"></amp-recaptcha-input>
    <div class="lead-form__error" submit-error>
        Произошла ошибка при отправке данных. Пожалуйста, проверьте корректность заполнения полей
    </div>
    <?php echo isset($tel) && $tel ? '<p>или по тел. <a class="lead-form__tel lead-form__link" href="tel:' . $tel . '">' . $tel . '</a></p>' : ''; ?>
    <p class="lead-form__policy">Нажимая кнопку "Записаться" я даю <a style="border-bottom: 1px dotted" class="lead-form__link" href="<?php echo base_url(); ?>personal-data" target="_blank">согласие на обработку и хранение персональных данных</a> и соглашаюсь с <a style="border-bottom: 1px dotted" class="lead-form__link" href="<?php echo base_url(); ?>policy" target="_blank">политикой конфиденциальности</a></p>
    <div class="lead-form__lock" submitting>
        <div>
            <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div>
    <div class="lead-form__lock" submit-success>
        <div>
            <amp-img width="50" height="50" alt="" src="<?= base_url() ?>assets/icons/icon_success.svg"></amp-img>
            Спасибо, ваши данные успешно отправлены!<br>Мы свяжемся с Вами в ближайшее время!
        </div>
    </div>
</form>