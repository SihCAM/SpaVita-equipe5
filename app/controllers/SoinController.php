<?php
require_once __DIR__ . '/../models/Soin.php';

class SoinController {
    private $model;

    public function __construct() {
        $this->model = new Soin();
    }

    public function soins() {
        $limit = 10; // Nombre d'éléments par page
        $page = isset($_GET['page']) && $_GET['page'] > 0 ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;
    
        $soins = $this->model->getAllSoins($limit, $offset);
        $totalServices = count($this->model->getAllSoins());
        $totalPages = ceil($totalServices / $limit);
    
        if (!$soins) {
            $_SESSION['error'] = "Aucun soin trouvé.";
            header('Location: index.php?page=soins');
            exit;
        }
    
        require_once __DIR__ . '/../views/soins.php';
    }
    
}
