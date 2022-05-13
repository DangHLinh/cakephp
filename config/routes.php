<?php

/**
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes) {
    $routes->setRouteClass(DashedRoute::class);
    /** @var \Cake\Routing\RouteBuilder $routes */
    $routes->connect('/', ['controller' => 'Products', 'action' => 'testQuery']);

    // $routes->connect('/', ['controller' => 'Groups', 'action' => 'index']);
    $routes->connect('/groups/add', ['controller' => 'Groups', 'action' => 'add']);
    $routes->connect('/view/*', ['controller' => 'Contents', 'action' => 'view']);
    $routes->connect('/groups/delete', ['controller' => 'Groups', 'action' => 'delete']);
    $routes->connect('/groups/edit', ['controller' => 'Groups', 'action' => 'edit']);
    $routes->connect('/contents/add', ['controller' => 'Contents', 'action' => 'add']);
    $routes->connect('/contents/delete', ['controller' => 'Contents', 'action' => 'delete']);

    $routes->connect('/products/add', ['controller' => 'Products', 'action' => 'add']);

    $routes->scope('/', function (RouteBuilder $builder) {
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
        $builder->connect('/pages/*', 'Pages::display');
        $builder->fallbacks();
    });



};
