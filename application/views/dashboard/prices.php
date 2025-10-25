<?php
if (!isset($prices) && !isset($permissions)) {
    die('Block internal error');
}
?>
<section id="Selector">
    <div>
        <div class="wrp bot-mrgn-sml">
            <div class="w-1 row jsfd cntr-itms">
                <h2>Прайс-лист</h2>
            </div>
        </div>
        <div class="grd">
            <?php foreach ($prices as $key => $value) {
                $this->load->view('widgets/_selector-item', array('slug' => $key, 'name' => $value, 'type' => 'price', 'no_image' => true));
            }
            ?>
        </div>
    </div>
</section>