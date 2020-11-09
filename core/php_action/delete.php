<?php
// Sessão
session_start();
// Conexão
require_once '../../connect.php';

if(isset($_POST['btn-deletar'])):
	
	$id = mysqli_escape_string($connect, $_POST['id_property']);

	$sql = "DELETE FROM property WHERE id_property = '$id'";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Deletado com sucesso!";
		header('Location: ../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao deletar";
		header('Location: ../index.php');
	endif;
endif;