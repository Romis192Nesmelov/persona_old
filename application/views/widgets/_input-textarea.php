<div class="input-group">
    <?php if (isset($label) && $label != '') : ?>
        <label><?php echo $label; ?></label>
    <?php endif; ?>
    <textarea
           name="<?php echo isset($name) ? $name : ''; ?>"
           placeholder="<?php echo isset($placeholder) ? $placeholder : ''; ?>"
           minlength="<?php echo isset($minlength) ? $minlength : ' '; ?>"
           maxlength="<?php echo isset($maxlength) ? $maxlength : ' '; ?>"
        <?php echo isset($required) && $required ? ' required ' : ' '; ?>
        <?php echo isset($readonly) && $readonly && isset($value) && $value != '' ? ' readonly ' : ' '; ?>
    ><?php echo isset($value) ? htmlspecialchars($value) : ''; ?></textarea>
</div>
