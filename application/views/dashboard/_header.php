<?php
?>

<header>
    <div id="Bar">
        <div>
            <a href="<?php echo base_url(); ?>">Вернуться на сайт</a>
            <a href="<?php echo base_url(); ?>auth/logout">Выйти</a>
        </div>
    </div>
    <div id="Header">
        <div style="width: 1170px;">
            <nav>
                <a href="<?php echo base_url(); ?>dashboard/salons" class="<?php echo $permissions['salons_view'] ? '' : 'disabled'; ?>">
                    <span>Салоны</span>
                </a>
                <a href="<?php echo base_url(); ?>dashboard/services" class="<?php echo $permissions['services_view'] ? '' : 'disabled'; ?>">
                    <span>Услуги</span>
                </a>
                <a href="<?php echo base_url(); ?>dashboard/blocks" class="<?php echo $permissions['blocks_view'] ? '' : 'disabled'; ?>">
                    <span>Блоки</span>
                </a>
                <a href="<?php echo base_url(); ?>dashboard/offers" class="<?php echo $permissions['offers_view'] ? '' : 'disabled'; ?>">
                    <span>Акции</span>
                </a>
                <a href="<?php echo base_url(); ?>dashboard/articles" class="<?php echo $permissions['articles_view'] ? '' : 'disabled'; ?>">
                    <span>Статьи</span>
                </a>
                <a href="<?php echo base_url(); ?>dashboard/masters" class="<?php echo $permissions['masters_view'] ? '' : 'disabled'; ?>">
                    <span>Мастера</span>
                </a>
                <a href="<?php echo base_url(); ?>dashboard/costs" class="<?php echo $permissions['price_view'] ? '' : 'disabled'; ?>">
                    <span>Прайс</span>
                </a>
                <a href="<?php echo base_url(); ?>dashboard/vacancies" class="<?php echo $permissions['vacancies_view'] ? '' : 'disabled'; ?>">
                    <span>Вакансии</span>
                </a>
                <a href="<?php echo base_url(); ?>dashboard/settings" class="<?php echo $permissions['settings_view'] ? '' : 'disabled'; ?>">
                    <span>Настройки</span>
                </a>
            </nav>
        </div>
    </div>
</header>

<div id="Notifications">
</div>
