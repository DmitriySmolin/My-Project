<?php

 include 'geometry/GeometryFigure.php';
 include 'geometry/Triangle.php';
 include 'geometry/Sphere.php';

$params = [
    'figure' => $_GET['figure'],
    // 'action' => $_GET['action']
];

/**@var GeometryFigure $figure */
$figure = new $params['figure']();

echo $figure->getName();

echo '<br>';

echo $figure->getPerimeter();

echo '<br>';

echo $figure->getArea();