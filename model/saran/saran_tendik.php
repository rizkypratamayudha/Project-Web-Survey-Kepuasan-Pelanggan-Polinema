<?php
class SaranTendik{
    public $db;
    protected $table = 'saran_tendik';

    public function __construct() {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertSaran($saran, $responden_tendik_id){
        $query = $this->db->prepare("INSERT INTO {$this->table} (saran, responden_tendik_id) VALUES ( ?, ?)");

            $query->bind_param('si', $saran['saran'], $responden_tendik_id);
            $query->execute();
        
    }

    public function getDataSaran(){
        $result = $this->db->query("SELECT 
        sm.id_saran, rm.responden_nama, rm.responden_nopeg, rm.responden_unit, sm.saran
        FROM {$this->table} sm
        LEFT JOIN t_responden_tendik rm ON sm.responden_tendik_id = rm.responden_tendik_id");
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