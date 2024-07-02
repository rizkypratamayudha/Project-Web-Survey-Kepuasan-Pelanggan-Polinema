<?php
class User {
    public $db;
    
    protected $table = 'm_user';

    public function __construct() {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data) {
        $query = $this->db->prepare("INSERT INTO {$this->table} (user_id, username, nama, password, jenis_user) VALUES (?, ?, ?, ?, ?)");

        $query->bind_param('issss', $data['user_id'], $data['username'], $data['nama'], $data['password'], $data['jenis_user']);

        $query->execute();
    }

    public function getDataUser() {
        $result = $this->db->query("SELECT * FROM {$this->table}");
        if ($result === false) {
            die('Error: ' . $this->db->error);
        }
        return $result;
    }
    

    public function getDataDosen(){
        return $this->db->query("select * from {$this->table} where jenis_user = 'Dosen'");
    }
    public function getDataMhs(){
        return $this->db->query("select * from {$this->table} where jenis_user = 'Mahasiswa'");
    }
    public function getDataTendik(){
        return $this->db->query("select * from {$this->table} where jenis_user = 'Tendik'");
    }
    public function getDataAlumni(){
        return $this->db->query("select * from {$this->table} where jenis_user = 'Alumni'");
    }
    public function getDataOrtu(){
        return $this->db->query("select * from {$this->table} where jenis_user = 'Orang tua'");
    }
    public function getDataInd(){
        return $this->db->query("select * from {$this->table} where jenis_user = 'Industri'");
    }

    public function getJumlahDosen(){
        $query = "SELECT LPAD(COUNT(*) , 3, '0') AS total FROM m_user WHERE jenis_user ='Dosen'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getJumlahMhs(){
        $query = "SELECT LPAD(COUNT(*) , 3, '0') AS total FROM m_user WHERE jenis_user ='Mahasiswa'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getJumlahtndk(){
        $query = "SELECT LPAD(COUNT(*) , 3, '0') AS total FROM m_user WHERE jenis_user ='Tendik'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getJumlahalumni(){
        $query = "SELECT LPAD(COUNT(*) , 3, '0') AS total FROM m_user WHERE jenis_user ='Alumni'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getJumlahOrtu(){
        $query = "SELECT LPAD(COUNT(*) , 3, '0') AS total FROM m_user WHERE jenis_user ='Orang tua'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getJumlahIndustri(){
        $query = "SELECT LPAD(COUNT(*) , 3, '0') AS total FROM m_user WHERE jenis_user ='Industri'";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    function getLoggedInUsername() {
        // Periksa apakah pengguna sudah login dengan memeriksa apakah variabel sesi 'username' sudah diatur
        if(isset($_SESSION['username'])) {
            // Jika sudah login, kembalikan nilai dari variabel sesi 'username'
            return $_SESSION['username'];
        } else {
            // Jika belum login, kembalikan null atau nilai lain sesuai kebutuhan Anda
            return null;
        }
    }

    function getNama(){
        if(isset($_SESSION['nama'])){
            return $_SESSION['nama'];
        }
        else {
            return null;
        }
    }

    function getJenisPengguna(){
        if(isset($_SESSION['jenis_user'])){
            return $_SESSION['jenis_user'];
        }
        else {
            return null;
        }
    }

    function getJenisUser() {
        $username = $this->getLoggedInUsername();
        if ($username === null) {
            return null;
        }
    
        $query = $this->db->prepare("SELECT jenis_user FROM {$this->table} WHERE username = ?");
        $query->bind_param('s', $username);
        $query->execute();
        $result = $query->get_result();
    
        if ($result === false || $result->num_rows === 0) {
            return null;
        }
    
        $row = $result->fetch_assoc(); 
        return $row['jenis_user'];
    }
    

    public function getDataById($id) {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE user_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        $result = $query->get_result();
        if ($result === false) {
            die('Error: ' . $query->error);
        }
        return $result;
    }

    public function updateData($id, $data) {
        // query untuk update data
        $query = $this->db->prepare("UPDATE {$this->table} SET user_id = ?, username = ?, nama = ?, password = ?, jenis_user = ? WHERE user_id = ?");

        // binding parameter ke query
        $query->bind_param('issssi', $data['user_id'], $data['username'], $data['nama'], $data['password'], $data['jenis_user'], $id);

        // eksekusi query
        $query->execute();
        $query->close();
    }

    public function deleteData($id){
        // query untuk delete data
        $query = $this->db->prepare("delete from m_user where user_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();
    }
}
?>

<?php
