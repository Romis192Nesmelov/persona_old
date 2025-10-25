<?php if (isset($permissions)) : ?>

    <section id="Selector">
        <div>
            <!-- categories -->
            <div class="wrp bot-mrgn-sml">
                <div class="w-1 row jsfd cntr-itms">
                    <h2>Залы</h2>
                </div>
            </div>
            <div class="grd">
                <?php $this->load->view('widgets/_btn-add', array('enabled' => $permissions['price_add'], 'type' => 'costs/category')); ?>
                <?php foreach ($categories as $category) {
                    $this->load->view('widgets/_selector-item', array(
                        'slug' => $category['id'],
                        'name' => $category['name'],
                        'type' => 'costs/category',
                        'custom_img_path' => 'price/categories/' . $category['id'] . '/',
                        'custom_img_name' => 'bg_small.jpg'
                    ));
                }
                ?>
            </div>
            <!-- masters -->
            <div class="wrp bot-mrgn-sml">
                <div class="w-1 row jsfd cntr-itms">
                    <h2>Категории мастеров</h2>
                </div>
            </div>
            <div class="grd">
                <?php $this->load->view('widgets/_btn-add', array('enabled' => $permissions['price_add'], 'type' => 'costs/master')); ?>
                <?php foreach ($masters as $master) {
                    $this->load->view('widgets/_selector-item', array('slug' => $master['id'], 'name' => $master['name'], 'type' => 'costs/master', 'no_image' => true));
                }
                ?>
            </div>
        </div>
    </section>

<?php endif; ?>
