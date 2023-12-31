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

/* start web routes */
$route['news'] = "web/news";
$route['host'] = "web/host";
$route['accommodations'] = "web/accommodations";
$route['contact'] = "web/contact";
/* end web routes */

/* start admin routes */
$route['admin/blog/add'] = "admin/manageBlog";
$route['admin/blog/edit/(:any)'] = "admin/manageBlog/$1";
$route['admin/testimonial/add'] = "admin/manageTestimonial";
$route['admin/pg/manage-colleges/(:any)'] = "admin/managePGColleges/$1";
$route['admin/pg/add'] = "admin/managePG";
$route['admin/pg/edit/(:any)'] = "admin/managePG/$1";
$route['admin/college/add'] = "admin/manageCollege";
$route['admin/college/edit/(:any)'] = "admin/manageCollege/$1";
$route['admin/logout'] = "admin/logout";
$route['admin/login'] = "admin/login";
/* end admin routes */

$route['default_controller'] = 'web';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
