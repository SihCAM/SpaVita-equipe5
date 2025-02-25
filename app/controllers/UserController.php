<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            if ($this->model->createUser($name, $email, $password)) {
                header('Location: /login');
                exit;
            } else {
                echo "Erreur lors de l'inscription";
            }
        }
        require 'app/views/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header('Location: /dashboard'); // Redirection vers le tableau de bord
                exit;
            } else {
                echo "Email ou mot de passe incorrect";
            }            
        }
        require 'app/views/login.php';
    }
}
?>