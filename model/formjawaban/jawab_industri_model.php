<?php

class JawabIndustri {
    public $db;
    protected $table = 't_jawaban_industri';

    public function __construct() {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertJawaban($data, $responden_industri_id){
        $query = $this->db->prepare("INSERT INTO {$this->table} (soal_id, jawaban, responden_industri_id) VALUES (?, ?, ?)");
        foreach ($data['soal_id'] as $no_urut => $soal_id) {
            $jawaban = $data['jawaban'][$no_urut];
            $query->bind_param('isi', $soal_id, $jawaban, $responden_industri_id);
            $query->execute();
        }
    }

    public function getDataById($responden_industri_id){

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("SELECT jd.jawaban_industri_id, ss.soal_nama ,jd.jawaban
        FROM {$this->table} jd
        LEFT JOIN m_survey_soal ss ON jd.soal_id = ss.soal_id
        where responden_industri_id = ? ");
        
        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $responden_industri_id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    
}
?>



