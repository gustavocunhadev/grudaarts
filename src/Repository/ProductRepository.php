<?php

namespace Grudaarts\Mvc\Repository;

use Grudaarts\Mvc\Entity\Product;
use PDO;

class ProductRepository 
{

    public function __construct(private PDO $pdo)
    {}

    public function addProduct(Product $product): bool
    {

        $sql = "INSERT INTO PRODUCT(
                                    name,
                                    description,
                                    price,
                                    category,
                                    qntstock
                                    ) VALUES(?, ?, ?, ?, ?);";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $product->getName());
        $statement->bindValue(2, $product->getDescription());
        $statement->bindValue(3, $product->getPrice());
        $statement->bindValue(4, $product->getCategory());
        $statement->bindValue(5, $product->getQntStock());
        $result = $statement->execute();

        return $result;
    }


    public function deleteProduct(int $id): bool
    {
        $sql = "DELETE FROM PRODUCT WHERE id = :id;";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $result = $statement->execute();

        return $result;
    }

    public function updateProduct(Product $product): bool
    {
        $sql = "UPDATE PRODUCT SET
                                name = :name,
                                description = :description,
                                price = :price,
                                category = :category,
                                qntStock = :qntStock 
                                WHERE id = :id;
        ";

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':name', $product->getName());
        $statement->bindValue(':description', $product->getDescription());
        $statement->bindValue(':price', $product->getPrice());
        $statement->bindValue(':category', $product->getCategory());
        $statement->bindValue(':qntStock', $product->getQntStock());
        $statement->bindValue(':id', $product->getId(), PDO::PARAM_INT);

        return $statement->execute();
    }

    public function all(): array
    {
        $sql = "SELECT * FROM PRODUCT";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function find(int $id): Product
    {

        $sql = "SELECT * FROM PRODUCT WHERE id = ?;";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->fetch(PDO::FETCH_ASSOC);
        $statement->execute();
        
        return $this->hydrate($statement->fetch(PDO::FETCH_ASSOC));
    }

    public function hydrate(array $productData): Product
    {

        $product = new Product(
            $productData["name"],
            $productData["description"][0],
            $productData["price"],
            $productData["category"],
            $productData["qntStock"]
        );
        $product->setId($productData["id"]);

        return $product;
    }
}
