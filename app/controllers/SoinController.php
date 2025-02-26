<?php
require_once __DIR__ . '/../models/Soin.php';
require_once __DIR__ . '/../views/soins.php';

class SoinController {
    private $model;

    public function __construct() {
        $this->model = new Soin();
    }

    public function soins() {
        $soins = $this->model->getAllSoins(); // Rècupere tous les soins depuis le modèle
        require_once __DIR__ . '/../views/soins.php'; // Inclut la vue soins.php avec le chemin absolu
    }
}
?>
