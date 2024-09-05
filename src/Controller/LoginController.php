<?php

namespace Grudaarts\Mvc\Controller;
use Controller;

class LoginController implements Controller
{

    public function processaRequisicao(): void
    {
        if(array_key_exists('logado', $_SESSION) && $_SESSION['logado'] === true){
            header('Location: /');
            return;
        }
        require_once __DIR__ ."/../../views/login.php";
    }

}