<?php
require_once __DIR__ . '/../models/Soin.php';

class SoinController {
    private $model;

    public function __construct() {
        $this->model = new Soin();
    }

    public function soins() {
        $soins = $this->model->getAllSoins();
        if (!$soins) {
            echo "Aucun soin trouvé.";
            exit;
        }

        require_once __DIR__ . '/../views/soins.php';
    }
}
?>
