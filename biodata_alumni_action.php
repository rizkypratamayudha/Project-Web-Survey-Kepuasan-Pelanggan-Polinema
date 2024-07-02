<?php
include_once('model/biodata_alumni_model.php');

$action = $_GET['act'];

if($action == 'tambah'){
    $data = [
        
        'responden_nama' => $_POST['responden_nama'],
        'responden_email' => $_POST['responden_email'],
        'responden_nim' => $_POST['responden_nim'],
        'responden_hp' => $_POST['responden_hp'],
        'responden_prodi' => $_POST['responden_prodi'],
        'responden_tanggal' => $_POST['responden_tanggal'],
        'tahun_lulus' => $_POST['tahun_lulus'],
        'survey_id' => $_POST['survey_id'],
        

    ];

    $insert = new BiodataAlumni();
    $id= $insert->insertData($data);
    header('location: form_soal_alumni.php?responden_alumni_id='.$id);
}

?>