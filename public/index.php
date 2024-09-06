<?php

declare(strict_types=1);

use Grudaarts\Mvc\Controller\{
    AnnouncementListController,
    LoginController,
    Error404Controller,
    AddAnnouncementController,
    AddProductController
};

use Grudaarts\Mvc\Repository\AnnouncementRepository;
use Grudaarts\Mvc\Repository\ProductRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = new PDO("mysql:host=localhost:3306;dbname=grudaarts", 'root', 'gustavo@123');
$announcementRepository = new AnnouncementRepository($pdo);
$productRepository = new ProductRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';


$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

session_start();
session_regenerate_id();
$isLoginRoute = $pathInfo === '/login';
if(!array_key_exists('logado', $_SESSION) && !$isLoginRoute)
{
    header('Location: /login');
    return;
}



$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];

    $controller = new $controllerClass($announcementRepository, $productRepository);
} else {
    $controller = new Error404Controller();
}
/** @var Controller $controller */
$controller->processaRequisicao();