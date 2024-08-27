<?php

declare(strict_types=1);

namespace Grudaarts\Mvc\Controller;

use Grudaarts\Mvc\Repository\AnnouncementRepository;

class DeleteAnnouncementController
{

    public function __construct(private AnnouncementRepository $announcementRepository)
    {}

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if($id === null || $id === false) {
            header('Location: /seller?sucesso=0');
            return;
        }

        $sucess = $this->announcementRepository->deleteAnnouncement($id);
        if($sucess === false){
            header('Location: /seller?sucesso=0');
        }else{
            header('Location: /seller?sucesso=1');
        }

    }

}
