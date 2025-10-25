<?php
if (!isset($blocks)) {
    die('Blocks internal error');
}
?>
<script>
    function getSeoImg(source) {
        source.onerror = null;
        source.src="<?php echo base_url(); ?>media/blocks/seo/preview.jpg";
    }
</script>
<section id="Selector">
    <div>
        <div class="grd">
            <a class="item big" href="<?php echo base_url() ?>dashboard/block">
                <img src="<?php echo base_url(); ?>assets/dashboard/add.jpg" alt="Добавить блок">
                <p>Добавить SEO блок</p>
            </a>
            <?php foreach ($blocks as $block) : ?>
                <a class="item big" href="<?php echo base_url() . 'dashboard/block/' . $block['slug']; ?>">
                    <img onerror="getSeoImg(this)" src="<?php echo base_url(); ?>media/blocks/<?php echo $block['slug']; ?>/preview.jpg" alt="Превью блока">
                    <p><?php echo $block['name']; ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
