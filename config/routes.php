<?php

declare(strict_types=1);

return [
    'GET|/' => Grudaarts\Mvc\Controller\AnnouncementListController::class,
    'GET|/login' => Grudaarts\Mvc\Controller\LoginController::class,
    'GET|/seller' => Grudaarts\Mvc\Controller\SellerController::class,
    'GET|/delete-announcement' => Grudaarts\Mvc\Controller\DeleteAnnouncementController::class,
];
