<footer class="footer">
    <div class="container">
        <div class="footer__info">
            <amp-img width="225" height="58" src="<?php echo base_url(); ?>media/general/default/logo-g.svg"
                     alt="ПЕРСОНА"></amp-img>
            <div class="footer__copyright">
                <p>© <?= date('Y') ?>, Персона</p>
                <p>Юридическая информация:</p>
                <p>ИП Цыганкова Елена Валентиновнаа</p>
                <p>ИНН 772803624638 / ОГРНИП 316774600064111</p>
                <p>125466, Москва, Новокуркинское шоссе, 31</p>
                <p>При возникновении любых технических сложностей сообщите нам по почте
                    <a class="footer__link" href="mailto:info@persona-city.ru">info@persona-city.ru</a>
                </p>
            </div>
        </div>
        <div class="footer__tel">
            <?php if (isset($salon) && array_key_exists('tel', $salon) && $salon['tel'] != '') : ?>
                <a class="footer__link footer__link--bold"
                   href="tel:<?php echo $salon['tel']; ?>"><?php echo $salon['tel']; ?></a>
            <?php endif; ?>
            <a on="tap:privacy_agreement.open" class="footer__link">Политика конфиденциальности</a>
            <a on="tap:personaldata_agreement.open" class="footer__link">Согласие на обработку персональных данных</a>
            <a on="tap:cookies_agreement.open" class="footer__link">Используемые cookie</a>
        </div>
    </div>
</footer>
<amp-lightbox animate-in="fade-in" class="lightbox" id="lead" layout="nodisplay">
    <div tabindex="-1" role="button" on="tap:lead.close" class="lightbox__overlay"></div>
    <div class="lightbox__content">
        <div class="lead-modal">
            <div class="lead-modal__content">
                <h3 class="lead-modal__title">Запишись в салон красоты онлайн сейчас</h3>
                <p class="lead-modal__text">Оставьте свои контактные данные, мы <b>быстро перезвоним</b> и уточним
                    детали записи</p>
                <?php $this->load->view('amp/_form'); ?>
            </div>
            <div class="lead-modal__img"
                 style="background-image: url(<?php echo base_url(); ?>assets/imgs/popup_about-atmosphere.jpg);"></div>
        </div>
        <button aria-label="Закрыть модальное окно" class="lightbox__close" on="tap:lead.close">
            <amp-img alt="" width="20" height="20" src="<?= base_url() ?>assets/icons/icon-close.svg"></amp-img>
        </button>
    </div>
</amp-lightbox>
<?php isset($privacy_block) ? $this->load->view('amp/privacy-policy', ['title' => $privacy_block['title'], 'text' => $privacy_block['text'], 'id' => 'privacy_agreement']) : ''; ?>
<?php isset($personal_data_block) ? $this->load->view('amp/privacy-policy', ['title' => $personal_data_block['title'], 'text' => $personal_data_block['text'], 'id' => 'personaldata_agreement']) : ''; ?>
<?php isset($cookies_block) ? $this->load->view('amp/privacy-policy', ['title' => $cookies_block['title'], 'text' => $cookies_block['text'], 'id' => 'cookies_agreement']) : ''; ?>
