<div class="input-group">
    <?php if (isset($label) && $label != '') : ?>
        <label><?php echo $label; ?></label>
    <?php endif; ?>
    <?php foreach ($values as $key => $val) : ?>
        <input type="radio" id="<?php echo $name . '_' . $key; ?>" name="<?php echo $name; ?>"
               value="<?php echo $key; ?>" <?php echo $value == $key ? 'checked' : ''; ?>>
        <label for="<?php echo $name . '_' . $key; ?>"><?php echo $val; ?></label>
    <?php endforeach; ?>
</div>
