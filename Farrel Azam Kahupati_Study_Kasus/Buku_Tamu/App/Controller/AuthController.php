<?php
class AuthController {
    private $userModel;
    
    public function __construct() {
        $this->userModel = new User();
    }
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $user = $this->userModel->login($username, $password);
            
            if ($user) {
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_name'] = $user->nama_lengkap;
                $_SESSION['user_role'] = $user->role;
                
                $_SESSION['message'] = 'Login berhasil!';
                redirect('dashboard');
            } else {
                $_SESSION['error'] = 'Username atau password salah!';
            }
        }
        
        $data = ['title' => 'Login'];
        $this->view('auth/login', $data);
    }
    
    public function register() {
        if (!isLoggedIn() || $_SESSION['user_role'] != 'admin') {
            redirect('login');
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'nama_lengkap' => $_POST['nama_lengkap'],
                'role' => $_POST['role']
            ];
            
            if ($this->userModel->register($data)) {
                $_SESSION['message'] = 'User berhasil ditambahkan!';
                redirect('dashboard');
            } else {
                $_SESSION['error'] = 'Gagal menambahkan user!';
            }
        }
        
        $data = ['title' => 'Tambah User'];
        $this->view('auth/register', $data);
    }
    
    public function logout() {
        session_destroy();
        redirect('login');
    }
    
    private function view($view, $data = []) {
        extract($data);
        require_once "App/Views/templates/header.php";
        require_once "App/Views/{$view}.php";
        require_once "App/Views/templates/footer.php";
    }
}
?>