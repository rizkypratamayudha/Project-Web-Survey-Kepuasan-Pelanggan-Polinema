<?php
include_once("model/formjawaban/jawab_industri_model.php");
include_once("model/saran/saran_industri.php");
$jawabIndustri = new JawabIndustri();
$saranIndustri = new SaranIndustri();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $responden_industri_id = $_GET['responden_industri_id'] ?? $id; 

    $data = [
        'soal_id' => $_POST['soal_id'],
        'jawaban' => $_POST['jawaban']
    ];

    $saran = [
        'saran' => $_POST['saran']
    ];
    $jawabIndustri->insertJawaban($data, $responden_industri_id);
    $saranIndustri->insertSaran($saran, $responden_industri_id);
    header("Location: terimakasih.php");
}
?>
