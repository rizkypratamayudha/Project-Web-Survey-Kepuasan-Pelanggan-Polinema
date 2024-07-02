<?php
include_once("model/user_model.php");
include_once("model/biodata_mhs_model.php");
include_once("model/biodata_tendik_model.php");
include_once("model/biodata_alumni_model.php");
include_once("model/biodata_industri_model.php");
include_once("model/biodata_dosen_model.php");
include_once("model/biodata_ortu_model.php");
$usermhs = new BiodataMhs();
$userTendik = new BiodataTendik();
$userAlumni = new BiodataAlumni();
$userIndustri = new BiodataIndustri();
$userDosen = new Dosen();
$userOrtu = new BiodataOrtu();

$user1 = new User();
?>

<div class="card">
            <div class="card-header">
            <div class="badges-container">
            <div class="badge DOSEN">
                <div class="icon"><i class="fas fa-chalkboard-teacher"></i></div>
                <?php 
                $count_user_dosen = $userDosen->getJumlah();
                ?>
                <div class="number">
                <?php echo $count_user_dosen?>
                </div>
                <div class="label">DOSEN</div>
                <a href="user_dosen.php" class="view-data-btn black" style="color: #28A745">Lihat Data <i class="bi bi-eye-fill"></i></a>
            </div>
            <div class="badge MAHASISWA">
                <div class="icon"><i class="fas fa-user-graduate"></i></div>
                <?php 
                    $count_user_mhs = $usermhs->getJumlahMahasiswa();
                ?>
                <div class="number">
                    <?php echo $count_user_mhs?>
                </div>
                <div class="label">MAHASISWA</div>
                <a href="user_mahasiswa.php" class="view-data-btn" style="color: #007BFF">Lihat Data <i class="bi bi-eye-fill"></i></a>
            </div>
            <div class="badge TENDIK">
                <div class="icon"><i class="fas fa-users-cog"></i></div>
                <?php
                    $count_user_tendik = $userTendik->getJumlah()
                ?>
                <div class="number">
                    <?php echo $count_user_tendik?>
                </div>
                <div class="label">TENDIK</div>
                <a href="user_tendik.php" class="view-data-btn" style="color: #FFC107">Lihat Data <i class="bi bi-eye-fill"></i></a>
            </div>
            <div class="badge ALUMNI">
                <div class="icon"><i class="fas fa-user-graduate"></i></div>
                <?php
                    $count_user_alumni = $userAlumni->getJumlah()
                ?>
                <div class="number">
                    <?php echo $count_user_alumni?>
                </div>
                <div class="label">ALUMNI</div>
                <a href="user_alumni.php" class="view-data-btn" style="color: #DC3545">Lihat Data <i class="bi bi-eye-fill"></i></a>
            </div>
            <div class="badge ORANG-TUA">
                <div class="icon"><i class="fas fa-user-tie"></i></div>
                <?php 
                    $count_user_ortu = $userOrtu->getJumlahOrtu()
                ?>
                <div class="number">
                    <?php echo $count_user_ortu?>
                </div>
                <div class="label">ORANG TUA</div>
                <a href="user_orangtua.php" class="view-data-btn" style="color: #6F42C1">Lihat Data <i class="bi bi-eye-fill"></i></a>
            </div>
            <div class="badge INDUSTRI">
                <div class="icon"><i class="fas fa-industry"></i></div>
                <?php
                    $count_user_ind = $userIndustri->getJumlah()
                ?>
                <div class="number">
                    <?php
                        echo $count_user_ind
                    ?>
                </div>
                <div class="label">INDUSTRI</div>
                <a href="user_industri.php" class="view-data-btn" style="color: #FD7E14">Lihat Data <i class="bi bi-eye-fill"></i></a>
            </div>
        </div>