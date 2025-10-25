<?php if (isset($salon))  : ?>
    <div class="container">
        <section id="MainScreen" class="base-section salon" style="background-image: url(<?php echo base_url(); ?>media/salons/<?php echo $salon['slug']; ?>/bg_ms.jpg)">
            <div class="salon__wrapper">
                <h1 class="salon__title">Салон красоты «ПЕРСОНА» <?= $salon['name']; ?></h1>
                <div class="salon__features-list">
                    <div class="salon__feature">
                        <h6><?php echo isset($salon_block) && array_key_exists('count', $salon_block) ? $salon_block['count'] : ''; ?></h6>
                        <p><?php echo isset($salon_block) && array_key_exists('what', $salon_block) ? $salon_block['what'] : ''; ?>
                            <br/><?php echo $salon['address_short']; ?></p>
                    </div>
                    <div class="salon__feature">
                        <h6><?php echo $salon['workers']; ?></h6>
                        <p><?php echo $this->pluralform->getPluralForm($salon['workers'], 'Профессионал', 'Профессионала', 'Профессионалов'); ?>
                            <br/><?php echo isset($salon_block) && array_key_exists('prof', $salon_block) ? $salon_block['prof'] : ''; ?></p>
                    </div>
                    <div class="salon__feature">
                        <h6 class="zero">0</h6>
                        <p><?php echo isset($salon_block) && array_key_exists('client', $salon_block) ? $salon_block['client'] : ''; ?></p>
                    </div>
                </div>
                <?php echo isset($salon_block) && array_key_exists('slogan', $salon_block) ? '<h3 class="salon__slogan">' . $salon_block['slogan'] . '</h3>' : ''; ?>
                <?php $this->load->view('amp/_form', array('slug_salon' => $salon['slug'], 'tel' => $salon['tel'], 'color' => '#fff')); ?>
            </div>
        </section>
    </div>
<?php endif; ?>

