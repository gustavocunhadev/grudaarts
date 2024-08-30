<?php

namespace Grudaarts\Mvc\Repository;

use Grudaarts\Mvc\Entity\Announcement;
use Grudaarts\Mvc\Entity\Product;
use PDO;

class AnnouncementRepository
{

    public function __construct(private PDO $pdo)
    {}

    public function addAnnouncement(Announcement $announcement): bool
    {
        $sql = "INSERT INTO ANNOUNCEMENT(
        idproduct,
        title,
        description,
        promocionalPrice,
        status
        ) VALUES (
        :product,
        :title,
        :description,
        :promocionalPrice,
        :status);";

        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(':product', $announcement->getProduct()->getId());
        $statement->bindValue(':title', $announcement->getTitle());
        $statement->bindValue(':description', $announcement->getDescription());
        $statement->bindValue(':promocionalPrice', $announcement->getPromocionalPrice());
        $statement->bindValue(':status', $announcement->getStatus());
    
        return $statement->execute();
    }

    public function deleteAnnouncement(int $id): bool
    {
        $sql = "DELETE FROM ANNOUNCEMENT WHERE idAnuncio = :id;";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $result = $statement->execute();

        return $result;
    }

    public function updateAnnouncement(Announcement $announcement): bool
    {
        $sql = "UPDATE ANNOUNCEMENT SET
                                    idProduct = :product,
                                    title = :title,
                                    description = :description,
                                    promocionalPrice = :promocionalPrice,
                                    status = :status
                                    WHERE idAnuncio = :idAnuncio
                                        ;";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':product', $announcement->getProduct()->getId());
        $statement->bindValue(':title', $announcement->getTitle());
        $statement->bindValue(':description', $announcement->getDescription());
        $statement->bindValue(':promocionalPrice', $announcement->getPromocionalPrice());
        $statement->bindValue(':status', $announcement->getStatus());
        $statement->bindValue(':idAnuncio', $announcement->getIdAnuncio());
    
        $result = $statement->execute();
        return $result;
    }

    public function all(): array
    {

        $sql = "SELECT PRODUCT.id, PRODUCT.name, PRODUCT.description, PRODUCT.price, PRODUCT.category, PRODUCT.qntStock,
                       ANNOUNCEMENT.idAnuncio, ANNOUNCEMENT.title, ANNOUNCEMENT.description, ANNOUNCEMENT.promocionalPrice, ANNOUNCEMENT.status 
                        FROM PRODUCT
                        RIGHT JOIN ANNOUNCEMENT
                        ON PRODUCT.id = ANNOUNCEMENT.idproduct;";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $announcements = $statement->fetchAll(PDO::FETCH_NAMED);


        return array_map(
            $this->hydrate(...),
            $announcements
        );
    }

    public function hydrate(array $announcementData): Announcement
    {

        $product = new Product(
            $announcementData["name"],
            $announcementData["description"][0],
            $announcementData["price"],
            $announcementData["category"],
            $announcementData["qntStock"]
        );
        $product->setId($announcementData["id"]);


        $announcement = new Announcement(
            $product,
            $announcementData["title"],
            $announcementData["description"][1],
            $announcementData["promocionalPrice"],
            $announcementData["status"]    
         );
         $announcement->setIdAnuncio($announcementData['idAnuncio']);
         
         return $announcement;

    }



    public function find(int $id): Announcement
    {
        $sql = "SELECT PRODUCT.id, PRODUCT.name, PRODUCT.description, PRODUCT.price, PRODUCT.category, PRODUCT.qntStock,
                ANNOUNCEMENT.idAnuncio, ANNOUNCEMENT.title, ANNOUNCEMENT.description, ANNOUNCEMENT.promocionalPrice, ANNOUNCEMENT.status 
                FROM PRODUCT
                RIGHT JOIN ANNOUNCEMENT
                ON PRODUCT.id = ANNOUNCEMENT.idproduct;
                WHERE idAnuncio = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        
        $announcement = $this->hydrate($statement->fetch(PDO::FETCH_NAMED));

        return $announcement;
    }
        
}