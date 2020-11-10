<?php
// Message
include_once 'includes/message.php';
// Conexão
<<<<<<< HEAD
include_once 'connect.php';
=======
include_once '../connect.php';
>>>>>>> d2dd93ce18caa4c8d043b4dcf6f22b5dbf15ac63
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Dashboard Template · Bootstrap</title>
  <script src="https://kit.fontawesome.com/54e963f008.js" crossorigin="anonymous"></script>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="css/styles.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark navbar-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse itens-menu navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z" />
              <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
            </svg>Imóveis <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
            </svg>Usuários</a>
        </li>
      </ul>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-second">
    <div class="row second-navbar-itens">
      <h1 class="title-home-page">Imóveis</h1>
      <a href="pages/new-property.php">
        <button type="button" class="btn btn-sm btn-novo-imovel">Novo imóvel</button>
      </a>
    </div>
  </nav>


  <div class="container">
    <br>
    <div class="row">
      <?php
      $sql = "SELECT *, GROUP_CONCAT(images.url SEPARATOR ',') AS 'images-property' FROM property 
        inner JOIN owner ON (property.id_owner = owner.id_owner) 
        inner JOIN address ON (property.id_address = address.id_address)  
        inner JOIN images ON (images.id_property = property.id_property)
        GROUP BY PROPERTY.ID_PROPERTY;
        ";
      $resultado = mysqli_query($connect, $sql);

      if (mysqli_num_rows($resultado) > 0) :

        while ($dados = mysqli_fetch_array($resultado)) :
      ?>


          <div class="col-3">
            <div class="card-deck">
              <div class="card shadow-sm" style="width: 18rem;">
                <div data-toggle="modal" data-target="#property<?php echo $dados['id_property']; ?>" class="btn-view">
                  <svg width="1em" class="icon-view" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                  </svg>
                </div>
                <div data-toggle="modal" data-target="#propertyDelete<?php echo $dados['id_property']; ?>" class="btn-delete">
                  <svg width="1em" class="icon-view" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                  </svg>
                </div>
                <div data-toggle="modal" data-target="#property<?php echo $dados['id_property']; ?>" class="btn-edit">
                  <svg width="1em" class="icon-view" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                  </svg>
                </div>
                <img style="width: 100%; height: 150px" src="../../imgs/<?php
                                                                        $values = explode(',', $dados['images-property']);
                                                                        echo $values[0];
                                                                        ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $dados['neighborhood']; ?></h5>
                  <p class="card-text"><?php echo $dados['title']; ?></p>



                </div>
              </div>
            </div>
          </div>


          <!-- Modal delete -->
          <div class="modal fade" id="propertyDelete<?php echo $dados['id_property']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="php_action/delete.php" method="POST">
                    <input type="hidden" name="id_property" value="<?php echo $dados['id_property']; ?>">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="btn-deletar" class="btn btn-primary">Sim, quero deletar</button>

                  </form>
                </div>
              </div>
            </div>
          </div>



          <!-- Modal view -->
          <div class="modal fade" id="property<?php echo $dados['id_property']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">IMÓVEL #<?php echo $dados['id_property']; ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row justify-content-md-center">
                    <div class="col-sm card-carrousel">
                      <h2 class="title-profile"><?php echo $dados['title']; ?></h2>
                      <img class="img-profile" src="../../imgs/<?php $values = explode(',', $dados['images-property']);
                                                                echo $values[0]; ?>">
                    </div>
                    <div class="col-sm card-maps">
                      <h2 class="title-profile"><?php echo $dados['street'] . ', ' . $dados['number'] . ', ' . $dados['neighborhood']; ?></h2>
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.5487542084106!2d-46.762753785379466!3d-23.72780317364409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce4dc3b2a400db%3A0xe5c47c26359d478a!2sAv.%20Caporanga%2C%20269%20-%20Cidade%20Ipava%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2004951-010!5e0!3m2!1spt-BR!2sbr!4v1604960018160!5m2!1spt-BR!2sbr" width="90%" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                  </div>
                  <br>
                  <center>
                    <div class="row justify-content-md-center">
                      <div class="col-2 background">
                        <i class="fas fa-bed icons-grid"></i>
                        <p><?php echo $dados['bedroom']; ?> Quartos</p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-couch icons-grid"></i>
                        <p><?php echo $dados['room']; ?> Salas</p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-utensils icons-grid"></i>
                        <p><?php echo $dados['kitchen']; ?> Cozinhas</p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-shower icons-grid"></i>
                        <p><?php echo $dados['bathroom']; ?> Banheiros</p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-car icons-grid"></i>
                        <p><?php echo $dados['garage']; ?> Garagem</p>
                      </div>
                    </div>
                  </center>

                  <center>
                    <div class="row justify-content-md-center">
                      <div class="col-2 background">
                        <i class="fas fa-file-contract icons-grid"></i>
                        <p>
                          <?php
                          if ($dados['contract'] === 1) {
                            echo 'Tem contrato';
                          } else {
                            echo 'Não tem contrato';
                          }
                          ?>
                        </p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-baby icons-grid"></i>
                        <p>
                          <?php
                          if ($dados['children'] === 1) {
                            echo 'É permitido crianças';
                          } else {
                            echo 'Não é permitido crianças';
                          }
                          ?>
                        </p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-paw icons-grid"></i>
                        <p>
                          <?php
                          if ($dados['pets'] === 1) {
                            echo 'É permitido animais';
                          } else {
                            echo 'Não é permitido animais';
                          }
                          ?>
                        </p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-users icons-grid"></i>
                        <p>
                          <?php
                          if ($dados['individual'] === 1) {
                            echo 'A casa é individual';
                          } else {
                            echo 'A casa não é individual';
                          }
                          ?>
                        </p>
                      </div>
                    </div>
                  </center>

                  <center>
                    <div class="row justify-content-md-center">
                      <div class="col-2 background">
                        <i class="fas fa-faucet icons-grid"></i>
                        <p>
                          <?php
                          if ($dados['energy'] === 1) {
                            echo 'A energia está inclusa na mensalidade';
                          } else {
                            echo 'A energia não está inclusa na mensalidade';
                          }
                          ?>
                        </p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-lightbulb icons-grid"></i>
                        <p>
                          <?php
                          if ($dados['water'] === 1) {
                            echo 'A água está inclusa na mensalidade';
                          } else {
                            echo 'A água não está inclusa na mensalidade';
                          }
                          ?>
                        </p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-money-check-alt icons-grid"></i>
                        <p><?php echo 'R$ ' . $dados['deposit'] . ' de depósito'; ?></p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-calendar-day icons-grid"></i>
                        <p><?php echo 'R$ ' . $dados['monthly_payment'] . ' de mensalidade'; ?></p>
                      </div>
                    </div>
                  </center>


                </div>
              </div>
            </div>
          </div>


        <?php
        endwhile;
      else : ?>


      <?php
      endif;
      ?>



    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="js/dashboard.js"></script>
</body>

</html>