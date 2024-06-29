<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->add('halaman/detail/(:any)/(:alphanum)', 'Halaman::halaman_detail/$1/$2');

$routes->add('halaman/detail/(:num)', 'Halaman::halaman_detail_by_id/$1');
$routes->add('halaman/detail/(:any)', 'Halaman::halaman_detail_by_judul/$1');

$routes->get("halaman/halaman_form", "Halaman::halaman_form_get");
$routes->post("halaman/halaman_form", "Halaman::halaman_form_post");

$routes->group('admin', function ($routes) {
    $routes->add('poster', 'Admin\foto::index');
    $routes->add('general', 'Admin\portofolio::index');
});
