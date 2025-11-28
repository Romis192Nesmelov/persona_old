<?php
/**
 * Copyright (c) 2018.
 * Powered by CheckSanity (https://checksanity.ru)
 * Developed for Prime Production (https://primeproduction.ru)
 */

defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
/* Controllers */
$route['default_controller'] = 'base';
$route['dashboard'] = 'dashboard';
$route['reports'] = 'reports';
/* Dashboard actions */
$route['dashboard/addData'] = 'dashboard/addData';
$route['dashboard/deleteData'] = 'dashboard/deleteData';
/* Dashboard ajax */
$route['dashboard/updateData'] = 'dashboard/updateData';
$route['dashboard/uploadImage'] = 'uploader/uploadImage';
$route['dashboard/uploadMassImage'] = 'uploader/uploadMassImage';
$route['dashboard/deleteImage'] = 'uploader/deleteImage';
$route['dashboard/updateOrder'] = 'dashboard/updateOrder';
$route['dashboard/updateOffer'] = 'offers/updateOffer';
$route['dashboard/addOffer'] = 'offers/addOffer';
$route['dashboard/deleteOffer'] = 'offers/deleteOffer';
/* Salons */
$route['dashboard/salons'] = 'salons';
$route['dashboard/salon'] = 'salons/viewSalon';
$route['dashboard/salons/(:any)'] = 'salons/viewSalon/$1';
$route['dashboard/salon/add'] = 'salons/addData';
/* Services */
$route['dashboard/services'] = 'services';
$route['dashboard/service'] = 'services/viewService';
$route['dashboard/services/(:any)'] = 'services/viewService/$1';
/* Styles */
$route['dashboard/style'] = 'styles/viewStyle';
$route['dashboard/styles/(:any)'] = 'styles/viewStyle/$1';
/* Blocks */
$route['dashboard/blocks'] = 'blocks';
$route['dashboard/block'] = 'blocks/viewBlock';
$route['dashboard/block/(:any)'] = 'blocks/viewBlock/$1';
$route['dashboard/updateBlock'] = 'blocks/updateData';
$route['dashboard/addBlock'] = 'blocks/addData';

/* Offers */
$route['dashboard/offers'] = 'offers';
$route['dashboard/offer'] = 'offers/viewOffer/$1';
$route['dashboard/offer/(:any)'] = 'offers/viewOffer/$1';

/* Price */
$route['dashboard/prices'] = 'price';
$route['dashboard/price'] = 'price/viewPrice';
$route['dashboard/price/(:any)'] = 'price/viewPrice/$1';
$route['dashboard/addPrice'] = 'price/addPrice';
$route['dashboard/updatePrice'] = 'price/updatePrice';
$route['dashboard/deletePrice'] = 'price/deletePrice';

/* Price new */
$route['dashboard/costs'] = 'costs';

$route['dashboard/costs/category'] = 'costs/viewCategory'; //new get
$route['dashboard/costs/category/(:any)'] = 'costs/viewCategory/$1'; //edit get
$route['dashboard/costs/addCategory'] = 'costs/addCategory'; //create post
$route['dashboard/costs/updateCategory'] = 'costs/updateCategory'; //update post
$route['dashboard/costs/deleteCategory'] = 'costs/deleteCategory'; //delete

$route['dashboard/costs/master'] = 'costs/viewMaster'; //new get
$route['dashboard/costs/master/(:any)'] = 'costs/viewMaster/$1'; //edit get
$route['dashboard/costs/addMaster'] = 'costs/addMaster'; //create post
$route['dashboard/costs/updateMaster'] = 'costs/updateMaster'; //update post
$route['dashboard/costs/deleteMaster'] = 'costs/deleteMaster'; //delete

$route['dashboard/costs/service'] = 'costs/viewService'; //new get
$route['dashboard/costs/service/(:any)'] = 'costs/viewService/$1'; //edit get
$route['dashboard/costs/addService'] = 'costs/addService'; //create post
$route['dashboard/costs/updateService'] = 'costs/updateService'; //update post
$route['dashboard/costs/deleteService'] = 'costs/deleteService'; //delete

$route['dashboard/costs/style_category'] = 'costs/viewStyleCategory'; //new get
$route['dashboard/costs/style_category/(:any)'] = 'costs/viewStyleCategory/$1'; //edit get
$route['dashboard/costs/addStyleCategory'] = 'costs/addStyleCategory';
$route['dashboard/costs/updateStyleCategory'] = 'costs/updateStyleCategory';
$route['dashboard/costs/deleteStyleCategory'] = 'costs/deleteStyleCategory';

$route['dashboard/costs/style'] = 'costs/viewStyle'; //new get
$route['dashboard/costs/style/(:any)'] = 'costs/viewStyle/$1'; //edit get
$route['dashboard/costs/addStyle'] = 'costs/addStyle'; //create post
$route['dashboard/costs/updateStyle'] = 'costs/updateStyle'; //update post
$route['dashboard/costs/deleteStyle'] = 'costs/deleteStyle'; //delete

