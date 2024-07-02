<?php
include_once("model/bank_soal_model.php");
$bank_soal = new BankSoal()
?>

<div class="card">
                <div class="card-header">
                <div class="badges-container">
                <div class="badge DOSEN">
                    <div class="icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    <?php
                    $count_dosen = $bank_soal->getJumlahDosen();
                    ?>
                    <div class="number">
                    <?php echo $count_dosen?>
                    </div>
                    <div class="label">DOSEN</div>
                    <a href="bank_soal_dosen.php" class="view-data-btn black" style="color: #28A745">Lihat Data <i class="bi bi-eye-fill"></i></a>
                </div>
                <div class="badge MAHASISWA">
                    <div class="icon"><i class="fas fa-user-graduate"></i></div>
                    <?php
                    $count_mhs = $bank_soal->getJumlahMhs();
                    ?>
                    <div class="number">
                    <?php echo $count_mhs?>
                    </div>
                    <div class="label">MAHASISWA</div>
                    <a href="bank_soal_mahasiswa.php" class="view-data-btn" style="color: #007BFF">Lihat Data <i class="bi bi-eye-fill"></i></a>
                </div>
                <div class="badge TENDIK">
                    <div class="icon"><i class="fas fa-users-cog"></i></div>
                    <?php 
                    $count_tendik = $bank_soal->getJumlahTendik()
                    ?>
                    <div class="number">
                    <?php echo $count_tendik?>
                    </div>
                    <div class="label">TENDIK</div>
                    <a href="bank_soal_tendik.php" class="view-data-btn" style="color: #FFC107">Lihat Data <i class="bi bi-eye-fill"></i></a>
                </div>
                <div class="badge ALUMNI">
                    <div class="icon"><i class="fas fa-user-graduate"></i></div>
                    <?php
                    $count_alumni = $bank_soal->getJumlahalumni();
                    ?>
                    <div class="number">
                    <?php echo $count_alumni?>
                    </div>
                    <div class="label">ALUMNI</div>
                    <a href="bank_soal_alumni.php" class="view-data-btn" style="color: #DC3545">Lihat Data <i class="bi bi-eye-fill"></i></a>
                </div>
                <div class="badge ORANG-TUA">
                    <div class="icon"><i class="fas fa-user-tie"></i></div>
                    <?php
                    $count_ortu = $bank_soal->getJumlahOrtu();
                    ?>
                    <div class="number">
                    <?php echo $count_ortu?>
                    </div>
                    <div class="label">ORANG TUA</div>
                    <a href="bank_soal_orangtua.php" class="view-data-btn" style="color: #6F42C1">Lihat Data <i class="bi bi-eye-fill"></i></a>
                </div>
                <div class="badge INDUSTRI">
                    <div class="icon"><i class="fas fa-industry"></i></div>
                    <?php
                    $count_industri = $bank_soal->getJumlahIndustri()
                    ?>
                    <div class="number">
                    <?php echo $count_industri?>
                    </div>
                    <div class="label">INDUSTRI</div>
                    <a href="bank_soal_industri.php" class="view-data-btn" style="color: #FD7E14">Lihat Data <i class="bi bi-eye-fill"></i></a>
                </div>
            </div>
            </div>