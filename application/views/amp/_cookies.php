<amp-consent id="cookieConsent" layout="nodisplay">
    <script type="application/json">{
            "consentInstanceId": "consent-id",
            "consentRequired": true,
            "promptUI": "consentDialog",
            "postPromptUI": "post-consent-ui"
        }</script>
    <div id="consentDialog" class="cookies-footer">
        <div class="cookies-footer__container">
            <div class="cookies-footer__text">Мы используем cookie. Это позволяет нам анализировать взаимодействие
                посетителей с сайтом и делать его лучше. Продолжая пользоваться сайтом, вы соглашаетесь с
                <a on="tap:privacy_agreement.open" style="border-bottom: 1px dotted; cursor: pointer">политикой конфиденциальности</a>
                и
                <a on="tap:personaldata_agreement.open" style="border-bottom: 1px dotted; cursor: pointer">принимаете соглашение на обработку
                    персональных данных</a>
            </div>
            <button on="tap:cookieConsent.accept" class="cookies-footer__btn" type="button">Принять</button>
        </div>
    </div>
    <div style="display: none" id="post-consent-ui">
        <button on="tap:cookieConsent.prompt()">Update Consent</button>
    </div>
</amp-consent>