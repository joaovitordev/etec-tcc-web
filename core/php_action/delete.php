<?php
// Sessão
session_start();
// Conexão
<<<<<<< HEAD
require_once '../connect.php';

if (isset($_POST['btn-deletar'])) :
=======
require_once '../../connect.php';
>>>>>>> d2dd93ce18caa4c8d043b4dcf6f22b5dbf15ac63

	$id = mysqli_escape_string($connect, $_POST['id_property']);

	$sql = "DELETE FROM property, owner, address, images 
				USING property
  				inner JOIN owner ON (property.id_owner = owner.id_owner) 
  				inner JOIN address ON (property.id_address = address.id_address)  
  				INNER JOIN images ON (images.id_property = property.id_property)
				WHERE property.id_property = '$id';";

	if (mysqli_query($connect, $sql)) :
		$_SESSION['mensagem'] = "Deletado com sucesso!";
		header('Location: ../index.php');
	else :
		$_SESSION['mensagem'] = "Erro ao deletar";
		echo $sql;
	endif;
endif;
