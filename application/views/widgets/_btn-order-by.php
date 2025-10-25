<?php
?>
<?php if (!$disabled) : ?>
    <a class="btn disabled">Редактировать порядок</a>
<?php else : ?>
    <a class="btn edit-order" data-table="<?php echo $type; ?>">Редактировать порядок</a>
<?php endif; ?>
