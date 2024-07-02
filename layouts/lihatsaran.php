    <?php
        include_once("model/saran/saran_mhs.php");
        include_once("model/saran/saran_dosen.php");
        include_once("model/saran/saran_tendik.php");
        include_once("model/saran/saran_alumni.php");
        include_once("model/saran/saran_ortu.php");
        include_once("model/saran/saran_industri.php");

        $saranMhs = new SaranMahasiswa();
        $saranDosen = new SaranDosen();
        $saranTendik = new SaranTendik();
        $saranAlumni = new SaranAlumni();
        $saranOrtu = new SaranOrtu();
        $saranIndustri = new SaranIndustri();
        
    ?>
    <div class="card">
                <div class="card-header">
                <div class="badges-container">
                    <div class="badge DOSEN">
                    <div class="icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    <?php
                        $count_dosen_saran = $saranDosen->getJumlahSaran();
                    ?>
                        <div class="number"><?php  echo $count_dosen_saran?></div>
                        <div class="label">DOSEN</div>
                            <a href="saran_dosen.php" class="view-data-btn black" style="color: #28A745">Lihat Data <i class="bi bi-eye-fill"></i></a>
                    </div>
                    <div class="badge MAHASISWA">
                    <div class="icon"><i class="fas fa-user-graduate"></i></div>
                    <?php 
                        $count_mhs_saran = $saranMhs->getJumlahSaran(); 
                    ?>
                        <div class="number"><?php echo $count_mhs_saran?></div>
                        <div class="label">MAHASISWA</div>
                            <a href="saran_mahasiswa.php" class="view-data-btn" style="color: #007BFF">Lihat Data <i class="bi bi-eye-fill"></i></a>
                    </div>
                    <div class="badge TENDIK">
                    <div class="icon"><i class="fas fa-users-cog"></i></div>
                    <?php
                        $count_tendik_saran = $saranTendik->getJumlahSaran();
                    ?>
                        <div class="number"><?php echo $count_tendik_saran?></div>
                        <div class="label">TENDIK</div>
                            <a href="saran_tendik.php" class="view-data-btn" style="color: #FFC107">Lihat Data <i class="bi bi-eye-fill"></i></a>
                    </div>
                    <div class="badge ALUMNI">
                        <div class="icon"><i class="fas fa-user-graduate"></i></div>
                        <?php 
                        $count_alumni_saran = $saranAlumni->getJumlahSaran();
                        ?>
                        <div class="number"><?php echo $count_alumni_saran?></div>
                            <div class="label">ALUMNI</div>
                            <a href="saran_alumni.php" class="view-data-btn" style="color: #DC3545">Lihat Data <i class="bi bi-eye-fill"></i></a>
                    </div>
                    <div class="badge ORANG-TUA">
                        <div class="icon"><i class="fas fa-user-tie"></i></div>
                        <?php 
                            $count_ortu_saran = $saranOrtu->getJumlahSaran();
                        ?>
                        <div class="number"><?php echo $count_ortu_saran?></div>
                            <div class="label">ORANG TUA</div>
                            <a href="saran_ortu.php" class="view-data-btn" style="color: #6F42C1">Lihat Data <i class="bi bi-eye-fill"></i></a>
                    </div>
                    <div class="badge INDUSTRI">
                    <div class="icon"><i class="fas fa-industry"></i></div>
                    <?php 
                        $count_industri_saran = $saranIndustri->getJumlahSaran()
                    ?>
                        <div class="number"><?php echo $count_industri_saran?></div>
                        <div class="label">INDUSTRI</div>
                            <a href="saran_industri.php" class="view-data-btn" style="color: #FD7E14">Lihat Data <i class="bi bi-eye-fill"></i></a>
                    </div>
                </div>