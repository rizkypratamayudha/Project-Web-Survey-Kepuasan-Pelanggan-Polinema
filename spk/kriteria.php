<?php 
class AmbilData {
    public $db;
    protected $table = 't_responden_mahasiswa';

    public function __construct() {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function criteria() {
        $result = $this->db->query("SELECT soal_nama FROM m_survey_soal WHERE survey_id = 2");
        $criteria = $result;
    }

    
}
?>