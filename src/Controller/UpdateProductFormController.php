<?php

declare(strict_types=1);

namespace Grudaarts\Mvc\Controller;

use Grudaarts\Mvc\Repository\AnnouncementRepository;
use Grudaarts\Mvc\Repository\ProductRepository;

use PDO;

class UpdateProductFormController
{

    public function __construct(private AnnouncementRepository $announcementRepository)
    {}

    public function processaRequisicao(): void
    {

        $id = filter_input(INPUT_GET,"id", FILTER_VALIDATE_INT);

        $pdo = new PDO("mysql:host=localhost:3306;dbname=grudaarts", 'root', 'gustavo@123');

        $productRepository = new ProductRepository($pdo);
        
        $product = $productRepository->find($id);
        require_once __DIR__ . '/../../views/update-product-form.php';
    }

}
