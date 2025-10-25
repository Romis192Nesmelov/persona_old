<?php if (isset($block)) : ?>
    <section id="Offer" style="background-image: url(<?php echo base_url(); ?>assets/imgs/bg_offer.png);">
        <div>
            <div class="wrp">
                <div class="w-1 row mobile-row jsfd cntr-itms">
                    <div class="w-6-12 mobile">
                        <h5 class="bot-mrgn-sml"><?php echo array_key_exists('title', $block) ? $block['title'] : ''; ?></h5>
                        <p class="big"><?php echo array_key_exists('desc', $block) ? $block['desc'] : ''; ?></p>
                    </div>
                    <div class="w-4-12 mobile">
                        <?php $this->load->view('_form', array('slug_style' => null, 'heading' => null, 'master' => false)); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
