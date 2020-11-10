<?php
// Sessão
session_start();
// Conexão
require_once '../connect.php';
// Clear
function clear($input) {
	global $connect;
	// sql
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}

/*
	Salvando os dados de um novo proprietário no banco
*/

if(isset($_POST['btn-new-owner'])):
	// Dados do Proprietário
	$name = clear($_POST['owner-name']);
	$cpf = clear($_POST['owner-cpf']);
	$email = clear($_POST['owner-email']);
	$telephone = clear($_POST['owner-telephone']);
	$whatsapp = clear($_POST['owner-whatsapp']);
	$facebook = clear($_POST['owner-facebook']);
	$instagram = clear($_POST['owner-instagram']);

	// Inserindo os dados do Proprietário
	$sql = "INSERT INTO owner (id_owner, full_name, cpf , email, telephone, whatsapp, facebook, instagram) VALUES (null, '$name', '$cpf', '$email', '$telephone','$whatsapp','$facebook','$instagram'); ";
	// Pesquisando no banco pelo id do owner
	$selectSql = "";
	$selectSql = "SELECT owner.id_owner FROM owner WHERE full_name = '$name'";

	$ownerSql = mysqli_query($connect, $selectSql);

	if(mysqli_num_rows($ownerSql) > 0):
		/*
			Esse bloco irá fazer a checagem na tabela do proprietário(owner)
			no banco para verificar se já existe um registro com o mesmo id.
			Caso já exista um proprietário cadastrado com o mesmo id, ele irá
			trazer o proprietário cadastrado no banco e enviará uma mensagem
			de erro: "Proprietário já cadastrado no banco!".
			Caso não exista um proprietário(owner) com esse id já cadastrado no 
			banco, então ele irá cadastrar o novo proprietário(owner) e armazenar
			seu id em uma variável para ser usada na chamada de uma tabela dependente.
		*/
		while ($ownerRow = mysqli_fetch_assoc($ownerSql)){
			// Caso proprietário já exista, tras o ID.
			$ownerId = $ownerRow["id_owner"]; 
		}
	else:
		// Salvando o novo proprietário e pegando seu ID
		$newOwnerSql = mysqli_query($connect, $sql);
		if (mysqli_num_rows($newOwnerSql) > 0):
			while($newOwnerRow = mysqli_fetch_assoc($newOwnerSql)) {
				// Armazenando novo ID cadastrado.
				$ownerId = $newOwnerRow["id_owner"];
			}
			$_SESSION['mensagem'] = "Proprietário cadastrado com sucesso!";
		else:
			$_SESSION['mensagem'] = "Erro ao cadastrar um novo proprietário";
		endif;
	endif;	
endif;

/*
	Salvando os dados de um novo endereço no banco
*/

if(isset($_POST['btn-new-owner'])):
	// Dados do Endereço
	$zipcode = clear($_POST['address-zipcode']);
	$street = clear($_POST['address-street']);
	$number = clear($_POST['address-number']);
	$neighborhood = clear($_POST['address-neighborhood']);
	$city = clear($_POST['address-city']);
	$state = clear($_POST['address-state']);

	// Inserindo os dados do endereço
	$addressSql = "INSERT INTO address (id_address, zipcode, street, address_number, neighborhood, city, address_state) VALUES (null, '$zipcode', '$street', '$number', '$neighborhood', '$city', '$state')";

	// Pesquisando no banco pelo id do endereço
	$selectSql = "";
	$selectSql = "SELECT address.id_address FROM address WHERE address_number = '$number'";

	$selectAddressSql = mysqli_query($connect, $selectSql);

	if(mysqli_num_rows($selectAddressSql) > 0):
		/*
			Assim como no comando para cadastrar um novo proprietário
			esse bloco irá fazer o mesmo processo com o endereço(address).
		*/
		while ($addressRow = mysqli_fetch_assoc($selectAddressSql)){
			// Caso endereço já exista, tras o ID.
			$addressId = $addressRow["id_address"]; 
		}
	else:
		// Salvando o novo proprietário e pegando seu ID
		$newAddressSql = mysqli_query($connect, $addressSql);
		if (mysqli_num_rows($newAddressSql) > 0):
			while($newAddressRow = mysqli_fetch_assoc($newAddressSql)) {
				// Armazenando novo ID cadastrado.
				$addressId = $newAddressRow["id_address"];
			}
			$_SESSION['mensagem'] = "Endereço cadastrado com sucesso!";
		else:
			$_SESSION['mensagem'] = "Erro ao cadastrar um novo Endereço!";
		endif;
	endif;
endif;

/*
	Salvando os dados de uma nova propriedade no banco
*/

