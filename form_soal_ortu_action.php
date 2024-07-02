<?php
include_once("model/formjawaban/jawab_ortu_model.php");
include_once("model/saran/saran_ortu.php");
$jawabOrtu = new JawabOrtu();
$saranOrtu = new SaranOrtu();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $responden_ortu_id = $_GET['responden_ortu_id'] ?? $id; 

    $data = [
        'soal_id' => $_POST['soal_id'],
        'jawaban' => $_POST['jawaban']
    ];

    $saran = [
        'saran' => $_POST['saran']
    ];
    $jawabOrtu->insertJawaban($data, $responden_ortu_id);
    $saranOrtu->insertSaran($saran, $responden_ortu_id);
    header("Location: terimakasih.php");
}
?>
