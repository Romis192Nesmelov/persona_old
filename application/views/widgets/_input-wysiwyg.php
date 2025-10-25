<?php if (isset($data) && isset($data['id'])) : ?>
    <div class="input-group">
        <?php if (isset($label) && $label != '') : ?>
            <label><?php echo $label; ?></label>
        <?php endif; ?>
        <div class="w-buttons">
            <button data-name="<?= $name ?>" data-type="p" data-tooltip="Параграф" class="w-js" type="button"></button>
            <button data-name="<?= $name ?>" data-type="bold" data-tooltip="Жирный текст" class="w-js" type="button"></button>
            <button data-name="<?= $name ?>" data-type="italic" data-tooltip="Наклонный текст" class="w-js" type="button"></button>
            <button data-name="<?= $name ?>" data-type="underline" data-tooltip="Подчеркнутый текст" class="w-js" type="button"></button>
            <button data-name="<?= $name ?>" data-type="heading" data-tooltip="Обычный заголовок" class="w-js" type="button"></button>
            <button data-name="<?= $name ?>" data-type="h2" data-tooltip="Заголовок H2" class="w-js" type="button"></button>
            <button data-name="<?= $name ?>" data-type="h3" data-tooltip="Заголовок H3" class="w-js" type="button"></button>
            <button data-name="<?= $name ?>" data-type="ul" data-tooltip="Ненумерованный список" class="w-js" type="button"></button>
            <button data-name="<?= $name ?>" data-type="ol" data-tooltip="Нумерованный список" class="w-js" type="button"></button>
            <button data-name="<?= $name ?>" data-type="item" data-tooltip="Элемент списка" class="w-js" type="button"></button>
            <?php if (!empty($images_enabled) && !empty($images_path)) :?>
                <button data-name="<?= $name ?>" data-type="group" data-tooltip="Группа изображений" class="w-js" type="button"></button>
                <button data-name="<?= $name ?>" data-type="img" data-tooltip="Изображение из галереи" class="w-js" type="button"></button>
            <?php endif; ?>
        </div>
        <textarea
                class="wysiwyg"
                data-image_path="<?= !empty($images_path) ? $images_path : '' ?>"
                data-id="<?= $data['id'] ?>"
                name="<?php echo isset($name) ? $name : ''; ?>"
                placeholder="<?php echo isset($placeholder) ? $placeholder : ''; ?>"
                minlength="<?php echo isset($minlength) ? $minlength : ' '; ?>"
                maxlength="<?php echo isset($maxlength) ? $maxlength : ' '; ?>"
        <?php echo isset($required) && $required ? ' required ' : ' '; ?>
            <?php echo isset($readonly) && $readonly && isset($value) && $value != '' ? ' readonly ' : ' '; ?>
    ><?php echo isset($value) ? $value : ''; ?></textarea>
    </div>
<?php endif ?>

