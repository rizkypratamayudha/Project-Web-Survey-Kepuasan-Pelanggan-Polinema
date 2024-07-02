<?php

include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jenisuser = $_POST['jenis_user'] ?? '';

    if (isset($_POST['jenis_user'])) {
        $kategoriDipilih = $_POST['jenis_user'];

        if ($kategoriDipilih === 'Dosen') {
            header('Location: ../biodata_dosen.php');
            exit;
        } elseif ($kategoriDipilih === 'Mahasiswa') {
            header('Location: ../biodata_mahasiswa.php');
            exit;
        } elseif ($kategoriDipilih === 'Tendik'){
            header('Location: ../biodata_tendik.php');
            exit();
        } elseif ($kategoriDipilih === 'Alumni'){
            header('Location: ../biodata_alumni.php');
            exit();
        } elseif ($kategoriDipilih === 'Orang tua'){
            header('Location: ../biodata_orangtua.php');
            exit();
        } elseif ($kategoriDipilih === 'Industri'){
            header('Location: ../biodata_industri.php');
            exit();
        }
    }
}
?>
