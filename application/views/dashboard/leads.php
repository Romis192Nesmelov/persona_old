<?php if (isset($leads) && $leads) : ?>
    <section>
        <div>
            <div class="wrp">
                <div class="table">
                    <div class="row">
                        <div class="cell">ID</div>
                        <div class="cell">Имя</div>
                        <div class="cell">Телефон</div>
                        <div class="cell">Салон</div>
                        <div class="cell">Услуга</div>
                        <div class="cell">Подуслуга</div>
                        <div class="cell">Время</div>
                        <div class="cell">Ссылка</div>
                    </div>
                    <?php foreach ($leads as $lead) : ?>
                        <div class="row">
                            <?php foreach ($lead as $key => $val) : ?>
                                <div class="cell"><?php echo $val; ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
