<?php
$menu = 'biodata_user';
include_once("model/user_model.php");
include_once("model/masuk_user.php");
include_once("model/biodata_ortu_model.php");

$user = new User();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/polinema.png">
    <title>Beranda</title>

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
                    <form action="biodata_ortu_action.php?act=tambah" id="biodata" method="POST" class="form-grid">
                        <div class="form-group">
                            <?php
                                $nama = $user->getNama();
                            ?>
                            <label for="nama">Nama</label>
                            <input type="text" name="responden_nama" class="form-control" value="<?php echo $nama?>"required></input>
                        </div>
                        <div class="form-group">
                            <label for="nama">Survey</label>
                            <p class="form-control">Survey Orang Tua</p>
                            <input type="hidden" name="survey_id" value="5">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select name="responden_jk" class="form-control"required>
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input type="text" name="responden_umur" class="form-control"required></input>
                        </div>
                        <div class="form-group">
                            <label for="hp">No HP</label>
                            <input type="text" name="responden_hp" class="form-control"required></input>
                        </div>
                        <div class="form-group">
                            <label for="mahasiswa_nama">Nama Mahasiswa</label>
                            <input type="text" name="mahasiswa_nama" class="form-control"required></input>
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" name="responden_pendidikan" class="form-control"required></input>
                        </div>
                        <div class="form-group">
                            <label for="mahasiswa_prodi">Prodi Mahasiswa</label>
                            <input type="text" name="mahasiswa_prodi" class="form-control"required></input>
                        </div>
                        <div class="form-group">
                            <label for="penghasilan">Penghasilan</label>
                            <input type="text" name="responden_penghasilan" class="form-control"required></input>
                        </div>
                        <div class="form-group">
                            <label for="mahasiswa_nim">NIM Mahasiswa</label>
                            <input type="text" name="mahasiswa_nim" class="form-control"required></input>
                        </div>
                        <div class="form-group">
                            <label for="responden_tanggal">Tanggal Pengisian Survey</label>
                            <input type="date" name="responden_tanggal" id="tanggal_pengisian" class="form-control" required>
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
            nama: {
            required: true,
            minlength: 5
            },
            responden_jk: {
            required: true,
            
            },
            responden_umur: {
            required: true,
            digits: true,
            minlength: 2
            },
            responden_hp: {
            required: true,
            digits: true,
            minlength: 5
            },
            mahasiswa_nama: {
                required: true,
                minlength: 3
            },
            responden_pendidikan: {
                required: true,
                minlength: 2
            },
            mahasiswa_prodi: {
                required: true,
                minlength: 3
            }, 
            responden_penghasilan: {
                required: true,
                minlength: 5
            },
            mahasiswa_nim: {
                required: true,
                digits: true,
                minlength: 3
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
    });

    const today = new Date().toISOString().split('T')[0];
    $('#tanggal_pengisian').val(today);
;
    </script>
</body>
</html>