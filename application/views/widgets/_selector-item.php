<?php
if (!isset($slug) || !isset($name) || !isset($type)) {
    die('internal selector error');
}
?>
<a class="item" data-slug="<?php echo $slug; ?>" href="<?php echo base_url() . 'dashboard/' . $type . '/' . $slug; ?><?php echo isset($get) ? $get : ''; ?>">
    <?php if (!isset($no_image) && !$no_image) : ?>
    <img src="<?php echo base_url(); ?>media/<?= isset($custom_img_path) ? $custom_img_path : $type . '/' . $slug . '/'; ?><?= isset($custom_img_name) ? $custom_img_name : 'preview_small.jpg' ?>">
    <?php endif; ?>
    <p><?php echo $name; ?></p>
</a>
