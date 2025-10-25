<?php if (isset($slug)) : ?>
    <?php if (file_exists('./media/services/' . $slug . '/after.jpg') && file_exists('./media/services/' . $slug . '/before.jpg')) : ?>
        <section id="Principles">
            <div>
                <div class="wrp cntr bot-mrgn-sml">
                    <div class="w-8-12 cntr-txt">
                        <h5><?php echo isset($block) && array_key_exists('title', $block) ? $block['title'] : ''; ?></h5>
                    </div>
                </div>
                <div class="wrp">
                    <div class="w-1 cs-beforeafter">
                        <div class="w-1">
                            <picture>
                                <source type="image/webp" srcset="<?php echo base_url(); ?>media/services/<?php echo $service['slug']; ?>/after.webp">
                                <img src="<?php echo base_url(); ?>media/services/<?php echo $service['slug']; ?>/after.jpg"
                                     alt="Принцип ПЕРСОНЫ">
                            </picture>
                        </div>
                        <div class="w-1">
                            <picture>
                                <source type="image/webp" srcset="<?php echo base_url(); ?>media/services/<?php echo $service['slug']; ?>/before.webp">
                                <img src="<?php echo base_url(); ?>media/services/<?php echo $service['slug']; ?>/before.jpg"
                                     alt="Принцип ПЕРСОНЫ">
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>
