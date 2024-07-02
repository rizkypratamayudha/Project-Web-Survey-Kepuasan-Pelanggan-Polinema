<?php 
$menu = 'user';
include_once('model/biodata_tendik_model.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="Lihat Dataport" content="width=device-width, initial-scale=1">
    <title>Pengguna</title>
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
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

<?php include_once('layouts/header.php')?>
<?php include_once('layouts/sidebar.php')?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengguna Tendik</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengguna</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
    <?php include_once("layouts/lihatuser.php"); ?>
        </div>
        <div class="card-body">
        <h3 class="card-title mt-1">Data Pengguna</h3>
        <button id="eksporBtn" class="btn btn-sm btn-success btn-excel float-right mb-3">Ekspor ke Excel</button> 
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 10%;">User ID</th>
                        <th style="width: 30%;">Nama</th>
                        <th style="width: 30%;">No Pegawai</th>
                        <th style="width: 30%;">Responden Unit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php 
                        $user = new BiodataTendik();
                        $data = $user->getDataUser();
                        $i = 1;
                        while($row = $data->fetch_assoc()){
                            echo '<tr>
                            <td>'.$row['responden_tendik_id'].'</td>
                            <td>'.$row['responden_nama'].'</td>
                            <td>'.$row['responden_nopeg'].'</td>
                            <td>'.$row['responden_unit'].'</td>
                            </tr>';
                            $i++;
                        }
                    ?>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </section>
</div>
</div>
<?php include_once('layouts/footer.php') ?>

</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Ekspor ke Excel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

<script>
  document.getElementById('eksporBtn').addEventListener('click', function() {
    var table = document.querySelector('table');
    var workbook = XLSX.utils.table_to_book(table, {sheet: "Sheet JS"});

    XLSX.writeFile(workbook, 'User_Tendik.xlsx');
  });
</script>
</body>
</html>