$route['dashboard/costs/prices'] = 'costs/updatePrices';
$route['dashboard/costs/addPrice'] = 'costs/addPrice';
$route['dashboard/costs/updatePrice'] = 'costs/updatePrice';
$route['dashboard/costs/deletePrice'] = 'costs/deletePrice';

/* Articles */
$route['dashboard/articles'] = 'articles';
$route['dashboard/updateArticle'] = 'articles/updateArticle';
$route['dashboard/article'] = 'articles/viewArticle';
$route['dashboard/article/(:any)'] = 'articles/viewArticle/$1';
$route['dashboard/addArticle'] = 'articles/addArticle';
$route['dashboard/deleteArticle'] = 'articles/deleteArticle';

/* Vacancies */
$route['dashboard/vacancies'] = 'vacancies'; // vacancies + articles list
$route['dashboard/vacancies/vacancy'] = 'vacancies/viewVacancy'; // new vacancy (view)
$route['dashboard/vacancies/vacancy/(:any)'] = 'vacancies/viewVacancy/$1'; // view vacancy by id
$route['dashboard/vacancies/addVacancy'] = 'vacancies/addVacancy'; // POST create vacancy
$route['dashboard/vacancies/updateVacancy'] = 'vacancies/updateVacancy'; // POST update vacancy
$route['dashboard/vacancies/deleteVacancy'] = 'vacancies/deleteVacancy'; // POST delete vacancy
$route['dashboard/vacancies/updateSettings'] = 'vacancies/updateSettings'; // POST update vacancies settings
// Vacancies articles
$route['dashboard/vacancies/article'] = 'vacancies/viewArticle'; // new article (view)
$route['dashboard/vacancies/article/(:any)'] = 'vacancies/viewArticle/$1'; // view article by id
$route['dashboard/vacancies/addArticle'] = 'vacancies/addArticle'; // POST create article
$route['dashboard/vacancies/updateArticle'] = 'vacancies/updateArticle'; // POST update article
$route['dashboard/vacancies/deleteArticle'] = 'vacancies/deleteArticle'; // POST delete article


/* Settings */
$route['dashboard/settings'] = 'settings';
/* Leads */
$route['dashboard/leads'] = 'leads';
/* Auth */
$route['auth'] = 'auth';
$route['auth/login'] = 'auth/login';
$route['auth/api_login'] = 'auth/api_login';
$route['auth/logout'] = 'auth/logout';

/* Error log */
$route['reports/(:any)'] = 'reports/newReport/$1';

/* Sync with sycret - only for cli */
$route['sync'] = 'masters/sync/$i';

/* Masters */
$route['dashboard/masters'] = 'masters/showMasters';
$route['dashboard/masters/(:any)'] = 'masters/showMasters/$1';
$route['dashboard/master'] = 'masters/viewMaster';
$route['dashboard/master/(:any)'] = 'masters/viewMaster/$1';
$route['dashboard/addMaster'] = 'masters/addMaster';
$route['dashboard/updateMaster'] = 'masters/updateMaster';
$route['dashboard/deleteMaster'] = 'masters/deleteMaster';

/* Front end */
$route['addLead'] = 'base/addLead';
$route['offers'] = 'base/viewOffers';
$route['policy'] = 'base/viewPolicy';
$route['cookie'] = 'base/viewCookiesAgreement';
$route['personal-data'] = 'base/viewPersonalDataAgreement';
$route['blog'] = 'base/blog';
$route['price'] = 'base/price';
$route['amp/blog'] = 'base/ampBlog';
$route['addVacancyLead'] = 'base/addVacancyLead';
$route['vacancies'] = 'base/viewVacanciesList';
$route['vacancies/(:any)'] = 'base/viewVacancy/$1';
$route['vacancies/blog/(:any)'] = 'base/viewVacancyArticle/$1';
$route['franchise'] = 'base/franchise';
$route['blog/page(:any)'] = 'base/blog/$1';
$route['amp/blog/page(:any)'] = 'base/ampBlog/$1';
$route['blog/(:any)'] = 'base/article/$1';
$route['amp/blog/(:any)'] = 'base/ampArticle/$1';
$route['amp'] = 'base/ampIndex';
$route['amp/(:any)'] = 'base/ampView/$1';
$route['amp/(:any)/(:any)'] = 'base/ampView/$1/$2';
$route['amp/(:any)/(:any)/(:any)'] = 'base/ampView/$1/$2/$3';
$route['(:any)'] = 'base/view/$1';
$route['(:any)/(:any)'] = 'base/view/$1/$2';
$route['(:any)/(:any)/(:any)'] = 'base/view/$1/$2/$3';
