<?php

class JawabDosen {
    public $db;
    protected $table = 't_jawaban_dosen';

    public function __construct() {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertJawaban($data, $responden_dosen_id){
        $query = $this->db->prepare("INSERT INTO {$this->table} (soal_id, jawaban, responden_dosen_id) VALUES (?, ?, ?)");
        foreach ($data['soal_id'] as $no_urut => $soal_id) {
            $jawaban = $data['jawaban'][$no_urut];
            $query->bind_param('isi', $soal_id, $jawaban, $responden_dosen_id);
            $query->execute();
        }
    }

    public function getDataById($responden_dosen_id){

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("SELECT jd.jawaban_dosen_id, ss.soal_nama ,jd.jawaban
        FROM {$this->table} jd
        LEFT JOIN m_survey_soal ss ON jd.soal_id = ss.soal_id
        where responden_dosen_id = ? ");
        
        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $responden_dosen_id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function getJumlahSangatPuas(){
        $query = "SELECT COUNT(*) AS total FROM {$this->table} WHERE jawaban = 'Sangat Puas'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getJumlahPuas(){
        $query = "SELECT COUNT(*) AS total FROM {$this->table} WHERE jawaban = 'Puas'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getJumlahCukupPuas(){
        $query = "SELECT COUNT(*) AS total FROM {$this->table} WHERE jawaban = 'Cukup Puas'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getJumlahKurangPuas(){
        $query = "SELECT COUNT(*) AS total FROM {$this->table} WHERE jawaban = 'Kurang Puas'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getJumlahTidakPuas(){
        $query = "SELECT COUNT(*) AS total FROM {$this->table} WHERE jawaban = 'Tidak Puas'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    
}
?>