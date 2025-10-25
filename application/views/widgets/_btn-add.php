<?php
?>
<?php if (!$enabled) : ?>
    <a class="w-1 item unsortable disabled">
        <img src="<?php echo base_url(); ?>assets/dashboard/add.jpg" alt="Добавить">
        <p>Добавить</p>
    </a>
<?php else : ?>
    <a class="w-1 item unsortable" href="<?php echo base_url(); ?>dashboard/<?php echo $type; ?><?php echo isset($get) ? $get : ''; ?>">
        <img src="<?php echo base_url(); ?>assets/dashboard/add.jpg" alt="Добавить">
        <p>Добавить</p>
    </a>
<?php endif; ?>
