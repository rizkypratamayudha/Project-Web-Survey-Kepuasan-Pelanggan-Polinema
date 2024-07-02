<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Terimakasih</title>
<link rel="icon" href="img/polinema.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<style>
    body, html {
        width: 100%;
        height: 100%;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, #003166, rgba(0, 49, 102, 0.3), rgba(0, 49, 102, 0.1)), url('img/jtiblur.png') no-repeat center center fixed;
        background-size: cover;
        z-index: -1;
        color: #fff;
    }

    .container {
        text-align: center;
        animation: fadeIn 2s ease-in-out;
    }

    .container h1 {
        font-size: 4em;
        margin-bottom: 20px;
        animation: slideIn 1.5s ease-in-out;
    }

    .container p {
        font-size: 1.5em;
        margin-bottom: 40px;
        animation: slideIn 1.5s ease-in-out;
        animation-delay: 0.5s;
        animation-fill-mode: both;
    }

    .confetti {
        position: absolute;
        width: 10px;
        height: 10px;
        background-color: #fff;
        animation: confetti-fall 5s;
    }

    @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
    }

    @keyframes slideIn {
    from { transform: translateY(-20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
    }

    @keyframes confetti-fall {
    0% { transform: translateY(-100vh) rotate(0deg); }
    100% { transform: translateY(100vh) rotate(360deg); }
    }
</style>
</head>
<body onclick="logout()">
<div class="container">
    <h1>Terima kasih!</h1>
    <p>Atas partisipasi Anda.</p>
</div>
<script>
    function createConfetti() {
    const confetti = document.createElement('div');
    confetti.classList.add('confetti');
    confetti.style.left = Math.random() * 100 + 'vw';
    confetti.style.animationDuration = Math.random() * 1 + 3 + 's';
    document.body.appendChild(confetti);

    confetti.addEventListener('animationend', () => {
        confetti.remove();
    });
    }

    setTimeout(() => {
        confetti.remove();
    }, 1000);

    setInterval(createConfetti, 50);

    function logout() {
    window.location.href = "logoutproses.php";
}
</script>
</body>
</html>