<?php

declare(strict_types=1);

namespace Grudaarts\Mvc\Controller;

use Grudaarts\Mvc\Repository\AnnouncementRepository;
use Grudaarts\Mvc\Repository\ProductRepository;
use Grudaarts\Mvc\Entity\Product;
use Grudaarts\Mvc\Entity\Announcement;
use PDO;
use Controller;

class UpdateAnnouncementController implements Controller
{

    public function __construct(private AnnouncementRepository $announcementRepository)
    {}

    public function processaRequisicao(): void
    {
        $idAnuncio = filter_input(INPUT_POST, 'idAnuncio', FILTER_VALIDATE_INT);
        $idProduct = filter_input(INPUT_POST, 'idProduct', FILTER_VALIDATE_INT);
        $title = filter_input(INPUT_POST, 'title');
        $description = filter_input(INPUT_POST, 'description');
        $promocionalPrice = filter_input(INPUT_POST, 'promocionalPrice');
        $status = filter_input(INPUT_POST, 'status');


        $pdo = new PDO("mysql:host=localhost:3306;dbname=grudaarts", 'root', 'gustavo@123');

        $productRepository = new ProductRepository($pdo);

        $product = $productRepository->find((int)$idProduct);

        $announcement = new Announcement($product, $title, $description, $promocionalPrice, (bool)$status);
        $announcement->setIdAnuncio($idAnuncio);

        $sucess = $this->announcementRepository->UpdateAnnouncement($announcement);
    
        if($sucess === false){
            header('Location: /seller?sucesso=0');
        }else{
            header('Location: /seller?sucesso=1');
        }
    }

}
