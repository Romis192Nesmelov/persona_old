<?php if (isset($block) && isset($offerq_title)) : ?>
<section id="OfferQuestion" style="background-image: url(<?php echo base_url(); ?>assets/imgs/bg_offer-q.svg); background-size: 8%;">
    <div>
        <div class="wrp">
            <div class="w-1 row jsfd mobile-row cntr-itms">
                <div class="w-6-12 mobile">
                    <h3 class="bot-mrgn-sml">Хотите сделать <?= mb_strtolower($offerq_title) ?>, но еще не определились?</h3>
                    <p class="big"><?php echo array_key_exists('text', $block) ? $block['text'] : ''; ?></p>
                </div>
                <div class="w-4-12 mobile">
                    <?php $this->load->view('_form', array('slug_style' => null, 'heading' => null, 'master' => false)); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
