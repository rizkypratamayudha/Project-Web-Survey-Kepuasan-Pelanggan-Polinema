<?php 
$menu = 'bank_soal';
include_once("model/bank_soal_model.php");
include_once("model/kategori_model.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bank Soal</title>
    <link rel="icon" href="img/polinema.png"></link>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <style>
    .badge a {
      color: white;
      text-decoration: none; 
    }

    .badges-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(10px, 1fr));
      gap: 6px;
      height: 136px;
    }

    .badge {
      position: relative;
      border-radius: 5px;
      padding: 10px;
      color: #fff;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .badge:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
    }

    .badge .icon {
      font-size: 30px;
    }

    .badge .number {
      font-size: 36px;
      font-weight: bold;
    }

    .badge .label {
      font-size: 15px;
      margin-top: 5px;
    }

    .badge.DOSEN {
      background-color: #28A745;
    }

    .badge.MAHASISWA {
      background-color: #007BFF;
    }

    .badge.TENDIK {
      background-color: #FFC107;
    }

    .badge.ALUMNI {
      background-color: #DC3545;
    }

    .badge.ORANG-TUA {
      background-color: #6F42C1;
    }

    .badge.INDUSTRI {
      background-color: #FD7E14;
    }

    .view-data-btn {
      position: absolute;
      margin-top: 10px;
      bottom: -20;
      left: 0;
      width: 100%;
      background-color: #fff;
      border: none;
      padding: 8px 0;
      text-align: center;
      font-size: 14px;
      cursor: pointer;
    }

    .view-data-btn i {
      margin-left: 55px;
    }

    .content-wrapper {
      padding-bottom: 5px;
    }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed  layout-navbar-fixed">
<div class="wrapper">
<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/sidebar.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bank Soal Orang Tua</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Bank Soal</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
        <?php
        include_once("layouts/lihatsoal.php");
        ?>
        
        <div class="card-body">
        <h3 class="card-title mt-1">Data Soal</h3>
            <a href="bank_soal_form.php?act=tambah" class="btn btn-sm btn-primary float-right mb-3">Tambah Data</a>
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 50%;">Soal</th>
                        <th style="width: 8%;">Kategori</th>
                        <th style="width: 12%;">Jenis Soal</th>
                        <th style="width: 15%;">Survey</th>
                        <th style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $bank_soal = new BankSoal();
                $data = $bank_soal->getDataOrtu();
                $i = 1;
                while($row = $data->fetch_assoc()){
                
                    echo '<tr>
                    <td>'.$row['soal_id'].'</td>
                    <td>'.$row['soal_nama'].'</td>
                    <td>'.$row['kategori_nama'].'</td>
                    <td>'.$row['soal_jenis'].'</td>
                    <td>'.$row['survey_nama'].'</td>
                    
                    <td>
                    <a title="Edit Data" href="bank_soal_form.php?act=edit&id='.$row['soal_id'].'" class="btn btn-sm btn-warning" title="Edit Data"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')" title="Hapus Data" href="bank_soal_action.php?act=delete&id='.$row['soal_id'].'" class="btn btn-sm btn-danger" title="Hapus Data"><i class="fa fa-trash"></i></a>

                    </td>
                    </tr>';
                    $i++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </section>
</div>
<?php include_once('layouts/footer.php'); ?>

</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- jQuery Validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js" ></script>
<script src="plugins/jquery-validation/additional-methods.min.js" ></script>
</body>
</html>
