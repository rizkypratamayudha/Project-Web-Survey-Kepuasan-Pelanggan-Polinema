<?php
include_once('model/biodata_mhs_model.php');

$action = $_GET['act'];

if($action == 'tambah'){
    $data = [
        
        'responden_nama' => $_POST['responden_nama'],
        'responden_email' => $_POST['responden_email'],
        'responden_nim' => $_POST['responden_nim'],
        'responden_hp' => $_POST['responden_hp'],
        'responden_prodi' => $_POST['responden_prodi'],
        'responden_tanggal' => $_POST['responden_tanggal'],
        'tahun_masuk' => $_POST['tahun_masuk'],
        'survey_id' => $_POST['survey_id'],
        

    ];

    $insert = new BiodataMhs();
    $id = $insert->insertData($data);
    header('location: form_soal_mahasiswa.php?responden_mahasiswa_id='.$id);
}

?>