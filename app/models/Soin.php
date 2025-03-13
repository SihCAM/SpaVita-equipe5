<?php
require_once  '../config/config.php';

class Soin {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function getAllSoins() {
        $stmt = $this->pdo->query("SELECT id, nom, description, prix, categorie, duree, image FROM soins");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
