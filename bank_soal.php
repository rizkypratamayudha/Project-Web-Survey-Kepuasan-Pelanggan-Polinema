<?php 
  $menu = 'bank_soal';
  include_once("model/bank_soal_model.php");
  $bank_soal = new BankSoal();
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
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

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

    /* Custom CSS for DataTable controls */
    .dataTables_filter {
      float: left !important;
      text-align: left !important;
    }

    .dataTables_filter label {
      display: flex;
      align-items: center;
    }

    .dataTables_filter label input {
      margin-left: 10px;
    }

    .dataTables_length {
      display: none;
    }

    .dt-buttons {
      float: right;
    }

    .btn-excel {
      background-color: #28a745;
      color: white;
    }

    .btn-add {
      background-color: #007bff;
      color: white;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">
  <?php include_once('layouts/header.php'); ?>
  <?php include_once('layouts/sidebar.php'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bank Soal</h1>
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
        <?php include_once("layouts/lihatsoal.php"); ?>
        
        <div class="card-body">
          <div class="dt-buttons">
            <a href="bank_soal_form.php?act=tambah" class="btn btn-sm btn-add">Tambah Data</a>
          </div>
          <table id="bankSoalTabel" class="table table-sm table-bordered table-striped">
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
                $data = $bank_soal->getData();
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
    </section>
  </div>

  <?php include_once('layouts/footer.php'); ?>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<!-- Export to Excel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

<script>
  $(document).ready(function() {
    $('#bankSoalTabel').DataTable({
      "dom": '<"top"f>rt<"bottom"ip><"clear">',
      "language": {
        "search": "Cari:"
      }
    });
  });
</script>

</body>
</html>