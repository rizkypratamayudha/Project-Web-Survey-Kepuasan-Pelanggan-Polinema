<?php
include_once("model/formjawaban/jawab_dosen_model.php");
include_once("model/saran/saran_dosen.php");
$jawabDosen = new JawabDosen();
$saranDosen = new SaranDosen();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $responden_dosen_id = $_GET['responden_dosen_id'] ?? $id; 

    $data = [
        'soal_id' => $_POST['soal_id'],
        'jawaban' => $_POST['jawaban'],
    ];

    $saran = [
        'saran' => $_POST['saran']
    ];

    $jawabDosen->insertJawaban($data, $responden_dosen_id);
    $saranDosen->insertSaran($saran, $responden_dosen_id);
    header("Location: terimakasih.php");
}
?>
