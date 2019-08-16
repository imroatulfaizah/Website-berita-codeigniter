<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['news/delete/(:any)'] = 'news/delete/$1';

$route['news/update/(:any)'] = 'news/update/$1';

$route['news/create'] = 'news/create';

$route['news'] = 'news';
$route['news/(:any)'] = 'news/view/$1';

$route['(:any)'] = 'halaman/view/$1';
$route['default_controller'] = 'halaman/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
