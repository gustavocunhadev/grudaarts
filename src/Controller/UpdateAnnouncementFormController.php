<?php

declare(strict_types=1);

namespace Grudaarts\Mvc\Controller;

use Grudaarts\Mvc\Repository\AnnouncementRepository;
use Grudaarts\Mvc\Repository\ProductRepository;

use PDO;

class UpdateAnnouncementFormController
{

    public function __construct(private AnnouncementRepository $announcementRepository)
    {}

    public function processaRequisicao(): void
    {

        $id = filter_input(INPUT_GET,"id", FILTER_VALIDATE_INT);

        $announcement= $this->announcementRepository->find($id);
        require_once __DIR__ . '/../../views/update-announcement-form.php';
    }

}
