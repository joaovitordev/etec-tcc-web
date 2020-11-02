<?php
// Sessão
session_start();
// Conexão
require_once '../../bd/connect.php';
// Clear
function clear($input) {
	global $connect;
	// sql
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}

if(isset($_POST['btn-new-owner'])):
	$name = clear($_POST['owner-name']);
	$cpf = clear($_POST['owner-cpf']);
	$email = clear($_POST['owner-email']);
	$telephone = clear($_POST['owner-telephone']);
	$whatsapp = clear($_POST['owner-whatsapp']);
	$facebook = clear($_POST['owner-facebook']);
	$instagram = clear($_POST['owner-instagram']);

	$sql = "INSERT INTO owner (full_name, cpf , email, telephone, whatsapp, facebook, instagram)
	 VALUES ('$name', '$cpf', '$email', '$telephone','$whatsapp','$facebook','$instagram')";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../index.php');
	endif;
endif;