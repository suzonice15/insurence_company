<?php
defined('BASEPATH') OR exit('No direct script access allowed');





/************************ login  ************************/
$route['default_controller'] = 'UserController';


$route['admin'] = 'UserController';
$route['dashboard'] = 'DashboardController';
$route['login-check'] = 'UserController/loginCheck';
$route['logout'] = 'UserController/logOut';
/************************ user  ************************/

$route['users'] = 'user/UserController/index';
$route['user-create'] = 'user/UserController/create';
$route['user-save'] = 'user/UserController/store';
$route['user-update'] = 'user/UserController/update';
$route['user-edit/(:any)'] = 'user/UserController/edit/$1';
$route['logout'] = 'UserController/logOut';



/****************************** setting ***************************************/

$route['setting-default'] = 'setting/SettingController/default_setting';
$route['setting-home'] = 'setting/SettingController/home';

/****************************** Customer ***************************************/
//
//$route['page-list'] = 'page/PageController/index';
//$route['page-create'] = 'page/PageController/create';
//$route['page-save'] = 'page/PageController/store';
$route['customer-edit/(:any)'] = 'customer/CustomerController/edit/$1';
$route['customer_information'] = 'customer/CustomerController/customer_information';
$route['notification-edit/(:any)'] = 'customer/CustomerController/notification_edit/$1';
$route['customer-show/(:any)'] = 'customer/CustomerController/show/$1';
$route['customer-update'] = 'customer/CustomerController/customer_update';
$route['notification-update'] = 'customer/CustomerController/notification_update';
$route['customer-delete/(:any)'] = 'customer/CustomerController/destroy/$1';




/********************************* website          *********************************/


$route['chechout'] = 'Home/checkout';
$route['checkout/thank-you'] = 'Home/thank_you';
$route['category/(:any)'] = 'Home/category/$1';
$route['product/(:any)'] = 'Home/product/$1';
$route['pages/(:any)'] = 'Home/pages/$1';
$route['search'] = 'Home/search';
$route['all-products'] = 'Home/all_products';







//$route['404_override'] = 'Custom404';
$route['translate_uri_dashes'] = FALSE;
