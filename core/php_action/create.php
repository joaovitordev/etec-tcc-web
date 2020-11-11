<?php
// Sessão
session_start();
// Conexão
require_once '../../connect.php';
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

	// Pesquisando no banco pelo id do owner
	$selectOwnerSql = "SELECT owner.id_owner FROM owner WHERE full_name = '$name'";

	$ownerSelect = mysqli_query($connect, $selectOwnerSql);
	if(mysqli_num_rows($ownerSelect) > 0):
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
		while ($ownerRow = mysqli_fetch_assoc($ownerSelect)):
			// Caso proprietário já exista, tras o ID.
			$ownerId = $ownerRow['id_owner']; 
		endwhile;
	else:
		// Inserindo os dados do Proprietário
		$ownerSql = "INSERT INTO owner (full_name, cpf , email, telephone, whatsapp, facebook, instagram) VALUES ('$name', '$cpf', '$email', '$telephone','$whatsapp','$facebook','$instagram'); ";
		// Salvando o novo proprietário e pegando seu ID
		$newOwnerSql = mysqli_query($connect, $ownerSql);
		if ($newOwnerSql):
				// Armazenando novo ID cadastrado.
				$ownerId = mysqli_insert_id($connect);
				var_dump($ownerId);
			$_SESSION['mensagem'] = "Proprietário cadastrado com sucesso!";
		else:
			$_SESSION['mensagem'] = "Erro ao cadastrar um novo proprietário";
		endif;
	endif;
	
	// Dados do Endereço
	$zipCode = clear($_POST['address-zipcode']);
	$street = clear($_POST['address-street']);
	$addressNumber = clear($_POST['address-number']);
	$neighborhood = clear($_POST['address-neighborhood']);
	$city = clear($_POST['address-city']);
	$state = clear($_POST['address-state']);

	$selectAddressSql = "SELECT id_address FROM address WHERE address_number = '$addressNumber'; ";

	$addressSelect = mysqli_query($connect, $selectAddressSql);
	if(mysqli_num_rows($addressSelect) > 0):
		while($addressRow = mysqli_fetch_assoc($addressSelect)):
			$addressId = $addressRow['id_address'];
		endwhile;
	else:
		$addressSql = "INSERT INTO address (zipcode, street, address_number, neighborhood, city, state) VALUES ('$zipCode', '$street', '$addressNumber', '$neighborhood', '$city', '$state'); ";
		$newAddressSql = mysqli_query($connect, $addressSql);
		if ($newAddressSql):
			$addressId = mysqli_insert_id($connect);
			var_dump($addressId);
			$_SESSION['mensagem'] = "Endereço cadastrado com sucesso!";
		else:
			$_SESSION['mensagem'] = "Erro ao cadastrar um novo Endereço!";
		endif;		
	endif;
	// Dados da propriedade
	$title = clear($_POST['property-title']);
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
	
	$selectPropertySql = "SELECT id_property FROM property WHERE id_address = $addressId AND id_owner = $ownerId; ";
	
	$propertySelect = mysqli_query($connect, $selectPropertySql);
	if(mysqli_num_rows($propertySelect) > 0):
		while ($propertyRow = mysqli_fetch_assoc($propertySelect)):
			$propertyId = $propertyRow['id_property'];
		endwhile;
	else:
		$propertySql = "INSERT INTO property (title, property_contract, children, pets, individual, energy, water, monthly_payment, deposit, room, bedroom, kitchen, bathroom, garage, id_address, id_owner) VALUES ('$title', '$contract', '$children', '$pets', '$individual', '$energy', '$water', '$monthlyPayment', '$deposit', '$room', '$bedroom', '$kitchen', '$bathroom', '$garage', '$addressId', '$ownerId'); ";

		$newPropertySql = mysqli_query($connect, $propertySql);
		if($newPropertySql):
			$propertyId = mysqli_insert_id($connect);
			var_dump($propertyId);
			$_SESSION['mensagem'] = "Propriedade cadastrada com sucesso!";
		else:
			$_SESSION['mensagem'] = "Erro ao cadastrar uma nova Propriedade!";
		endif;
	endif;

	/*
		Salvando Imagens da Propriedade
	*/
	// Fazendo o upload de arquivos sem o compouser/uploader.
	$formatsAccepted = array("jpg", "jpeg", "png");
	$quantityArchive = count($_FILES['arquivo']['name']);
	$counter = 0;

	while($counter < $quantityArchive):
		$extension = pathinfo($_FILES['arquivo']['name'][$counter], PATHINFO_EXTENSION);
	
		if(in_array($extension, $formatsAccepted)):
			$folder = "arquivo/";
			$temporary = $_FILES['arquivo']['tmp_name'][$counter];
			$newName = uniqid().".$extension";

			if(move_uploaded_file($temporary, $folder.$newName)):
				// Dados do Proprietário
				$url = $newName;
				// Inserindo os dados do Proprietário
				$imageSql = "INSERT INTO images (id_image, url, id_property) VALUES (null, '$url', $propertyId)";

				if(mysqli_query($connect, $imageSql)):
					$_SESSION['mensagem'] = "Imagens cadastradas com sucesso!";
				else:
					$_SESSION['mensagem'] = "Erro ao cadastrar uma ou mais nova(s) Imagem(ns)!";
				endif;
			else:
				$_SESSION['mensagem'] = "Formato de arquivo inválido. Somente imagens são aceitas.";
			endif;	
		endif;
		$counter++;
	endwhile;

	// Fazendo upload de imagens multiplas utilizando o uploarder via composer
	/*
	// Utilizando do Uploader para fazer o objeto da imagem que será upada e salva no banco.
	$upload = new \CoffeeCoder\Uploarder\Image(uploadDir: "storage", fileTypeDir: "images");  
	$files = $_FILES; // Várivel global para upload de arquivos.
	
	// Checando se a variável files está vazia.
	if(!empty($files["property-images"])):
		// Incorporando a '$files' em uma variável para filtragem.
		$images = $files["property-images"];
		// Construindo um índice para cada arquivo que será salvo
		for($count = 0;$count < count($images["type"]); $count++):
			// Arrumando a estrutura do array.
			foreach(array_keys($images) as $keys):
				$imageFiles[$count][$keys] = $images[$keys][$count];
			endforeach;	
		endfor;
		// Checando se os itens dentro do $imageFiles são do tipo permitido.
		foreach ($imageFiles as $files)
			// Caso imagem inválida.
			if(empty($file["type"])):
				$_SESSION['mensagem'] = "Selecione uma imagem válida";
			elseif(!in_array($file["type"], $upload::isAllowed())):
				// Caso o tipo do arquivo não seja permitido.
				$_SESSION['mensagem'] = "O arquivo".$file["type"]." não é um formato válido";
			else:
				// quando tudo está dentro dos conformes.
				$uploaded = $upload->upload($file, pathinfo($file["name"], PATHINFO_FILENAME), width: "350")
				// Inserindo os dados do Proprietário
				$imageSql = "INSERT INTO images (id_image, url, id_property) VALUES (null, $uploaded, $propertyId)";
				if(mysqli_query($connect, $imageSql)):
					$_SESSION['mensagem'] = "Imagens cadastradas com sucesso!";
				else:
					$_SESSION['mensagem'] = "Erro ao cadastrar uma ou mais nova(s) Imagem(ns)!";
				endif;
			endif
			/*
				// Dados do Proprietário
				$uploaded = clear($_POST['property-images']);
				// Inserindo os dados do Proprietário
				$imageSql = "INSERT INTO images (id_image, url, id_property) VALUES (null, $uploaded, $propertyId)";
				if(mysqli_query($connect, $imageSql)):
					$_SESSION['mensagem'] = "Imagens cadastradas com sucesso!";
				else:
					$_SESSION['mensagem'] = "Erro ao cadastrar uma ou mais nova(s) Imagem(ns)!";
				endif;
		endforeach;
	endif;*/
			
endif;

mysqli_close($connect);
// header('Location: ../index.php');