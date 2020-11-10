<?php
// Sessão
session_start();
// Conexão
require_once '../../bd/connect.php';

if(isset($_POST['btn-new-user'])):

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sqlInsert = "INSERT INTO usuario (nome,email,senha) VALUES('$nome','$email','$senha')";
    // a query de select serve para nao deixar passar caso o email seje igual um cadastrado no banco
    $sqlSelect = "SELECT email FROM usuario WHERE email= '$email'";


    $resultSelect = mysqli_query($connect, $sqlSelect);
    $rows = mysqli_num_rows($resultSelect);

    if ($rows == 1):
        $_SESSION['mensagem'] = "Erro ao cadastrar, email ja consta no bd";
        header('Location: ../pages/form-new-user.php');        
    else :
        mysqli_query($connect, $sqlInsert);
        header('Location: ../pages/form-login.php');   
    endif;  
endif;