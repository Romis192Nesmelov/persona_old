<header>
    <div id="Bar">
        <div>
            <a href="<?= base_url(); ?>">Вернуться на сайт</a>
            <a href="<?= base_url(); ?>auth/logout">Выйти</a>
        </div>
    </div>
    <div id="Header">
        <div style="width: 1170px;">
            <nav>
                <a href="<?= base_url(); ?>dashboard/salons" class="<?= $permissions['salons_view'] ? '' : 'disabled'; ?>">
                    <span>Салоны</span>
                </a>
                <a href="<?= base_url(); ?>dashboard/services" class="<?= $permissions['services_view'] ? '' : 'disabled'; ?>">
                    <span>Услуги</span>
                </a>
                <a href="<?= base_url(); ?>dashboard/blocks" class="<?= $permissions['blocks_view'] ? '' : 'disabled'; ?>">
                    <span>Блоки</span>
                </a>
                <a href="<?= base_url(); ?>dashboard/offers" class="<?= $permissions['offers_view'] ? '' : 'disabled'; ?>">
                    <span>Акции</span>
                </a>
                <a href="<?= base_url(); ?>dashboard/articles" class="<?= $permissions['articles_view'] ? '' : 'disabled'; ?>">
                    <span>Статьи</span>
                </a>
                <a href="<?= base_url(); ?>dashboard/masters" class="<?= $permissions['masters_view'] ? '' : 'disabled'; ?>">
                    <span>Мастера</span>
                </a>
                <a href="<?= base_url(); ?>dashboard/costs" class="<?= $permissions['price_view'] ? '' : 'disabled'; ?>">
                    <span>Прайс</span>
                </a>
                <a href="<?= base_url(); ?>dashboard/vacancies" class="<?= $permissions['vacancies_view'] ? '' : 'disabled'; ?>">
                    <span>Вакансии</span>
                </a>
                <a href="<?= base_url(); ?>dashboard/settings" class="<?= $permissions['settings_view'] ? '' : 'disabled'; ?>">
                    <span>Настройки</span>
                </a>
            </nav>
        </div>
    </div>
</header>

<div id="Notifications">
</div>
