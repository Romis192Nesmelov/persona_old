<?php
$multiselect_template = $data['multiselect_template'];
$multiselect_values = $data['multiselect_values'];
?>
<div class="input-group">
    <?php if (isset($label) && $label != '') : ?>
        <label><?php echo $label; ?></label>
    <?php endif; ?>
    <div class="multiselect multiselect--radio">
        <div class="multiselect__title">Выберите из списка</div>
        <ul class="multiselect__list">
            <?php foreach ($multiselect_template as $item) : ?>
                <li class="multiselect__item">
                    <label>
                        <input
                                type="checkbox"
                                name="<?= $name ?>[]"
                            <?= in_array($item['slug'], $multiselect_values) ? ' checked ' : ''?>
                                value="<?= $item['slug'] ?>"
                            <?php echo isset($required) && $required ? ' required ' : ' '; ?>
                            <?php echo isset($readonly) && $readonly && isset($value) && $value != '' ? ' readonly ' : ' '; ?>
                        >
                        <?= $item['name'] ?>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
