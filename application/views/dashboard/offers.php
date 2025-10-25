<?php
if (!isset($offers) && !isset($permissions)) {
    die('Block internal error');
}
?>
<section id="Selector">
    <div>
        <div class="wrp bot-mrgn-sml">
            <div class="w-1 row jsfd cntr-itms">
                <h2>Акции</h2>
            </div>
        </div>
        <div class="grd">
            <?php $this->load->view('widgets/_btn-add', array('enabled' => $permissions['offers_add'], 'type' => 'offer')); ?>
            <?php foreach ($offers as $offer) {
                $this->load->view('widgets/_selector-item', array('slug' => $offer['id'], 'name' => $offer['name'], 'type' => 'offer', 'no_image' => true));
            }
            ?>
        </div>
    </div>
</section>