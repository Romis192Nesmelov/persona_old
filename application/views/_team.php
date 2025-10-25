<?php if (isset($salon) && isset($block)) : ?>
    <section id="Masters" style="background-image: url(<?php echo base_url() . 'media/salons/' . $salon['slug'] . '/bg_team.jpg'; ?>);">
        <div class="cntr-txt">
            <div class="wrp">
                <div class="w-1">
                    <h2><?php echo array_key_exists('title', $block) ? $block['title'] : ''; ?></h2>
                </div>
                <div class="w-1 row mobile-row cntr top-itms">
                    <div class="w-3-12 tablet mobile item">
                        <h6 class="bot-mrgn-ult">01</h6>
                        <p class="big bot-mrgn-ult"><?php echo array_key_exists('title_1', $block) ? $block['title_1'] : ''; ?></p>
                        <p><?php echo array_key_exists('text_1', $block) ? $block['text_1'] : ''; ?></p>
                    </div>
                    <div class="w-3-12 tablet mobile item">
                        <h6 class="bot-mrgn-ult">02</h6>
                        <p class="big bot-mrgn-ult"><?php echo array_key_exists('title_2', $block) ? $block['title_2'] : ''; ?></p>
                        <p><?php echo array_key_exists('text_2', $block) ? $block['text_2'] : ''; ?></p>
                    </div>
                    <div class="w-3-12 tablet mobile item">
                        <h6 class="bot-mrgn-ult">03</h6>
                        <p class="big bot-mrgn-ult"><?php echo array_key_exists('title_3', $block) ? $block['title_3'] : ''; ?></p>
                        <p><?php echo array_key_exists('text_3', $block) ? $block['text_3'] : ''; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
