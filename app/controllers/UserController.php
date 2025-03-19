<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
                $_SESSION['error'] = 'Tous les champs sont obligatoires.';
            } else {
                $name = htmlspecialchars($_POST['name']);
                $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                if (!$email) {
                    $_SESSION['error'] = 'Email invalide.';
                } else if ($this->model->createUser($name, $email, $password)) {
                    header('Location: index.php?page=login');
                    exit;
                } else {
                    $_SESSION['error'] = 'Erreur lors de l\'inscription.';
                }
            }
        }
        
        require_once __DIR__ . '/../views/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['email']) || empty($_POST['password'])) {
                $_SESSION['error'] = 'Tous les champs sont obligatoires.';
            } else {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $user = $this->model->getUserByEmail($email);

                if ($user && password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user'] = $user;
                    header('Location: index.php?page=home');
                    exit;
                } else {
                    $_SESSION['error'] = 'Email ou mot de passe incorrect.';
                }
            }
        }
        
        require_once __DIR__ . '/../views/login.php';
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        header('Location: index.php?page=home');
        exit;
    }
}
