<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="src/js/script.js" defer></script>
    <link rel="stylesheet" href="./src/css/cadastro.css">
    <title>Document</title>
</head>

<body>

<?php
session_start();
include_once('conexao.php');
//echo "<script src='src/js/script.js' defer></script>";

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$verifica = "SELECT * FROM dados WHERE email= '$email' AND senha = '$senha'";
$resultado = mysqli_query($conexao, $verifica);

if (mysqli_num_rows($resultado) > 0) {
    // $_SESSION['msg'] = "LOGADO";
    header('Location: home.php');

    echo "
    <script>
        let login = document.getElementById('login');
        let logado = document.getElementById('logado');

        login.style.display = 'none';
        logado.style.display = 'block';
    </script>
    
    ";

} else {
    // $_SESSION['msg'] = "E-mail ou senha incorretos.";
    $_SESSION['msg'] = "<h3 id='msg' class='msg'>Email ou Senha incorretos.</h3>";
    header('Location: home.php');
}
exit();
?>
</body>
</html>
