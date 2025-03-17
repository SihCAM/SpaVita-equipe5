<?php
require_once  '../config/config.php';

class Soin {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function getAllSoins($limit = 10, $offset = 0) {
        // S'assurer que les valeurs sont des entiers positifs
        $limit = max(0, (int) $limit); // Si $limit est négatif, le rendre égal à 0
        $offset = max(0, (int) $offset); // Si $offset est négatif, le rendre égal à 0
        
        // Exécuter la requête avec des paramètres fixes
        $stmt = $this->pdo->prepare("SELECT id, nom, description, prix, categorie, duree, image FROM soins LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }     
}
?>
