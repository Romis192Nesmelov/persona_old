<?php if (isset($services) && $services && isset($permissions)) : ?>
    <section id="Selector">
        <div>
            <div class="wrp bot-mrgn-sml">
                <div class="w-1 row jsfd cntr-itms">
                    <h2>Список услуг</h2>
                    <div class="w-6-12 row rght cntr-itms">
                        <?php $this->load->view('widgets/_btn-order-by', array('disabled' => $permissions['order_by'], 'type' => 'services')); ?>
                    </div>
                </div>
            </div>
            <div class="grd">
                <?php $this->load->view('widgets/_btn-add', array('enabled' => $permissions['services_add'], 'type' => 'service')); ?>
                <?php foreach ($services as $service) {
                    $this->load->view('widgets/_selector-item', array('slug' => $service['slug'], 'name' => $service['name'], 'type' => 'services'));
                }
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>