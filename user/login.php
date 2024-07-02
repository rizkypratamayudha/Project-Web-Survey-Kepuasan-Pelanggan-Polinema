<?php
    include_once('../model/koneksi.php');
    include_once('../loginproses.php');
    include_once('../model/masuk_user.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey Kepuasan</title>
    <link rel="icon" href="../img/polinema.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    
    <style>
    body {
        position: relative;
        min-height: 100vh;
        background: rgba(0, 0, 0, 0.5);
    }
    
    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, #003166, rgba(0, 49, 102, 0.1), rgba(0, 49, 102, 0.1)), url('../img/jti2.png') no-repeat center center fixed;
        opacity: 0.9;
        background-size: cover;
        z-index: -1;
    }

    .card {
        transform: rotateX(0deg) rotateY(0deg);
        transition: transform 0.5s;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1);
        background: linear-gradient(145deg, #ffffff, #e6e6e6);
        border-radius: 10px;
    }

    .button {
        margin-left: 110px;
        width: 50px;
    }

    .custom-select {
        width: 40px;
    }

</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h1>Selamat Datang</h1>
        </div>
        <div class="card-body">
            <form action="" method="post" id="form-login">
                <div class="text-center">
                    <img class="mb-4" src="../img/polinema.png" alt="" width="75" height="75">
                </div>
                <?php
                
                if (isset($_SESSION['login_error'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['login_error'] . '</div>';
                    unset($_SESSION['login_error']);
                }
                ?>
                <div class="input-group mb-3">
                    <input type="email" name="username" class="form-control" placeholder="Username" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="col-full">
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Masuk</button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <form action="../model/masuk_user.php" method="POST" id="form-survey">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <select name="jenis_user" class="form-control required custom-select">
                                <option value="" disabled selected>Pilih Jenis User</option>
                                <option>Dosen</option>
                                <option>Mahasiswa</option>
                                <option>Tendik</option>
                                <option>Alumni</option>
                                <option>Orang tua</option>
                                <option>Industri</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Isi Survey</button>
                    </div>
                </div>
                <div class="alert alert-secondary mt-3" role="alert" id="userSelectionAlertTable" style="display: none;"></div>
                <p class="mt-5 mb-3 text-body-secondary text-center">&copy; 2024</p>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- jQuery Validation -->
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../plugins/jquery-validation/additional-methods.min.js"></script> 
<script src="../plugins/jquery-validation/localization/messages_id.min.js"></script>

<script>
    $(document).ready(function(){
        $('#form-login').validate({
            rules: {
                username: {
                    required: true,
                    minlength: 5
                },
                password: {
                    required: true,
                    minlength: 5
                },
                jenis_user: {
                    
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.input-group').append(error);
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
