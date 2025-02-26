<?php
require_once '../config/config.php';

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    // Insérer un nouvel utilisateur
    public function createUser($name, $email, $password) {
        // Vérifier si l'email existe déjà
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetchColumn() > 0) {
            echo "Erreur : Cet email est déjà utilisé.";
            return false;
        }
    
        // Insérer l'utilisateur si l'email n'existe pas
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'client')");
        return $stmt->execute([$name, $email, $password]);
    }
    

    // Récupérer un utilisateur par email
    public function getUserByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Vérifier les informations de connexion
    public function loginUser($email, $password) {
        $user = $this->getUserByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>
