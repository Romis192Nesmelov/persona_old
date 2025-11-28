<?php if ($salon['slug'] == 'default') : ?>
    <div class="call__links-container">
        <div class="call__links">
            <p class="call__links-item"><b>Веберите салон</b></p>
            <?php foreach ($salons as $salon_tel) : ?>
                <a href="tel:<?= $salon_tel['tel'] ?>" class="call__links-item">
                    Персона
                    <?= $salon_tel['name'] ?>
                    <br>
                    <?= $salon_tel['tel'] ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>