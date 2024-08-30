<?php

declare(strict_types=1);

namespace Grudaarts\Mvc\Controller;

use Grudaarts\Mvc\Repository\AnnouncementRepository;
use Grudaarts\Mvc\Repository\ProductRepository;
use Grudaarts\Mvc\Entity\Product;
use PDO;

class UpdateProductController
{

    public function __construct(private AnnouncementRepository $announcementRepository)
    {}

    public function processaRequisicao(): void
    {
        $name = filter_input(INPUT_POST, 'name');
        $description = filter_input(INPUT_POST, 'description');
        $price = filter_input(INPUT_POST, 'price');
        $category = filter_input(INPUT_POST, 'category');
        $qntStock = filter_input(INPUT_POST, 'qntStock', FILTER_VALIDATE_INT);
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        
        $product = new Product($name, $description, $price, $category, $qntStock);
        $product->setId($id);

        $pdo = new PDO("mysql:host=localhost:3306;dbname=grudaarts", 'root', 'gustavo@123');

        $productRepository = new ProductRepository($pdo);

        $sucess = $productRepository->updateProduct($product);
    
        if($sucess === false){
            header('Location: /seller?sucesso=0');
        }else{
            header('Location: /seller?sucesso=1');
        }
    }

}