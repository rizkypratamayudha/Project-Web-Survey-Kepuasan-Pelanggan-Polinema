<?php
class Soal{
    public $db;
    protected $table = 'm_survey_soal';

    public function __construct() {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    //soal pilihan
    public function getSoalDosen() {
        return $this->db->query("SELECT no_urut, soal_nama, soal_id
        FROM {$this->table} 
        WHERE kategori_id = '1' AND soal_jenis = 'Pilihan'
        ORDER BY CAST(no_urut AS UNSIGNED) ASC
        ");
    }
    public function getSoalMhs() {
        return $this->db->query("SELECT no_urut, soal_nama, soal_id
        FROM {$this->table} 
        WHERE kategori_id = '2' AND soal_jenis = 'Pilihan'
        ORDER BY CAST(no_urut AS UNSIGNED) ASC
        ");
    }
    public function getSoalTendik() {
        return $this->db->query("SELECT no_urut, soal_nama, soal_id
        FROM {$this->table} 
        WHERE kategori_id = '3' AND soal_jenis = 'Pilihan'
        ORDER BY CAST(no_urut AS UNSIGNED) ASC
        ");
    }
    public function getSoalAlumni() {
        return $this->db->query("SELECT no_urut, soal_nama, soal_id
        FROM {$this->table} 
        WHERE kategori_id = '4' AND soal_jenis = 'Pilihan'
        ORDER BY CAST(no_urut AS UNSIGNED) ASC
        ");
    }
    public function getSoalOrtu() {
        return $this->db->query("SELECT no_urut, soal_nama, soal_id
        FROM {$this->table} 
        WHERE kategori_id = '5' AND soal_jenis = 'Pilihan'
        ORDER BY CAST(no_urut AS UNSIGNED) ASC
        ");
    }
    public function getSoalIndustri() {
        return $this->db->query("SELECT no_urut, soal_nama, soal_id
        FROM {$this->table} 
        WHERE kategori_id = '6' AND soal_jenis = 'Pilihan'
        ORDER BY CAST(no_urut AS UNSIGNED) ASC
        ");
    }

    //soal esai
    public function getSoalMhsEsai(){
        return $this->db->query("SELECT no_urut, soal_id, soal_nama FROM {$this->table} WHERE kategori_id = '2' AND soal_jenis = 'Saran' ORDER BY CAST(no_urut AS UNSIGNED) ASC");
    }
    public function getSoalDosenEsai(){
        return $this->db->query("SELECT no_urut, soal_id, soal_nama FROM {$this->table} WHERE kategori_id = '1' AND soal_jenis = 'Saran' ORDER BY CAST(no_urut AS UNSIGNED) ASC");
    }
    public function getSoalTendikEsai(){
        return $this->db->query("SELECT no_urut, soal_id, soal_nama FROM {$this->table} WHERE kategori_id = '3' AND soal_jenis = 'Saran' ORDER BY CAST(no_urut AS UNSIGNED) ASC");
    }
    public function getSoalAlumniEsai(){
        return $this->db->query("SELECT no_urut, soal_id, soal_nama FROM {$this->table} WHERE kategori_id = '4' AND soal_jenis = 'Saran' ORDER BY CAST(no_urut AS UNSIGNED) ASC");
    }
    public function getSoalOrtuEsai(){
        return $this->db->query("SELECT no_urut, soal_id, soal_nama FROM {$this->table} WHERE kategori_id = '5' AND soal_jenis = 'Saran' ORDER BY CAST(no_urut AS UNSIGNED) ASC");
    }
    public function getSoalIndustriEsai(){
        return $this->db->query("SELECT no_urut, soal_id, soal_nama FROM {$this->table} WHERE kategori_id = '6' AND soal_jenis = 'Saran' ORDER BY CAST(no_urut AS UNSIGNED) ASC");
    }
}
?>
