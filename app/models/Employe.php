<?php
require_once __DIR__ . '/../../config/config.php'; // lien bdd obligatoire

class Employe {
    public static function getByEmailAndName($email,$nom) {
        $pdo = Database::connect();

        $stmt = $pdo->prepare("SELECT * FROM employes WHERE email= ? AND nom =?");
        $stmt->execute([$email,$nom]);

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public static function getByUserId($userId){
        $pdo = Database::connect();

        $stmt = $pdo->prepare("SELECT * FROM employes WHERE user_id= ?");
        $stmt->execute([$userId]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
}