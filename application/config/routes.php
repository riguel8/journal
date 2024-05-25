<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login'] = 'login'; 
$route['admin'] = 'admin';
$route['registration'] = 'registration'; 

// $route['home'] = 'home/index'; 
// $route['home/(:any)'] = 'home/view/$1'; 

// $route['home'] = 'pages/home'; 
// $route['pages/(:any)'] = 'pages/view/$1'; 

$route['submissions'] = 'submissions/index'; 
$route['submissions/(:any)'] = 'submissions/view/$1'; 

$route['articles'] = 'articles/index'; 
$route['articles/add'] = 'articles/add';
$route['view_article'] = 'articles/view_article';
$route['edit'] = 'articles/edit';
$route['articles/update'] = 'articles/update';
$route['articles/update_article'] = 'articles/update_article';
$route['articles/delete'] = 'articles/delete';
$route['articles/download(:any)'] = 'articles/download/$1'; 
$route['articles/(:any)'] = 'articles/view/$1'; 

$route['users'] = 'users/index';
$route['view_details'] = 'users/view_details';
$route['users/update_profile'] = 'users/update_profile';
$route['edit'] = 'users/edit';  
$route['users/add'] = 'users/add';  
$route['users/delete'] = 'users/delete';
$route['users/(:any)'] = 'users/view/$1';

$route['authors'] = 'authors/index'; 
$route['view_details'] = 'authors/view_details';
$route['authors/update_profile'] = 'authors/update_profile';
$route['edit'] = 'authors/edit'; 
$route['authors/add'] = 'authors/add';
$route['authors/add_author'] = 'authors/add_author';
$route['authors/delete'] = 'authors/delete';
$route['authors/(:any)'] = 'authors/view/$1'; 

$route['volumes'] = 'volumes/index'; 
$route['volumes/add'] = 'volumes/add';
$route['volumes/update'] = 'volumes/update';
$route['edit'] = 'volumes/edit';
$route['volumes/delete'] = 'volumes/delete';
$route['volumes/(:any)'] = 'volumes/view/$1'; 

$route['view_details'] = 'pages/view_details';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1'; 

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// ADMIN
// $route['admin/articles'] = 'admin/articles/index'; 
// $route['admin/articles/add'] = 'admin/articles/add';
// $route['admin/articles/update'] = 'admin/articles/update';
// $route['admin/edit'] = 'admin/articles/edit';
// $route['admin/articles/delete'] = 'admin/articles/delete';
// $route['admin/articles/download(:any)'] = 'admin/articles/download/$1'; 
// $route['admin/articles/(:any)'] = 'admin/articles/view/$1'; 

// $route['admin/users'] = 'admin/users/index';
// $route['admin/view_details'] = 'admin/users/view_details';
// $route['admin/users/update_profile'] = 'admin/users/update_profile';
// $route['admin/edit'] = 'admin/users/edit';  
// $route['admin/users/add'] = 'admin/users/add';  
// $route['admin/users/delete'] = 'admin/users/delete';
// $route['admin/users/(:any)'] = 'admin/users/view/$1';

// $route['admin/authors'] = 'admin/authors/index'; 
// $route['admin/view_details'] = 'admin/authors/view_details';
// $route['admin/authors/update_profile'] = 'admin/authors/update_profile';
// $route['admin/edit'] = 'admin/authors/edit'; 
// $route['admin/authors/add'] = 'admin/authors/add';
// $route['admin/authors/delete'] = 'admin/authors/delete';
// $route['admin/authors/(:any)'] = 'admin/authors/view/$1'; 

// $route['admin/volumes'] = 'admin/volumes/index'; 
// $route['admin/volumes/add'] = 'admin/volumes/add';
// $route['admin/volumes/update'] = 'admin/volumes/update';
// $route['admin/edit'] = 'volumes/edit';
// $route['admin/volumes/delete'] = 'admin/volumes/delete';
// $route['admin/volumes/(:any)'] = 'admin/volumes/view/$1'; 
