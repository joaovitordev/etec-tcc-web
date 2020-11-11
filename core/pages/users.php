<?php

// Conexão
include_once '../../bd/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    $sql = "SELECT * FROM usuario";

    $resultado = mysqli_query($connect, $sql);

    if (mysqli_num_rows($resultado) > 0) :

    while ($dados = mysqli_fetch_array($resultado)) :

    ?>
    <p> <?php echo $dados['id_usuario'];?> </p> 
<p> <?php echo $dados['email'];?> </p> 
<p> <?php echo $dados['nome'];?> </p>
</form>

<div id="modal<?php echo $dados['id_usuario']; ?>" class="modal">
					    <div class="modal-content">
					    </div>
					    <div class="modal-footer">					     

					      <form action="../php_action/delete-user.php" method="post">
					      	<input type="hidden" name="id_usuario" value="<?php echo $dados['id_usuario']; ?>">
					      	<button type="submit" name="btn-delete">Deletar</button>

					      </form>

					    </div>
					  </div>
    <?php
            endwhile;
        else : 
            
        endif;
        ?>
    
</body>
</html>