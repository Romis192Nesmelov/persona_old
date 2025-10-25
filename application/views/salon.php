<?php if (isset($salon))  : ?>
    <section id="MainScreen">
        <div style="background-image: url(<?php echo base_url(); ?>media/salons/<?php echo $salon['slug']; ?>/bg_ms.jpg)">
            <div class="wrp">
                <div class="w-6-12 tablet mobile">
                    <div class="w-1 bot-mrgn-med">
                        <h1 class="main-title">Салон красоты «ПЕРСОНА» <?= $salon['name']; ?></h1>
                    </div>
                    <div class="w-1 row bot-mrgn-med">
                        <div class="w-4-12">
                            <h6><?php echo isset($salon_block) && array_key_exists('count', $salon_block) ? $salon_block['count'] : ''; ?></h6>
                            <p><?php echo isset($salon_block) && array_key_exists('what', $salon_block) ? $salon_block['what'] : ''; ?>
                                <br/><?php echo $salon['address_short']; ?></p>
                        </div>
                        <div class="w-4-12">
                            <h6><?php echo $salon['workers']; ?></h6>
                            <p><?php echo $this->pluralform->getPluralForm($salon['workers'], 'Профессионал', 'Профессионала', 'Профессионалов'); ?>
                                <br/><?php echo isset($salon_block) && array_key_exists('prof', $salon_block) ? $salon_block['prof'] : ''; ?></p>
                        </div>
                        <div class="w-4-12">
                            <h6 class="zero">0</h6>
                            <p><?php echo isset($salon_block) && array_key_exists('client', $salon_block) ? $salon_block['client'] : ''; ?></p>
                        </div>
                    </div>
                    <?php echo isset($salon_block) && array_key_exists('slogan', $salon_block) ? '<h3 class="bg-heading bot-mrgn-med"><span>' . $salon_block['slogan'] . '</span></h3>' : ''; ?>
                    <?php $this->load->view('_form', array('slug_salon' => $salon['slug'], 'tel' => $salon['tel'], 'horizontal' => true, 'heading' => 'Записаться на услуги on-line:', 'master' => false)); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

