<?php

declare(strict_types=1);

namespace Grudaarts\Mvc\Controller;

use Grudaarts\Mvc\Repository\AnnouncementRepository;
use Grudaarts\Mvc\Repository\ProductRepository;

use Grudaarts\Mvc\Entity\Product;
use Grudaarts\Mvc\Entity\Announcement;
use PDO;

class AddAnnouncementController
{

    public function __construct(private AnnouncementRepository $announcementRepository)
    {}

    public function processaRequisicao(): void
    {
        $idProduct = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $product = filter_input(INPUT_POST, 'product');
        $title = filter_input(INPUT_POST, 'title');
        $description = filter_input(INPUT_POST, 'description');
        $promocionalPrice = filter_input(INPUT_POST, 'promocionalPrice');
        $status = filter_input(INPUT_POST, 'status');

        $pdo = new PDO("mysql:host=localhost:3306;dbname=grudaarts", 'root', 'gustavo@123');

        $productRepository = new ProductRepository($pdo);

        $product = $productRepository->find((int)$idProduct);

        $announcement = new Announcement($product, $title, $description, $promocionalPrice, (bool)$status);

        $sucess = $this->announcementRepository->addAnnouncement($announcement);
    
        if($sucess === false){
            header('Location: /seller?sucesso=0');
        }else{
            header('Location: /seller?sucesso=1');
        }

    }

}
