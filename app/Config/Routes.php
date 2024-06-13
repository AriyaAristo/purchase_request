<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

$routes->get('/', 'AuthController::index');
$routes->get('/login', 'AuthController::index');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::store');

$routes->get('/dashboard', 'DashboardController::index');
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/purchase-requests', 'PurchaseRequestController::index');
    $routes->get('/purchase-requests/create', 'PurchaseRequestController::create');
    $routes->post('/purchase-requests/store', 'PurchaseRequestController::store');
    $routes->post('/purchase-requests/approve/(:num)', 'PurchaseRequestController::approve/$1');
    $routes->post('/purchase-requests/reject/(:num)', 'PurchaseRequestController::reject/$1');
});

$routes->get('/purchase-request/view/(:num)', 'PurchaseRequestController::view/$1');
$routes->get('/purchase-request/download/(:any)', 'PurchaseRequestController::downloadProof/$1');
$routes->get('/purchase-request/report', 'PurchaseRequestController::report');

$routes->get('/officer', 'OfficerController::index');
$routes->get('/officer/create', 'OfficerController::create');
$routes->post('/officer/store', 'OfficerController::store');
$routes->get('/officer/edit/(:num)', 'OfficerController::edit/$1');
$routes->post('/officer/update/(:num)', 'OfficerController::update/$1');
$routes->get('/officer/delete/(:num)', 'OfficerController::delete/$1');

$routes->get('officer', 'PurchaseRequestController::index');
$routes->get('/officer/dashboard', 'OfficerController::dashboard');
$routes->get('/officer/requests', 'OfficerController::index');
$routes->get('officer/create', 'PurchaseRequestController::create');
$routes->post('officer/store', 'PurchaseRequestController::store');
$routes->get('officer/edit/(:num)', 'PurchaseRequestController::edit/$1');
$routes->post('officer/update/(:num)', 'PurchaseRequestController::update/$1');
$routes->get('officer/delete/(:num)', 'PurchaseRequestController::delete/$1');

$routes->get('/manager', 'ManagerController::index');
$routes->get('/manager/approve/(:num)', 'ManagerController::approve/$1');
$routes->get('/manager/approved-requests', 'ManagerController::approvedRequests');
$routes->get('/manager/reject/(:num)', 'ManagerController::reject/$1');
$routes->post('/manager/storeRejection/(:num)', 'ManagerController::storeRejection/$1');

$routes->get('/finance', 'FinanceController::index');
$routes->get('/finance/approve/(:num)', 'FinanceController::approve/$1');
$routes->get('/finance/reject/(:num)', 'FinanceController::reject/$1');
$routes->post('/finance/storeApproval/(:num)', 'FinanceController::storeApproval/$1');
$routes->post('/finance/uploadProof/(:num)', 'FinanceController::uploadProof/$1');
$routes->post('/finance/storeRejection/(:num)', 'FinanceController::storeRejection/$1');
$routes->get('finance/report', 'FinanceController::report');
$routes->post('finance/report/generate', 'FinanceController::generateReport');

$routes->get('/view_request/(:num)', 'PurchaseRequestController::view/$1');
