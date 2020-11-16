<?php
// Sessão
session_start();
// Conexão
require_once '../connect.php';

header('Content-Type: application/json');

$sql = "SELECT *, GROUP_CONCAT(images.url SEPARATOR ',') AS 'images-property' FROM property 
inner JOIN owner ON (property.id_owner = owner.id_owner) 
inner JOIN address ON (property.id_address = address.id_address)  
inner JOIN images ON (images.id_property = property.id_property)
GROUP BY PROPERTY.ID_PROPERTY;
";

$result = mysqli_query($connect, $sql);

$encode = array();

while ($dados = mysqli_fetch_array($result)) :
    $encode[] = $dados;
endwhile;

echo json_encode($encode, JSON_FORCE_OBJECT);

?>