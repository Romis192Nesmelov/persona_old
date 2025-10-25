<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Base extends CI_Controller
{
    private $utm_source, $utm_term;
    private $widget;
    private $salons, $services;
    private $views_path = '';
    private $project_url = (ENVIRONMENT === 'production') ? 'https://persona-city.ru' : 'http://127.0.0.1:8098/';
    private $project_name = 'Сеть салонов красоты "ПЕРСОНА"';
    private $amp_path = 'amp/';


    private function setWidget(array $query)
    {
        if (!empty($query['widget'])) {
            switch ($query['widget']) {
                case ('shop'):
                    $this->widget = 'shop';
                    break;
                case('online'):
                    $this->widget = 'online';
                    break;
                case('leed'):
                    $this->widget = 'leed';
                    break;
                case('adamas'):
                    $this->widget = 'adamas';
                    break;
                case('journal'):
                    $this->widget = 'journal';
                    break;
                case('sokolov'):
                    $this->widget = 'sokolov';
                    break;
                default:
                    $this->widget = '';
                    break;
            }
        } else {
            $this->widget = '';
        }
    }

    private function getWidget()
    {
        return $this->widget;
    }

    private function setTerm(array $query)
    {
        $utm_term = !empty($_COOKIE['utm_term']) ? $_COOKIE['utm_term'] : false;
        if (!empty($query['utm_term'])) {
            $utm_term = $query['utm_term'];
        }

        if ($utm_term) {
            setcookie('utm_term', $utm_term, time() + 14 * 24 * 60 * 60, '/');
        }
        $this->utm_term = $utm_term;
    }

    private function setUtmSource(array $query)
    {
        $utm_source = !empty($_COOKIE['utm_source']) ? $_COOKIE['utm_source'] : 'seo';
        if (!empty($query['utm_source'])) {
            switch ($query['utm_source']) {
                case('yandex'):
                    $utm_source = 'yandex';
                    break;
                case('google'):
                    $utm_source = 'google';
                    break;
                case('instagram'):
                    $utm_source = 'instagram';
                    break;
                case('yandex_maps'):
                    $utm_source = 'yandex_maps';
                    break;
                case('google_maps'):
                    $utm_source = 'google_maps';
                    break;
                case('2gis'):
                    $utm_source = '2gis';
                    break;
                default:
                    $utm_source = 'seo';
            }
        }
        $this->utm_source = $utm_source;
        setcookie('utm_source', $utm_source, time() + 14 * 24 * 60 * 60, '/');
        return;
    }

    private function getUtm()
    {
        return $this->utm_source;
    }

    private function getTerm()
    {
        return $this->utm_term;
    }

    private function changeSalonNumber($salon)
    {
        switch ($this->getUtm()) {
            case 'yandex':
                $salon['tel'] = !empty($salon['yandex_phone']) ? $salon['yandex_phone'] : $salon['tel'];
                break;
            case 'google':
                $salon['tel'] = !empty($salon['google_phone']) ? $salon['google_phone'] : $salon['tel'];
                break;
            case 'instagram':
                $salon['tel'] = !empty($salon['instagram_phone']) ? $salon['instagram_phone'] : $salon['tel'];
                break;
            case 'yandex_maps':
                $salon['tel'] = !empty($salon['yandex_maps_phone']) ? $salon['yandex_maps_phone'] : $salon['tel'];
                break;
            case 'google_maps':
                $salon['tel'] = !empty($salon['google_maps_phone']) ? $salon['google_maps_phone'] : $salon['tel'];
                break;
            case '2gis':
                $salon['tel'] = !empty($salon['2gis_phone']) ? $salon['2gis_phone'] : $salon['tel'];
                break;
            default:
                break;
        }
        return $salon;

    }

    private function changeSalonsNumbers(array $salons)
    {
        for ($i = 0; $i < count($salons); $i++) {
            $this->changeSalonNumber($salons[$i]['tel']);
        }
        return $salons;
    }

    public function __construct()
    {
        parent::__construct();
        //$this->setLogHeaders();
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->library('session');
        $this->load->library('Pluralform');
        $this->load->model('SeoModel');
        $this->load->model('ServicesModel');
        $this->load->model('SalonsModel');
        $this->load->model('BlocksModel');
        $this->load->model('PriceModel');
        $this->load->model('CostsModel');
        $this->load->model('ArticleModel');
        $this->load->model('OffersModel');
        $this->load->model('MastersModel');
        $this->load->model('VacancyModel');
        $this->load->model('VacancyArticleModel');
        $this->setUtmSource($_GET);
        $this->setTerm($_GET);
        $this->setWidget($_GET);
        $this->salons = $this->changeSalonsNumbers($this->SalonsModel->getSalons('opened'));
        $this->services = $this->ServicesModel->getServices();
    }

    public function getCanonical()
    {
        $canonical = $this->project_url . $_SERVER['REQUEST_URI'];
        switch ($this->views_path) {
            case $this->amp_path:
                $canonical = str_replace('/amp', '', $canonical);
                break;
            default:
                break;
        }
        return $canonical;
    }

    public function getAmpLink()
    {
        if ($this->views_path !== $this->amp_path) {
            return str_replace($this->project_url, $this->project_url . '/amp', $this->getCanonical());
        }
        return '';
    }

    private function show($name, $array = [])
    {
        $this->load->view($this->views_path . $name, $array);
    }

    public function ampIndex()
    {
        $this->views_path = $this->amp_path;
        $this->index();
    }

    public function ampView($key, $key2 = null, $key3 = null)
    {
        $this->views_path = $this->amp_path;
        $this->view($key, $key2, $key3);
    }

    public function ampBlog()
    {
        $this->views_path = $this->amp_path;
        $this->blog();
    }

    public function ampArticle($key = null)
    {
        $this->views_path = $this->amp_path;
        $this->article($key);
    }

    private function getAgreements(){
        $privacy_block = $this->BlocksModel->getBlockData('privacy-policy');
        $personal_data_block = $this->BlocksModel->getBlockData('personal-data-agreement');
        $cookies_block = $this->BlocksModel->getBlockData('cookie-agreement');
        return ['privacy_block' => $privacy_block, 'personal_data_block' => $personal_data_block, 'cookies_block' => $cookies_block];
    }

    public function index()
    {
        $salon = $this->SalonsModel->getSalon('default');
        $this->show('_head', ['amp_link' => $this->getAmpLink(), 'canonical' => $this->getCanonical(), 'seo' => $this->SeoModel->getSalonSeo($salon), 'assets' => 'main', 'salon' => $salon]);
        $this->show('_header', ['salons' => $this->salons, 'utm' => $this->getUtm()]);
        // Loading home data
        $home_block = $this->BlocksModel->getBlockData('home');
        $home_block['count'] = count($this->salons) . ' ' . $this->pluralform->getPluralForm(count($this->salons), 'салон', 'салона', 'салонов');
        $this->show('home', $home_block);
        // Loading salons big grid
        $this->show('_salons-big', ['salons' => $this->salons]);
        // Loading services small grid
        $this->show('_services-small', ['salon' => $salon, 'services' => $this->services]);

        $this->show('_offers', [
            'offers' => $this->OffersModel->getOffers($salon['slug']),
            'salon' => $salon
        ]);
        $this->show('_voucher', [
            'salons' => $this->salons,
            'salon' => $salon,
            'active' => $this->getWidget() == 'shop'
        ]);
        $this->show('_price', [
            'categories' => $this->CostsModel->getCategories(),
            'services' => $this->CostsModel->getAllServices(),
            'style_categories' => $this->CostsModel->getAllStyleCategories(),
            'styles' => $this->CostsModel->getAllStyles(),
            'prices' => $this->CostsModel->getAllPrices(),
        ]);
        $this->show('_masters', [
            'masters' => $this->MastersModel->getSalonMasters(),
            'title' => 'Специалисты салонов красоты Персона',
            'salons' => $this->salons
        ]);
        // Loading about salon block
        $about_block = $this->BlocksModel->getBlockData('seo_main');
        $about_block['adamas'] = $this->getWidget() == 'adamas';
        $about_block['sokolov'] = $this->getWidget() == 'sokolov';
        $about_block['active'] = $this->getWidget() == 'leed';
        $about_block['journal'] = $this->getWidget() == 'journal';
        // Loading Yandex Map and salons
        $this->show('_map', ['salons' => $this->salons]);
        if ($about_block && is_array($about_block)) {
            $this->show('_about', $about_block);
        }

        $this->show('_footer', $this->getAgreements());
        $this->show('_cookies');
        $this->show('_promo_app');
        $this->show('_promo');
        $this->show('_booking', ['active' => $this->getWidget() == 'online']);
        $this->show('_corona');
        $this->show('_foot');
    }

    public function blog()
    {
        $page = isset($_GET['page']) && $_GET['page'] > 1 ? $_GET['page'] : 1;
        $paginator = [];
        $paginator['current'] = (int)$page;
        $paginator['limit'] = 15;
        $paginator['offset'] = $paginator['limit'] * ($paginator['current'] - 1);
        $paginator['count'] = $this->ArticleModel->getCountArticles();
        $paginator['pages'] = $count_pages = ceil($paginator['count'] / $paginator['limit']);
        $articles = $this->ArticleModel->getArticles($paginator['limit'], $paginator['offset']);

        $salon = $this->SalonsModel->getSalon('default');
        $this->show('_head', ['amp_link' => $this->getAmpLink(), 'canonical' => $this->getCanonical(), 'blog' => true, 'seo' => $this->SeoModel->getBlogSeo(), 'assets' => 'main', 'salon' => $salon]);
        $this->show('_blog-header', ['salons' => $this->salons, 'utm' => $this->getUtm(), 'hide_online_link' => false]);

        $this->show('_blog', ['blog' => $articles, 'paginator' => $paginator]);

        $this->show('_map', ['salons' => $this->salons]);
        $this->show('_footer', $this->getAgreements());
        $this->show('_cookies');
        $this->show('_promo_app');
        $this->show('_promo');
        $this->show('_corona');
        $this->show('_booking', ['active' => $this->getWidget() == 'online']);
        $this->show('_foot');
    }

    public function price()
    {
        $salon = $this->SalonsModel->getSalon('default');
        $this->show('_head', ['amp_link' => $this->getAmpLink(), 'canonical' => $this->getCanonical(), 'seo' => $this->SeoModel->getPriceSeo(), 'assets' => 'main', 'salon' => $salon]);
        $this->show('_blog-header', ['salons' => $this->salons, 'utm' => $this->getUtm(), 'hide_online_link' => false]);

        $this->show('_price', [
            'categories' => $this->CostsModel->getCategories(),
            'services' => $this->CostsModel->getAllServices(),
            'style_categories' => $this->CostsModel->getAllStyleCategories(),
            'styles' => $this->CostsModel->getAllStyles(),
            'prices' => $this->CostsModel->getAllPrices(),
        ]);

        $this->show('_map', ['salons' => $this->salons]);
        $this->show('_footer', $this->getAgreements());
        $this->show('_cookies');
        $this->show('_promo_app');
        $this->show('_promo');
        $this->show('_corona');
        $this->show('_booking', ['active' => $this->getWidget() == 'online']);
        $this->show('_foot');
    }

    public function article($key)
    {
        $article_data = $this->ArticleModel->getArticle($key);
        if ($article_data) {
            $article = $article_data[0];
            $salon = $this->SalonsModel->getSalon('default');
            $article['json'] = $this->getArticleJSON($article);
            if (!empty($article['services'])) {
                $services = explode(',', $article['services']);
                $similar_articles = $this->ArticleModel->getSimilarArticles($services);
            } else {
                $similar_articles = [];
            }
            $this->show('_head', ['amp_link' => $this->getAmpLink(), 'article' => $article, 'canonical' => $this->getCanonical(), 'seo' => $this->SeoModel->getArticleSeo($article), 'assets' => 'main', 'salon' => $salon]);
            $this->show('_blog-header', ['salons' => $this->salons, 'utm' => $this->getUtm(), 'hide_online_link' => false]);

            $this->show('_article', ['article' => $article, 'salon' => $this->SalonsModel->getSalon($article['salon_slug']), 'similar_articles' => $similar_articles]);

            $this->show('_map', ['salons' => $this->salons]);
            $this->show('_footer', $this->getAgreements());
            $this->show('_cookies');
            $this->show('_promo_app');
            $this->show('_promo');
            $this->show('_booking', ['active' => $this->getWidget() == 'online']);
            $this->show('_corona');
            $this->show('_foot');
        } else {
            $this->show_404();
        }
    }

    public function validatePhone($phone)
    {
        $phone = preg_replace('/\s|\+|-|\(|\)/', '', $phone);

        if (is_numeric($phone) && mb_strlen($phone) === 11) {
            return true;
        }
        return false;
    }

    public function getArticleJSON($article)
    {
        $info = [];
        $info['@type'] = 'NewsArticle';
        $info['@context'] = 'https://schema.org';
        $info['headline'] = $article['h1'] ? $article['h1'] : $article['title'];
        $info['image'] = [
            $this->project_url . '/media/blog/' . $article['id'] . '/cover.jpg'
        ];
        $datetime = new DateTime($article['date']);
        $info['datePublished'] = $datetime->format(DateTime::ATOM);
        $info['dateModified'] = $datetime->format(DateTime::ATOM);
        if ($this->views_path === $this->amp_path) {
            $info['mainEntityOfPage'] = ['@type' => 'WebPage', '@id' => $this->project_url . '/blog/' . $article['slug']];
            if (!empty($article['master_name'])) {
                $info['author'] = [
                    "@type" => "Person",
                    "name" => $article['master_name']
                ];
            } else {
                $info['author'] = [
                    "@type" => "Organization",
                    "name" => $this->project_name
                ];
            }
            $info['publisher'] = [
                "@type" => "Organization",
                "name" => $this->project_name,
                "logo" => [
                    "@type" => "ImageObject",
                    "url" => $this->project_url . '/media/general/default/article-logo.jpg'
                ]
            ];
        }
        return json_encode($info);
    }

    public function viewOffers()
    {
        $salon = $this->SalonsModel->getSalon('default');
        $this->show('_head', ['amp_link' => $this->getAmpLink(), 'seo' => $this->SeoModel->getOffersSeo(), 'assets' => 'main', 'salon' => $salon]);
        $this->show('_blog-header', ['salons' => $this->salons, 'utm' => $this->getUtm(), 'hide_online_link' => false]);

        $this->show('offers', ['offers' => $this->OffersModel->getSpecialOffers()]);

        $this->show('_map', ['salons' => $this->salons]);
        $this->show('_footer', $this->getAgreements());
        $this->show('_cookies');
        $this->show('_promo_app');
        $this->show('_promo');
        $this->show('_booking', ['active' => $this->getWidget() == 'online']);
        $this->show('_corona');
        $this->show('_foot');
    }

    public function viewPolicy()
    {
        $salon = $this->SalonsModel->getSalon('default');
        $agreements = $this->getAgreements();

        $this->show('_head', ['amp_link' => $this->getAmpLink(), 'seo' => $this->SeoModel->getAgreementSeo($agreements['privacy_block']), 'assets' => 'main', 'salon' => $salon]);
        $this->show('_blog-header', ['salons' => $this->salons, 'utm' => $this->getUtm(), 'hide_online_link' => false]);

        $this->show('policy', $agreements['privacy_block']);

        $this->show('_footer', $agreements);
        $this->show('_cookies');
        $this->show('_promo_app');
        $this->show('_promo');
        $this->show('_booking', ['active' => $this->getWidget() == 'online']);
        $this->show('_corona');
        $this->show('_foot');
    }

    public function viewPersonalDataAgreement()
    {
        $salon = $this->SalonsModel->getSalon('default');
        $agreements = $this->getAgreements();

        $this->show('_head', ['amp_link' => $this->getAmpLink(), 'seo' => $this->SeoModel->getAgreementSeo($agreements['personal_data_block']), 'assets' => 'main', 'salon' => $salon]);
        $this->show('_blog-header', ['salons' => $this->salons, 'utm' => $this->getUtm(), 'hide_online_link' => false]);

        $this->show('policy', $agreements['personal_data_block']);

        $this->show('_footer', $agreements);
        $this->show('_cookies');
        $this->show('_promo_app');
        $this->show('_promo');
        $this->show('_booking', ['active' => $this->getWidget() == 'online']);
        $this->show('_corona');
        $this->show('_foot');
    }

    public function viewCookiesAgreement()
    {
        $salon = $this->SalonsModel->getSalon('default');
        $agreements = $this->getAgreements();

        $this->show('_head', ['amp_link' => $this->getAmpLink(), 'seo' => $this->SeoModel->getAgreementSeo($agreements['cookies_block']), 'assets' => 'main', 'salon' => $salon]);
        $this->show('_blog-header', ['salons' => $this->salons, 'utm' => $this->getUtm(), 'hide_online_link' => false]);

        $this->show('policy', $agreements['cookies_block']);

        $this->show('_footer', $agreements);
        $this->show('_cookies');
        $this->show('_promo_app');
        $this->show('_promo');
        $this->show('_booking', ['active' => $this->getWidget() == 'online']);
        $this->show('_corona');
        $this->show('_foot');
    }

    public function view($key, $key2 = null, $key3 = null)
    {
        if ($key2 == null && $key3 == null) { // If key2 is null then we must load salon or service
            // Trying to get salon by slug
            $salon = $this->SalonsModel->getSalon($key, ['opened', 'invisible'], false);
            if ($salon) { // If such salon exist - load salon views
                $salon = $this->changeSalonNumber($salon);
                $this->show('_head', ['amp_link' => $this->getAmpLink(), 'canonical' => $this->getCanonical(), 'seo' => $this->SeoModel->getSalonSeo($salon), 'assets' => 'salon', 'salon' => $salon]);
                $this->show('_header', ['salons' => $this->salons, 'utm' => $this->getUtm()]);
                $salon_block = $this->BlocksModel->getBlockData('salon');
                $this->show('salon', ['salon' => $salon, 'salon_block' => $salon_block]);
                // Loading services big grid
                $this->show('_services-big', ['salon' => $salon, 'services' => $this->services]);
                $this->show('_offers', [
                    'offers' => $this->OffersModel->getOffers($salon['slug']),
                    'salon' => $salon
                ]);
                $this->show('_voucher', [
                    'salons' => $this->salons,
                    'salon' => $salon,
                    'active' => $this->getWidget() == 'shop'
                ]);
                $this->show('_price', [
                    'categories' => $this->CostsModel->getCategories(),
                    'services' => $this->CostsModel->getAllServices(),
                    'style_categories' => $this->CostsModel->getAllStyleCategories(),
                    'styles' => $this->CostsModel->getAllStyles(),
                    'prices' => $this->CostsModel->getAllPrices(),
                ]);
                // Loading about salon block
                $this->show('_masters', [
                    'masters' => $this->MastersModel->getSalonMasters($salon['slug'], 100),
                    'title' => 'Специалисты салонов красоты Персона',
                    'salons' => $this->salons
                ]);
                $about_block = $this->BlocksModel->getBlockData($salon['slug'] !== 'default' ? $salon['slug'] : '_about', '_about');
                $about_block['salon_slug'] = $salon['slug'];
                $about_block['active'] = $this->getWidget() == 'leed';
                if ($about_block && is_array($about_block)) {
                    $this->show('_about', $about_block);
                }
                // Loading Yandex Map and salons
                $this->show('_map', ['salons' => $this->salons]);
                $this->show('_footer', $this->getAgreements());
                $this->show('_cookies');
                $this->show('_promo_app');
                $this->show('_promo');
                $this->show('_booking', [
                    'active' => $this->getWidget() == 'online',
                    'salon' => $salon,
                    'utm' => $this->getUtm(),
                ]);
                $this->show('_corona');
                $this->show('_foot');
            } else {
                // Trying to get service by slug
                $service = $this->ServicesModel->getService($key);
                //TODO Create $_GET variation
                if ($service) { // If such service exist - load service views
                    //Get default salon data to fill
                    $salon = $this->SalonsModel->getSalon('default');
                    $this->loadService($service, $salon);
                } else {
                    // TODO 404 error
                    $this->show_404();
                }
            }
        } elseif ($key3 == null) {
            // if both keys exist check them for existense and load service page with salon integration
            $salon = $this->SalonsModel->getSalon($key, ['opened', 'invisible'], true);
            $service = $this->ServicesModel->getService($key2);
            if ($salon['slug'] !== 'default' && $service) {
                $salon = $this->changeSalonNumber($salon);
                $this->loadService($service, $salon); //загрузить салон + услуга
            } else {
                $service = $this->ServicesModel->getService($key);
                if ($service) {
                    $styles = $this->ServicesModel->getStyles($service['slug']);
                    $subservice = array_search($key2, array_column($styles, 'slug'));
                    if ($subservice !== false) {
                        $salon = $this->SalonsModel->getSalon('default');
                        $this->loadService($service, $salon, $key2);
                    } else {
                        $this->show_404();
                    }
                } else {
                    $this->show_404();
                }
            }
        } else {
            $salon = $this->SalonsModel->getSalon($key, ['opened', 'invisible'], true);
            $service = $this->ServicesModel->getService($key2);
            $styles = $this->ServicesModel->getStyles($service['slug']);
            $subservice = array_search($key3, array_column($styles, 'slug'));
            if ($salon['slug'] !== 'default' && $service && $subservice !== false) {
                $salon = $this->changeSalonNumber($salon);
                $this->loadService($service, $salon, $key3);
            } else {
                $this->show_404();
            }
        }
    }

    public function show_404()
    {
        header('HTTP/1.0 404 Not Found', true, 404);
        $salon = $this->SalonsModel->getSalon('default');
        $this->show('_head', ['amp_link' => $this->getAmpLink(), 'canonical' => $this->getCanonical(), 'seo' => $this->SeoModel->get404Seo(), 'assets' => 'main', 'salon' => $salon]);
        $this->show('_header', ['salons' => $this->salons, 'utm' => $this->getUtm()]);

        $this->show('_404');


        $this->show('_map', ['salons' => $this->salons]);
        $this->show('_footer', $this->getAgreements());
        $this->show('_cookies');
        $this->show('_promo_app');
        $this->show('_promo');
        $this->show('_corona');
        $this->show('_booking', ['active' => $this->getWidget() == 'online']);
        $this->show('_foot');
    }

    private function loadService($service, $salon, $subservice = null) //салон + услуга

    {
        $service_block = $this->BlocksModel->getBlockData('service');
        // Load service styles
        $styles = $this->ServicesModel->getStyles($service['slug']);
        if (isset($styles) && $subservice !== null) {
            $key = array_search($subservice, array_column($styles, 'slug'));
            if (isset($key)) {
                $style = $styles[$key];
                $service['name'] = $style['h1'];
                $service['h2'] = $style['h2'];
                if ($salon['slug'] !== 'default') {
                    $this->show('_head', ['amp_link' => $this->getAmpLink(), 'canonical' => $this->getCanonical(), 'seo' => $this->SeoModel->getStyleSalonSeo($style, $salon), 'assets' => 'service', 'assets_service' => $service['slug'], 'salon' => $salon]);
                } else {
                    $this->show('_head', ['amp_link' => $this->getAmpLink(), 'canonical' => $this->getCanonical(), 'seo' => $this->SeoModel->getStyleSeo($style), 'assets' => 'service', 'assets_service' => $service['slug'], 'salon' => $salon]);
                }
            }
        } else {
            if ($salon['slug'] !== 'default') {
                $this->show('_head', ['amp_link' => $this->getAmpLink(), 'canonical' => $this->getCanonical(), 'seo' => $this->SeoModel->getServiceSalonSeo($service, $salon), 'assets' => 'service', 'assets_service' => $service['slug'], 'salon' => $salon]);
            } else {
                $this->show('_head', ['amp_link' => $this->getAmpLink(), 'canonical' => $this->getCanonical(), 'seo' => $this->SeoModel->getServiceSeo($service), 'assets' => 'service', 'assets_service' => $service['slug'], 'salon' => $salon]);
            }
        }

        $this->show('_header', ['salons' => $this->salons, 'utm' => $this->getUtm()]);
        $this->show('service', ['service' => $service, 'salon' => $salon, 'block' => $service_block]);
        if (isset($styles) && $subservice !== null) {
            $key = array_search($subservice, array_column($styles, 'slug'));
            if (isset($key)) {
                $this->show('_styles-small', ['salon' => $salon, 'styles' => $styles, 'service' => $service, 'style' => $styles[$key]]);
            }
        } else {
            $need_help_block = $this->BlocksModel->getBlockData('need-help');
            $this->show('_styles', ['salon' => $salon, 'styles' => $styles, 'service' => $service, 'need_help_block' => $need_help_block]);
        }

        // First offer
        $offer = $this->BlocksModel->getBlockData('_offer');
        $this->show('_offer', ['block' => $offer]);
        // Loading about salon block

        // Second offer
        $offer_q = $this->BlocksModel->getBlockData('_offer-q');

        $this->show('_price', [
            'categories' => $this->CostsModel->getCategories(),
            'services' => $this->CostsModel->getAllServices(),
            'style_categories' => $this->CostsModel->getAllStyleCategories(),
            'styles' => $this->CostsModel->getAllStyles(),
            'prices' => $this->CostsModel->getAllPrices(),
        ]);
        $masters_title = '';
        $masters_array = [];
        if ($salon['slug'] !== 'default') {
            $masters_title = 'Специалисты салона красоты Персона ' . $salon['name'];
            $masters_array = $this->MastersModel->getServiceMaster($service['slug'], $salon['slug'], 100);
        } else {
            $masters_title = 'Специалисты салонов красоты Персона';
            $masters_array = $this->MastersModel->getServiceMaster($service['slug']);
        }
        $this->show('_masters', [
            'masters' => $masters_array,
            'title' => $masters_title,
            'salons' => $this->salons
        ]);
        $this->show('_offers', [
            'offers' => $this->OffersModel->getOffers($salon['slug']),
            'salon' => $salon
        ]);
        $this->show('_voucher', [
            'salons' => $this->salons,
            'salon' => $salon,
            'active' => $this->getWidget() == 'shop'
        ]);
        $offerq_title = $subservice !== null ? $style['h2'] : $service['name'];
        $this->show('_offer-q', ['block' => $offer_q, 'offerq_title' => $offerq_title]);
        // Load Yandex Map and salons
        $this->show('_services-big', ['salon' => $salon, 'services' => $this->services]);
        $about_block = $this->BlocksModel->getBlockData($subservice !== null ? $subservice : $service['slug'], '_about');
        $about_block['salon_slug'] = $salon['slug'];
        $this->show('_map', ['salons' => $this->salons, 'id' => 'Salons']);
        if ($about_block && is_array($about_block)) {
            $this->show('_about', $about_block);
        }
        $this->show('_footer', $this->getAgreements());
        $this->show('_promo');
        $this->show('_cookies');
        $this->show('_promo_app');
        $this->show('_booking', ['active' => $this->getWidget() == 'online']);
        $this->show('_corona');
        $this->show('_foot');
    }

    private function formatToLeedForm($message, $type = false)
    {
        if ($type == 'field_service') {
            return '*Заявка на выезд мастера*' . $message;
        } elseif ($type == 'adamas') {
            return '*АДАМАС скидка 20%*' . $message;
        } elseif ($type == 'sokolov') {
            return '*Заявка от клиента SOKOLOV*' . $message;
        } elseif ($type == 'journal') {
            return '*Cкидка 20% ЖУРНАЛ*' . $message;
        } elseif ($type == 'vacancy') {
            return '*Новая заявка на вакансию*' . $message;
        }
        return '*Заявка с persona-city.ru*' . $message;
    }

    private function telegramMessage($message, $chat_id)
    {
        $token = '684302573:AAH_f9OFhbPzOXGeBG7YxoLOLmKMPQsh9E4';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot' . $token . '/sendMessage');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'chat_id=' . $chat_id . '&text=' . urlencode($message) . '&parse_mode=Markdown');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_exec($ch);
        curl_close($ch);
    }

    private function validateCaptcha($token) {
        $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lc9cjYkAAAAAC_O4LkQ2e-o4xS_ggWBTK4VDOFk&response=".$token."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        return $response['success'];
    }

    public function validateTildaToken($key): bool
    {
        return $key === 'P5tJ9ZrknKvg4LscAqamHw';
    }

    public function addLead()
    {
        $domain_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        $http_origin = isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] ? $_SERVER['HTTP_ORIGIN'] : $domain_url;
        header("Content-type: application/json");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Origin: " . $http_origin);
        header("AMP-Access-Control-Allow-Source-Origin: " . $domain_url);
        header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");
        $debug = json_encode(['post' => $_POST, 'server' => $_SERVER]);

        $userAgent = mb_strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');
        if (stripos($userAgent, 'headlesschrome') !== false) {
            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode(['status' => 'ok']);
            exit();
        }

        if (isset($_POST) && $this->validatePhone($_POST['tel']) && ($this->validateCaptcha($_POST['token']) || $this->validateTildaToken($_POST['token']))) {
            $this->load->model('LeadsModel');
            $this->load->model('SalonsModel');
            $lead_data = [];
            $lead_data['name'] = $_POST['name'] ?? 'undefined';
            $lead_data['tel'] = $_POST['tel'] ?? 'undefined';
            $lead_data['salon'] = $_POST['salon'] ?? 'default';
            $lead_data['service'] = $_POST['service'] ?? 'default';
            $lead_data['style'] = $_POST['style'] ?? 'default';
            $lead_data['url'] = $_POST['url'] ?? 'default';
            $lead_data['utm'] = $_POST['utm'] ?? $this->getUtm() ?? 'default';
            $lead_data['term'] = urldecode($this->getTerm()) ?? 'default';
            $lead_data['debug'] = $debug;
            if (!empty($_POST['offer'])) {
                $lead_data['offer'] = $_POST['offer'];
            }

            if ($this->LeadsModel->addLead($lead_data)) {
                $message = '';
                unset($lead_data['url']);
                unset($lead_data['utm']);
                unset($lead_data['term']);
                unset($lead_data['debug']);

                $salon = $this->SalonsModel->getSalon($lead_data['salon']);
                $lead_data['salon'] = $salon['service_name'];

                if (!empty($_POST['field_service'])) {
                    unset($lead_data['style']);
                    $lead_data['datetime'] = $_POST['datetime'] ?? 'Неизвестно';
                }
                if (!empty($_POST['discount'])) {
                    $lead_data['discount'] = 'Скидка на первый визит';
                }
                if (!empty($_POST['master'])) {
                    $lead_data['master'] = $_POST['master'];
                }
                //$lead_data['ip'] = $_SERVER['REMOTE_ADDR'];
                foreach ($lead_data as $key => $value) {
                    $message .= PHP_EOL . '*' . $this->getEmailField($key) . ':* ' . $value;
                }

                if (!empty($_POST['field_service'])) {
                    $message = $this->formatToLeedForm($message, 'field_service');
                } elseif (!empty($_POST['adamas'])) {
                    $message = $this->formatToLeedForm($message, 'adamas');
                } elseif (!empty($_POST['sokolov'])) {
                    $message = $this->formatToLeedForm($message, 'sokolov');
                } elseif (!empty($_POST['journal'])) {
                    $message = $this->formatToLeedForm($message, 'journal');
                } else {
                    $message = $this->formatToLeedForm($message);
                }

                $this->telegramMessage($message, $salon['chat_id']);
                header('Content-Type: application/json');
                http_response_code(200);
                echo json_encode(['status' => 'ok']);
                exit();
            }
        } else {
            header('Content-Type: application/json');
            http_response_code(400);
            echo json_encode(['status' => 'fail']);
            exit();
        }
    }

    private function getEmailField($name)
    {
        switch ($name) {
            case 'about':
                return 'О проекте';
            case 'name':
                return 'Имя';
            case 'tel':
                return 'Телефон';
            case 'url':
                return 'URL';
            case 'file':
                return 'Файл во вложении';
            case 'salon':
                return 'Салон';
            case 'service':
                return 'Услуга';
            case 'style':
                return 'Подуслуга';
            case 'utm':
                return 'Источник';
            case 'term':
                return 'Ключевое слово';
            case 'datetime':
                return 'Дата и время';
            case 'discount':
                return 'Форма';
            case 'offer':
                return 'Акция';
            case 'master':
                return 'Специалист';
            case 'ip':
                return 'IP';
            case 'vacancy':
                return 'Вакансия';
            default:
                return 'undefined';
        }
    }

    public function addVacancyLead()
    {
        $domain_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        $http_origin = isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] ? $_SERVER['HTTP_ORIGIN'] : $domain_url;
        header("Content-type: application/json");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Origin: " . $http_origin);
        header("AMP-Access-Control-Allow-Source-Origin: " . $domain_url);
        header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");
        if (isset($_POST) && $this->validatePhone($_POST['tel']) && ($this->validateCaptcha($_POST['token']) || $this->validateTildaToken($_POST['token']))) {
            $this->load->model('LeadsModel');
            $this->load->model('VacancyModel');
            $lead_data = [];
            $lead_data['name'] = $_POST['name'] ?? 'undefined';
            $lead_data['tel'] = $_POST['tel'] ?? 'undefined';
            $lead_data['url'] = $_POST['url'] ?? 'default';
            $lead_data['utm'] = $_POST['utm'] ?? $this->getUtm() ?? 'default';
            $lead_data['term'] = urldecode($this->getTerm()) ?? 'default';
            $vacancy_data = $this->VacancyModel->getVacancy($_POST['vacancy']);
            $vacancy = $vacancy_data[0];
            $lead_data['vacancy_id'] = $vacancy['id'];

            if ($this->LeadsModel->addVacancyLead($lead_data)) {
                $message_array = [
                    'name' => $lead_data['name'],
                    'tel' => $_POST['tel'],
                    'vacancy' => $vacancy['h1'],
                ];
                $message = '';

                foreach ($message_array as $key => $value) {
                    $message .= PHP_EOL . '*' . $this->getEmailField($key) . ':* ' . $value;
                }

                $message = $this->formatToLeedForm($message, 'vacancy');

                $this->telegramMessage($message, '-1001317825479');
                header('Content-Type: application/json');
                http_response_code(200);
                echo json_encode(['status' => 'ok']);
                exit();
            } else {
                header('Content-Type: application/json');
                http_response_code(400);
                echo json_encode(['status' => $_POST['vacancy']]);
                exit();
            }
        } else {
            header('Content-Type: application/json');
            http_response_code(400);
            echo json_encode(['status' => 'fail']);
            exit();
        }
    }

    public function viewVacanciesList()
    {
        $vacancies = $this->VacancyModel->getVacancies();
        $settings = $this->VacancyModel->getSettings();
        $articles = $this->VacancyArticleModel->getArticles();

        $this->show('_head', ['canonical' => $this->getCanonical(), 'seo' => $this->SeoModel->getVacanciesSeo(), 'assets' => 'main']);
        $this->show('_blog-header', ['salons' => $this->salons, 'utm' => $this->getUtm(), 'hide_online_link' => true]);

        $this->show('_vacancies', ['vacancies' => $vacancies, 'articles' => $articles, 'settings' => $settings]);

        $this->show('_map', ['salons' => $this->salons]);
        $this->show('_footer', $this->getAgreements());
        $this->show('_cookies');
        $this->show('_corona');
        $this->show('_booking', ['active' => $this->getWidget() == 'online']);
        $this->show('_foot');
    }

    public function viewVacancy($key)
    {
        $vacancy_data = $this->VacancyModel->getVacancy($key);
        $settings = $this->VacancyModel->getSettings();
        if ($vacancy_data) {
            $vacancy = $vacancy_data[0];

            $this->show('_head', ['canonical' => $this->getCanonical(), 'seo' => $this->SeoModel->getVacancySeo($vacancy), 'assets' => 'main']);
            $this->show('_blog-header', ['salons' => $this->salons, 'utm' => $this->getUtm(), 'hide_online_link' => true]);

            $this->show('_vacancy', ['vacancy' => $vacancy, 'settings' => $settings]);

            $this->show('_map', ['salons' => $this->salons]);
            $this->show('_footer', $this->getAgreements());
            $this->show('_cookies');
            $this->show('_booking', ['active' => $this->getWidget() == 'online']);
            $this->show('_corona');
            $this->show('_foot');
        } else {
            $this->show_404();
        }
    }

    public function viewVacancyArticle($key)
    {
        $article_data = $this->VacancyArticleModel->getArticle($key);
        if ($article_data) {
            $article = $article_data[0];

            $this->show('_head', ['canonical' => $this->getCanonical(), 'seo' => $this->SeoModel->getVacancyArticleSeo($article), 'assets' => 'main']);
            $this->show('_blog-header', ['salons' => $this->salons, 'utm' => $this->getUtm(), 'hide_online_link' => true]);

            $this->show('_vacancy-article', ['article' => $article]);

            $this->show('_map', ['salons' => $this->salons]);
            $this->show('_footer', $this->getAgreements());
            $this->show('_cookies');
            $this->show('_booking', ['active' => $this->getWidget() == 'online']);
            $this->show('_corona');
            $this->show('_foot');
        } else {
            $this->show_404();
        }
    }
}
