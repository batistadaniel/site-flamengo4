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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
    <link rel="stylesheet" href="src/css/home.css">
    <title>Nação</title>
</head>

<body>

    <header id="login">
        <button class="btn-login" type="button" id="btn-login"><p>Login</p></button>
    </header>

    <header id="logado" style="display: none;">
        <div class="logo-mobile">
            <a href="#"><img src="src/img/logo-crf.png" alt="Logo CRF" class="logo-mobile"></a>
        </div>
        <div class="titulo">
            <a href="#">
                <h1>Feed do Urubu</h1>
            </a>
        </div>
        <div class="icone-perfil">
            <i class="bi bi-person-circle"></i>
        </div>
    </header>
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <main id="box-login">

    <div class="container">
        <div class="logo">
            <img src="src/img/logo-flamengo.webp" alt="Logo Flamengo">
        </div>
        <div class="logo-mobile">
            <img src="src/img/logo-crf.png" alt="Logo CRF" class="logo-mobile">
        </div>
        <div class="formulario">
            <form id="loginForm" action="logado.php" method="post">
                <div class="inputs">
                    <input class="email" name="email" id="email" required type="email">
                    <label class="input-label">E-mail</label>
                    <input class="senha" name="senha" id="senha" required type="password">
                    <label class="input-senha">Senha</label>
                    <i class="bi bi-eye" id="btn-senha" onclick="mostrarsenha()"></i>
                    <button class="but" type="submit"><strong>Entrar</strong></button>
                    <a href="cadastro.php" target="_blank"><strong>Cadastre-se</strong></a>
                </div>
            </form>
        </div>
    </div>
    </main>
    <script src="src/js/script.js" defer></script>
</body>

</html>