<?php if (isset($block)) : ?>
    <div class="container">
        <section id="OfferQuestion" class="base-section offer" style="background-image: url(<?php echo base_url(); ?>assets/imgs/bg_offer-q.svg); background-size: 8%;">
            <div class="offer__wrapper">
                <h3 class="offer__title">Хотите сделать <?= mb_strtolower($offerq_title) ?>, но еще не определились?</h3>
                <p class="offer__desc"><?php echo array_key_exists('text', $block) ? $block['text'] : ''; ?></p>
            </div>
            <div class="offer__form">
                <?php $this->load->view('amp/_form', array('slug_style' => null)); ?>
            </div>
        </section>
    </div>

<?php endif; ?>
