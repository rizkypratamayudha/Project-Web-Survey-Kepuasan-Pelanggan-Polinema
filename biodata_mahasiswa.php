<?php
  $menu = 'biodata_user';
  include_once("model/user_model.php");
  include_once("model/masuk_user.php");
  include_once("model/biodata_mhs_model.php");
  
  $user = new User();
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/polinema.png">
  <title>Biodata</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <style>
    .card-header {
      background-color: #007BFF !important;
      display: flex;
    }

    .card-title {
      color: white;
      font-weight: bold !important;
    }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-group.full-width {
      grid-column: span 2;
    }

    .content-wrapper {
      padding-bottom: 5px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">

    <?php include_once('layouts/user/header.php'); ?>
    <?php include_once('layouts/user/sidebar.php'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Biodata</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Biodata</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Biodata Anda</h3>
              </div>
              <?php 
                $action = isset($_GET['act'])? $_GET['act'] : '';
                if($action == 'tambah')
              ?>
              <div class="card-body">
                <form action="biodata_mhs_action.php?act=tambah" method="post" class="form-grid" id="biodata">
                  <div class="form-group">
                    <?php
                      $nama = $user->getNama();
                    ?>
                    <label for="nama">Nama</label>
                    <input type="text" name="responden_nama" class="form-control" value="<?php echo $nama ?>">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="responden_email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" name="responden_nim" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="survey">Survey</label>
                    <p class="form-control">Survey Mahasiswa</p>
                    <input type="hidden" name="survey_id" value="2">  
                  </div>
                  <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" name="responden_hp" class="form-control">
                  </div>
                  
                  <!-- Dropdown Jurusan -->
                  <div class="form-group mb-3">
                    <label for="jurusan">Jurusan</label>
                    <select name="responden_jurusan" id="jurusan" class="form-control custom-select">
                      <option value="" disabled selected>Pilih Jurusan</option>
                      <option value="teknologi_informasi">Teknologi Informasi</option>
                      <option value="teknik_elektronika">Teknik Elektronika</option>
                      <option value="teknik_mesin">Teknik Mesin</option>
                      <option value="teknik_sipil">Teknik Sipil</option>
                      <option value="teknik_kimia">Teknik Kimia</option>
                      <option value="administrasi_niaga">Administrasi Niaga</option>
                      <option value="akuntansi">Akuntansi</option>
                      <!-- Tambahkan opsi jurusan lainnya jika diperlukan -->
                    </select>
                  </div>

                  <!-- Dropdown Prodi -->
                  <div class="form-group mb-3">
                    <label for="prodi">Prodi</label>
                    <select name="responden_prodi" id="prodi" class="form-control required custom-select">
                        <option value="" disabled selected>Pilih Prodi</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Pengisian Survey</label>
                    <input type="date" name="responden_tanggal" id= "tanggal_pengisian"class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="tahun_masuk">Tahun Masuk</label>
                    <input type="text" name="tahun_masuk" class="form-control">
                  </div>
                  <div class="form-group full-width" style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Berikutnya</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </section>
    </div>

    <?php include_once('layouts/user/footer.php'); ?>

</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- jQuery Validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<script src="plugins/jquery-validation/localization/messages_id.min.js"></script>
<script>
  $(document).ready(function(){
    $('#biodata').validate({
      rules: {
        responden_nama: {
          required: true,
          minlength: 5
        },
        responden_email: {
          required: true,
          email: true,
          minlength: 5
        },
        responden_nim: {
          required: true,
          digits: true,
          minlength: 5
        },
        responden_jurusan: {
          required: true,
        },
        responden_prodi: {
          required: true,
        },
        responden_hp: {
          required: true,
          digits: true,
          minlength: 5
        },
        responden_tanggal: {
          required: true,
          date: true,
        },
        tahun_masuk: {
          required: true,
          digits: true,
          minlength: 4,
          maxlength: 4
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });

    // Data Prodi berdasarkan Jurusan
    const prodiByJurusan = {
      teknologi_informasi: [
        "S2 Terapan Rekayasa Teknologi Informasi",
        "D4 Teknik Informatika",
        "D4 Sistem Informasi Bisnis",
        "D2 Pengembangan Perangkat Lunak Sistem",
        "D3 Manajemen Informatika"
      ],
      teknik_elektronika: [
        "S2 Terapan Teknik Elektro",
        "D4 Jaringan Telekomunikasi Digital",
        "D4 Teknik Elektronika",
        "D4 Sistem Kelistrikan",
        "D3 Teknik Elektronika",
        "D3 Teknik Telekomunikasi",
        "D3 Teknik Listrik"
      ],
      teknik_mesin: [
        "D4 Teknik Otomotif Elektronik",
        "D4 Teknik Mesin Produksi Dan Perawatan",
        "D3 Teknik Mesin",
        "D3 Teknik Pemeliharaan Pesawat Udara"
      ],
      teknik_sipil: [
        "D4 Manajemen Rekayasa Konstruksi",
        "D4 Teknologi Rekayasa Konstruksi Jalan Dan Jembatan",
        "D3 Teknik Sipil",
        "D3 Teknologi Pertambangan",
        "D3 Teknologi Konstruksi Jalan, Jembatan, Dan Bangunan Air"
      ],
      administrasi_niaga: [
        "D4 Manajemen Pemasaran",
        "D4 Pengelolaan Arsip Dan Rekaman Informasi",
        "D4 Usaha Perjalanan Wisata",
        "D4 Bahasa Inggris Untuk Komunikasi Bisnis Dan Profesional",
        "D4 Bahasa Inggris Untuk Industri Pariwisata",
        "D3 Administrasi Bisnis",
        
      ],
      teknik_kimia: [
        "D4 Teknologi Kimia Industri",
        "D3 Teknik Kimia",
      ],
      akuntansi: [
        "S2 Sistem Informasi Akuntansi",
        "D4 Akuntansi Manajemen",
        "D4 Keuangan",
        "D3 Akuntansi"
      ]
    };

    // Event listener untuk jurusan
    $('#jurusan').change(function() {
      const jurusan = $(this).val();
      const prodiOptions = prodiByJurusan[jurusan] || [];

      const prodiSelect = $('#prodi');
      prodiSelect.empty();
      prodiSelect.append('<option value="" disabled selected>Pilih Prodi</option>');

      prodiOptions.forEach(prodi => {
        prodiSelect.append(`<option value="${prodi}">${prodi}</option>`);
      });
    });
  });

  const today = new Date().toISOString().split('T')[0];
    $('#tanggal_pengisian').val(today);
  ;
</script>
</body>
</html>
