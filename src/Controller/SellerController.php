<?php

namespace Grudaarts\Mvc\Controller;

use Grudaarts\Mvc\Repository\AnnouncementRepository;

class SellerController
{

    public function __construct(private AnnouncementRepository $announcementRepository){}
    
    
    public function processaRequisicao(){
    
        $announcementList = $this->announcementRepository->all();
        require_once __DIR__ . '/../../views/seller-html.php';
    }
}