<?php
    include('../model/koneksi.php');
    session_start();

    if(isset($_SESSION['username'])){
        header('Location: ../home.php');
        exit();
    }

    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = md5($_POST['password']);

        $query = $db->prepare("SELECT * FROM m_user WHERE username= ? AND password = ?");
        $query->bind_param('ss', $username, $password);
        $query->execute();
        $result = $query->get_result();

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username'];
            header("Location: ../home.php");
            exit();
        } else {
            $_SESSION['login_error'] = 'Username atau password salah';
            header("Location: login.php"); // Redirect to the same login page
            exit();
        }
    }
?>