if(isset($_POST['btn-new-owner'])):
	// Dados da propriedade
	$title = clear($_POST['property-room']);
	$contract = clear($_POST['property-contract']);
	$children = clear($_POST['property-children']);
	$pets = clear($_POST['property-pets']);
	$individual = clear($_POST['property-individual']);
	$energy = clear($_POST['property-energy']);
	$water = clear($_POST['property-water']);
	$monthlyPayment = clear($_POST['property-monthly-payment']);
	$deposit = clear($_POST['property-deposit']);
	$room = clear($_POST['property-room']);
	$bedroom = clear($_POST['property-bedroom']);
	$kitchen = clear($_POST['property-kitchen']);
	$bathroom = clear($_POST['property-bathroom']);
	$garage = clear($_POST['property-garage']);

	// inserindo os dados da Propriedade
	$propertySql = "INSERT INTO property (id_property, title, property_contract, children, pets, individual, energy, water, monthly_payment, deposit, room, bedroom, kitchen, bathroom, garage, id_address, id_owner) VALUES (null, $title, '$contract, $children, $pets, $individual, $energy, $water, $monthlyPayment, $deposit, $room, $bedroom, $kitchen, $bathroom, $garage, $addressId, $ownerId)";
	
	// Pesquisando no banco pelo id da propriedade.
	$selectSql = "";
	$selectSql = "SELECT property.id_property FROM address WHERE property.id_address = $addressId AND property.id_owner = $ownerId";

	$selectPropertySql = mysqli_query($connect, $selectSql);

	if(mysqli_num_rows($selectPropertySql) > 0):
		/*
			Assim como no comando para cadastrar um novo proprietário
			esse bloco irá fazer o mesmo processo com a propriedade/casa(property).
		*/
		while ($propertyRow = mysqli_fetch_assoc($selectPropertySql)){
			// Caso endereço já exista, tras o ID.
			$propertyId = $propertyRow["id_property"]; 
		}
	else:
		// Salvando o novo proprietário e pegando seu ID
		$newPropertySql = mysqli_query($connect, $propertySql);
		if (mysqli_num_rows($newPropertySql) > 0):
			while($newPropertyRow = mysqli_fetch_assoc($newPropertySql)) {
				// Armazenando novo ID cadastrado.
				$propertyId = $newPropertyRow["id_property"];
			}
			$_SESSION['mensagem'] = "Propriedade cadastrada com sucesso!";
		else:
			$_SESSION['mensagem'] = "Erro ao cadastrar uma nova Propriedade!";
		endif;
	endif;
endif;

/*
	Salvando Imagens da Propriedade
*/
if(isset($_POST['btn-new-owner'])):
	// Fazendo o upload de arquivos sem o compouser/uploader.
	/* $formatsAccepted = array("jpg", "jpeg", "png");
	$quantityArchive = count($_FILES['arquivo']['name']);
	$counter = 0;

	while($counter < $quantityArchive):
		$extension = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
	
		if(in_array($extension, $formatsAccepted)):
			$folder = "arquivo/";
			$temporary = $_FILES['arquivo']['tmp_name'];
			$newName = uniqid()."$extension";

			if(move_uploaded_file($extension, $folder.$newName)):

				// Dados do Proprietário
				$url = clear($_POST['property-images']);
				// Inserindo os dados do Proprietário
				$imageSql = "INSERT INTO images (id_image, url, id_property) VALUES (null, $url, $propertyId)";

				if(mysqli_query($connect, $imageSql)):
					$_SESSION['mensagem'] = "Imagens cadastradas com sucesso!";
				else:
					$_SESSION['mensagem'] = "Erro ao cadastrar uma ou mais nova(s) Imagem(ns)!";
				endif;
			else:
				$_SESSION['mensagem'] = "Formato de arquivo inválido. Somente imagens são aceitas.";
			endif	
		endif;
		$counter++;
	endwhile; */

	// Fazendo upload de imagens multiplas utilizando o uploarder via composer

	// Utilizando do Uploader para fazer o objeto da imagem que será upada e salva no banco.
	// $upload = new \CoffeeCoder\Uploarder\Image(uploadDir:"storage", fileTypeDir:"images");  
	// $files = $_FILES; // Várivel global para upload de arquivos.
	
	// Checando se a variável files está vazia.
	// if(!empty($files["property-images"])):
	// 	// Incorporando a '$files' em uma variável para filtragem.
	// 	$images = $files["property-images"];
	// 	// Construindo um índice para cada arquivo que será salvo
	// 	for($count = 0;$count < count($images["type"]); $count++):
	// 		// Arrumando a estrutura do array.
	// 		foreach(array_keys($images) as $keys):
	// 			$imageFiles[$count][$keys] = $images[$keys][$count];
	// 		endforeach;	
	// 	endfor;
	// 	// Checando se os itens dentro do $imageFiles são do tipo permitido.
	// 	foreach ($imageFiles as $files)
	// 		// Caso imagem inválida.
	// 		if(empty($file["type"])):
	// 			$_SESSION['mensagem'] = "Selecione uma imagem válida";
	// 		elseif(!in_array($file["type"], $upload::isAllowed())):
	// 			// Caso o tipo do arquivo não seja permitido.
	// 			$_SESSION['mensagem'] = "O arquivo".$file["type"]." não é um formato válido";
	// 		else:
	// 			// quando tudo está dentro dos conformes.
	// 			$uploaded = $upload->upload($file, pathinfo($file["name"], PATHINFO_FILENAME), width: "350");
	// 			// Inserindo os dados do Proprietário
	// 			$imageSql = "INSERT INTO images (id_image, url, id_property) VALUES (null, $uploaded, $propertyId)";
	// 			if(mysqli_query($connect, $imageSql)):
	// 				$_SESSION['mensagem'] = "Imagens cadastradas com sucesso!";
	// 			else:
	// 				$_SESSION['mensagem'] = "Erro ao cadastrar uma ou mais nova(s) Imagem(ns)!";
	// 			endif;
	// 		endif;
	
	// 	endforeach;
	// endif; 		
endif;

		
				// Dados do Proprietário
				$uploaded = clear($_POST['property-images']);
				// Inserindo os dados do Proprietário
				$imageSql = "INSERT INTO images (id_image, url, id_property) VALUES (null, $uploaded, $propertyId)";
				if(mysqli_query($connect, $imageSql)):
					$_SESSION['mensagem'] = "Imagens cadastradas com sucesso!";
				else:
					$_SESSION['mensagem'] = "Erro ao cadastrar uma ou mais nova(s) Imagem(ns)!";
				endif;
				

mysqli_close($connect);
header('Location: ../index.php');