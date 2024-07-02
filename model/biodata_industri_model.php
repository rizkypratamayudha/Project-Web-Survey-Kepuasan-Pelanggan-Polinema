<?php
class BiodataIndustri {
    public $db;
    protected $table = 't_responden_industri';

    public function __construct() {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data) {
        
        $query = $this->db->prepare("INSERT INTO {$this->table} (survey_id, responden_tanggal, responden_nama, responden_jabatan, responden_perusahaan, responden_email, responden_hp, responden_kota	) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $responden_tanggal = date('Y-m-d', strtotime($data['responden_tanggal']));

        $query->bind_param(
            'ssssssss',
            $data['survey_id'],
            $responden_tanggal,
            $data['responden_nama'],
            $data['responden_jabatan'],
            $data['responden_perusahaan'],
            $data['responden_email'],
            $data['responden_hp'],
            $data['responden_kota']
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

    public function getJumlahChart(){
        $query = "SELECT COUNT(*) AS total FROM {$this->table}";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
}
?>
