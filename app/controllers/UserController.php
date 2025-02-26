<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérification des champs
            if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
                echo "Tous les champs sont obligatoires.";
                exit;
            }

            $name = htmlspecialchars($_POST['name']);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            if (!$email) {
                echo "Email invalide.";
                exit;
            }

            if ($this->model->createUser($name, $email, $password)) {
                header('Location: /SpaVita-equipe5/public/index.php?page=login');
                exit;
            } else {
                echo "Erreur lors de l'inscription.";
            }
        }
        require_once __DIR__ . '/../views/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['email']) || empty($_POST['password'])) {
                echo "Tous les champs sont obligatoires.";
                exit;
            }
    
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->getUserByEmail($email);
    
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header('Location: /SpaVita-equipe5/public/?page=home'); // Redirection vers la page d'accueil après connexion
                exit;
            } else {
                echo "Email ou mot de passe incorrect.";
            }            
        }
        require_once __DIR__ . '/../views/login.php'; // Affichage du formulaire de connexion
    }

    public function logout() {
        // Détruire la session pour déconnecter l'utilisateur
        session_start();
        session_unset();
        session_destroy();
        header('Location: /SpaVita-equipe5/public/?page=home'); // Redirection vers la page d'accueil après la déconnexion
        exit;
    }
}
?>
