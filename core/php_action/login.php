<?php
// Sessão
session_start();
// Conexão
require_once '../../connect.php';

if(isset($_POST['btn-login'])):
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];

	$sql = "SELECT email FROM usuario WHERE email = '$email' AND senha = '$senha'";

    $result = mysqli_query($connect,$sql);

    $row = mysqli_num_rows($result);

    if($row == 1):

        $_SESSION['login'] = true;
        $_SESSION['mensagem'] = "Login feito!";
        header('Location: ../pages/users.php');
    else:
        $_SESSION['mensagem'] = "Erro ao logar!";
        header('Location: ../pages/form-login.php');
        
    endif;  
endif;