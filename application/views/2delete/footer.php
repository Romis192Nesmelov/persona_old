<?php
/**
 * Copyright (c) 2018.
 * Powered by CheckSanity (https://checksanity.ru)
 * Developed for Prime Production (https://primeproduction.ru)
 */
if (isset($is_home)) {
    $salon['tel'] = null;
}
?>

<footer id="Contacts">
    <div class="cs_con">
        <div class="cs_col one_two">
            <img class="bot_mrgn_sml" src="/temp-media/footer-logo.png">
            <p>© 2018, Салон Персона</p>
            <p>При возникновении любых технических сложностей сообщите нам по<br/>
                почте <a style="color: var(--gray);" href="mailto: info@persona-city.ru">info@persona-city.ru</a></p>
        </div>
        <div class="cs_col one_two align_right_txt">
            <?php if ($salon['tel'] != null) : ?>
                <h3 style="font-weight: 700;"><a href="tel:<?php echo $salon['tel_link']; ?>"> <?php echo $salon['tel']; ?></a></h3>
            <?php endif; ?>
            <p class="bot_mrgn_sml"><a href="mailto: info@persona-city.ru"> info@persona-city.ru</a></p>
            <p><a style="color: var(--gray);" cs-popup="policy">Политика конфиденциальности</a></p>
            <div cs-popup-content="policy" cs-popup-style="info">
                <div class="cs_col one" style="padding: 20px;">
                    <h3 class="bot_mrgn_ult">Политика конфиденциальности</h3>
                    <p>
                        Настоящим субъект персональных данных дает согласие (сайт promo.persona-city.ru), далее – «Оператор», на обработку своих персональных
                        данных, включая сбор, систематизацию, накопление, хранение, уточнение (обновление, изменение), использование (в том числе для e-mail
                        рассылки), распространение (в том числе передачу, включая трансграничную передачу данных), обезличивание, блокирование, уничтожение
                        персональных данных, в том числе с использованием средств автоматизации, передачу на обработку иным лицам, трансграничную передачу, в
                        целях анализа покупательского поведения и улучшения качества товаров и услуг, а также предоставления субъекту персональных данных
                        информации коммерческого и информационного характера через любые каналы связи, в том числе по почте, смс, электронной почте, телефону,
                        если субъект персональных данных изъявит желание на получение подобной информации соответствующими средствами связи. Оператор
                        гарантирует соблюдение прав субъекта персональных данных, в том числе: право на получение сведений о том, какие персональные данные
                        субъекта персональных данных хранятся у Оператора; право на удаление, уточнение или исправление хранящихся у Оператора персональных
                        данных; иные права, установленные действующим законодательством РФ. Оператор обязуется немедленно прекратить обработку персональных
                        данных после получения соответствующего требования субъекта персональных данных. Согласие субъекта персональных данных на обработку
                        персональных данных действует бессрочно и может быть в любой момент отозвано субъектом персональных данных. Требования на прекращение
                        обработки персональных данных могут быть направлены по электронному адресу
                        <a href="mailto: info@persona-city.ru">info@persona-city.ru</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Yandex Map -->
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>

<!-- Mask input -->
<script src="https://chcksnt.com/jquery/jquery.inputmask.bundle.min.js"></script>

<!-- CheckSanity widgets -->
<script src="https://chcksnt.com/temp/ajaxform/1.2/cs_ajaxform.js"></script>
<script src="https://chcksnt.com/temp/popup_classic/1.2/cs_popup.js"></script>
<script src="https://chcksnt.com/temp/slider/1.1/cs_slider.js"></script>

<script src="https://chcksnt.com/temp/beforeafter/1.1/cs_beforeafter.js"></script>

<!-- Helpers -->
<script src="https://chcksnt.com/kit/imgToSvg.js"></script>

<!-- Site scripts -->
<script src="/temp-js/map.js"></script>
<script src="/temp-js/user.js"></script>
</body>
</html>
