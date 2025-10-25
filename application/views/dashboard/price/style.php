<?php
if (!isset($style) || !isset($permissions)) {
    die('Style internal error. Please try again');
}

?>
<section>
    <div>
        <div class="wrp">
            <div class="w-1 row jsfd">
                <h2><?php echo array_key_exists('id', $style) ? 'Редактировать' : 'Добавить'; ?> услугу</h2>
                <div class="w-6-12 row rght cntr-itms">
                    <a class="btn"
                       href="<?php echo base_url(); ?>dashboard/costs/service/<?= $style['price_service_id'] ?>">Вернуться
                        к категории услуг</a>
                    <?php if (array_key_exists('id', $style)) : ?>
                        <?php $this->load->view('widgets/_form-delete', array('delete_path' => 'costs/deleteStyle', 'slug' => $style['id'], 'type' => $style['price_service_id'], 'disabled' => $permissions['price_delete'])); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="w-1">
                <?php
                if (isset($fields)) {
                    if (array_key_exists('id', $style)) {
                        $style['slug'] = $style['id'];
                    }
                    $this->load->view('widgets/_form', array(
                            'fields' => $fields,
                            'data' => $style,
                            'post' => base_url() . 'dashboard/costs/addStyle',
                            'ajax' => 'costs/updateStyle',
                        )
                    );
                }
                ?>
            </div>
            <?php if (array_key_exists('id', $style)) : ?>
            <div class="w-1">
                <h3>Редактировать прайс</h3>
                <?php foreach ($prices as $item) : ?>
                    <form style="display: flex; align-items: center; margin-top: 10px" id="price<?= $item['id'] ?>" name="price" method="post" data-update="/dashboard/costs/updatePrice" data-delete="/dashboard/costs/deletePrice" data-add="/dashboard/costs/addPrice">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <input type="hidden" name="price_style_id" value="<?= $item['price_style_id'] ?>">
                        <input class="price__item" type="number" required name="price" placeholder="Стоимость" value="<?= $item['price'] ?>">
                        <div class="multiselect price__item">
                            <div>Категория мастера</div>
                            <ul class="multiselect__list">
                                <?php foreach ($masters as $master) : ?>
                                    <li class="multiselect__item">
                                        <label>
                                            <input type="radio" name="price_master_id" required value="<?= $master['id'] ?>"
                                                <?= $master['id'] === $item['price_master_id'] ? ' checked ' : '' ?>>
                                            <?= $master['name'] ?>
                                        </label>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <button class="price__btn price__btn--update" type="submit">Обновить</button>
                        <button class="price__btn price__btn--delete" type="button">Удалить</button>
                    </form>
                <?php endforeach; ?>

                <form style="display: flex; align-items: center; margin-top: 10px" id="price-new" name="price-new" method="post" data-update="/dashboard/costs/updatePrice" data-delete="/dashboard/costs/deletePrice" data-add="/dashboard/costs/addPrice">
                    <input type="hidden" name="id">
                    <input type="hidden" name="price_style_id" value="<?= $style['id'] ?>">
                    <input class="price__item" type="number" required name="price" placeholder="Стоимость">
                    <div class="multiselect price__item">
                        <div>Категория мастера</div>
                        <ul class="multiselect__list">
                            <?php foreach ($masters as $master) : ?>
                                <li class="multiselect__item">
                                    <label>
                                        <input type="radio" name="price_master_id" required value="<?= $master['id'] ?>">
                                        <?= $master['name'] ?>
                                    </label>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <button class="price__btn price__btn--add" type="submit">Добавить</button>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
