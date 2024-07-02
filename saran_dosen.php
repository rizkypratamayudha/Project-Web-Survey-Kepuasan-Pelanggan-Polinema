<?php 
  $menu = 'saran';
  include_once("model/saran/saran_dosen.php");

  $saranDosen = new SaranDosen();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/polinema.png"></link>
  <title>Saran Dosen</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
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
    <?php include_once('layouts/header.php'); ?>
    <?php include_once('layouts/sidebar.php'); ?>

    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Saran</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Saran</li>
                <li class="breadcrumb-item active"><li>Dosen</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <?php include_once("layouts/lihatsaran.php");?>
            </div>
            <div class="card-body">
              <table class="table table-sm table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 5%;">ID</th>
                    <th style="width: 15%;">Nama</th>
                    <th style="width: 10%;">NIP</th>
                    <th style="width: 15%;">Unit</th>
                    <th style="width: 55%;">Saran</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <?php 
                            
                            $data = $saranDosen->getDataSaran();
                            $i = 1;
                            while($row = $data->fetch_assoc()){
                                echo '<tr>
                                <td>'.$row['id_saran'].'</td>
                                <td>'.$row['responden_nama'].'</td>
                                <td>'.$row['responden_nip'].'</td>
                                <td>'.$row['responden_unit'].'</td>
                                <td>'.$row['saran'].'</td>
                                </tr>';
                                $i++;
                            }
                        ?>
                  </tr>
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

</body>
</html>