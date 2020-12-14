<?php
// Sessão
session_start();
// Conexão
require_once '../../connect.php';

if(isset($_POST['btn-update-property'])):

	// pegando valores do formulario de update
	$idAddress = $_POST['address-id'];
	$zipCode = $_POST['address-zipcode'];
	$street = $_POST['address-street'];
	$addressNumber = $_POST['address-number'];
	$neighborhood = $_POST['address-neighborhood'];
	$city = $_POST['address-city'];
	$state = $_POST['address-state'];
	$lat = $_POST['address-lat'];
	$lon = $_POST['address-lon'];
	

	$sqlAddress = "UPDATE address SET zipcode = '$zipCode', street = '$street', address_number = '$addressNumber', neighborhood = '$neighborhood', city = '$city', state = '$state',lat = '$lat', lon = '$lon'  WHERE id_address = '$idAddress'";

	if(mysqli_query($connect, $sqlAddress)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar";
		echo "erro no address";
		
	endif;

	$idImg = $_POST['image-id'];
	$idProperty = $_POST['property-id'];
	$title =$_POST['property-title'];
	$contract = $_POST['property-contract'];
	$children = $_POST['property-children'];
	$pets = $_POST['property-pets'];
	$individual = $_POST['property-individual'];
	$energy = $_POST['property-energy'];
	$water = $_POST['property-water'];
	$monthlyPayment = $_POST['property-monthly-payment'];
	$deposit = $_POST['property-deposit'];
	$room = $_POST['property-room'];
	$bedroom = $_POST['property-bedroom'];
	$kitchen = $_POST['property-kitchen'];
	$bathroom = $_POST['property-bathroom'];
	$garage = $_POST['property-garage'];

	//update na tabela property  
	$sqlProperty = "UPDATE property SET title = '$title', property_contract = $contract , children = $children , pets = $pets , individual = $individual , energy = $energy ,water = $water , monthly_payment = $monthlyPayment , deposit = $deposit , room = $room , bedroom = $bedroom , kitchen = $kitchen , bathroom = $bathroom , garage = $garage WHERE id_property = '$idProperty'";

	if(mysqli_query($connect, $sqlProperty)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar";
		echo "erro no property";
	endif;



	if(count($_FILES['images']['name']) > 1) {

		echo count($_FILES['images']['name']);
		
		
	$formatsAccepted = array("jpg", "jpeg", "png");
	$quantityArchive = count($_FILES['images']['name']);
	$counter = 0;
			
	
		$deleteImg = "DELETE FROM images WHERE id_property = $idProperty";
		mysqli_query($connect,$deleteImg);
				
	while($counter < $quantityArchive):
		$extension = pathinfo($_FILES['images']['name'][$counter], PATHINFO_EXTENSION);
	
		if(in_array($extension, $formatsAccepted)):
			$folder = "../../images/";
			$temporary = $_FILES['images']['tmp_name'][$counter];
			$newName = uniqid().".$extension";


			if(move_uploaded_file($temporary, $folder.$newName)):
				// Dados do Proprietário
					$urlImg = $newName;

					$insertImg = "INSERT INTO images (id_image, url, id_property) VALUES (null, '$urlImg', $idProperty)";

					if(mysqli_query($connect, $insertImg)):
						$_SESSION['mensagem'] = "Atualizado com sucesso";
						
					else:
						$_SESSION['mensagem'] = "Atualizado com sucesso";
						
					endif;
				
			endif;
		endif;
		$counter++;
	endwhile;

	}

header('Location: ../../index.php');

endif;