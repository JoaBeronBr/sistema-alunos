<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/',                'Aluno::index');
$routes->get('alunos',           'Aluno::index');
$routes->get('alunos/novo',      'Aluno::create');
$routes->post('alunos/store',    'Aluno::store');
$routes->get('alunos/editar/(:num)', 'Aluno::edit/$1');
$routes->post('alunos/update/(:num)', 'Aluno::update/$1');
$routes->get('alunos/excluir/(:num)', to: 'Aluno::delete/$1');
$routes->get('/alunos/login',  'Login::index');
$routes->post('/alunos/login', 'Login::login');
$routes->get('/alunos/logout', 'Login::logout');

// Grupo de rotas protegido pelo filtro 'auth' (usuário deve estar logado)
// Note o '' (prefixo vazio) para aplicar ao domínio raiz
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/',        'Aluno::index');
    $routes->get('alunos',   'Aluno::index');
});
