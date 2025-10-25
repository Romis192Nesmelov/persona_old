<div class="input-group">
    <?php if (isset($label) && $label != '') : ?>
        <label><?php echo $label; ?></label>
    <?php endif; ?>
    <div class="multiselect">
        <div class="multiselect__title">Выберите из списка</div>
        <ul class="multiselect__list">
            <?php foreach ($radio_list as $item) : ?>
                <li class="multiselect__item">
                    <label>
                        <input type="radio" name="<?= $name ?>" value="<?= $item['slug'] ?>"
                            <?php echo isset($value) && $value === $item['slug'] ? ' checked ' : '' ?>
                            <?php echo isset($required) && $required ? ' required ' : ' '; ?>
                            <?php echo isset($readonly) && $readonly && isset($value) && $value != '' ? ' readonly ' : ' '; ?>>
                        <?= $item['name'] ?>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
