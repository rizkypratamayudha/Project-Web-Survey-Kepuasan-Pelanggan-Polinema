<?php
include_once("model/formjawaban/jawab_mhs_model.php");
include_once("model/saran/saran_mhs.php");
$jawabMahasiswa = new JawabMahasiswa();
$saranMahasiswa = new SaranMahasiswa();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $responden_mahasiswa_id = $_GET['responden_mahasiswa_id'] ?? $id; 

    $data = [
        'soal_id' => $_POST['soal_id'],
        'jawaban' => $_POST['jawaban']
    ];

    $saran =[
        'saran' => $_POST['saran']
    ];

    $jawabMahasiswa->insertJawaban($data, $responden_mahasiswa_id);
    $saranMahasiswa->insertSaran($saran, $responden_mahasiswa_id);
    header("Location: terimakasih.php");
}
?>
