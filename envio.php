<?php
session_start();
include_once 'conexao.php';

//Verifica se o método da requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Filtra e valida os dados do formulario
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);

    //Verifica se os campos foram preenchidos
    if (empty($nome) || empty($email) || empty($senha) || empty($cpf)) {
        $_SESSION['msg'] = "<p class='msg'>Por favor, preencha tudo.</p>";
        header("Location: cadastro.php");
        exit(); //Encerra o script para evitar execução adicional
    }


    //Verifica se o email já está cadastrado
    $query_verifica_email = "SELECT id FROM dados WHERE email = '$email'";
    $resultado_verifica_email = mysqli_query($conexao, $query_verifica_email);

    //Verifica se o CPF já está cadastrado
    $query_verifica_cpf = "SELECT id FROM dados WHERE cpf = '$cpf'";
    $resultado_verifica_cpf = mysqli_query($conexao, $query_verifica_cpf);

    if ((mysqli_num_rows($resultado_verifica_email) > 0) || (mysqli_num_rows($resultado_verifica_cpf) > 0)) {
        $_SESSION['msg'] = "<p class='msg'>Email ou CPF já cadastrado.</p>";
        header("location: cadastro.php");
        exit();
    }

    //Se tudo estiver correto insere o novo usuário no banco de dados
    $create_user = "INSERT INTO dados (nome, email, senha, cpf, created_data) VALUES ('$nome', '$email', '$senha', '$cpf', NOW())";
    $created_user = mysqli_query($conexao, $create_user);

    if ($created_user) {
        $_SESSION['msg'] = "<p class='msg' style='color:green'>Usuário cadastrado com sucesso.</p>";
        header("location: cadastro.php");
    } else {
        $_SESSION['msg'] = "<p class='msg'>Erro ao cadastrar usuário</p>";
        header("location: cadastro.php");
    }
} else {
    //Redireciona para a página cadastro caso o método da requisição não seja POST
    header("Location: cadastro.php");
}
