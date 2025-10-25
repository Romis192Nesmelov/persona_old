<?php if (isset($block)) : ?>
    <div class="container">
        <section id="Offer" class="base-section offer" style="background-image: url(<?php echo base_url(); ?>assets/imgs/bg_offer.png);">
            <div class="offer__wrapper">
                <h5 class="offer__title"><?php echo array_key_exists('title', $block) ? $block['title'] : ''; ?></h5>
                <p class="offer__desc"><?php echo array_key_exists('desc', $block) ? $block['desc'] : ''; ?></p>
            </div>
            <div class="offer__form">
                <?php $this->load->view('amp/_form', array('slug_style' => null)); ?>
            </div>
        </section>
    </div>

<?php endif; ?>
