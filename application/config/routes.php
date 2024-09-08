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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['auth/login'] = 'Login';
$route['auth/logout'] = 'Login/Logout';
$route['auth/register/member'] = 'Login/registerMemberbang';

$route['app/dashboard'] = 'App';uProfile
$route['app/setting/profile'] = 'App/uProfile';
$route['app/pembayaran-kas'] = 'App/trxKas';
$route['app/action/pembayaran-kas']['post'] = 'App/trxKas';
$route['app/master/user'] = 'App/masterUser';
$route['app/acc/user/newmember/(:any)'] = 'App/approveMember/$1';
$route['app/add/member']['post'] = 'App/masterUser';
$route['app/master/register-pamdi'] = 'App/masterRegform';

$route['management/view/register/(:any)'] = 'Preview/previewRegister/$1';

$route['management/process/register/(:any)']['post'] = 'Preview/previewRegister/$1';




$route['v1/api/get/agama'] = 'Api/getAgama';
$route['v1/api/get/profesi'] = 'Api/getProfesi';
$route['v1/api/get/gender'] = 'Api/getGender';
$route['v1/api/get/provinsi'] = 'Api/getProv';
$route['v1/api/get/kabupaten-kota'] = 'Api/getKabkot';

$route['v1/api/create-member']['post'] = 'Api/registerMember';

$route['v1/api/work/record'] = 'Api/getDataip';