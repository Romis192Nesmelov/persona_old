<?php
?>
<footer>
    <div>
        <div class="w-6-12 lft-txt" style="width: 100%;">
            <img width="225" height="58" class="logo bot-mrgn-ult"
                 src="<?php echo base_url(); ?>media/general/default/logo-g.svg" alt="ПЕРСОНА">
            <p>© <?= date('Y') ?>, Персона</p>
            <p>Юридическая информация:</p>
            <p>ИП Цыганкова Елена Валентиновна</p>
            <p>ИНН 772803624638 / ОГРНИП 316774600064111</p>
            <p>125466, Москва, Новокуркинское шоссе, 31</p>
            <p>При возникновении любых технических сложностей сообщите нам по
                почте <?php echo isset($salon) && array_key_exists('mail', $salon) ? '<a class="txt" href="mailto:' . $salon['mail'] . '">' . $salon['mail'] . '</a>' : ''; ?>
            </p>
        </div>
        <div class="w-6-12 rght-txt">
            <?php if (isset($salon) && array_key_exists('tel', $salon) && $salon['tel'] != '') : ?>
                <h3 style="font-weight: 700;" class="bot-mrgn-ult"><a class="tel"
                                                                      href="tel:<?php echo $salon['tel']; ?>"><?php echo $salon['tel']; ?></a>
                </h3>
            <?php endif; ?>
            <p><a class="txt" href="<?php echo base_url(); ?>policy">Политика конфиденциальности</a></p>
            <p><a class="txt" href="<?php echo base_url(); ?>personal-data">Согласие на обработку персональных
                    данных</a></p>
            <p><a class="txt" href="<?php echo base_url(); ?>cookie">Используемые cookie</a></p>
            <p style="margin-top: 8px">
                <a target="_blank" href="https://apps.apple.com/us/app/%D1%81%D0%B0%D0%BB%D0%BE%D0%BD-%D0%BA%D1%80%D0%B0%D1%81%D0%BE%D1%82%D1%8B-%D0%BF%D0%B5%D1%80%D1%81%D0%BE%D0%BD%D0%B0/id6467411376">
                    <img width="150" height="45" alt="Persona at app store" src="<?php echo base_url(); ?>assets/imgs/app_store.webp">
                </a>
            </p>
            <p style="margin-top: 8px">
                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.sycret.personaClientNew">
                    <img width="150" height="45" alt="Persona at google play" src="<?php echo base_url(); ?>assets/imgs/google_play.webp"></a>
            </p>
        </div>
    </div>
</footer>
<?php !empty($privacy_block) ? $this->load->view('privacy-policy', ['title' => $privacy_block['title'], 'text' => $privacy_block['text'], 'trigger' => 'privacy']) : ''; ?>
<?php !empty($personal_data_block) ? $this->load->view('privacy-policy', ['title' => $personal_data_block['title'], 'text' => $personal_data_block['text'], 'trigger' => 'personaldata']) : ''; ?>
<?php !empty($cookies_block) ? $this->load->view('privacy-policy', ['title' => $cookies_block['title'], 'text' => $cookies_block['text'], 'trigger' => 'cookies']) : ''; ?>
