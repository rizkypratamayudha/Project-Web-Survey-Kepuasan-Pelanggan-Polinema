<?php
include_once('model/biodata_ortu_model.php');

$action = $_GET['act'];

if($action == 'tambah'){
    $data = [
        
        'responden_nama' => $_POST['responden_nama'],
        'responden_jk' => $_POST['responden_jk'],
        'responden_umur' => $_POST['responden_umur'],
        'responden_hp' => $_POST['responden_hp'],
        'responden_pendidikan' => $_POST['responden_pendidikan'],
        'responden_tanggal' => $_POST['responden_tanggal'],
        'responden_penghasilan' => $_POST['responden_penghasilan'],
        'mahasiswa_nim' => $_POST['mahasiswa_nim'],
        'mahasiswa_nama' => $_POST['mahasiswa_nama'],
        'mahasiswa_prodi' => $_POST['mahasiswa_prodi'],
        'survey_id' => $_POST['survey_id'],
        

    ];

    $insert = new BiodataOrtu();
    $id = $insert->insertData($data);
    header('location: form_soal_ortu.php?responden_ortu_id='.$id);
}

?>