<?php
// Sessão
session_start();
// Conexão
require_once '../connect.php';

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");

$sql = "SELECT *, GROUP_CONCAT(images.url SEPARATOR ',') AS 'images-property' FROM property 
inner JOIN owner ON (property.id_owner = owner.id_owner) 
inner JOIN address ON (property.id_address = address.id_address)  
inner JOIN images ON (images.id_property = property.id_property)
group by property.id_property;
";

$result = mysqli_query($connect, $sql);

$encode = [];

while ($dados = mysqli_fetch_array($result)) :
    $encode[] = $dados;
endwhile;

$object = json_decode(json_encode($encode), false);

print_r(json_encode($object));

?>