<?php
/**
 * Copyright (c) 2018.
 * Powered by CheckSanity (https://checksanity.ru)
 * Developed for Prime Production (https://primeproduction.ru)
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class FieldsModel extends CI_Model
{
    private $fields = array(
        'salons' => array(
            array(
                'label' => 'Ссылка',
                'type' => 'text',
                'name' => 'slug',
                'placeholder' => 'Например: belyevo',
                'minlength' => '4',
                'maxlength' => '20',
                'required' => true,
                'readonly' => true,
            ),
            array(
                'label' => 'Ближайшее метро',
                'type' => 'text',
                'name' => 'name',
                'placeholder' => 'Например: «БЕЛЯЕВО»',
                'minlength' => '4',
                'maxlength' => '35',
                'required' => true,
                'readonly' => false,
            ),
            array(
                'label' => 'Служебное название',
                'type' => 'text',
                'name' => 'service_name',
                'placeholder' => 'Например: Каширка',
                'minlength' => '4',
                'maxlength' => '60',
                'required' => true,
                'readonly' => false,
            ),
            array(
                'label' => 'Ориентир',
                'type' => 'text',
                'name' => 'address',
                'placeholder' => 'Например: «Капитолий» Беляево',
                'minlength' => '4',
                'maxlength' => '40',
                'required' => true,
                'readonly' => false,
            ),
            array(
                'label' => 'Адрес',
                'type' => 'text',
                'name' => 'address_short',
                'placeholder' => 'Например: Миклухо-Маклая ул., 32 А, ТЦ «Капитолий», 2 этаж',
                'minlength' => '4',
                'maxlength' => '60',
                'required' => true,
                'readonly' => false,
            ),
            array(
                'label' => 'Основной номер + seo',
                'type' => 'tel',
                'name' => 'tel',
                'placeholder' => 'Например: 8(499)490-55-08',
                'minlength' => '17',
                'maxlength' => '17',
                'required' => true,
                'readonly' => false,
            ),
            array(
                'label' => 'Подменник яндекс директ',
                'type' => 'tel',
                'name' => 'yandex_phone',
                'placeholder' => 'Например: 8 (499) 490-55-08',
                'minlength' => '17',
                'maxlength' => '17',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Подменник google adwords',
                'type' => 'tel',
                'name' => 'google_phone',
                'placeholder' => 'Например: 8 (499) 490-55-08',
                'minlength' => '17',
                'maxlength' => '17',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Подменник instagram',
                'type' => 'tel',
                'name' => 'instagram_phone',
                'placeholder' => 'Например: 8 (499) 490-55-08',
                'minlength' => '17',
                'maxlength' => '17',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Подменник yandex карты',
                'type' => 'tel',
                'name' => 'yandex_maps_phone',
                'placeholder' => 'Например: 8 (499) 490-55-08',
                'minlength' => '17',
                'maxlength' => '17',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Подменник 2GIS',
                'type' => 'tel',
                'name' => '2gis_phone',
                'placeholder' => 'Например: 8 (499) 490-55-08',
                'minlength' => '17',
                'maxlength' => '17',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Подменник google карты',
                'type' => 'tel',
                'name' => 'google_maps_phone',
                'placeholder' => 'Например: 8 (499) 490-55-08',
                'minlength' => '17',
                'maxlength' => '17',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Часы работы',
                'type' => 'text',
                'name' => 'working_hours',
                'placeholder' => 'Например: ежедневно 09:00 - 22:00',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false,
            ),
            array(
                'label' => 'Инстаграм',
                'type' => 'text',
                'name' => 'instagram',
                'placeholder' => 'Например: https://www.instagram.com/persona_belyaevo/',
                'minlength' => false,
                'maxlength' => false,
                'required' => false,
                'readonly' => false,
            ),
            array(
                'label' => 'Число работников',
                'type' => 'number',
                'name' => 'workers',
                'placeholder' => 'Например: 9',
                'minlength' => '1',
                'maxlength' => '2',
                'required' => true,
                'readonly' => false,
            ),
            array(
                'label' => 'SEO - title',
                'type' => 'text',
                'name' => 'seo_title',
                'placeholder' => 'Например: Салон красоты метро Римская - «ПЕРСОНА» Площадь Ильича',
                'minlength' => 10,
                'maxlength' => 120,
                'required' => true,
                'readonly' => false,
            ),
            array(
                'label' => 'SEO - description',
                'type' => 'text',
                'name' => 'seo_desc',
                'placeholder' => 'Например: Салон красоты Персона метро Римкая, метро Площадь Ильича, ул. Сергия Радонежского. Стрижки и окрашивание, маникюр и педикюр, визаж и косметологические услуги. Ведущие специалисты, акции и скидки. Полный спектр услуг!',
                'minlength' => 10,
                'maxlength' => 300,
                'required' => true,
                'readonly' => false,
            ),
            array(
                'label' => 'SEO - description (краткое)',
                'type' => 'text',
                'name' => 'seo_desc_short',
                'placeholder' => 'Например: Салон красоты Персона метро Римкая, метро Площадь Ильича, ул. Сергия Радонежского.',
                'minlength' => 10,
                'maxlength' => 300,
                'required' => true,
                'readonly' => false,
            ),
            array(
                'label' => 'SEO - keywords',
                'type' => 'text',
                'name' => 'seo_keywords',
                'placeholder' => 'Например: Салон красоты Персона метро Римкая, метро Площадь Ильича, ул. Сергия Радонежского. Стрижки и окрашивание, маникюр и педикюр, визаж и косметологические услуги. Ведущие специалисты, акции и скидки. Полный спектр услуг!',
                'minlength' => 5,
                'maxlength' => 300,
                'required' => false,
                'readonly' => false,
            ),
            array(
                'label' => 'Ссылка на онлайн запись',
                'type' => 'text',
                'name' => 'online_link',
                'placeholder' => 'Например: https://online3.sycretreg.ru/?SaloonId=704000',
                'minlength' => 5,
                'maxlength' => 250,
                'required' => false,
                'readonly' => false,
            ),
            array(
                'label' => 'Разрешить онлайн запись',
                'name' => 'online',
                'type' => 'radio',
                'values' => array('1' => 'Да', '0' => 'Нет'),
                'required' => true,
            ),
            array(
                'label' => 'Ссылка на онлайн магазин',
                'type' => 'text',
                'name' => 'online_store',
                'placeholder' => 'Например: https://sycret.ru/sale/widget?id=10811',
                'minlength' => 5,
                'maxlength' => 250,
                'required' => false,
                'readonly' => false,
            ),
            array(
                'label' => 'Чат для заявок',
                'type' => 'text',
                'name' => 'chat_id',
                'placeholder' => 'Например: -355561756. Если не знаете, оставьте поле пустым',
                'minlength' => 5,
                'maxlength' => 300,
                'required' => false,
                'readonly' => false,
            ),
            array(
                'label' => 'Координаты по <a href="https://yandex.ru/maps" target="_blank">Яндекс.Картам</a>',
                'name' => 'coordinates',
                'type' => 'text',
                'placeholder' => 'Например: 56.301658, 43.883888',
                'minlength' => 4,
                'maxlength' => 32,
                'required' => true,
                'readonly' => false,
            ),
            array(
                'label' => 'Статус салона',
                'name' => 'status',
                'type' => 'radio',
                'values' => array('opened' => 'Открыт', 'closed' => 'Закрыт', 'invisible' => 'Невидимый'),
                'required' => true,
            ),
            array(
                'type' => 'hidden',
                'name' => 'order_by',
                'readonly' => false,
            ),
            array(
                'type' => 'hidden',
                'name' => 'in_region',
                'readonly' => false,
            ),
            array(
                'type' => 'hidden',
                'name' => 'model',
                'value' => 'salons',
                'readonly' => true,
            )
        ),
        'services' => array(
            array(
                'label' => 'Ссылка',
                'type' => 'text',
                'name' => 'slug',
                'placeholder' => 'Например: haircut-men',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => true
            ),
            array(
                'label' => 'Название',
                'type' => 'text',
                'name' => 'name',
                'placeholder' => 'Например: Мужские стрижки',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Короткое название',
                'type' => 'text',
                'name' => 'name_short',
                'placeholder' => 'Например: Мужские стрижки',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Описание',
                'type' => 'text',
                'name' => 'description',
                'placeholder' => 'Например: Широкий спектр стрижек:...',
                'minlength' => '3',
                'maxlength' => '150',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Категория',
                'type' => 'text',
                'name' => 'what',
                'placeholder' => 'Например: стрижки/услуги',
                'minlength' => '3',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Начальная цена',
                'type' => 'number',
                'name' => 'start_price',
                'placeholder' => 'Например: 1400',
                'minlength' => '3',
                'maxlength' => '6',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Включить консультацию специалиста',
                'name' => 'need_help',
                'type' => 'radio',
                'values' => array('1' => 'Да', '0' => 'Нет'),
                'required' => true,
            ),
            array(
                'label' => 'Выбор подуслуги',
                'type' => 'text',
                'name' => 'select_heading',
                'placeholder' => 'Например: Выбери свой стиль или выбери подуслугу',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'SEO Description',
                'type' => 'text',
                'name' => 'seo_desc',
                'placeholder' => 'Например: Уход за телом и лицом- эпиляция и депиляция, спа процедуры в Москве',
                'minlength' => '4',
                'maxlength' => '200',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'SEO Description - краткое',
                'type' => 'text',
                'name' => 'seo_desc_short',
                'placeholder' => 'Например: Уход за телом и лицом- эпиляция и депиляция, спа процедуры в Москве',
                'minlength' => '4',
                'maxlength' => '200',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'SEO Keywords',
                'type' => 'text',
                'name' => 'seo_keywords',
                'minlength' => '4',
                'maxlength' => '200',
                'placeholder' => 'Например: Уход за лицом, уход за телом, очищающие процедуры, увлажняющие процедуры, омолаживающие процедуры, косметологические услуги',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Включить услугу',
                'name' => 'status',
                'type' => 'radio',
                'values' => array('1' => 'Да', '0' => 'Нет'),
                'required' => true,
            ),
            array(
                'type' => 'hidden',
                'name' => 'order_by',
                'readonly' => false
            ),
            array(
                'type' => 'hidden',
                'name' => 'model',
                'value' => 'services',
                'readonly' => true
            )
        ),
        'styles' => array(
            array(
                'label' => 'Ссылка',
                'type' => 'text',
                'name' => 'slug',
                'placeholder' => 'Например: eyebrows',
                'minlength' => '4',
                'maxlength' => '30',
                'required' => true,
                'readonly' => true
            ),
            array(
                'label' => 'Название',
                'type' => 'text',
                'name' => 'name',
                'placeholder' => 'Например: Услуги для бровей',
                'minlength' => '4',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'SEO Title',
                'type' => 'text',
                'name' => 'title',
                'placeholder' => 'Например: Услуги для бровей',
                'minlength' => '5',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Короткое название',
                'type' => 'text',
                'name' => 'name_short',
                'placeholder' => 'Например: Брови',
                'minlength' => '3',
                'maxlength' => '25',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Описание',
                'type' => 'text',
                'name' => 'description',
                'placeholder' => 'Например: Что-то там',
                'minlength' => '3',
                'maxlength' => '300',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Время на услугу (в минутах)',
                'type' => 'number',
                'name' => 'time',
                'placeholder' => 'Например: 60',
                'minlength' => '1',
                'maxlength' => '3',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Стоимость услуги от (в рублях)',
                'type' => 'number',
                'name' => 'price',
                'minlength' => '2',
                'maxlength' => '7',
                'placeholder' => 'Например: 1400',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Заголовок h1',
                'type' => 'text',
                'name' => 'h1',
                'placeholder' => 'Например: Женская стрижка Ассиметрия',
                'minlength' => '3',
                'maxlength' => '300',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Заголовок h2 (запишись на "название услуги в родительном падеже")',
                'type' => 'text',
                'name' => 'h2',
                'minlength' => '3',
                'maxlength' => '300',
                'placeholder' => 'Например: Женскую стрижку Ассиметрия',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'SEO Description',
                'type' => 'text',
                'name' => 'seo_desc',
                'minlength' => '3',
                'maxlength' => '300',
                'placeholder' => 'Например: Окрашивание Airtouch от ведущих колористов салонов красоты Персона. Выбери свой стиль! Высочайшее качество и колоссальный опыт, уникальные предложения, низкие цены!',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Включить услугу',
                'name' => 'status',
                'type' => 'radio',
                'values' => array('1' => 'Да', '0' => 'Нет'),
                'required' => true,
            ),
            array(
                'type' => 'hidden',
                'name' => 'order_by',
                'readonly' => false
            ),
            array(
                'type' => 'hidden',
                'name' => 'model',
                'value' => 'styles',
                'readonly' => true
            ),
            array(
                'type' => 'hidden',
                'name' => 'slug_service',
                'readonly' => true
            )
        ),
        'offers' => array(
            array(
                'label' => 'Наименование',
                'type' => 'text',
                'name' => 'name',
                'placeholder' => 'Например: Пятницкая парикмахерский зал -10%',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Доступен в салонах',
                'type' => 'multiselect',
                'name' => 'salons',
                'placeholder' => 'Выберите из списка',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Дата окончания',
                'type' => 'date',
                'name' => 'expires',
                'placeholder' => 'Например: 01.01.2021',
                'minlength' => '10',
                'maxlength' => '10',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Включить акцию',
                'name' => 'status',
                'type' => 'radio',
                'values' => array('1' => 'Да', '0' => 'Нет'),
                'required' => true,
            ),
            array(
                'label' => 'Отображать на странице акций',
                'name' => 'special_page',
                'type' => 'radio',
                'values' => array('1' => 'Да', '0' => 'Нет'),
                'required' => true,
            ),
            array(
                'type' => 'hidden',
                'name' => 'slug',
                'readonly' => true
            )
        ),
        'articles' => array(
            array(
                'label' => 'Ссылка',
                'type' => 'text',
                'name' => 'slug',
                'placeholder' => 'Например: jenskiye_strijki',
                'minlength' => '2',
                'maxlength' => '65',
                'required' => true,
                'readonly' => true
            ),
            array(
                'label' => 'SEO Title',
                'type' => 'text',
                'name' => 'title',
                'placeholder' => 'Например: Женские стрижки каскад в салоне красоты Москва',
                'minlength' => '3',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'SEO Description',
                'type' => 'text',
                'name' => 'description',
                'placeholder' => 'Например: Топ-мастер салона «Персона» Мега Химки Григорянц Лиана Расскажет о стрижке «каскад»',
                'minlength' => '3',
                'maxlength' => '200',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Название статьи (h1)',
                'type' => 'text',
                'name' => 'h1',
                'placeholder' => 'Например: Женская Стрижка «Каскад»',
                'minlength' => '3',
                'maxlength' => '110',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Дата публикации',
                'type' => 'date',
                'name' => 'date',
                'placeholder' => 'Например: 01.01.2021',
                'minlength' => '10',
                'maxlength' => '10',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Категория (похожие статьи)',
                'type' => 'multiselect',
                'name' => 'services',
                'placeholder' => 'Выберите из списка',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Имя мастера (необязательно)',
                'type' => 'text',
                'name' => 'master_name',
                'placeholder' => 'Например: Григорянц Лиана',
                'minlength' => '3',
                'maxlength' => '120',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Салон мастера (необязательно)',
                'type' => 'radiobox',
                'name' => 'salon_slug',
                'placeholder' => '',
                'required' => false,
            ),
            array(
                'label' => 'Должность мастера (необязательно)',
                'type' => 'text',
                'name' => 'master_position',
                'placeholder' => 'Например: Топ-мастер имидж-лаборатория «Персона»',
                'minlength' => '3',
                'maxlength' => '120',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Описание мастера (необязательно)',
                'type' => 'text',
                'name' => 'master_description',
                'placeholder' => 'Например: Опыт работы более 24 лет: Студия Keune мастер класс по "Брондированию", Дом Красоты ARKADIа Современные техники окрашивания: Balayage,Shatush, Air touch, Colorchain.',
                'minlength' => '3',
                'maxlength' => '120',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Включить статью',
                'name' => 'status',
                'type' => 'radio',
                'values' => array('1' => 'Да', '0' => 'Нет'),
                'required' => true,
            ),
            array(
                'label' => 'Текст статьи',
                'type' => 'wysiwyg',
                'name' => 'text',
                'images_enabled' => true,
                'images_path' => '/media/articles/',
                'placeholder' => '',
                'minlength' => '1',
                'maxlength' => '100000',
                'required' => true,
                'readonly' => false
            ),
            array(
                'type' => 'hidden',
                'name' => 'id',
                'readonly' => true,
            ),
            array(
                'type' => 'hidden',
                'name' => 'model',
                'value' => 'articles',
                'readonly' => true,
            )
        ),
        'block_home' => array(
            array(
                'type' => 'hidden',
                'name' => 'slug',
                'readonly' => true
            ),
            array(
                'label' => 'Слоган на главной',
                'type' => 'text',
                'name' => 'slogan',
                'placeholder' => 'Например: Красоту творим любовью',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Заголовок h1 на главной',
                'type' => 'text',
                'name' => 'h1_text',
                'placeholder' => 'Например: Сеть салонов красоты Персона',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Текст на кнопке выбора салонов на главной',
                'type' => 'text',
                'name' => 'select_salon_text',
                'placeholder' => 'Например: Выберите салон',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false
            ),
        ),
        'block__about' => array(
            array(
                'type' => 'hidden',
                'name' => 'slug',
                'readonly' => true
            ),
            array(
                'label' => 'Текст галереи',
                'type' => 'text',
                'name' => 'title_gallery',
                'placeholder' => 'Например: галерея салонов',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Заголовок',
                'type' => 'text',
                'name' => 'title',
                'placeholder' => 'Например: О Персоне',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Левый столбец текста',
                'type' => 'textarea',
                'name' => 'quote_1',
                'placeholder' => 'Например: любой укникальный SEO текст до 2000 символов',
                'minlength' => '4',
                'maxlength' => '2000',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Правый столбец текста',
                'type' => 'textarea',
                'name' => 'quote_2',
                'placeholder' => 'Например: любой укникальный SEO текст до 2000 символов',
                'minlength' => '4',
                'maxlength' => '2000',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Автор текста (необязательно)',
                'type' => 'text',
                'name' => 'author',
                'placeholder' => 'Например: Кирилл Бударин, генеральный директор',
                'minlength' => '4',
                'maxlength' => '2000',
                'required' => false,
                'readonly' => false
            ),
        ),
        'block_seo_new' => array(
            array(
                'label' => 'Текст галереи',
                'type' => 'text',
                'name' => 'title_gallery',
                'placeholder' => 'Например: галерея салонов',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Заголовок',
                'type' => 'text',
                'name' => 'title',
                'placeholder' => 'Например: О Персоне',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Левый столбец текста',
                'type' => 'textarea',
                'name' => 'quote_1',
                'placeholder' => 'Например: любой укникальный SEO текст до 2000 символов',
                'minlength' => '4',
                'maxlength' => '2000',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Правый столбец текста',
                'type' => 'textarea',
                'name' => 'quote_2',
                'placeholder' => 'Например: любой укникальный SEO текст до 2000 символов',
                'minlength' => '4',
                'maxlength' => '2000',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Автор текста (необязательно)',
                'type' => 'text',
                'name' => 'author',
                'placeholder' => 'Например: Кирилл Бударин, генеральный директор',
                'minlength' => '4',
                'maxlength' => '2000',
                'required' => false,
                'readonly' => false
            ),
        ),
        'block_privacy-policy' => array(
            array(
                'type' => 'hidden',
                'name' => 'slug',
                'readonly' => true
            ),
            array(
                'label' => 'Заголовок политики',
                'type' => 'text',
                'name' => 'title',
                'placeholder' => 'Например: политика конфиденциальности',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Текст политики',
                'type' => 'textarea',
                'name' => 'text',
                'placeholder' => 'Текст политики',
                'minlength' => '4',
                'maxlength' => '100000',
                'required' => true,
                'readonly' => false
            ),
        ),
        'block_personal-data-agreement' => array(
            array(
                'type' => 'hidden',
                'name' => 'slug',
                'readonly' => true
            ),
            array(
                'label' => 'Заголовок соглашения',
                'type' => 'text',
                'name' => 'title',
                'placeholder' => 'Например: соглашение на обработку персональных данных',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Текст соглашения',
                'type' => 'textarea',
                'name' => 'text',
                'placeholder' => 'Текст соглашения',
                'minlength' => '4',
                'maxlength' => '100000',
                'required' => true,
                'readonly' => false
            ),
        ),
        'block_cookie-agreement' => array(
            array(
                'type' => 'hidden',
                'name' => 'slug',
                'readonly' => true
            ),
            array(
                'label' => 'Заголовок соглашения',
                'type' => 'text',
                'name' => 'title',
                'placeholder' => 'Например: информация об используемых cookie',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Текст соглашения',
                'type' => 'textarea',
                'name' => 'text',
                'placeholder' => 'Текст соглашения',
                'minlength' => '4',
                'maxlength' => '100000',
                'required' => true,
                'readonly' => false
            ),
        ),
        'block_salon' => array(
            array(
                'type' => 'hidden',
                'name' => 'slug',
                'readonly' => true
            ),
            array(
                'label' => 'Заголовок',
                'type' => 'text',
                'name' => 'title',
                'placeholder' => 'Например: Салон красоты',
                'minlength' => '4',
                'maxlength' => '200',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Количество специалистов в салоне',
                'type' => 'number',
                'name' => 'count',
                'placeholder' => 'Например: 200',
                'minlength' => '1',
                'maxlength' => '4',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Текст после количества специалистов',
                'type' => 'text',
                'name' => 'prof',
                'placeholder' => 'Например: профессионалов',
                'minlength' => '4',
                'maxlength' => '30',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Текст после количества недовольных клиентов',
                'type' => 'text',
                'name' => 'client',
                'placeholder' => 'Например: недовольных клиентов',
                'minlength' => '3',
                'maxlength' => '30',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Слоган',
                'type' => 'text',
                'name' => 'slogan',
                'placeholder' => 'Например: красоту творим любовью',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false
            ),
        ),
        'block_service' => array(
            array(
                'type' => 'hidden',
                'name' => 'slug',
                'readonly' => true
            ),
            array(
                'label' => 'Заголовок',
                'type' => 'text',
                'name' => 'title',
                'placeholder' => 'Например: Салон красоты',
                'minlength' => '4',
                'maxlength' => '200',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'profs',
                'type' => 'text',
                'name' => 'profs',
                'placeholder' => 'Например: ',
                'minlength' => '5',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'where',
                'type' => 'text',
                'name' => 'where',
                'placeholder' => 'Например: ',
                'minlength' => '5',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'price',
                'type' => 'text',
                'name' => 'price',
                'placeholder' => 'Например: ',
                'minlength' => '5',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'quality',
                'type' => 'text',
                'name' => 'quality',
                'placeholder' => 'Например: ',
                'minlength' => '5',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'where_text',
                'type' => 'text',
                'name' => 'where_text',
                'placeholder' => 'Например: ',
                'minlength' => '5',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'price_text',
                'type' => 'text',
                'name' => 'price_text',
                'placeholder' => 'Например: ',
                'minlength' => '5',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'quality_text',
                'type' => 'text',
                'name' => 'quality_text',
                'placeholder' => 'Например: ',
                'minlength' => '5',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
        ),
        'block__principles' => array(
            array(
                'type' => 'hidden',
                'name' => 'slug',
                'readonly' => true
            ),
            array(
                'label' => 'Заголовок блока',
                'type' => 'text',
                'name' => 'title',
                'placeholder' => 'Например: 2 принципа для лучшего результата',
                'minlength' => '2',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
        ),
        'block_need-help' => array(
            array(
                'type' => 'hidden',
                'name' => 'slug',
                'readonly' => true
            ),
            array(
                'label' => 'Заголовок',
                'type' => 'text',
                'name' => 'title',
                'placeholder' => '',
                'minlength' => '2',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Текст',
                'type' => 'text',
                'name' => 'text',
                'placeholder' => '',
                'minlength' => '2',
                'maxlength' => '300',
                'required' => true,
                'readonly' => false
            ),
        ),
        'block__masters' => array(
            array(
                'type' => 'hidden',
                'name' => 'slug',
                'readonly' => true
            ),
            array(
                'label' => 'Заголовок блока',
                'type' => 'text',
                'name' => 'title',
                'placeholder' => 'Например - ',
                'minlength' => '2',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Заголовок 1',
                'type' => 'text',
                'name' => 'title_1',
                'placeholder' => '',
                'minlength' => '2',
                'maxlength' => '300',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Текст 1',
                'type' => 'text',
                'name' => 'text_1',
                'placeholder' => '',
                'minlength' => '2',
                'maxlength' => '300',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Заголовок 2',
                'type' => 'text',
                'name' => 'title_2',
                'placeholder' => '',
                'minlength' => '2',
                'maxlength' => '300',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Текст 2',
                'type' => 'text',
                'name' => 'text_2',
                'placeholder' => '',
                'minlength' => '2',
                'maxlength' => '300',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Заголовок 3',
                'type' => 'text',
                'name' => 'title_3',
                'placeholder' => '',
                'minlength' => '2',
                'maxlength' => '300',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Текст 3',
                'type' => 'text',
                'name' => 'text_3',
                'placeholder' => '',
                'minlength' => '2',
                'maxlength' => '300',
                'required' => true,
                'readonly' => false
            ),
        ),
        'block__offer' => array(
            array(
                'type' => 'hidden',
                'name' => 'slug',
                'readonly' => true
            ),
            array(
                'label' => 'Заголовок',
                'type' => 'text',
                'name' => 'title',
                'placeholder' => '',
                'minlength' => '2',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Текст блока',
                'type' => 'text',
                'name' => 'desc',
                'placeholder' => '',
                'minlength' => '2',
                'maxlength' => '300',
                'required' => true,
                'readonly' => false
            ),
        ),
        'block__offer-q' => array(
            array(
                'type' => 'hidden',
                'name' => 'slug',
                'readonly' => true
            ),
            array(
                'label' => 'Заголовок',
                'type' => 'text',
                'name' => 'title',
                'placeholder' => '',
                'minlength' => '2',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Текст',
                'type' => 'text',
                'name' => 'text',
                'placeholder' => '',
                'minlength' => '2',
                'maxlength' => '300',
                'required' => true,
                'readonly' => false
            ),
        ),
        'masters' => array(
            array(
                'label' => 'Имя мастера',
                'type' => 'text',
                'name' => 'name',
                'placeholder' => '',
                'minlength' => '4',
                'maxlength' => '50',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Должность',
                'type' => 'text',
                'name' => 'position',
                'placeholder' => '',
                'minlength' => '2',
                'maxlength' => '40',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Описание',
                'type' => 'text',
                'name' => 'description',
                'placeholder' => '',
                'minlength' => '2',
                'maxlength' => '250',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Отображать на страницах',
                'type' => 'multiselect',
                'name' => 'styles',
                'placeholder' => 'Выберите из списка',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Ссылка на онлайн запись',
                'type' => 'text',
                'name' => 'online_link',
                'placeholder' => 'https://online3.sycretreg.ru/?SaloonId=10811&MasterId=100',
                'minlength' => '2',
                'maxlength' => '250',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Включить синхронизацию с sycret',
                'name' => 'sycret_sync',
                'type' => 'radio',
                'values' => array('1' => 'Да', '0' => 'Нет'),
                'required' => false,
            ),
            array(
                'label' => 'Активен',
                'name' => 'status',
                'type' => 'radio',
                'values' => array('1' => 'Да', '0' => 'Нет'),
                'required' => true,
            ),
            array(
                'type' => 'hidden',
                'name' => 'slug',
                'readonly' => true
            ),
            array(
                'type' => 'hidden',
                'name' => 'sycret_id',
                'readonly' => true
            )
        ),
        'price_categories' => array(
            array(
                'label' => 'Название зала',
                'type' => 'text',
                'name' => 'name',
                'placeholder' => 'Например, парикмахерский зал',
                'minlength' => '3',
                'maxlength' => '80',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Всплывающая информация {i} (необязательно)',
                'type' => 'text',
                'name' => 'information',
                'placeholder' => 'Например, работа с волосами любой сложности...',
                'minlength' => '3',
                'maxlength' => '1000',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Тип специального предложения (необязательно)',
                'type' => 'text',
                'name' => 'offer_type',
                'placeholder' => 'Например, подарок или скидка',
                'minlength' => '3',
                'maxlength' => '80',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Описание специального предложения (необязательно)',
                'type' => 'text',
                'name' => 'offer_text',
                'placeholder' => 'Например, консультация специалиста о состоянии ваших волос и вашем имидже',
                'minlength' => '3',
                'maxlength' => '120',
                'required' => false,
                'readonly' => false
            ),
            array(
                'type' => 'hidden',
                'name' => 'id',
                'readonly' => true,
            ),
        ),
        'price_masters' => array(
            array(
                'label' => 'Категория мастера',
                'type' => 'text',
                'name' => 'name',
                'placeholder' => 'Например, стилист или топ-стилист',
                'minlength' => '3',
                'maxlength' => '80',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Описание категории (необязательно)',
                'type' => 'text',
                'name' => 'description',
                'placeholder' => 'Например, мастер самой высокой категории',
                'minlength' => '3',
                'maxlength' => '120',
                'required' => false,
                'readonly' => false
            ),
            array(
                'type' => 'hidden',
                'name' => 'id',
                'readonly' => true,
            ),
        ),
        'price_services' => array(
            array(
                'label' => 'Название категории услуг',
                'type' => 'text',
                'name' => 'name',
                'placeholder' => 'Например, стрижка',
                'minlength' => '3',
                'maxlength' => '80',
                'required' => true,
                'readonly' => false
            ),
            array(
                'type' => 'hidden',
                'name' => 'id',
                'readonly' => true,
            ),
            array(
                'type' => 'hidden',
                'name' => 'price_category_id',
                'readonly' => true,
            ),
        ),
        'price_style_categories' => array(
            array(
                'label' => 'Название подкатегории услуг',
                'type' => 'text',
                'name' => 'name',
                'placeholder' => 'Например, плеск-системы',
                'minlength' => '3',
                'maxlength' => '150',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Описание подкатегории услуг',
                'type' => 'text',
                'name' => 'description',
                'placeholder' => 'Например, защита и восстановление поврежденных волос',
                'minlength' => '3',
                'maxlength' => '250',
                'required' => false,
                'readonly' => false
            ),
            array(
                'type' => 'hidden',
                'name' => 'id',
                'readonly' => true,
            ),
            array(
                'type' => 'hidden',
                'name' => 'price_service_id',
                'readonly' => true,
            ),
        ),
        'price_styles' => array(
            array(
                'label' => 'Название услуги',
                'type' => 'text',
                'name' => 'name',
                'placeholder' => 'Например, детская стрижка',
                'minlength' => '3',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Длительность, минут (необязательно)',
                'type' => 'text',
                'name' => 'duration',
                'placeholder' => 'Например, 60 или 60-90',
                'minlength' => '1',
                'maxlength' => '100',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Описание услуги (необязательно)',
                'type' => 'text',
                'name' => 'description',
                'placeholder' => 'Например, мытье, стрижка, сушка, укладка...',
                'minlength' => '2',
                'maxlength' => '500',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Информация {i} (необязательно)',
                'type' => 'text',
                'name' => 'information',
                'placeholder' => 'Например, стоимость работы не зависит от длины волос',
                'minlength' => '2',
                'maxlength' => '500',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Специальная информация * (необязательно)',
                'type' => 'text',
                'name' => 'special_information',
                'placeholder' => 'Например, для детей до 5 лет',
                'minlength' => '2',
                'maxlength' => '500',
                'required' => false,
                'readonly' => false
            ),
            array(
                'type' => 'hidden',
                'name' => 'id',
                'readonly' => true,
            ),
            array(
                'type' => 'hidden',
                'name' => 'price_service_id',
                'readonly' => true,
            ),
        ),
        'vacancies_settings' => array(
            array(
                'label' => 'Заголовок страницы (h1)',
                'type' => 'text',
                'name' => 'h1',
                'placeholder' => 'Например: Вакансии в имидж–лаборатории ПЕРСОНА',
                'minlength' => '2',
                'maxlength' => '250',
                'required' => true,
                'readonly' => false,
            ),
            array(
                'label' => 'Подзаголовок страницы',
                'type' => 'text',
                'name' => 'subtitle',
                'placeholder' => 'Например: Присоединяйся к сильнейшей команде специалистов',
                'minlength' => '2',
                'maxlength' => '250',
                'required' => true,
                'readonly' => false,
            ),
            array(
                'label' => 'Номер телефона',
                'type' => 'tel',
                'name' => 'tel',
                'placeholder' => 'Например: +7 (909) 672-87-19',
                'minlength' => '15',
                'maxlength' => '25',
                'required' => true,
                'readonly' => false,
            ),
            array(
                'label' => 'Заголовок блока "Преимущества" (h2)',
                'type' => 'text',
                'name' => 'features_title',
                'placeholder' => 'Например: Ждем талантливых, перспективных и креативных людей!',
                'minlength' => '2',
                'maxlength' => '250',
                'required' => true,
                'readonly' => false,
            ),
            array(
                'label' => 'Заголовок блока "Партнеры" (h2)',
                'type' => 'text',
                'name' => 'partners_title',
                'placeholder' => 'Например: С нами сотрудничают',
                'minlength' => '2',
                'maxlength' => '250',
                'required' => true,
                'readonly' => false,
            ),
        ),
        'vacancies' => array(
            array(
                'label' => 'Ссылка',
                'type' => 'text',
                'name' => 'slug',
                'placeholder' => 'Например: master_manikyura',
                'minlength' => '2',
                'maxlength' => '100',
                'required' => true,
                'readonly' => true
            ),
            array(
                'label' => 'SEO Title',
                'type' => 'text',
                'name' => 'title',
                'placeholder' => 'Например: Работа мастером маникюра в Москве',
                'minlength' => '3',
                'maxlength' => '140',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'SEO Description',
                'type' => 'text',
                'name' => 'description',
                'placeholder' => 'Например: Устроиться на работу мастером маникюра в Москве',
                'minlength' => '3',
                'maxlength' => '200',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Название вакансии (h1)',
                'type' => 'text',
                'name' => 'h1',
                'placeholder' => 'Например: Мастер маникюра',
                'minlength' => '3',
                'maxlength' => '120',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Включить вакансию',
                'name' => 'status',
                'type' => 'radio',
                'values' => array('1' => 'Да', '0' => 'Нет'),
                'required' => true,
            ),
            array(
                'label' => 'Текст в карточке вакансии (необязательно)',
                'type' => 'wysiwyg',
                'name' => 'short_text',
                'images_enabled' => false,
                'placeholder' => '',
                'minlength' => '0',
                'maxlength' => '5000',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Текст "Мы предлагаем" (необязательно)',
                'type' => 'wysiwyg',
                'name' => 'offer',
                'images_enabled' => false,
                'placeholder' => '',
                'minlength' => '0',
                'maxlength' => '5000',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Текст "Ждем от Вас" (необязательно)',
                'type' => 'wysiwyg',
                'name' => 'requirements',
                'images_enabled' => false,
                'placeholder' => '',
                'minlength' => '0',
                'maxlength' => '5000',
                'required' => false,
                'readonly' => false
            ),
            array(
                'label' => 'Текст "Обязанности" (необязательно)',
                'type' => 'wysiwyg',
                'name' => 'responsibilities',
                'images_enabled' => false,
                'placeholder' => '',
                'minlength' => '0',
                'maxlength' => '5000',
                'required' => false,
                'readonly' => false
            ),
            array(
                'type' => 'hidden',
                'name' => 'id',
                'readonly' => true,
            ),
        ),
        'vacancies_articles' => array(
            array(
                'label' => 'Ссылка',
                'type' => 'text',
                'name' => 'slug',
                'placeholder' => 'Например: o-vigoranii',
                'minlength' => '2',
                'maxlength' => '80',
                'required' => true,
                'readonly' => true
            ),
            array(
                'label' => 'SEO Title',
                'type' => 'text',
                'name' => 'title',
                'placeholder' => 'Например: Женские стрижки каскад в салоне красоты Москва',
                'minlength' => '3',
                'maxlength' => '100',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'SEO Description',
                'type' => 'text',
                'name' => 'description',
                'placeholder' => 'Например: Топ-мастер салона «Персона» Мега Химки Григорянц Лиана Расскажет о стрижке «каскад»',
                'minlength' => '3',
                'maxlength' => '200',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Название статьи (h1)',
                'type' => 'text',
                'name' => 'h1',
                'placeholder' => 'Например: Женская Стрижка «Каскад»',
                'minlength' => '3',
                'maxlength' => '110',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Дата публикации',
                'type' => 'date',
                'name' => 'date',
                'placeholder' => 'Например: 01.01.2021',
                'minlength' => '10',
                'maxlength' => '10',
                'required' => true,
                'readonly' => false
            ),
            array(
                'label' => 'Включить статью',
                'name' => 'status',
                'type' => 'radio',
                'values' => array('1' => 'Да', '0' => 'Нет'),
                'required' => true,
            ),
            array(
                'label' => 'Текст статьи',
                'type' => 'wysiwyg',
                'name' => 'text',
                'images_enabled' => true,
                'images_path' => '/media/vacancies_articles/',
                'placeholder' => '',
                'minlength' => '1',
                'maxlength' => '100000',
                'required' => true,
                'readonly' => false
            ),
            array(
                'type' => 'hidden',
                'name' => 'id',
                'readonly' => true,
            ),
        ),
    );

    private $files = array(
        'salons' => array(
            array(
                'title' => 'Фоновое изображение главного экрана',
                'name' => 'bg_ms',
                'max_size' => '320000', // 320kb
                'max_width' => '1200', // 1200px
                'min_width' => '800', // 800px
                'max_height' => '800', // 800px
                'min_height' => '550', // 550px
                'mime' => 'image/jpeg', // jpg, jpeg
                'ext' => 'jpg',
            ),
            array(
                'title' => 'Фоновое изображение блока о мастерах',
                'name' => 'bg_team',
                'max_size' => '100000', // 320kb
                'max_width' => '1920', // 1200px
                'min_width' => '1920', // 800px
                'max_height' => '490', // 800px
                'min_height' => '490', // 550px
                'mime' => 'image/jpeg', // jpg, jpeg
                'ext' => 'jpg',
            ),
            array(
                'name' => 'popup',
                'title' => 'Изображение в модальном окне о салоне',
                'max_size' => '100000', // 100kb
                'max_width' => '250', // 250px
                'min_width' => '225', // 225px
                'max_height' => '425', // 425px
                'min_height' => '390', // 390px
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
            array(
                'name' => 'preview_big',
                'title' => 'Большое превью салона в сетке',
                'max_size' => '30000', // 30kb
                'max_width' => '280', // 280px
                'min_width' => '270', // 270px
                'max_height' => '140', // 140px
                'min_height' => '125', // 125px
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
            array(
                'name' => 'preview_small',
                'title' => 'Маленькое превью салона в сетке',
                'max_size' => '50000', // 50kb
                'max_width' => '100', // 100px
                'min_width' => '100', // 100px
                'max_height' => '100', // 100px
                'min_height' => '100', // 100px
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
        ),
        'photo' => array(
            array(
                'name' => 'photo',
                'title' => 'Фото',
                'max_size' => '500000', // 50kb
                'max_width' => '1920', // 1920px
                'min_width' => '900', // 800px
                'max_height' => '600', // 900px
                'min_height' => '200', // 550px
                'mime' => 'image/jpeg', // jpg, jpeg
                'ext' => 'jpg'
            ),
        ),
        'photo-2' => array(
            array(
                'name' => 'photo-2',
                'title' => 'Фото',
                'max_size' => '500000', // 50kb
                'max_width' => '700', // 1920px
                'min_width' => '400', // 800px
                'max_height' => '700', // 900px
                'min_height' => '400', // 550px
                'mime' => 'image/jpeg', // jpg, jpeg
                'ext' => 'jpg',
            )
        ),
        'services' => array(
            array(
                'name' => 'bg_ms',
                'title' => 'Фоновое изображение главного экрана',
                'max_size' => '320000', // 320kb
                'max_width' => '1920', // 1920px
                'min_width' => '800', // 800px
                'max_height' => '900', // 900px
                'min_height' => '550', // 550px
                'mime' => 'image/jpeg', // jpg, jpeg
                'ext' => 'jpg',
            ),
            array(
                'name' => 'img_ms',
                'title' => 'Изображение главного экрана',
                'max_size' => '300000', // 300kb
                'max_width' => '900', // 900px
                'min_width' => '550', // 500px
                'max_height' => '750', // 750px
                'min_height' => '450', // 450px
                'mime' => 'image/png', // png
                'ext' => 'png' // png
            ),
            array(
                'name' => 'popup_quality',
                'title' => 'Изображение в модальном окне о безупречном качестве',
                'max_size' => '200000', // 100kb
                'max_width' => '250', // 250px
                'min_width' => '210', // 210px
                'max_height' => '420', // 420px
                'min_height' => '390', // 390px
                'mime' => 'image/jpeg', // jpg
                'ext' => 'jpg'
            ),
            array(
                'name' => 'popup_price',
                'title' => 'Изображение в модальном окне о цене',
                'max_size' => '200000', // 100kb
                'max_width' => '250', // 250px
                'min_width' => '210', // 210px
                'max_height' => '420', // 420px
                'min_height' => '390', // 390px
                'mime' => 'image/jpeg', // jpg
                'ext' => 'jpg'
            ),
            array(
                'name' => 'preview_big',
                'title' => 'Большое превью услуги в сетке',
                'max_size' => '300000', // 30kb
                'max_width' => '280', // 280px
                'min_width' => '270', // 270px
                'max_height' => '140', // 140px
                'min_height' => '125', // 125px
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
            array(
                'name' => 'preview_small',
                'title' => 'Маленькое превью услуги в сетке',
                'max_size' => '15000', // 15kb
                'max_width' => '100', // 100px
                'min_width' => '100', // 100px
                'max_height' => '100', // 100px
                'min_height' => '100', // 100px
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
            array(
                'name' => 'before',
                'title' => 'Блок с ползунком "Забота о каждом клиенте"',
                'max_size' => '100000', // 100kb
                'max_width' => '1170', // 1170px
                'min_width' => '1170', // 1170px
                'max_height' => '610', // 610px
                'min_height' => '610', // 610px
                'mime' => 'image/jpeg',
                'ext' => 'jpg'
            ),
            array(
                'name' => 'after',
                'title' => 'Блок с ползунком "Профессиональный мастер"',
                'max_size' => '100000', // 100kb
                'max_width' => '1170', // 1170px
                'min_width' => '1170', // 1170px
                'max_height' => '610', // 610px
                'min_height' => '610', // 610px
                'mime' => 'image/jpeg',
                'ext' => 'jpg'
            ),
        ),
        'styles' => array(
            array(
                'name' => 'popup',
                'title' => 'Изображение в модальном окне услуги',
                'max_size' => '250000',
                'max_width' => '1230', // 1920px
                'min_width' => '1200', // 800px
                'max_height' => '140', // 900px
                'min_height' => '100', // 550px
                'mime' => 'image/jpeg', // jpg, jpeg
                'ext' => 'jpg',
            ),
            array(
                'name' => 'preview_big',
                'title' => 'Большое превью услуги в сетке',
                'max_size' => '200000', // 30kb
                'max_width' => '280', // 280px
                'min_width' => '270', // 270px
                'max_height' => '155', // 140px
                'min_height' => '125', // 125px
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
            array(
                'name' => 'preview_small',
                'title' => 'Маленькое превью услуги в сетке',
                'max_size' => '150000', // 15kb
                'max_width' => '100', // 100px
                'min_width' => '80', // 100px
                'max_height' => '100', // 100px
                'min_height' => '80', // 100px
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
        ),
        'articles' => array(
            array(
                'name' => 'poster',
                'title' => 'Превью в блоге',
                'max_size' => '250000',
                'max_width' => '331',
                'min_width' => '326',
                'max_height' => '366',
                'min_height' => '362',
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
            array(
                'name' => 'cover',
                'title' => 'Превью статьи (SEO AMP)',
                'max_size' => '300000',
                'max_width' => '1200', // 280px
                'min_width' => '1200', // 270px
                'max_height' => '1200', // 140px
                'min_height' => '1200', // 125px
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
            array(
                'name' => 'master',
                'title' => 'Фото мастера',
                'max_size' => '100000', // 50kb
                'max_width' => '240', // 1920px
                'min_width' => '240', // 800px
                'max_height' => '240', // 900px
                'min_height' => '240', // 550px
                'mime' => 'image/jpeg', // jpg, jpeg
                'ext' => 'jpg',
            ),
        ),
        'general' => array(
            array(
                'name' => 'logo',
                'title' => 'Логотип черный',
                'max_size' => '30000', // 30kb
                'max_width' => '600', // 600px
                'min_width' => '500', // 500px
                'max_height' => '90', // 90px
                'min_height' => '100', // 100px
                'mime' => 'image/svg+xml',
                'ext' => 'svg',
            ),
            array(
                'name' => 'logo-w',
                'title' => 'Логотип белый',
                'max_size' => '30000', // 30kb
                'max_width' => '280', // 280px
                'min_width' => '270', // 270px
                'max_height' => '155', // 140px
                'min_height' => '125', // 125px
                'mime' => 'image/svg+xml',
                'ext' => 'svg',
            ),
            array(
                'name' => 'logo-g',
                'title' => 'Логотип серый',
                'max_size' => '30000', // 30kb
                'max_width' => '280', // 280px
                'min_width' => '270', // 270px
                'max_height' => '155', // 140px
                'min_height' => '125', // 125px
                'mime' => 'image/svg+xml',
                'ext' => 'svg',
            ),
            array(
                'name' => 'bg_ms',
                'title' => 'Фон по-умолчанию',
                'max_size' => '300000', // 300kb
                'max_width' => '1170', // 1170px
                'min_width' => '1170', // 1170px
                'max_height' => '600', // 600px
                'min_height' => '556', // 586px
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            )
        ),
        'offers' => array(
            array(
                'name' => 'desktop',
                'title' => 'Изображение для десктопов',
                'max_size' => '300000',
                'max_width' => '1170',
                'min_width' => '1170',
                'max_height' => '400',
                'min_height' => '400',
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
            array(
                'name' => 'tablet',
                'title' => 'Изображение для планшетов',
                'max_size' => '250000',
                'max_width' => '768',
                'min_width' => '768',
                'max_height' => '263',
                'min_height' => '263',
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
            array(
                'name' => 'mobile',
                'title' => 'Изображение для мобильных устройств',
                'max_size' => '200000',
                'max_width' => '576',
                'min_width' => '576',
                'max_height' => '197',
                'min_height' => '197',
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
        ),
        'masters' => array(
            array(
                'name' => 'master',
                'title' => 'Фото мастера',
                'max_size' => '200000',
                'max_width' => '300',
                'min_width' => '300',
                'max_height' => '300',
                'min_height' => '300',
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
        ),
        'price_categories' => array(
            array(
                'name' => 'bg_small',
                'title' => 'Миниатюра категории',
                'max_size' => '250000',
                'max_width' => '525',
                'min_width' => '515',
                'max_height' => '180',
                'min_height' => '170',
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
            array(
                'name' => 'bg_big',
                'title' => 'Изображение категории',
                'max_size' => '300000',
                'max_width' => '1030',
                'min_width' => '1020',
                'max_height' => '230',
                'min_height' => '220',
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            )
        ),
        'price_services' => array(
            array(
                'name' => 'bg',
                'title' => 'Изображение услуги',
                'max_size' => '250000',
                'max_width' => '500',
                'min_width' => '490',
                'max_height' => '180',
                'min_height' => '170',
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
        ),
        'vacancies' => array(
            array(
                'name' => 'poster',
                'title' => 'Превью в списке вакансий',
                'max_size' => '500000',
                'max_width' => '340',
                'min_width' => '320',
                'max_height' => '325',
                'min_height' => '310',
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
            array(
                'name' => 'cover',
                'title' => 'Превью в шапке вакансии',
                'max_size' => '500000',
                'max_width' => '1200',
                'min_width' => '1000',
                'max_height' => '420',
                'min_height' => '400',
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
        ),
        'vacancies_articles' => array(
            array(
                'name' => 'poster',
                'title' => 'Превью в списке',
                'max_size' => '500000',
                'max_width' => '550',
                'min_width' => '450',
                'max_height' => '280',
                'min_height' => '230',
                'mime' => 'image/jpeg',
                'ext' => 'jpg',
            ),
        ),
    );

    public function getFields($slug)
    {
        if (array_key_exists($slug, $this->fields)) {
            return $this->fields[$slug];
        }
        return false;
    }

    public function getFiles($slug)
    {
        if (array_key_exists($slug, $this->files)) {
            return $this->files[$slug];
        }
        return false;
    }

    public function getFile($slug, $name)
    {
        if (array_key_exists($slug, $this->files)) {
            $key = array_search($name, array_column($this->files[$slug], 'name'));
            return $this->files[$slug][$key];
        }

        return false;
    }
}