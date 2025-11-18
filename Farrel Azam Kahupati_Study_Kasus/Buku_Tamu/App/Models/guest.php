<?php
// File: App/Models/Guest.php
class Guest {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function getAll() {
        $this->db->query("SELECT g.*, u.nama_lengkap as petugas 
                         FROM guests g 
                         LEFT JOIN users u ON g.dibuat_oleh = u.id 
                         ORDER BY g.created_at DESC");
        return $this->db->resultSet();
    }
    
    public function getById($id) {
        $this->db->query("SELECT g.*, u.nama_lengkap as petugas 
                         FROM guests g 
                         LEFT JOIN users u ON g.dibuat_oleh = u.id 
                         WHERE g.id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    
    public function create($data) {
        $this->db->query("INSERT INTO guests (nama, email, telepon, instansi, tujuan, bertemu_dengan, tanggal_berkunjung, waktu_masuk, catatan, dibuat_oleh) 
                         VALUES (:nama, :email, :telepon, :instansi, :tujuan, :bertemu_dengan, :tanggal_berkunjung, :waktu_masuk, :catatan, :dibuat_oleh)");
        
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':telepon', $data['telepon']);
        $this->db->bind(':instansi', $data['instansi']);
        $this->db->bind(':tujuan', $data['tujuan']);
        $this->db->bind(':bertemu_dengan', $data['bertemu_dengan']);
        $this->db->bind(':tanggal_berkunjung', $data['tanggal_berkunjung']);
        $this->db->bind(':waktu_masuk', $data['waktu_masuk']);
        $this->db->bind(':catatan', $data['catatan']);
        $this->db->bind(':dibuat_oleh', $data['dibuat_oleh']);
        
        return $this->db->execute();
    }
    
    public function update($id, $data) {
        $this->db->query("UPDATE guests 
                         SET nama = :nama, email = :email, telepon = :telepon, instansi = :instansi, 
                             tujuan = :tujuan, bertemu_dengan = :bertemu_dengan, tanggal_berkunjung = :tanggal_berkunjung, 
                             waktu_masuk = :waktu_masuk, waktu_keluar = :waktu_keluar, catatan = :catatan 
                         WHERE id = :id");
        
        $this->db->bind(':id', $id);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':telepon', $data['telepon']);
        $this->db->bind(':instansi', $data['instansi']);
        $this->db->bind(':tujuan', $data['tujuan']);
        $this->db->bind(':bertemu_dengan', $data['bertemu_dengan']);
        $this->db->bind(':tanggal_berkunjung', $data['tanggal_berkunjung']);
        $this->db->bind(':waktu_masuk', $data['waktu_masuk']);
        $this->db->bind(':waktu_keluar', $data['waktu_keluar']);
        $this->db->bind(':catatan', $data['catatan']);
        
        return $this->db->execute();
    }
    
    public function delete($id) {
        $this->db->query("DELETE FROM guests WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
    
    public function getStats() {
        $this->db->query("SELECT COUNT(*) as total FROM guests");
        $total = $this->db->single()->total;
        
        $this->db->query("SELECT COUNT(*) as today FROM guests WHERE tanggal_berkunjung = CURDATE()");
        $today = $this->db->single()->today;
        
        return ['total' => $total, 'today' => $today];
    }
}
?>