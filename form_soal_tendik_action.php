<?php
include_once("model/formjawaban/jawab_tendik_model.php");
include_once("model/saran/saran_tendik.php");
$jawabTendik = new JawabTendik();
$saranTendik = new SaranTendik();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $responden_tendik_id = $_GET['responden_tendik_id'] ?? $id; 

    $data = [
        'soal_id' => $_POST['soal_id'],
        'jawaban' => $_POST['jawaban']
    ];

    $saran = [
        'saran' => $_POST['saran']
    ];
    $jawabTendik->insertJawaban($data, $responden_tendik_id);
    $saranTendik->insertSaran($saran, $responden_tendik_id);
    header("Location: terimakasih.php");
}
?>
