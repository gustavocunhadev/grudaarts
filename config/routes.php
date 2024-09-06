<?php

declare(strict_types=1);

return [
    'GET|/' => Grudaarts\Mvc\Controller\AnnouncementListController::class,
    'GET|/seller' => Grudaarts\Mvc\Controller\SellerController::class,
    'GET|/delete-announcement' => Grudaarts\Mvc\Controller\DeleteAnnouncementController::class,
    'GET|/add-announcement-form' => Grudaarts\Mvc\Controller\AddAnnouncementFormController::class,
    'GET|/add-product-form' => Grudaarts\Mvc\Controller\AddProductFormController::class,
    'POST|/add-announcement' => Grudaarts\Mvc\Controller\AddAnnouncementController::class,
    'POST|/add-product' => Grudaarts\Mvc\Controller\AddProductController::class,
    'GET|/delete-product' => Grudaarts\Mvc\Controller\DeleteProductController::class,
    'GET|/update-product-form' => Grudaarts\Mvc\Controller\UpdateProductFormController::class,
    'POST|/update-product' => Grudaarts\Mvc\Controller\UpdateProductController::class,
    'GET|/update-announcement-form' => Grudaarts\Mvc\Controller\UpdateAnnouncementFormController::class,
    'POST|/update-announcement' => Grudaarts\Mvc\Controller\UpdateAnnouncementController::class,
    'GET|/login' => Grudaarts\Mvc\Controller\LoginFormController::class,
    'POST|/login' => Grudaarts\Mvc\Controller\LoginController::class,
    'GET|/logout' => Grudaarts\Mvc\Controller\LogoutController::class,
    
];
