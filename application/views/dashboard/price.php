<?php
if (!isset($price) && !isset($permissions)) {
    die('Block internal error');
}

?>
<section>
    <div>
        <div class="wrp">
            <div class="w-1 row jsfd">
                <h2><?= $price_name ?></h2>
            </div>
            <div class="w-1">
                <div class="price price--header">
                    <div class="price__item">Наименование услуги</div>
                    <div class="price__item">Стоимость</div>
                </div>
                <?php foreach ($price as $item) : ?>
                    <form id="price<?= $item['id'] ?>" name="price" class="price" data-delete="/dashboard/deletePrice" data-update="/dashboard/updatePrice" data-add="/dashboard/addPrice">
                        <input type="hidden" name="category" value="<?= $price_category ?>">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <input class="price__item" type="text" required name="name" placeholder="Название услуги" value="<?= $item['name'] ?>">
                        <input class="price__item" type="number" required name="cost" placeholder="1500" value="<?= $item['cost'] ?>">
                        <button class="price__btn price__btn--update" type="submit">Обновить</button>
                        <button class="price__btn price__btn--delete" type="button">Удалить</button>
                    </form>
                <?php endforeach; ?>
                <form id="price-new" name="price-new" class="price" method="post" data-delete="/dashboard/deletePrice" data-update="/dashboard/updatePrice" data-add="/dashboard/addPrice">
                    <input type="hidden" name="category" value="<?= $price_category ?>">
                    <input type="hidden" name="id">
                    <input class="price__item" type="text" required name="name" placeholder="Название услуги">
                    <input class="price__item" type="number" required name="cost" placeholder="1500">
                    <button class="price__btn price__btn--add" type="submit">Добавить</button>
                </form>
            </div>
        </div>
    </div>
</section>