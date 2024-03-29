<?php
//
/**
 * ClassController:actionName
 *
 * ClassController -- Класс, находящийся в папке controllers
 * actionName -- Функция класса
 * : -- сапаратор (который делит две переменные в одной строке)
 */
$routing = [
    '/' => 'SiteController:index', /** @see SiteController */ /** @see SiteController::actionIndex() */
    '/foo' => 'FooController:index', /** @see FooController */ /** @see FooController::actionIndex() */
    '/foo/test' => 'FooController:test',
    '/api/v1/user/get' => 'UserController:get',
    '/api/v1/user/list' => 'UserController:list'
];

// $routing_2 = [
//     '/' => [
//         'controller' => SiteController::class,
//         'action' => 'actionIndex',
//         'query' => [
//             'foo' => 'bar'
//         ]
//     ]
// ];
