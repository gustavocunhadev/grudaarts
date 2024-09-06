<?php

declare(strict_types=1);

namespace Grudaarts\Mvc\Controller;

use Grudaarts\Mvc\Repository\ProductRepository;
use Grudaarts\Mvc\Repository\AnnouncementRepository;
use PDO;


class AddAnnouncementFormController implements Controller
{

    public function __construct(private AnnouncementRepository $announcementRepository)
    {}

    public function processaRequisicao(): void
    {
        $announcementList = $this->announcementRepository->all();

        $pdo = new PDO("mysql:host=localhost:3306;dbname=grudaarts", 'root', 'gustavo@123');

        $productRepository = new ProductRepository($pdo);

        $productList = $productRepository->all();

        require_once __DIR__ . '/../../views/add-announcement-form.php';
    }

}
