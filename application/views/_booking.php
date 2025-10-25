<div class="booking-overlay"></div>
<div class="booking-popup">
    <div id="booking" class="booking-popup__container">
        <div class="booking-popup__loading">
            <span>Загрузка...</span>
            <img src="<?php echo base_url(); ?>assets/imgs/loading.svg" width="40" height="40" alt="Загрузка...">
        </div>
    </div>
    <button class="booking-popup__close-btn close" type="button"></button>
</div>
<?php if (!empty($active)) : ?>
  <a style="display: none!important;" class="d-none booking__popup-open" href="<?= $salon['online_link'] . "&utm_source=$utm" ?>"></a>
<?php endif ?>
<script>const isOnlineWidgetActive = '<?= !empty($active) ?>';</script>
