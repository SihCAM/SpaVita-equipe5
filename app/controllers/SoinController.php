<?php
require_once __DIR__ . '/../models/Soin.php';

class SoinController {
    private $model;

    public function __construct() {
        $this->model = new Soin();
    }

    public function index() {
        $soins = $this->model->getAllSoins();
        require_once __DIR__ . '/../views/soins.php'; // Inclut la vue soins.php avec le chemin absolu
    }
}
?>
