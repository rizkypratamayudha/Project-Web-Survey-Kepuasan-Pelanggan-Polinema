<?php
include_once('model/biodata_industri_model.php');

$action = $_GET['act'];

if($action == 'tambah'){
    $data = [
        
        'responden_nama' => $_POST['responden_nama'],
        'responden_jabatan' => $_POST['responden_jabatan'],
        'responden_perusahaan' => $_POST['responden_perusahaan'],
        'responden_hp' => $_POST['responden_hp'],
        'responden_kota' => $_POST['responden_kota'],
        'responden_email' => $_POST['responden_email'],
        'responden_tanggal' => $_POST['responden_tanggal'],
        'survey_id' => $_POST['survey_id'],
        

    ];

    $insert = new BiodataIndustri();
    $id = $insert->insertData($data);
    header('location: form_soal_industri.php?responden_industri_id='.$id);
}

?>