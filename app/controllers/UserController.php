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
                    $_SESSION['user'] = $user;
                    header('Location: index.php?page=home');
                    exit;
                
                //Redirection selon le rôle = admin ou emplye vers dashboard
                if (in_array($user['role'],['admin','employe'])) {
                    header('Location: index.php?page=dashboard');
                } else {
                    header('Location: index.php?page=home');
                }
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

    //Ajout de employe en lien avec userid

    public function ajouterEmploye() {
        //Verification qu eseul admin peut accéder
        if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: index.php?page=403');
            exit;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $role= $_POST['role'];
            $fonction = htmlspecialchars($_POST['fonction']);
            $telephone = htmlspecialchars($_POST['telephone']);
            $competences = htmlspecialchars($_POST['competences']);
            $description = htmlspecialchars($_POST['description']);


            //1.Insertion dan sla table users
            $stmtUser = Database::connect()->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
            $stmtUser->execute([$prenom .' ' . $nom, $email, $password, $role]);

            //2.Récupere le user_id
            $user_id = Database::connect()->lastInsertId();

            //3.Insertion dans la table employes
            $stmtEmploye = Database::connect()->prepare("INSERT INTO employes (nom, prenom, fonction, role, email, telephone, competence, description, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmtEmploye->execute([$nom, $prenom, $fonction, $role, $email, $telephone, $competences, $description, $user_id]);

            //4.confirmation
            $_SESSION['success'] = "Employé a bien été ajouté.";
            header('Location: index.php?page=employe');
            exit;
        }

        //Afficher le formulaire
        require_once __DIR__ . '/../views/employe.php';
    }




}
