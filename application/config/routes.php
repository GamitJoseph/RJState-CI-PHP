<?php
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

//admin
$route['CountryCreate'] = "Area/create_country";
$route['CountryList/(:num)']['get'] = "Area/list_country/$1";
$route['CountryList']['get'] = "Area/list_country";
$route['CountryEdit/(:any)']= "Area/edit_country/$1";
$route['CountryDelete/(:any)']= "Area/delete_country/$1";

$route['StateCreate'] = "Area/create_state";
$route['StateList/(:num)']['get'] = "Area/list_state/$1";
$route['StateList']['get'] = "Area/list_state";
$route['StateEdit/(:any)']= "Area/edit_state/$1";
$route['StateDelete/(:any)']= "Area/delete_state/$1";

$route['CityCreate'] = "Area/create_city";
$route['CityList/(:num)']['get'] = "Area/list_city/$1";

$route['CityList']['get'] = "Area/list_city";
$route['CityEdit/(:any)']= "Area/edit_city/$1";
$route['CityDelete/(:any)']= "Area/delete_city/$1";

$route['InquiryList']['get'] = "Customer/list_city";
$route['VisitList']['get'] = "Customer/list_city";


$route['Customers']['get'] = "user/get_customers";
$route['Customers/(:any)']['get'] = "user/get_customers/$1";
$route['Customer_full/(:any)']['get'] = "user/full_customer/$1";
$route['Sellers']['get'] = "user/get_sellers";
$route['Sellers/(:any)']['get'] = "user/get_sellers/$1";
$route['Seller_full/(:any)']['get'] = "user/full_seller/$1";

$route['Admin_Properties']['get'] = "Properties/index";
$route['Admin_Properties/(:any)']['get'] = "Properties/index/$1";
$route['Admin_moreDetail/(:any)']['get'] = "Properties/moreDetail/$1";


$route['is_verify_seller/(:any)/(:any)']['get'] = "user/verify_seller/$1/$2";
$route['is_verify_cust/(:any)/(:any)']['get'] = "user/verify_cust/$1/$2";


//seller
 $route['RJHome']= "Home/index";
 $route['RJSellerHome']= "Seller/index";
 $route['add_Properties']= "Seller/addprop";
 $route['list_Properties']= "Seller/index";
 $route['moreDetail/(:any)']['get'] = "Seller/moreDetail/$1";
 $route['seller_register']= "User/registerseller";
//commen

 $route['logout']= "User/logout";
 $route['login']= "User/index";
 //GamitJoseph-Raivat
//api http://localhost/RJstate/api/Customer/users
 //api/get_user/user1574573622
 // $route['api/get_user/(:any)']= "api/Customer/userby_id/$1";
 // $route['api/get_user']= "api/Customer/userby_id/";
 // $route['api/reg_user']['post']= "api/Customer/user_register/";
  


 //apis
  $route['api/login']['get']= "api/Customer/user_login";
  $route['api/register']['get']= "api/Customer/user_reg";
  $route['api/update_user/(:any)']['get']= "api/Customer/user_update/$1";

  $route['api/countries']['get']= "api/Area/countries";
  $route['api/states/(:any)']['get']= "api/Area/States/$1";
  $route['api/states']['get']= "api/Area/States";
  $route['api/cities/(:any)']['get']= "api/Area/Cities/$1";
  $route['api/cities']['get']= "api/Area/Cities";



$route['default_controller'] = 'User';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
