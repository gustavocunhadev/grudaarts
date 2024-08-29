<?php

declare(strict_types=1);

namespace Grudaarts\Mvc\Controller;

use Grudaarts\Mvc\Repository\AnnouncementRepository;

class AddAnnouncementFormController
{

    public function __construct(private AnnouncementRepository $announcementRepository)
    {}

    public function processaRequisicao(): void
    {
        $announcementList = $this->announcementRepository->all();
        require_once __DIR__ . '/../../views/add-announcement-form.php';
    }

}
