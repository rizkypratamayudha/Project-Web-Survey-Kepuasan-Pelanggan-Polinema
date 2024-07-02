<?php
include_once('model/biodata_tendik_model.php');

$action = $_GET['act'];

if($action == 'tambah'){
    $data = [
        
        'responden_nama' => $_POST['responden_nama'],
        'responden_unit' => $_POST['responden_unit'],
        'responden_nopeg' => $_POST['responden_nopeg'],
        'responden_tanggal' => $_POST['responden_tanggal'],
        'survey_id' => $_POST['survey_id'],
        

    ];

    $insert = new BiodataTendik();
    $id = $insert->insertData($data);
    header('location: form_soal_tendik.php?responden_tendik_id='.$id);
}

?>