<?php 
include("model/formjawaban/jawab_tendik_model.php");
$tendik = new JawabTendik();
$responden_tendik_id = $_GET['responden_tendik_id'];
$jawaban = $tendik->getDataById($responden_tendik_id);
$menu = 'tendik';    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/polinema.png"></link>
    <title>Responden Tendik</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <style>
        .card-header {
            background-color: #007BFF;
            display: flex;
        }

        .card-title {
            color: white;
            font-weight: bold;
        }

        .content-wrapper {
            padding-bottom: 5px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">
<?php include_once('layouts/header.php')?>

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
@keyframes zoomIn {
    from {
    transform: scale(1);
    }
    to {
    transform: scale(1.1);
    }
}

.nav-item > .nav-link {
    animation: zoomIn 0.3s ease;
}

.nav-item > .nav-link:hover,
.nav-item > .nav-link:focus {
    animation: none;
    transform: scale(1.1);
}

.nav-link.active {
    background-color: #007aff !important;
    color: white !important;
}

.nav-link.active .nav-icon {
    color: white !important;
}

.nav-link.submenu {
    color: #ebecec !important;
}

.nav-link.submenu .nav-icon{
    color: #ebecec !important;
}

.form-inline {
  margin-top: 6px;
}
</style>
</head>
<aside class="main-sidebar sidebar-dark-primary elevation-4" >
  <a href="home.php" class="brand-link">
    <img src="img/polinema.png" alt="Polinema Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Survey Kepuasan</span>
  </a>
  <div class="mt-3 pb-3 mb-3 d-flex">
    <div class="sidebar">
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Cari" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">MENU</li>
          <li class="nav-item">
          <a href="home.php" class="nav-link <?php echo ($menu == 'index')? 'active' : '' ?>">
            <i class="nav-icon bi bi-house-door"></i>
            <p>HOME</p>
          </a>
          </li>
          <li class="nav-item">
          <a href="bank_soal.php" class="nav-link <?php echo ($menu == 'bank_soal')? 'active' : '' ?>">
              <i class="nav-icon bi bi-card-list"></i>
              <p>BANK SOAL</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="user.php" class="nav-link <?php echo ($menu == 'user')? 'active' : '' ?>"> 
              <i class="nav-icon bi bi-people"></i>
              <p>PENGGUNA</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link <?php echo ($menu == 'dosen' || $menu == 'mahasiswa' || $menu == 'tendik' || $menu == 'alumni' || $menu == 'industri' || $menu == 'orangtua')? 'active' : '' ?>" onclick="toggleActive(event)">
              <i class="nav-icon bi bi-person-check"></i>
              <p>RESPONDEN
                  <i class="bi bi-chevron-left right"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="dosen.php" class="nav-link <?php echo ($menu == 'dosen')? 'submenu' : '' ?>">
                <i class="bi <?php echo ($menu == 'dosen')? 'bi-record-circle' : 'bi-circle' ?> nav-icon"></i>
                <p>Dosen</p>
              </a>
            </li>
              <li class="nav-item">
                <a href="mahasiswa.php" class="nav-link <?php echo ($menu == 'mahasiswa')? 'submenu' : '' ?>">
                  <i class="bi <?php echo ($menu == 'mahasiswa')? 'bi-record-circle' : 'bi-circle' ?> nav-icon"></i>
                  <p>Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tendik.php" class="nav-link <?php echo ($menu == 'tendik')? 'submenu' : '' ?>">
                  <i class="bi <?php echo ($menu == 'tendik')? 'bi-record-circle' : 'bi-circle' ?> nav-icon"></i>
                  <p>Tendik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="alumni.php" class="nav-link <?php echo ($menu == 'alumni')? 'submenu' : '' ?>">
                  <i class="bi <?php echo ($menu == 'alumni')? 'bi-record-circle' : 'bi-circle' ?> nav-icon"></i>
                  <p>Alumni</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="orangtua.php" class="nav-link <?php echo ($menu == 'orangtua')? 'submenu' : '' ?>">
                  <i class="bi <?php echo ($menu == 'orangtua')? 'bi-record-circle' : 'bi-circle' ?> nav-icon"></i>
                  <p>Orang Tua</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="industri.php" class="nav-link <?php echo ($menu == 'industri')? 'submenu' : '' ?>">
                  <i class="bi <?php echo ($menu == 'industri')? 'bi-record-circle' : 'bi-circle' ?> nav-icon"></i>
                  <p>Industri</p>
                </a>
              </li>
          </ul>
          <li class="nav-item">
            <a href="saran_dosen.php" class="nav-link <?php echo ($menu == 'saran')? 'active' : '' ?>">
          <i class="nav-icon bi bi-chat-square-quote"></i>
            <p>SARAN</p>
            </a>
          </li>
          </ul>
          <script>
            function toggleActive(event) {
              // Menghapus kelas "active" dari semua tautan di dalam navigasi
              var navLinks = document.querySelectorAll('.nav-link');
              navLinks.forEach(function(link) {
                  link.classList.remove('active');
              });
              
              // Menambahkan kelas "active" pada tautan yang diklik
              event.target.classList.add('active');
            }

            function changeSubmenuIcon() {
                var submenuIcon = document.querySelector('.nav-item.active .bi-circle');
                if (submenuIcon) {
                    // Mengubah ikon submenu menjadi bi-record-circle
                    submenuIcon.classList.remove('bi-circle');
                    submenuIcon.classList.add('bi-record-circle');
                }
            }

            // Panggil fungsi changeSubmenuIcon ketika dokumen telah dimuat
            document.addEventListener("DOMContentLoaded", function(event) {
                changeSubmenuIcon();
            });
          </script>
      </nav>
    </div>
</aside>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Responden</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Responden</li>
                        <li class="breadcrumb-item active">Tendik</li>
                        <li class="breadcrumb-item active">Jawaban</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tendik</h3>
                </div>
                <div class="card-body">
                <button id="eksporBtn" class="btn btn-sm btn-success btn-excel float-right mb-3">Ekspor ke Excel</button> 
                    <table class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10%">ID</th>
                                <th style="width: 50%">Soal</th>
                                <th style="width: 40%">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while ($row = $jawaban->fetch_assoc()) {
                                echo '
                                <tr>
                                <td>'.$row['jawaban_tendik_id'].'</td>
                                <td>'.$row['soal_nama'].'</td>
                                <td>'.$row['jawaban'].'</td>
                                </tr>';
                            }
                        ?>
            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
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

    XLSX.writeFile(workbook, 'Jawaban_Tendik.xlsx');
  });
</script>
</body>
</html>