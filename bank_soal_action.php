    <?php 
    
    include_once('model/bank_soal_model.php');

    $action = $_GET['act'];

    if($action == 'simpan'){
        $data = [
            
            'soal_nama' => $_POST['soal_nama'],
            'no_urut' => $_POST['no_urut'],
            'survey_id' => $_POST['survey_id'],
            'soal_jenis' => $_POST['soal_jenis'],
            'kategori_id' => $_POST['kategori_id'],
            

        ];

        $insert = new BankSoal();
        $insert->insertData($data);
        header('location: bank_soal.php');
    }

    if($action == 'edit'){
        $id = $_GET['id'];
        $data = [
            'soal_id' => $_POST['soal_id'],
            'soal_nama' => $_POST['soal_nama']
        ];
    
        $update = new BankSoal();
        $update->updateData($id, $data);
        header('location: bank_soal.php');
    }
    


    if($action == 'delete'){
    $id = $_GET['id'];

    $delete = new BankSoal();
    $delete->deleteData($id);
    header('location: bank_soal.php');
    }