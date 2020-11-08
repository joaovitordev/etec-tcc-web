<?php
// Sessão
session_start();
// Conexão
require_once '../../bd/connect.php';

if(isset($_POST['btn-delete'])):

	$id = $_POST['id_usuario'];

	$sql = "DELETE FROM usuario WHERE id_usuario = '$id'";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Deletado com sucesso!";
		header('Location: ../pages/users.php');
	else:
		$_SESSION['mensagem'] = "Erro ao deletar";
	endif;
endif;