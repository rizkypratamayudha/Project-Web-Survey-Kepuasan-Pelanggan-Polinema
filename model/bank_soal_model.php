<?php 
class BankSoal{
    public $db;
    protected $table = 'm_survey_soal';

    public function __construct(){
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data){
        // prepare statement untuk query insert
        $query = $this->db->prepare("insert into {$this->table} (soal_id,no_urut, soal_nama, survey_id, kategori_id, soal_jenis) values(?,?,?,?,?,?)");

        // binding parameter ke query, "s" berarti string, "ss" berarti dua string
        $query->bind_param('issiis', $data['soal_id'],$data['no_urut'], $data['soal_nama'], $data['survey_id'], $data['kategori_id'], $data['soal_jenis']);
        
        // eksekusi query untuk menyimpan ke db
        $query->execute();
    }

        //lihat data
    public function getData(){
        // query untuk mengambil data dari tabel bank_soal
        return $this->db->query("SELECT bs.soal_id, bs.soal_nama, k.kategori_nama, bs.soal_jenis, s.survey_nama
        FROM {$this->table} bs
        LEFT JOIN m_kategori k ON bs.kategori_id = k.kategori_id 
        LEFT JOIN m_survey s ON bs.survey_id = s.survey_id");
    }


    public function getDataDosen(){
        return $this->db->query("SELECT bs.soal_id, bs.soal_nama, k.kategori_nama, bs.soal_jenis, s.survey_nama
        FROM m_survey_soal bs
        LEFT JOIN m_kategori k ON bs.kategori_id = k.kategori_id
        LEFT JOIN m_survey s ON bs.survey_id = s.survey_id
        WHERE bs.kategori_id = '1';
        ");
    }
    public function getDataMhs(){
        return $this->db->query("SELECT bs.soal_id, bs.soal_nama, k.kategori_nama, bs.soal_jenis, s.survey_nama
        FROM m_survey_soal bs
        LEFT JOIN m_kategori k ON bs.kategori_id = k.kategori_id
        LEFT JOIN m_survey s ON bs.survey_id = s.survey_id
        WHERE bs.kategori_id = '2';
        ");
    }
    public function getDataTendik(){
        return $this->db->query("SELECT bs.soal_id, bs.soal_nama, k.kategori_nama, bs.soal_jenis, s.survey_nama
        FROM m_survey_soal bs
        LEFT JOIN m_kategori k ON bs.kategori_id = k.kategori_id
        LEFT JOIN m_survey s ON bs.survey_id = s.survey_id
        WHERE bs.kategori_id = '3';
        ");
    }
    public function getDataAlumni(){
        return $this->db->query("SELECT bs.soal_id, bs.soal_nama, k.kategori_nama, bs.soal_jenis, s.survey_nama
        FROM m_survey_soal bs
        LEFT JOIN m_kategori k ON bs.kategori_id = k.kategori_id
        LEFT JOIN m_survey s ON bs.survey_id = s.survey_id
        WHERE bs.kategori_id = '4';
        ");
    }
    public function getDataOrtu(){
        return $this->db->query("SELECT bs.soal_id, bs.soal_nama, k.kategori_nama, bs.soal_jenis, s.survey_nama
        FROM m_survey_soal bs
        LEFT JOIN m_kategori k ON bs.kategori_id = k.kategori_id
        LEFT JOIN m_survey s ON bs.survey_id = s.survey_id
        WHERE bs.kategori_id = '5';
        ");
    }
    public function getDataIndustri(){
        return $this->db->query("SELECT bs.soal_id, bs.soal_nama, k.kategori_nama, bs.soal_jenis, s.survey_nama
        FROM m_survey_soal bs
        LEFT JOIN m_kategori k ON bs.kategori_id = k.kategori_id
        LEFT JOIN m_survey s ON bs.survey_id = s.survey_id
        WHERE bs.kategori_id = '6';
        ");
    }

    //jumlahdata
    public function getJumlahDosen(){
        $query = "SELECT LPAD(COUNT(*) , 3, '0') AS total FROM m_survey_soal WHERE kategori_id ='1'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getJumlahMhs(){
        $query = "SELECT LPAD(COUNT(*) , 3, '0') AS total FROM m_survey_soal WHERE kategori_id ='2'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getJumlahTendik(){
        $query = "SELECT LPAD(COUNT(*) , 3, '0') AS total FROM m_survey_soal WHERE kategori_id ='3'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getJumlahalumni(){
        $query = "SELECT LPAD(COUNT(*) , 3, '0') AS total FROM m_survey_soal WHERE kategori_id ='4'
";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getJumlahOrtu(){
        $query = "SELECT LPAD(COUNT(*) , 3, '0') AS total FROM m_survey_soal WHERE kategori_id ='5'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getJumlahIndustri(){
        $query = "SELECT LPAD(COUNT(*) , 3, '0') AS total FROM m_survey_soal WHERE kategori_id ='6'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    

    public function getDataById($id){

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("select * from {$this->table} where soal_id = ?");
        
        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function updateData($id, $data) {
        // query untuk update data
        $query = $this->db->prepare("UPDATE {$this->table} SET soal_id = ?, soal_nama = ? WHERE soal_id = ?");

        // binding parameter ke query
        $query->bind_param('iss', $data['soal_id'], $data['soal_nama'], $id);

        // eksekusi query
        $query->execute();
        $query->close();
    }

    public function deleteData($id){
        // query untuk delete data
        $query = $this->db->prepare("delete from {$this->table} where soal_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();
    }
}