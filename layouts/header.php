<?php
include_once('model/session.php');
include_once("model/user_model.php");
$user = new User();
?>

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
        <li class="nav-item d-none d-sm-inline-block">
            <a href="contact.php" class="nav-link">Kontak</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#profileModal" href="#" role="button">
                <i class="nav-icon bi bi-person-circle"></i>
            </a>
        </li>
    </ul>
</nav>

<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="profileModalLabel">Profil Anda</h5> <!-- Menambah kelas w-100 untuk membuat judul modal mengisi lebar penuh -->
            </div>
            <div class="modal-body text-center">
                <div class="profile-info">
                    <i class="nav-icon bi bi-person-circle large-icon"></i> <!-- Icon Profil -->
                    <?php
                        $email = $user->getLoggedInUsername();
                        $jenis_user = $user->getJenisUser();
                    ?>
                    <div>
                    <?php
                        echo $email
                    ?>
                    </div> <!-- Nama Pengguna -->
                    <div>
                    <?php
                        echo $jenis_user
                    ?>
                    </div> <!-- Email -->
                </div>
            </div>

            <div class="modal-footer justify-content-center"> <!-- Menggunakan kelas justify-content-center untuk membuat isi div berada di tengah -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="logoutproses.php" class="btn btn-danger">Logout</a> <!-- Link ke logout.php -->
            </div>
        </div>
    </div>
</div>