<?php
include_once("model/user_model.php");
$user = new User();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="img/polinema.png"></link>
<title>Header</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="dist/css/adminlte.min.css">

<style>
    .modal-dialog {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        width: 80%;
        justify-content: center;
    }

    .modal-header {
        text-align: center;
    }

    .modal-footer {
        text-align: center;
    }

    .profile-info {
        margin-bottom: 20px;
    }

    .large-icon {
        font-size: 5em;
    }

</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="contact_user.php" class="nav-link">Kontak</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
</div>
