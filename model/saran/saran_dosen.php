<?php
class SaranDosen{
    public $db;
    protected $table = 'saran_dosen';

    public function __construct() {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertSaran($saran, $responden_dosen_id){
        $query = $this->db->prepare("INSERT INTO {$this->table} (saran, responden_dosen_id) VALUES ( ?, ?)");

            $query->bind_param('si', $saran['saran'], $responden_dosen_id);
            $query->execute();
        
    }

    public function getDataSaran(){
        $result = $this->db->query("SELECT 
        sm.id_saran, rm.responden_nama, rm.responden_nip, rm.responden_unit, sm.saran
        FROM {$this->table} sm
        LEFT JOIN t_responden_dosen rm ON sm.responden_dosen_id = rm.responden_dosen_id");
        return $result;
    }

    public function getJumlahSaran(){
        $query = "SELECT LPAD(COUNT(*) , 3, '0') AS total FROM {$this->table}";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
}
?>