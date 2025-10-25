<?php
?>
<div class="input-group">
    <?php if (isset($label) && $label != '') : ?>
        <label><?php echo $label; ?></label>
    <?php endif; ?>
    <input type="number"
           name="<?php echo isset($name) ? $name : ''; ?>"
           placeholder="<?php echo isset($placeholder) ? $placeholder : ''; ?>"
           value="<?php echo isset($value) ? $value : ''; ?>"
           minlength="<?php echo isset($minlength) ? $minlength : ' '; ?>"
           maxlength="<?php echo isset($maxlength) ? $maxlength : ' '; ?>"
        <?php echo isset($required) && $required ? ' required ' : ' '; ?>
        <?php echo isset($readonly) && $readonly && isset($value) && $value != '' ? ' readonly ' : ' '; ?>
    >
</div>
