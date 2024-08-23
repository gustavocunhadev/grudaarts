<?php

/**
add
read
delete
update
find
 */

namespace Grudaarts\Mvc\Repository;

use Grudaarts\Mvc\Entity\Product;
use PDO;

class ProductRepository 
{

    public function __construct(private PDO $pdo)
    {}

    public function addProduct(Product $product): bool
    {

        $sql = "INSERT INTO product(
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


    public function deleteProduct(Product $product): bool
    {
        $sql = "DELETE FROM product WHERE $product->id = ?;";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $product->getId());
        $result = $statement->execute();

        return $result;
    }

    public function updateProduct(Product $product): bool
    {
        $sql = "UPDATE product SET
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
        $sql = "SELECT * FROM product";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function find(int $id): Product
    {

        $sql = "SELECT * FROM product WHERE id = ?;";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->fetch(PDO::FETCH_ASSOC);
        $statement->execute();
        $product = $statement->fetch(PDO::FETCH_ASSOC);

        return $product;
    }
}
