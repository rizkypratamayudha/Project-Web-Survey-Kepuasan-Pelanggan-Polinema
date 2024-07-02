<?php
$menu = 'form_soal';
include_once("model/masuk_user.php");
include_once("model/formsoal/soal_model.php");
$soalAlumni = new Soal();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Survey</title>
    <link rel="icon" href="img/polinema.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS FORM -->
    <style>
    .card-header {
      background-color: #007BFF;
      display: flex;
    }

    .card-title {
      color: white;
      font-weight: bold !important;
    }
    .btn-left {
      margin-left: 10px;
      margin-right: auto;
      margin-bottom: 5px;
    }

    .btn-right {
      margin-right: 10px;
      margin-left: auto;
      margin-bottom: 5px;
    }

    .button-group {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 30px;
      justify-content: center;
    }
    
    .button-container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .button {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 5px;
      padding: 20px;
      border: none;
      border-radius: 20%;
      cursor: pointer;
      color: black;
      background-color: white;
      border: 1px solid #c0c0c8;
      transition: background-color 0.3s, color 0.3s;
      font-size: 18px;
      width: 50px;
      height: 50px;
    }

    .button:hover {
      background-color: #007BFF;
      color: white;
    }

    .button:hover .fa {
      color: white;
    }

    .button.selected {
      background-color: #007BFF;
      color: white;
    }

    .button.selected .fa {
      color: white;
    }

    .fa {
      color: #000;
    }

    .button-label {
      margin-top: 10px;
      text-align: center;
      font-size: 12px;
      font-weight: 500;
      color: black;
    }

    .chat-box {
      margin-top: 20px;
      width: 100%;
      display: flex;
      justify-content: center;
    }

    .chat-box textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #c0c0c8;
      border-radius: 5px;
    }

    .chat-box label {
      font-size: 14px;
      font-weight: bold;
      margin-bottom: 5px;
      display: block;
    }

    .btn-container {
      display: flex;
      justify-content: flex-end;
      padding: 10px;
    }
    hr {
      border: 0;
      height: 2px !important;
      background: #007BFF;
      background-image: linear-gradient(to right, #007BFF, #ffffff, #007BFF) !important;
      margin: 20px 0 !important;
    }
    .chat-box {
      margin-top: 20px;
      width: 100%;
      display: flex;
      justify-content: center;
      height: 100px; 
    }

    .content-wrapper {
      padding-bottom: 5px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

<?php include_once('layouts/user/header.php')?>
<?php include_once('layouts/user/sidebar.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Survey</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Form</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Survey Alumni</h3>
                </div>
                <form method="post" action="form_soal_alumni_action.php?act=simpan&responden_alumni_id=<?php echo $_GET['responden_alumni_id']; ?>" onsubmit="return validateForm()">
                    <div class="card-body">
                        <?php
                        $soal = $soalAlumni->getSoalAlumni();
                        if ($soal) {
                        while ($row = $soal->fetch_assoc()) {
                            echo "
                            <div class='form-group'>
                            <h5>{$row['no_urut']}. {$row['soal_nama']}</h5>
                            <input type='hidden' name='soal_id[{$row['no_urut']}]' value='{$row['soal_id']}' >
                            <div class='button-group' name='jawaban'>
                                <div class='button-container'>
                                    <button class='button' onclick='selectButton(event, this, \"Tidak Puas\", {$row['no_urut']})'><i class='bi bi-emoji-angry'></i></button>
                                    <div class='button-label'>Tidak Puas</div>
                                </div>
                                <div class='button-container'>
                                    <button class='button' onclick='selectButton(event, this, \"Kurang Puas\", {$row['no_urut']})'><i class='bi bi-emoji-frown'></i></button>
                                    <div class='button-label'>Kurang Puas</div>
                                </div>
                                <div class='button-container'>
                                    <button class='button' onclick='selectButton(event, this, \"Cukup Puas\", {$row['no_urut']})'><i class='bi bi-emoji-smile'></i></button>
                                    <div class='button-label'>Cukup Puas</div>
                                </div>
                                <div class='button-container'>
                                    <button class='button' onclick='selectButton(event, this, \"Puas\", {$row['no_urut']})'><i class='bi bi-emoji-laughing'></i></button>
                                    <div class='button-label'>Puas</div>
                                </div>
                                <div class='button-container'>
                                    <button class='button' onclick='selectButton(event, this, \"Sangat Puas\", {$row['no_urut']})'><i class='bi bi-emoji-grin'></i></button>
                                    <div class='button-label'>Sangat Puas</div>
                                </div>
                            </div>
                            <input type='hidden' name='jawaban[{$row['no_urut']}]' id='jawabanInput{$row['no_urut']}' required>
                            </div>
                            <br>
                            <hr>";
                            }
                        }
                        ?>
                    </div>
                    <div class="card-body">
                        <?php
                          $esai = $soalAlumni->getSoalAlumniEsai();
                          if ($esai) {
                            while ($row = $esai->fetch_assoc()) {
                              echo "
                              <div class='form-group'>
                              <h5>{$row['no_urut']}. {$row['soal_nama']}</h5>
                              <input type='hidden' name='soal_id[{$row['no_urut']}]' value='{$row['soal_id']}' >
                              <textarea name='jawaban[{$row['no_urut']}]' class='chat-box' placeholder=' Masukkan jawaban' required></textarea>
                            </div>
                            <br>
                            <hr>";
                            }
                          }
                        ?>
                    </div>
                    <div class="card-body">
                        <textarea name="saran" class="chat-box" placeholder=" Masukkan saran terkait survey ini..."></textarea>
                    </div>
                    <div class="btn-container">
                        <a href="biodata_alumni.php" class="btn btn-warning btn-left">Kembali</a>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php include_once('layouts/user/footer.php') ?>
</div>

<script>
function selectButton(event, button, value, questionId) {
    event.preventDefault();
    const buttonGroup = button.parentNode.parentNode.querySelectorAll('.button');
    buttonGroup.forEach(btn => {
    btn.classList.remove('selected');
    });
    button.classList.add('selected');
    document.getElementById('jawabanInput' + questionId).value = value;
}

function validateForm() {
    const hiddenInputs = document.querySelectorAll('input[type="hidden"][name^="jawaban"]');
    for (let input of hiddenInputs) {
    if (!input.value) {
        alert("Harap menjawab semua pertanyaan sebelum mengirimkan.");
        return false;
    }
    }
    return true;
}

</script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
