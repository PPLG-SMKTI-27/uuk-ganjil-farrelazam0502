<?php
// File: App/Controller/DashboardController.php
class DashboardController {
    private $guestModel;
    
    public function __construct() {
        if (!isLoggedIn()) {
            redirect('auth/login');
        }
        $this->guestModel = new Guest();
    }
    
    public function index() {
        $stats = $this->guestModel->getStats();
        $guests = $this->guestModel->getAll();
        
        $data = [
            'title' => 'Dashboard',
            'stats' => $stats,
            'guests' => array_slice($guests, 0, 5) // 5 data terbaru
        ];
        
        $this->view('dashboard/index', $data);
    }
    
    private function view($view, $data = []) {
    extract($data);
    require_once __DIR__ . "/../Views/templates/header.php";
    require_once __DIR__ . "/../Views/{$view}.php";
    require_once __DIR__ . "/../Views/templates/footer.php";
}
}
?>