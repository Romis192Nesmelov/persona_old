<?php if (isset($salons) && $salons && isset($permissions)) : ?>
    <section id="Selector">
        <div>
            <div class="wrp bot-mrgn-sml">
                <div class="w-1 row jsfd cntr-itms">
                    <h2>Список салонов</h2>
                    <div class="w-6-12 row rght cntr-itms">
                        <?php $this->load->view('widgets/_btn-order-by', array('disabled' => $permissions['order_by'], 'type' => 'salons')); ?>
                    </div>
                </div>
            </div>
            <div class="grd">
                <?php $this->load->view('widgets/_btn-add', array('enabled' => $permissions['salons_add'], 'type' => 'salon')); ?>
                <?php foreach ($salons as $salon) {
                    $this->load->view('widgets/_selector-item', array('slug' => $salon['slug'], 'name' => $salon['name'], 'type' => 'salons'));
                }
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>
