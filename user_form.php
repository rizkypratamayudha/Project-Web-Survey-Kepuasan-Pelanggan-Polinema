<?php
$menu = 'user';
include("model/user_model.php");
include("model/koneksi.php");

$user = new User();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/polinema.png"></link>
    <title>Pengguna</title>

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
                        <h1>Pengguna</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pengguna</li>
                            <li class="breadcrumb-item active">Tambah Pengguna</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
        <?php 
            $action = isset($_GET['act'])? $_GET['act'] : '';
            if($action == 'tambah'){
        ?>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Pengguna</h3>
                <div class="card-tools"></div>
                </div>
                <div class="card-body">
                    <form action="user_action.php?act=simpan" method="post" id="form-tambah">
                        <div class="form-group">
                            <label for="soal">ID User</label>
                            <input name="user_id" class="form-control" required></input>
                        </div>
                        <div class="form-group">
                            <label for="soal">Username atau Email</label>
                            <input type="email"name="username" class="form-control" required></input>
                        </div>
                        <div class="form-group">
                            <label for="soal">Nama</label>
                            <input name="nama" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="soal">Password</label>
                            <input name="password" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="jenis_soal">Jenis User</label>
                            <p class="form-control">Admin</p>
                            <input type="hidden" name="jenis_user" value="Admin">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="user.php" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

            <?php  } else if($action == 'edit'){ ?>
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Edit Data Soal</h3>
                </div>
                <div class="card-body">
                    <?php
                        $id = $_GET['id'];

                        $data = $user->getDataById($id);
                        $data = $data->fetch_assoc();
                    ?>
                <form action="user_action.php?act=edit&id=<?php echo $id?>" method="post">
                        <div class="form-group">
                            <label for="soal">ID User</label>
                            <input name="user_id" class="form-control" value="<?php echo $data['user_id']?>"required>
                        </div>
                        <div class="form-group">
                            <label for="soal">Username atau email</label>
                            <input type="email"name="username" class="form-control" value="<?php echo $data['username']?>" required></input>
                        </div>
                        <div class="form-group">
                            <label for="soal">Nama</label>
                            <input name="nama" class="form-control" value="<?php echo $data['nama']?>"required></input>
                        </div>
                        <div class="form-group">
                            <label for="soal">Password</label>
                            <input name="password" class="form-control" required></input>
                        </div>
                        <div class="form-group">
                            <label for="jenis_soal">Jenis User</label>
                            <p class="form-control">Admin</p>
                            <input type="hidden" name="jenis_user" value="Admin">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="bank_soal.php" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

            <?php } else if($action == 'hapus'){?>
                <!-- Default box -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Hapus Data Soal</h3>
                </div>
                <div class="card-body">
                    Hapus Data
                </div>
            </div>
                <?php } else { ?>
            <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Tambah Data Soal</h3>
                    </div>
                    <div class="card-body">
                        Data tidak diketahui
                    </div>
            </div>
            <?php }?>
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
<!-- JQuery Validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js" > </script>
<script src="plugins/jquery-validation/localization/messages_id.min.js" > </script>

<script>
$(document).ready(function(){
    $('#form-tambah').validate({
    rules: {
        kode_soal: {
        required: true,
        minlength: 3,
        digits : true
        },
        soal: {
        required: true,
        minlength: 10
        }
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
</script>
</body>
</html>
