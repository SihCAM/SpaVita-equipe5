<?php
require_once  '../config/config.php';

class Soin {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function getAllSoins($limit = 10, $offset = 0) {
        $stmt = $this->pdo->prepare("SELECT id, nom, description, prix, categorie, duree, image FROM soins LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
