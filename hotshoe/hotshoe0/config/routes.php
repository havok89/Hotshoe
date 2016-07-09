<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['attachments'] = "admin/admin/upload";
$route['admin'] = "admin/admin";
$route['admin/login'] = "admin/admin/login";
$route['admin/login/check'] = "admin/admin/loginCheck";
$route['admin/logout'] = "admin/admin/logout";
$route['admin/clients'] = "admin/clients";
$route['admin/clients/new'] = "admin/clients/addClient";
$route['admin/clients/new/add'] = "admin/clients/confirm";
$route['admin/clients/delete/:any'] = "admin/clients/delete";
$route['admin/clients/edit/:any'] = "admin/clients/editClient";
$route['admin/clients/edited/:any'] = "admin/clients/edited";
$route['admin/clients/forgot'] = 'admin/clients/forgot'; //
$route['admin/clients/:any'] = "admin/clients";
$route['admin/users'] = "admin/users";
$route['admin/users/new'] = "admin/users/addUser";
$route['admin/users/new/add'] = "admin/users/confirm";
$route['admin/users/delete/:any'] = "admin/users/delete";
$route['admin/users/edit/:any'] = "admin/users/editUser";
$route['admin/users/edited/:any'] = "admin/users/edited";
$route['admin/user/forgot'] = 'admin/users/forgot'; //
$route['admin/users/:any'] = "admin/users";
$route['admin/reset/:any'] = 'admin/users/getPassword'; //
$route['admin/galleries'] = "admin/galleries";
$route['admin/galleries/new'] = "admin/galleries/addGal";
$route['admin/galleries/new/add'] = "admin/galleries/confirm";
$route['admin/galleries/delete/:any'] = "admin/galleries/delete";
$route['admin/galleries/edit/:any'] = "admin/galleries/editGal";
$route['admin/galleries/edited/:any'] = "admin/galleries/edited";
$route['admin/galleries/images/:any'] = "admin/galleries/addImages";
$route['admin/galleries/image/upload/:any'] = "admin/galleries/upload";
$route['admin/galleries/:any'] = "admin/galleries";
$route['admin/image/delete/:any'] = "admin/galleries/deleteImage";

$route['admin/settings'] = "admin/admin/settings";
$route['admin/settings/submit'] = "admin/admin/uploadLogo";
$route['admin/settings/update'] = "admin/admin/updateSettings";

$route['login'] = "hotshoe_default/login";
$route['login/check'] = "hotshoe_default/loginCheck";
$route['logout'] = "hotshoe_default/logout";
$route['view/:any'] = "hotshoe_default/gallery";
$route[':any'] = "hotshoe_default";
$route['default_controller'] = "hotshoe_default";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */