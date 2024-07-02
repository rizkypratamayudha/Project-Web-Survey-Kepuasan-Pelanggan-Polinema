<?php 
    
    include_once('model/biodata_dosen_model.php');

    $action = $_GET['act'];

    if($action == 'tambah'){
        $data = [
            
            'responden_nama' => $_POST['responden_nama'],
            'responden_nip' => $_POST['responden_nip'],
            'survey_id' => $_POST['survey_id'],
            'responden_tanggal' => $_POST['responden_tanggal'],
            'responden_unit' => $_POST['responden_unit'],
            
            
    
        ];
    
        $insert = new Dosen();
        $id = $insert->insertData($data);
        header('location: form_soal_dosen.php?responden_dosen_id='.$id);
    }

    if($action == 'edit'){
        $id = $_GET['id'];
        $data = [
            'responden_dosen_id' => $_POST['responden_dosen_id'],
            'responden_nama' => $_POST['responden_nama'],
            'responden_nip' => $_POST['responden_nip'],
            'responden_unit' => $_POST['responden_unit'],
            'responden_tanggal' => $_POST['responden_tanggal'],
        ];
    
        $update = new Dosen(); // Inisialisasi objek Dosen
        $update->updateData($id, $data);
        header('location: dosen.php');
    }
    
    if($action == 'delete'){
    $id = $_GET['id'];

    $delete = new Dosen(); // Inisialisasi objek Dosen
    $delete->deleteData($id);
    header('location: dosen.php');
    }
?>
