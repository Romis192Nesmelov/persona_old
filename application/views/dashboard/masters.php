<?php if (isset($permissions)) : ?>
    <section id="Selector">
        <div>
            <div class="wrp bot-mrgn-sml">
                <div class="w-1 row jsfd cntr-itms">
                    <h2><?= !isset($salon) ? 'Выберите салон' : 'Мастера салона ' . $salon['name'] ?></h2>
                </div>
            </div>
            <div class="grd">
                <?php if (isset($salon)) : ?>
                    <?php $this->load->view('widgets/_btn-add', array('enabled' => $permissions['masters_add'], 'type' => 'master')); ?>
                <?php endif ?>

                <?php if (isset($salons)) : ?>
                    <?php foreach ($salons as $salon) {
                        $this->load->view('widgets/_selector-item', array('slug' => $salon['slug'], 'custom_img_path' => 'salons/' . $salon['slug'] . '/', 'name' => $salon['name'], 'type' => 'masters'));
                    }
                    ?>
                <?php endif; ?>
                <?php if (isset($masters)) : ?>
                    <?php foreach ($masters as $master) {
                        $this->load->view('widgets/_selector-item', array(
                            'slug' => $master['id'],
                            'name' => $master['name'],
                            'type' => 'master',
                            'custom_img_path' => 'masters/' . $master['id'] . '/',
                            'custom_img_name' => 'master.jpg'
                        ));
                    }
                    ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>