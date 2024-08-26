<?php

namespace Grudaarts\Mvc\Controller;

use Grudaarts\Mvc\Repository\AnnouncementRepository;

class AnnouncementListController
{

    public function __construct(private AnnouncementRepository $announcementRepository)
    {}

    public function processaRequisicao(): void
    {
        $videoList = $this->announcementRepository->all();
        require_once __DIR__ . '/../../views/announcement-list.php';
    }

}
