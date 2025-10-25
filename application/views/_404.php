<section>
    <div class="not-found">
        <div class="not-found404">
            404
        </div>
        <h1>Страница не найдена (404 Not Found)</h1>
        <p>К сожалению, запрашиваемая Вами страница не найдена на сайте нашей компании.</p>
        <p>Мы приносим свои извинения за доставленные неудобства и предлагаем следующие пути:</p>
        <p> - перейти на <a href="/">главную страницу</a></p>
        <p> - оставить заявку на <a popup-trigger="about-lead">обратный звонок</a></p>
    </div>
</section>

<div class="cs-popup info-popup" trigger="about-lead">
    <div class="wrp">
        <div class="w-1 row jsfd">
            <div class="w-8-12 no-mrgn text">
                <h3 class="bot-mrgn-ult about__title">Запишись в салон красоты онлайн сейчас</h3>
                <p class="bot-mrgn-ult">Оставьте свои контактные данные, мы <b>быстро перезвоним</b> и уточним
                    детали записи</p>
                <?php $this->load->view('_form', array('horizontal' => false, 'heading' => null, 'master' => false)); ?>
            </div>
            <div class="w-4-12 no-mrgn img"
                 style="background-image: url(<?php echo base_url(); ?>assets/imgs/popup_about-atmosphere.jpg);"></div>
        </div>
    </div>
</div>
<script>
  const isVoucherWidgetActive = false;
  const isLeedWidgetActive = false;
  const isAdamasWidgetActive = false;
  const isSokolovWidgetActive = false;
  const isJournalWidgetActive = false;
</script>
