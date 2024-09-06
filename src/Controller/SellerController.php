<?php

namespace Grudaarts\Mvc\Controller;

use Grudaarts\Mvc\Repository\AnnouncementRepository;
use Grudaarts\Mvc\Repository\ProductRepository;

use PDO;


class SellerController implements Controller
{

    public function __construct(private AnnouncementRepository $announcementRepository){}
    
    
    public function processaRequisicao(){

        $pdo = new PDO("mysql:host=localhost:3306;dbname=grudaarts", 'root', 'gustavo@123');

        $productRepository = new ProductRepository($pdo);
    
        $announcementList = $this->announcementRepository->all();
        $productList = $productRepository->all();

        require_once __DIR__ . '/../../views/seller-html.php';
    }
}