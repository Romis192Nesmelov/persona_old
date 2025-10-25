<?php
?>
<?php if (!$disabled) : ?>
    <a class="btn disabled">Удалить</a>
<?php else: ?>
    <form id="delete-form" method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>dashboard/<?= isset($delete_path) ? $delete_path : 'deleteData' ?>">
        <input type="hidden" name="model" value="<?php echo $type; ?>">
        <input type="hidden" name="slug" value="<?php echo $slug; ?>">
        <input type="submit" value="Удалить">
    </form>
<?php endif; ?>


