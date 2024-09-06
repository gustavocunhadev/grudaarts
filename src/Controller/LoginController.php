<?php

namespace Grudaarts\Mvc\Controller;

class LoginController implements Controller
{
    private \PDO $pdo;

    public function __construct(){
        $this->pdo = new \PDO("mysql:host=localhost:3306;dbname=grudaarts", 'root', 'gustavo@123');
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        $sql = "SELECT * FROM USERS WHERE email = :email";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":email", $email);
        $statement->execute();
        
        $userData = $statement->fetch(\PDO::FETCH_ASSOC);
        $correctPassword = password_verify($password, $userData['password'] ?? '');
    
        if (password_needs_rehash($userData['password'], PASSWORD_ARGON2ID)) {
            $statement = $this->pdo->prepare('UPDATE USERS SET password = :password WHERE id = :id');
            $statement->bindValue(':password', password_hash($password, PASSWORD_ARGON2ID));
            $statement->bindValue(':id', $userData['id']);
            $statement->execute();
        }

        if($correctPassword){
            $SESSION['logado'] = true;
            header('Location: /');
        }else{
            echo 'Usuário ou Senha Inválido.';
            header('Location: /login');
        }
    
    }

}