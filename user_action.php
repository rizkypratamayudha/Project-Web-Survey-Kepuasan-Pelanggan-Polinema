<?php 

include_once('model/user_model.php');


$action = $_GET['act'];

if($action == 'simpan'){
    $data = [
        'user_id' => $_POST['user_id'],
        'username' => $_POST['username'],
        'nama' => $_POST['nama'],
        'password' => md5($_POST['password']),
        'jenis_user' => $_POST['jenis_user']

    
    ];

    $insert = new User();
    $insert->insertData($data);
    header('location: user.php');
}

if($action == 'edit'){
$id = $_GET['id'];
$data = [
    'user_id' => $_POST['user_id'],
    'username' => $_POST['username'],
    'nama' => $_POST['nama'],
    'password' => md5($_POST['password']),
    'jenis_user' => $_POST['jenis_user']
];

$update = new User();
$update->updateData($id, $data);

header('location: user.php');

}


if($action == 'hapus'){
$id = $_GET['id'];

$delete = new User();
$delete->deleteData($id);
header('location: user.php');
}