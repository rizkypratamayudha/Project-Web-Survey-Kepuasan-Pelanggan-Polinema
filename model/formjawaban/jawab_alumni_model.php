<?php

class JawabAlumni {
    public $db;
    protected $table = 't_jawaban_alumni';

    public function __construct() {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertJawaban($data, $responden_alumni_id){
        $query = $this->db->prepare("INSERT INTO {$this->table} (soal_id, jawaban, responden_alumni_id) VALUES (?, ?, ?)");
        foreach ($data['soal_id'] as $no_urut => $soal_id) {
            $jawaban = $data['jawaban'][$no_urut];
            $query->bind_param('isi', $soal_id, $jawaban, $responden_alumni_id);
            $query->execute();
        }
    }

    public function getDataById($responden_alumni_id){

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("SELECT jd.jawaban_alumni_id, ss.soal_nama ,jd.jawaban
        FROM {$this->table} jd
        LEFT JOIN m_survey_soal ss ON jd.soal_id = ss.soal_id
        where responden_alumni_id = ? ");
        
        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $responden_alumni_id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }
    
}
?>


