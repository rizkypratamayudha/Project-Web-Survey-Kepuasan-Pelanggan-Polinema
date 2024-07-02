<?php 
class Kategori_model{
    public $db;
    protected $table = 'm_kategori';

    public function __construct(){
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }
    

    public function getData(){
        // query untuk mengambil data dari tabel bank_soal
        return $this->db->query("select kategori_nama from {$this->table} ");
    }

}