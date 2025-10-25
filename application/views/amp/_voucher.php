<?php if (isset($salon) && ($salon['slug'] == 'default' || $salon['online_store'])) : ?>
    <section class="base-section voucher" id="Voucher">
    <div class="container">
        <h2 class="title">Электронные сертификаты на депозит со скидкой</h2>
        <div class="new-banner">
            <div class="new-banner__left">
                <div class="new-banner__badge">NEW!</div>
                <div class="new-banner__title">Покупайте BEAUTY Депозит</div>
                <div class="new-banner__subtitle">с кэшбэком до 20.000₽</div>
                <div class="new-banner__buttons">
                    <a href="/voucher" class="new-banner__btn-outline">Подробнее..</a>
                    <a href="/voucher/buy" class="new-banner__btn-fill">Купить</a>
                </div>
            </div>
            <div class="new-banner__right">
                <img src="/assets/imgs/voucher-bg-new.png" alt="Beauty tools" />
            </div>
        </div>
    </div>
</section>

<amp-lightbox animate-in="fade-in" class="lightbox" id="voucher" layout="nodisplay">
    <div tabindex="-1" role="button" on="tap:voucher.close" class="lightbox__overlay"></div>
    <div class="lightbox__content">
        <div class="privacy">
            <p class="privacy__title">Подробные условия</p>
            <p class="privacy__text">
                Покупая электронные сертификаты на депозит вы получаете уникальный код сертификата на почту и в виде СМС на указанный номер телефона.
                Не сообщайте третьим лицам код сертификата!
                При посещении салона назовите этот код администратору и номинал сертификата будет зачислен на ваш депозитный счет.
                Сертификат не ограничен по времени использования. Использование возможно в любое время, срок сгорания отсутствует.
                С депозитного счета можно оплатить любые услуги и товары в салоне в полном объеме.
                Неиспользованный остаток номинала автоматически переносится на следующие визиты и не сгорает.
                При повторном посещении салона не требуется еще раз называть код сертификата, вся неиспользованная сумма остается на депозите.
                Сертификаты будет привязан к выбранному салону, воспользоваться сертификатом в другом салоне невозможно.
                Если Вы оплатили сертификат, но передумали посещать салон, возможен полный возврат средств на ту платежную систему, с которой была проведена оплата.
                Если Вам необходимо сделать возврат, или изменить салон, в котором Вы хотите воспользоваться сертификатом, пожалуйста свяжитесь с нами по номеру +74994906187.
                Если после оплаты Вам не поступил код сертификата в СМС сообщении и на почту или Вы ошиблись при вводе данных, пожалуйста сразу свяжитесь с нами по указанному выше номеру телефона.
            </p>
        </div>
        <button aria-label="Закрыть модальное окно" class="lightbox__close" on="tap:voucher.close">
            <amp-img alt="" width="20" height="20" src="<?= base_url() ?>assets/icons/icon-close.svg"></amp-img>
        </button>
    </div>
</amp-lightbox>
<?php endif; ?>