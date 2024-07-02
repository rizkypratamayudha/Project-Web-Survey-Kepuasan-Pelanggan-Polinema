<?php
  $menu = 'index';
  include_once("model/biodata_dosen_model.php");
  include_once("model/biodata_mhs_model.php");
  include_once("model/biodata_tendik_model.php");
  include_once("model/biodata_alumni_model.php");
  include_once("model/biodata_ortu_model.php");
  include_once("model/biodata_industri_model.php");
  include_once("spk/ambildata.php");

  // Untuk hasil survey dosen
  include_once("model/formjawaban/jawab_mhs_model.php");
  $surveymhs = new JawabMahasiswa();

  $dosen = new Dosen();
  $mahasiswa = new BiodataMhs();
  $tendik = new BiodataTendik();
  $alumni = new BiodataAlumni();
  $orangtua = new BiodataOrtu();
  $industri = new BiodataIndustri();

  //pie chart
  $jumlahDosen = $dosen->getJumlahChart();
  $jumlahmhs = $mahasiswa->getJumlahChart();
  $jumlahtendik = $tendik->getJumlahChart();
  $jumlahalumni = $alumni->getJumlahChart();
  $jumlahortu = $orangtua->getJumlahChart();
  $jumlahindustri = $industri->getJumlahChart();

  //bar chart
  $surveySangatPuas = $surveymhs->getJumlahSangatPuas();
  $surveyPuas = $surveymhs->getJumlahPuas();
  $surveyCukupPuas = $surveymhs->getJumlahCukupPuas();
  $surveyKurangPuas = $surveymhs->getJumlahKurangPuas();
  $surveyTidakPuas = $surveymhs->getJumlahTidakPuas();

  //spk
  $spk = new AmbilData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/polinema.png">
  <title>Home</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <style>
    .card-header {
      background-color: #007BFF;
      display: flex;
    }

    .card-title {
      color: white;
      font-weight: bold;
    }

    .chart-container1 {
      display: flex;
      align-items: center;
    }

    .chart-container1 canvas {
      flex: 1;
      max-width: 300px;
      max-height: 300px;
    }

    .progress-groups {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      margin-left: 100px;
    }

    .progress-group {
      margin-bottom: 10px;
      width: 100%;
    }

    .progress-group span {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .progress {
      width: 500px;
      height: 20px;
    }

    .progress-bar {
      width: 0;
      height: 100%;
      transition: width 2s;
    }

    .chart-container2 {
      max-width: 900px;
      max-height: 300px;
    }

    .chart-container3 {
      max-width: 900px;
      max-height: 300px;
      margin-top: 50px; 
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
            <h1>Home</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Jumlah Pengguna Survey</h3>
          </div>
          <div class="card-body">
            <div class="chart-container1">
              <canvas id="PieChart"></canvas>
              <div class="progress-groups">
                <!-- Stakeholder -->
                <div class="progress-group">
                  <span>Dosen <b><?php echo $jumlahDosen?>/200</b></span>
                  <div class="progress progress-sm">
                    <div class="progress-bar dosen-bar" style="background-color: #28A745;"></div>
                  </div>
                </div>
                <div class="progress-group">
                  <span>Mahasiswa <b><?php echo $jumlahmhs?>/200</b></span>
                  <div class="progress progress-sm">
                    <div class="progress-bar mahasiswa-bar" style="background-color: #007BFF;"></div>
                  </div>
                </div>
                <div class="progress-group">
                  <span>Tendik <b><?php echo $jumlahtendik?>/200</b></span>
                  <div class="progress progress-sm">
                    <div class="progress-bar tendik-bar" style="background-color: #FFC107;"></div>
                  </div>
                </div>
                <div class="progress-group">
                  <span>Alumni <b><?php echo $jumlahalumni?>/200</b></span>
                  <div class="progress progress-sm">
                    <div class="progress-bar alumni-bar" style="background-color: #DC3545;"></div>
                  </div>
                </div>
                <div class="progress-group">
                  <span>Orang Tua <b><?php echo $jumlahortu?>/200</b></span>
                  <div class="progress progress-sm">
                    <div class="progress-bar ortu-bar" style="background-color: #6F42C1;"></div>
                  </div>
                </div>
                <div class="progress-group">
                  <span>Industri <b><?php echo $jumlahindustri?>/200</b></span>
                  <div class="progress progress-sm">
                    <div class="progress-bar industri-bar" style="background-color: #FD7E14;"></div>
                  </div>
                </div>
                <!-- Batas Stakeholder -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Hasil Survey Mahasiswa</h3>
          </div>
          <div class="card-body">
            <div class="chart-container2">
              <canvas id="ProgressChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
              <h3 class="card-title">Perhitungan Sistem Pendukung Keputusan</h3>
          </div>
          <div class="card-body">
            <h2 class="">Alternative</h2>
            <table class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Alternate</th>
                </tr>
              </thead>
              <tbody><tr>
                  <?php 
                    $alternate = $spk->alternative();
                    $i = 1;
                    while($row = $alternate->fetch_assoc()){
                        echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$row['Prodi'].'</td>
                        </tr>';
                        $i++;
                    }
                  ?>
                </tr>
              </tbody>
            </table>
        </div>
        <hr>
        <div class="card-body">
          <h2 class="">Criteria</h2>
          <table class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Criteria</th>
                <th>Bobot</th>
                <th>Rata-rata bobot</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                  $criteria = $spk->criteria();
                  $i = 1;
                  while($row = $criteria->fetch_assoc()){
                      echo '<tr>
                      <td>C'.$i.'</td>
                      <td>'.$row['soal_nama'].'</td>
                      <td>5,5</td>
                      <td>0,0555</td>
                      </tr>';
                      $i++;
                  }
                  ?>
              </tr>
            </tbody>
          </table>
        </div>
        <hr>
        <div class="card-body">
          <h2 class="">Bobot Kepuasan</h2>
          <table class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>Kepuasan</th>
                <th>Bobot</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php 
                  $criteria = $spk->bobot();
                  $i = 1;
                  while($row = $criteria->fetch_assoc()){
                      echo '<tr>
                      <td>'.$row['kepuasan'].'</td>
                      <td>'.$row['bobot'].'</td>
                      </tr>';
                      $i++;
                  }
                ?>
              </tr>
            </tbody>
          </table>
        </div>
        <hr>
        <div class="card-body">
          <h2 class="">Data Konversi</h2>
            <table class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Prodi</th>
                  <th>C1</th>
                  <th>C2</th>
                  <th>C3</th>
                  <th>C4</th>
                  <th>C5</th>
                  <th>C6</th>
                  <th>C7</th>
                  <th>C8</th>
                  <th>C9</th>
                  <th>C10</th>
                  <th>C11</th>
                  <th>C12</th>
                  <th>C13</th>
                  <th>C14</th>
                  <th>C15</th>
                  <th>C16</th>
                  <th>C17</th>
                  <th>C18</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  
                  $criteria = $spk->dataolahan();
                  $i = 1;
                  while($row = $criteria->fetch_assoc()){
                      echo '<tr>
                      <td>'.$row['id'].'</td>
                      <td>'.$row['prodi'].'</td>
                      <td>'.$row['C1'].'</td>
                      <td>'.$row['C2'].'</td>
                      <td>'.$row['C3'].'</td>
                      <td>'.$row['C4'].'</td>
                      <td>'.$row['C5'].'</td>
                      <td>'.$row['C6'].'</td>
                      <td>'.$row['C7'].'</td>
                      <td>'.$row['C8'].'</td>
                      <td>'.$row['C9'].'</td>
                      <td>'.$row['C10'].'</td>
                      <td>'.$row['C11'].'</td>
                      <td>'.$row['C12'].'</td>
                      <td>'.$row['C13'].'</td>
                      <td>'.$row['C14'].'</td>
                      <td>'.$row['C15'].'</td>
                      <td>'.$row['C16'].'</td>
                      <td>'.$row['C17'].'</td>
                      <td>'.$row['C18'].'</td>
                      </tr>';
                      $i++;
                  }
                  ?>
              </tbody>
            </table>
        </div>
        <hr>
        <div class="card-body">
          <h2 class="">Data Olahan</h2>
            <table class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>Prodi</th>
                  <th>C1</th>
                  <th>C2</th>
                  <th>C3</th>
                  <th>C4</th>
                  <th>C5</th>
                  <th>C6</th>
                  <th>C7</th>
                  <th>C8</th>
                  <th>C9</th>
                  <th>C10</th>
                  <th>C11</th>
                  <th>C12</th>
                  <th>C13</th>
                  <th>C14</th>
                  <th>C15</th>
                  <th>C16</th>
                  <th>C17</th>
                  <th>C18</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $criteria = $spk->dataolahan2();
                  $i = 1;
                  while($row = $criteria->fetch_assoc()){
                      echo '<tr>
                      <td>'.$row['prodi'].'</td>
                      <td>'.$row['total_C1'].'</td>
                      <td>'.$row['total_C2'].'</td>
                      <td>'.$row['total_C3'].'</td>
                      <td>'.$row['total_C4'].'</td>
                      <td>'.$row['total_C5'].'</td>
                      <td>'.$row['total_C6'].'</td>
                      <td>'.$row['total_C7'].'</td>
                      <td>'.$row['total_C8'].'</td>
                      <td>'.$row['total_C9'].'</td>
                      <td>'.$row['total_C10'].'</td>
                      <td>'.$row['total_C11'].'</td>
                      <td>'.$row['total_C12'].'</td>
                      <td>'.$row['total_C13'].'</td>
                      <td>'.$row['total_C14'].'</td>
                      <td>'.$row['total_C15'].'</td>
                      <td>'.$row['total_C16'].'</td>
                      <td>'.$row['total_C17'].'</td>
                      <td>'.$row['total_C18'].'</td>
                      </tr>';
                      $i++;
                  }
                  ?>
              </tbody>
            </table>
        </div>
        <hr>
        <div class="card-body">
          <h2 class="">Perhitungan Vector S</h2>
            <table class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>Prodi</th>
                  <th>C1</th>
                  <th>C2</th>
                  <th>C3</th>
                  <th>C4</th>
                  <th>C5</th>
                  <th>C6</th>
                  <th>C7</th>
                  <th>C8</th>
                  <th>C9</th>
                  <th>C10</th>
                  <th>C11</th>
                  <th>C12</th>
                  <th>C13</th>
                  <th>C14</th>
                  <th>C15</th>
                  <th>C16</th>
                  <th>C17</th>
                  <th>C18</th>
                  <th>Vector <Var></Var></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $criteria = $spk->vectorS();
                  $i = 1;
                  while($row = $criteria->fetch_assoc()){
                      echo '<tr>
                      <td>'.$row['prodi'].'</td>
                      <td>'.$row['total_C1'].'</td>
                      <td>'.$row['total_C2'].'</td>
                      <td>'.$row['total_C3'].'</td>
                      <td>'.$row['total_C4'].'</td>
                      <td>'.$row['total_C5'].'</td>
                      <td>'.$row['total_C6'].'</td>
                      <td>'.$row['total_C7'].'</td>
                      <td>'.$row['total_C8'].'</td>
                      <td>'.$row['total_C9'].'</td>
                      <td>'.$row['total_C10'].'</td>
                      <td>'.$row['total_C11'].'</td>
                      <td>'.$row['total_C12'].'</td>
                      <td>'.$row['total_C13'].'</td>
                      <td>'.$row['total_C14'].'</td>
                      <td>'.$row['total_C15'].'</td>
                      <td>'.$row['total_C16'].'</td>
                      <td>'.$row['total_C17'].'</td>
                      <td>'.$row['total_C18'].'</td>
                      <td>'.$row['total_sum'].'</td>
                      </tr>';
                      $i++;
                  }
                  ?>
              </tbody>
            </table>
        </div>
        <hr>
        <div class="card-body">
          <h2 class="">Vector V</h2>
            <table class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 10%">Ranking</th>
                  <th style="width: 75%">Prodi</th>
                  <th style="width: 15%">Nilai</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $criteria = $spk->vectorV();
                  $i = 1;
                  while($row = $criteria->fetch_assoc()){
                      echo '<tr>
                      <td>'.$i.'</td>
                      <td>'.$row['prodi'].'</td>
                      <td>'.$row['average_total_sum'].'</td>
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
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    const data = {
      labels: ['Dosen', 'Mahasiswa', 'Tendik', 'Alumni', 'Orang Tua', 'Industri'],
      datasets: [{
        data: [<?php echo $jumlahDosen?>, <?php echo $jumlahmhs ?>, <?php echo $jumlahtendik?>, <?php echo $jumlahalumni?>, <?php echo $jumlahortu?>, <?php echo $jumlahindustri?>],
        backgroundColor: ['#28A745', '#007BFF', '#FFC107', '#DC3545', '#6F42C1', '#FD7E14'],
      }]
    };

    const config = {
      type: 'pie',
      data: data,
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          }
        }
      }
    };

    const PieChart = new Chart(
      document.getElementById('PieChart'),
      config
    );
  });

  document.addEventListener('DOMContentLoaded', (event) => {
    const data = {
      labels: ['Sangat Puas', 'Puas', 'Cukup Puas', 'Kurang Puas', 'Tidak Puas'],
      datasets: [{
        data: [<?php echo $surveySangatPuas?>, <?php echo $surveyPuas?>, <?php echo $surveyCukupPuas?>, <?php echo $surveyKurangPuas?>, <?php echo $surveyTidakPuas?>],
        backgroundColor: ['#28A745', '#007BFF', '#FFC107', '#FD7E14', '#DC3545'],
      }]
    };

    const config = {
      type: 'bar',
      data: data,
      options: {
        indexAxis: 'y', // Atur posisi menjadi horizontal
        responsive: true,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            beginAtZero: true
          }
        }
      }
    };

    const ProgressChart = new Chart(
      document.getElementById('ProgressChart'),
      config
    );
  });

  document.addEventListener('DOMContentLoaded', (event) => {
    const data = {
      labels: [1, 2, 3, 4, 5],
      datasets: [{
        label: 'Data XY',
        data: [2, 3, 5, 7, 11],
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 2,
        fill: false
      }]
    };

    const config = {
      type: 'line',
      data: data,
      options: {
        scales: {
          x: {
            type: 'linear',
            position: 'bottom',
            title: {
              display: true,
              text: 'X axis'
            }
          },
          y: {
            title: {
              display: true,
              text: 'Y axis'
            }
          }
        }
      }
    };

    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
  });

  window.onload = function() {
    const dosenProgressBar = document.querySelector('.dosen-bar');
    dosenProgressBar.style.width = "<?php echo ($jumlahDosen / 200) * 100; ?>%";

    const mahasiswaProgressBar = document.querySelector('.mahasiswa-bar');
    mahasiswaProgressBar.style.width = "<?php echo ($jumlahmhs / 200) * 100; ?>%";

    const tendikProgressBar = document.querySelector('.tendik-bar');
    tendikProgressBar.style.width = "<?php echo ($jumlahtendik / 200) * 100; ?>%";

    const alumniProgressBar = document.querySelector('.alumni-bar');
    alumniProgressBar.style.width = "<?php echo ($jumlahalumni / 200) * 100; ?>%";

    const ortuProgressBar = document.querySelector('.ortu-bar');
    ortuProgressBar.style.width = "<?php echo ($jumlahortu / 200) * 100; ?>%";

    const industriProgressBar = document.querySelector('.industri-bar');
    industriProgressBar.style.width = "<?php echo ($jumlahindustri / 200) * 100; ?>%";
  }
</script>
</body>
</html>