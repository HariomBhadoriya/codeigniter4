<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('login', 'Login::index');
// $routes->post('login/auth', 'Login::auth');
// $routes->get('logout', 'Login::logout');
$routes->get('Admin_dashboard', function () {
    return view('Admin_dashboard');
});
$routes-> post ('profile','Upload::profile');
$routes-> get ('profile','Upload::profile');

$routes->get('changePass/changePassword', 'ChangePass::changePassword'); 
$routes->post('changePass/changePassword', 'ChangePass::changePasswordForm'); 

$routes->post('editProfile', 'Edit::editProfile');
$routes->get('editProfile', 'Edit::editProfile');

$routes->get('admin', 'Admin::index');
$routes-> get('home','Home::index');
$routes-> get('about','Home::index1');

$routes->get('admin_dashboard', 'Admin_dashboard::index');
$routes->get('admin_dashboard/upload_video', 'Admin_dashboard::upload_video');
$routes->post('admin_dashboard/upload_video', 'Admin_dashboard::upload_video');
$routes->get('tutorials', 'Admin_dashboard::manage_videos');

$routes->get('admin_dashboard/delete_video/(:num)', 'Admin_dashboard::delete_video/$1');
$routes->post('admin_dashboard/delete_video/(:num)', 'Admin_dashboard::delete_video/$1');

$routes->get('admin_dashboard/edit_video/(:num)', 'Admin_dashboard::edit_video/$1');
$routes->post('admin_dashboard/update_video/(:num)', 'Admin_dashboard::update_video/$1');

$routes->get('admin/login', 'Admin::login');
$routes->post('admin/auth', 'Admin::auth');
$routes->get('admin/logout', 'Admin::logout');
$routes->get('admin/register', 'Admin::register');
// $routes->get('admin/save-admin', 'Admin::register');
$routes->post('admin/save-admin', 'Admin::saveAdmin');
$routes->get('admin/dashboard', 'Admin::dashboard');
// $routes->post('save-admin', 'Admin::saveAdmin');



$routes->get('contact', 'Contact::index');
$routes->post('contact/store', 'Contact::store');
$routes->get('contact/success', 'Contact::success');

// $routes->get('register', 'Register::index');
// $routes->post('register/store', 'Register::store');
// $routes->get('register/success', 'Register::success');

