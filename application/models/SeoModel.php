<?php
/**
 * Copyright (c) 2018.
 * Powered by CheckSanity (https://checksanity.ru)
 * Developed for Prime Production (https://primeproduction.ru)
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class SeoModel extends CI_Model
{
    public function __construct()
    {

    }

    public function getSalonSeo($salon)
    {
        return array(
            'title' => $salon['seo_title'],
            'description' => $salon['seo_desc'],
            'description_short' => $salon['seo_desc_short'],
            'keywords' => $salon['seo_keywords']
        );
    }

    public function getAgreementSeo($agreement)
    {
        return array(
            'title' => $agreement['title'],
            'description' => $agreement['title'],
            'description_short' => $agreement['title'],
            'keywords' => ''
        );
    }

    public function getBlogSeo()
    {
        return array(
            'title' => 'Советы красоты и советы от специалистов салона Персона',
            'description' => 'Блог и статьи о стрижках, окрашивании и уходе для волос, маникюре, педикюре, окрашивании и уходе для бровей. Тренды окрашиваний, стрижек, укладок и дизайна ногтей.',
            'description_short' => 'Блог и статьи о стрижках, окрашивании и уходе для волос, маникюре, педикюре, окрашивании и уходе для бровей. Тренды окрашиваний, стрижек, укладок и дизайна ногтей.и',
            'keywords' => ''
        );
    }

    public function getPriceSeo()
    {
        return array(
            'title' => 'Прайс-лист в салоне красоты Персона',
            'description' => 'Стоимость услуг в салоне красоты Персона',
            'description_short' => 'Стоимость услуг в салоне красоты Персона',
            'keywords' => ''
        );
    }

    public function getOffersSeo()
    {
        return array(
            'title' => 'Акции в сети салонов красоты Персона',
            'description' => 'Скидки на окрашивание, стрижки, маникюр, педикюр, эпиляцию, брови, укладку в салонах красоты Москвы и Санкт-Петербурга',
            'description_short' => 'Блог салонов красоты Персона. Последние статьи и новости',
            'keywords' => ''
        );
    }

    public function getServiceSeo($service)
    {
        return array(
            'title' => $service['name'] . ' в салоне красоты Персона в Москве',
            'description' => $service['seo_desc'],
            'description_short' => $service['seo_desc_short'],
            'keywords' => $service['seo_keywords']
        );
    }

    public function getServiceSalonSeo($service, $salon) {
        return array(
            'title' => $service['name'] . ' в салоне красоты Персона ' . $salon['name'],
            'description' => $service['seo_desc'] . ' Персона ' . $salon['name'],
            'description_short' => $service['seo_desc'] . ' Персона ' . $salon['name'],
            'keywords' => $service['seo_keywords'] . ' Персона ' . $salon['name']
        );
    }

    public function getStyleSeo($style) {
        return array(
            'title' => $style['title'] . ' в салоне красоты Персона в Москве',
            'description' => $style['seo_desc'],
            'description_short' => $style['seo_desc'],
            'keywords' => $style['seo_desc'] . ' Персона '
        );
    }

    public function getStyleSalonSeo($style, $salon) {
        return array(
            'title' => $style['title'] . ' в салоне красоты Персона ' . $salon['name'],
            'description' => $style['seo_desc'] . $salon['name'],
            'description_short' => $style['seo_desc'] . $salon['name'],
            'keywords' => $style['seo_desc'] . ' Персона ' . $salon['name']
        );
    }

    public function getArticleSeo($article) {
        return array(
            'title' => $article['title'],
            'description' => $article['description'],
            'description_short' => $article['description'],
        );
    }

    public function getVacanciesSeo()
    {
        return array(
            'title' => 'Вакансии в сети салонов красоты "Персона" в Москве',
            'description' => 'Вакансии в сети салонов красоты "Персона" в Москве',
            'description_short' => 'Вакансии в сети салонов красоты "Персона" в Москве',
        );
    }

    public function getVacancySeo($vacancy) {
        return array(
            'title' => $vacancy['title'],
            'description' => $vacancy['description'],
            'description_short' => $vacancy['description'],
        );
    }

    public function getVacancyArticleSeo($article) {
        return array(
            'title' => $article['title'],
            'description' => $article['description'],
            'description_short' => $article['description'],
        );
    }

    public function get404Seo() {
        return array(
            'title' => 'Ошибка 404: Страница не найдена',
            'description' => '',
            'description_short' => '',
        );
    }
}



