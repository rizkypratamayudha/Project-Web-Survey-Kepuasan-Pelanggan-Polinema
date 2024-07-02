<?php
include_once("model/masuk_user.php");
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/polinema.png"></link>
    <title>Kontak</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <style>
        .map-container {
            width: 100%;
            height: 420px;
            display: flex;
            justify-content: center;
        }

        .map-container iframe {
            width: 80%;
            height: 80%;
            margin-top: 3%;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            width: 84%;
            margin-left: 8%;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        .contact-info h4 {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .contact-info ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .contact-info li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .contact-info li .icon {
            width: 24px;
            height: 24px;
            margin-right: 10px;
            color: #666;
        }

        .contact-info a li {
            font-size: 16px;
            color: #333;
            text-decoration: none;
        }

        .contact-info a li:hover {
            color: #007bff;
        }

        .contact-info hr {
            margin-top: 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
        }

        .content-wrapper {
            padding-bottom: 5px;
        }

    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/sidebar.php');?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kontak Kami</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="#"><a href="#.php"></a>Kontak</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <h5>Politeknik Negeri Malang</h5>
                        <p class="text-muted">Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141</p>
                    </div>
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15806.010732341647!2d112.6161209!3d-7.9468912!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827687d272e7%3A0x789ce9a636cd3aa2!2sPoliteknik%20Negeri%20Malang!5e0!3m2!1sid!2sid!4v1714835289599!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="card-body">
                    <div class="contact-info">
                        <h4>Hubungi Kami</h4>
                        <ul>
                            <hr>
                            <a href="tel:0341404424">
                        <li>
                            <span class="icon"><i class="fas fa-phone"></i></span>
                            (0341) 404424
                            <i class="bi bi-arrow-right" style="margin-left: auto"></i>
                        </li>
                            </a>
                            <hr>
                            <a href="mailto:humas@polinema.ac.id">
                        <li>
                            <span class="icon"><i class="fas fa-envelope"></i></span>
                            humas@polinema.ac.id
                            <i class="bi bi-arrow-right" style="margin-left: auto"></i>
                        </li>
                        </a>
                        <hr>
                        <li>
                            <span class="icon"><i class="fas fa-clock"></i></span>
                            <a>Jam Kerja :</a>
                            <li style="margin-left: 33px;">Senin - Jumat : 07:00 - 16:00 WIB</li>
                            <li style="margin-left: 33px;">Sabtu & Minggu : Tutup</li>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php include_once('layouts/footer.php'); ?>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>