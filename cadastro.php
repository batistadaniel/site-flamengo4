<?php
session_start();
?>
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
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <div class="formulario">
        <form action="envio.php" method="post">
            <div class="logo">
                <img src="https://images.mengo.com.br/prod/assets/images/logo-st-nova.png" alt="">
            </div>
            <div class="inputs">
                <input type="text" name="nome" placeholder="Nome Completo">
                <input type="email" name="email" placeholder="E-mail">
                <input type="password" name="senha" id="senha" placeholder="Senha">
                <i class="bi bi-eye" id="btn-senha" onclick="mostrarsenha()"></i>
                <input type="text" name="cpf" placeholder="CPF">
                <div class="btns">
                    <button type="submit">Criar</button>
                    <button type="button"><a href="home.php">Voltar</a></button>
                </div>
            </div>
        </form>
    </div>
    
</body>

</html>