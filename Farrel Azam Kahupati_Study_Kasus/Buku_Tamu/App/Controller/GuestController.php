<?php
// File: App/Controller/GuestController.php
class GuestController {
    private $guestModel;
    
    public function __construct() {
        if (!isLoggedIn()) {
            redirect('auth/login');
        }
        $this->guestModel = new Guest();
    }
    
    public function index() {
        $guests = $this->guestModel->getAll();
        $data = [
            'title' => 'Data Tamu',
            'guests' => $guests
        ];
        $this->view('guest/index', $data);
    }
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nama' => $_POST['nama'],
                'email' => $_POST['email'],
                'telepon' => $_POST['telepon'],
                'instansi' => $_POST['instansi'],
                'tujuan' => $_POST['tujuan'],
                'bertemu_dengan' => $_POST['bertemu_dengan'],
                'tanggal_berkunjung' => $_POST['tanggal_berkunjung'],
                'waktu_masuk' => $_POST['waktu_masuk'],
                'catatan' => $_POST['catatan'],
                'dibuat_oleh' => $_SESSION['user_id']
            ];
            
            if ($this->guestModel->create($data)) {
                $_SESSION['message'] = 'Data tamu berhasil ditambahkan!';
                redirect('guest');
            } else {
                $_SESSION['error'] = 'Gagal menambahkan data tamu!';
            }
        }
        
        $data = ['title' => 'Tambah Tamu'];
        $this->view('guest/create', $data);
    }
    
    public function edit($id = null) {
        if (!$id) redirect('guest');
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nama' => $_POST['nama'],
                'email' => $_POST['email'],
                'telepon' => $_POST['telepon'],
                'instansi' => $_POST['instansi'],
                'tujuan' => $_POST['tujuan'],
                'bertemu_dengan' => $_POST['bertemu_dengan'],
                'tanggal_berkunjung' => $_POST['tanggal_berkunjung'],
                'waktu_masuk' => $_POST['waktu_masuk'],
                'waktu_keluar' => $_POST['waktu_keluar'],
                'catatan' => $_POST['catatan']
            ];
            
            if ($this->guestModel->update($id, $data)) {
                $_SESSION['message'] = 'Data tamu berhasil diupdate!';
                redirect('guest');
            } else {
                $_SESSION['error'] = 'Gagal update data tamu!';
            }
        }
        
        $guest = $this->guestModel->getById($id);
        $data = [
            'title' => 'Edit Tamu',
            'guest' => $guest
        ];
        $this->view('guest/edit', $data);
    }
    
    public function show($id = null) {
        if (!$id) redirect('guest');
        
        $guest = $this->guestModel->getById($id);
        $data = [
            'title' => 'Detail Tamu',
            'guest' => $guest
        ];
        $this->view('guest/show', $data);
    }
    
    public function delete($id = null) {
        if (!$id) redirect('guest');
        
        if ($this->guestModel->delete($id)) {
            $_SESSION['message'] = 'Data tamu berhasil dihapus!';
        } else {
            $_SESSION['error'] = 'Gagal menghapus data tamu!';
        }
        
        redirect('guest');
    }
    private function view($view, $data = []) {
    extract($data);
    require_once __DIR__ . "/../Views/templates/header.php";
    require_once __DIR__ . "/../Views/{$view}.php";
    require_once __DIR__ . "/../Views/templates/footer.php";
}
}
?>