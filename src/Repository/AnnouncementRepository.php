<?

namespace Grudaarts\Mvc\Repository;

use Grudaarts\Mvc\Entity\Announcement;
use PDO;

class AnnouncementRepository
{

    public function __construct(private PDO $pdo)
    {}

    public function addAnnouncement(Announcement $announcement): bool
    {
        $sql = "INSERT INTO announcement(
        idAnuncio,
        product,
        title,
        description,
        promocionalPrice,
        status
        ) VALUES (
        :idAnuncio,
        :product,
        :title,
        :description,
        :promocionalPrice,
        :status);";

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':idAnuncio', $announcement->getIdAnuncio());
        $statement->bindValue(':product', $announcement->getProduct());
        $statement->bindValue(':title', $announcement->getTitle());
        $statement->bindValue(':description', $announcement->getDescription());
        $statement->bindValue(':promocionalPrice', $announcement->getPromocionalPrice());
        $statement->bindValue(':status', $announcement->getStatus());
    
        return $statement->execute();
    }

    public function deleteAnnouncement(int $id): bool
    {
        $sql = "DELETE FROM announcement WHERE id = :id;";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $result = $statement->execute();

        return $result;
    }

    public function updateAnnouncement(Announcement $announcement): bool
    {
        $sql = "UPDATE announcement SET
                                    product = :product,
                                    title = :title,
                                    description = :description,
                                    promocionalPrice = :promocionalPrice,
                                    status = :status
                                    WHERE idAnuncio = :idAnuncio
                                        ;";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':product', $announcement->getProduct());
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
        $sql = "SELECT * FROM announcement;";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $announcements = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $announcements;
    }

    public function find(int $id): Announcement
    {
        $sql = "SELECT * FROM announcement WHERE id = :id;";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $announcement = $statement->fetch(PDO::FETCH_ASSOC);

        return $announcement;
    }

}