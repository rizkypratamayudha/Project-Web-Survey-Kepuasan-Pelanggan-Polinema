<?php
class Dosen {
    public $db;
    protected $table = 't_responden_dosen';

    public function __construct() {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data) {
        
        $query = $this->db->prepare("INSERT INTO {$this->table} (survey_id, responden_tanggal, responden_nip, responden_nama, responden_unit) VALUES (?, ?, ?, ?, ?)");

        $responden_tanggal = date('Y-m-d', strtotime($data['responden_tanggal']));

        $query->bind_param(
            'issss',
            $data['survey_id'],
            $responden_tanggal,
            $data['responden_nip'],
            $data['responden_nama'],
            $data['responden_unit']
            

        );
        $query->execute();
        return $query->insert_id;
    }

    public function getDataUser(){
        $result = $this->db->query("SELECT * FROM {$this->table}");
        if ($result === false) {
            die('Error: ' . $this->db->error);
        }
        return $result;
    }

    public function getJumlah(){
        $query = "SELECT LPAD(COUNT(*) , 3, '0') AS total FROM {$this->table}";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    public function getData() {
        // query untuk mengambil data dari tabel biodata model
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getJumlahChart(){
        $query = "SELECT COUNT(*) AS total FROM {$this->table}";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }

}
?>
