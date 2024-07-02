<?php
include_once("model/formjawaban/jawab_alumni_model.php");
include_once("model/saran/saran_alumni.php");
$jawabAlumni = new JawabAlumni();
$saranAlumni = new SaranAlumni();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $responden_alumni_id = $_GET['responden_alumni_id'] ?? $id; 

    $data = [
        'soal_id' => $_POST['soal_id'],
        'jawaban' => $_POST['jawaban']
    ];
    $saran = [
        'saran' => $_POST['saran']
    ];
    $jawabAlumni->insertJawaban($data, $responden_alumni_id);
    $saranAlumni->insertSaran($saran, $responden_alumni_id);
    header("Location: terimakasih.php");
}
?>
